<?
  $this->session->sess_destroy();
  //Open form 
  echo form_open('administracion/verificarAdmin');
    //Configuracion input nick
    $nick = array(
      'name'	=> 'nick',
      'type'	=> 'text',
    );
    echo "NICK: ";
    echo form_input($nick);
    echo "<br/>";
    echo "<br/>";
    //Configuracion input password
    $password = array(
      'name'	=> 'password',
      'type'	=> 'password',
    );
    echo "PASSWORD: ";
    echo form_input($password);
    echo "<br/>";
    echo form_submit('Aceptar', 'ok');
  //Close form
  echo form_close();
?>