  $(document).ready(function(){
    $('.modal').modal();
    $('select').formSelect();

    var url = $('body').data('url');

    $(".pesan").on('click', function(){
    	const data = $(this).data('produk');
		swal({
		  title: 'Jumlah',
		  allowOutsideClick: false,
		  html : 
		  	'<input type="number" max="'+data.jumlah+'" class="jumlah_pesanan"/>'
		}).then((result) => {

		  	data.jumlah = $('.jumlah_pesanan').val();
	    	$.ajax({
	    		url : url + "pelayan/addtocart",
	    		method : "POST",
	    		data : { data : data },
	   //  		contentType: false,
				// cache : false,
				// processData: false,
				complete:function(data){
					if(data.responseText != "gagal"){
						$("#totalpesanan").text(data.responseText);
						M.toast({html: 'berhasil dimasukkan di list pesanan'});
					}else{
						alert('terjadi kesalahan');
					}
				},
				error:function(){

				}
	    	})

		})
    });

    $("#kliklistpemesanan").on('click', function(){
    	var html = "";
    	var no = 1;
    	$.ajax({
    		url : url + "pelayan/listcart",
    		method : "GET",
    		complete:function(data){
    			const json = JSON.parse(data.responseText);

    			Object.keys(json.konten).forEach(function(key) {
    				html += '<tr>' +
		      			'<td>'+ no++ +'</td>'+
		      			'<td>'+json.konten[key].rowid+'</td>'+
		      			'<td>'+json.konten[key].name+'</td>'+
		      			'<td>'+json.konten[key].qty+'</td>'+
		      			'<td>'+json.konten[key].price+'</td>'+
		      			'<td>'+json.konten[key].subtotal+'</td>'+
		      			'<td><a id="'+ json.konten[key].rowid +'" class="delete_specifik_row_cart btn" style="color:#fff;">X</a></td>'+
		      		'</tr>';
				});

    			var total = '<tr>' +
						        '<td colspan="4"> </td>' +
						        '<td>Total</td>' +
						        '<td>'+json.total+'</td>' +
							'</tr>';

    			// json.forEach(function(entry){
    			// 	html += '<tr>' +
		     //  			'<td>'+no+'</td>'+
		     //  			'<td></td>'+
		     //  			'<td></td>'+
		     //  		'</tr>';
    			// });
		      	$("#listcart tbody").empty().html(html + total);

			    $(".delete_specifik_row_cart ").on('click', function(){
			    	var id = $(this).attr('id');
			    	$.ajax({
			    		url : url + "pelayan/delete_specifik_row_cart",
			    		method : "POST",
			    		data : {rowid :  id},
			    		complete:function(data){
			    			if(data.responseText == 'success'){
			    				$("#"+id).parent().closest("tr").remove();

			    			}else{
			    				console.log('gagal');
			    			}
			    		},
			    		error:function(){

			    		}
			    	});
			    });		      	

    		},
    		error:function(){

    		}
    	});

    });

    $("#submit_pemesanan").on('click', function(){
		swal({
		  title: 'anda yakin?',
		  text: "apakah anda yakin ini submit pemesanan",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'iyaa',
		  allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
			var nomor_meja = $('.nomor_meja').val();

		  	$.ajax({
		  		url : url + "pelayan/submit_pemesanan",
		  		data : { nomor_meja : nomor_meja },
		  		method : "POST",
		  		complete:function(data){
		  			swal({
					  title: 'Sukses',
					  allowOutsideClick: false,
					  text: "berhasil membuat pesanan",
					  type: 'success',
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Oke'
					}).then((result) => {
						if (result.value) {
							location.reload();
						}
					});	
		  			console.log(data.responseText);
		  		},
		  		error:function(){

		  		}
		  	})
		   } 
		})    	
    });

    $("#klikdaftarpemesanan").on('click', function(){
    	var html ="";
    	var no = 1;
    	$.ajax({
    		url : url + "home/daftarpesanan",
    		method : "GET",
    		complete:function(data){
    			var json = JSON.parse(data.responseText);
    			if($("body").data('groups') == 2){
					Object.keys(json).forEach(function(key) {
	    				html += '<tr>' +
			      			'<td>'+ no++ +'</td>'+
			      			'<td>'+json[key].id+'</td>'+
			      			'<td>'+json[key].nomor_pesanan+'</td>'+
			      			'<td>'+json[key].nomor_meja+'</td>'+
			      			'<td>'+json[key].date+'</td>'+
			      			'<td>'+json[key].status+'</td>'+
			      			'<td><a class="details_daftar_pesanan btn" id="'+json[key].id+'" style="color:#fff;">details</a> <a class="pembayaran btn" data-id="'+json[key].id+'" style="color:#fff;">Pembayaran</a> <a class="batalkan btn" data-id="'+json[key].id+'" style="color:#fff;">Batalkan</a></td>'+
			      		'</tr>';
					});
    			}
    			else if($("body").data('groups') == 3){
    				Object.keys(json).forEach(function(key) {
	    				html += '<tr>' +
			      			'<td>'+ no++ +'</td>'+
			      			'<td>'+json[key].id+'</td>'+
			      			'<td>'+json[key].nomor_pesanan+'</td>'+
			      			'<td>'+json[key].nomor_meja+'</td>'+
			      			'<td>'+json[key].date+'</td>'+
			      			'<td>'+json[key].status+'</td>'+
			      			'<td><a class="details_daftar_pesanan btn" id="'+json[key].id+'" style="color:#fff;">details</a></td>'+
			      		'</tr>';
					});
    			}
    			
				$("#tabledaftarpesanan tbody").empty().html(html);

				$(".details_daftar_pesanan").on('click',function(){
					var html ="";
    				var no = 1;
					$.ajax({
						url : url + "home/details_pesanan",
						data : {id : $(this).attr('id')},
						method : "GET",
						complete:function(data){
							console.log(data.responseText);
							var json = JSON.parse(data.responseText);

							Object.keys(json).forEach(function(key) {
			    				html += '<tr>' +
					      			'<td>'+ no++ +'</td>'+
					      			'<td>'+json[key].id+'</td>'+
					      			'<td>'+json[key].nama_produk+'</td>'+
					      			'<td><input type="number" class="changejumlahpemesanan" data-id="'+json[key].id+'" value="'+json[key].jumlah+'"></td>'+
					      			'<td><a class="btn delete_spesifik_orders" id="details'+json[key].id+'" data-id="'+json[key].id+'">Hapus</a></td>'+
					      		'</tr>';
							});
							$("#detailstabledaftarpesanan tbody").empty().html(html);

							$("#detailsdaftarpesanan").modal('open');

							$(".changejumlahpemesanan").on('change', function(){
								var id = $(this).data('id');
								$.ajax({
									url : url + "home/update_orders",
									method : "POST",
									data : {id : id, jumlah : $(this).val() },
									complete:function(data){
										if(data.responseText == "sukses"){
											M.toast({html: 'berhasil di update'});
										}
									},
									error:function(){

									}
								});
							});

							$(".delete_spesifik_orders").on('click', function(){
								var id = $(this).data('id');
								$.ajax({
									url : url + "home/delete_orders",
									method : "POST",
									data : {id : id},
									complete:function(data){
										if(data.responseText == "sukses"){
											$("#details"+id).parent().closest("tr").remove();
											M.toast({html: 'berhasil menghapus'});
										}
									},
									error:function()
									{

									}
								})
							});

							$("#tambah_spesifik_orders").on('click', function(){
								var convert = JSON.parse(data.responseText);
								$("#id_invoicess").val(convert[0].id_invoice);
								$("#tambahdetailsdaftarpesanan").modal("open");

								$("#formtambahdetailsdaftarpesanan").on('submit', function(e){
									e.preventDefault();

										$.ajax({
												url : url + "home/tambah_spesifik_orders",
												method : "POST",
												data : new FormData(this),
												contentType: false,
												cache : false,
												processData: false,	
												complete:function(data)
												{
													
													swal({
													  title: 'berhasil',
													  text: "berhasil menambahkan data",
													  type: 'success',
													  confirmButtonColor: '#3085d6',
													  allowOutsideClick: false,
													  confirmButtonText: 'oke!'
													}).then((result) => {
													  if (result.value) {
													  	location.reload();
													  }
													})
												},
												error:function(){

												}
										})
								});
							});

						},
						error:function(){

						}
					})
				});

				$(".pembayaran").on('click', function(){
					var id_invoice = $(this).data('id');
					var no = 1;
					var html = "";
					
					$.ajax({
						url : url + "kasir/get_dataid_invoices",
						method : "GET",
						data : {id_invoice : id_invoice},
						complete:function(data){
							var json = JSON.parse(data.responseText);
							Object.keys(json.orders).forEach(function(key) {
			    				html += '<tr>' +
					      			'<td>'+ no++ +'</td>'+
					      			'<td>'+json.orders[key].nama_produk+'</td>'+
					      			'<td>'+json.orders[key].jumlah+'</td>'+
					      			'<td>'+json.produk[key].harga+'</td>'+
					      			'<td>'+(json.produk[key].harga*json.orders[key].jumlah)+'</td>'+
					      		'</tr>';
							});
							
    						var total = '<tr>' +
						        '<td colspan="3"> </td>' +
						        '<td>Total</td>' +
						        '<td id="totalpembayaran">'+json.invoices.total+'</td>' +
							'</tr>';

							$("#listpmebayarannya tbody").empty().html(html + total);
						},
						error:function(){

						}
					})
					$("#modalpembayaran").modal('open');

					$("#submit_pembayaran").on('click', function(){
						
						var total = parseInt($("#totalpembayaran").text());
						var pembayaran = $("#jumlahpembayaran").val();
						if(pembayaran >= total){
							$.ajax({
								url : url + "kasir/pembayaran",
								method : "POST",
								data : {id_invoice : id_invoice},
								complete:function(data){
									if(data.responseText == 'success'){
							  			swal({
										  title: 'berhasil',
										  text: "pembayaran anda telah selesai",
										  type: 'success',
										  confirmButtonColor: '#3085d6',
										  allowOutsideClick: false,
										  confirmButtonText: 'oke!'
										}).then((result) => {
										  if (result.value) {
										  	location.reload();
										  }
										})
										
									}
								},
								error:function(){
									
								}
							})
						}else{
							M.toast({html: 'error, uang tidak cukup'});
						}
					});
				})

				$(".batalkan").on('click', function(){
					var id_invoice = $(this).data('id');
		  			swal({
					  title: 'Are you sure?',
					  text: "apakah yakin ini membatalkan pesanan ini",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  allowOutsideClick: false,
					  confirmButtonText: 'Yes, lakukan!'
					}).then((result) => {
					  if (result.value) {
					  	
					    $.ajax({
					    	url : url + "kasir/batalkanpesanan",
					    	method : "POST",
					    	data : {id : id_invoice},
					    	complete:function(data){
					    		if(data.responseText == 'success'){
					    			M.toast({html: 'berhasil'});
									location.reload();
								}
					    	},
					    	error:function(){

					    	}
					    })
					  }
					})
		  		})

		  		// mulai disnii

    		},
    		error:function(){

    		}
    	})

    });

  	$("#klikaktivitasku").on('click', function(){
  		var html = "";
  		var no = 1;
  		$.ajax({
  			url : url + "pelayan/aktivitasku",
  			method : "GET",
  			complete:function(data){
  				var json = JSON.parse(data.responseText);

				Object.keys(json).forEach(function(key) {
    				html += '<tr>' +
		      			'<td>'+ no++ +'</td>'+
		      			'<td>'+json[key].id+'</td>'+
		      			'<td>'+json[key].nomor_pesanan+'</td>'+
		      			'<td>'+json[key].nomor_meja+'</td>'+
		      			'<td>'+json[key].total+'</td>'+
		      			'<td>'+json[key].date+'</td>'+
		      			'<td>'+json[key].status+'</td>'+
		      		'</tr>';
				});  
				$("#aktivitaspesanankutable tbody").empty().html(html);
  			},
  			error:function(){

  			}
  		})
  	});

  	$("#cetaklaporan").on('click', function(){
  		   var divToPrint=document.getElementById("aktivitaspesanankutable");
		   newWin= window.open("");
		   newWin.document.write(divToPrint.outerHTML);
		   newWin.print();
		   newWin.close();
  	});

  	$("#tambahmenuform").on('submit', function(e){
  		e.preventDefault();
  		$.ajax({
  			url : url + "kasir/tambahmenu",
  			method : "POST",
  			data : new FormData(this),
  			contentType: false,
			cache : false,
			processData: false,
			complete:function(data){
				if(data.responseText == "success"){
					M.toast({html: 'berhasil memasukkan data'});
					location.reload();
				}
			},
			error:function(){

			}
  		})
  	});



  	$(".klikhapusmenu").on('click', function(){
  		var id = $(this).data('id');
  		$.ajax({
  			url : url + "kasir/hapusmenu",
  			method: "POST",
  			data : {id : id},
  			complete:function(data){
  				if(data.responseText == "success"){
  					$("#menu"+id).parent().closest("tr").remove();
					M.toast({html: 'berhasil menghapus data'});
				}
  			},
  			error:function(){

  			}
  		})
  	});

  	$(".klikeditmenu").on('click', function(){
		var id = $(this).data('id');
  		$.ajax({
  			url : url + "kasir/get_data_produk",
  			method: "GET",
  			data : {id : id},
  			complete:function(data){
  				var json = JSON.parse(data.responseText);
  				Object.keys(json).forEach(function(key) {
  					console.log(key);
  					console.log(json[key]);
  					$("#"+key+"edit").val(json[key]);
  				});
  			},
  			error:function(){

  			}
  		})
  	});

  	$("#editmenuform").on('submit', function(e){
  		e.preventDefault();
  		$.ajax({
  			url : url + "kasir/submitedit",
  			method : "POST",
  			data : new FormData(this),
  			contentType: false,
			cache : false,
			processData: false,
			complete:function(data){
				if(data.responseText == "success"){
					swal({
						  title: 'berhasil',
						  text: "berhasil update data",
						  type: 'success',
						  confirmButtonColor: '#3085d6',
						  allowOutsideClick: false,
						  confirmButtonText: 'oke!'
						}).then((result) => {
						  if (result.value) {
						  	location.reload();
						  }
						})					
				}
			},
			error:function(){

			}
  		})
  	});

  });