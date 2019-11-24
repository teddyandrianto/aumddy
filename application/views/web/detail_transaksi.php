<div  class="container utama">
  <div class="row">
    <div class="col-md-8 box">
      <h3>Transaksi Detail</h3><hr>
      <?php foreach ($data as $d) { ?>
      <div class="media">
        <div class="media-left">
          <img src="<?php echo base_url('assets/barang/').$d->foto?>"  class="media-object" style="width:100px ;height: 100px; ">
        </div>
        <div class="media-body">
          <span>
            <b>
              <a href="<?php echo base_url('index.php/web/detail_barang/').$d->id_barang?>"><?php echo $d->nama_barang?>               
              </a>
            </b>
          </span><br><br>
          <span class="btn-group" >Jumlah : <?php echo $d->jum_brg?> barang</span>
          <span class="pull-right" style="color: #0c7069; font-weight: bold; font-size: 16px"><?php echo $d->harga*$d->jum_brg?></span>
                
        </div>
      </div><hr>
      <?php } ?>
    </div>
    <div class="col-sm-4">
      <div class="list-group">
        <div class="list-group-item">
          <b>Nomor transaksi</b>
          <p class="media-heading"><?php echo $row->id_transaksi?></p>
        </div>
        <div class="list-group-item">
          <b>Total Tagihan</b>
          <p class="media-heading">Rp <?php $harga=$row->total == 0 ? '' : number_format($row->total, 0, ',', '.'); echo $harga?></p>
        </div>
        <?php if($row->status=='belum_dibayar'){?>
        <div class="list-group-item">
          <b>Status</b>
          <p class="media-heading">
            <div class="btn-group">
              <span class="btn btn-success btn-sm">Belum</span>
              <span class="btn btn-default btn-sm">Dibayar</span>
              <span class="btn btn-default btn-sm">Dikirim</span>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <div class="list-group-item">
          <b>Bank </b>
          <p class="media-heading"><?php echo $row->nama_bank?></p>
          <b>Nomor Rekening </b>
          <p class="media-heading"><?php echo $row->rekening?></p>
          <b>Nama Rekening </b>
          <p class="media-heading"><?php echo $row->nama_rekening?></p>
        </div>
        <?php }elseif ($row->status=='dibayar') { ?>
        <div class="list-group-item">
          <b>Status</b>
          <p class="media-heading">
            <div class="btn-group">
              <span class="btn btn-success btn-sm">Belum</span>
              <span class="btn btn-success btn-sm">Dibayar</span>
              <span class="btn btn-default btn-sm">Dikirim</span>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <?php }elseif ($row->status=='dikirim') { ?>
        <div class="list-group-item">
          <b>Status</b>
          <p class="media-heading">
            <div class="btn-group">
              <span class="btn btn-success btn-sm">Belum</span>
              <span class="btn btn-success btn-sm">Dibayar</span>
              <span class="btn btn-success btn-sm">Dikirim</span>
              <span class="btn btn-default btn-sm">Diterima</span>
            </div>
          </p>
        </div>
        <div class="list-group-item"><b>No Resi</b><p class="media-heading"><?php echo $row->resi; ?></p></div>
          <div class="list-group-item"><a href="<?php echo base_url('index.php/web/admin_transaksi_terima/').$row->id_transaksi ?>" class="btn btn-primary btn-sm btn-block">Diterima</a></div>
          <?php }elseif ($row->status=='diterima') { ?>
            <div class="list-group-item"><b>Status</b>
              <p class="media-heading">
                <div class="btn-group">
                  <span class="btn btn-success btn-sm">Belum</span>
                  <span class="btn btn-success btn-sm">Dibayar</span>
                  <span class="btn btn-success btn-sm">Dikirim</span>
                  <span class="btn btn-success btn-sm">Diterima</span>
                </div>
              </p>
            </div>
            <div class="list-group-item">
              <b>No Resi</b>
              <p class="media-heading"><?php echo $row->resi; ?></p>
            </div>
          <?php } ?>            
         <div class="list-group-item">
          <b>Expedisi</b>
          <p class="media-heading"><?php echo $row->pengiriman;?></p>
        </div>
        <div class="list-group-item">
          <b>Alamat Anda</b>
          <p class="media-heading"><?php echo $row->alamat;?></p>
        </div>

      </div>
    </div>
  </div>
</div>

  
