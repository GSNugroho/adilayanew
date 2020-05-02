<?php
    class M_mapping extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        
	    function update($id, $data){
            $this->db->where('kd_mitra', $id);
            $this->db->update('adilaya_dt_mitra', $data);
        }
        
        function insertpmby($data){
            $this->db->insert('adilaya_pembayaran', $data);
        }

        function get_dtmt_pel($id){
            $query = $this->db->query("SELECT adilaya_dt_mitra.kd_mitra as kd_mitra, adilaya_dt_mitra.nm_mitra as nm_mitra, adilaya_dt_mitra.kt_lahir as kt_lahir, CONVERT(varchar, adilaya_dt_mitra.tgl_lahir, 105) as tgl_lahir,  
            adilaya_dt_mitra.almt_rmh as almt_rmh, adilaya_dt_mitra.almt_prov_rmh as almt_prov_rmh, adilaya_dt_mitra.almt_kt_rmh as almt_kt_rmh, adilaya_dt_mitra.almt_kec_rmh as almt_kec_rmh, adilaya_dt_mitra.almt_kel_rmh as almt_kel_rmh, adilaya_dt_mitra.no_hp1 as no_hp1, 
            adilaya_dt_mitra.no_hp2 as no_hp2, adilaya_dt_mitra.almt_outlet as almt_outlet, adilaya_dt_mitra.almt_prov_outlet as almt_prov_outlet, adilaya_dt_mitra.almt_kt_outlet as almt_kt_outlet, adilaya_dt_mitra.almt_kec_outlet as almt_kec_outlet, adilaya_dt_mitra.almt_kel_outlet as almt_kel_outlet, 
            adilaya_dt_mitra.ats_nm_kirim as ats_nm_kirim, adilaya_dt_mitra.almt_kirim as almt_kirim, adilaya_dt_mitra.almt_prov_kirim as almt_prov_kirim, adilaya_dt_mitra.almt_kt_kirim as almt_kt_kirim, adilaya_dt_mitra.almt_kec_kirim as almt_kec_kirim, adilaya_dt_mitra.almt_kel_kirim as almt_kel_kirim,
            adilaya_dt_mitra.nm_produk as nm_produk,  adilaya_dt_mitra.paket as paket, adilaya_dt_mitra.pembayaran as pembayaran FROM adilaya_dt_mitra
            LEFT JOIN adilaya_paket ON adilaya_dt_mitra.paket = adilaya_paket.kd_paket
            LEFT JOIN a_ekspedisi ON adilaya_dt_mitra.ekspedisi = a_ekspedisi.kd_ekspedisi
            LEFT JOIN adilaya_produk ON adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk
            WHERE dt_aktif = '1' AND adilaya_dt_mitra.kd_mitra = '$id'
						");
            return $query->result_array();
        }
    }
?>