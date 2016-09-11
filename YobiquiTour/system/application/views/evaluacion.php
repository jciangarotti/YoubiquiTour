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
    <script type="text/javascript" src="<?=base_url()?>js/validador.js"></script>
   


    <title>Experimento Ubiquitour - Index</title>
  </head>
  <body>
    <div id="bg">
      <div id="wrap">
	<div id="header">
	<h1>Experimento - Youbiquitour</h1>
	<ul id="nav">
	  <li class="h" ></li>
	  <li class="a"></li>
	  <li class="p"></li>
	  <li class="c"></li>
	  <li class="d"></li>
	</ul>
      </div>
      <!-- /header -->
      <div id="content">
        
        <?$this->session->set_userdata('arregloItems', 0);?>
        <?
          $contador =0;
        ?>
        <p>Ingresa la evaluación de por lo menos 1 de los elementos que viste (1 = Lo peor - 5 Lo mejor)</p>
        <?$attributes = array('onSubmit' => 'return ValidaEvaluaciones(this);', 'name'  => 'evaluaciones');?>
        <? echo form_open('inicio/ingresarEvaluacion', $attributes); ?>
        <?php foreach ($query->result() as $row):?>
          <?$anchor = "<a href='".base_url()."$row->path'
                          rel='lightbox'
                          title='$row->name'> $row->name</a>";?>
          <?=$anchor?>
          &nbsp; &nbsp;
          <?
            for($i = 1; $i<6; $i++){
              echo $i;
              $data = array(
                'name'        => "elemento".$contador,
                'id'          => $contador,
                'value'       => $row->itemID."-".$i,
                'style'       => 'margin:9px',
            );
            echo form_radio($data);
          }?>
          <br/>
          <? $contador++; ?>
        <?php endforeach;?>
        <?=form_hidden('contadorElementos', $contadorElementos);?>
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