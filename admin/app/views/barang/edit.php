<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="<?= BASEURL; ?>/Barang/"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$d = $data['barang'];
?>					
	<form action="<?= BASEURL; ?>/Barang/aksiEdit" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['idBarang'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['namaBarang'] ?>"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td><select name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
                    <option value=<?php echo "$d[idKategori]";?> selected><?php echo "$d[idKategori]";?></option>
						<?php
                        foreach($data['jenis'] as $b):
                            ?>
                            <option value=<?php echo "$b[idKategori]";?>><?php echo "$b[idKategori] $b[kategori]";?></option>
                            <?
                        endforeach;
                        ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td><input type="text" class="form-control" name="deskripsi" value="<?php echo $d['deskripsiBarang'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
?>