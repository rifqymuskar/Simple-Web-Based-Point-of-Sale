<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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
		
	}

	public function get_API_login()
	{
		$query = $this->db->select('first_name, password')->get('users')->result();
		echo json_encode($query);
	}
	public function get_API_menu()
	{
		$query = $this->db->select('nama, jenis, harga, jumlah')->get('produk')->result();
		echo json_encode($query);
	}

}