<?php 
/**
 * 
 */
class C_Front extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Data_Desa');
		$this->load->model('M_Data_Dusun');
		$this->load->model('M_Data_Rt');
        $this->load->model('M_Data_Permohonan');
        $this->load->model('M_Data_Pengambilan');
        $this->load->model('M_Data_Informasi');
        $this->load->model('M_Data_Kuota');
	}

	public function index(){
		$data['desa'] = $this->M_Data_Desa->view()->result();
		$this->load->view('Front/V_Home',$data);
	}
	public function home(){
		$id_kuotaantrian = 1;
        $tanggal = date('y-m-d');
        $row = $this->M_Data_Permohonan->hitung();
        $row2 = $this->M_Data_Pengambilan->hitung();
        $data2 = Array (
            'jumlah_permohonan' => $row->jumlah_permohonan,
            'jumlah_pengambilan' => $row2->jumlah_pengambilan,
            'tanggal' => $tanggal
        );
        $where2 = Array (
            'id_kuotaantrian' => $id_kuotaantrian
        );
        $this->M_Data_Kuota->update_data($where2,$data2,'kuotaantrian');
        $row3 = $this->M_Data_Kuota->get_permohonan($tanggal);
        $row4 = $this->M_Data_Kuota->get_pengambilan($tanggal);
        if (empty($row3->nomor_antrian_permohonan)) {
            $nomor_antrian_permohonan = 0;
        }else{
            $nomor_antrian_permohonan = $row3->nomor_antrian_permohonan;
        }

        if (empty($row4->nomor_antrian_pengambilan)) {
            $nomor_antrian_pengambilan = 0;
        }else{
            $nomor_antrian_pengambilan = $row4->nomor_antrian_pengambilan;
        }
        $row5 = $this->M_Data_Kuota->get_kuota();
        $data = array(
            'jumlah_permohonan' => $row->jumlah_permohonan,
            'jumlah_pengambilan' => $row2->jumlah_pengambilan,
            'nomor_antrian_permohonan' => $nomor_antrian_permohonan,
            'nomor_antrian_pengambilan' => $nomor_antrian_pengambilan,
            'kuota' => $row5->kuota
        );
        $data['desa'] = $this->M_Data_Desa->view()->result();
		$data['informasi'] = $this->M_Data_Informasi->tampil_data()->result();
        $data['kuota'] = $this->M_Data_Kuota->tampil_data()->result();

        $this->load->view('Front/V_Home',$data);
	}

	public function listDusun(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $id_desa = $this->input->post('id_desa');
    
    $dusun = $this->M_Data_Dusun->viewByDesa($id_desa)->result();
    
    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>Pilih</option>";
    
    foreach($dusun as $data){
      $lists .= "<option value='".$data->id_dusun."'>".$data->nama_dusun."</option>"; // Tambahkan tag option ke variabel $lists
    }
    
    $callback = array('list_dusun'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_dusun
    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }

  public function listRt(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $id_dusun = $this->input->post('id_dusun');
    
    $rt = $this->M_Data_Rt->viewByDusun($id_dusun)->result();
    
    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>Pilih</option>";
    
    foreach($rt as $data){
      $lists .= "<option value='".$data->id_rt."'>".$data->rt."</option>"; // Tambahkan tag option ke variabel $lists
    }
    
    $callback = array('list_rt'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_rt
    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }


	
	public function about(){
		$this->load->view('Front/V_About');
	}

    public function antrian_permohonan(){
        $data['permohonan'] = $this->M_Data_Permohonan->tampil_antrian()->result();
        $this->load->view('Front/V_Antrian_Permohonan',$data);
    }

    public function antrian_pengambilan(){
        $data['pengambilan'] = $this->M_Data_Pengambilan->tampil_antrian()->result();
        $this->load->view('Front/V_Antrian_Pengambilan',$data);
    }

    function pesan(){
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $pesan = $this->input->post('pesan');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'pesan' => $pesan
        );

        $this->session->set_flashdata('message', 'email');
        $this->M_Data_Informasi->input_data($data,'pesan');
        redirect('home');
    }

}
 ?>