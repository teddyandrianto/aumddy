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
     <input type="file" name="filefoto" id="cleardemo" multiple>
     <br>
     <button type="submit" name="btnSubmite" class="btn btn-success btn-block">Update Photo</button>
      
    </form>
    <script>

$('#cleardemo').filestyle({
 
iconName : 'fa fa-file-image-o',

buttonText : ' Choose image',
 
buttonName : 'btn-info'
 
});
 
 
 
$('#clear').click(function() {
 
$('#cleardemo').filestyle('clear');
 
});
 
</script>
    
  </div>

	  <div class="col-md-8 " style="background-color: #fff;">
                 <div style="margin-top: 30px">
                  <span style="font-weight: bold; color: #0c7069; font-size:25px">Informasi Umum</span>
                  <button type="submit" class="pull-right btn btn-success btn-sm" name="signup" value="Sign up">Ubah</button>
                </div>
            <hr>
            <!-- /.box-header -->
              <div class="panel-body">
            <form class="form-horizontal">
             
                <div class="row">
              
                  <label class="col-sm-3 control-label">Username :</label>
                  <div class="col-md-9">
                      <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['sesilogin']['username']?></p>
                  </div>
                 <label class="col-sm-3 control-label">Nama Lengkap :</label>
                  <div class="col-md-9">
                      <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['sesilogin']['nama']?></p>
                  </div>
                  <label class="col-sm-3 control-label">E-mail :</label>
                  <div class="col-md-9">
                      <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['sesilogin']['email']?></p>
                  </div>
              
                   <label class="col-sm-3 control-label">Telpon :</label>
                  <div class="col-md-9">
                      <p class="form-control" style="border-style: none;box-shadow: none"><?= $_SESSION['sesilogin']['no_telpon']?></p>
                  </div>
                      <label class="col-sm-3 control-label">Alamat :</label>
                  <div class="col-md-9">
                      <p class="form-control" style="border-style: none;box-shadow: none">Jl.Cikoneng,komplek geria indah cikoneng no 3A<br> 
Kec. Bojong Soang</p>
                  </div>
            </div>
            </form>

          
          </div>

                 <div style="margin-top: 30px">
                  <span style="font-weight: bold; color: #0c7069; font-size:25px">Password</span>
                </div>
            <hr>
                <form>
                 <div class="form-group col-md-4">
                  <label >Password Lama</label>
                  <input type="password" class="form-control" placeholder="Enter Password Lama">
                </div>

                <div class="form-group col-md-4">
                  <label>Password Baru</label>
                  <input type="password" class="form-control" placeholder="Enter Password Baru">
                </div>
                <div class="form-group col-md-4">
                  <label>Konfirmasi Password</label>
                  <input type="password" class="form-control" placeholder="Enter Confrim Password">
                </div>
                  <br>
                  <div class="form-group col-md-12 ">
                      <button class="btn btn-success pull-right">Ubah Password</button>
                  </div>                
                </form>
            
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

  