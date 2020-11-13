<?php 
 
class M_Data_Pelayanan extends CI_Model{ 
	function tampil_data(){
		return $this->db->query('SELECT *,permohonan.* FROM pelayanan INNER JOIN pengambilan ON pelayanan.id_pengambilan = pengambilan.id_pengambilan INNER JOIN permohonan ON pengambilan.id_permohonan = permohonan.id_permohonan');
	}

	function tampil_laporan(){
		return $this->db->get('laporan_pelayanan');
	}

	function hitung(){
		$tanggal = date('y-m-d');
		$sql = $this->db->query('SELECT count(id_pelayanan) as jumlah_pelayanan FROM pelayanan WHERE tanggal="'.$tanggal.'"');
		return $sql->row();
	}
	function cetak(){
		$response = array();
		 
		    // Select record
		    $this->db->select('jumlah_permohonan,jumlah_pengambilan,jumlah_kk,jumlah_ktp,jumlah_kia,hari,tanggal');
		    $q = $this->db->get('laporan_pelayanan');
		    $response = $q->result_array();
 
    		return $response;
	}

	function hitung_total(){
		$sql = $this->db->query('SELECT count(id_pelayanan) as total_pelayanan FROM pelayanan');
		return $sql->row();
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