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
        <p> Estas son las recomendaciones para:
          <?=$this-> session->userdata('userID')?>
       </p>
       <p>
        
        <br/>
        <?$contador = 1;?>
        <? $this->table->set_heading('ID Item&nbsp;&nbsp;', 'Nombre', 'Evaluación');?>
        <? echo form_open('inicio/evaluacionDeUsuario'); ?>
        <?foreach ($query->result() as $row)
          {
            $data_vista = array(
              'name'        => $contador,
              'value'       => $contador,
              'maxlength'   => '2',
              'size'        => '2',
            );

            $data = array(
              $contador+10        => $row->itemID,
            );

            $anchor = "<a href='".base_url()."$row->path'
                          rel='lightbox'
                          title='$row->name'> $row->name</a>";

            $this->table->add_row($row->itemID,  $anchor."&nbsp;&nbsp;&nbsp;&nbsp;", form_input($data_vista));
            echo form_hidden($data);
            $contador++;

          }
          echo $this->table->generate();
          echo "<br/>";
          $minimoRecomendacion = array(
            'topeRecomendacion'   =>  $contador
          );
          echo form_hidden($minimoRecomendacion);
        ?>
        <?echo form_submit('Aceptar', 'ok');?>
        <? echo form_close(); ?>


      </p>
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