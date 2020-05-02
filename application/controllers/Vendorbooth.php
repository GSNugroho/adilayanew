<?php
    class Vendorbooth extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_vendorbooth');
            $this->load->library('form_validation');
			$this->load->helper('form');
        }

        public function index(){
            $data = array(
                'dd_pro' => $this->M_vendorbooth->get_produk()
            );
            $this->load->view('vendorbooth/vendorbooth', $data);
        }

        function get_data_mitra(){
            $id = $this->input->get('id', TRUE);
            $data = $this->M_vendorbooth->get_data_mitra($id);
            echo json_encode($data);
        }
    
        function dt_booth(){
            ## Read value
            $draw = $_POST['draw'];
            $baris = $_POST['start'];
            $rowperpage = $_POST['length']; // Rows display per page
            $columnIndex = $_POST['order'][0]['column']; // Column index
            $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
            $searchValue = $_POST['search']['value']; // Search value
    
            ## Search 
            $searchQuery = " ";
            $nm_produk = $this->input->post('nm_produk', TRUE);
            if($nm_produk != ''){
                $searchQuery .= "AND nm_produk = '$nm_produk' ";
            }
            if($searchValue != ''){
                $searchQuery .= " and (
                nm_mitra like '%".$searchValue."%'  ) ";
                }
    
            ## Total number of records without filtering
            $sel = $this->M_vendorbooth->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_vendorbooth->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_vendorbooth->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
            $edit = '<button value="'.$row->kd_mitra.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#cekRincian" data-whatever="'.$row->kd_mitra.'" data-keyboard="false" data-backdrop="static">
            <i class="fa fa-gear" title="Proses Barang"></i>
            </button>';
    
            $data[] = array( 
                "nm_mitra"=>$row->nm_mitra,
                "almt_kirim"=>$row->almt_kirim,
                "almt_kt_kirim"=>$row->almt_kt_kirim,
                "action"=>$edit,
                // "action"=>$edit
            );
            }
    
            ## Response
            $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
            );
    
            echo json_encode($response);
        }

        function getrincieattoast(){
            $id = $this->input->get('id', true);
            $data = $this->M_vendorbooth->getrincieattoast($id);
            echo json_encode($data);
        }

        function getrincibanana(){
            $id = $this->input->get('id', true);
            $data = $this->M_vendorbooth->getrincibanana($id);
            echo json_encode($data);
        }
    }
?>