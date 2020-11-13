<?php 
	/**
	 * 
	 */
	class M_Data_Dusun extends CI_Model
	{
		function viewByDesa($id_desa){
			$this->db->where('id_desa', $id_desa);
			$result = $this->db->get('dusun');

			return $result;
		}
	}
 ?>