<?php 
/**
 * 
 */
class C_Pelayanan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Data_Pelayanan');
		$this->load->model('M_Data_Permohonan');
		$this->load->model('M_Data_Pengambilan');
	}

	function index(){
		$data['pelayanan'] = $this->M_Data_Pelayanan->tampil_data()->result();
		$this->load->view('Back/V_Pelayanan',$data);
	}

	function laporan(){
		$data['laporan'] = $this->M_Data_Pelayanan->tampil_laporan()->result();
		$this->load->view('Back/V_Report_Pelayanan',$data);
	}

	function buat_laporan(){
		$row = $this->M_Data_Permohonan->hitung();
		$row2 = $this->M_Data_Permohonan->hitung_total();
		$row3 = $this->M_Data_Permohonan->hitung_ktp();
		$row4 = $this->M_Data_Permohonan->hitung_kia();
		$row5 = $this->M_Data_Permohonan->hitung_kk();
        $row7 = $this->M_Data_Pengambilan->hitung_total();
        $hari = $this->M_Data_Permohonan->hari();
        $data = Array (
            'jumlah_permohonan' => $row2->total_permohonan,
            'jumlah_pengambilan' => $row7->total_pengambilan,
            'jumlah_kk' => $row5->total_kk,
            'jumlah_ktp' => $row3->total_ktp,
            'jumlah_kia' => $row4->total_kia,
            'hari' => $hari,
            'tanggal' => date('y-m-d')
        );
        $this->M_Data_Pelayanan->input_data($data,'laporan_pelayanan');
        redirect('admin/laporan_pelayanan');
	}

	function hapus($id){
		$id_laporan = $this->uri->segment(4);
		$where = array('id_laporan' => $id_laporan);
		$this->M_Data_Pelayanan->hapus_data($where,'laporan_pelayanan');
		redirect('admin/laporan_pelayanan');
	}

	function cetak_laporan(){
 		   $filename = 'users_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   
		   // get data 
		   $usersData = $this->M_Data_Pelayanan->cetak();

		   // file creation 
		   $file = fopen('php://output', 'w');
		 
		   $header = array("Jumlah Permohonan","Jumlah Pengambilan","Jumlah KK","Jumlah KTP","Jumlah KIA","Hari","Tanggal"); 
		   fputcsv($file, $header);
		   foreach ($usersData as $key=>$line){ 
		     fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
  	}


}
 ?>