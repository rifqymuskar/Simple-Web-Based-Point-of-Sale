<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		if ($this->ion_auth->logged_in()){
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
		$this->load->view('welcome_message');
	}

	public function daftarpesanan()
	{
		echo json_encode($this->db->where('status', 'onproses')->get('invoices')->result());
	}	

	public function details_pesanan()
	{
		$id = $this->input->get('id');
		echo json_encode($this->db->where('id_invoice', $id)->get('orders')->result());
	}

	public function update_orders()
	{
		$id = $this->input->post('id');
		$jumlah = $this->input->post('jumlah');

		$this->db->where('id', $id)->set('jumlah', $jumlah)->update('orders');
		if($this->db->affected_rows() != 0){
				$this->cart->destroy();
				echo "sukses";
		}else{
			echo "gagal";
		}
	}

	public function delete_orders()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id)->delete('orders');
		if($this->db->affected_rows() != 0){
				$this->cart->destroy();
				echo "sukses";
		}else{
			echo "gagal";
		}
	}

	public function tambah_spesifik_orders()
	{
		$data = $this->input->post(NULL, TRUE);
		$this->db->insert('orders', $data);
		if($this->db->affected_rows() != 0){
			echo "sukses";
		}else{
			echo "gagal";
		}
	}	
	
}
