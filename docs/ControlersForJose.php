<?php
//Funciones a implementar en el controler del proyecto doorig

class Welcome extends CIControler{

	public function signin(){
		$datas = $this->input->post();
		//implementar aqui el resto
		$datas["name"]
		//retornar respuesta padronizada em json
		echo json_encode($response);
	}
	
	public function request_secure_code_by_email(){		
		//implementar aqui el resto
		
		//retornar success ou error
		echo json_encode($response);
	}
	
	public function request_secure_code_by_sms(){		
		//implementar aqui el resto
		
		//retornar success ou error
		echo json_encode($response);
	}
	
	public function confirm_secure_code(){
		$datas = $this->input->post();
		//implementar aqui el resto		
		
		$this->redirect_to_dasboard();
	}
	
	public login(datas=NULL){
		if(!datas)
			$datas = $this->input->post(); //email e password			
		//implementar aqui el resto
		
		 
		$this->redirect_to_dasboard();
	}
	
	public function redirect_to_dasboard(){
		header("Location:https://localhost/dashboard/src/index.php/welcome/view_dashboard?key=".$key_md5);
	}
	
	public function confirm_dashboard_redirection(){
		
	}
	
	public function send_contact_form(){
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function save_email_susbcription(){
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
}



//Funciones a implementar en el controler del proyercto-dasboard

class Welcome extends CIControler{

	public function confirm_md5_key_code(){
		
	}
	
}


//Funciones a implementar en el controler del proyercto-visibility

class Welcome extends CIControler{

	//---------------PRINCIPALS FUNCTIONS-----------------------------
	public function insert_reference_profile(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function insert_geolocation(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function insert_hastag(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function insert_profile_in_white_list(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function insert_profile_in_black_list(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function delete_reference_profile(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function delete_geolocation(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function delete_hastag(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function delete_profile_in_white_list(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function delete_profile_in_black_list(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function client_play_tool(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function client_pause_tool(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function client_active_autolike(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function client_unactive_autolike(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function client_active_total_unfollow(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		
		echo json_encode($response);
	}
	
	public function client_unactive_total_unfollow(){
		$this->load-library("sessions_utils");
		$this->is_client();
		$datas = $this->input->post();
		//1. cONFERIR QUE CLIENTE ESTA ACTIVOS Y QUE NOT TIENE DFGDFGB
		echo json_encode($response);
	}
	
	public function is_client(){
		if(!($this->session->user->user_id && $this->session->user->role_id==user_role::CLIENT))
			header("Location:https://doorig.com);
	}
	
	//---------------SECUNDARY FUNCTIONS-----------------------------
	
}