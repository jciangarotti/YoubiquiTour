<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>style.css" />
    <title>Experimento Taste - Evaluación</title>
  </head>
  <body>
  <div id="bg">
    <div id="wrap">
      <div id="header">
	<h1>Experimento</h1>
	<ul id="nav">
	  <li class="h"></li>
	  <li class="a"></li>
	  <li class="p"></li>
	  <li class="c"></li>
	  <li class="d"></li>
	</ul>
      </div>
      <!-- /header -->
      <div id="content">
	<?
	  $contador =0;
	?>
	<p>Coloca nota a estos elementos (1 = Lo peor - 5 Lo mejor)</p>
	<? echo form_open('welcome/ingresarEvaluacion'); ?>
	  <?php foreach($items ->result() as $row):?>
	    <?=$row->movie_name?>
	    &nbsp; &nbsp;
	    <?
	      for($i = 1; $i<6; $i++){
		echo $i;
		$data = array(
		      'name'        => $contador,
		      'id'          => $contador,
		      'value'       => $row->item_id."-".$i,
		      'style'       => 'margin:9px',
	      );
	      echo form_radio($data);
	    }?>
	    <br/>
	    <? $contador++; ?>
	  <?php endforeach;?>
	  </br>
	  <?echo form_submit('Aceptar', 'ok');?>
	<? echo form_close(); ?>
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