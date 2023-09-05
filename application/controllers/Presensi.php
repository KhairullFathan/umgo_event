<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends MY_Controller {

  var $hariIni;
  var $tigaBelakang;
  var $tigaDepan;

  public function __construct(){
    parent::__construct();
    $thisTime = time();
    $this->hariIni = date('Y-m-d',$thisTime);
    $this->tigaBelakang = date('Y-m-d',strtotime("-3 Days",$thisTime));
    $this->tigaDepan = date('Y-m-d',strtotime("+3 Days",$thisTime));
  }

  public function index(){
    $data = [
			'judul'=> 'Daftar Event',
      'data'=> $this->mevent->getMany(0,0,'',[
        'Tanggal >='=>$this->tigaBelakang,
        'Tanggal <='=>$this->tigaDepan,
      ]),
		];
    $page = 'presensi/event';
    $this->renderHome($page,$data);
  }
  public function scan($EventID){
    $data = [
      'judul'=> 'Scan QR Code',
      'data'=> $this->mevent->getOne(['event.EventID'=>$EventID]),
    ];
    $page = 'presensi/scan';
    $this->renderHome($page,$data);
  }
  public function setSession(){
    $dataSession = [
      'token'=> $this->input->post('token'),
      'waktu'=> time(),
    ];
    if($this->session->set_userdata($dataSession)){
      return true;
    }else{
      return false;
    }
  }
  public function presensi($EventID){
    if(!$this->session->userdata('token')){
      $this->createAlert('error','Akses Ditolak','Anda belum melakukan scanning qr-code');
      redirect('presensi/scan/'.$EventID);
    }
    $event = $this->mevent->getOne(['event.EventID'=>$EventID]);
    $eventCode = $this->db->get_where('qr',['qr.EventID'=>$event->EventID])->row();
    if(!($eventCode->Code===$this->session->userdata('token'))){
      $this->createAlert('error','Akses Ditolak','QR-Code tidak sesuai');
      redirect('presensi/scan/'.$EventID);
    }
    $data = [
      'judul'=> 'Presensi',
      'data'=> $this->mevent->getOne(['event.EventID'=>$EventID]),
    ];
    $this->form_validation->set_rules('Nama','Nama Peserta','trim|required',[
      'required'=> '%s tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('Asal','Asal Peserta','trim|required',[
      'required'=> '%s tidak boleh kosong!',
    ]);
    if($this->form_validation->run() === FALSE){
      $page = 'presensi/presensi';
      $this->renderHome($page,$data);
    }else{
      $data = [
        'EventID'=> $this->input->post('EventID'),
        'Nama'=> $this->input->post('Nama'),
        'Asal'=> $this->input->post('Asal'),
        'Status'=> $this->input->post('Status'),
        'Waktu'=> $this->input->post('Waktu'),
      ];
      if($this->db->insert('presensi',$data)){
        // hapus session
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('waktu');
        $this->createAlert('success','Berhasil Presensi','Presensi kehadiran anda berhasil direkam');
        redirect('presensi/index/');
      }else{
        // hapus session
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('waktu');
        $this->createAlert('error','Gagal Presensi','Presensi kehadiran anda gagal direkam');
        redirect('presensi/index/');
      }
    }
  }

	// akhir controller
}
