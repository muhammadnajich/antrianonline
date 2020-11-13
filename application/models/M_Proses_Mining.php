<?php 
  
class M_Proses_Mining extends CI_Model{ 
	function tampil_data(){
		$prosesmining = $this->db->query('SELECT * FROM iterasi_c45');
		return $prosesmining;
		//return $this->db->get('user');
	}
}
?>