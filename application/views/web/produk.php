<div class="container utama">
	<div class="row">
		<div class="col-sm-9">
      <div class="box">
			<h4><b>Produk</b></h4>
			<div class="row">
        <?php foreach ($produk as $p) { ?>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="detail_barang.html">
              <img src="<?php echo base_url('assets/img/').$p->foto;?>" alt="Lights">
              <div class="ditel "><center>
                <a href="<?php echo base_url('index.php/web/detail_barang/').$p->id_barang;?>" class="btn btn-success btn-md ">Lihat</a>
                </center>
              </div>
              <div class="caption">
                <p><?php echo $p->nama_barang; ?></p>
                <p style="color: #0c7069; font-weight: bold; font-size: 20px">Rp <?php echo $p->harga ?></p>
              </div>
            </a>
          </div>
        </div>
        <?php } ?>
				
	        </div>
           <ul class="pagination">
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li class="disabled"><a href="#">4</a></li>
    <li><a href="#">5</a></li>
  </ul>
		</div>
    </div>
		<div class="col-sm-3">
			<div class="list-group">
  				<a class="list-group-item" style="background-color: #0c7069; color: #fff;"><b>Kategori</b></a>
  				<a href="#" class="list-group-item">Baju</a>
  				<a href="#" class="list-group-item">Jaket</a>
  				<a href="#" class="list-group-item">Celana</a>
  				<a href="#" class="list-group-item">Sepatu</a>
			</div>
		</div>
	</div>
</div>
