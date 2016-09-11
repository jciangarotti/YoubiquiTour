<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenericUser
 *
 * @author changa
 */


class Genericuserclass{

    var $userName;
    var $userPosition;

    
    function Genericuserclass(){
    }

    function setDataUser($userName, $userPosition){
      $this-> userName = $userName;
      $this-> userPosition = $userPosition;
    }

    function getUserName(){
      return $this->userName;
    }

    function getPosition(){
      return $this->userPosition;
    }
}
?>
