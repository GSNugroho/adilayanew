<?php
    class Finance extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_finance');
            $this->load->library('form_validation');
			$this->load->helper('form');
        }

        public function index(){
            $data = array(
                'dd_jns' => $this->M_finance->jns_pengeluaran()
            );
            $this->load->view('finance/finance', $data);
        }

        public function anggaran(){
            $data = array(
                'dd_jns' => $this->M_finance->jns_pengeluaran()
            );
            $this->load->view('finance/anggaran', $data);
        }

        function simpanPengeluaran(){
            $data = array(
                'jns_pengeluaran' => $this->input->post('jns_pengeluaran', TRUE),
                'ket_pengeluaran' => $this->input->post('ket_pengeluaran', TRUE),
                'jns_pembayaran' => $this->input->post('jns_pembayaran', TRUE),
                'jml_pengeluaran' => $this->input->post('jml_pengeluaran', TRUE),
                'kd_pengeluaran' => $this->get_kode(),
                'dt_create' => date('Y-m-d'),
                'dt_aktif' => 1
            );
            $this->M_finance->insert_pengeluaran($data);
        }

        function get_kode(){
            $kode = $this->M_finance->get_kode_pengeluaran();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 3, 6);
            $noUrut++;
            $char = "PB";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }

        function get_data_pengeluaran(){
            $id = $this->input->get('id', TRUE);
            $data = $this->M_finance->get_dt_pengeluaran($id);
            echo json_encode($data);
        }

        function trans_hri(){
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
            $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 0";
            $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_pengeluaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_pengeluaran.'" data-keyboard="false" data-backdrop="static">
                <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                </button>
                ';
            $data[] = array( 
                "jns_pengeluaran"=>$row->nm_jns,
                "ket_pengeluaran"=>$row->ket_pengeluaran,
                "jml_pengeluaran"=>$row->jml_pengeluaran,
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

        function tunai_hri(){
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
            $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 1";
            $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_pengeluaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_pengeluaran.'" data-keyboard="false" data-backdrop="static">
                <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                </button>
                ';
            $data[] = array( 
                "jns_pengeluaran"=>$row->nm_jns,
                "ket_pengeluaran"=>$row->ket_pengeluaran,
                "jml_pengeluaran"=>$row->jml_pengeluaran,
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

        function trans_sm(){
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
            $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 0";
            // $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_pengeluaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_pengeluaran.'" data-keyboard="false" data-backdrop="static">
                <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                </button>
                ';
            $data[] = array( 
                "jns_pengeluaran"=>$row->nm_jns,
                "ket_pengeluaran"=>$row->ket_pengeluaran,
                "jml_pengeluaran"=>$row->jml_pengeluaran,
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

        function tunai_sm(){
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
            $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 1";
            // $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_pengeluaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_pengeluaran.'" data-keyboard="false" data-backdrop="static">
                <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                </button>
                ';
            $data[] = array( 
                "jns_pengeluaran"=>$row->nm_jns,
                "ket_pengeluaran"=>$row->ket_pengeluaran,
                "jml_pengeluaran"=>$row->jml_pengeluaran,
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

        function dt_anggaran(){
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
            $nm_anggaran = $this->input->post('nm_anggaran', TRUE);
            if($nm_anggaran != ''){
                $searchQuery .= "AND nm_anggaran = '$nm_anggaran' ";
            }else{
                $searchQuery .= "AND nm_anggaran = '' ";
            }
            // $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 1";
            // $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dta();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fla($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_fta($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_anggaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#inputValidasi" data-whatever="'.$row->kd_anggaran.'" data-keyboard="false" data-backdrop="static">
                <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                </button>
                ';
                if($row->dt_status == 0){
                    $status = '<p style="color:red;"><i>Not Approved</i></p>';
                }else if($row->dt_status == 1){
                    $status = '<p style="color:green;"><i>Approved</i></p>';
                }else if($row->dt_status == 2){
                    $status = '<p style="color:red;"><i>Not Approved</i></p>';
                }
            $data[] = array( 
                "nm_anggaran"=>$row->nm_jns,
                "dt_create"=>date('d-m-Y', strtotime($row->dt_create)),
                "ket_anggaran"=>$row->ket_anggaran,
                "jml_anggaran"=>$row->jml_anggaran,
                "sts_anggaran"=>$status,
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

        function get_dt_pengajuan(){
            $id = $this->input->get('id', TRUE);
            $data = $this->M_finance->get_dt_pengajuan($id);
            echo json_encode($data);
        }

        function anggaranok(){
            $id = $this->input->post('id', TRUE);
            $status = 1;
            $data = array(
                'dt_status' => $status
            );

            $get_anggaran = $this->M_finance->get_dt_anggaranp($id);
            if($get_anggaran){
                $data_anggaran = array(
                    'kd_pengeluaran' => $this->get_kode(),
                    'jns_pengeluaran' => $get_anggaran->nm_anggaran,
                    'ket_pengeluaran' => $get_anggaran->ket_anggaran,
                    'jml_pengeluaran' => $get_anggaran->jml_anggaran,
                    'dt_create' => date('Y-m-d'),
                    'dt_aktif' => 1,
                    'jns_pembayaran' => $get_anggaran->jns_pembayaran
                );
            }

            $this->M_finance->anggaranout($id, $data, $data_anggaran);
        }

        function anggaranno(){
            $id = $this->input->post('id', TRUE);
            $status = 2;
            $data = array(
                'dt_status' => $status
            );

            $this->M_finance->anggaranno($id, $data);
        }
    }
?>