<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>style.css" />
    <script src="<?=base_url()?>js/jquery.js" type="text/javascript"></script>
    <script src="<?=base_url()?>js/validador.js" type="text/javascript"></script>
    <script>
      $('#museo a').tooltip({
        track: true,
        delay: 0,
        showURL: false,
        showBody: " - ",
        fade: 250
      });
    </script>
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
	  <li class="h" ><a href="<?=base_url()?>" <?if($itemsVisitados<10){ echo "onclick='return ValidaNumeroItemsVisitados()'";} ?> >Cerrar Sesion</a></li>
	  <li class="a"></li>
	  <li class="p"></li>
	  <li class="c"></li>
	  <li class="d"></li>
	</ul>
      </div>
      <!-- /header -->
      <div id="content">
        <p>Haz clic en alguna de las salas para poder ingresar y poder ver los diferentes items respectivos. Ten en cuenta que cada color representan diferentes temáticas</p>
        <p>
          <ul>
            <li><img src="<?=base_url()?>images/colores/cuadradoNaranjo.png"> Antiguos Egipcios</li>
            <li><img src="<?=base_url()?>images/colores/cuadradoVioletaOscuro.png"> Medio Este</li>
            <li><img src="<?=base_url()?>images/colores/cuadradoVerde2.png"> Europa</li>
            <li><img src="<?=base_url()?>images/colores/cuadradoTurqueza7.png"> Antigua Grecia y Roma</li>
            <li><img src="<?=base_url()?>images/colores/cuadradoAzul1.png"> Temática</li>
          </ul>
          </br>
        </p>
        <table  border="1" width="380" height="620" align="center" bgcolor="#ffffff" >
            <tr>
              <th valign="top">
                <div id="museo" style="position: relative" >
                  
                  <div style="position:absolute; top:0px; left:0px;">
                    <a title="XXXXXXXXXX" href="numeroSala/94"><img src="<?=base_url()?>images/museo/94.gif" style="opacity:0.4;filter:alpha(opacity=40)"
                        onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100"
                        onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40"/></a>
                  </div>

                  <div style="position:absolute; top:70px; left:0px;">
                    <a href="numeroSala/91"><img src="<?=base_url()?>images/museo/91.gif" style="opacity:0.4;filter:alpha(opacity=40)"
                        onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100"
                        onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40"/><a>
                  </div>


                  <div style="position:absolute; top:70px; left:61px;">
                    <a href="numeroSala/90"><img src="<?=base_url()?>images/museo/90.gif"
                          style="opacity:0.4;filter:alpha(opacity=40)"
                          onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100"
                          onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40"/></a>
                  </div>

                  <? foreach($cluster->result() as $row){ ?>
                    <div style="position:absolute; top: <?=$row->top?> left: <?=$row->left?>">
                      <a title="<?=$row->name?> <?=$row->explain?>" href="numeroSala/<?=$row->clusterID?>"><img src="<?=base_url()?><?=$row->pathImagen?>"
                          style="opacity:0.4;filter:alpha(opacity=40)"
                          onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100"
                          onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40"/></a>
                    </div>
                  <?}?>
                 


                </div>
              </th>
            </tr>
        </table>




       

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