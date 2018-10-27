<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in() && $this->ion_auth->get_users_groups()->row()->id == 3){
			$this->load->library('template');
			$this->template->set_template('public');

			$this->method = $this->router->fetch_method();
			$this->class = $this->router->fetch_class();
		}else{
			redirect('auth', 'refresh');
		}
		
	}

	public function index()
	{
		$data['produk'] = $this->db->get('produk')->result();
		$this->template->render($this->class.'/'.$this->method, $data);
	}

	public function addtocart()
	{
		$data = $this->input->post('data');
		$data = array(
	        'id'      => $data['id'],
	        'qty'     => $data['jumlah'],
	        'price'   => $data['harga'],
	        'name'    => $data['nama']
		);
		$this->cart->insert($data);
		if($this->db->affected_rows() != 0){
			echo json_encode(count($this->cart->contents()));
		}else{
			echo "gagal";
		}
	}

	public function listcart()
	{
		echo json_encode(array('konten' => $this->cart->contents(), 'total' => $this->cart->total()));
	}

	public function delete_specifik_row_cart()
	{
		$rowid = $this->input->post('rowid');
		$data = array(
           'rowid' => $rowid,
           'qty'   => 0
        );
		$this->cart->update($data);
		if($this->db->affected_rows() != 0){
			echo "success";
		}else{
			echo "gagal";
		}
	}

	public function submit_pemesanan()
	{
		$nomor_meja = $this->input->post('nomor_meja');
		$this->db->select_max('id');
		$result= $this->db->get('invoices')->row_array();
		if($result['id'] <= 0){
			$result['id'] = 1;
		}
		$invoce = array(
			'nomor_pesanan' => 'ERP'.date('dmY').'-00'.$result['id'],
			'nomor_meja' => $nomor_meja,
			'total' => $this->cart->total(),
			'id_pelayan' => $this->ion_auth->get_user_id(),
			'date' => date('Y-m-d H:i:s'),
			'status' => 'onproses'
		);
		$this->db->insert('invoices', $invoce);

		if($this->db->affected_rows() != 0){
			$id_invoice = $this->db->insert_id();
			foreach ($this->cart->contents() as $key) {
				$data = array(
					'id_invoice' => $id_invoice,
					'nama_produk' => $key['name'],
					'jumlah' => $key['qty'],
					'last_update' => date('Y-m-d H:i:s')
				);
				$this->db->insert('orders', $data);
			}
			if($this->db->affected_rows() != 0){
				$this->cart->destroy();
				echo "sukses";
			}else{
				echo "gagal";
			}

		}
	}

	public function aktivitasku()
	{
		$id_user = $this->ion_auth->get_user_id();
		$query = $this->db->where('id_pelayan', $id_user)->get('invoices')->result();

		echo json_encode($query);

	}

}
