<?php 
class web_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function login() {

		$email = $this->input->POST('email', TRUE);
		$password = md5($this->input->POST('password', TRUE));
		$query = $this->db->query("SELECT * from tbl_user where ( email='$email') and password= '$password' LIMIT 1");
		if($query->num_rows() == 0){
			return false;
		}else{
			$data = $query->row();
			$_SESSION['sesilogin'] = array('id_user'=>$data->id_user,'nama'=>$data->nama,'password'=>$data->password,'email'=>$data->email,'no_telpon'=>$data->no_telpon,'alamat'=>$data->alamat,'jk'=>$data->jk,'foto'=>$data->foto,'role'=>$data->role);
			return true;
		}
	}
	public function tampil_barang(){

		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori');
		$this->db->order_by("id_barang", "DESC");
		$query = $this->db->get();
		return $query->result();
	}
	public function tampil_user(){
		$this->db->order_by("id_user", "ASC");
		$query = $this->db->get('tbl_user');
		return $query->result();
	}  

	public function tampil_barang_kategori($nama_kategori){
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori');
		$this->db->where('tbl_kategori.nama_kategori=',$nama_kategori);
		$this->db->order_by("id_barang", "DESC");
		$query = $this->db->get();
		return $query->result();
	} 
	public function tampil_barang_cari($cari_barang){
		$this->db->like('nama_barang', $cari_barang);
		$query = $this->db->get('tbl_barang');
		return $query->result(); 
	}
	public function tampil_detail_transaksi($id_transaksi,$id_user){
		$sql="SELECT SUM(tbl_keranjang.jumlah) as jum_brg ,foto,nama_barang, deskripsi,tbl_keranjang.id_barang, harga,id_keranjang,tbl_keranjang.id_user FROM tbl_keranjang JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang WHERE  tbl_keranjang.id_transaksi='$id_transaksi'  GROUP BY tbl_keranjang.id_barang HAVING tbl_keranjang.id_user='$id_user'";
		$query = $this->db->query($sql);
		return $query->result();
	} 
	public function tampil_keranjang($id_user){
		$sql="SELECT SUM(tbl_keranjang.jumlah) as jum_brg ,foto,nama_barang, deskripsi,tbl_keranjang.id_barang, harga,id_keranjang FROM tbl_keranjang JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang WHERE tbl_keranjang.id_user=$id_user AND tbl_keranjang.status='belum' group by tbl_keranjang.id_barang";
		$query = $this->db->query($sql);
		return $query->result();
	} 
	public function tampil_transaksi($id_user){
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->join('tbl_keranjang','tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi');
		$this->db->join('tbl_barang','tbl_barang.id_barang=tbl_keranjang.id_barang');
		$this->db->where('tbl_transaksi.id_user=',$id_user);
		$this->db->group_by('tbl_transaksi.id_transaksi');
		$this->db->order_by('tbl_transaksi.date','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function tampil_transaksi_admin(){
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->join('tbl_keranjang','tbl_keranjang.id_transaksi=tbl_transaksi.id_transaksi');
		$this->db->join('tbl_bank','tbl_bank.id_bank=tbl_transaksi.id_bank');
		$this->db->join('tbl_user','tbl_user.id_user=tbl_transaksi.id_user','left');
		$this->db->group_by('tbl_transaksi.id_transaksi');
		$this->db->order_by('tbl_transaksi.date','DESC');
		$query = $this->db->get();
		return $query->result();
	} 
	public function total_keranjang($id_user){
		$sql="SELECT count(id_barang) as total_brg  FROM tbl_keranjang WHERE tbl_keranjang.id_user=$id_user AND status=''";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function total_harga_keranjang($id_user){
		$sql="SELECT SUM(harga*jumlah) as total FROM tbl_keranjang JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang WHERE tbl_keranjang.id_user='$id_user' AND status='belum'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	public function tampil_kategori(){
		$this->db->order_by('nama_kategori');
		$query = $this->db->get('tbl_kategori');
		return $query->result();
	} 
	
	public function detail_barang($where=""){
		$data_modul = $this->db->get('tbl_barang'.$where);
		return $data_modul->result_array();
	} 
	public function tampil_bank(){
		$this->db->order_by('id_bank');
		$query = $this->db->get('tbl_bank');
		return $query->result();
	} 
	public function tampil_carousel(){
		$this->db->from('tbl_carousel');
		$this->db->join('tbl_barang','tbl_barang.id_barang=tbl_carousel.id_barang');
		$query = $this->db->get();
		return $query->result();
	} 

	public function tampil_about(){
		$query = $this->db->get('tbl_about');
		return $query->result();
	}
	public function input($tabelName,$data){
        $res = $this->db->insert($tabelName,$data);
        return $res;
    }
	public function update($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;
	}
	public function delete($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}
}