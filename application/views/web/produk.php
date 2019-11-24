<div class="container utama">
	<div class="row">
		<div class="col-sm-9">
      <div class="box">
  			<h4><b>Semua Produk 
          <?php if($this->uri->segment(3)){
                echo $this->uri->segment(3);
                }else{} 
          ?></b>
        </h4>
  			<div class="row">
          <?php foreach ($produk as $p) { ?>
          <div class="col-md-3">
            <div class="thumbnail">
              <a style="text-decoration:none;" href="<?php echo base_url('index.php/web/detail_barang/').$p->id_barang;?>" title="Click Untuk detail Barang">
                <img src="<?php echo base_url('assets/barang/').$p->foto;?>">
                <div class="caption">
                  <p><?php echo $p->nama_barang; ?></p>
                  <p style="color: #0c7069; font-weight: bold; font-size: 20px">Rp <?php echo $p->harga ?></p>
                </div>
              </a>
            </div>
          </div>
          <?php } ?>
  	    </div>
	    </div>
    </div>
	
