<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller {

  var $user;
  public function __construct() {
    parent::__construct();
    if(!$this->session->userdata('UserID')){
      $this->createAlert('error','Akses Ditolak','Silahkan login terlebih dahulu untuk mendapatkan akses');
      redirect('welcome/index');
    }
    $this->user = $this->muser->getOne(['UserID'=>$this->session->userdata('UserID')]);
  }

	public function index() {
    $data = [
      'judul'=> 'Dashboard',
      'mactive'=> 'Dashboard',
      'venue'=> $this->mvenue->getMany(0,0,'',[]),
      'event'=> $this->mevent->getMany(0,0,'',[]),
    ];
    $page = 'guest/index';
    $this->renderAdmin($page,$data);
	}
  
  public function block(){
    $errCode = $this->input->get('code');
    $message = $this->input->get('q');
    switch ($errCode) {
      case 403:
        $err = 'Forbidden';
      break;
      case 404:
        $err = 'Not Found';
      break;
      default:
        $err = 'Error';
        $message = 'Error';
      break;
    }
    $data = [
      'judul'=> $err,
      'errCode'=> $errCode,
      'message' => @$message,
    ];
    $page = 'home/block';
    $this->renderAdmin($page,$data);
  }
	// akhir controller
}
