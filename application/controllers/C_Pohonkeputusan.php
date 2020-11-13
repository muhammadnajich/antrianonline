<?php 
	/**
	 * 
	 */
	class C_Pohonkeputusan extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}

		function index(){
		$this->load->view('Back/V_Pohon_Keputusan');
		}

	}
 ?>