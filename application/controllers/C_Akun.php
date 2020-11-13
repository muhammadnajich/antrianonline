<?php 
	/**
	 * 
	 */
	class C_Akun extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_Data_Akun');
			$this->load->helper('url');
		}

		function index(){
		$data['akun'] = $this->M_Data_Akun->tampil_data()->result();
		$this->load->view('Back/V_Akun',$data);
		}

		function tambah(){
		$data['kode'] = $this->M_Data_Akun->make_id();
		$this->load->view('Back/V_Add_Akun',$data);
		}

		function edit($id_user){
		$id_user = $this->uri->segment(4);
		$where = array('id_user' => $id_user);
		$data['akun'] = $this->M_Data_Akun->edit_data($where,'user')->result();
		$this->load->view('Back/V_Edit_Akun',$data);
		}

		function tambah_aksi(){
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$role = $this->input->post('role');
		$tanggal_dibuat = date('y-m-d');
		$status = 0;

		$data = array(
			'id_user' => $id_user,
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'role' => $role,
			'tanggal_dibuat' => $tanggal_dibuat,
			'status' => $status
			);
		
		$this->M_Data_Akun->input_data($data,'user');
		$this->session->set_flashdata('result_add_akun', 'Data Berhasil Ditambahkan.');
		redirect('admin/akun');
		}

		function update(){
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password_lama = $this->input->post('password_lama');
		$role = $this->input->post('role');
		$tanggal_dibuat = $this->input->post('tanggal_dibuat');

		if ($password == $password_lama) {
			$data = array(
			'username' => $username,
			'email' => $email,
			'role' => $role,
			'tanggal_dibuat' => $tanggal_dibuat
			);
		$where = array(
			'id_user' => $id_user,
		);
		$this->M_Data_Akun->update_data($where,$data,'user');
		redirect('admin/akun');
		}else{
			$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'role' => $role,
			'tanggal_dibuat' => $tanggal_dibuat
			);
		$where = array(
			'id_user' => $id_user,
		);
		$this->M_Data_Akun->update_data($where,$data,'user');
		$this->session->set_flashdata('result_edit_akun', 'Data Berhasil Diubah.');
		redirect('admin/akun');
		}

		
		}

		function hapus($id){
		$id_user = $this->uri->segment(4);
		$where = array('id_user' => $id_user);
		$this->M_Data_Akun->hapus_data($where,'user');
		redirect('admin/akun');
		}


	}
 ?>