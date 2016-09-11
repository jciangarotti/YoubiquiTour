<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jaccard
 *
 * @author changa
 */
class Jaccard {
  var $nItemsMuseo  =  0;       //Cantidad de items en el museo
  var $activeUserHistory;  //Arreglo que contendrá los items vistos por el usuario activo
  var $relevantUserIHistory; //Arreglo que contendrá los items vistos por el usuario relevante I

  var $activeUserItems; //variable contiene array(userID, itemID, preference) del usuario activo
  var $simility;        //Arreglo que guardará la similitud de cada usuario
  var $distance;        //Arreglo que guardará la distancia de cada usuario

  var $recommenderUser; //Variable que guarda los usuarios recomendados



  function setNItemsMuseo($nItemsMuseo){
    $this->nItemsMuseo = $nItemsMuseo;
  }

  function setActiveUserHistory($activeUserItems, $idItemsMuseo){
    //Se construye el arreglo del tamaño del museo 0 para el total de items
    foreach($idItemsMuseo->result() as $row){
      $this->activeUserHistory[$row->itemID]=0;
    }
    

    foreach($activeUserItems as $items){
        $position = $items['itemID'];
        //echo "<br>Position: $position";
        $this->activeUserHistory[$position]  = 1;  //Valor 1 a los items vistos por el usuario
    }
  }

  function setRelevantUserHistory($relevantUserItems, $idItemsMuseo){
    //Se construye el arreglo del tamaño del museo 0 para el total de items
    foreach($idItemsMuseo->result() as $row){
      $this->relevantUserIHistory[$row->itemID]=0;
    }
    
    foreach($relevantUserItems as $items){
        $position = $items['itemID'];
        $this->relevantUserIHistory[$position]  = 1;  //Valor 1 a los items vistos por el usuario
    }
  }

  function similityAndDistance($relevantUserID, $idItemsMuseo){
    $m11  = 0;
    $m01  = 0;
    $m10  = 0;
    $m00  = 0;
    
    foreach($idItemsMuseo->result() as $row){
      $itemAU = $this->activeUserHistory[$row->itemID];
      $itemRU = $this->relevantUserIHistory[$row->itemID];
      
      if($itemAU == 1 && $itemRU == 1){
        $m11++;
      }
      if($itemAU == 0 && $itemRU == 1){
        $m01++;
      }
      if($itemAU == 1 && $itemRU == 0){
        $m10++;
      }
      if($itemAU == 0 && $itemRU == 0){
        $m00++;
      }
    }
    //Calculo similitud Jaccard
    $sim = $m11/($m01+$m10+$m11);
    $dis = ($m01+$m10)/($m01+$m10+$m11);


    $this->simility[$relevantUserID] = $sim;
    $this->distance[$relevantUserID] = $dis;
  }

  function getSimility(){
    return $this->simility;
  }

  function getDistance(){
    return $this->distance;
  }

  function getRecommenderUser(){
    $maxSimility = max($this->simility);
    
    foreach($this->simility as $key => $value) {
      if($value == $maxSimility){
        $this->recommenderUser = $key;
      }
    }
    return $this->recommenderUser;
  }
}
?>
