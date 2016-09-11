<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stringclass {

    //Recibe un string para poder ser parseado.
    function setParserBuscador($string)
    {
      $arreglo = array();
      $arreglo = split(" ", $string);
      return $arreglo;
    }
}

?>