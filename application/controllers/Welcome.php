<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index() {
		$data = [
			'judul'=> 'Login',
		];
		$this->form_validation->set_rules('Username','Username','trim|required',[
			'required'=> '%s tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('Password','Password','trim|required',[
			'required'=> '%s tidak boleh kosong.'
		]);
		if($this->form_validation->run() === false){
			$this->load->view('home/login',$data);
		} else {
			$user = $this->muser->getOne(['Username'=>$this->input->post('Username')]);
			if(!$user){
				$this->createAlert('error','Gagal Login','Username atau Password yang anda masukkan salah');
				redirect('welcome/index');
			}
			if(!(password_verify($this->input->post('Password'),$user->Password))){
				$this->createAlert('error','Gagal Login','Username atau Password yang anda masukkan salah');
				redirect('welcome/index');
			}
			$this->session->set_userdata(['UserID'=> $user->UserID]);
			$this->createAlert('success','Berhasil Login','Login Berhasil');
			redirect('guest');
		}
	}
	public function logout(){
		$this->session->unset_userdata('UserID');
		$this->createAlert('success','Berhasil Logout','Logout Berhasil');
		redirect('welcome/index');
	}
	public function maintenance(){
		$this->load->view('errors/maintenace');
	}


	// akhir controller
}
