<?php
    class Vendorbb extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_vendorbb');
            $this->load->model('M_avbb');
            $this->load->model('M_order');
            $this->load->library('form_validation');
			$this->load->helper('form');
        }

        public function index(){
            $this->load->view('vendorbb/vendorbb');
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
            $searchQuery .= " AND adilaya_dt_mitra_order.dt_adbb = 1";
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
            $searchQuery .= " AND adilaya_dt_mitra_order.dt_adbb = 1";
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

        
    function printinvoice(){
        $id = $this->input->post('kdp_order', TRUE);
        $data = array(
            'dt_mitra' => $this->M_avbb->get_data_mitra($id),
            'dt_order' => $this->M_avbb->get_data_order($id)
        );
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold; background-color: red; height: 100px; margin-left: -100px; margin-right: -100px; margin-top: -100px">
    My document
</div>');
        $html = $this->load->view('html_to_pdf',$data, true);
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function stok(){
        $data = array(
            'dd_pro' => $this->M_vendorbb->get_produk()
        );
        $this->load->view('vendorbb/stokbb', $data);
    }

    function dt_stok(){
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
            $searchQuery .= "AND id_produk = '$nm_produk' ";
        }
        if($searchValue != ''){
            $searchQuery .= " and (
            nm_barang like '%".$searchValue."%'  ) ";
            }

        ## Total number of records without filtering
        $sel = $this->M_vendorbb->get_total_dt();
        // $records = sqlsrv_fetch_array($sel);
        foreach($sel as $row){
            $totalRecords = $row->allcount;
        }
        

        ## Total number of record with filtering
        $sel = $this->M_vendorbb->get_total_fl($searchQuery);
        // $records = sqlsrv_fetch_assoc($sel);
        foreach($sel as $row){
            $totalRecordwithFilter = $row->allcount;
        }
        

        ## Fetch records
        $empQuery = $this->M_vendorbb->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
        $empRecords = $empQuery;
        $data = array();

        foreach($empRecords as $row){
        $edit = '<button value="'.$row->kd_barang.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#editStok" data-whatever="'.$row->kd_barang.'" data-keyboard="false" data-backdrop="static">
        <img src="'.base_url('assets/icon/pencil-512.png').'" width="18" height="18">
        </button>';

        $data[] = array( 
            "nm_barang"=>$row->nm_barang,
            "jml_stok"=>$row->jml_stok,
            "satuan"=>$row->satuan,
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

    }
?>