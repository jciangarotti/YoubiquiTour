<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>style.css" />
    <title>Experimento Ubiquitour - Index</title>
  </head>
  <body>
    <div id="bg">
      <div id="wrap">
	<div id="header">
	<h1>Experimento - Youbiquitour</h1>
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
	<p>Identificate con  un nombre de usuario y clave</p>
	<p> 
	  <?
	    $this->session->sess_destroy();

	    echo form_open('inicio/addUser');
	    $name = array(
		    'name'	=> 'name',
		    'type'	=> 'text',
		  );
	    echo "NICK: ";
	    echo form_input($name);
	    echo "<br/>";
	    echo "<br/>";
	    $password = array(
	      'name'	=>	'password',
	      'type'	=>	'password',
	    );
	    echo "PASSWORD: ";
	    echo form_input($password);
	    echo "<br/>";
	    echo form_submit('Aceptar', 'ok');
	    
	    
	    echo form_close();
	  ?>
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