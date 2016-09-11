<?php
class Receta extends DataMapper
{
	var	$table			=		'recetas';
	var $has_many		=		array('foto', 'ingrediente');
	var $has_one		=		array('user');
	
	function Receta()
	{
		parent::DataMapper();
	}
}

/*** Location: ./application/models/receta.php ****/
?>