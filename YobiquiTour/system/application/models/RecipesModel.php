<?php


//@todo Crear funcion para obtener en un arreglo los tipos de ingredientes de la tabla Ingredientes


class RecipesModel extends Model
{

	
	function RecipesModel()
	{
		//Constructor
		parent::Model();
		$this->load->database();
	}
	
	/***
	 * save_receta
	 * Llama a las funciones correspondientes para poder ingresar los datos a la base de datos.
	 ***/
	function save_receta($numero_usuario)
	{
		$this->load->helper('security');
		
		
		$cantidad_ingredientes		=		$this->input->post('Cantidad_Ingredientes');
		$id_interno					=		dohash($this->input->post('Nombre_Receta').$numero_usuario,'md5');
		
		$u						=		new User();
		$u->where('id_usuario', $numero_usuario)->get();
		
		$r						=		new Receta();
		$r->nombre_receta		=		$this->input->post('Nombre_Receta');
		$r->comentario			=		$this->input->post('Comentario');
		$r->preparacion			=		$this->input->post('Preparacion');
		$r->rendimiento			=		$this->input->post('Rendimiento');
		$r->unidad_rendimiento	=		$this->input->post('Unidad_Rendimiento');
		$r->tiempo_hora			=		$this->input->post('Tiempo_Hora');
		$r->tiempo_minuto		=		$this->input->post('Tiempo_Minuto');
		
		/*@todo Crear una funcion que obtenga desde el campo ocacion los diferentes tags para poder separarlos con 
		 * un estilo de split y agregarlos a una tabla
		 */
		
		
		$r->save();
		
		$r->save($u);
		
		
		
		for($j = 1; $j<=$cantidad_ingredientes; $j++)
		{
			$i							=		new Ingrediente();
			$i->nombre					=		$this->input->post('Ingrediente_'.$j);
			$i->cantidad_ingrediente	=		$this->input->post('Cantidad_Medida_'.$j);
			$i->nombre_medida			=		$this->input->post('Nombre_Medida_'.$j);
			
			$i->save();
			
			$i->save($r);
			
		}
		
	}
	
	
	/***
	 * La funci—n get_ingredientes obtiene todos los nombres de los ingredientes con sus respectivos id 
	 * para poder retornarlos por medio del arreglo $ingredientes.
	 * @var:  $array_ingredientes: array momentaneo para poder guardar el id y el nombre del ingrediente	 
	 * ***/
	function get_ingredientes()
	{
		$ingredientes		=	array();
		$query				=		$this->db->get('tipo_ingrediente');
		
		foreach($query->result() as $row)
		{
			echo "Id Ingrediente: ".$row->Id_Tipo_Ingrediente."<br/>Nombre Ingrediente:".$row->Nombre_Tipo_Ingrediente;
			$array_ingrediente		=		array(
												"Id_Tipo_Ingrediente"		=>		$row->Id_Tipo_Ingrediente,
												"Nombre Ingrediente"		=>		$row->Nombre_Tipo_Ingrediente
											);
			array_push($ingredientes, $array_ingrediente);
		}
		
		return $ingredientes;		
	}//Fin get_ingredientes ***
	
	/***
	 * La funcion get_ingredientes_dropdown obtiene el nombre de los ingredientes y sus respectivos Id para poder entregarlos 
	 * en un arreglo. El formato del arreglo ser‡ el mismo necesario para poder crear un dropdown en codeigniter
	 * $options = array(
                  'id'  	=> 'Nombre_Ingrediente',
                  'id_2'    => 'lechuga',
                  'id_3'   	=> 'Zapallo',
                  'id_4' 	=> 'Tomate',
                  ''
                );
     * 
	 ***/
	function get_ingredientes_dropdown()
	{
		$ingredientes		=		array();
		$query				=		$this->db->get('tipo_ingrediente');
		
		$ingredientes[0]			=		'Seleccione un ingrediente';	
		
		foreach($query->result() as $row)
		{
			$ingredientes[$row->Id_Tipo_Ingrediente]	=	$row->Nombre_Tipo_Ingrediente;
		}
		
		return $ingredientes;
	}//*** Fin get_ingredientes ***
	
	
	/***
	 * Funci—n set_ingredientes obtiene los campos del formulario recipesForm y los ingresa a la base de datos.
	 ***/
	function set_receta()
	{
		//@todo Terminar de obtener los inputs de las recetas para poder ingresarlos a la base de dato. Agregando cada ingrediente de la receta.
		$this->id_receta				=		'NULL';	
		$this->nombre_receta 			=  		$this->input->post('Nombre_Receta');
		$this->path_imagen				=		'';
		$this->comentario				=		$this->input->post('Comentario');
		$this->fecha_posteo				=		'NULL';
		
		$this->db->insert('receta',$this);
		
		
		
		$cantidad_ingredientes			=		$this->input->post('Cantidad_Ingredientes');
	}
	
	
	/***
	 * get_user_recipes_list
	 * Llama a la funcion get_recipes_list que extrae la lista de recetas de un cierto usuario de la base de datos.
	 * Call to the get_user_recipes_list function that get the recipes list of a user in the data base. 
	 * ***/
	function get_user_recipes_list($numero_usuario)
	{
		$r		=		new Receta();
		$r->where_related_user('id_usuario', $numero_usuario);
		$r->get();
		
		return $r;
	}/*** Fin get_user_recipes_list ***/

	/*** 
	 * get_recipe_ingredients
	 * Llama a la funci—n get_recipe_ingredients para extraer los ingredientes de de una espec’fica receta de la base de datos.
	 * Call to the get_recipe_ingredients function that obtain the recipe  ingredient from a data base.
	 ***/
	function get_recipe_ingredients($receta_id)
	{
		$r		=		new Receta();

		$i		=		new	Ingrediente();
		$i->get_by_related($r, 'id', $receta_id);
		
		return $i;
	}
	
	/***
	 * get_recipe_data
	 * Obtiene todos los datos de una receta en particular
	 * Get every recipes data in particular.
	 ***/
	function get_recipe_data($receta_id)
	{
		$r		=		new	Receta();
		$r->where('id', $receta_id);
		$r->get();
		
		return $r;
	}
}

/*** Location: ./application/models/RecipesModel.php ****/
?>