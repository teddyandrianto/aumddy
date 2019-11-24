
<div class="container utama">
  <div class="row">
	
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
          <script>
          $(document).ready(function() {
              $('#tabel_barang').DataTable( {
              } );
              $('#tabel_barang tbody').on( 'click', 'button', function () {
                  var data = table.row( $(this).parents('tr') ).data();
                  alert( data[0] +"'s salary is: "+ data[ 5 ] );
              } );
          } );
    </script> 

        <h3 class="box-title">Data Carosel</h3>
          <span><button class="btn btn-success pull-right"  data-toggle="modal" data-target="#tambahbarang" style="margin-top: -30px;">Tambah Carosel</button>
      </div>
      <hr>
      <div class="box-body ">
        <table id="tabel_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th><center>Gambar</center></th>
                <th><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; 
            foreach ($carousel as $car) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $car->nama_barang ?></td>
                <td><center><img src="<?php echo base_url('assets/carousel/').$car->gambar ?>" width="150px";></center></td>
                <td>
                  <center>
                  <a href="<?php echo base_url('index.php/web/admin_delete_carosel/').$car->id_carousel ?>" class="btn btn-danger">Hapus</a>
                  </center>
                </td>
            </tr>

            
          

            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
</div>

  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Sejarah</h3>
      </div>
      <div class="box-body">
        <?php foreach ($about as $abt ) { ?>
          <a type="button" data-toggle="modal" data-target="#editgmbr_popup" >
          <img title="Klik untuk Edit" class="img img-responsive" src="<?php echo base_url('assets/img/').$abt->gambar ?>">
          </a>
          <br>
          <a title="Klik untuk Edit" style="text-decoration:none;" data-toggle="modal" data-target="#edit_popup">
          <p><?php echo $abt->deskripsi ?></p>
          <?php } ?>
          </a>
      </div>
    </div>
</div>

<div class="modal fade" id="edit_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="modal-title"><b>Ubah Deskripsi Sejarah</b></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form  action="<?php echo base_url('index.php/web/proses_edit_about') ?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                    <textarea name="deskripsi" class="ckeditor" id="ckedtor"><?php echo $abt->deskripsi ?></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

</div>
</div>
  <div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title"><b>Tambah Carousel</b>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></span>
        </div>
        <form role="form" id="myForm" action="<?php echo base_url('index.php/web/proses_input_carosel') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="id_barang" >
                    <?php foreach ($barang as $brg) { ?>
                    <option value="<?php echo $brg->id_barang ?>"><?php echo $brg->nama_barang?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="filefoto" multiple>
                  <p>Ukuran 1366 x 541</p>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    <div class="modal fade" id="editgmbr_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="modal-title"><b>Ubah Gambar Sejarah</b></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" id="myForm" action="<?php echo base_url('index.php/web/proses_edit_about/') ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file"  name="filefoto" multiple>
                    </div>
                    <p>Ukuran 1366 x 541</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Gambar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

<script type="text/javascript" src="<?php echo base_url('assets/')?>ckeditor/ckeditor.js"></script>
            
