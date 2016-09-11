<?php
class Inicio extends Controller
{
	function Inicio(){
	
      parent::Controller();
      $this->load->library('session');
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->database();

      $this->load->library('user');

      
  
    }
	
	function index()
	{
		//Datos de la sesion del usuario
      $name         =   $this->session->userdata('name');
      $userID       =   $this->session->userdata('userID');
      $activiti     =   $this->session->userdata('activiti');
      $arregloItems =   $this->session->userdata('arregloItems');


      //Obtener la cantidad de evaluaciones realizadas por el usario
      $query = $this->db->query("SELECT count(*) as cuenta 
          FROM user_preferences
          WHERE userID = '$userID'");
      foreach ($query->result() as $row){
        $cuenta = $row->cuenta;
	    }


      $explodeItemsVistos = explode('-', $arregloItems);
      $contadorElementos = 0;
      $query = "";
      foreach ($explodeItemsVistos as $i => $value) {
        $contadorElementos++;
        if($contadorElementos == 2){
          $queryConstructor =  "SELECT itemID, name, path
                    FROM items
                    WHERE itemID = ".$explodeItemsVistos[$i];
        }else if($contadorElementos > 2){
          $queryConstructor =  $queryConstructor." UNION
                    SELECT itemID, name, path
                    FROM items
                    WHERE itemID = ".$explodeItemsVistos[$i];
        }
      }

      

      //echo "la cantidad de elementos es: ".$contadorElementos;
      
      if($contadorElementos>0 && isset($explodeItemsVistos[1])){
        $query = $this->db->query($queryConstructor);

        $dato['query']  = $query;
        $dato['contadorElementos'] = $contadorElementos;
        $this->load->view('evaluacion', $dato);
        
      }else{
        if($activiti){
          /*
          if($cuenta<1){
            $this->load->view('evaluar');
          }
          */

          //Actualizamos el estado del usuario
          $dataUpdate = array(
            'activiti' => false,
          );

          $this->db->where('userID', $userID);
          $this->db->update('users', $dataUpdate);

        }
        $this->session->sess_destroy();
        
        $this->load->view('index_experimento');
      }
	}
	
	
function addUser(){
      $name = $this->input->post('name');
      $password = md5($this->input->post('password'));

      //Verificar si el usuario existe
      $query = $this->db->query("SELECT count(*) as cuenta FROM users WHERE name = '$name'");
      foreach ($query->result() as $row){
        $cuenta = $row->cuenta;
	    }

      //En caso de que no exista
      if($cuenta == 0){
        $insert_usersName = array(
          'name'		=>	$name,
          'password'	=>	$password,
          'activiti'  =>  true,
        );
        $this->db->insert('users', $insert_usersName);

        //Obtenemos el id del usuario
        $query = $this->db->query("SELECT userID FROM users WHERE name = '$name' ");
        foreach ($query->result() as $row){
          $userID = $row->userID;
        }

        $newdata = array(
         'name'                       =>  $name,
          'userID'                    =>  $userID,
          'activiti'                  =>   true,
          'clustersVisitados'         =>  "",
          'itemsVisitados'            =>  0,
         );

         $this->user->setUserID($userID);
         $this->session->set_userdata($newdata);
         $this->museum();

         
      }else{  //El usuario ya existe.

        //Obtenemos el id del usuario
        $query = $this->db->query("SELECT userID FROM users WHERE name = '$name' ");
        foreach ($query->result() as $row){
          $userID = $row->userID;
        }

        
        //Actualizamos el estado del usuario
        $dataUpdate = array(
          'activiti' => true,
        );
        $this->db->where('userID', $userID);
        $this->db->update('users', $dataUpdate);
        $arregloItems = array();

       

        $sessionData = array(
          'name'                =>  $name,
          'userID'              =>  $userID,
          'activiti'            =>   true,
          'clustersVisitados'   =>  "",
          'itemsVisitados'      =>  0,
        );

        
        $this->session->set_userdata($sessionData);

        $this->museum();
      }
    }
    
    
        function museum(){
      //Controlador que envía a la vista para poder ver el museo
      
      //Datos de la sesion del usuario
      $name           =   $this->session->userdata('name');
      $userID         =   $this->session->userdata('userID');
      $activiti       =   $this->session->userdata('activiti');
      $itemsVisitados =   $this->session->userdata('itemsVisitados');

      
      $this->load->library('image_lib');
      $this->db->select('clusterID, name, explain, top, left, pathImagen');
      $this->db->from('cluster');
      $info['cluster'] = $this->db->get();



      $this->load->view('museo', $info);
      
    }
    
    
	function numeroSala($numeroSala){

      //Datos de la sesion del usuario
      $name           =   $this->session->userdata('name');
      $userID         =   $this->session->userdata('userID');
      $activiti       =   $this->session->userdata('activiti');
      $arregloItems   =   $this->session->userdata('arregloItems');
      $itemsVisitados =   $this->session->userdata('itemsVisitados');


      
      
        $this->db->select('items.itemID as itemID, items.name as name, items.path as path');
        $this->db->from('items, divider, cluster');
        $this->db->where("cluster.clusterID = '$numeroSala' AND cluster.clusterID = divider.clusterID AND divider.positionID = items.positionID");
        $info['items'] = $this->db->get();


        $query = $this->db->query("SELECT path FROM items WHERE itemID = '$numeroSala' ");
        foreach ($query->result() as $row){
            $path = $row->path;
        }

        $query = $this->db->query("SELECT count(*) as contadorItemsSala
                  FROM items, divider, cluster
                  WHERE cluster.clusterID = $numeroSala
                  AND cluster.clusterID = divider.clusterID
                  AND divider.positionID = items.positionID ");
        
        foreach ($query->result() as $row){
          $contadorItemsSala = $row->contadorItemsSala;
        }

        
        $info['path'] = $path;
        $info['contadorItemsSala'] = $contadorItemsSala;
        $this->load->view('sala', $info);
      
    }
    
    
        function numeroItem($itemID){
      
      //Datos de la sesion del usuario
      $name               =   $this->session->userdata('name');
      $userID             =   $this->session->userdata('userID');
      $activiti           =   $this->session->userdata('activiti');
      $arregloItems       =   $this->session->userdata('arregloItems');
      $clustersVisitados  =   $this->session->userdata('clustersVisitados');
      $itemsVisitados     =   $this->session->userdata('itemsVisitados');
      

      $this->db->select('items.path as path, items.name as name');
      $this->db->from('items');
      $this->db->where("itemID = $itemID");
      $info['items'] = $this->db->get();

      $query = $this->db->query("SELECT cluster.clusterID as clusterID
        FROM cluster, divider, items
        WHERE items.itemID =$itemID
        AND items.positionID = divider.positionID
        AND divider.clusterID = cluster.clusterID");

      foreach ($query->result() as $row){
        $clusterID = $row->clusterID;
      }

      /*
       * Cada vez que el usuario ingrese a ver cada item se guardadrá el
       * cluster al cual pertenece el ítem.
       * Pasos:
       * 1.- Ver si la variable $clustersVisitados tiene o no items ya que
       * depende de eso para poder concatenar
       * 2.- Si la variable $clustersVisitados tiene elementos se optiene un
       * nuevo arreglo para revisar si el cluster que se ingresa está en la lista
       * 3.- Si es que el cluster no esta se concatena con los demas
       * 4.- Se guarda en la variable de sesion
       */
      if($clustersVisitados == ""){
        
        $this->session->set_userdata('clustersVisitados', $clusterID);
        
        

      }else{
        $arregloClustersVisitados   = explode("-", $clustersVisitados);
        if(!in_array($clusterID,$arregloClustersVisitados)){
          
          $clustersVisitados = $clustersVisitados."-".$clusterID;
          $this->session->set_userdata('clustersVisitados', $clustersVisitados);
        }
        

      }

      $arregloItems    = $this->user->setNextItem($arregloItems, $itemID);

      $itemsVisitados    = count(explode('-', $arregloItems))-1;
      $this->session->set_userdata('arregloItems', $arregloItems);

      
      $this->session->set_userdata('itemsVisitados', $itemsVisitados);
        
        $info['clusterID'] = $clusterID;
        $this->load->view('showItem', $info);
      }

      function ingresarEvaluacion(){
        $userID             =   $this->session->userdata('userID');


        $contadorElementos  =   $this->input->post('contadorElementos');

        for($i=0; $i<$contadorElementos-1; $i++){
          $item = $this->input->post("elemento".$i);
          list($itemID, $preference) = explode('-', $item);
          $data_insert = array(
            "userID" 	=> $userID,
            "itemID" 	=> $itemID,
            "preference"   	=> $preference,
          );
          $this->db->insert('user_preferences', $data_insert);

          /*
           * *********************************
           * Actualización del rating del item
           * *********************************
           */
          $sumaPreference = 0;
          $contadorPreference = 0;
          $promedioPreference = 1;
          $queryConstructor = "SELECT preference
                    FROM user_preferences
                    WHERE itemID = $itemID";
          $query = $this->db->query($queryConstructor);
          foreach ($query->result() as $row){
            $sumaPreference = $row->preference;
            $contadorPreference++;
          }
          
          $promedioPreference = $sumaPreference/$contadorPreference;
          
           //Actualizamos el estado del usuario
          $dataUpdate = array(
            'rating' => $promedioPreference,
          );

          $this->db->where('itemID', $itemID);
          $this->db->update('items', $dataUpdate);



          $information['userID']  = $userID;
        }


        $this->load->view('thankYou', $information);

      }
      

      function evaluacionDeUsuario(){
        $this->load->library('spearmanclass');
        $userID 	= $this-> session->userdata('userID');

        $topeRecomendacion = $this->input->post('topeRecomendacion');
        $cantidadRecomendaciones = 10;
        $data = array(); //Guardara las evaluaciones del recomendador y el usuario
        for($i=1; $i<$topeRecomendacion; $i++){
          $User_position = $this->input->post($i);
          $Recommender_position = $i;
          $Item_id = $this->input->post($i+$cantidadRecomendaciones);
          $data_insert = array(
            "UserID" 			=> $userID,
            "Item_id" 		=> $Item_id,
            "Recommender_position"   	=> $Recommender_position,
            "User_position"   	=> $User_position,
          );
          $this->db->insert('user_recomendation_evaliation', $data_insert);

          //arreglo para poder guardar en $data y enviar a spearman
          $value = array(
            "UserID" 			=> $userID,
            "Recommender_position"   	=> $Recommender_position,
            "User_position"   	=> $User_position,
          );
          array_push($data, $value);

        }

        //Calculo de spearman para ese usuario e ingreso en BDD tabla spearman
        $spearman_insert = $this->spearmanclass->setSpearman($data, false);
        $this->db->insert('pearson', $spearman_insert);

        

        $this->load->view('index_experimento');
      }
	
	
}

?>