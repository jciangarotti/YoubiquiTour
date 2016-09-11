<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tableWhithItems
 *
 * @author changa
 */



if($contadorItemsSala!=0){
  $verificador = true;
    echo "<table border='0' align='center'  cellspacing='10'>";
    foreach($items ->result() as $row):
      if($verificador){
        echo "<tr>";
        echo "<td width='250' ><a href='../numeroItem/".$row->itemID."'><img width='20%' height='15%' src='".base_url()."$row->path'/></a></td>";
        $nameOne = $row->name;
        
        $verificador = false;
      }else{
        echo "<td width='250' ><a href='../numeroItem/".$row->itemID."'><img width='20%' height='15%' src='".base_url()."$row->path'/></a></td>";
        $nameTwo = $row->name;
        echo "</tr>";

        echo "<tr>";
        echo "<td>".$nameOne."</td><td>".$nameTwo."</td>";
        echo "</tr>";
        $verificador = true;
      }
    endforeach;
  if($contadorItemsSala%2 == 0){
    echo "</tr>";
    echo "</table>";
  }else{
    echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$nameOne."</td><td></td>";
    echo "</tr>";
    echo "</table>";

  }
}else{
  echo "No existe ninguna exposición en este lugar";
}

?>

 