<?php
class Favorita extends DataMapper
{
	var $table			=		'favoritas';
	var $has_one		=		array('user, receta');
	
	function Favorita()
	{
		parent::DataMapper();
	}
}
/*** Location: ./application/models/favorita.php ****/
?>