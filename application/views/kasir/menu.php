<h3>Daftar Menu</h3>
<table id="tablemenu">
	<thead>
		<tr>
			<?php foreach ($listfield as $key => $value): ?>
				<td><?=$value?></td>
			<?php endforeach ?>
			<td><a href="#tambahmenu" class="btn modal-trigger" id="kliktambahmenu">Tambah</a></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datanya as $key => $value): ?>
			<tr>
				<?php foreach ($listfield as $key => $value1): ?>
				<td><?=$value->$value1?></td>
				<?php endforeach ?>
				<td>
					<a href="#editmenu" class="btn modal-trigger klikeditmenu" id="menu<?=$value->id?>" data-id="<?=$value->id?>">Edit</a> 
					<a class="btn klikhapusmenu" id="menu<?=$value->id?>" data-id="<?=$value->id?>">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>