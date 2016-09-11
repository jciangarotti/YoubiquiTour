<?php


class CargaArchivoModel extends Model
{

	
	function CargaArchivoModel()
	{
		//Constructor
		parent::Model();
		$this->load->database();
	}
	
	
	/*** 
	 * get_recipe_ingredients
	 * Llama a la función get_recipe_ingredients para extraer los ingredientes de de una específica receta de la base de datos.
	 * Call to the get_recipe_ingredients function that obtain the recipe  ingredient from a data base.
	 ***/
	function get_archive_list()
	{
		$r		=		new Carga_archivo();

		$array_list	=	$r->get();
		
		return $array_list;
	}
	
	
}

/*** Location: ./application/models/RecipesModel.php ****/
?>