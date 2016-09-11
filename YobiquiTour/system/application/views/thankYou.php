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
        <p><center>Gracias por sus evaluaciones</center></p>
        <a href="<?=base_url()?>index.php/culturalheritage/getRecommendationFromYoubiquitour/<?=$userID?>">Obtener Recomendaciones</a>
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