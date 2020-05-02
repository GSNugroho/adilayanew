<?php
    class M_avbb extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        function get_data_mitra($id){
            $query = $this->db->query("SELECT adilaya_dt_mitra.nm_mitra AS nm_mitra, total_order, adilaya_dt_mitra_order.kd_mitra AS kd_mitra, adilaya_dt_mitra_order.kd_order AS kd_order, dt_trans, adilaya_dt_mitra_order.ats_nm_kirim AS ats_nm_kirim, 
            adilaya_dt_mitra_order.almt_kirim AS almt_kirim, tb_prov.name AS almt_prov_kirim, tb_kota.name AS almt_kt_kirim, tb_kecamatan.name AS almt_kec_kirim, tb_kelurahan.name AS almt_kel_kirim, a_ekspedisi.nama_ekspedisi AS ekspedisi, adilaya_dt_mitra_order.b_barang AS berat, adilaya_dt_mitra_order.biaya_kirim AS biaya_kirim
            FROM adilaya_dt_mitra_order 
            JOIN adilaya_dt_mitra ON adilaya_dt_mitra_order.kd_mitra = adilaya_dt_mitra.kd_mitra
            JOIN tb_prov ON adilaya_dt_mitra_order.almt_prov_kirim = tb_prov.id
            JOIN tb_kota ON adilaya_dt_mitra_order.almt_kt_kirim = tb_kota.id
            JOIN tb_kecamatan ON adilaya_dt_mitra_order.almt_kec_kirim = tb_kecamatan.id
            JOIN tb_kelurahan ON adilaya_dt_mitra_order.almt_kel_kirim = tb_kelurahan.id
            JOIN a_ekspedisi ON adilaya_dt_mitra_order.ekspedisi = a_ekspedisi.kd_ekspedisi WHERE kd_order = '".$id."'");
            return $query->result();
        }
        function get_data_order($id){
            $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail
            JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang
            WHERE kd_order = '".$id."'");
            return $query->result();
        }
        function updatekirim($id, $data){
            $this->db->where('kd_order', $id);
            $this->db->update('adilaya_dt_mitra_order', $data);
        }
        function get_dt_stok($id){
            $query = $this->db->query("SELECT * FROM a_barang WHERE kd_barang = '$id'");
            return $query->result();
        }
    }
?>