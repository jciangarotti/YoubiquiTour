<?php
class Foto extends DataMapper
{
	var	$table			=		'fotos';
	var $has_one		=		array('receta');

	function Foto()
	{
		parent::DataMapper();		
	}
}
/*** Location: ./application/models/foto.php ****/
?>