<?php
class Ingrediente extends DataMapper
{
	var $table			=		'ingredientes';
	var $has_many		=		array('receta');
	
	function Ingrediente()
	{
		parent::DataMapper();
	}
}
/*** Location: ./application/models/ingrediente.php ****/
?>