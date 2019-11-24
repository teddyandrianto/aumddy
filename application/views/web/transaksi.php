<div  class="container utama">
  <div class="row">
    <div class="col-md-9 box">
      <h3>Transaksi</h3><hr>
      <?php foreach ($data as $d) { ?>
      <div class="media">
        <div class="media-body">
          <div class="col-md-3">
            <p>No transaksi</p>
            <h4 class="media-heading"><?php echo $d->id_transaksi;?></h4>
          </div>
          <div class="col-md-3">
            <p>Total Tagihan</p>
            <h4 class="media-heading">Rp <?php $harga=$d->total == 0 ? '' : number_format($d->total, 0, ',', '.'); echo $harga?></h4>
          </div>
          <div class="col-md-2">
            <p>Status</p>
            <h4 class="media-heading"><span class="label label-default"><?php echo $d->status;?></span></h4>
          </div>
          <div class="col-md-2">
            <p>Pesan</p>
            <h5 class="media-heading"><?php echo $d->date; ?></h5>
          </div>
          <div class="col-md-2"><br>
            <a href="<?php echo base_url('index.php/web/detail_transaksi/').$d->id_transaksi ?>" class="btn btn-success btn-sm">Detail Transaksi</a>
          </div>
        </div>
      </div><hr>
      <?php } ?>
    </div>

  
