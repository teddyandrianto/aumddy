<div class="container utama">
	<div class="row">
    <?php echo $this->session->flashdata('pesan');?>
	  <div class="col-md-8 col-sm-offset-2" style="background-color: #fff;">
      <div class="text-center">
        <h3 style="font-weight: bold; color: #0c7069">Daftar Akun Baru</h3>
        <p style="font-weight: bold;">Lengkapi form pendaftaran dibawah ini</p>
      </div><hr>
      <div class="panel-body">
        <form id="signupForm2" method="post" action="<?php echo base_url('index.php/web/daftar') ?>">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-garis" id="depan" name="depan" placeholder="Masukan Nama Depan">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-garis" id="belakang" name="belakang" placeholder="Masukan Nama Belakang" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="email" class="form-garis" id="email" name="email" placeholder="Masukan Alamat Email">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="password" class="form-garis" id="password1" name="password" placeholder="Masukan Password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="password" class="form-garis" id="konfirmasi_password" name="konfirmasi_password" placeholder="Masukan Konfirmasi Password">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="number" class="form-garis" id="telpon" name="telpon" placeholder="Masukan Nomor Handphone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="radio"><br>
                    <div class="row">
                      <div class="col-md-4">
                        <label><input class="radio-input" type="radio" name="jk" value="L" checked>Laki-Laki</label>
                      </div>
                      <div class="col-md-4">
                        <label><input class="radio-input" type="radio" name="jk" value="P">Perempuan</label>
                      </div>                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <textarea class="form-garis" placeholder="Masukan Alamat" name="alamat" id="alamat"></textarea>
              </div>
              <div class="form-group">
                <div class="col-md-3 pull-right">
                  <button type="submit" class="btn btn-success btn-block" name="daftar" value="daftar">Daftar</button>
                </div>
              </div>
            </div>
            <hr>
              <p class="text-center">Sudah Punya akun? <a href="<?php echo base_url('index.php/web/login')?>">Silahkan masuk</a></p>
          </div>
        </form>
	    </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $( document ).ready( function () {
      $( "#signupForm2" ).validate( {
        rules: {
          depan: "required",
          belakang: "required",
          telpon: "required",
          alamat: "required",
          password: {
            required: true,
            minlength: 5
          },
          konfirmasi_password: {
            required: true,
            minlength: 5,
            equalTo: '#password1'
          },
          email: {
            required: true,
            email: true
          },
        },
        messages: {
          depan: "Masukan Nama Depan Anda",
          belakang: "Masukan Nama Belakang Anda",
          telpon: "Masukan Nomor Telepon Anda",
          alamat: "Masukan Alamat Anda",
          password: {
            required: "Masukan Password",
            minlength: "Masukan password lebih dari 5 karakter"
          },
          konfirmasi_password: {
            required: "Masukan Password",
            minlength: "Masukan password lebih dari 5 karakter",
            equalTo: "Masukan password Harus Sama dengan disamping"
          },
          email: "Masukan Alamat Email Anda",
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

  