


<div  class="container utama">
	<div class="row">
	  <div class="col-md-9 box">
            <div class="media">
              <div class="media-left">
                <img src="<?php echo base_url('assets/img/').$foto?>"  class="media-object" style="width:300px ;height: 350px; margin-top: 20px;">
              </div>
              <div class="media-body">
                <h3 style=" font-weight: bold; font-size: 25px"><?php echo $nama_barang?></h3><hr>
                <p style="color: #0c7069; font-weight: bold; font-size: 25px">Rp <?php echo $harga?></p><br>
                <p>Stok Barang : <?php echo $stok?></p>
                <form method="POST" action="<?php echo base_url('index.php/web/keranjan_tambah') ?>">
                <div class="btn-group" >
                  <input type="hidden" name="id_barang" value="<?php echo $id_barang ?>">
                  <button type="button" class="btn "><span class="fa fa-plus"></span></button>
                  <input type="text" class="btn col-md-3" name="jumlah" value="1" readonly>
                  <button type="button" class="btn  form-input"><span class="fa fa-minus"></span></button>
                </div>
                  <hr>
                   <div class="media col-md-12">    
                    <button type="submit" class="btn btn-success btn-block btn-lg"><i class="fa fa-cart-arrow-down"></i> Beli Sekarang</button>
                  <br>
                  </div>   
                  </form>
                  <b>Deskripsi :</b>
                  <p><?php echo $deskripsi ?></p>
                
              </div>
            </div>
	</div>
  <div class="col-sm-3">
      <div class="list-group">
          <a class="list-group-item" style="background-color: #0c7069; color: #fff; font-weight: bold;border:none;border-radius: ">Kategori</a>
          <a href="#" class="list-group-item">Baju</a>
          <a href="#" class="list-group-item">Jaket</a>
          <a href="#" class="list-group-item">Celana</a>
          <a href="#" class="list-group-item">Sepatu</a>
      </div>
    </div>
  </div>
</div>
</div>
