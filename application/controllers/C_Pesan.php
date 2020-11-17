<?php 
/**
 * 
 */
class C_Pesan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Data_Pesan');
	}

	function index(){
		$data['pesan'] = $this->M_Data_Pesan->tampil_data()->result();
		$this->load->view('Back/V_Pesan',$data);
	}

	function form_balas(){
		$id = $this->input->post('getDetail');
		$where = array(
			'id_pesan' => $id
		);
		$data['pesan'] = $this->M_Data_Pesan->edit_data($where,'pesan')->result();
		$this->load->view('Back/V_Balas',$data);
	}

	function balas(){
		$email = $this->input->post('email');
		$pesan = $this->input->post('pesan');
		$subject = $this->input->post('subject');
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
        $this->email->subject($subject);
        $this->email->message($pesan);

          if($this->email->send()) {
				$this->session->set_flashdata('message','berhasil');
				redirect('admin/pesan');
          }
          else {
               echo 'Email tidak berhasil dikirim'.$email;
               echo '<br />';
               echo $this->email->print_debugger();
          }
	}
}
 ?>