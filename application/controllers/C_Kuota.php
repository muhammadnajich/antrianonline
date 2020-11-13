<?php 
	/**
	 * 
	 */
	class C_Kuota extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_Data_Kuota');
		}

		function index(){
		$data['kuota'] = $this->M_Data_Kuota->tampil_data()->result();
		$this->load->view('Back/V_Setting',$data);
		}


		function edit($id_kuotaantrian){
		$id_kuotaantrian = $this->uri->segment(4);
		$where = array('id_kuotaantrian' => $id_kuotaantrian);
		$data['kuota'] = $this->M_Data_Kuota->edit_data($where,'kuotaantrian')->result();
		$this->load->view('Back/V_Setting_Kuota',$data);
		}

		function update(){
		$id_kuotaantrian = $this->input->post('id_kuotaantrian');
		$kuota = $this->input->post('kuota');
		$tanggal = $this->input->post('tanggal');
		$data = array(
			'kuota' => $kuota,
			'tanggal' => $tanggal
			);
		$where = array(
			'id_kuotaantrian' => $id_kuotaantrian,
		);
		$this->M_Data_Kuota->update_data($where,$data,'kuotaantrian');
		redirect('admin/kuota');

		
		}



	}
 ?>