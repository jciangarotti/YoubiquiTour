<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of museum
 *
 * @author changa
 */
class Museum extends Controller {
    
    function Museum(){
      parent::Controller();
      $this->load->library('session');
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->database();

      $this->load->library('user');
    }



    function museum(){
      //Controlador que envía a la vista para poder ver el museo

      //Datos de la sesion del usuario
      $name     =   $this->session->userdata('name');
      $userID   =   $this->session->userdata('userID');
      $activiti =   $this->session->userdata('activiti');

      if($activiti){
        $this->load->library('image_lib');
        $this->db->select('clusterID, name, explain, top, left, pathImagen');
        $this->db->from('cluster');
        $info['cluster'] = $this->db->get();



        $this->load->view('museo', $info);
      }else{
        $this->index();
      }



    }


    function numeroSala($numeroSala){

      //Datos de la sesion del usuario
      $name     =   $this->session->userdata('name');
      $userID   =   $this->session->userdata('userID');
      $activiti =   $this->session->userdata('activiti');
      $arregloItems  =   $this->session->userdata('arregloItems');

      print_r($arregloItems);



      if($activiti){
        $this->db->select('items.itemID as itemID, items.name as name');
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
      }else{
         $this->index();
      }
    }



    function numeroItem($itemID){



      //Datos de la sesion del usuario
      $name         =   $this->session->userdata('name');
      $userID       =   $this->session->userdata('userID');
      $activiti     =   $this->session->userdata('activiti');
      $arregloItems  =   $this->session->userdata('arregloItems');


      if($activiti){
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
        print_r($arregloItems =   $this->session->userdata('arregloItems'));
        $arregloItems = $this->user->setNextItem($arregloItems, $itemID);



        $this->session->set_userdata('arregloItems', $arregloItems);

        print_r($this->session->userdata('arregloItems'));
        print_r($arregloItems);

        $info['clusterID'] = $clusterID;
        $this->load->view('showItem', $info);
      }else{
        $this->index();
      }
    }
}
?>
