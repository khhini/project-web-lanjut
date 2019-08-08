<h3><span class="glyphicon glyphicon-folder-open mb-1"></span>  Stok</h3>
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
<form action="<?= BASEURL; ?>/Stok/index" method="POST">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" name='cari' class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br>
<table class="table table-hover">
	<tr>
		<th class="col-md-2">Nota Masuk</th>
		<th class="col-md-1">Foto</th>
		<th class="col-md-3">Nama Barang</th>
		<th class="col-md-1">Lokasi</th>
		<th class="col-md-1">Stok</th>
		<th class="col-md-2">Tanggal Masuk</th>
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
			<td><?php echo $b['notaMasuk'] ?></td>
			<td><img src="<?= BASEURL; ?>/img/brg/<?= $b['foto'];?>" class="img-thumbnail"></td>
			<td><?php echo $b['namaBarang'] ?></td>
			<td><?php echo $b['deskripsi'] ?></td>
            <td><?php echo $b['stok'] ?></td>
            <td><?php echo $b['tanggalMasuk'] ?></td>
			<td>
				<a class="btn btn-warning tampilEdit" data-toggle="modal" data-target="#edit" data-id="<?=$b['notaMasuk'];?>">Edit</a>
				
                <a href="<?= BASEURL; ?>/Stok/Hapus/<?= $b['notaMasuk']; ?>/<?= $b['idBarang']; ?>" onclick="return confirm('Hapus?');" class="btn btn-danger">Hapus</a>
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
				<li><a href="<?php echo BASEURL."/Stok/index/$x" ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
</ul>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/Stok/update" method="post">
			<input type="hidden" name="notaMasuk" id="notaMasuk">
			<input type="hidden" name="idBarang" id="idBarang">
			<div class="form-group">
				<label>Lokasi Penyimpanan</label>
				<select name="kodeArea" type="text" class="form-control" placeholder="Kode Area">
				<option id="kodeSelected" value=""></option>
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
				<label>Jumlah</label>
				<input id="jumlah" name="jumlah" type="text" class="form-control" placeholder="Jumlah">
			</div>																	
            <div class="form-group">
				<label>Satuan</label>
				<input id="satuan" name="satuan" type="text" class="form-control" placeholder="satuan">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<input type="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
      </div>
      
    </div>
  </div>
</div>