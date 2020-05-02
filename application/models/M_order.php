<?php 
class M_order extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra_order
        LEFT JOIN tb_kota ON almt_kt_kirim = tb_kota.id
        LEFT JOIN a_ekspedisi ON ekspedisi = kd_ekspedisi");
		return $query->result();
    }
    
	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra_order
        LEFT JOIN tb_kota ON almt_kt_kirim = tb_kota.id
        LEFT JOIN adilaya_dt_mitra ON adilaya_dt_mitra_order.kd_mitra = adilaya_dt_mitra.kd_mitra
        LEFT JOIN adilaya_produk ON adilaya_dt_mitra.nm_produk = kd_produk
        LEFT JOIN a_ekspedisi ON adilaya_dt_mitra_order.ekspedisi = kd_ekspedisi WHERE 1=1".$searchQuery);
		return $query->result();
    }
    
	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage."
        adilaya_dt_mitra_order.kd_mitra as kd_mitra, nm_mitra, kd_order, dt_trans, adilaya_dt_mitra_order.almt_kirim as almt_kirim, tb_kota.name as nama_kota, jml_transfer, adilaya_dt_mitra_order.nm_bank as nm_bank, adilaya_produk.nm_produk as nm_produk, 
        nama_ekspedisi, ket FROM adilaya_dt_mitra_order
        LEFT JOIN tb_kota ON almt_kt_kirim = tb_kota.id
        LEFT JOIN a_ekspedisi ON ekspedisi = kd_ekspedisi
        LEFT JOIN adilaya_dt_mitra ON adilaya_dt_mitra_order.kd_mitra = adilaya_dt_mitra.kd_mitra
        LEFT JOIN adilaya_produk ON adilaya_dt_mitra.nm_produk = kd_produk
		WHERE 1=1 ".$searchQuery." and kd_order NOT IN (
			SELECT TOP ".$baris." kd_order FROM adilaya_dt_mitra_order 
			WHERE 1=1".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
		order by ".$columnName." ".$columnSortOrder);
		return $query->result();
    }
    
    function rincian_order($id){
        $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang WHERE kd_order = '".$id."'");
        return $query->result();
    }
    function rincian_order_tahu3($id){
        $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang WHERE paket_tahu = '3Item' AND kd_order = '".$id."'");
        return $query->result();
    }
    function rincian_order_tahu21($id){
        $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang WHERE paket_tahu = '2Item1' AND kd_order = '".$id."'");
        return $query->result();
    }
    function rincian_order_tahu22($id){
        $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang WHERE paket_tahu = '2Item2' AND kd_order = '".$id."'");
        return $query->result();
    }
    function rincian_order_tahu23($id){
        $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang WHERE paket_tahu = '2Item3' AND kd_order = '".$id."'");
        return $query->result();
    }
    function rincian_order_ecer($id){
        $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang WHERE paket_tahu IS NULL AND kd_order = '".$id."'");
        return $query->result();
    }
    function dt_mitra_order($id){
        $query = $this->db->query("SELECT nm_mitra, adilaya_dt_mitra_order.almt_kirim as almt_kirim, kota.nama_kota as nama_kota, a_ekspedisi.nama_ekspedisi as ekspedisi, adilaya_dt_mitra_order.b_barang as b_barang, adilaya_dt_mitra_order.biaya_kirim as biaya_kirim, ket, adilaya_dt_mitra.nm_produk as nm_produk, porsi
         FROM adilaya_dt_mitra_order
        JOIN adilaya_dt_mitra ON adilaya_dt_mitra_order.kd_mitra = adilaya_dt_mitra.kd_mitra
        JOIN kota ON adilaya_dt_mitra_order.almt_kt_kirim = kota.id_kota
        JOIN a_ekspedisi ON adilaya_dt_mitra_order.ekspedisi = a_ekspedisi.kd_ekspedisi
        WHERE kd_order = '".$id."'");
        return $query->row();
    }
    
	function get_dt_order($id){
		$query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order WHERE kd_order = '$id'");
		return $query->result();
	}
}
?>