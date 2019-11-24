
<script type="text/javascript">
  var angka=1; 
  function tambah(){ 
    angka = angka+1; 
    if(angka > <?php echo $stok?>){
      angka=<?php echo $stok?>;
    }else{
    document.form.hasil.value = angka; 
    }
} 
 function kurang(){ 
    angka = angka-1; 
    if(angka < 1){
      angka=1;
    }else{
    document.form.hasil.value = angka; 
    }
}   
</script>
<style type="text/css">
  input[type="number"] {
  -webkit-appearance: textfield;
     -moz-appearance: textfield;
          appearance: textfield;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none;
}
</style>

<div  class="container utama">
	<div class="row">
	  <div class="col-md-9 box">
      <div class="media">
        <div class="media-left">
          <img src="<?php echo base_url('assets/barang/').$foto?>"  class="media-object" style="width:300px ; margin-top: 20px;">
        </div>
        <div class="media-body">
          <h3 style=" font-weight: bold; font-size: 25px"><?php echo $nama_barang?></h3><hr>
          <p style="color: #0c7069; font-weight: bold; font-size: 25px">Rp <?php echo $harga?></p><br>
          <p>Stok Barang : <?php echo $stok?></p>
          <form name="form" method="POST" action="<?php echo base_url('index.php/web/keranjang_tambah') ?>">
            <div class="btn-group" >
              <input type="hidden" name="id_barang" value="<?php echo $id_barang ?>">
              <button type="button" onclick='kurang()' class="btn ">
                <span class="fa fa-minus"></span>
              </button>
              <input type="number"  class="btn col-md-3"  id="hasil" name="jumlah" value="1" readonly>
              <button type="button"  onclick='tambah()' class="btn form-input">
                <span class="fa fa-plus"></span>
              </button>
            </div>
            <hr>
            <div class="media col-md-12">    
              <button type="submit" class="btn btn-success btn-block btn-lg">
                <i class="fa fa-cart-arrow-down"></i> Beli Sekarang
              </button><br>
            </div>   
          </form>
          <b>Deskripsi :</b>
          <p><?php echo $deskripsi ?></p>
        </div>
      </div>
	  </div>
 
