<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

  var $user;
  public function __construct(){
    parent::__construct();
    $this->isLogged();
    $this->user = $this->muser->getOne(['UserID'=>$this->session->userdata('UserID')]);
  }

  // venue
  public function venue(){
    $where = [];
    $like = trim(@$this->input->get('q'));
    // config pagination
		$start = $this->uri->segment(3);
    $limit = 20;
    $total_rows = $this->mvenue->getNum($like,$where);
    $paginationConfig = $this->setPagination('index.php/admin/venue',$limit,$total_rows,3);
    $this->pagination->initialize($paginationConfig);
    // end config pagination
    $data = [
      'judul'=> 'Daftar Venue',
      'mactive'=> 'Venue',
      'data'=> $this->mvenue->getMany($limit,$start,$like,$where), 
      'start'=> $start,
    ];
    $page = 'admin/venue/list';
    $this->renderAdmin($page,$data);
  }
  public function venueAdd(){
    $data = [
      'judul'=> 'Tambah Venue',
      'mactive'=> 'Venue',
    ];
    $this->mvenue->validasiForm();
    if($this->form_validation->run() == false){
      $page = 'admin/venue/add';
      $this->renderAdmin($page,$data);
    }else{
      // simpan
      $save = $this->mvenue->insert($this->input->post(),$_FILES);
      if(!$save){
        $this->createAlert('error','Gagal Tambah Venue','Terjadi kesalahan silahkan coba lagi');
		    redirect('admin/venueAdd');
      }else{
        $this->createAlert('success','Berhasil Tambah Venue','Berhasil menambahkan data venue baru');
		    redirect('admin/venue');
      }
    }
  }
  public function venueEdit($VenueID){
    $data = [
      'judul'=> 'Edit Venue',
      'mactive'=> 'Venue',
      'data'=> $this->mvenue->getOne(['venue.VenueID'=>$VenueID]),
    ];
    $this->mvenue->validasiForm();
    if($this->form_validation->run() == false){
      $page = 'admin/venue/edit';
      $this->renderAdmin($page,$data);
    }else{
      // simpan
      $save = $this->mvenue->update($this->input->post(),$_FILES,['venue.VenueID'=>$VenueID]);
      if(!$save){
        $this->createAlert('error','Gagal Edit Venue','Terjadi kesalahan silahkan coba lagi');
        redirect('admin/venueEdit/'.$VenueID);
      }else{
        $this->createAlert('success','Berhasil Edit Venue','Berhasil memperbaharui data venue');
        redirect('admin/venueEdit/'.$VenueID);
      }
    }
  }
  public function venueDelete($VenueID){
    // simpan
    $save = $this->mvenue->delete(['venue.VenueID'=>$VenueID]);
    if(!$save){
      $this->createAlert('error','Gagal Hapus Venue','Terjadi kesalahan silahkan coba lagi');
      redirect('admin/venue');
    }else{
      $this->createAlert('success','Berhasil Hapus Venue','Berhasil menghapus data venue');
      redirect('admin/venue');
    }
  }

  // event
  public function event(){
    $where = [];
    $like = trim(@$this->input->get('q'));
    // config pagination
		$start = $this->uri->segment(3);
    $limit = 20;
    $total_rows = $this->mevent->getNum($like,$where);
    $paginationConfig = $this->setPagination('index.php/admin/event',$limit,$total_rows,3);
    $this->pagination->initialize($paginationConfig);
    // end config pagination
    $data = [
      'judul'=> 'Daftar Event',
      'mactive'=> 'Event',
      'data'=> $this->mevent->getMany($limit,$start,$like,$where), 
      'start'=> $start,
    ];
    $page = 'admin/event/list';
    $this->renderAdmin($page,$data);
  }
  public function eventAdd(){
    $data = [
      'judul'=> 'Tambah Event',
      'mactive'=> 'Event',
      'venue'=> $this->mvenue->getMany(0,0,'',[]),
    ];
    $this->mevent->validasiForm();
    if($this->form_validation->run() == false){
      $page = 'admin/event/add';
      $this->renderAdmin($page,$data);
    }else{
      // simpan
      $save = $this->mevent->insert($this->input->post(),$_FILES);
      if(!$save){
        $this->createAlert('error','Gagal Tambah Event','Terjadi kesalahan silahkan coba lagi');
		    redirect('admin/eventAdd');
      }else{
        $this->createAlert('success','Berhasil Tambah Event','Berhasil menambahkan data event baru');
		    redirect('admin/event');
      }
    }
  }
  public function eventEdit($EventID){
    $data = [
      'judul'=> 'Edit Event',
      'mactive'=> 'Event',
      'data'=> $this->mevent->getOne(['event.EventID'=>$EventID]),
      'venue'=> $this->mvenue->getMany(0,0,'',[]),
    ];
    $this->mevent->validasiForm();
    if($this->form_validation->run() == false){
      $page = 'admin/event/edit';
      $this->renderAdmin($page,$data);
    }else{
      // simpan
      $save = $this->mevent->update($this->input->post(),$_FILES,['event.EventID'=>$EventID]);
      if(!$save){
        $this->createAlert('error','Gagal Edit Event','Terjadi kesalahan silahkan coba lagi');
        redirect('admin/eventEdit/'.$EventID);
      }else{
        $this->createAlert('success','Berhasil Edit Event','Berhasil memperbaharui data event');
        redirect('admin/eventEdit/'.$EventID);
      }
    }
  }
  public function eventDelete($EventID){
    // simpan
    $save = $this->mevent->delete(['event.EventID'=>$EventID]);
    if(!$save){
      $this->createAlert('error','Gagal Hapus Event','Terjadi kesalahan silahkan coba lagi');
      redirect('admin/event');
    }else{
      $this->createAlert('success','Berhasil Hapus Event','Berhasil menghapus data event');
      redirect('admin/event');
    }
  }
  public function eventQR($EventID){
    $data = [
      'judul'=> 'QR Event',
      'mactive'=> 'Event',
      'data'=> $this->mevent->getOne(['event.EventID'=>$EventID]),
    ];
    $startEvent = $this->isStart($EventID);
    if(!$startEvent){
      $page = 'admin/event/qr-none';
      $this->renderAdmin($page,$data);
    }else {
      $qr = $this->db->get_where('qr',['qr.EventID'=>$EventID]);
      if(!$qr->num_rows()){
        $str = $this->randomStr(10);
        $this->db->insert('qr',[
          'EventID'=>$EventID,
          'Code'=>$str,
        ]);
        $QRID = $this->db->insert_id();
      }else {
        $QRID = $qr->row()->QRID;
      }
      $data['qr'] = $this->db->get_where('qr',['qr.QRID'=>$QRID])->row();
      $page = 'admin/event/qr-scan';
      $this->renderAdmin($page,$data);
    }
  }
  public function hasilPresensi($EventID){
    $where = ['presensi.EventID'=>$EventID];
    if(@$this->input->get('Status')){
      $where['presensi.Status']=$this->input->get('Status');
    }
    $like = trim(@$this->input->get('q'));
    // config pagination
		$start = $this->uri->segment(4);
    $limit = 50;
    $total_rows = $this->mpresensi->getNum($like,$where);
    $paginationConfig = $this->setPagination('index.php/admin/hasilPresensi/'.$EventID."/",$limit,$total_rows,4);
    $this->pagination->initialize($paginationConfig);
    // end config pagination
    $data = [
      'judul'=> 'Hasil Presensi',
      'mactive'=> 'Event',
      'event'=> $this->mevent->getOne(['event.EventID'=>$EventID]),
      'data'=> $this->mpresensi->getMany($limit,$start,$like,$where), 
      'start'=> $start,
      'qs'=> $_SERVER['QUERY_STRING'],
    ];
    $page = 'admin/event/hasil-presensi';
    $this->renderAdmin($page,$data);
  }
  public function cetakPresensi($EventID){
    $where = ['presensi.EventID'=>$EventID];
    if(@$this->input->get('Status')){
      $where['presensi.Status']=$this->input->get('Status');
    }
    $data = [
      'judul'=> 'Hasil Presensi',
      'mactive'=> 'Event',
      'event'=> $this->mevent->getOne(['event.EventID'=>$EventID]),
      'data'=> $this->mpresensi->getMany(0,0,'',$where), 
      'start'=> 0,
    ];
    $page = 'admin/event/hasil-presensi-cetak';
    $this->load->view($page,$data);
  }



  // akhir controller
}