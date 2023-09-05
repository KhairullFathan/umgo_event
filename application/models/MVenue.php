<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MVenue extends MY_Model {

  // validasi
  public function validasiForm(){
    $this->form_validation->set_rules('Venue','Nama Venue','trim|required',[
      'required'=> '%s tidak boleh kosong',
    ]);
  }
  
  // get
  public function getNum($like='',$where=[]){
    if(count($where) > 0){
      $this->db->where($where);
    }
    if($like != ''){
      $this->db->group_start();
      $this->db->like('venue.Venue',$like);
      $this->db->group_end();
    }
    return $this->db->get('venue')->num_rows();
  }
  public function getMany($limit=0,$start=0,$like='',$where=[]){
    if(count($where) > 0){
      $this->db->where($where);
    }
    if($like != ''){
      $this->db->group_start();
      $this->db->like('venue.Venue',$like);
      $this->db->group_end();
    }
    if($limit !== 0){
      $this->db->limit($limit,$start);
    }
    $this->db->order_by('venue.Venue','ASC');
    return $this->db->get('venue')->result();
  }
  public function getOne($where){
    $this->db->where($where);
    return $this->db->get('venue')->row();
  }

  // input
  public function insert($data,$file=[]){
    $data = [
      'Venue'=>@$data['Venue'],
    ];
    // var_dump($data);
    // die;
    if($this->db->insert('venue',$data)){
      return true;
    }else {
      return false;
    }
  }
  // update
  public function update($data,$file=[],$where){
    $data = [
      'Venue'=>@$data['Venue'],
    ];
    $this->db->where($where);
    if($this->db->update('venue',$data)){
      return true;
    }else {
      return false;
    }
  }
  // delete
  public function delete($where){
    $this->db->where($where);
    if($this->db->delete('venue')){
      return true;
    }else {
      return false;
    }
  }

  // akhir model
}