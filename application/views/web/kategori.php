	<div class="col-sm-3">
		<div class="list-group">
			<a class="list-group-item" style="background-color: #0c7069; color: #fff;"><b>Kategori</b></a>
			<?php foreach ($kategori as $kat) { ?>
			<a href="<?php echo base_url('index.php/web/produk/').$kat->nama_kategori?>" class="list-group-item"><?php echo $kat->nama_kategori?></a>
			<?php } ?>
		</div>
	</div>
</div>
</div>