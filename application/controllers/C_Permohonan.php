<?php 
/**
 * 
 */
class C_Permohonan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Data_Permohonan');
		$this->load->model('M_Data_Pengambilan');
	}

	function index(){
		$data['permohonan'] = $this->M_Data_Permohonan->tampil_data()->result();
		$tanggal = date('y-m-d');
		$where = array (
			'tanggal' => $tanggal
		);
		$data['kode'] = $this->M_Data_Pengambilan->make_id($where);
		$this->load->view('Back/V_Permohonan',$data);
	}

	function data_permohonan(){
		$data['permohonan'] = $this->M_Data_Permohonan->tampil_tunda()->result();
		$this->load->view('Back/V_Permohonan',$data);
	}

	function form_terima(){
		$id = $this->input->post('getDetail');
		$where = array(
			'id_permohonan' => $id
		);
		$data['permohonan'] = $this->M_Data_Permohonan->edit_data($where,'permohonan')->result();
		$tanggal = date('y-m-d');
		$where2 = array(
			'tanggal' => $tanggal
		);
		$data['kode'] = $this->M_Data_Pengambilan->make_id($where2);
		$this->load->view('Back/V_Terima',$data);
	}

	function tambah_aksi(){
		$nik = $this->input->post('nik');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$email = $this->input->post('email');
		$keterangan_yang_dimohon = $this->input->post('keterangan_yang_dimohon');
		$desa = $this->input->post('desa');
		$dusun = $this->input->post('dusun');
		$rt = $this->input->post('rt');
		$nama_jalan = $this->input->post('nama_jalan');
		$keterangan = "Memohon";
		$tanggal = date('y-m-d');
		$where = array(
			'tanggal' => $tanggal
		);
		$nomor_antrian = $this->M_Data_Permohonan->make_id($where);
		$hari = $this->M_Data_Permohonan->hari();
		$waktu = date('h:i:sa');
		$tahun = date('Y');

		$config = Array(
		    'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'najich.muhammad2703@gmail.com',
            'smtp_pass' => 'ros',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'crlf'    => "\r\n",
            'newline' => "\r\n"
		);
		$this->load->library('email', $config);

		$this->email->from('najich.muhammad2703@gmail.com', 'Kecamatan');
        $this->email->to($email);
        $this->email->subject('Permohonan Anda Telah Di Ajukan');
        $this->email->message("Permohonan Anda Telah berhasil di ajukan, dengan data sebagai berikut : <br>
        	Nomor Antrian Permohonan : ".$nomor_antrian."<br>"."
        	Nama Lengkap : ".$nama_lengkap."<br>"."
        	Keterangan Yang Dimohon : ".$keterangan_yang_dimohon);

          if($this->email->send()) {
				$data = Array(
					'nik' => $nik,
					'nama_lengkap' => $nama_lengkap,
					'email' => $email,
					'keterangan_yang_dimohon' => $keterangan_yang_dimohon,
					'desa' => $desa,
					'dusun' => $dusun,
					'rt' => $rt,
					'nama_jalan' => $nama_jalan,
					'nomor_antrian_permohonan' => $nomor_antrian,
					'keterangan' => $keterangan,
					'tanggal' => $tanggal,
					'hari' => $hari,
					'waktu' => $waktu,
					'tahun' => $tahun
				);

				$this->M_Data_Permohonan->input_data($data,'permohonan');
				$this->session->set_flashdata('message', 'berhasil');
				redirect('home');
          }
          else {
               echo 'Email tidak berhasil dikirim'.$email;
               echo '<br />';
               echo $this->email->print_debugger();
          }


	}

	function terima(){
		$id_permohonan = $this->input->post('id_permohonan');
		$email = $this->input->post('email');
		$nomor_antrian = $this->input->post('nomor_antrian');
		$tanggal = $this->input->post('tanggal');

		$config = Array(
		    'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'najich.muhammad2703@gmail.com',
            'smtp_pass' => 'ros',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'crlf'    => "\r\n",
            'newline' => "\r\n"
		);
		$this->load->library('email', $config);

		$this->email->from('najich.muhammad2703@gmail.com', 'Kecamatan');
        $this->email->to($email);
        $this->email->subject('Permohonan Anda Telah Di Terima');
        $this->email->message("Permohonan yang anda ajukan telah di terima, silahkan melakukan pengambilan dokumen, dengan data sebagai berikut : <br>
        	Nomor Antrian Pengambilan : ".$nomor_antrian."<br>"."
        	Pada Tanggal : ".$tanggal);

          if($this->email->send()) {
		        $data = array(
					'keterangan' => 'Selesai'
				);

				$where = array(
					'id_permohonan' => $id_permohonan
				);

				$data2 = array(
					'id_permohonan' => $id_permohonan,
					'nomor_antrian_pengambilan' => $nomor_antrian,
					'tanggal_pengambilan' => $tanggal,
					'keterangan' => "Menunggu Diambil",
					'tanggal' => date('y-m-d'),
					'hari' => $this->M_Data_Permohonan->hari(),
					'waktu' => date('h:i:sa'),
					'tahun' => date('Y')
				);

				$this->M_Data_Pengambilan->input_data($data2,'pengambilan');
				$this->M_Data_Permohonan->update_data($where,$data,'permohonan');
				redirect('admin/permohonan');
          }
          else {
               echo 'Email tidak berhasil dikirim'.$email;
               echo '<br />';
               echo $this->email->print_debugger();
          }

		
	}

	

	function tolak(){
		$id_permohonan = $this->uri->segment(4);
		$row = $this->M_Data_Permohonan->get_email($id_permohonan);
		$email = $row->email;
		$config = Array(
		    'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'najich.muhammad2703@gmail.com',
            'smtp_pass' => 'ros',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'crlf'    => "\r\n",
            'newline' => "\r\n"
		);
		$this->load->library('email', $config);

		$this->email->from('jorgifaatwaambia@gmail.com', 'Kecamatan');
        $this->email->to($email);
        $this->email->subject('Permohonan Anda Telah Di Tolak');
        $this->email->message('Silahkan cek kembali dokumen yang diperlukan lalu kembali mengajukan permohonan ke kecamatan');

          if($this->email->send()) {
				$data = array(
					'keterangan' => 'Ditolak'
				);

				$where = array(
					'id_permohonan' => $id_permohonan
				);

				$this->M_Data_Permohonan->update_data($where,$data,'permohonan');
				redirect('admin/permohonan');
          }
          else {
               echo 'Email tidak berhasil dikirim';
               echo '<br />';
               echo $this->email->print_debugger();
          }

	}

	function ditunda(){
		$id_permohonan = $this->uri->segment(4);
		$row = $this->M_Data_Permohonan->get_email($id_permohonan);
		$email = $row->email;
		$config = Array(
		    'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'najich.muhammad2703@gmail.com',
            'smtp_pass' => 'ros',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'crlf'    => "\r\n",
            'newline' => "\r\n"
		);
		$this->load->library('email', $config);

		$this->email->from('najich.muhammad2703@gmail.com', 'Kecamatan');
        $this->email->to($email);
        $this->email->subject('Permohonan Anda Telah Di Tunda');
        $this->email->message('Silahkan segera menghubungi pihak kecamatan dengan memperlihatkan nomor antrian anda');

          if($this->email->send()) {
				$data = array(
					'keterangan' => 'Ditunda'
				);

				$where = array(
					'id_permohonan' => $id_permohonan
				);

				$this->M_Data_Permohonan->update_data($where,$data,'permohonan');
				redirect('admin/permohonan');
          }
          else {
               echo 'Email tidak berhasil dikirim';
               echo '<br />';
               echo $this->email->print_debugger();
          }

	}
}
 ?>