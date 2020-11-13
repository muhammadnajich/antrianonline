<?php 
	/**
	 * 
	 */
	class C_Kelolamining extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('M_Kelola_Mining');
			$this->load->model('M_Proses_Mining');
			$this->load->library('form_validation');
			$this->load->library('session');
		}

		function index()
		{
			$this->load->view('Back/V_Kelola_Mining');
		}

		function proses()
		{
			// $data['perhitunganC45'] = $this->M_Kelola_Mining->miningC45();
			// $data['insertAtributPohonKeputusan'] = $this->M_Kelola_Mining->miningC45();
			// $data['getInfGainMax'] = $this->M_Kelola_Mining->miningC45();
			$this->M_Kelola_Mining->populateDb();
			$this->M_Kelola_Mining->miningC45('','');
			$data['prosesmining'] = $this->M_Proses_Mining->tampil_data()->result();
			$this->load->view('Back/V_Proses_Mining',$data);
		}
	}
 ?>