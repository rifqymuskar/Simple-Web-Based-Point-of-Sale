<ul id="nav-mobile" class="right hide-on-med-and-down">
  <li><a href="#daftarpesanan" class="modal-trigger" id="klikdaftarpemesanan">Daftar Pesanan</a></li>
  <li><a href="<?=site_url('kasir/menu')?>">Menu</a></li>
  <!-- <li><a href="#tambahmenu" class="modal-trigger" id="kliktambahmenu">Menu</a></li> -->
  <li><a href="<?=site_url('auth/logout')?>">Logout</a></li>
</ul>

  <!-- Modal Structure -->
  <div id="listpemesanan" class="modal">
    <div class="modal-content">
      <h5>List Pesanan</h5>
      <table id="listcart">
      	<thead>
      		<tr>
      			<td>No.</td>
      			<td>Row id</td>
      			<td>Nama Menu</td>
      			<td>Jumlah</td>
      			<td>Harga</td>
      			<td>Sub Total</td>
      			<td>Action</td>
      		</tr>
      	</thead>
      	<tbody>
      		
      	</tbody>
      </table>
      	<div class="input-field col s6" style="margin-top: 5%;">
      		<input type="number" class="nomor_meja" placeholder="Masukkan Nomor Meja" id="nomor_meja" />
      		<label for="nomor_meja">Nomor Meja</label>
  		</div>
      <a class="btn" id="submit_pemesanan">Submit Pemesanan</a>
    </div>
  </div>

  <!-- Modal Structure -->
  <div id="daftarpesanan" class="modal">
    <div class="modal-content">
      <h5>Daftar Pesanan</h5>
      <table id="tabledaftarpesanan">
      	<thead>
      		<tr>
      			<td>No.</td>
      			<td>id</td>
      			<td>nomorpesanan</td>
      			<td>nomor meja</td>
      			<td>date</td>
      			<td>status</td>
      			<td>action</td>
      		</tr>
      	</thead>
      	<tbody>
      		
      	</tbody>
      </table>
    </div>
  </div>  

  <!-- Modal Structure -->
  <div id="detailsdaftarpesanan" class="modal">
    <div class="modal-content">
      <h5>Details Pesanan</h5>
      <table id="detailstabledaftarpesanan">
      	<thead>
      		<tr>
      			<td>No.</td>
      			<td>id</td>
      			<td>nama produk</td>
      			<td>jumlah</td>
      			<td><a class="btn" id="tambah_spesifik_orders">Tambah</a></td>
      		</tr>
      	</thead>
      	<tbody>
      		
      	</tbody>
      </table>
    </div>
  </div>  

  <!-- Modal Structure -->
  <div id="tambahdetailsdaftarpesanan" class="modal">
    <div class="modal-content">
      <h5>Tambah Details Pesanan</h5>
          <form id="formtambahdetailsdaftarpesanan" class="col s12" style="margin-top: 5%;">
		      <div class="row">
		      	<div class="input-field col s12">
		          <input readonly placeholder="Nama Produk" id="id_invoicess" name="id_invoice" type="number" class="validate">
		          <label for="id_invoicess">Id Invoice</label>
		        </div>
		          <div class="input-field col s12">
				    <select name="nama_produk" id="produk">
				      <option value="" disabled selected>Pilih Produk</option>
				      <?php foreach ($data_produk as $key => $value): ?>
				      	<option value="<?=$value->nama?>"><?=$value->nama?></option>
				      <?php endforeach ?>
				    </select>
				  </div>
		        <div class="input-field col s12">
		          <input placeholder="Jumlah" id="jumlah" name="jumlah" type="text" class="validate">
		          <label for="Jumlah">Jumlah</label>
		        </div>
		      </div>
		      <button type="submit">Submit</button>
		    </form>
    </div>
  </div>   

  <!-- Modal Structure -->
  <div id="modalpembayaran" class="modal">
    <div class="modal-content">
      <h5>List Pesanan</h5>
      <table id="listpmebayarannya">
      	<thead>
      		<tr>
      			<td>No.</td>
      			<td>nama produk</td>
      			<td>jumlah</td>
      			<td>harga</td>
      			<td>Sub Total</td>
      		</tr>
      	</thead>
      	<tbody>
      		
      	</tbody>
      </table>
      	<div class="input-field col s6" style="margin-top: 5%;">
      		<input type="number" class="jumlahpembayaran" placeholder="Masukkan Uang Pembayaran" id="jumlahpembayaran" />
      		<label for="nomor_meja">Jumlah Pembayaran</label>
  		</div>
      <a class="btn" id="submit_pembayaran">Pembayaran</a>
    </div>
  </div>

  <div id="tambahmenu" class="modal">
	<div class="modal-content"> 
		<h5>Tambah Menu</h5>

		<form class="col s12" id="tambahmenuform">
	      <div class="row">
	        <div class="input-field col s12">
	          <input placeholder="Nama Produk" id="namaproduk" name="nama" type="text" class="validate">
	          <label for="namaproduk">Nama Produk</label>
	        </div>
	        <div class="input-field col s12">
			    <select name="jenis">
			      <option value="" disabled selected>Jenis Produk</option>
			      <option value="1">Makanan</option>
			      <option value="2">Minuman</option>
			    </select>
			  </div>
	        <div class="input-field col s12">
	          <input placeholder="Harga" id="harga" type="number" class="validate" name="harga">
	          <label for="harga">Harga</label>
	        </div>
	        <div class="input-field col s12">
	          <input placeholder="Jumlah" id="jumlah" type="number" class="validate" name="jumlah">
	          <label for="jumlah">Jumlah</label>
	        </div>
	      </div>
	      <button type="submit" class="btn">Submit</button>
	    </form>

	</div>
  </div>

  <div id="editmenu" class="modal">
	<div class="modal-content"> 
		<h5>Edit Menu</h5>

		<form class="col s12" id="editmenuform">
	      <div class="row">
	      	<div class="input-field col s12">
	          <input id="idedit" name="id" type="text" class="validate" readonly>
	        </div>
	        <div class="input-field col s12">
	          <input placeholder="Nama Produk" id="namaedit" name="nama" type="text" class="validate">
	        </div>
	        <div class="input-field col s12">
			    <select name="jenis" id="jenisedit">
			      <option value="" disabled selected>Jenis Produk</option>
			      <option value="1">Makanan</option>
			      <option value="2">Minuman</option>
			    </select>
			  </div>
	        <div class="input-field col s12">
	          <input placeholder="Harga" id="hargaedit" type="number" class="validate" name="harga">
	        </div>
	        <div class="input-field col s12">
	          <input placeholder="Jumlah" id="jumlahedit" type="number" class="validate" name="jumlah">
	        </div>
	      </div>
	      <button type="submit" class="btn">Submit</button>
	    </form>

	</div>
  </div>  