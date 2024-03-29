<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['judul']." : ";?>KIBA Inventory Solution</title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="<?= BASEURL; ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?= BASEURL; ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?= BASEURL; ?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?= BASEURL; ?>/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">KIBA Inventory Solution</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['user']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					<?php 
					foreach($data['notif'] as $notif):	
						if($notif['jmlh']<=3){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $notif['namaBarang']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
						}
					endforeach;
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row">

				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="<?= BASEURL; ?>/img/<?php echo $_SESSION['foto']; ?>">
					</a>
				</div>
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="<?= BASEURL;?>/Home"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="<?= BASEURL;?>/Barang"><span class="glyphicon glyphicon-tags"></span>  Data Barang</a></li>
			<li><a href="<?= BASEURL;?>/Gudang"><span class="glyphicon glyphicon-gift"></span>  Gudang</a></li>
			<li><a href="<?= BASEURL;?>/Stok"><span class="glyphicon glyphicon-folder-open"></span>  Stok</a></li>        												
			<li><a href="<?= BASEURL;?>/GantiFoto"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="<?= BASEURL;?>/GantiPass"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="<?= BASEURL;?>/Login/logout"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">