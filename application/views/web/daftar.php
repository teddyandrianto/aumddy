<div class="container utama">
	<div class="row">

	  <div class="col-md-8 col-sm-offset-2" style="background-color: #fff;">

            <div class="text-center">
              <h3 style="font-weight: bold; color: #0c7069">Daftar Akun Baru</h3>
              <p style="font-weight: bold;">Lengkapi form pendaftaran dibawah ini</p>
            </div>
            <hr>
            <!-- /.box-header -->
              <div class="panel-body">
            <form id="signupForm2" method="post" action="">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-garis" id="firstname" name="firstname" placeholder="Enter Nama Depan">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-garis" id="lastname" name="lastname" placeholder="Last name" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
      
                  <input type="email" class="form-garis" id="email" name="email" placeholder="Enter Email Address">
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
        
                      <input type="password" class="form-garis" id="password" name="password" placeholder="Enter Password">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">

                      <input type="password" class="form-garis" id="confirm_password" name="confirm_password" placeholder="Enter Confrim Password">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="number" class="form-garis" id="phone" name="phone" placeholder="Enter Nomor Handphone">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="radio">
                        <br>
                        <div class="row">
                        <div class="col-md-4">
                          <label><input class="radio-input" type="radio" name="jk" value="laki-laki" checked>Laki-Laki</label>
                        </div>
                        <div class="col-md-4">
                          <label><input class="radio-input" type="radio" name="jk" value="perempuan">Perempuan</label>
                        </div>                      
                      </div>
                    </div>
                  </div>
                </div>
              <div class="form-group">
                <div class="col-md-3 pull-right">
                  <button type="submit" class="btn btn-success btn-block" name="signup" value="Sign up">Sign up</button>
                </div>
              </div>
            </form>

          </div>
          <hr>
          <p class="text-center">Sudah Punya akun? <a href="<?php echo base_url('index.php/web/login')?>">Silahkan login</a></p>
          </div>
	</div>
 
  </div>
</div>
</div>

<script type="text/javascript">
    $.validator.setDefaults( {
      submitHandler: function () {
        alert( "submitted!" );
      }
    } );

    $( document ).ready( function () {
      $( "#signupForm2" ).validate( {
        rules: {
          firstname: "required",
          lastname: "required",
          phone: "required",
          password: {
            required: true,
            minlength: 5
          },
          confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#password"
          },
          email: {
            required: true,
            email: true
          },
        },
        messages: {
          firstname: "Please enter your firstname",
          lastname: "Please enter your lastname",
          phone: "Please enter your phone Number",
          username: {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 2 characters"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
          },
          email: "Please enter a valid email address",
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

  