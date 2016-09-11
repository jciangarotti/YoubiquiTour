
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>style.css" />
    <script src="<?=base_url()?>js/validador.js" type="text/javascript"></script>
    <title>Experimento Youbiquitour - Index</title>
  </head>
  <body>
    <div id="bg">
      <div id="wrap">
	<div id="header">
	<h1>Experimento - Ubiquitour</h1>
  <? $itemsVisitados     =   $this->session->userdata('itemsVisitados');
    echo "Items visitados $itemsVisitados";
  ?>
	<ul id="nav">
	  <li class="h"><a href="<?=base_url()?>" <?if($itemsVisitados<10){ echo "onclick='return ValidaNumeroItemsVisitados()'";} ?>>Cerrar Sesion</a></li>
    <li class="a"><a href="<?=base_url()?>index.php/inicio/museum">Volver al Museo </a></li>
	  <li class="p"></li>
	  <li class="c"></li>
	  <li class="d"></li>
	</ul>
      </div>
      <!-- /header -->
      <div id="content">
      <p>
      Haga clic en uno de los items para poder ver este:
      </p>
       <?=$this->load->view('tableWhithItems')?>
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