
  <script>
     $(document).ready(function() {
    $('#tabel_user').DataTable( {
    } );
    $('#tabel_user tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        alert( data[0] +"'s salary is: "+ data[ 5 ] );
    } );
} );
    </script> 

<div class="container utama">
  <div class="row">
  
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Transaksi</h3>
      </div>
      <hr>
      <div class="box-body ">
        <table id="tabel_user" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>No</th>
                <th>ID Transkasi</th>
                <th>Pembeli</th>
                <th>Status</th>
                <th>Bank</th>
                <th>Kode Bayar</th>
                <th><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; 
            foreach ($transaksi as $trs) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $trs->id_transaksi ?></td>
                <td><?php echo $trs->nama ?></td>
                <td><span class="label label-default"><?php echo $trs->status ?></span></td>
                <td><?php echo $trs->nama_bank ?></td>
                <td><?php echo $trs->total?></td>
                <td>
            
                    <?php if($trs->status=="belum_dibayar") {?>
                  <a class="btn btn-info" href="<?php echo base_url('index.php/web/admin_transaksi_bayar/').$trs->id_transaksi?>">Dibayar</a>
                  <?php }elseif($trs->status=="dibayar"){ ?>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#resi_popup<?php echo $trs->id_transaksi?>">Kirim</button>
                     <?php }elseif ($trs->status=="dikirim") { ?>
                    <button class="btn btn-primary">Proses Kirim</button>
                  <?php }elseif ($trs->status=="diterima") { ?>
                    <button class="btn btn-success">Telah Diterima</button>
                  <?php } ?>
                </td>
            </tr>

            <div class="modal fade" id="resi_popup<?php echo $trs->id_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="modal-title"><b>Masukan Resi </b><?php echo $trs->id_transaksi ?></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" id="myForm" action="<?php echo base_url('index.php/web/admin_transaksi_kirim/').$trs->id_transaksi ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nomor Resi</label>
                      <input type="text" class="form-control" name="resi" multiple>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Resi</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
</div>
</div>
</div>
  