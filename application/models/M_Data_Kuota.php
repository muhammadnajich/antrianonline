<?php 
 
class M_Data_Kuota extends CI_Model{ 
	function tampil_data(){
		return $this->db->get('kuotaantrian');
	}
	function edit_data($where,$table){		
	    return $this->db->get_where($table,$where);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_permohonan($tanggal){
		$sql = $this->db->query('SELECT nomor_antrian_permohonan FROM permohonan WHERE tanggal="'.$tanggal.'" AND keterangan !="Selesai" ORDER BY nomor_antrian_permohonan  ASC LIMIT 1');
		return $sql->row();
		
	}

	function get_kuota(){
		$sql = $this->db->query('SELECT kuota FROM kuotaantrian');
		return $sql->row();
	}

	function get_pengambilan($tanggal){
		$sql = $this->db->query('SELECT nomor_antrian_pengambilan FROM pengambilan WHERE tanggal_pengambilan="'.$tanggal.'" AND keterangan !="Selesai" ORDER BY nomor_antrian_pengambilan  ASC LIMIT 1');
		return $sql->row();
	}
}

?>