<?php
    class M_vendorbooth extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        function get_total_dt(){
            $query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra WHERE 1=1 AND sts_booth = 1 ");
            return $query->result();
        }

        function get_data_mitra($id){
            $query = $this->db->query("SELECT kd_mitra, adilaya_dt_mitra.nm_produk as kd_produk, nm_mitra, almt_kirim, adilaya_produk.nm_produk as nm_produk, nm_paket, tambahan, nama_ekspedisi, name as nama_kota
            FROM adilaya_dt_mitra 
            JOIN tb_kota ON adilaya_dt_mitra.almt_kt_kirim = tb_kota.id
            LEFT JOIN adilaya_paket on paket = kd_paket 
            LEFT JOIN adilaya_produk on adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk 
            LEFT JOIN a_ekspedisi ON adilaya_dt_mitra.ekspedisi = a_ekspedisi.kd_ekspedisi
            WHERE kd_mitra = '$id'");
            return $query->result();
        }

        function get_produk(){
            $query = $this->db->query("SELECT * FROM adilaya_produk ORDER BY nm_produk asc");
            return $query->result();
        }

        function get_total_fl($searchQuery){
            $query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra WHERE 1=1 AND sts_booth = 1 ".$searchQuery);
            return $query->result();
        }

        function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
            $query = $this->db->query("SELECT TOP ".$rowperpage."
            kd_mitra, nm_mitra, almt_kirim, tb_kota.name as almt_kt_kirim         
            FROM adilaya_dt_mitra
            LEFT JOIN tb_kota ON adilaya_dt_mitra.almt_kt_kirim = tb_kota.id
            WHERE 1=1 AND sts_booth = 1 ".$searchQuery." and kd_mitra NOT IN (
                SELECT TOP ".$baris." kd_mitra FROM adilaya_dt_mitra 
                WHERE 1=1 AND sts_booth = 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
            order by ".$columnName." ".$columnSortOrder);
            return $query->result();
        }

        function getrincieattoast($id){
            $query = $this->db->query("SELECT * FROM adilaya_peat_toast WHERE kd_mitra = '$id' ");
            return $query->result();
        }

        function getrincibanana($id){
            $query = $this->db->query("SELECT * FROM adilaya_pboboo_chicken WHERE kd_mitra = '$id' ");
            return $query->result();
        }
    }
?>