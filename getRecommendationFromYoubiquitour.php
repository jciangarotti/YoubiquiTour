<?
//Only the function to calculate the recomendation in YoubiquiTour

function getRecommendationFromYoubiquitour($userID){
    $clustersVisitados  =   $this->session->userdata('clustersVisitados');

    /*
     * Se crea un arreglo con los items visitados en la session a partir de
     * la variable $clustersVisitados
     */
    $arregloClustersVisitados   = split("-", $clustersVisitados);
    
    
    $this->load->library('table');
    $arregloRecomendaciones = array();
    
    // Se seleccionan los diferentes clusters visitados por el usuario $userID
    $queryConstructor = "SELECT DISTINCT cluster.clusterID as clusterID
                              FROM cluster, user_preferences, items, divider
                              WHERE user_preferences.userID = $userID
                              AND user_preferences.itemID = items.itemID
                              AND items.positionID = divider.positionID
                              AND divider.clusterID = cluster.clusterID ";
   $query = $this->db->query($queryConstructor);
    $booleano = true;
    
    //Se realiza el loop la cantidad de veces como cluster ha visitado esta vez.
    foreach($arregloClustersVisitados as &$value){
      
      /*Llamamos a la funcion youbiquitour para obtener los usuarios recomendados de las salas
       visitadas*/
      $recommendUser =  $this->youbiquitour($value, $userID);
      
      /*Seleccion de todos los items visitados por el usuario recomendado y que $userID no ha visto*/
      
      if($booleano){
        $queryConstructor = "SELECT items.itemID as itemID, items.name as name, items.positionID as position, items.rating as rating, items.path as path
  FROM user_preferences, items
          WHERE user_preferences.itemID = items.itemID
          AND user_preferences.userID = $recommendUser
          AND user_preferences.itemID NOT IN (SELECT itemID
                FROM user_preferences
                WHERE userID = $userID)";
        $booleano = false;
      }else{
        $queryConstructor = "$queryConstructor UNION SELECT items.itemID as itemID, items.name as name, items.positionID as position, items.rating as rating, items.path as path
        FROM user_preferences, items
        WHERE user_preferences.itemID = items.itemID
        AND user_preferences.userID = $recommendUser
        AND user_preferences.itemID
        NOT IN (SELECT itemID
            FROM user_preferences
            WHERE userID = $userID)";
      }
    }
    $queryConstructor = "$queryConstructor ORDER BY rating DESC LIMIT 0 , 10";
    
    $query = $this->db->query($queryConstructor);
    $informacion['query'] = $query;
    $this->load->view('mostrarRecomendacion', $informacion);
  }
  
  
    function youbiquitour($clusterID, $user){

    //Se obtiene la cantidad total de visitas para ver los items en el cluster $cluster
    $queryConstruct = "SELECT count(*) frecuenciaTotal
                FROM user_preferences, cluster, divider, items
                WHERE cluster.clusterID = divider.clusterID
                AND divider.positionID = items.positionID
                AND items.itemID = user_preferences.itemID
                AND cluster.clusterID = $clusterID";
    $query  = $this->db->query($queryConstruct);
    foreach ($query ->result() as $row){
      $frecuenciaTotal  =  $row->frecuenciaTotal;
    }

    $this->load->library('ruser');
    $this->ruser->setFrecuenciaTotal($frecuenciaTotal);
  
  
     $queryConstruct  = "SELECT items.itemID
                FROM cluster, divider, items
                WHERE cluster.clusterID = divider.clusterID
                AND divider.positionID = items.positionID
                AND cluster.clusterID = $clusterID";
    $query  = $this->db->query($queryConstruct);
    $this->ruser->setListaItemsCluster($query);
    
    //Se obtiene la cantidad de visitas de cada item en el cluster $cluster
    $queryConstruct  =  "SELECT items.itemID, count(*) as frecuency
                FROM user_preferences, cluster, divider, items
                WHERE cluster.clusterID = divider.clusterID
                AND divider.positionID = items.positionID
                AND items.itemID = user_preferences.itemID
                AND cluster.clusterID = $clusterID GROUP BY items.itemID
                ORDER BY frecuency desc";
    $query = $this->db->query($queryConstruct);
    $this->ruser->setListaFrecuenciaVisitasItems($query);
    
       //Encontrar la lista de los items que estan dentro del $cota
    $itemsMasVisitados = $this->ruser->setCantidadItemsAceptados(0.75);

    $items = "";
    $pasaje = true;
    $queryConstruct = "SELECT userID
               FROM `user_preferences` WHERE";
    foreach($itemsMasVisitados as &$value){
      if($pasaje){
        $items  =  $items." itemID = $value ";
        $pasaje = false;
      }else{

        $items  =  $items." OR  itemID = $value ";
      }
      
    }
    $queryConstruct = $queryConstruct.$items." GROUP BY userID";

    $query  =  $this->db->query($queryConstruct);
    $arrayUsuarios = array();

    foreach($query->result() as $row){
      array_push($arrayUsuarios, $row->userID);
    }
    
        $pasaje = true;
    
    foreach($arrayUsuarios as $key=>$userID){
      if($pasaje){
        $queryConstruct  =  "SELECT userID, itemID, preference
                      FROM user_preferences
                      WHERE userID = $arrayUsuarios[$key]";
        $pasaje  = false;
      }else{
        $queryConstruct  =  "$queryConstruct UNION SELECT userID, itemID, preference
                      FROM user_preferences
                      WHERE userID = $arrayUsuarios[$key]";
      }
    }

    $query  =  $this->db->query($queryConstruct);
    $userPreferencesList = array();

    foreach ($query->result() as $row) {
      array_push($userPreferencesList, array("userID"=>$row->userID, "itemID"=>$row->itemID, "preferences"=>$row->preference));
    }

        /*
     * *****************************************
     * JACCARD**********************************
     * *****************************************
     */


    //Obtenemos la cantidad de items en el museo
    $queryConstruct  = "SELECT count(*) nItemsMuseo
                      FROM items";
    $query  = $this->db->query($queryConstruct);

    foreach($query->result() as $row){
      $nItemsMuseo = $row->nItemsMuseo;
    }

    
    $this->load->library('jaccard');
    $this->jaccard->setNItemsMuseo($nItemsMuseo);

    //Obtenemos la lista de los items del usuarioActivo
    $queryConstruct  =  "SELECT userID, itemID, preference
                  FROM user_preferences
                  WHERE userID = $user";
    $query  = $this->db->query($queryConstruct);
    $activeUserItems  = array();
    foreach ($query->result() as $row){
      array_push($activeUserItems, array("userID"=>$row->userID, "itemID"=>$row->itemID, "preferences"=>$row->preference));
    }

    $queryConstruct  =  "SELECT itemID
                  FROM items";
    $idItemsMuseo  =  $this->db->query($queryConstruct);
    

    $this->jaccard->setActiveUserHistory($activeUserItems, $idItemsMuseo);

    //Para la comparacion de cada usuarioRelevante
    
    foreach($arrayUsuarios as $key=>$userID){
      
      if($arrayUsuarios[$key] != $user){
        $queryConstruct  =  "SELECT userID, itemID, preference
                  FROM user_preferences
                  WHERE userID = $arrayUsuarios[$key]";
        $query  = $this->db->query($queryConstruct);
        $relevantUserItems  = array();
        foreach ($query->result() as $row){
          array_push($relevantUserItems, array("userID"=>$row->userID, "itemID"=>$row->itemID, "preferences"=>$row->preference));
        }
        
        $this->jaccard->setRelevantUserHistory($relevantUserItems, $idItemsMuseo);
        $this->jaccard->similityAndDistance($arrayUsuarios[$key], $idItemsMuseo);
      }
    }

    $recommendUser =  $this->jaccard->getRecommenderUser();
    return $recommendUser;
  }

}
  ?>
