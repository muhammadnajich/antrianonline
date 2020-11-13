<?php 
/**
 * 
 */
class M_Login extends CI_Model
{
	function cek ($user,$pass){
        $tbl = "user";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("username",$user);
        $this->db->or_where("email",$user);
        $this->db->where("password",$pass);
        $this->db->where("status",TRUE);
        return $this->db->get();
    }

    function cekMail ($email){
        $tbl = "user";
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where("email",$email);
        return $this->db->get();
    }
    function changePass($pass,$nip){
        $data = array(
            'password' =>$pass);
        $this->db->where('id_user',$nip);
        $this->db->update('user',$data);
    }
}
 ?>
