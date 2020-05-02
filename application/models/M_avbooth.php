<?php
    class M_avbooth extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
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

        function insert_candy($data){
            $this->db->insert('adilaya_pcandy_crepes', $data);
        }

        function insert_banana($data){
            $this->db->insert('adilaya_pbanana_nugget', $data);
        }

        function insert_boboo($data){
            $this->db->insert('adilaya_pboboo_chicken', $data);
        }

        function insert_chicken($data){
            $this->db->insert('adilaya_pchicken_popop', $data);
        }

        function insert_chiclin($data){
            $this->db->insert('adilaya_pchiclin', $data);
        }

        function insert_chip($data){
            $this->db->insert('adilaya_pchip_finger', $data);
        }

        function insert_cut($data){
            $this->db->insert('adilaya_pcut_chicken', $data);
        }

        function insert_eat($data){
            $this->db->insert('adilaya_peat_toast', $data);
        }

        function insert_lian($data){
            $this->db->insert('adilaya_plianling', $data);
        }

        function insert_martabak($data){
            $this->db->insert('adilaya_pmartabak_mini', $data);
        }

        function insert_ohana($data){
            $this->db->insert('adilaya_pohana', $data);
        }

        function insert_oliv($data){
            $this->db->insert('adilaya_poliv_geprek', $data);
        }

        function insert_pisang($data){
            $this->db->insert('adilaya_ppisang_nugget_kece', $data);
        }

        function insert_popchick($data){
            $this->db->insert('adilaya_ppopchick', $data);
        }

        function insert_gila($data){
            $this->db->insert('adilaya_ptahu_gila', $data);
        }

        function insert_king($data){
            $this->db->insert('adilaya_ptahu_hot', $data);
        }

        function insert_xiao($data){
            $this->db->insert('adilaya_pxiaolin', $data);
        }
    }
?>