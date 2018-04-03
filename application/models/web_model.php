<?php 
class web_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function login() {

		$username = $this->input->POST('username', TRUE);
		$password = md5($this->input->POST('password', TRUE));
		$query = $this->db->query("SELECT * from tbl_user where (username= '$username' or email='$username') and password= '$password' LIMIT 1");
		if($query->num_rows() == 0){
			return false;
		}else{
			$data = $query->row();
			$_SESSION['sesilogin'] = array('id_user'=>$data->id_user,'username'=>$data->username,'nama'=>$data->nama,'password'=>$data->password,'email'=>$data->email,'no_telpon'=>$data->no_telpon,'jk'=>$data->jk,'foto'=>$data->foto,'role'=>$data->role);
			return true;
		}
	}

	public function tampil_barang(){
		$sql="SELECT * FROM tbl_barang ORDER BY id_barang DESC";
		$query = $this->db->query($sql);
		return $query->result();
	} 
	public function tampil_keranjang($id_user){
		$sql="SELECT SUM(tbl_keranjang.jumlah) as jum_brg ,foto,nama_barang, deskripsi,tbl_keranjang.id_barang FROM tbl_keranjang JOIN tbl_barang ON tbl_barang.id_barang=tbl_keranjang.id_barang WHERE tbl_keranjang.id_user=$id_user group by tbl_keranjang.id_barang";
		$query = $this->db->query($sql);
		return $query->result();
	} 
	public function total_keranjang($id_user){
		$sql="SELECT count(id_barang) as total_brg  FROM tbl_keranjang WHERE tbl_keranjang.id_user=$id_user AND status=''";
		$query = $this->db->query($sql);
		return $query->result();
	} 
	
	public function detail_barang($where=""){
		$data_modul = $this->db->query('select * from tbl_barang'.$where);
		return $data_modul->result_array();
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