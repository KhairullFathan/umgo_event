<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public function __construct(){
    parent::__construct();
    date_default_timezone_set("Asia/Makassar");
    $this->load->helper('main');
    $this->load->model('MUser','muser');
    $this->load->model('MVenue','mvenue');
    $this->load->model('MEvent','mevent');
    $this->load->model('MPresensi','mpresensi');
  }
  public function isLogged(){
    $this->db->where('UserID',$this->session->userdata('UserID'));
    $user = $this->db->get('user');
    if($user->num_rows() < 1){
      // echo "login";
      redirect('welcome/index');
    } else{
      $UserRoleID = $user->row()->RoleID;
      $Controller = $this->uri->segment(1);
      $MenuID = $this->db->get_where('menu',['Controller'=>$Controller])->row()->MenuID;
      $this->db->where('RoleID',$UserRoleID);
      $this->db->where('MenuID',$MenuID);
      $Akses = $this->db->get('a_menu');
      if($Akses->num_rows() < 1){
        // echo "tidak ada akses";
        redirect('guest/block');
      }
    }
  }
  public function getMenu(){
    $UserRoleID = $this->db->get_where('user',[
      'UserID'=>$this->session->userdata('UserID')
    ])->row()->RoleID;
    $this->db->join('a_menu','menu.MenuID=a_menu.MenuID');
    $this->db->where('a_menu.RoleID',$UserRoleID);
    $this->db->order_by('menu.MenuID','ASC');
    return $this->db->get('menu')->result();
  }
  public function setPagination($link,$per_page,$total_rows,$uri_segment=3){
		$config['base_url']				= base_url(). $link;
		$config['uri_segment']			= $uri_segment;
		$config['total_rows']			= $total_rows;
		$config['per_page']				= $per_page;
		// style pagination
		$config['full_tag_open'] 	= '<nav class=""><ul class="pagination justify-content-center">';
		$config['full_tag_close']	= '</ul></nav>';
		$config['first_link']			= 'Awal';
		$config['first_tag_open']	= '<li class="page-item">';
		$config['first_tag_close']= '</li>';
		$config['last_link']			= 'Akhir';
		$config['last_tag_open']	= '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link']			= '&raquo;';
		$config['next_tag_open']	= '<li class="page-item">';
		$config['next_tag_close']	= '</li>';
		$config['prev_link']			= '&laquo;';
		$config['prev_tag_open']	= '<li class="page-item">';
		$config['prev_tag_close']	= '</li>';
		$config['num_tag_open']		= '<li class="page-item">';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']	= '</a></li>';
    $config['attributes'] 		= array('class'=>'page-link');
    $config['reuse_query_string'] = TRUE;
		return $config;
  }
  public function createAlert($type,$title,$text){
    $this->session->set_flashdata('pesan',"<script>
      Swal.fire({
        type: '$type',
        title: '$title',
        text: '$text!',
      })
    </script>");
  }
  public function renderAdmin($page,$data){
    $data['user'] = $this->muser->getOne(['UserID'=>$this->session->userdata('UserID')]);
    $data['menu'] = $this->getMenu();
    $this->load->view('template/header',$data);
    $this->load->view('template/sidebar',$data);
    $this->load->view('template/navbar',$data);
    $this->load->view($page,$data);
    $this->load->view('template/footer',$data);
    $this->load->view('template/js',$data);
  }
  public function renderHome($page,$data){
    $this->load->view('home/template/header',$data);
    $this->load->view('home/template/navbar',$data);
    $this->load->view('home/'.$page,$data);
    $this->load->view('home/template/footer',$data);
    $this->load->view('home/template/js',$data);
  }
  public function isStart($EventID){
    $event = $this->mevent->getOne(['event.EventID'=>$EventID]);
    // cek event apakah tidak menggunakan presensis
    if(!$event->Presensi){
      return false;
    }
    // cek event apakah kurang dari 30 menit
    $waktuPresensi = (int) strtotime($event->WaktuPresensi) - (60*30);
    if(time() < $waktuPresensi){
      return false;
    }
    // jika event sudah dimulai
    return $event;
  }
  public function randomStr($length = 10){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
	
  // akhir controller
}
