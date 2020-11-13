<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	function index()
	{
		$data['excel'] = $this->excel_import_model->select()->result();
		$data['total_dataset'] = $this->excel_import_model->hitung_dataset();
		$this->load->view('Back/V_Kelola_Mining',$data);

	}


	//function fetch()
	//{
		//$data = $this->excel_import_model->select();
		//$output = '
		//<h4 align="center">Total Data : '.$data->num_rows().'</h4>
		//<table class="table table-striped table-bordered">
			//<tr>
				//<th>Kuartal</th>
				//<th>Hari</th>
				//<th>Waktu</th>
				//<th>Jenis Pelayanan</th>
				//<th>Tingkat Kepadatan</th>
			//</tr>
		//';
		//foreach($data->result() as $row)
		//{
			//$output .= '
			//<tr>
				//<td>'.$row->kuartal.'</td>
				//<td>'.$row->hari.'</td>
				//<td>'.$row->waktu.'</td>
				//<td>'.$row->jenis_pelayanan.'</td>
				//<td>'.$row->tingkat_kepadatan.'</td>
			//</tr>
			//';
		//}
		//$output .= '</table>';
		//echo $output;
	

	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
            //file penting tong dihapus
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$kuartal = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$hari = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$waktu = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$jenis_permohonan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$tingkat_kepadatan = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$data[] = array(
						'kuartal'		=>	$kuartal,
						'hari'			=>	$hari,
						'waktu'				=>	$waktu,
						'jenis_permohonan'		=>	$jenis_permohonan,
						'tingkat_kepadatan'			=>	$tingkat_kepadatan
					);
				}
			}	
		}
		$this->excel_import_model->insert($data);
		$this->session->set_flashdata('result_insert', 'Data Berhasil Ditambahkan.');
		redirect('admin/kelolamining');
	}
}
?>