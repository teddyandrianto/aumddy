
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets')?>/img/icon.png">

    <title>AUMDDY | Store</title>

    <link href="<?php echo base_url('assets');?>/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('assets')?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets');?>/css/dataTables.bootstrap.min.css"> 
    <script src="<?php echo base_url('assets')?>/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/');?>/js/jquery.validate.js"></script>
    <script type="text/javascript" src="https://www.jquery-az.com/boots/js/bootstrap-filestyle.min.js"></script>
    <script src="<?php echo base_url('assets/');?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/');?>js/dataTables.bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand " href="#"><img  height="60px" src="<?php echo base_url('assets')?>/img/umddy.png" ></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('index.php/web')?>">
              <span class="fa fa-home" ></span> Beranda</a>
            </li>
            <li><a href="<?php echo base_url('index.php/web/produk')?>">
              <span class="fa fa-shopping-bag"></span> Produk</a>
            </li>
            <li><a href="<?php echo base_url('index.php/web/about')?>">
              <span class="fa fa-question"></span> Tentang</a>
            </li>

            <?php if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1){ ?>
            <li><a href="<?php echo base_url('index.php/web/admin_manage_barang')?>">
              <span class="fa fa-database"></span> Manage Barang</a>
            </li>
            <li><a href="<?php echo base_url('index.php/web/admin_manage_transaksi')?>">
              <span class="fa fa-handshake-o"></span>  Manage Transaksi</a>
            </li>
            <li><a href="<?php echo base_url('index.php/web/admin_manage_user')?>">
              <span class="fa fa-users"></span> Manage User</a>
            </li>
            <li><a href="<?php echo base_url('index.php/web/admin_manage_aplikasi')?>">
              <span class="fa fa-cogs"></span> Manage Aplikasi</a>
            </li>
            <?php } ?>
          </ul>
         
          <ul class="nav navbar-nav navbar-right ">
           <?php if(isset($_SESSION['sesilogin'])){ ?> 
            <?php if($_SESSION['sesilogin']['role']==2){ ?>
            <li class="dropdown">
              <a  class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="fa fa-cart-arrow-down fa-lg">
                  <span class="badge beli" >
                    <?php 
                          if($_SESSION['sesilogin']['role']==2){
                            $query = $this->db->query("select count(id_barang) as total from tbl_keranjang where id_user='".$_SESSION['sesilogin']['id_user']."' AND status ='belum'");
                            $row =$query->row_array();
                            echo $row['total'];
                          }else{
                            echo "0"; } ?>     
                  </span>
                </span>
              </a>
              <ul class="dropdown-menu box-keranjang" > 
                <?php  
                $keranjang =$this->web_model->tampil_keranjang($_SESSION['sesilogin']['id_user']);
                foreach ($keranjang as $k) { ?>
                <li>
                  <a href="<?php echo base_url('index.php/web/detail_barang/').$k->id_barang?>">
                    <div class="media">
                      <div class="media-left">
                        <img src="<?php echo base_url('assets/barang/').$k->foto;?>"  class="media-object" style="width:50px ;height: 50px">
                      </div>
                      <div class="media-body">
                        <b class="media-heading"><?php echo $k->nama_barang?></b><br>
                        <small><?php echo $k->deskripsi?></small><br>
                        <small><?php echo $k->jum_brg?> barang</small>
                      </div>
                    </div>
                  </a>
                </li>
                <?php } ?>
                <div class="media col-md-12">    
                  <a href="<?php echo base_url('index.php/web/keranjang')?>" class="btn btn-success btn-block ">Lihat Keranjang</a>
                </div> 
              </ul>
            </li>
            <li>
              <a href="<?php echo base_url('index.php/web/transaksi') ?>">
                <span class="fa fa-exchange" title="transaksi"></span>
              </a>
            </li>
            <?php } ?>  
            <li class="dropdown">
              <a  class="dropdown-toggle" data-toggle="dropdown" href="#">
              <?php if($_SESSION['sesilogin']['foto']!="") { ?>
                <img src="<?php echo base_url('assets/photo-profile/').$_SESSION['sesilogin']['foto']?>" class="img img-circle" width="30px" height="30px" >
              <?php }else{ ?>
                <img src="<?php echo base_url('assets/img/not-profile.png')?>" class="img img-circle" width="30px" height="30px">
              <?php } ?>
              </a>
                <ul class="dropdown-menu" style="background-color: #fff ">
                  <li>
                    <a>Hai,<br><b> <?php echo $_SESSION['sesilogin']['nama']?></b></a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('index.php/web/profile') ?>">
                      <span class="fa fa-cog"></span> Pengaturan</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('index.php/web/logout')?>">
                      <span class="glyphicon glyphicon-log-out"></span> Keluar</a>
                  </li>
                </ul>
            </li>
            <?php }else{ ?>
            <li class="dropdown">
              <a  class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-log-in"></span> Masuk
              </a>
              <div class="dropdown-menu form-login">
                <form id="signupForm" method="post" action="<?php echo base_url('index.php/web/login') ?>">
                  <div class="form-group">
                    <label>Email</label>  
                    <div class="input-group col-xs-12"> 
                      <input  type="email" class="form-garis"  name="email" id="email"  placeholder="Masukan Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Password</label> 
                    <div class="input-group col-xs-12"> 
                      <input type="Password" class="form-garis" name="password" id="password"  placeholder="Masukan Password"/>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success btn-block" ><i class="glyphicon glyphicon-ok"></i> Login</button>
                </form><hr>
                <div style="text-align: center;">
                  <a href="<?php echo base_url('index.php/web/Daftar')?>">Daftar Akun</a>
                </div>
              </div>
            </li>
        <?php } ?>
          </ul>
        
        <?php 
        if(isset($_SESSION['sesilogin'])){
          if(isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==1) {  
          }elseif (isset($_SESSION['sesilogin']) AND $_SESSION['sesilogin']['role']==2) { ?>
          <form style="margin-top: 30px;" class="navbar-form navbar-right" action="<?php echo base_url('index.php/web/cari_produk') ?>" method="POST">
            <div class="input-group">
              <input type="text" class="form-control " placeholder="Search" name="cari_produk">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>
          <?php }}else{?>
          <form style="margin-top: 30px;" class="navbar-form navbar-right" action="<?php echo base_url('index.php/web/cari_produk') ?>" method="POST">
            <div class="input-group">
              <input type="text" class="form-control " placeholder="Search" name="cari_produk">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>
          <?php } ?>
        </div>
      </div>
    </nav>

    <script type="text/javascript">
        $( document ).ready( function () {
          $( "#signupForm" ).validate( {
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
   $('#nim').focus();
             setTimeout(function() {
            $('#mydiv').fadeOut('fast');
            }, 2000);

  </script>
  
    <div class="utama">
        <?php echo $this->session->tempdata('pesan');
         $this->session->unset_tempdata("pesan");?>
    </div>