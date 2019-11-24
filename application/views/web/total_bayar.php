	<div class="col-sm-4">
		<div class="list-group">
  	 <a class="list-group-item">
        <b>Total Bayar</b>
      </a>
  		<?php  $id_user=$_SESSION['sesilogin']['id_user']; ?>
  		<div class="list-group-item" style="font-weight: bold;">Total Belanja
        <span class="pull-right" style="color: #0c7069; font-weight: bold; font-size: 16px">Rp <?php echo $row->total ?>
        </span>
      </div>
  		<div class="list-group-item" style="background-color: #f1f1f1">Pilih Bank Transfer</div>
			<form action="<?php echo base_url('index.php/web/tambah_transaksi') ?>" method="POST">  
		    <?php foreach ($bank as $bk) { ?>				
				<div class="list-group-item">
          <img src="<?php echo base_url('assets/img/bank/').$bk->logo?>" height="20px" >
          <span class="pull-right">
            <input type="radio" name="id_bank" value="<?php echo $bk->id_bank ?>">
          </span>
        </div>
				<?php } ?>
				<input type="hidden" name="total" value="<?php echo $row->total ?>">
				<div class="list-group-item">
          <button type="submit" class="btn btn-success btn-block">Bayar</button>
        </div>
			</form>
		</div>
	</div>
</div>
</div>