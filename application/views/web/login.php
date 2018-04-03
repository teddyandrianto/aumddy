
<div class="container utama">
	<div class="row">
    <div class="col-md-5 col-sm-offset-2 box">
      <div class="text-center">
        <h3 style="font-weight: bold; color: #0c7069">Login</h3>
      </div>
      <hr>
      <div class="panel-body">
        <form method="post" action="<?php echo base_url('index.php/web/login')?>">
          <div class="box-body">            
            <div class="form-group">
              <input type="text" class="form-garis" id="username" name="username" placeholder="Enter Email Address">
            </div>              
            <div class="form-group">
              <input type="password" class="form-garis" id="password" name="password" placeholder="Enter Password">
            </div>         
            <div class="form-group">
              <div class="">
                <button type="submit" class="btn btn-success btn-block" >Sign In</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-3 box2">
      
      <h4>New Here?</h4>
      <br>
      <p>By creating an account in our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
       <a href="daftar.html" type="button" class="btn btn-default btn-sm center-block">create an account</a>
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
          email: "Please enter your email address",
          password: "Please enter your Password",
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
