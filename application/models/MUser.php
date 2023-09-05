<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUser extends MY_Model {

  // validasi
  public function validasiForm(){
    $this->form_validation->set_rules('RoleID','Role','trim|required',[
      'required'=> '%s tidak boleh kosong',
    ]);
    $this->form_validation->set_rules('Nama','Nama','trim|required',[
      'required'=> '%s tidak boleh kosong',
    ]);
    $this->form_validation->set_rules('Alamat','Alamat','trim');
    $this->form_validation->set_rules('NoTelp','No Telp','trim|numeric|min_length[12]|max_length[13]',[
      'numeric'=> "%s harus berupa angka",
      'min_length'=> "%s minimal 12 karakter",
      'max_length'=> "%s maksimal 13 karakter",
    ]);
    $this->form_validation->set_rules('Username','Username','trim|required',[
      'required'=> '%s tidak boleh kosong',
    ]);
  }
  public function cekIfUsernameExist($Username,$UserID=0){
    $this->db->where('Username',$Username);
    if($UserID != 0){
      $this->db->where('UserID !=',$UserID);
    }
    return $this->db->get('user')->num_rows();
  }
  
  // get
  public function getNum($like='',$where=[]){
    if(count($where) > 0){
      $this->db->where($where);
    }
    if($like != ''){
      $this->db->group_start();
      $this->db->like('user.Nama',$like);
      $this->db->or_like('user.Username',$like);
      $this->db->group_end();
    }
    $this->db->order_by('user.Nama','ASC');
    return $this->db->get('user')->num_rows();
  }
  public function getMany($limit=0,$start=0,$like='',$where=[]){
    $this->db->select('user.*,role.Role');
    $this->db->join('role','user.RoleID=role.RoleID');
    if(count($where) > 0){
      $this->db->where($where);
    }
    if($like != ''){
      $this->db->group_start();
      $this->db->like('user.Nama',$like);
      $this->db->or_like('user.Username',$like);
      $this->db->group_end();
    }
    if($limit !== 0){
      $this->db->limit($limit,$start);
    }
    $this->db->order_by('user.RoleID','ASC');
    $this->db->order_by('user.Nama','ASC');
    return $this->db->get('user')->result();
  }
  public function getOne($where){
    $this->db->select('user.*,role.Role');
    $this->db->join('role','user.RoleID=role.RoleID');
    $this->db->where($where);
    return $this->db->get('user')->row();
  }

  // input
  public function insert($data,$file=[]){
    $data = [
      'RoleID'=>@$data['RoleID'],
      'Nama'=>@$data['Nama'],
      'Alamat'=>@$data['Alamat'],
      'NoTelp'=>@$data['NoTelp'],
      'Username'=>@$data['Username'],
      'Password'=>password_hash(@$data['Password'],PASSWORD_DEFAULT),
    ];
    // var_dump($data);
    // die;
    if($this->db->insert('user',$data)){
      return true;
    }else {
      return false;
    }
  }
  // update
  public function update($data,$file=[],$where){
    $user = $this->getOne($where);
    $newPassword = $user->Password;
    if($data['NewPassword']){
      $newPassword = password_hash(@$data['NewPassword'],PASSWORD_DEFAULT);
    }
    $data = [
      'RoleID'=>@$data['RoleID'],
      'Nama'=>@$data['Nama'],
      'Alamat'=>@$data['Alamat'],
      'NoTelp'=>@$data['NoTelp'],
      'Username'=>@$data['Username'],
      'Password'=> $newPassword,
    ];
    $this->db->where($where);
    if($this->db->update('user',$data)){
      return true;
    }else {
      return false;
    }
  }
  // delete
  public function delete($where){
    $this->db->where($where);
    if($this->db->delete('user')){
      return true;
    }else {
      return false;
    }
  }

  // akhir model
}