<?php
    class M_vendorbb extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        function get_produk(){
            $query = $this->db->query("SELECT * FROM adilaya_produk ORDER BY nm_produk asc");
            return $query->result();
        }

        function get_total_dt(){
            $query = $this->db->query("SELECT count(*) as allcount FROM a_barang WHERE 1=1 ");
            return $query->result();
        }

        function get_total_fl($searchQuery){
            $query = $this->db->query("SELECT count(*) as allcount FROM a_barang WHERE 1=1 ".$searchQuery);
            return $query->result();
        }

        function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
            $query = $this->db->query("SELECT TOP ".$rowperpage."
            kd_barang, nm_barang, harga_barang, id_produk, satuan, jml_stok             
            FROM a_barang
            WHERE 1=1 ".$searchQuery." and kd_barang NOT IN (
                SELECT TOP ".$baris." kd_barang FROM a_barang 
                WHERE 1=1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
            order by ".$columnName." ".$columnSortOrder);
            return $query->result();
        }
    }

?>