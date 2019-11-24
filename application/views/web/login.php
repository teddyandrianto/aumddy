<div class="container utama">
	<div class="row">
    <div class="col-md-5 col-sm-offset-2 box">
      <div class="text-center">
        <h3 style="font-weight: bold; color: #0c7069">Masuk</h3>
      </div>
      <hr>
      <div class="panel-body">
        <form id="signupForm2" method="post" action="<?php echo base_url('index.php/web/login')?>">
          <div class="box-body">            
            <div class="form-group">
              <input type="email" class="form-garis" id="username" name="email" placeholder="Masukan Email Anda">
            </div>              
            <div class="form-group">
              <input type="password" class="form-garis" id="password" name="password" placeholder="Masukan Password Anda">
            </div>         
            <div class="form-group">
              <div class="">
                <button type="submit" class="btn btn-success btn-block" >Masuk</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-3 box2">
      <h4>Pelanggan baru?</h4><br>
      <p>Dengan membuat sebuah akun di toko kami, kamu akan lebih mudah dalam proses transaksi.</p>
      <a href="daftar.html" type="button" class="btn btn-default btn-sm center-block">Buak sebuah Akun</a>
    </div>
  </div>
</div>


<script type="text/javascript">

    $( document ).ready( function () {
      $( "#signupForm2" ).validate( {
        rules: {
          password: {
            required: true,
            minlength: 5
          },
          email: {
            required: true,
            email: true
          },
        },
        messages: {
          email: "Masukan Email Anda",
          password: "Masukan Password Anda",
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
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
