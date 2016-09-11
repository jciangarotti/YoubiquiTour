<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RUser
 *
 * @author changa
 */
class Ruser {
    var $frecuenciaTotal         =  0; //Frecuencia total que se ha visitado algun item del cluster
    Var $cantidadItemsAceptados  =  0; //Cantidad de items que serán analizados con los diferentes usuarios del cluster
    var $listaItemsCluster       =  array(); //Lista con los items del cluster
    var $listaFrecuenciaVisitasItems; //Lista con las frecuencias de los respectivos ítems del cluster

    function Ruser(){
      
    }

    function setFrecuenciaTotal($frecuenciaTotal){
      $this->frecuenciaTotal  =  $frecuenciaTotal;
      
    }

    /*
     * setListaItemsCluster
     * Crea el arreglo con la lista de los items del cluster y los guarda en
     * $listaItemsCluster
     * @var set: $this->listaItemsCluster
     */
    function setListaItemsCluster($listaItemsCluster){
       foreach($listaItemsCluster->result() as $row){
         array_push($this->listaItemsCluster, $row->itemID);
       }
    }

    /*
     * setListaFrecuenciaVisitasItems
     * Setea el arreglo $listaFrecuenciaVisitasItems para poder guardar el id del item
     * con su frecuencia.
     * @var set: $this->listaFrecuenciaVisitasItems[].
     */
     function setListaFrecuenciaVisitasItems($listaFrecuenciaVisitasItems){
        foreach($listaFrecuenciaVisitasItems->result() as $row){
          $frecuency       =  $row->frecuency;
          $totalFrecuency  =  $this->frecuenciaTotal;
          $ponderacion     =  $frecuency/$totalFrecuency;
          $this->listaFrecuenciaVisitasItems[$row->itemID] =  $ponderacion;
        }
     }

     /*
      *
      */
     function setCantidadItemsAceptados($cota){
       $totalItems           =  count($this->listaFrecuenciaVisitasItems); //Total de items del arreglo
       $porcentajeAcumulado  =  0.0;
       $contadorItems        =  0;
       $itemsMasVisitados    =  array();
       $porcentajeAcumulado = 0;
       
       foreach ($this->listaFrecuenciaVisitasItems as $key => $items){
         $frecuenciaItem = $this->listaFrecuenciaVisitasItems[$key];
         
         if($porcentajeAcumulado+$frecuenciaItem <= $cota){
           $porcentajeAcumulado = $porcentajeAcumulado+$frecuenciaItem;
           $contadorItems++;

         }else{
           if($contadorItems==0){
             $contadorItems++;
           }
           break;
         }
       }
       $this->cantidadItemsAceptados = $contadorItems;

       $contador = 0;
       foreach ($this->listaFrecuenciaVisitasItems as $key => $items) {
        if($contador<$this->cantidadItemsAceptados){
          $contador++;
          array_push($itemsMasVisitados, $key);
        }else{
          break;
        }
       }
       
       return $itemsMasVisitados;
     }

     
    

}
?>
