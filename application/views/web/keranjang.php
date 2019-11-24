<div  class="container utama">
  <?php echo $this->session->flashdata('pesan'); ?>
  <div class="row">      
    <div class="col-md-8 box">
      <h3>Keranjang belanja</h3><hr>
      <?php if(isset($_SESSION['sesilogin'])){ 
          foreach ($keranjang as $k) { ?>
      <div class="media">
        <div class="media-left">
          <img src="<?php echo base_url('assets/barang/').$k->foto?>"  class="media-object" style="width:100px ;height: 100px; ">
        </div>
        <div class="media-body">
          <span>
            <b><a href="<?php echo base_url('index.php/web/detail_barang/').$k->id_barang?>"><?php echo $k->nama_barang?></a></b>
          </span> 
          <a href="<?php echo base_url('index.php/web/delete_keranjang/').$k->id_keranjang ?>" class="fa fa-times pull-right"></a><br><br>
          <span class="btn-group" >Jumlah : <?php echo $k->jum_brg?> barang</span>
          <span class="pull-right" style="color: #0c7069; font-weight: bold; font-size: 16px"><?php echo $k->harga*$k->jum_brg?>
          </span>
        </div>
      </div><hr>
      <?php } } ?>
    </div>

  
