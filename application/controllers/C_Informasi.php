<?php 
	/**
	 * 
	 */
	class C_Informasi extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_Data_Informasi');
			$this->load->helper('url');
		}

		function index(){
		$data['informasi'] = $this->M_Data_Informasi->tampil_data()->result();
		$this->load->view('Back/V_Informasi',$data);
		}

		function tambah(){
		$data['kode'] = $this->M_Data_Informasi->make_id();
		$this->load->view('Back/V_Add_Informasi',$data);
		}

		function edit($id_informasi){
		$id_informasi = $this->uri->segment(4);
		$where = array('id_informasi' => $id_informasi);
		$data['informasi'] = $this->M_Data_Informasi->edit_data($where,'informasi')->result();
		$this->load->view('Back/V_Edit_Informasi',$data);
		}

		function tambah_aksi(){
		$id_informasi = $this->input->post('id_informasi');
		$judul_informasi = $this->input->post('judul_informasi');
		$isi = $this->input->post('isi');
		$dibuat_oleh = $this->session->userdata('username');
		$tanggal_dibuat = date('y-m-d');

		$data = array(
			'id_informasi' => $id_informasi,
			'judul_informasi' => $judul_informasi,
			'isi' => $isi,
			'dibuat_oleh' => $dibuat_oleh,
			'tanggal_dibuat' => $tanggal_dibuat
			);
		
		$this->M_Data_Informasi->input_data($data,'informasi');
		$this->session->set_flashdata('result_add_info', 'Data Berhasil Ditambahkan.');
		redirect('admin/informasi');
		}

		function update(){
		$id_informasi = $this->input->post('id_informasi');
		$judul_informasi = $this->input->post('judul_informasi');
		$isi = $this->input->post('isi');
		$dibuat_oleh = $this->session->userdata('username');
		$tanggal_dibuat = date('y-m-d');

		$data = array(
			'id_informasi' => $id_informasi,
			'judul_informasi' => $judul_informasi,
			'isi' => $isi,
			'dibuat_oleh' => $dibuat_oleh,
			'tanggal_dibuat' => $tanggal_dibuat
			);
		
		$where = array(
			'id_informasi' => $id_informasi
		);
		$this->M_Data_Informasi->update_data($where,$data,'informasi');
		redirect('admin/informasi');
		}

		function hapus($id){
		$id_informasi = $this->uri->segment(4);
		$where = array('id_informasi' => $id_informasi);
		$this->M_Data_Informasi->hapus_data($where,'informasi');
		$this->session->set_flashdata('result_edi_info', 'Data Berhasil Diunggah.');
		redirect('admin/informasi');
		}


	}
 ?>