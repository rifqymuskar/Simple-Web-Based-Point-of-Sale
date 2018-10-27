<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in() && $this->ion_auth->get_users_groups()->row()->id == 2){
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
		$this->template->render($this->class.'/'.$this->method);
	}

	public function get_dataid_invoices()
	{
		$id_invoice = $this->input->get('id_invoice');

		// $this->db->select('*'); // <-- There is never any reason to write this line!
		// $this->db->from('orders');
		// $this->db->where('orders.id_invoice', $id_invoice);
		// $this->db->join('produk', 'orders.id = produk.id');
		// $query = $this->db->get();
		$query['orders'] = $this->db->where('id_invoice', $id_invoice)->get('orders')->result();
		$query['invoices'] = $this->db->where('id', $id_invoice)->get('invoices')->row();
		foreach ($query['orders'] as $key => $value) {
			$query['produk'][$key] =  $this->db->where('nama', $value->nama_produk)->get('produk')->row();
		}
		echo json_encode($query);
	}

	public function pembayaran()
	{
		$id_invoice = $this->input->post('id_invoice');
		$this->db->set('status', 'complete')->where('id', $id_invoice)->update('invoices');
		if($this->db->affected_rows() != 0){
			echo "success";
		}else{
			echo "gagal";
		}
	}

	public function menu()
	{
		$data['listfield'] = $this->db->list_fields('produk');
		$data['datanya'] = $this->db->get('produk')->result();
		$this->template->render($this->class.'/'.$this->method, $data);
	}

	public function tambahmenu()
	{
		$data = $this->input->post(NULL, TRUE);
		$data['nama'] = str_replace(" ", "_", $data['nama']);
		$data['last_update'] = date("Y-m-d H:i:s");
		$this->db->insert('produk', $data);
		if($this->db->affected_rows() != 0){
			echo "success";
		}else{
			echo "gagal";
		}
	}

	public function hapusmenu()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id)->delete('produk');
		if($this->db->affected_rows() != 0){
			echo "success";
		}else{
			echo "gagal";
		}
	}

	public function get_data_produk()
	{
		$id = $this->input->get('id');
		echo json_encode($this->db->where('id', $id)->get('produk')->row());
	}

	public function submitedit()
	{
		$data = $this->input->post(NULL, TRUE);
		$id = $data['id'];
		unset($data['id']);
		$data['last_update'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id)->update('produk', $data);
		if($this->db->affected_rows() != 0){
			echo "success";
		}else{
			echo "gagal";
		}
	}

	public function batalkanpesanan()
	{
		$id_invoice = $this->input->post('id');
		$this->db->where('id', $id_invoice)->set('status', 'gagal')->update('invoices');
		if($this->db->affected_rows() != 0){
			echo "success";
		}else{
			echo "gagal";
		}
	}
}
