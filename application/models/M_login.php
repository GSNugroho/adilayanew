<?php
    class M_login extends CI_Model{
        function auth_user($username, $pass){
            $query = $this->db->query("SELECT * FROM adilaya_user WHERE username = '".$username."' AND pass = '".$pass."'");
            return $query->row();
        }
    }
?>