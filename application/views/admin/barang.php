<div class="container utama">
  <div class="row">
    <div class="col-md-12">
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
          <h3 class="box-title">Data Barang</h3>
          <span>
            <button class="btn btn-success pull-right"  data-toggle="modal" data-target="#tambahbarang" style="margin-top: -30px;">Tambah Barang</button></span>
        </div><hr>
        <div class="box-body ">
          <table id="tabel_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($barang as $brg) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $brg->nama_barang ?></td>
                <td><?php echo $brg->stok ?></td>
                <td><?php echo $brg->harga ?></td>
                <td><?php echo $brg->nama_kategori ?></td>
                <td>
                  <img src="<?php echo base_url('assets/barang/').$brg->foto ?>" width="50">
                </td>
                <td>
                  <center>
                    <button class="btn btn-info"  data-toggle="modal" data-target="#editgmbr_popup<?php echo $brg->id_barang?>">Ubah Gambar</button>
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#edit_popup<?php echo $brg->id_barang?>">Ubah Data</button>
                    <a href="<?php echo base_url('index.php/web/admin_delete_barang/').$brg->id_barang?>" class="btn btn-danger">Hapus</a>
                  </center>
                </td>
              </tr>
              <div class="modal fade" id="edit_popup<?php echo $brg->id_barang?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title"><b>Ubah Barang</b></h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form role="form" id="myForm" action="<?php echo base_url('index.php/web/admin_ubah_barang/').$brg->id_barang ?>" method="post" >
                    <div class="row">
                      <div class="col-md-5">
                        <div class="modal-body">
                          <div class="box-body">
                            <div class="form-group">
                              <label>Nama Barang</label>
                              <input type="text" class="form-control" name="nama_barang" value="<?php echo $brg->nama_barang ?>" placeholder="Masukan Nama Barang">
                            </div>
                            <div class="form-group">
                              <label>Kategori</label>
                              <select class="form-control" name="id_kategori" >
                                <option value="<?php echo $brg->id_kategori?>"><?php echo $brg->nama_kategori?></option>
                                <?php foreach ($kategori as $kat) { 
                                if ($kat->id_kategori!=$brg->id_kategori){ ?>
                                <option value="<?php echo $kat->id_kategori ?>"><?php echo $kat->nama_kategori?></option>
                                <?php } }?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Harga</label>
                              <input type="number" class="form-control" name="harga" value="<?php echo $brg->harga?>" placeholder="Masukan Harga">
                            </div>
                          </div>  
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="modal-body">
                            <div class="form-group">
                              <label>Stok</label>
                                <input type="number" class="form-control" name="stok" value="<?php echo $brg->stok ?>" placeholder="Masuakn Stok">
                            </div>
                            <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea  class="ckeditor" id="ckedtor" class="form-control" name="deskripsi" rows="4"><?php echo $brg->deskripsi; ?></textarea>
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

            <div class="modal fade" id="editgmbr_popup<?php echo $brg->id_barang?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-sm role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="modal-title"><b>Ubah Gambar</b></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" id="myForm" action="<?php echo base_url('index.php/web/admin_ubah_barang_gambar/').$brg->id_barang ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" class="form-control" name="filefoto" multiple>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Gambar</button>
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

  <div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title"><b>Tambah Barang</b></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" id="myForm" action="<?php echo base_url('index.php/web/admin_input_barang') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-5">
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang"  placeholder="Masukan Nama Barang">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="id_kategori" >
                    <?php foreach ($kategori as $kat) { ?>
                    <option value="<?php echo $kat->id_kategori ?>"><?php echo $kat->nama_kategori?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga"  placeholder="Masukan Harga">
                </div>
                <div class="form-group">
                  <label>Stok</label>
                    <input type="number" class="form-control" name="stok"  placeholder="Masuakn Stok">
                </div>
              </div>  
            </div>
          </div>
          <div class="col-md-7">
            <div class="modal-body">
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" class="form-control" name="filefoto" multiple>
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

