<?php 
	/**
	 * 
	 */
	class M_Data_Rt extends CI_Model
	{
		function viewByDusun($id_dusun){
			$this->db->where('id_dusun', $id_dusun);
			$result = $this->db->get('rt');

			return $result;
		}
	}
 ?>