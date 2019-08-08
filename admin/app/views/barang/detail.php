
<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="<?= BASEURL; ?>/Barang/"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<div>
    <?php Flasher::flash();?>
</div>

<div class = "container marginbawah">
	<div class = "row">
		<div class = "col-md-4">
			<img src="<?= BASEURL; ?>/img/brg/<?= $data['barang']['foto'];?>" class="img-thumbnail" alt="Responsive image">
		</div>
		<div class = "col-md-8">
			
			<table class="table">
				<tr>
					<td>Nama</td>
					<td><?php echo $data['barang']['namaBarang'] ?></td>
				</tr>
				<tr>
					<td>Jenis</td>
					<td><?php echo $data['barang']['kategori'] ?></td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td><?php echo $data['barang']['deskripsiBarang'] ?></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td><?php echo $data['barang']['jumlah'] ?></td>
				</tr>
			</table>

		</div>
		
	</div>
</div>
<h4>Detail Stok</h4>
<table class="table">
	<tr>
		<th>Nota Masuk</th>
		<th>Tanggal Masuk</th>
		<th>Lokasi Stok</th>
		<th>Jumlah Stok</th>
		<th>Satuan</th>
		<th class="col-md-2">Opsi</th>
	</tr><?php
	foreach($data['stok'] as $d):
		?>
		<tr>
			<td><?php echo $d["notaMasuk"]?></td>
			<td><?php echo $d["tanggalMasuk"];?></td>
			<td><?php echo $d["deskripsi"];?></td>
			<td><?php echo $d["stok"];?></td>
			<td><?php echo $d["satuan"];?></td>
			<td>
			<a class="btn btn-warning tampilEdit" data-toggle="modal" data-target="#edit" data-id="<?=$d['notaMasuk'];?>">Edit</a>
            <a href="<?= BASEURL; ?>/Stok/Hapus/<?= $d['notaMasuk']; ?>/<?= $d['idBarang']; ?>" onclick="return confirm('Hapus?');" class="btn btn-danger">Hapus</a>
		</td>
		</tr>
		<?php
	endforeach;
	?>
</table>
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
