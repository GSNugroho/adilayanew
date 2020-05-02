<?php
class M_monitor extends CI_Model{

	public $table = 'adilaya_dt_mitra';
	// public $tbaset = 'aset_barang';
	public $id = 'kd_mitra';
	public $id2 = 'kd_order';
	public $id3 = 'id';
	// public $id_a = 'vc_nm_barang';
	// public $order = 'DESC';
	public $table2 = 'tmp_order';
	public $table3 = 'adilaya_dt_mitra_order';
	public $table4 = 'adilaya_dt_mitra_order_detail';
	
	function __construct()
	{
			parent::__construct();
			$this->load->database('default', TRUE);
	}
	function get_data()
	{
		$query = $this->db->query("SELECT nm_mitra, tgl_lahir, almt_rmh, almt_kt_rmh, almt_outlet, almt_kirim, paket, jml_tarif, rekening, ats_nm_rekening, ekspedisi, biaya_kirim FROM adilaya_dt_mitra");
		return $query->result();
	}

	function get_limit_data($limit, $start = 0, $q = NULL){
		$this->db->order_by($this->id, $this->order);
        $this->db->like('id_inv', $q);
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}

	function insert($data){
		$this->db->insert($this->table, $data);
	}

	function insertpmby($data){
		$this->db->insert('adilaya_pembayaran', $data);
	}

	function insert_notif($notif){
		$this->db->insert('a_notif', $notif);
	}

	function tmp_order_insert($data){
		$this->db->insert($this->table2, $data);
	}

	function tmp_pmby_insert($data){
		$this->db->insert('tmp_pembayaran', $data);
	}

	function insert_order($data){
		$this->db->insert($this->table3, $data);
	}

	function insertdetail($detail){
		$this->db->insert($this->table4, $detail);
	}

	function insertaset($dataaset){
		$this->db->insert($this->tbaset, $dataaset);
	}

	function update_dtmitra_order($id, $data){
		$this->db->where('kd_order', $id);
		$this->db->update($this->table3, $data);
	}

	function update($id, $data){
		$this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
	}
	function update_aset($id, $dataaset){
		$this->db->where($this->id_a, $id);
		$this->db->update($this->tbaset, $dataaset);
	}

	function get_by_id($id){
		$query = $this->db->query("SELECT * FROM adilaya_dt_mitra JOIN adilaya_produk ON adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk WHERE kd_mitra = '".$id."'");
		return $query->row();
	}

	function cek_kd($idp, $nm){
		$query = $this->db->query("SELECT kd_barang FROM a_barang WHERE nm_barang like '%".$nm."%' AND id_produk = '".$idp."'");
		return $query->row();
	}

	function get_by_id_read($id){
		$query =$this->db->query("SELECT adilaya_dt_mitra.nm_mitra as nm_mitra, adilaya_dt_mitra.kt_lahir as kt_lahir, adilaya_dt_mitra.tgl_lahir as tgl_lahir, 
		adilaya_dt_mitra.dt_create as tgl_join, adilaya_dt_mitra.almt_rmh as almt_rmh, provinsi1.nama_provinsi as provinsi1, kota1.nama_kota as kota1 , 
		adilaya_dt_mitra.no_hp1 as no_hp, adilaya_dt_mitra.almt_outlet as almt_outlet, provinsi2.nama_provinsi as provinsi2, kota2.nama_kota as kota2, 
		adilaya_produk.nm_produk as nm_produk, adilaya_paket.nm_paket as paket FROM adilaya_dt_mitra
		LEFT JOIN kota as kota1 ON adilaya_dt_mitra.almt_kt_rmh = kota1.id_kota AND adilaya_dt_mitra.almt_kt_outlet = kota1.id_kota
		LEFT JOIN kota as kota2 ON adilaya_dt_mitra.almt_kt_outlet = kota2.id_kota AND adilaya_dt_mitra.almt_kt_rmh = kota2.id_kota
		LEFT JOIN provinsi as provinsi1 ON kota1.id_provinsi_fk = provinsi1.id_provinsi AND kota2.id_provinsi_fk = provinsi1.id_provinsi
		LEFT JOIN provinsi as provinsi2 ON kota2.id_provinsi_fk = provinsi2.id_provinsi AND kota1.id_provinsi_fk = provinsi2.id_provinsi
		LEFT JOIN adilaya_paket ON adilaya_dt_mitra.paket = adilaya_paket.kd_paket
		LEFT JOIN a_ekspedisi ON adilaya_dt_mitra.ekspedisi = a_ekspedisi.kd_ekspedisi
		LEFT JOIN adilaya_produk ON adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk
		WHERE dt_aktif = '1' AND adilaya_dt_mitra.kd_mitra = '".$id."'");
		return $query->row();
	}

	function get_rin_by($id){
		$query = $this->db->query("	SELECT adilaya_pembayaran.ats_nm as ats_nm, adilaya_pembayaran.nm_bank as nm_bank, adilaya_pembayaran.no_rekening as no_rekening, adilaya_pembayaran.jml_transfer 
		FROM adilaya_dt_mitra 
		JOIN adilaya_pembayaran ON adilaya_dt_mitra.pembayaran = adilaya_pembayaran.kd_pmby 
		WHERE adilaya_dt_mitra.kd_mitra = '".$id."'");
		return $query->result();
	}

	function get_tmp_tahu(){
		$query = $this->db->query("SELECT * FROM tmp_order");
		return $query->result();
	}
	
	function delete($id){
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	function tmp_order_delete($id){
		$this->db->where($this->id, $id);
		$this->db->delete($this->table2);
	}
	function tmp_order_deletes($id){
		$this->db->where($this->id3, $id);
		$this->db->delete($this->table2);
	}
	
	function adilaya_order_delete($id){
		$this->db->where($this->id2, $id);
		$this->db->delete($this->table3);
	}
	function tmp_pmby_delete($id){
		$this->db->where('kd_pmby', $id);
		$this->db->delete('tmp_pembayaran');
	}
	
	function jumlah_data(){
		$this->db->where('inv_barang.kd_aset IS NOT NULL');
		return $this->db->get('inv_barang')->num_rows();
	}

	function data($number,$offset){
		$this->db->order_by('kd_inv', 'asc');
		$this->db->join('inv_merk', 'inv_barang.merk = inv_merk.vc_kd_merk');
		$this->db->join('inv_pubgugus','inv_barang.id_ruang = inv_pubgugus.vc_k_gugus');
		$this->db->join('inv_golongan','inv_barang.kd_bantu = inv_golongan.id_gol');
		$this->db->join('inv_jenis','inv_barang.jns_brg = inv_jenis.in_kd_jenis');
		$this->db->join('aset_barang','inv_barang.kd_aset = aset_barang.vc_nm_barang');
		$this->db->where('inv_barang.kd_aset IS NOT NULL');
		return $query = $this->db->get('inv_barang',$number,$offset)->result();		
	}

	function get_paket(){
		$query = $this->db->query('SELECT * FROM adilaya_paket ORDER BY kd_paket asc');
		return $query->result();
	}
	function get_ekspedisi(){
		$query = $this->db->query('SELECT * FROM a_ekspedisi ORDER BY kd_ekspedisi asc');
		return $query->result();
	}
	function get_barang(){
		$query = $this->db->query("SELECT * FROM a_barang ORDER BY kd_barang asc");
		return $query->result();
	}
	function get_produk(){
		$query = $this->db->query("SELECT * FROM adilaya_produk ORDER BY nm_produk asc");
		return $query->result();
	}
	function get_temp(){
		$query = $this->db->query("SELECT kd_tmp_order, nm_barang, jml_barang, kd_mitra, tmp_order.harga_barang as harga_barang FROM tmp_order JOIN a_barang ON tmp_order.kd_barang = a_barang.kd_barang ORDER BY kd_tmp_order asc");
		return $query->result();
	}
	function get_dt_mitra_order($id){
		$query = $this->db->query("SELECT kd_mitra, no_hp1, no_hp2, nm_mitra, almt_rmh, almt_outlet, almt_kirim, nm_produk FROM adilaya_dt_mitra  WHERE kd_mitra = '".$id."'");
		return $query->result_array();
	}
	function get_dtmt_pel($id){
		$query = $this->db->query("SELECT adilaya_dt_mitra.kd_mitra as kd_mitra, adilaya_dt_mitra.nm_mitra as nm_mitra, adilaya_dt_mitra.kt_lahir as kt_lahir, CONVERT(varchar, adilaya_dt_mitra.tgl_lahir, 105) as tgl_lahir,  CONVERT(varchar, adilaya_dt_mitra.dt_create, 105) as tgl_join, 
		adilaya_dt_mitra.almt_rmh as almt_rmh, adilaya_dt_mitra.almt_prov_rmh as almt_prov_rmh, adilaya_dt_mitra.almt_kt_rmh as almt_kt_rmh, adilaya_dt_mitra.almt_kec_rmh as almt_kec_rmh, adilaya_dt_mitra.almt_kel_rmh as almt_kel_rmh, adilaya_dt_mitra.no_hp1 as no_hp1, 
		adilaya_dt_mitra.no_hp2 as no_hp2, adilaya_dt_mitra.almt_outlet as almt_outlet, adilaya_dt_mitra.almt_prov_outlet as almt_prov_outlet, adilaya_dt_mitra.almt_kt_outlet as almt_kt_outlet, adilaya_dt_mitra.almt_kec_outlet as almt_kec_outlet, adilaya_dt_mitra.almt_kel_outlet as almt_kel_outlet, 
		adilaya_dt_mitra.ats_nm_kirim as ats_nm_kirim, adilaya_dt_mitra.almt_kirim as almt_kirim, adilaya_dt_mitra.almt_prov_kirim as almt_prov_kirim, adilaya_dt_mitra.almt_kt_kirim as almt_kt_kirim, adilaya_dt_mitra.almt_kec_kirim as almt_kec_kirim, adilaya_dt_mitra.almt_kel_kirim as almt_kel_kirim,
		adilaya_dt_mitra.nm_produk as nm_produk,  adilaya_dt_mitra.paket as paket, adilaya_dt_mitra.pembayaran as pembayaran FROM adilaya_dt_mitra
		LEFT JOIN adilaya_paket ON adilaya_dt_mitra.paket = adilaya_paket.kd_paket
		LEFT JOIN a_ekspedisi ON adilaya_dt_mitra.ekspedisi = a_ekspedisi.kd_ekspedisi
		LEFT JOIN adilaya_produk ON adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk
		WHERE dt_aktif = '1' AND adilaya_dt_mitra.kd_mitra = '".$id."'");
		return $query->result_array();
	}
	function cek_kd_or($id){
		$query = $this->db->query("SELECT DISTINCT kd_tmp_order FROM tmp_order WHERE kd_mitra = '".$id."'");
		return $query->row();
	}
	function cek_row($i, $j){
		$query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order WHERE kd_mitra = '".$i."' AND kd_order = '".$j."'");
		return $query->row();
	}
	function get_history($id){
		$query = $this->db->query("SELECT CONVERT(varchar, dt_trans, 105) as dt_trans, kd_order, total_order, nama_ekspedisi, b_barang, biaya_kirim FROM adilaya_dt_mitra_order JOIN a_ekspedisi ON ekspedisi = kd_ekspedisi WHERE kd_mitra = '".$id."'");
		return $query->result();
	}
	function get_harga_brg($kd_barang){
		$query = $this->db->query("SELECT harga_barang FROM a_barang WHERE kd_barang = '".$kd_barang."'");
		return $query->row();
	}
	function get_provinsi(){
		$query = $this->db->query('SELECT * FROM tb_prov ORDER BY tb_prov.name');
		return $query->result();
	}
	function get_kota($id){
		$query = $this->db->query("SELECT * FROM tb_kota WHERE province_id = '".$id."'");
		return $query->result();
	}
	function get_kec($id){
		$query = $this->db->query("SELECT * FROM tb_kecamatan WHERE regency_id = '".$id."'");
		return $query->result();
	}
	function get_kel($id){
		$query = $this->db->query("SELECT * FROM tb_kelurahan WHERE district_id = '".$id."'");
		return $query->result();
	}
	function get_jns_paket($id){
		$query = $this->db->query("SELECT * FROM adilaya_paket WHERE kd_produk = '".$id."' ");
		return $query->result();
	}
	function get_rek_kantor($id){
		$query = $this->db->query("SELECT kd_bank, nm_bank FROM adilaya_produk
		JOIN a_bank ON adilaya_produk.rek_jo = a_bank.[join]
		WHERE kd_produk = '".$id."'");
		return $query->result();
	}
	function get_no_rek($id){
		$query = $this->db->query("SELECT no_rek FROM a_bank WHERE kd_bank = '".$id."'");
		return $query->result();
	}
	function get_kode(){
		$query = $this->db->query('SELECT MAX(kd_mitra) AS maxkode FROM adilaya_dt_mitra');
		return $query->result();
	}
	function get_kode_order(){
		$query = $this->db->query('SELECT MAX(kd_order) AS maxkode FROM adilaya_dt_mitra_order');
		return $query->result();
	}
	function get_kode_pmby(){
		$query = $this->db->query("SELECT MAX(kd_pmby) AS maxkode FROM adilaya_pembayaran");
		return $query->result();
	}
	function get_all_harga($id){
		$query = $this->db->query("SELECT kd_tmp_order, kd_barang, jml_barang, kd_mitra, harga_barang FROM tmp_order WHERE kd_mitra='".$id."'");
		return $query->result();
	}
	function get_all_pmby(){
		$query = $this->db->query("SELECT kd_pmby, jml_transfer, nm_bank, no_rekening, ats_nm, dt_trans FROM tmp_pembayaran");
		return $query->result();
	}
	function cek_aset($kd_aset){
		$query = $this->db->query("SELECT vc_nm_barang FROM aset_barang WHERE vc_nm_barang = '".$kd_aset."'");
		return $query->result();
	}
	function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra 
		LEFT JOIN tb_kota on almt_kt_rmh = tb_kota.id
		LEFT JOIN adilaya_paket on paket = kd_paket
		LEFT JOIN a_ekspedisi on ekspedisi = kd_ekspedisi
		LEFT JOIN adilaya_produk on adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk
		WHERE 1=1 AND dt_aktif = '1'");
		return $query->result();
	}
	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM adilaya_dt_mitra 
		LEFT JOIN tb_kota on almt_kt_rmh = tb_kota.id
		LEFT JOIN adilaya_paket on paket = kd_paket
		LEFT JOIN a_ekspedisi on ekspedisi = kd_ekspedisi
		LEFT JOIN adilaya_produk on adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk
		WHERE 1=1 AND dt_aktif = '1' ".$searchQuery);
		return $query->result();
	}
	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("select TOP ".$rowperpage."
		kd_mitra,
		nm_mitra, 
		tgl_lahir, 
		almt_rmh, 
		tambahan,
		name as nama_kota, 
		almt_outlet, 
		almt_kirim, 
		nm_paket, 
		sts_pmby, 
		adilaya_produk.nm_produk as nm_produk,
		nama_ekspedisi, 
		biaya_kirim,
		dt_create,
		dt_pelunasan,
		dt_last_order,
		CASE
    	WHEN DATEADD(month, 3, dt_last_order) <= GETDATE() THEN 'Di atas 3 bulan'
    	ELSE 'Kurang dari 3 bulan'
		END AS last, 
		sts_vakum
		FROM adilaya_dt_mitra 
		LEFT JOIN tb_kota on almt_kt_rmh = tb_kota.id
		LEFT JOIN adilaya_paket on paket = kd_paket
		LEFT JOIN a_ekspedisi on ekspedisi = kd_ekspedisi
		LEFT JOIN adilaya_produk on adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk
		WHERE 1=1 AND dt_aktif = '1' ".$searchQuery." and kd_mitra NOT IN (
			SELECT TOP ".$baris." kd_mitra FROM adilaya_dt_mitra 
			WHERE 1=1 AND dt_aktif = '1' ".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
		order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function get_total_dt_or($kd_mitra){
		$query = $this->db->query("SELECT count(*) as allcount FROM tmp_order JOIN a_barang ON tmp_order.kd_barang = a_barang.kd_barang WHERE kd_mitra='".$kd_mitra."'");
		return $query->result();
	}
	function get_total_fl_or($searchQuery, $kd_mitra){
		$query = $this->db->query("SELECT count(*) as allcount FROM tmp_order JOIN a_barang ON tmp_order.kd_barang = a_barang.kd_barang WHERE kd_mitra='".$kd_mitra."' ".$searchQuery);
		return $query->result();
	}
	function get_total_ft_or($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage, $kd_mitra){
		$query = $this->db->query("select TOP ".$rowperpage."
		id, kd_tmp_order, nm_barang, jml_barang, kd_mitra, tmp_order.harga_barang as harga_barang
		FROM tmp_order JOIN a_barang ON tmp_order.kd_barang = a_barang.kd_barang
		WHERE kd_mitra='".$kd_mitra."' ".$searchQuery." order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function get_total_dt_bn(){
		$query = $this->db->query("SELECT count(*) as allcount FROM tmp_pembayaran ");
		return $query->result();
	}
	function get_total_fl_bn($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM tmp_pembayaran WHERE 1=1 ".$searchQuery);
		return $query->result();
	}
	function get_total_ft_bn($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("select TOP ".$rowperpage."
		id, kd_pmby, jml_transfer, nm_bank, no_rekening, ats_nm
		FROM tmp_pembayaran
		WHERE 1=1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function update_notif($id, $data){
		$this->db->where('notif_status', $id);
		$this->db->update('a_notif', $data);
	}

	function get_all_notif(){
		$query = $this->db->query("SELECT TOP 5 * FROM a_notif ORDER BY notif_id DESC ");
		return $query->result();
	}

	function count_notif(){
		$query = $this->db->query("SELECT COUNT(*) as total FROM a_notif WHERE notif_status=0");
		return $query->row();
	}

	function get_nm_mitra($id){
		$query = $this->db->query("SELECT kd_mitra, nm_mitra, almt_outlet, tb_kota.name as almt_kt_outlet FROM adilaya_dt_mitra 
		JOIN tb_kota ON adilaya_dt_mitra.almt_kt_outlet = tb_kota.id WHERE nm_produk = '$id'");
		return $query->result();
	}

	function get_info_mitra($id){
		$query = $this->db->query("SELECT adilaya_dt_mitra.kd_mitra as kd_mitra, adilaya_dt_mitra.nm_mitra as nm_mitra, adilaya_dt_mitra.kt_lahir as kt_lahir, CONVERT(varchar, adilaya_dt_mitra.tgl_lahir, 105) as tgl_lahir,  CONVERT(varchar, adilaya_dt_mitra.dt_create, 105) as tgl_join, 
		adilaya_dt_mitra.almt_rmh as almt_rmh, tb_prov.name as almt_prov_rmh, tb_kota.name as almt_kt_rmh, tb_kecamatan.name as almt_kec_rmh, tb_kelurahan.name as almt_kel_rmh, adilaya_dt_mitra.no_hp1 as no_hp1, 
		adilaya_dt_mitra.no_hp2 as no_hp2 FROM adilaya_dt_mitra
		LEFT JOIN tb_prov ON adilaya_dt_mitra.almt_prov_rmh = tb_prov.id
		LEFT JOIN tb_kota ON adilaya_dt_mitra.almt_kt_rmh = tb_kota.id
		LEFT JOIN tb_kecamatan ON adilaya_dt_mitra.almt_kec_rmh = tb_kecamatan.id
		LEFT JOIN tb_kelurahan ON adilaya_dt_mitra.almt_kel_rmh = tb_kelurahan.id
		LEFT JOIN adilaya_paket ON adilaya_dt_mitra.paket = adilaya_paket.kd_paket
		LEFT JOIN a_ekspedisi ON adilaya_dt_mitra.ekspedisi = a_ekspedisi.kd_ekspedisi
		LEFT JOIN adilaya_produk ON adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk
		WHERE dt_aktif = '1' AND adilaya_dt_mitra.kd_mitra = '".$id."'");
		return $query->result_array();
	}
	function get_info_outlet($id){
		$query = $this->db->query("SELECT adilaya_dt_mitra.kd_mitra as kd_mitra, adilaya_dt_mitra.nm_mitra as nm_mitra, adilaya_dt_mitra.kt_lahir as kt_lahir, CONVERT(varchar, adilaya_dt_mitra.tgl_lahir, 105) as tgl_lahir,  CONVERT(varchar, adilaya_dt_mitra.dt_create, 105) as tgl_join, 
		adilaya_dt_mitra.almt_outlet as almt_outlet, tb_prov.name as almt_prov_outlet, tb_kota.name as almt_kt_outlet, tb_kecamatan.name as almt_kec_outlet, tb_kelurahan.name as almt_kel_outlet, 
		adilaya_dt_mitra.ats_nm_kirim as ats_nm_kirim, adilaya_dt_mitra.almt_kirim as almt_kirim, adilaya_dt_mitra.almt_prov_kirim as almt_prov_kirim, adilaya_dt_mitra.almt_kt_kirim as almt_kt_kirim, adilaya_dt_mitra.almt_kec_kirim as almt_kec_kirim, adilaya_dt_mitra.almt_kel_kirim as almt_kel_kirim,
		adilaya_produk.nm_produk as nm_produk,  adilaya_dt_mitra.paket as paket, adilaya_dt_mitra.pembayaran as pembayaran FROM adilaya_dt_mitra
		LEFT JOIN tb_prov ON adilaya_dt_mitra.almt_prov_outlet = tb_prov.id
		LEFT JOIN tb_kota ON adilaya_dt_mitra.almt_kt_outlet = tb_kota.id
		LEFT JOIN tb_kecamatan ON adilaya_dt_mitra.almt_kec_outlet = tb_kecamatan.id
		LEFT JOIN tb_kelurahan ON adilaya_dt_mitra.almt_kel_outlet = tb_kelurahan.id
		LEFT JOIN adilaya_paket ON adilaya_dt_mitra.paket = adilaya_paket.kd_paket
		LEFT JOIN a_ekspedisi ON adilaya_dt_mitra.ekspedisi = a_ekspedisi.kd_ekspedisi
		LEFT JOIN adilaya_produk ON adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk
		WHERE dt_aktif = '1' AND adilaya_dt_mitra.kd_mitra = '".$id."'");
		return $query->result_array();
	}
	function rincian_order($id){
        $query = $this->db->query("SELECT * FROM adilaya_dt_mitra_order_detail JOIN a_barang ON adilaya_dt_mitra_order_detail.kd_barang = a_barang.kd_barang WHERE kd_order = '".$id."'");
        return $query->result();
    }
}
?>