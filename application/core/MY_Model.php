<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

  public function __construct(){

  }
  public function isNull($input){
    if($input == '' | $input == NULL){
      $input = NULL;
    }
    return $input;
  }
  public function isZero($input){
    if($input == ''){
      $input = 0;
    }
    return $input;
  }
  public function uploadImage($input,$path,$prefix=''){
    $config['allowed_types'] 	= 'jpg|png|jpeg';
    $config['max_size']			 	= 1024 * 10;
    $config['upload_path']		= './uploads/'.$path.'/';
    $config['encrypt_name']		= TRUE;
    $this->load->library('upload',$config);
    if($this->upload->do_upload($input))	{
      return $this->upload->data('file_name');
    }else{
      return NULL;
    }
  }
  public function uploadFile($input,$path,$prefix=''){
    $config['allowed_types'] 	= 'jpg|png|jpeg|pdf';
    $config['max_size']			 	= 1024 * 10;
    $config['upload_path']		= './uploads/'.$path.'/';
    $config['encrypt_name']		= TRUE;
    $this->load->library('upload',$config);
    if($this->upload->do_upload($input))	{
      return $this->upload->data('file_name');
    }else{
      return NULL;
    }
  }


  // akhir model
}