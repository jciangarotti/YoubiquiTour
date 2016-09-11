<?php 

class UserModel extends Model
{
	
	function UserModel()
	{
		//Constructor
		parent::Model();
		$this->load->database();
		
	}
	
	function insert_user()
	{
		$this->load->helper('security');
		$u							=		new User();
		$u->id_usuario				=		dohash($this->input->post('Correo_Electronico'),'md5');
		$u->nombre					=		$this->input->post('Nombre_Usuario');
		$u->apellido_paterno		=		$this->input->post('Apellido_Paterno');
		$u->apellido_materno		=		$this->input->post('Apellido_Materno');
		$u->correo_electronico		=		$this->input->post('Correo_Electronico');
		$u->dia_nacimiento			=		$this->input->post('Dia_Naciemiento');
		$u->mes_nacimiento			=		$this->input->post('Mes_Nacimiento');
		$u->ano_nacimiento			=		$this->input->post('Ano_Nacimiento');
		$u->pais					=		$this->input->post('Pais');
		$u->password				=		$this->input->post('Password');
		$u->save();
		
	}
	
	
	function delete_user()
	{
		//@todo Crear funcion borrar al usuario
	}
	
	function update_user()
	{
		//TODO Funci—n para poder actualizar los datos del usuario
	}
	
	
	function get_user_name($strCorreo)
	{
		$u		=		new User();
		$u->where('correo_electronico', $strCorreo)->get();
		
		return $u->nombre;
	}
	
	
	function get_numero_usuario($strCorreo)
	{
		$u		=		new User();
		$u->where('correo_electronico', $strCorreo)->get();

		return $u->id_usuario;
	}
	
	
	function get_correo_electronico()
	{
		$u		=		new User();
		$u->where('correo_electronico',$this->input->post('Correo_Electronico'))->get();
		
		
		if(empty($u->id))
		{
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	
	/*** 
	 * exist_user_password
	 * Consulta dirŽctamente a la base de datos si es que el password ingresado en el campo Password corresponde al de la base de 
	 * datos.
	 * return TRUE en caso de que los password concuerden
	 * return FALSE en caso de que los password no concuerden
	 * ***/
	function exist_user_password()
	{
		$this->load->helper('security');
		
		$u		=		new User();
		$u->where('correo_electronico', $this->input->post('Correo_Electronico'))->get();
		
		$input_password		=		dohash($this->input->post('Password'),'md5');
		if($u->password == $input_password)
		{
			return FALSE;
		}else{
			return TRUE;
		}
	}
	/*** Fin exist_user_password() ***/

	
}


?>
