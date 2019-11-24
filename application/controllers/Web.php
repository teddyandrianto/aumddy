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
        $kategori=$this->model->tampil_kategori();
        $this->load->view('web/header');
		$this->load->view('web/login');
		$this->load->view('web/footer',['kategori'=>$kategori]);
        }
 	}
 	
 	public function logout()
 	{
 		session_destroy();
 		redirect('/');	
 	}


	public function index()
	{
		$produk=$this->model->tampil_barang();
		$kategori=$this->model->tampil_kategori();
        $carousel=$this->model->tampil_carousel();
		$this->load->view('web/header');
		$this->load->view('web/home',['produk'=>$produk,'carousel'=>$carousel]);
		$this->load->view('web/footer',['kategori'=>$kategori]);
	}

	public function produk($nama_kategori="")
	{
		if($nama_kategori!==""){
		$produk=$this->model->tampil_barang_kategori($nama_kategori);
		}else{
		$produk=$this->model->tampil_barang();
		}
		$kategori=$this->model->tampil_kategori();
		$this->load->view('web/header');
		$this->load->view('web/produk',['produk'=>$produk]);
		$this->load->view('web/kategori',['kategori'=>$kategori]);
		$this->load->view('web/footer',['kategori'=>$kategori]);
	}

	public function cari_produk()
	{
		
		if(isset($_POST['cari_produk'])){
		$cari_produk=$_POST['cari_produk'];
		$produk=$this->model->tampil_barang_cari($cari_produk);
		}else{
		$produk=$this->model->tampil_barang();
		}
		$kategori=$this->model->tampil_kategori();
		$this->load->view('web/header');
		$this->load->view('web/produk',['produk'=>$produk]);
		$this->load->view('web/kategori',['kategori'=>$kategori]);
		$this->load->view('web/footer',['kategori'=>$kategori]);
	}

	public function detail_barang($id="")
	{
		if($id!==""){
		$produk=$this->model->detail_barang(" where id_barang = '$id'");
		$data_produk = array(
			"id_barang" => $produk[0]['id_barang'],
			"nama_barang" => $produk[0]['nama_barang'],
			"harga" => $produk[0]['harga'],
			"stok"=> $produk[0]['stok'],
			"deskripsi"=> $produk[0]['deskripsi'],
			"foto"=> $produk[0]['foto']
			);
		$kategori=$this->model->tampil_kategori();
		$this->load->view('web/header');
		$this->load->view('web/detail_barang',$data_produk,$produk);
		$this->load->view('web/kategori',['kategori'=>$kategori]);
		$this->load->view('web/footer',['kategori'=>$kategori]);
		}else{
			redirect('web/produk');
		}
	}

	public function about()
	{
		$kategori=$this->model->tampil_kategori();
        $about =$this->model->tampil_about();
		$this->load->view('web/header');
		$this->load->view('web/about',['about'=>$about]);
		$this->load->view('web/footer',['kategori'=>$kategori]);
	}

	public function daftar()
	{
		if(!isset($_SESSION['sesilogin'])){
			if(isset($_POST['daftar'])=='daftar'){
				$email=$_POST['email'];
				$sama = $this->db->where('email',$email)->get('tbl_user')->row()->email;
				if (isset($email) == $sama){
					$this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
            		<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            		Email Sudah Terdaftar
            		</div></div>");

					redirect('web/daftar');
				}else{
				$nama=$_POST['depan']." ".$_POST['belakang'];
				$password =(md5($_POST['password']));
				$telpon =$_POST['telpon'];
				$jk=$_POST['jk'];
				$alamat =$_POST['alamat'];
				$inputuser= array(
					'nama'=>$nama,
					'email'=>$email,
					'password'=>$password,
					'no_telpon'=>$telpon,
					'jk'=>$jk,
					'alamat'=>$alamat,
					'role'=>'2'
				);
				$res = $this->model->input('tbl_user',$inputuser);
        		if($res>=1){
            		$this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
            		<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            		Silahkan Login  <strong>Disini</strong>
            		</div></div>");
            		redirect('web/login');
        		}else{
        			$this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
            		<a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            		Masukan form ada yang salah
            		</div></div>");
            		redirect('web/daftar');
				}
        
				}
		}	
		$kategori=$this->model->tampil_kategori();
		$this->load->view('web/header');
		$this->load->view('web/daftar');
		$this->load->view('web/footer',['kategori'=>$kategori]);
		}else{
			redirect('/');
		}
	}

	public function profile()
	{
		if(isset($_SESSION['sesilogin'])){
		$kategori=$this->model->tampil_kategori();
		$this->load->view('web/header');
		$this->load->view('web/profile');
		$this->load->view('web/footer',['kategori'=>$kategori]);

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
                $res = $this->db->update('tbl_user',$updatedata,$where);
                $_SESSION['sesilogin']['foto'] = $gbr['file_name'];
                if($res>=1){
                     $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Ubah foto Berhasil !!</div></div>");
                redirect('web/profile'); 
                    redirect('web/profile');
                }}else{
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Ubah foto Gagal</div></div>");
                redirect('web/profile'); 
            }
        }else{
        	redirect('web/profile');
        }}else{
            $this->load->view('error404');
        }
    }

    public function ubah_profile(){
    	if(isset($_SESSION['sesilogin'])){
    		$nama=$_POST['nama'];
    		$no_telpon=$_POST['telpon'];
    		$alamat=$_POST['alamat'];
    		$updateprof = array(
    			'nama'=>$nama,
    			'no_telpon'=>$no_telpon,
    			'alamat'=>$alamat
    		);
    		$where = array('id_user'=>$_SESSION['sesilogin']['id_user']);
    		$res =$this->model->update('tbl_user',$updateprof,$where);
    		if($res>=1){
    			$_SESSION['sesilogin']['nama'] = $nama;
          		$_SESSION['sesilogin']['no_telpon'] = $no_telpon;
           		$_SESSION['sesilogin']['alamat'] = $alamat;
    			$this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Akun Berhasil Di Perbaharui</div></div>");
				redirect('web/profile');
			}else{
				$this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Akun Gagal Di Perbaharui!</div></div>");
				redirect('web/profile');
    		}
    	}
    }

    public function ubah_password(){
    	if(isset($_SESSION['sesilogin'])){
    		$password_lama=(md5($_POST['password_lama']));
    		$password_baru=$_POST['password_baru'];
    		$password_confrim=$_POST['password_confrim'];
    		if(($password_lama==$_SESSION['sesilogin']['password']) AND ($password_baru==$password_confrim)){
    			$password=(md5($password_baru));
    			$updatepass = array(
				'password' => $password,   
				);
				$where = array('id_user' => $_SESSION['sesilogin']['id_user']);
				$res = $this->model->update('tbl_user',$updatepass,$where);
				if($res>=1){
					session_start();
					 $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Password Berhasil Di Perbaharui</div></div>");
					redirect('web/profile');
				}else{
					$this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Ubah password Gagal !</div></div>");
					redirect('web/profile');
				}
    		}else{
				$this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Password lama yang dimasukan Salah !</div></div>");
				redirect('web/profile');
    		}
    	}
    }

    public function keranjang(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==2){
    		$keranjang =$this->model->tampil_keranjang($_SESSION['sesilogin']['id_user']);
    		$id_user=$_SESSION['sesilogin']['id_user']; 
    		$row =$this->model->total_harga_keranjang($id_user);
    		$bank =$this->model->tampil_bank();
    		$kategori=$this->model->tampil_kategori();
    		$this->load->view('web/header');
    		$this->load->view('web/keranjang',['keranjang'=>$keranjang]);
    		$this->load->view('web/total_bayar',['row'=>$row,'bank'=>$bank]);
    		$this->load->view('web/footer',['kategori'=>$kategori]);
    	}else{
    		$this->load->view('error404');
    	}
    }

    public function keranjang_tambah(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==2){
    		$id_user = $_SESSION['sesilogin']['id_user'];
    		$id_barang = $_POST['id_barang'];
    		$ada=  $this->db->query("SELECT * FROM tbl_keranjang WHERE id_barang='$id_barang' AND id_user='$id_user' AND status='belum'");
    		$row = $ada->row_array();
    		if(isset($row)){
    			$jumlah= $row['jumlah']+$_POST['jumlah'];
	    		$updatedata = array(
				'jumlah' => $jumlah,   
				);
				$where = array('id_keranjang' => $row['id_keranjang']);
				$res = $this->model->update('tbl_keranjang',$updatedata,$where);
				if($res>=1){
                     $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang Berhasil Masuk Kedalam Keranjang Belanja</div></div>");
					redirect('web/detail_barang/'.$_POST['id_barang']);
				}else{
                     $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang Gagal Masuk Kedalam Keranjang Belanja!</div></div>");
					redirect('web/detail_barang/'.$_POST['id_barang']);
				}

    		}else{
    		 $inputkeranjang = array(
            'id_user' => $_SESSION['sesilogin']['id_user'],
            'id_barang' => $_POST['id_barang'],
            'jumlah' => $_POST['jumlah'],
            'status' => 'belum'
            );
        $res = $this->model->input('tbl_keranjang',$inputkeranjang);
        if($res>=1){
            $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang Berhasil Masuk Kedalam Keranjang Belanja</div></div>");
            redirect('web/detail_barang/'.$_POST['id_barang']);
        }else{
            $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang Gagal Masuk Kedalam Keranjang Belanja!</div></div>");
            redirect('web/detail_barang/'.$_POST['id_barang']);
        }}

    	}else{
    		redirect('web/login');
    	}
    }

    public function delete_keranjang($id=''){

    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==2){
    			$where = array('id_keranjang' => $id,'id_user'=>$_SESSION['sesilogin']['id_user'],'status'=>'belum');
	 	$res = $this->model->delete('tbl_keranjang',$where);
	 	if($res>=1){
            $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang dalam keranjang Berhasil Di Hapus</div></div>");
	 		redirect('web/keranjang');
	 	}else{
            $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang dalam keranjang Gagal Di Hapus!</div></div>");
	 		redirect('web/keranjang');
	 	}
    	}else{
    		$this->load->view('error404');
    	}

    }

    public function tambah_transaksi(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==2){
    		if(isset($_POST['id_bank']) AND $_POST['total']){
    			$query= $this->db->query('SELECT COUNT(id_transaksi)+1 as jml FROM tbl_transaksi');
 				$row=$query->row();
 				$kodetransaksi =$row->jml;
 				$char = "AUD";
				$id_transaksi = $char . sprintf("%08s",$kodetransaksi);
				$id_user=$_SESSION['sesilogin']['id_user'];
  				$total = $_POST['total']+$kodetransaksi;
					$inputtransaksi = array(
			            'id_transaksi' => $id_transaksi,
			            'id_user' => $id_user,
			            'total' => $total,
			            'id_bank' => $_POST['id_bank'],
			            'alamat'=>$_SESSION['sesilogin']['alamat'],
			            'date' => date("Y-m-d")
			            );
			        $res = $this->model->input('tbl_transaksi',$inputtransaksi);
			        if($res>=1){
			    		$updatedata = array(
						'status' => 'belum_dibayar',
						'id_transaksi' => $id_transaksi   
						);
						$where = array('id_user' => $id_user,'id_transaksi'=>'');
						$res = $this->model->update('tbl_keranjang',$updatedata,$where);
						if($res>=1){
                            $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang dalam keranjang Berhasil Di pesan<strong>Silahkan Lakukan Pembayaran</strong></div></div>");
							redirect('web/detail_transaksi/'.$id_transaksi);
						}else{
                             $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang dalam keranjang Gagal Di pesan!</div></div>");
							redirect('web/keranjang');
						}
			        }else{
			       
			            redirect('web/keranjang');
			        }
			}else{
				 $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
			            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
			            Silahkan Pilih Bank Untuk Melanjutkan <strong>Transaksi</strong>
			            </div></div>");
				 redirect('web/keranjang');
			}
    	}else{
    		$this->load->view('error404');
    	}
    }

    public function transaksi(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==2){
    		$kategori=$this->model->tampil_kategori();
    		$data =$this->model->tampil_transaksi($_SESSION['sesilogin']['id_user']);
    		$this->load->view('web/header');
    		$this->load->view('web/transaksi',['data'=>$data]);
    		$this->load->view('web/kategori',['kategori'=>$kategori]);
    		$this->load->view('web/footer',['kategori'=>$kategori]);
    			
    	}else{
    		$this->load->view('error404');
    	}
    }

    public function detail_transaksi($id_transaksi=''){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==2){
    		$id_user=$_SESSION['sesilogin']['id_user'];
    		$query = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_keranjang ON tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi  JOIN tbl_bank ON tbl_bank.id_bank=tbl_transaksi.id_bank WHERE tbl_transaksi.id_transaksi='$id_transaksi' AND tbl_transaksi.id_user='$id_user'");
    		$row =$query->row();
    		$id_transaksi=$this->uri->segment(3);
          	$data = $this->web_model->tampil_detail_transaksi($id_transaksi,$id_user);
            $kategori=$this->model->tampil_kategori();
    		$this->load->view('web/header');
    		$this->load->view('web/detail_transaksi',['row'=>$row,'data'=>$data]);
    		$this->load->view('web/footer',['kategori'=>$kategori]);
    	}else{
    		$this->load->view('error404');
    	}
    }

    public function admin_manage_barang(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    	$barang= $this->model->tampil_barang();
    	$kategori= $this->model->tampil_kategori();
    	$this->load->view('web/header');
    	$this->load->view('admin/barang',['barang'=>$barang,'kategori'=>$kategori]);
    	$this->load->view('web/footer',['kategori'=>$kategori]);

    	}else{
    		$this->load->view('error404');	
    	}
    }


    public function admin_input_barang(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    		$this->load->library('upload');
		        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		        $config['upload_path'] = './assets/barang/'; //path folder
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '500048';
		        $config['file_name'] = $nmfile; //nama yang terupload nantinya
		 
		        $this->upload->initialize($config);
		         
		        if(isset($_FILES['filefoto']['name']))
		        {
		            if ($this->upload->do_upload('filefoto'))
		            {

		                $gbr = $this->upload->data();
		               	$nama_barang = $_POST['nama_barang'];
			    		$id_kategori = $_POST['id_kategori'];
			    		$harga = $_POST['harga'];
			    		$stok = $_POST['stok'];
			    		$deskripsi = $_POST['deskripsi'];
					    $inputdata=array(
					    	'nama_barang'=>$nama_barang,
					    	'id_kategori'=>$id_kategori,
					    	'harga'=>$harga,
					    	'stok'=>$stok,
					    	'deskripsi'=>$deskripsi,
					    	'date' => date("Y-m-d"),
					    	'id_user'=> $_SESSION['sesilogin']['id_user'],
		                  	'foto' =>$gbr['file_name']
		                );
		                $res = $this->model->input('tbl_barang',$inputdata);
		                if($res>=1){
                             $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Pemasukan Barang Berhasil</div>");
		                    redirect('web/admin_manage_barang');
		                }else{

                             $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Pemasukan Barang Gagal!</div>");
                            redirect('web/admin_manage_barang');  
                        }}else{
		                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !</div></div>");
		                redirect('web/admin_manage_barang');
		            }
		        }else{
		        	redirect('web');
		        }

    	}else{
    		$this->load->view('error404');	
    	}
    }

     public function admin_ubah_barang_gambar($id_barang=''){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    			$this->load->library('upload');
		        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		        $config['upload_path'] = './assets/barang/'; //path folder
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
		                $where = array('id_barang' => $id_barang);
		                $res = $this->db->update('tbl_barang',$updatedata,$where); //akses model untuk menyimpan ke database
		                if($res>=1){
		                    $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah foto barang Berhasil</div>");
                            redirect('web/admin_manage_barang');
		                }else{
                             $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah foto barang Gagal</div>");
                            redirect('web/admin_manage_barang');
                        }}else{
		                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah foto barang Gagal</div>");
                            redirect('web/admin_manage_barang');
		        }}else{
		        	redirect('web/admin_manage_barang');
		        }
    	}else{
            $this->load->view('error404');  
        }
    }


    public function admin_ubah_barang($id_barang=''){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    		$nama_barang = $_POST['nama_barang'];
    		$id_kategori = $_POST['id_kategori'];
    		$harga = $_POST['harga'];
    		$stok = $_POST['stok'];
    		$deskripsi = $_POST['deskripsi'];
		    $updatebarang=array(
		    	'nama_barang'=>$nama_barang,
		    	'id_kategori'=>$id_kategori,
		    	'harga'=>$harga,
		    	'stok'=>$stok,
		    	'deskripsi'=>$deskripsi
		    );
		    $where = array('id_barang' => $id_barang);
            $res = $this->db->update('tbl_barang',$updatebarang,$where);
            if($res>=1){
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\"><a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah Barang Berhasil</div>");
                redirect('web/admin_manage_barang');
            }else{
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah Barang Gagal</div>");
            redirect('web/admin_manage_barang');
        	}
    	}else{
    		$this->load->view('error404');	
    	}
    }


    public function admin_delete_barang($id=''){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
	    	$where = array('id_barang' => $id);
		 	$res = $this->model->delete('tbl_barang',$where);
		 	if($res>=1){
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Hapus Barang Berhasil</div>");
		 		redirect('web/admin_manage_barang');
		 	}else{
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Hapus Barang Gagal!</div>");
		 		redirect('web/admin_manage_barang');
		 	}
    	}else{
    		$this->load->view('error404');	
    	}
    }

     public function admin_manage_user(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    	$user= $this->model->tampil_user();
    	$kategori=$this->model->tampil_kategori();
    	$this->load->view('web/header');
    	$this->load->view('admin/manage_user',['user'=>$user]);
    	$this->load->view('web/footer',['kategori'=>$kategori]);

    	}else{
    		$this->load->view('error404');	
    	}
    }


    public function admin_input_user(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
		    $nama = $_POST['nama'];
    		$email = $_POST['email'];
    		$password = $_POST['password'];
    		$role = $_POST['role'];
    		$no_telpon = $_POST['no_telpon'];
    		$alamat = $_POST['alamat'];
    		$jk = $_POST['jk'];
		    $inputdata=array(
		    	'nama'=>$nama,
		    	'email'=>$email,
		    	'password'=>(md5($password)),
		    	'role'=>$role,
		    	'no_telpon'=>$no_telpon,
		    	'alamat' => $alamat,
		    	'jk'=> $jk
            );
            $res = $this->model->input('tbl_user',$inputdata);
            if($res>=1){
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Memasukan User Baru Berhasil</div>");
                redirect('web/admin_manage_user');
            }else{
           $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Memasukan User Baru Gagal!</div>");
            redirect('web/admin_manage_user');
        	}
    	}else{
    		$this->load->view('error404');	
    	}
    }


    public function admin_ubah_user($id_user=""){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    		if(isset($_POST['password'])){
    			$password = md5($_POST['password']);
    			$updatepass=array(
    				'password'=>$password
    			);
    			$where = array('id_user'=>$id_user);
    			$res = $this->model->update('tbl_user',$updatepass,$where);
	            if($res>=1){
                    $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah password User Berhasil</div>");
	                redirect('web/admin_manage_user');
	            }else{
	               $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah paswword User Gagal!</div>");
	            redirect('web/admin_manage_user');
	        	}
    		}
    		$nama = $_POST['nama'];
    		$email = $_POST['email'];
    		$role = $_POST['role'];
    		$no_telpon = $_POST['no_telpon'];
    		$alamat = $_POST['alamat'];
    		$jk = $_POST['jk'];
		    $updatedata=array(
		    	'nama'=>$nama,
		    	'email'=>$email,
		    	'role'=>$role,
		    	'no_telpon'=>$no_telpon,
		    	'alamat' => $alamat,
		    	'jk'=> $jk
            );
            $where = array('id_user'=>$id_user);
            $res = $this->model->update('tbl_user',$updatedata,$where); //akses model untuk menyimpan ke database
            if($res>=1){
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah Data User Berhasil</div>");
                    redirect('web/admin_manage_user');
            }else{
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah Data User Gagal!</div>");
                redirect('web/admin_manage_user');
            }
    	}else{
    		$this->load->view('error404');	
    	}
    }


    public function admin_delete_user($id=""){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    		$where = array('id_user' => $id);
		 	$res = $this->model->delete('tbl_user',$where);
		 	 if($res>=1){
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Hapus User Berhasil</div>");
                redirect('web/admin_manage_user');
            }else{
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Hapus User Gagal!</div>");
                redirect('web/admin_manage_user');
                }
    	}else{
    		$this->load->view('error404');	
    	}
    }

    public function admin_manage_transaksi(){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    		$transaksi = $this->model->tampil_transaksi_admin();
    		$kategori=$this->model->tampil_kategori();
    		$this->load->view('web/header');
    		$this->load->view('admin/transaksi',['transaksi'=>$transaksi]);
    		$this->load->view('web/footer',['kategori'=>$kategori]);
    	}else{
    		$this->load->view('error404');	
    	}
    }

    public function admin_transaksi_bayar($id_transaksi=""){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    		$updatedata=array(
    			'status'=>"dibayar"
    		);
    		$where=array('id_transaksi'=>$id_transaksi);
    		$res = $this->model->update('tbl_keranjang',$updatedata,$where);
		 	if($res>=1){
                  $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>ID transaksi ".$id_transaksi."Berhasil Dibayar</div>");
		 		redirect('web/admin_manage_transaksi');
		 	}else{
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>ID transaksi ".$id_transaksi."Gagal Dibayar!</div>");
		 		redirect('web/admin_manage_transaksi');
		 	}
    	}else{
    		$this->load->view('error404');	
    	}
    }

      public function admin_transaksi_kirim($id_transaksi=""){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
    		if($_POST['resi']!==""){
    		$updatedata=array(
    			'status'=>"dikirim"
    		);
    		$where=array('id_transaksi'=>$id_transaksi);
    		$res = $this->model->update('tbl_keranjang',$updatedata,$where);
		 	if($res>=1){
		 		$resi=$_POST['resi'];
		 		$updateresi=array(
		 			'resi'=>$resi
		 		);
    			$res = $this->model->update('tbl_transaksi',$updateresi,$where);
		 		if($res>=1){
                    $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>ID transaksi ".$id_transaksi."Berhasil Dikirim</div>");
		 			redirect('web/admin_manage_transaksi');
		 		}else{
                    $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>ID transaksi ".$id_transaksi."Gagal Dikirim</div>");
		 			redirect('web/admin_manage_transaksi');
		 		}
		 	}else{
		 		redirect('web/admin_manage_transaksi');
		 	}
		 }else{
            $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Resi Salah</div>");  
                redirect('web/admin_manage_transaksi');
		 }
    	}else{
    		$this->load->view('error404');	
    	}
    }

    public function admin_transaksi_terima($id_transaksi=""){
    	if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==2){
    		$updatedata=array(
    			'status'=>"diterima"
    		);
    		$where=array('id_transaksi'=>$id_transaksi);
    		$res = $this->model->update('tbl_keranjang',$updatedata,$where);
		 	if($res>=1){
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Barang Berhasil Diterima</div>");  
		 		redirect('web/detail_transaksi/'.$id_transaksi);
		 	}else{
		 		redirect('web/detail_transaksi/'.$id_transaksi);
		 	}
    	}else{
    		$this->load->view('error404');	
    	}
    }



    public function admin_manage_aplikasi(){
        if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
        $user= $this->model->tampil_user();
        $kategori=$this->model->tampil_kategori();
        $carousel=$this->model->tampil_carousel();
        $barang=$this->model->tampil_barang();
        $about=$this->model->tampil_about();
        $this->load->view('web/header');
        $this->load->view('admin/manage_aplikasi',['carousel'=>$carousel,'barang'=>$barang,'about'=>$about]);
        $this->load->view('web/footer',['kategori'=>$kategori]);

        }else{
            $this->load->view('error404');  
        }
    }

     public function proses_input_carosel(){

        if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/carousel/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '500048';
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
         
        if(isset($_FILES['filefoto']['name']))
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $id_barang =$_POST['id_barang'];
                $inputdata = array(
                    'id_barang'=> $id_barang,
                    'gambar' =>$gbr['file_name']
                   );
                $res = $this->model->input('tbl_carousel',$inputdata);
                if($res>=1){
                    $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Masukan carousel Baru Berhasil</div>");  
                    redirect('web/admin_manage_aplikasi');
                }else{
                  $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Masukan carousel Baru Gagal!</div>");  
                    redirect('web/admin_manage_aplikasi');   
                }}else{
                $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('web/admin_manage_aplikasi');
            }
        }else{
            redirect('web/admin_manage_aplikasi');
        }}else{
            $this->load->view('error404');
        }
    }

      public function admin_delete_carosel($id_carousel=""){
        if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
            $where = array('id_carousel' => $id_carousel);
            $res = $this->model->delete('tbl_carousel',$where);
            if($res>=1){
                 $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Hapus carousel Berhasl</div>");  
                redirect('web/admin_manage_aplikasi');
            }else{
                 $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Hapus carousel Gagal!</div>");  
                redirect('web/admin_manage_aplikasi');
            }
        }else{
            $this->load->view('error404');  
        }
    }

     public function proses_edit_about(){

        if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){
            if(isset($_FILES['filefoto']['name'])){
        $this->load->library('upload');
        $nmfile = "file_".time(); 
        $config['upload_path'] = './assets/img/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '500048';
        $config['file_name'] = $nmfile;
 
        $this->upload->initialize($config);
         
      
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $inputdata = array(
                    'gambar' =>$gbr['file_name']
                   );
                $where = array('id_about'=>'1');
                $res = $this->model->update('tbl_about',$inputdata,$where);
                if($res>=1){
                     $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah foto Sejarah Berhasil</div>");  
                    redirect('web/admin_manage_aplikasi');
                }}else{
               $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah foto Sejarah Gagal!</div>");  
                    redirect('web/admin_manage_aplikasi');
            }

    }elseif(isset($_POST['deskripsi'])){
        $deskripsi = $_POST['deskripsi'];
        $updatedata = array(
                    'deskripsi' =>$deskripsi
                   );
                $where = array('id_about'=>'1');
                $res = $this->model->update('tbl_about',$updatedata,$where);
                if($res>=1){
                    $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-success\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah Data Sejarah Berhasil</div>");  
                    redirect('web/admin_manage_aplikasi');
                }else{
               $this->session->set_tempdata("pesan", "<div id='mydiv' class=\"col-lg-12\"><div class=\"alert alert-danger\">
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Ubah foto Sejarah Gagal!</div>");  
                    redirect('web/admin_manage_aplikasi');
            }        
    }
    }else{
            $this->load->view('error404');
        }
    }
}