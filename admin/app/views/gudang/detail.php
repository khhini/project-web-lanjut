<h3><span class="glyphicon glyphicon-gift"></span>  Gudang -> Section A</h3>
<a class="btn" href="<?= BASEURL; ?>/Gudang/"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<br/>
<br/>

<?php 
$per_hal=10;

$jum=$data['rows']['rows'];
$halaman=ceil($jum / $per_hal); 
$url = rtrim($_GET['url'],'/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/',$url);
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	
</div>
<form action="<?= BASEURL; ?>/Gudang/detail/<?= $url[2]?>" method="POST">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" name='cari' class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">Foto</th>
		<th class="col-md-3">Nama Barang</th>
		<th class="col-md-4">Deskripsi</th>
		<th class="col-md-1">Jumlah</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_POST['cari'])){

		$brg=$data['cari'];
	}else{
		$brg=$data['barang'];
	}
	$no=1;
	foreach($brg as $b):

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><img src="<?= BASEURL; ?>/img/brg/<?= $b['foto'];?>" class="img-thumbnail"></td>
			<td><?php echo $b['namaBarang'] ?></td>
			<td><?php echo $b['deskripsiBarang'] ?></td>
			<td><?php echo $b['jumlah'] ?></td>
			<td>
				<a href="<?= BASEURL; ?>/Barang/detail/<?= $b['idBarang']; ?>" class="btn btn-info">Detail</a>
				<a href="<?= BASEURL; ?>/Barang/edit/<?= $b['idBarang']; ?>" class="btn btn-warning">Edit</a>
			</td>
		</tr>		
		<?php 
	endforeach;
	?>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="<?php echo BASEURL."/Barang/index/$x" ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>