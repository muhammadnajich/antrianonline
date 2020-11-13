<?php 
 
class M_Data_Pengambilan extends CI_Model{ 
	function tampil_data(){
		$tanggal = date('Y-m-d');
		return $this->db->query('SELECT *,permohonan.* FROM pengambilan INNER JOIN permohonan ON pengambilan.id_permohonan = permohonan.id_permohonan WHERE pengambilan.keterangan="Menunggu Diambil" AND tanggal_pengambilan="'.$tanggal.'"');
	}

	function hitung(){
		$tanggal = date('y-m-d');
		$sql = $this->db->query('SELECT count(id_pengambilan) as jumlah_pengambilan FROM pengambilan WHERE tanggal="'.$tanggal.'"');
		return $sql->row();
	}

	function hitung_total(){
		$sql = $this->db->query('SELECT count(id_pengambilan) as total_pengambilan FROM pengambilan');
		return $sql->row();
	}

	function tampil_antrian(){
		$tanggal = date('y-m-d');
		return $this->db->query('SELECT * FROM pengambilan WHERE tanggal_pengambilan="'.$tanggal.'"'); 
	}

	function tampil_tunda(){
		return $this->db->query('SELECT * FROM pengambilan WHERE keterangan="Ditunda"');
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
	public function make_id($where2)
    {
        $this->db->select('RIGHT(permohonan.nomor_antrian_permohonan,6) as kode', FALSE);
        $this->db->where($where2);
        $this->db->order_by('nomor_antrian_permohonan','DESC');
        $this->db->limit(1);

        $query = $this->db->get('permohonan');

        if ($query->num_rows()<>0) {
        	$data = $query->row();
        	$kode = intval($data->kode)+1;
        }else{
        	$kode = 1;
        }
        $kode_max= str_pad($kode,6,"0",STR_PAD_LEFT);
        $kode_jadi = "L2".$kode_max;
        return $kode_jadi;
    }

    function get_id_permohonan($id_pengambilan){
    	$sql = 'SELECT id_permohonan FROM pengambilan WHERE id_pengambilan="'.$id_pengambilan.'"';
    	return $sql->row();
    }

    function hari(){
		$date = date('y-m-d');
		$Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$hari = date("w",strtotime($date));
		$result = $Hari[$hari];
		return $result;
	}
}

?>