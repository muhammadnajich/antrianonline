<?php 
/**
 * 
 */
class M_Data_Desa extends CI_Model
{
	public function view(){
		return $this->db->get('desa');
	}
}
 ?>