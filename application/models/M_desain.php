<?php
    class M_desain extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        function insert($data){
            $this->db->insert('adilaya_dt_medsos',$data);
        }

        function get_produk(){
            $query = $this->db->query("SELECT * FROM adilaya_produk ORDER BY nm_produk asc");
            return $query->result();
        }

        function get_kode_medsos(){
            $query = $this->db->query('SELECT MAX(kd_medsos) AS maxkode FROM adilaya_dt_medsos');
            return $query->result();
        }

        function up_foto($id, $data){
            $this->db->where('kd_medsos', $id);
            $this->db->update('adilaya_dt_medsos', $data);
        }

        function get_data_medsos($id){
            $query = $this->db->query("SELECT kd_medsos, nm_medsos, CONVERT(varchar, tgl_medsos, 105) as tgl, pro_medsos, konsep_medsos, hasil_medsos FROM adilaya_dt_medsos
            LEFT JOIN adilaya_produk ON adilaya_dt_medsos.pro_medsos = adilaya_produk.kd_produk
            WHERE kd_medsos = '$id'");
            return $query->result();
        }

        function get_total_dt(){
            $query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_medsos WHERE 1=1 AND dt_aktif = '1'");
            return $query->result();
        }

        function get_total_fl($searchQuery){
            $query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_medsos WHERE 1=1 AND dt_aktif = '1' ".$searchQuery);
            return $query->result();
        }

        function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
            $query = $this->db->query("select TOP 100
            kd_medsos, nm_medsos, tgl_medsos, konsep_medsos, hasil_medsos, nm_produk 
            FROM adilaya_dt_medsos
            LEFT JOIN adilaya_produk ON adilaya_dt_medsos.pro_medsos = adilaya_produk.kd_produk
            WHERE 1=1 AND dt_aktif = '1' ".$searchQuery." and kd_medsos NOT IN (
                SELECT TOP ".$baris." kd_medsos FROM adilaya_dt_medsos 
                WHERE 1=1 AND dt_aktif = '1' ".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
            order by ".$columnName." ".$columnSortOrder);
            return $query->result();
        }

    }
?>