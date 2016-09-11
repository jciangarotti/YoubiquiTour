<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cosinedistance
 *
 * @author changa
 */
class Cosinedistance {
    var $userPath = array();
    /**
     *
     * @param $userPath Lista con los items del usuario activo en cuestión
     */
    function Cosinedistance(){
    
    }
    
    function disCos($userPath){
      $this->userPath = $userPath;
      //print_r($userPath);
    }




    /**
     * @param $relevantUsers Lista con los usuarios relevantes sus respectivos items y evaluaciones
     */
    function getRecommenderUser($relevantUsers, $cantidadItemsCluster){
      $vectorMainUser;  //Usuario Activo
      $vectorSecondUser;
      $contadorUser = 1;
      $numerador = 0;
      $denominador = 0;
      $maxCosine = 0;
      $userWithMaxCosine = 0;
      
     
      //echo "La cantidad de item que hay es ". $cantidadItemsCluster;
      for($i=0; $i<=$cantidadItemsCluster; $i++){
        $vectorMainUser[$i] = 0;  //El usuario activo
        $vectorSecondUser[$i] = 0;
      }


      foreach($this->userPath as $row){
        //echo $row."<br/>";
        $vectorMainUser[$row]=1;
      }

      
      foreach($relevantUsers as $row){
        $idItem = $row['itemID'];
        
        if($contadorUser==$row['itemID']){
          $vectorSecondUser[$row['itemID']] = 1;
          

        }else{
          $vectorSecondUser[$idItem] = 1;
          if($this->getCosineDistance($vectorMainUser, $vectorSecondUser, $cantidadItemsCluster) >= $maxCosine){
            //echo "La distancia del coseno es: ".$this->getCosineDistance($vectorMainUser, $vectorSecondUser, $cantidadItemsCluster);
            $maxCosine = $this->getCosineDistance($vectorMainUser, $vectorSecondUser, $cantidadItemsCluster);
            $userWithMaxCosine = $row['userID'];
          }
          
          $contadorUser = $row['userID'];
          
        }
        
      }
      return $userWithMaxCosine;
    }
    
    function getCosineDistance($vectorMainUser, $vectorSecondUser, $cantidadItemCluster){
      $numerador = 0;
      $denominador = 1;

      for($i = 0; $i<= $cantidadItemCluster; $i++){
        $numerador = $numerador + ($vectorMainUser[$i]*$vectorSecondUser[$i]);
        $denominador = $denominador * (sqrt($vectorMainUser[$i])*sqrt($vectorSecondUser));
        
      }
      if($denominador==0){
          $denominador=1;
        }
      return $numerador/$denominador;
    }

}
?>
