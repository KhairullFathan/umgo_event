<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPresensi extends MY_Model {

  // validasi
  public function validasiForm(){
    if(@$_POST['Presensi']==1){
      $this->form_validation->set_rules('WaktuPresensi','Waktu Presensi','trim|required',[
        'required'=> '%s tidak boleh kosong jika mengaktifkan presensi',
      ]);
    }
    $this->form_validation->set_rules('VenueID','Venue Event','trim|required',[
      'required'=> '%s tidak boleh kosong',
    ]);
    $this->form_validation->set_rules('Event','Nama Event','trim|required',[
      'required'=> '%s tidak boleh kosong',
    ]);
    $this->form_validation->set_rules('Tanggal','Tanggal Event','trim|required',[
      'required'=> '%s tidak boleh kosong',
    ]);
  }
  
  // get
  public function getNum($like='',$where=[]){
    $this->db->join('event','presensi.EventID=event.EventID');
    if(count($where) > 0){
      $this->db->where($where);
    }
    if($like != ''){
      $this->db->group_start();
      $this->db->like('presensi.Nama',$like);
      $this->db->or_like('presensi.Asal',$like);
      $this->db->group_end();
    }
    return $this->db->get('presensi')->num_rows();
  }
  public function getMany($limit=0,$start=0,$like='',$where=[]){
    $this->db->join('event','presensi.EventID=event.EventID');
    if(count($where) > 0){
      $this->db->where($where);
    }
    if($like != ''){
      $this->db->group_start();
      $this->db->like('presensi.Nama',$like);
      $this->db->or_like('presensi.Asal',$like);
      $this->db->group_end();
    }
    if($limit !== 0){
      $this->db->limit($limit,$start);
    }
    $this->db->order_by('presensi.Waktu','ASC');
    return $this->db->get('presensi')->result();
  }
  public function getOne($where){
    $this->db->join('event','presensi.EventID=event.EventID');
    $this->db->where($where);
    return $this->db->get('presensi')->row();
  }

  // akhir model
}