<?
  $this->load->library('table');
  $data = array(
    array(anchor('administracion/spearman','Calcular Spearman&nbsp;&nbsp;')),
  );
  echo $this->table->generate($data); 
?>