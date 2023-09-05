<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MEvent extends MY_Model {

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
    $this->db->join('venue','event.VenueID=venue.VenueID');
    if(count($where) > 0){
      $this->db->where($where);
    }
    if($like != ''){
      $this->db->group_start();
      $this->db->like('event.Event',$like);
      $this->db->or_like('event.Tanggal',$like);
      $this->db->group_end();
    }
    return $this->db->get('event')->num_rows();
  }
  public function getMany($limit=0,$start=0,$like='',$where=[]){
    $this->db->join('venue','event.VenueID=venue.VenueID');
    if(count($where) > 0){
      $this->db->where($where);
    }
    if($like != ''){
      $this->db->group_start();
      $this->db->like('event.Event',$like);
      $this->db->or_like('event.Tanggal',$like);
      $this->db->group_end();
    }
    if($limit !== 0){
      $this->db->limit($limit,$start);
    }
    $this->db->order_by('event.Tanggal','DESC');
    return $this->db->get('event')->result();
  }
  public function getOne($where){
    $this->db->join('venue','event.VenueID=venue.VenueID');
    $this->db->where($where);
    return $this->db->get('event')->row();
  }

  // input
  public function insert($data,$file=[]){
    $data = [
      'VenueID'=>@$data['VenueID'],
      'Event'=>@$data['Event'],
      'Tanggal'=>@$data['Tanggal'],
      'Presensi'=>@$data['Presensi'],
      'WaktuPresensi'=>@$data['WaktuPresensi'],
    ];
    // var_dump($data);
    // die;
    if($this->db->insert('event',$data)){
      return true;
    }else {
      return false;
    }
  }
  // update
  public function update($data,$file=[],$where){
    $data = [
      'VenueID'=>@$data['VenueID'],
      'Event'=>@$data['Event'],
      'Tanggal'=>@$data['Tanggal'],
      'Presensi'=>@$data['Presensi'],
      'WaktuPresensi'=>@$data['WaktuPresensi'],
    ];
    $this->db->where($where);
    if($this->db->update('event',$data)){
      return true;
    }else {
      return false;
    }
  }
  // delete
  public function delete($where){
    $this->db->where($where);
    if($this->db->delete('event')){
      return true;
    }else {
      return false;
    }
  }

  // akhir model
}