<h3><span class="glyphicon glyphicon-tags"></span>  Data Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>

<br/>
<div>
    <?php Flasher::flash();?>
</div>
<?php 
foreach($data['cek'] as $cek):
	if($cek['jmlh']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['barang.namaBarang']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
endforeach;
?>
<?php 
$per_hal=10;

$jum=$data['rows']['rows'];
$halaman=ceil($jum / $per_hal); 

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
<form action="<?= BASEURL; ?>/Barang/index" method="POST">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" name='cari' class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">ID Barang</th>
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
			<td><?php echo $b['idBarang'] ?></td>
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
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL; ?>/Barang/tambah" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang .." list="nama">
                        <datalist id="nama">
                        <?php
                        foreach($data['barang'] as $b):
                            ?>
                            <option><?php echo "$b[idBarang] - $b[namaBarang]";?></option>
                            <?
                        endforeach;
                        ?>
                        </datalist>
                        
					</div>
					<div class="form-group">
						<label>Jenis Barang</label>
                        <select name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
						<option value="">Pilih Kategori</option>
						<?php
                        foreach($data['jenis'] as $b):
                            ?>
                            <option value=<?php echo "$b[idKategori]";?>><?php echo "$b[kategori]";?></option>
                            <?
                        endforeach;
                        ?>
						</select> 
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<input name="deskripsi" type="text" class="form-control" placeholder="Deskripsi ..">
					</div>
					
						<input name="modal" type="hidden" class="form-control" value="0" placeholder="Modal per unit">
					
						<input name="harga" type="hidden" class="form-control" value="0" placeholder="Harga Jual per unit">
						
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	
                    <div class="form-group">
						<label>Satuan</label>
						<input name="satuan" type="text" class="form-control" placeholder="satuan">
					</div>
					<div class="form-group">
						<label>Lokasi Penyimpanan</label>
						<select name="kodeArea" type="text" class="form-control" placeholder="Kode Area">
						<?php
                        foreach($data['kodeArea'] as $b):
                            ?>
                            <option value=<?php echo "$b[kodeArea]";?>><?php echo "$b[deskripsi]";?></option>
                            <?
                        endforeach;
                        ?>
						</select> 
					</div>
					<div class="form-group">
						<label>foto</label>
						<input name="foto" type="file" class="form-control" placeholder="Nama Barang .." >
					</div>																	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>  
</div>
