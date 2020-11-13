<?php 
/**
 * 
 */
class C_Back extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Data_Permohonan');
		$this->load->model('M_Data_Pengambilan');
		$this->load->model('M_Data_Pelayanan');
		$this->load->model('M_Data_Kuota');
		$this->load->model('M_Data_Akun');
	}

	function dashboard(){
		$row = $this->M_Data_Permohonan->hitung();
		$row2 = $this->M_Data_Permohonan->hitung_total();
		$row3 = $this->M_Data_Permohonan->hitung_ktp();
		$row4 = $this->M_Data_Permohonan->hitung_kia();
		$row5 = $this->M_Data_Permohonan->hitung_kk();
        $row6 = $this->M_Data_Pengambilan->hitung();
        $row7 = $this->M_Data_Pengambilan->hitung_total();
        $row8 = $this->M_Data_Akun->hitung();
        $row9 = $this->M_Data_Pelayanan->hitung();
        $row10 = $this->M_Data_Pelayanan->hitung_total();
        $row11 = $this->M_Data_Kuota->get_kuota();
        $data = Array (
            'jumlah_permohonan' => $row->jumlah_permohonan,
            'total_permohonan' => $row2->total_permohonan,
            'total_ktp' => $row3->total_ktp,
            'total_kia' => $row4->total_kia,
            'total_kk' => $row5->total_kk,
            'jumlah_pengambilan' => $row6->jumlah_pengambilan,
            'total_pengambilan' => $row7->total_pengambilan,
            'jumlah_akun' => $row8->jumlah_akun,
            'jumlah_pelayanan' => $row9->jumlah_pelayanan,
            'total_pelayanan' => $row10->total_pelayanan,
            'kuota' => $row11->kuota
        );
		$this->load->view('Back/V_Dashboard',$data);
	}

}
 ?>	
