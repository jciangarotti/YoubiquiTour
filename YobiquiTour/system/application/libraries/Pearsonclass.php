<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spearmanclass {
    


   function printVerbose($string,$boolean){
      if($boolean){
	echo $string;
      }else{
      }
    }



    /*
    * setSpearman Permite calcular Perason a partir de $array
    * @$array: Arreglo asociativo con UserID, Recommender_position, User_position
    * @return $query: Arreglo asociativo con UserID y Spearman
    */
    function setSpearman($array){
      $distancia = 0;
      $distanciaCuadrado = 0;
      $n = 0;			//Cantidad valores
      $spearman = 0;
      $boolean = false;
      

      
      $tabla = "<table border='0' cellpadding='4' cellspacing='0'><tr><td>Valor Recomendador</td><td>Valor Usuario</td><td>Distancia</td><td>n<td></tr>"; //verbose
      //Sumatoria de la distancia
      foreach($array as $i => $value)
      {
	  $valorRecomendador = $array[$i]['Recommender_position'];
	  $valorUsuario = $array[$i]['User_position'];
	  $distancia = $distancia + pow(abs($valorRecomendador-$valorUsuario),2);
	  $n = $i+1;
	  $tabla = $tabla."<tr><td>$valorRecomendador</td><td>$valorUsuario</td><td>$distancia</td><td>$n</td>";//verbose
      }
      $tabla = $tabla."</table>";
      $this->printVerbose($tabla, $boolean); //verbose

      
      
      //Calculamos Spearman
      $spearman = 1-((6*$distancia)/($n*((pow($n,2)-1))));
      $this->printVerbose("1-((6*$distancia)/($n*((pow($n,2)-1)))) = $spearman<br/>", $boolean); //verbose
      
      $query = array(
	'UserID'	=> 	$array[0]['UserID'],
	'Spearman'	=>	$spearman,
      );

      return $query;
      
    }//Fin Funcion setSpearman($array)

    
}

?>