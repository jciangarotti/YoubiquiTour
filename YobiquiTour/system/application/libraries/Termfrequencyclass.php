<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TermFrequency
 *
 * @author changa
 */
class Termfrequencyclass {
    var $itemsAvtivated = 0.0;
    var $totalItems = 0.0;
    var $itemList;
    var $frecuenciaUsuarios;
    
    var $relevantUser = array();
    var $userPreferencesList = array();
    

    
    function Termfrequencyclass() {
      
    }

    /*
     * @$itemList una lista perteneciente a un cluster en específico con el userID y el itemID visitado
     */
    function tf($itemList){
      $this->itemList = $itemList;
      
      $this->setearArreglo();



      //$this-> frecuenciaUsuarios es un arreglo que tiene las frecuencias que hay dentro del clusterID
      foreach($this->itemList as $row){
        $this-> frecuenciaUsuarios[$row['User']]++;
      }


      //print_r($this-> frecuenciaUsuarios);
    }

    /*
     * getTermFrecuency
     * @$totalItems total de elementos del clusterID
     * @$userPreferencesList lista de items con las preferencias
     */
    function getTermFrequency($itemsActivated, $totalItems, $userPreferencesList){
      $usersFrequency = array();
      //print_r($userPreferencesList);
      $this->userPreferencesList= $userPreferencesList;

      
      for($i = 0; $i<100; $i++){
        $this->frecuenciaUsuarios[$i] = $this->frecuenciaUsuarios[$i]/$totalItems;
        
        
        array_push($usersFrequency, $this->frecuenciaUsuarios[$i]);
        
      }


      $this->relevantUser = array();
      $this->setRelevantUsers($usersFrequency); //Obtengo la lista con los usuarios relevantes y sus items con evaluaciones
      return $this->relevantUser;
    }

    function getMaxFrequency(){
      echo array_count_values($this->itemList);
    }

    private function setearArreglo(){
      for($i=0; $i<100; $i++){
        $this->frecuenciaUsuarios[$i] = 0;
      }
    }

    /*
     * Entrega un vector con los usuarios relevantes y sus respectivos items y preferencias
     */

    private function setRelevantUsers($usersFrequency){
      //print_r($usersFrequency);
      $maxFrequency =  max($usersFrequency);

      
      $contador = 0;
      $pivote= 0;
      
      //Cada vez que cambia de usuario se cambia en el pivote....
      foreach($this->userPreferencesList  as $row){
        if($row['userID']!= $pivote){
          $pivote = $row['userID'];
          
        }else{
          
        }
      }
      
      foreach($usersFrequency as $row){
        $frequency = $row;
        
        if($frequency == $maxFrequency){
          foreach($this->userPreferencesList  as $row2){
            if($row2['userID']== $contador){
              array_push($this->relevantUser, array("userID"=>$row2['userID'], "itemID"=>$row2['itemID'], "preferences"=>$row2['preferences']));
            }
          }
        }
        $contador++;
      }

      
      
    }


}
?>
