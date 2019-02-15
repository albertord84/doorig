<?php
//Funciones a implementar en el controler del proyecto doorig

class Welcome extends CIControler {

	public function signin(){
		$datas = $this->input->post();
		//implementar aqui el resto
		$datas["name"];
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
	
	public function login($datas=NULL) {
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

	
	
}