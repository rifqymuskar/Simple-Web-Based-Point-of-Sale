<ul id="nav-mobile" class="right hide-on-med-and-down">
  <li><a href="#listpemesanan" class="modal-trigger" id="kliklistpemesanan">List Pesanan <span id="totalpesanan"><?=count($this->cart->contents())?></span> items</a></li>
  <li><a href="#daftarpesanan" class="modal-trigger" id="klikdaftarpemesanan">Daftar Pesanan</a></li>
  <li><a href="#aktivitaspesananku" class="modal-trigger" id="klikaktivitasku">Aktivitas Pesananku</a></li>
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
		          <input style="border-bottom: 1px solid #9e9e9e;" placeholder="Jumlah" id="jumlah" name="jumlah" type="text" class="validate">
		          <label for="Jumlah">Jumlah</label>
		        </div>
		      </div>
		      <button class="btn" type="submit">Submit</button>
		    </form>
    </div>
  </div>    
         
  <div id="aktivitaspesananku" class="modal">
      <div class="modal-content">
        <h5>aktifitas pesanan milikku</h5>  
        <table id="aktivitaspesanankutable">
          <thead>
            <tr>
              <td>no</td>
              <td>id</td>
              <td>nomor pesanan</td>
              <td>nomor meja</td>
              <td>total harga</td>
              <td>date</td>
              <td>status</td>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>

        <a class="btn" id="cetaklaporan">cetak sebagai laporan ke manager</a>
      </div>
  </div>       