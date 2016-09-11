<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of showItem
 *
 * @author changa
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>style.css" />
    <link rel="stylesheet" href="<?=base_url()?>css/lightbox.css" type="text/css" media="screen" />

    <script type="text/javascript" src="<?=base_url()?>js/prototype.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="<?=base_url()?>js/lightbox.js"></script>
    <script src="<?=base_url()?>js/validador.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?=base_url()?>js/validador.js"></script>



    <title>Experimento Ubiquitour - Index</title>
  </head>
  <body>
    <div id="bg">
      <div id="wrap">
	<div id="header">
	<h1>Experimento - Youbiquitour</h1>
  <? $itemsVisitados     =   $this->session->userdata('itemsVisitados');
    echo "Items visitados $itemsVisitados";
  ?>
	<ul id="nav">
	  <li class="h" ><a href="<?=base_url()?>" <?if($itemsVisitados<10){ echo "onclick='return ValidaNumeroItemsVisitados()'";} ?>>Cerrar Sesion</a></li>
	  <li class="a"><a href="<?=base_url()?>index.php/inicio/museum">Volver al Museo </a></li>
	  <li class="p"><a href="<?=base_url()?>index.php/inicio/numeroSala/<?=$clusterID?>">Volver a la Sala </a></li>
	  <li class="c"></li>
	  <li class="d"></li>
	</ul>
      </div>
      <!-- /header -->
      <div id="content">
        <div id="instrucciones">
          <p>Para poder ver la imágen en su tamaño real, haga clic en el nombre.</p>
        </div>
        <div id="info">
        </div>
        <div id="foto" align="center">
        <? foreach($items ->result() as $row):?>
          </br><img width="40%" height="40%"  src="<?=base_url().$row->path?>"/><br>
          <a href="../../../<?=$row->path?>" rel="lightbox" title="<?=$row->name?>"><?=$row->name?>
            
          </a>
        <? endforeach; ?>
        </div>
      </div>

    <!-- /content -->
    <div id="footer">
      <div id="ftinner">
        <div class="ftlink ">
          <p id="copyright">© 2008. All Rights Reserved. <br/>
            Designed by <a href="http://www.free-css-templates.com/">Free CSS Templates</a></p>
        </div>
      </div>
    </div>
    <!-- /footer -->
  </div>
</div>
</body>
</html>