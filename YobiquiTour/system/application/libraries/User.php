<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author changa
 */
class User {
    var $userID;
    var $name;
    var $arregloItems = array();
    
    function User(){
      
    }



    function setUserID($userID){
      $this->userID = $userID;

      
    }

    function setUserName($name){
      $this->name = $name;
    }

    function setNextItem($arregloItems, $itemID){
      
       
      $this->arregloItems = explode('-', $arregloItems);
      
      if(!in_array($itemID, $this->arregloItems)){
        
          $arregloItems = $arregloItems."-".$itemID;
        


      }
      return $arregloItems;
    }

    function getUserID(){
      return $this->userID;
    }

    function getUserName(){
      return $this->name;
    }

    function getItemsSeen(){
      return $this->arregloItems;
    }

    function getNumItemsSeen(){
      return count($this->arregloItems);
    }

}
?>
