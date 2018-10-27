# Simple Web POS

# Installation
	1. Create Database from MySQL with name testcodewd
	2. Import database from main folder /assets/sql/testcodewd.sql
	3. access the local website from browser localhost/testcodewd
	
# Users login                       
	1. kasir
		- username : kasir
		- password : 12345678
		
	2. pelayan
		- username : pelayan
		- password : 12345678
		
# jobdesk
	1. kasir 
		- melihat semua daftar pesanan yang masih aktif.
		- bisa menambah/mengurangi/mengubah pesanan yang masih aktif.
		- memproses pembayaran dan menutup pesanan yang masih aktif.
	2. pelayan
		- membuat pesanan baru yang berisi data nomor meja pelanggan,makanan dan minuman yang tersedia dari daftar menu.
		- memasukan item di daftar menu yang statusnya "Ready" ( jumlah makanan atau minuman lebih dari 1 )
		- nomer pesanan akan otomatis terbuat dengan format: ERPtlgblntahun-nomer (Contoh: ERP10102017-001)
		- melihat semua daftar pesanan yang masih aktif.
		- bisa menambah/mengurangi/mengubah pesanan yang masih aktif.
		- bisa melihat/mencetak aktifitas pesanan miliknya saja sebagai laporan ke manager.
		
# API
	1. API Login : localhost/api/get_API_login
	2. API akses menu makanan : localhost/api/get_API_menu
		
# Build with
	1. Frontend : Materializecss, jQuery
	2. Backend : Codeigniter
	3. Pengolahan data : AJAX dan JSON
	4. Database : MySQL
