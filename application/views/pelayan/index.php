<div class="row">
	<h1>Makanan</h1>
	<?php foreach ($produk as $key => $value): ?>
		<?php if ($value->jenis == 'makanan'): ?>	
			<div class="col l3">
				<div class="box center-align">
					<h5><?=$value->nama?></h5>
					<p>Jumlah <?=$value->jumlah?></p>
					<?php if ($value->jumlah <= 0){ ?>
						<a class="btn pesan disabled">Pesan</a>
					<?php }else{ ?>
						<a class="btn pesan" data-produk ='<?=JSON_encode($value); ?>'>Pesan</a>
					<?php } ?>
					
				</div>
			</div>
		<?php endif ?>
	<?php endforeach ?>
</div>

<div class="row">
	<h1>Minuman</h1>
	<?php foreach ($produk as $key => $value): ?>
		<?php if ($value->jenis == 'minuman'): ?>
			<div class="col l3">
				<div class="box center-align">
					<h5><?=$value->nama?></h5>
					<p>Jumlah <?=$value->jumlah?></p>
					<a class="btn pesan" data-produk ='<?=JSON_encode($value); ?>'>Pesan</a>
				</div>
			</div>
		<?php endif ?>
	<?php endforeach ?>
</div>
