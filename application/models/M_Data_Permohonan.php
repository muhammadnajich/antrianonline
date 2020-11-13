<?php 
 
class M_Data_Permohonan extends CI_Model{ 
	function tampil_data(){
		return $this->db->query('SELECT * FROM permohonan WHERE keterangan="Memohon"');
	}

	function hitung(){
		$tanggal = date('y-m-d');
		$sql = $this->db->query('SELECT count(id_permohonan) as jumlah_permohonan FROM permohonan WHERE tanggal="'.$tanggal.'"');
		return $sql->row();
	}

	function hitung_total(){
		$sql = $this->db->query('SELECT count(id_permohonan) as total_permohonan FROM permohonan');
		return $sql->row();
	}

	function hitung_ktp(){
		$sql = $this->db->query('SELECT count(id_permohonan) as total_ktp FROM permohonan WHERE keterangan_yang_dimohon="KTP"');
		return $sql->row();
	}

	function hitung_kia(){
		$sql = $this->db->query('SELECT count(id_permohonan) as total_kia FROM permohonan WHERE keterangan_yang_dimohon="KIA"');
		return $sql->row();
	}

	function hitung_kk(){
		$sql = $this->db->query('SELECT count(id_permohonan) as total_kk FROM permohonan WHERE keterangan_yang_dimohon="KK"');
		return $sql->row();
	}


	function tampil_tunda(){
		return $this->db->query('SELECT * FROM permohonan WHERE keterangan="Ditunda"');
	}

	function tampil_antrian(){
		$tanggal = date('y-m-d');
		return $this->db->query('SELECT * FROM permohonan WHERE tanggal="'.$tanggal.'"'); 
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
	public function make_id($where)
    {
        $this->db->select('RIGHT(permohonan.nomor_antrian_permohonan,6) as kode', FALSE);
        $this->db->where($where);
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
        $kode_jadi = "L1".$kode_max;
        return $kode_jadi;
    }

    function hari(){
		$date = date('y-m-d');
		$Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$hari = date("w",strtotime($date));
		$result = $Hari[$hari];
		return $result;
	}

	function get_email($id_permohonan){
		$sql = $this->db->query('SELECT email FROM permohonan WHERE id_permohonan="'.$id_permohonan.'"');
		return $sql->row();
	}
}

?>