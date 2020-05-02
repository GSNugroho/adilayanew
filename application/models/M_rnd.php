<?php
    class M_rnd extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        function insert_rnd($data){
            $this->db->insert('adilaya_dt_rnd', $data);
        }
        function insert_booth($data){
            $this->db->insert('rnd_foto_booth', $data);
        }

        function insert_stiker($data){
            $this->db->insert('rnd_foto_stiker', $data);
        }

        function insert_kemasan($data){
            $this->db->insert('rnd_foto_kemasan', $data);
        }

        function insert_perkap($data){
            $this->db->insert('rnd_foto_perkap', $data);
        }

        function insert_bb($data){
            $this->db->insert('rnd_foto_bb', $data);
        }

        function get_total_dt(){
            $query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_rnd WHERE 1=1 AND dt_aktif = '1'");
            return $query->result();
        }

        function get_total_fl($searchQuery){
            $query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_rnd WHERE 1=1 AND dt_aktif = '1' ".$searchQuery);
            return $query->result();
        }

        function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
            $query = $this->db->query("select TOP ".$rowperpage."
            *
            FROM adilaya_dt_rnd 
            WHERE 1=1 AND dt_aktif = '1' ".$searchQuery." and kd_brand NOT IN (
                SELECT TOP ".$baris." kd_brand FROM adilaya_dt_rnd 
                WHERE 1=1 AND dt_aktif = '1' ".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
            order by ".$columnName." ".$columnSortOrder);
            return $query->result();
        }

        function get_kode_booth(){
            $query = $this->db->query('SELECT MAX(kd_foto) AS maxkode FROM rnd_foto_booth');
            return $query->result();
        }

        function get_kode_stiker(){
            $query = $this->db->query('SELECT MAX(kd_foto) AS maxkode FROM rnd_foto_stiker');
            return $query->result();
        }

        function get_kode_kemasan(){
            $query = $this->db->query('SELECT MAX(kd_foto) AS maxkode FROM rnd_foto_kemasan');
            return $query->result();
        }

        function get_kode_perkap(){
            $query = $this->db->query('SELECT MAX(kd_foto) AS maxkode FROM rnd_foto_perkap');
            return $query->result();
        }

        function get_kode_bb(){
            $query = $this->db->query('SELECT MAX(kd_foto) AS maxkode FROM rnd_foto_bb');
            return $query->result();
        }

        function get_foto_rnd(){
            $query = $this->db->query('SELECT MAX(kd_brand) AS maxkode FROM adilaya_dt_rnd');
            return $query->result();
        }

        function get_kode_brand(){
            $query = $this->db->query('SELECT MAX(kd_brand) AS maxkode FROM adilaya_dt_rnd');
            return $query->result();
        }

        function get_foto_booth($id){
            $query = $this->db->query("SELECT * FROM rnd_foto_booth WHERE id_rnd = '".$id."'");
            return $query->result();
        }

        function get_foto_stiker($id){
            $query = $this->db->query("SELECT * FROM rnd_foto_stiker WHERE id_rnd = '".$id."'");
            return $query->result();
        }
        function get_foto_kemasan($id){
            $query = $this->db->query("SELECT * FROM rnd_foto_kemasan WHERE id_rnd = '".$id."'");
            return $query->result();
        }
        function get_foto_perkap($id){
            $query = $this->db->query("SELECT * FROM rnd_foto_perkap WHERE id_rnd = '".$id."'");
            return $query->result();
        }

        function get_foto_bb($id){
            $query = $this->db->query("SELECT * FROM rnd_foto_bb WHERE id_rnd = '".$id."'");
            return $query->result();
        }

        function get_info_brand($id){
            $query = $this->db->query("SELECT * FROM adilaya_dt_rnd WHERE kd_brand = '".$id."'");
            return $query->result();
        }

        function get_kode_anggaran(){
            $query = $this->db->query('SELECT MAX(kd_anggaran) AS maxkode FROM adilaya_anggaran');
		    return $query->result();
        }

        function insert_anggaran($data){
            $this->db->insert('adilaya_anggaran', $data);
        }

    }
?>