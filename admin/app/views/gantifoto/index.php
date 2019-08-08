<h3><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</h3>
<br/><br/>
<div>
    <?php Flasher::flash();?>
</div>
<br/>

<div class="col-md-5 col-md-offset-3">
	<form action="<?= BASEURL; ?>/GantiFoto/updateFoto" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<input name="user" type="hidden" value="<?php echo $_SESSION['user']; ?>">
		</div>
		<div class="form-group">
			<label>Foto</label>
			<input name="foto" type="file" class="form-control" placeholder="">
		</div>		
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Ganti">
			<input type="reset" class="btn btn-danger" value="reset">
		</div>																	
	</form>
</div>