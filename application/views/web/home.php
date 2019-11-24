<div class="utama">
  <header style="margin-top: -20px">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
        <div class="carousel-inner" role="listbox">
        <?php $no=0; foreach ($carousel as $crs ) { ?>
          <?php $no++; if($no==1){ ?>
          <div class="item active">
          <?php }else{ ?>
            <div class=item>
          <?php } ?>
              <img src="<?php echo base_url('assets/carousel/').$crs->gambar?>" alt="Chicago">
              <div class="carousel-caption">
                <h1><?php echo $crs->nama_barang ?></h1>
                <p><?php echo $crs->deskripsi?></p>
                <p><a class="btn btn-lg btn-primary" href="<?php echo base_url('index.php/web/detail_barang/'.$crs->id_barang) ?>" role="button">Lihat</a></p>
              </div> 
            </div>
        <?php } ?>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
  </header>
  <div class="container"><br>
    <div class="box">
      <div class="col-md-12 box-head" > 
        <h4 class="text-center">PRODUK TERBARU</h4> 
      </div>
      <div class="row" id="barang" style="text-decoration: none;">
      <?php $i=1; foreach ($produk as $p) { 
            if($i++ <= 4){ ?>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="thumbnail">
            <a href="<?php echo base_url('index.php/web/detail_barang/').$p->id_barang;?>" style="text-decoration: none;" title="Click Untuk detail Barang" >
              <img class="img-responsive" src="<?php echo base_url('assets/barang/').$p->foto;?>" alt="Lights">
              <div class="caption">
                <p><?php echo $p->nama_barang; ?></p>
                <p style="color: #0c7069; font-weight: bold; font-size: 20px">Rp <?php echo $p->harga ?></p>
              </div>
            </a>
          </div>
        </div>
        <?php } } ?> 
      </div>
    </div>
  </div>
</div>

