<?php 
/**
 * 
 */
class C_Pengambilan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Data_Pelayanan');
		$this->load->model('M_Data_Pengambilan');
	}

	function index(){
		$data['pengambilan'] = $this->M_Data_Pengambilan->tampil_data()->result();
		$this->load->view('Back/V_Pengambilan',$data);
	}

	function data_pengambilan(){
		$data['pengambilan'] = $this->M_Data_Pengambilan->tampil_data()->result();
		$this->load->view('Back/V_Pengambilan',$data);
	}


	function terima(){
		$id_pengambilan = $this->uri->segment(4);

		$data = array(
			'waktu_pengambilan' => date('h:i:sa'),
			'keterangan' => 'Selesai'
		);

		$where = array(
			'id_pengambilan' => $id_pengambilan
		);

		$data2 = array(
			'id_pengambilan' => $id_pengambilan,
			'keterangan' => "Selesai",
			'tanggal' => date('y-m-d'),
			'hari' => $this->M_Data_Pengambilan->hari(),
			'waktu' => date('h:i:sa'),
			'tahun' => date('Y')
		);

		$this->M_Data_Pelayanan->input_data($data2,'pelayanan');
		$this->M_Data_Pengambilan->update_data($where,$data,'pengambilan');
		redirect('admin/pengambilan');
	}

	function ditunda(){
		$id_pengambilan = $this->uri->segment(4);
		$row = $this->M_Data_Pengambilan->get_id_permohonan($id_pengambilan);
		$row2 = $this->M_Data_Permohonan->get_email($row->id_pengambilan);
		$email = $row2->email;
		$config = Array(
		    'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'jorgifatwaambia@gmail.com',
            'smtp_pass' => 'rosita1212',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'crlf'    => "\r\n",
            'newline' => "\r\n"
		);
		$this->load->library('email', $config);

		$this->email->from('jorgifatwaambia@gmail.com', 'Kecamatan');
        $this->email->to($email);
        $this->email->subject('Pengambilan Dokumen Anda Telah Di Terima');
        $this->email->message("Pengambilan Dokumen telah di tunda, silahkan segera menghubungi pihak kecamatan, dengan memperilhatkan nomor antrian anda.");

          if($this->email->send()) {
				$data = array(
					'keterangan' => 'Ditunda'
				);

				$where = array(
					'id_pengambilan' => $id_pengambilan
				);

				$this->M_Data_Pengambilan->update_data($where,$data,'pengambilan');
				redirect('admin/pengambilan');
          }
          else {
               echo 'Email tidak berhasil dikirim'.$email;
               echo '<br />';
               echo $this->email->print_debugger();
          }
	}
}
 ?>