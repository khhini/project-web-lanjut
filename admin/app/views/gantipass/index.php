

<h3><span class="glyphicon glyphicon-briefcase"></span>  Password</h3>
<br/><br/>

<div>
    <?php Flasher::flash();?>
</div>
<br/>
<div class="col-md-5 col-md-offset-3">
	<form action="<?= BASEURL;?>/GantiPass/update" method="post">
		<div class="form-group">
			<input name="user" type="hidden" value="<?php echo $_SESSION['user']; ?>">
		</div>
		<div class="form-group">
			<label>Password Lama</label>
			<input name="lama" type="password" class="form-control" placeholder="Password Lama ..">
		</div>
		<div class="form-group">
			<label>Password Baru</label>
			<input name="baru" type="password" class="form-control" placeholder="Password Baru ..">
		</div>
		<div class="form-group">
			<label>Ulangi Password</label>
			<input name="ulang" type="password" class="form-control" placeholder="Ulangi Password ..">
		</div>	
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Simpan">
			<input type="reset" class="btn btn-danger" value="reset">
		</div>																	
	</form>
</div>