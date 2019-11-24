
<div class="container utama">
	<?php foreach ($about as $abt) {
	 ?>
    <img src="<?php echo base_url('assets/img/').$abt->gambar?>" width="100%"> 
    <h3 style="font-weight: bold;">Sejarah</h3>
    <?php echo $abt->deskripsi ?>
    <?php } ?>
</div>
