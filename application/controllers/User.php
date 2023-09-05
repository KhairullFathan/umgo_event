<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

  var $user;
  public function __construct() {
    parent::__construct();
    $this->isLogged();
    $this->user = $this->muser->getOne(['UserID'=>$this->session->userdata('UserID')]);
  }

  public function index(){
    $data = [
			'judul'=> 'Pengaturan Akun User',
			'mactive'=> 'Pengaturan Akun',
      'data'=> $this->user,
		];
    $this->form_validation->set_rules('OldPassword','Password Lama','trim|required',[
      'required'=> '%s tidak boleh kosong',
    ]);
    $this->form_validation->set_rules('NewPassword','Password Baru','trim|min_length[6]',[
      'min_length'=> '%s minimal 6 karakter'
    ]);
    $this->muser->validasiForm();
    if($this->form_validation->run() == FALSE){
      $page = 'user/index';
			$this->renderAdmin($page,$data);
    }else{
      // validasi password lama
      if(!password_verify($this->input->post('OldPassword'),$this->user->Password)){
        $this->createAlert('error','Gagal Memperbaharui data user','Password yang anda masukkan salah');
				redirect('user/index');
      }
      // validasi username yang sama
      $valid = $this->muser->cekIfUsernameExist($this->input->post('Username'),$this->user->UserID);
      if($valid > 0){
        $this->createAlert('error','Gagal Memperbaharui data user','Username yang anda masukkan sudah digunakan');
				redirect('user/index');
      }
      // var_dump($_POST);die;
      // simpan data
      $save = $this->muser->update($_POST,$_FILES,['UserID'=>$this->user->UserID]);
      if(!$save){
        $this->createAlert('error','Gagal Memperbaharui data user','Terjadi kesalahan silahkan coba lagi');
				redirect('user/index');
      }else{
        $this->createAlert('success','Berhasil Memperbaharui data user','Data user berhasil diperbahrui');
				redirect('user/index');
      }
    }
  }

  


	//akhir controller
}
