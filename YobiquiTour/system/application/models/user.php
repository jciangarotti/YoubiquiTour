<?php

class User extends DataMapper
{
	var	$table		=	'users';
	var $has_many 	=	array('receta', 'favorita', 'evaluacion');
	
	function User()
	{
		//model construct
		parent::DataMapper();
	}
	
}

/* Location: ./application/models/user.php	 */
?>