<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Experimento Mahout - Control Panel</title>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>style.css" />
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
      <div align="center">
	<?$this->load->view('admin/control_panel_tabla');?>
      </div>
    </div>
    <!-- /content -->
    <div id="footer">
      <div id="ftinner">
        <div class="ftlink ">
          <p id="copyright">© 2008. All Rights Reserved.</p>
        </div>
      </div>
    </div>
    <!-- /footer -->
  </div>
</div>
</body>
</html>
