<?php 
/**
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class C_Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login');
	}

	public function index(){
		$data = array(
            "title" => "Login Admin"
        );
        if ($this->session->userdata('isLoginAdmin') == TRUE) {
            redirect('dashboard/admin');
        }else{
            $this->load->view('V_Login',$data);
        }
	}

    function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }
	public function auth(){
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('V_Login');
        }else{
            $usr    = $this->input->post('username');
            $psw    = md5($this->input->post('password'));
            $cek    = $this->M_Login->cek($usr,$psw);
            if($cek->num_rows() != 0){
                foreach ($cek->result() as $dat){
                    $sess_data['isLoginAdmin']      = TRUE;
					$sess_data['id']                = $dat->id_user;
                    $sess_data['nama']              = $dat->name;
                    $sess_data['email']             = $dat->email;
                    $sess_data['username']          = $dat->username;
                    $sess_data['role']             = $dat->role;
                    $this->session->set_userdata($sess_data);
                }                
                $this->session->set_userdata($sess_data);
                if ($this->session->userdata('role') == "admin") {
                    redirect('dashboard/admin');
                }else{
                    redirect('admin/pelayanan');
                }
            }else {
                $this->session->set_flashdata('result_login', '<br>Nama Akun atau Katasandi yang anda masukkan salah.');
                redirect('admin/');
            }
        }
    }
}
 ?>