<?php 
  
class M_Data_Akun extends CI_Model{ 
	function tampil_data(){
		$akun = $this->db->query('SELECT * FROM `user` WHERE role="Pelayanan"');
		return $akun;
		//return $this->db->get('user');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function edit_data($where,$table){		
	    return $this->db->get_where($table,$where);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function hitung(){
		$sql = $this->db->query('SELECT count(id_user) as jumlah_akun FROM user');
		return $sql->row();
	}
	public function make_id()
    {
        $this->db->select('RIGHT(user.id_user,6) as kode', FALSE);
        $this->db->order_by('id_user','DESC');
        $this->db->limit(1);

        $query = $this->db->get('user');

        if ($query->num_rows()<>0) {
        	$data = $query->row();
        	$kode = intval($data->kode)+1;
        }else{
        	$kode = 1;
        }
        $kode_max= str_pad($kode,6,"0",STR_PAD_LEFT);
        $kode_jadi = "USR".$kode_max;
        return $kode_jadi;
    }
}

?>