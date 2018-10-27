<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Template {
	function __construct()
	{
		$this->ini =&get_instance();
		$this->ini->load->database();
		$this->ini->load->library('ion_auth');
		$this->navbar = $this->ini->ion_auth->get_users_groups()->row()->name;
	}

	public function set_template($isi='')
	{
		$this->layout = 'template/'.$isi;
		return $this;
	}
	public function render($isi='', $data=array())
	{
		$data['content'] = $this->ini->load->view($isi, $data, true);
		$data1['data_produk'] = $this->ini->db->select('nama')->get('produk')->result();
		$data['navbar']= $this->ini->load->view('navbar/'.$this->navbar, $data1, true);

		$this->ini->load->view($this->layout, $data);
	}

	public function css($css='')
	{
		echo "<link href='".site_url("assets/css/".$css.".css")."' rel='stylesheet' type='text/css'/>";
	}
	public function js($js='')
	{
		echo "<script src='".site_url("assets/js/".$js.".js")."'></script>";
	}
}