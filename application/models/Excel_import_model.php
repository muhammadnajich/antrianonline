<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('dataset');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('dataset', $data);
	}

	function hitung_dataset()
	{   
    	$query = $this->db->get('dataset');
    	if($query->num_rows()>0)
    {
      	return $query->num_rows();
    }
    	else
    {
      	return 0;
    }
}
}
?>