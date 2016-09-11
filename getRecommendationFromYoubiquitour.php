<?
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
  ?>