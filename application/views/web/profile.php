<div class="container utama">
	<div class="row">
    <div class="col-md-3" style="margin-right: 10px ;padding: 20px; background-color: #fff;">
      <?php if($_SESSION['sesilogin']['foto']!=""){?>
      <img src="<?php echo base_url('assets/photo-profile/').$_SESSION['sesilogin']['foto']?>" class="img-responsive">
      <?php }else{ ?>
      <img src="<?php echo base_url('assets/img/not-profile.png');?>" class="img img-responsive">
      <?php } ?>
      <br>
      <form role="form" class="form-group" method="POST" action="<?php echo base_url('index.php/web/update_img_profile')?>" enctype="multipart/form-data">
        <input type="file" name="filefoto" id="cleardemo" multiple><br>
        <button type="submit" name="btnSubmite" class="btn btn-success btn-block">Ubah foto</button> 
      </form>
    </div>
	  <div class="col-md-8 " style="background-color: #fff;">
      <div style="margin-top: 30px">
        <span style="font-weight: bold; color: #0c7069; font-size:25px">Informasi Umum</span>
        <button type="submit" class="pull-right btn btn-success btn-sm" data-toggle='modal' data-target='#exampleModalCenter2'>Ubah</button>
      </div><hr>
      <div class="panel-body">
        <form class="form-horizontal">     
          <div class="row">    
            <label class="col-sm-3 control-label">E-mail :</label>
            <div class="col-md-9">
              <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['sesilogin']['email']?>
              </p>
            </div>
            <label class="col-sm-3 control-label">Nama Lengkap :</label>
            <div class="col-md-9">
              <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['sesilogin']['nama']?>
              </p>
            </div>
            <label class="col-sm-3 control-label">Telepon :</label>
            <div class="col-md-9">
              <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['sesilogin']['no_telpon']?>
              </p>
            </div>
            <label class="col-sm-3 control-label">Alamat :</label>
            <div class="col-md-9">
              <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['sesilogin']['alamat']?>
              </p>
            </div>
          </div>
        </form>        
      </div>
      <div style="margin-top: 30px">
        <span style="font-weight: bold; color: #0c7069; font-size:25px">Password</span>
      </div><hr>
      <form id="updatepassword" method="POST" action="<?php echo base_url('index.php/web/ubah_password') ?>">
        <div class="form-group col-md-4">
          <label >Password Lama</label>
          <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukan Password Lama">
        </div>
        <div class="form-group col-md-4">
          <label>Password Baru</label>
          <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukan Password Baru">
        </div>
        <div class="form-group col-md-4">
          <label>Konfirmasi Password</label>
          <input type="password" class="form-control" id="password_confrim" name="password_confrim" placeholder="Masukan Konfrim Password">
        </div><br>
        <div class="form-group col-md-12 ">
          <button type="submit" class="btn btn-success pull-right">Ubah Password</button>
        </div>                
      </form>
	   </div>
  </div>
</div>


<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <form id="myForm" action="<?php echo base_url('index.php/web/ubah_profile')?>" method="post">
      <div class="modal-header">
        <h4><b>Ubah Akun</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="hidden" name="txtId" value="4">
                <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['sesilogin']['nama']?>" placeholder="Masukan Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Telpon</label>
                <input type="text" class="form-control" name="telpon" value="<?php echo $_SESSION['sesilogin']['no_telpon']?>" placeholder="Masukan Nomor Telpon">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat"><?php echo $_SESSION['sesilogin']['alamat']?></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah Profile</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $('#cleardemo').filestyle({
    iconName : 'fa fa-file-image-o',
    buttonText : ' Pilih foto',
    buttonName : 'btn-info'
  });
  $('#clear').click(function() {
  $('#cleardemo').filestyle('clear');
  });
</script>

<script type="text/javascript">
    $( document ).ready( function () {
      $( "#updatepassword" ).validate( {
        rules: {
          password_lama: "required",
          password_baru: {
            required: true,
            minlength: 5
          },
          password_confrim: {
            required: true,
            minlength: 5,
            equalTo: "#password_baru"
          },
          email: {
            required: true,
            email: true
          },
        },
        messages: {
          password_lama: "Masukan password Anda",
          password_baru: {
            required: "Masukan Password",
            minlength: "Masukan password lebih dari 5 karakter"
          },
          password_confrim: {
            required: "Masukan Password",
            minlength: "Masukan password lebih dari 5 karakter",
            equalTo: "Masukan password Harus Sama dengan disamping"
          },
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      } );

    } );
  </script>


  