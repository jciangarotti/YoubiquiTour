<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf8" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/style.css" />
    <title>Experimento Taste - Login Admin</title>
</head>
<body>
<div id="bg">
  <div id="wrap">
    <div id="header">
      <h1>Experimento</h1>
      <ul id="nav">
        <li class="h"><a href="#">HOME</a></li>
        <li class="a"><a href="#">ABOUT</a></li>
        <li class="p"><a href="#">CONTACT</a></li>
        <li class="c"><a href="#">STORE</a></li>
        <li class="d"><a href="#">DONATE</a></li>
      </ul>
    </div>
    <!-- /header -->
    <div id="content">
      <p><h2>Administrador</h2></p>
    
      <p>
	<?$this->load->view('admin/login_admin_form');?>
      </p>
    </div>
    <!-- /content -->
    <div id="footer">
      <div id="ftinner">
        <div class="ftlink ">
          <p id="copyright">© 2008. All Rights Reserved.
        </div>
      </div>
    </div>
    <!-- /footer -->
  </div>
</div>
</body>
</html>
