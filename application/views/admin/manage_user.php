
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
        <h3 class="box-title">Data User</h3>
          <span><button class="btn btn-success pull-right"  data-toggle="modal" data-target="#tambahuser" style="margin-top: -30px;">Tambah User</button>
      </div>
      <hr>
      <div class="box-body ">
        <table id="tabel_user" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Role</th>
                <th><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; 
            foreach ($user as $usr) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $usr->nama ?></td>
                <td><?php echo $usr->email ?></td>
                <td><?php echo $usr->no_telpon ?></td>
                <td><?php echo $usr->alamat ?></td>
                <td>
                  <?php if($usr->role==1){
                        echo 'Admin';
                      }else{
                        echo "Pembeli";
                    } ?>
                </td>
                <td>
                  <center>
                  <button class="btn btn-info"  data-toggle="modal" data-target="#editpass_popup<?php echo $usr->id_user?>">Ubah Password</button>
                  <button class="btn btn-warning"  data-toggle="modal" data-target="#edit_popup<?php echo $usr->id_user?>">Ubah Data</button>
                  <a href="<?php echo base_url('index.php/web/admin_delete_user/').$usr->id_user?>" class="btn btn-danger">Hapus</a>
                  </center>
                </td>
            </tr>

            <div class="modal fade" id="edit_popup<?php echo $usr->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title"><b>Ubah User</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" id="myForm" action="<?php echo base_url('index.php/web/admin_ubah_user/').$usr->id_user ?>" method="post" >
                  <div class="row">
                    <div class="col-md-5">
                      <div class="modal-body">
                        <div class="box-body">
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $usr->nama ?>"  placeholder="Masukan Nama Lengkap">
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $usr->email ?>" placeholder="Masukan Email">
                          </div>
                          <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role" >
                              <?php if($usr->role==1){ ?>
                              <option value="1">Admin</option>
                              <option value="2">pembeli</option>
                              <?php }elseif($usr->role==2){ ?>
                              <option value="2">pembeli</option>
                              <option value="1">Admin</option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Telepon</label>
                            <input type="number" class="form-control" value="<?php echo $usr->no_telpon ?>" name="no_telpon">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="modal-body">
                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" rows="4"><?php echo $usr->alamat ?></textarea>
                          </div>
                           <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <div class="radio">
                              <?php if($usr->jk=="P"){?>
                              <label><input type="radio" name="jk" value="L"> Laki-Laki </label>
                                &nbsp&nbsp&nbsp&nbsp
                              <label><input type="radio" name="jk" value="P" checked> Perempuan </label>
                              <?php }else{ ?>
                              <label><input type="radio" name="jk" value="L" checked> Laki-Laki </label>
                                &nbsp&nbsp&nbsp&nbsp
                              <label><input type="radio" name="jk" value="P"> Perempuan </label>
                              <?php } ?>
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

            <div class="modal fade" id="editpass_popup<?php echo $usr->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="modal-title"><b>Ubah Password </b><?php echo $usr->nama ?></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form role="form" id="myForm" action="<?php echo base_url('index.php/web/admin_ubah_user/').$usr->id_user ?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" multiple>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Password</button>
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
  <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title" style="font-size: 24px;"><b>Tambah User</b></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" id="myForm" action="<?php echo base_url('index.php/web/admin_input_user') ?>" method="post">
        <div class="row">
          <div class="col-md-5">
            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama"  placeholder="Masukan Nama Lengkap">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email"  placeholder="Masukan Email">
                </div>
                <div class="form-group">
                  <label>Password</label>
                    <input type="Password" class="form-control" name="password"  placeholder="Masuakn Password">
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role" >
                    <option value="1">Admin</option>
                    <option value="2">pembeli</option>
                  </select>
                </div>
              </div>  
            </div>
          </div>
          <div class="col-md-7">
            <div class="modal-body">
                <div class="form-group">
                  <label>Telpon</label>
                  <input type="number" class="form-control" name="no_telpon">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="4"></textarea>
                </div>
                 <div class="form-group">
                  <label>Jenis Kelamin</label><br>
                  <div class="radio">
                    <label><input type="radio" name="jk" value="L" checked> Laki-Laki </label>
                      &nbsp&nbsp&nbsp&nbsp
                    <label><input type="radio" name="jk" value="P"> Perempuan </label>
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

