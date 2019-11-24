</body>
<footer class="footer1">
  <div class="container">
    <div class="row">
      <div class="col-md-4"><br>
        <img src="<?php echo base_url('assets') ?>/img/umddy1.png" class="img-responsive" width="150px" style="margin-bottom:10px;">
        <p  align="justify" ><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b></p>
      </div>
      <div class="col-md-4">
        <div class="footer-title">
          <h3>Kontak</h3>
        </div>
        <div>
          <span class="fa fa-map-marker fa-lg">&nbsp;</span> Jl.BuahBatuno 99, Bandung 
        </div><br>
        <div>
          <span class="fa fa-phone">&nbsp;</span>
            +1 232 12143
        </div><br>
        <div>
          <span class="fa fa-envelope">&nbsp;</span>
          aumddy@gmail.com        
        </div>
      </div>
      <div class="col-md-4">
        <div class="footer-title">
          <h3>Kategori</h3>
        </div>
        <div class="footer-links">
          <?php foreach($kategori as $kat){ ?>
          <a href="<?php echo base_url('index.php/web/produk/').$kat->nama_kategori?>">
          <?php echo $kat->nama_kategori ?>
          </a>
          <?php }?>
        </div>
      </div>
    </div> 
  </div> 
</footer>
<footer style="color: #fff;">
  <div class="text-center panel-footer">
   © 2018 Copyright : Aumddy
  </div>
</footer>
</html>
