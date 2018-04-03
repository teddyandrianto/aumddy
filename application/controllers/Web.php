<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
 	{
 	 	date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
 		$this->load->helper("url");
 		$this->load->model('web_model');
 		$this->model = $this->web_model;
 		$this->load->database();

 		$this->load->helper('url');
  	}

	public function login()
 	{
 		if($this->model->login()){
         	redirect('web/index');
        }elseif(isset($_SESSION['sesilogin'])){
        	redirect('web/index');
        }else{
        $this->load->view('web/header');
		$this->load->view('web/login');
		$this->load->view('web/footer');
        }
 	}
 	
 	public function logout()
 	{
 		session_destroy();
 		redirect('/');	
 	}


	public function index()
	{
		$this->load->view('web/header');
		$this->load->view('web/home');
		$this->load->view('web/footer');
	}

	public function produk()
	{
		$produk=$this->model->tampil_barang();
		$this->load->view('web/header');
		$this->load->view('web/produk',['produk'=>$produk]);
		$this->load->view('web/footer');
	}

	public function detail_barang($id)
	{
		$query = $this->db->query('select count(id_barang) as total from tbl_barang');
        $row =$query->row_array();
		if(isset($id) AND $id<=$row['total']){
		$produk=$this->model->detail_barang(" where id_barang = '$id'");
		$data_produk = array(
			"id_barang" => $produk[0]['id_barang'],
			"nama_barang" => $produk[0]['nama_barang'],
			"harga" => $produk[0]['harga'],
			"stok"=> $produk[0]['stok'],
			"deskripsi"=> $produk[0]['deskripsi'],
			"foto"=> $produk[0]['foto']
			);
		$this->load->view('web/header');
		$this->load->view('web/detail_barang',$data_produk,$produk);
		$this->load->view('web/footer');
		}else{
			redirect('web/produk');
		}
	}

	public function about()
	{
		$this->load->view('web/header');
		$this->load->view('web/about');
		$this->load->view('web/footer');
	}

	public function daftar()
	{
		if(!isset($_SESSION['sesilogin'])){
		$this->load->view('web/header');
		$this->load->view('web/daftar');
		$this->load->view('web/footer');
		}else{
			redirect('/');
		}
	}

	public function profile()
	{
		if(isset($_SESSION['sesilogin'])){
		$this->load->view('web/header');
		$this->load->view('web/profile');
		$this->load->view('web/footer');

		}else{
			redirect('web/login');
		}

	}
	  public function update_img_profile(){

        if(isset($_SESSION['sesilogin'])){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/photo-profile/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '500048';
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
         
        if(isset($_FILES['filefoto']['name']))
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $updatedata = array(
                  'foto' =>$gbr['file_name']
                   );
                $where = array('id_user' => $_SESSION['sesilogin']['id_user']);
                $res = $this->db->update('tbl_user',$updatedata,$where); //akses model untuk menyimpan ke database
                $_SESSION['sesilogin']['foto'] = $gbr['file_name'];
                if($res>=1){
                    redirect('web/profile');
                }}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('web/profile'); //jika gagal maka akan ditampilkan form upload
            }
        }else{
        	redirect('web/profile');
        }}else{
            $this->load->view('error404');
        }
    }

    public function keranjan_tambah(){
    	if(isset($_SESSION['sesilogin'])){
    		 $inputkeranjang = array(
            'id_user' => $_SESSION['sesilogin']['id_user'],
            'id_barang' => $_POST['id_barang'],
            'jumlah' => $_POST['jumlah'],
            'status' => 'belum'
            );
        $res = $this->model->input('tbl_keranjang',$inputkeranjang);
        if($res>=1){
            $this->session->set_flashdata("pesan", "<div class=\"col-lg-12\"><div class=\"alert alert-success\">
            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            Data Atas Nama  <strong>Tersimpan</strong>
            </div></div>");
            redirect('web/detail_barang/'.$_POST['id_barang']);
        }else{
        $this->session->set_flashdata("pesan", "<div class=\"col-lg-12\"><div class=\"alert alert-danger\">
            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            Data Atas Nama ".$_POST['nama']." <strong>Gagal !</strong>
            </div></div>");
            redirect('web/index');
        }

    	}else{

    	}
    }

}
