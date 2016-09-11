<?php
class Evaluacion extends DataMapper
{
	var $table			=		'evaluaciones';
	var $has_one		=		array('user, receta');
	
	function Evaluacion()
	{
		parent::DataModel();
	}
}
/*** Location: ./application/models/evaluacion.php ****/
?>