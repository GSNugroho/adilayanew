<?php
    class Avbb extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_avbb');
            $this->load->model('M_order');
            $this->load->library('form_validation');
            $this->load->helper('form');
        }

        public function index(){
            $this->load->view('avbb/avbb');
        }

        function dt_hri(){
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
            $searchQuery .= " and DAY(dt_trans) = DAY(GETDATE()) and MONTH(dt_trans) = MONTH(GETDATE()) and YEAR(dt_trans) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
            nm_mitra like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_order->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_order->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_order->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_order.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#cekModal" data-whatever="'.$row->kd_order.'" data-keyboard="false" data-backdrop="static">
                <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                </button>
                ';
            $data[] = array( 
                "nm_mitra"=>$row->nm_mitra,
                "tgl_order"=>date('d-m-Y H:i:s', strtotime($row->dt_trans)),
                "almt_kirim"=>$row->almt_kirim,
                "kota"=>$row->nama_kota,
                "nama_brand"=>$row->nm_produk,
                "action"=>$cek
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

        function dt_sm(){
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
            if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
                $searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
                $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
                $searchQuery .= " and (dt_create BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
             }
             
            if($searchValue != ''){
            $searchQuery .= " and (
            nm_mitra like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_order->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_order->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_order->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
            
            $cek = '
            <button value="'.$row->kd_order.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#cekModal" data-whatever="'.$row->kd_order.'" data-keyboard="false" data-backdrop="static">
            <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
            </button>
            ';

            $data[] = array( 
                "nm_mitra"=>$row->nm_mitra,
                "tgl_order"=>date('d-m-Y H:i:s', strtotime($row->dt_trans)),
                "almt_kirim"=>$row->almt_kirim,
                "kota"=>$row->nama_kota,
                "nama_brand"=>$row->nm_produk,
                "action"=>$cek
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

        function get_dt_order(){
            $id = $this->input->get('id');
            $data = array(
                'dt_mitra' => $this->M_avbb->get_data_mitra($id),
                'dt_order' => $this->M_avbb->get_data_order($id)
            );
            echo json_encode($data);
            exit();
        }

        function updatekirim(){
            $data = array(
                'dt_adbb' => 1
            );
            $id = $this->input->post('kd_order', true);
            $this->M_avbb->updatekirim($id, $data);
        }

        function get_dt_stok(){
            $id = $this->input->get('id',true);
            $data = $this->M_avbb->get_dt_stok($id);
            echo json_encode($data);
        }
    }
?>