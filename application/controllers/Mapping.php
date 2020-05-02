<?php
    class Mapping extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_mapping');
            $this->load->model('M_monitor');
            $this->load->library('form_validation');
            $this->load->helper('form');
        }

        public function index(){
            $data = array(
                'dd_bg' => $this->M_monitor->get_barang(),
                'dd_ek' => $this->M_monitor->get_ekspedisi(),
                'dd_temp' => $this->M_monitor->get_temp(),
                'dd_pr' => $this->M_monitor->get_provinsi(),
                'dd_pro' => $this->M_monitor->get_produk()
            );
            $this->load->view('mapping/mapping', $data);
        }

        function dt_mt_hri(){
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
            $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            //  $searchQuery .= " and sts_pmby = '1'";
            if($searchValue != ''){
            $searchQuery .= " and (
            nm_mitra like '%".$searchValue."%' or  
            ats_nm_rekening like '%".$searchValue."%' ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_monitor->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_monitor->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                    if($row->sts_pmby == 1 || $row->sts_pmby == 3){
                        $button = '
                        <a href="Mapping/read/'.$row->kd_mitra.'" class="btn btn-light">
                        <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                        </a>
                        <button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#modalPelunasan" data-backdrop="static" data-keyboard="false" data-whatever="'.$row->kd_mitra.'">
                        <i class="fa fa-credit-card"></i>
                        </button>
                        ';
                    }else{
                        $button = '
                        <a href="Mapping/read/'.$row->kd_mitra.'" class="btn btn-light">
                        <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                        </a>
                        ';
                    }

                if($row->dt_pelunasan == null){
                    $pel = '-';
                }else{
                    $pel = date('d-m-Y', strtotime($row->dt_pelunasan));
                }
    
                if($row->sts_pmby == 1){
                    $sts = 'DP';
                }else if($row->sts_pmby == 2){
                    $sts = 'Lunas';
                }else if($row->sts_pmby == 3){
                    $sts = 'Cicilan';
                }
                // onclick="load(this.value)"
            $data[] = array( 
                // "kd_inv"=>$row->kd_inv,
                "nm_mitra"=>$row->nm_mitra,
                "dt_create"=>date('d-m-Y', strtotime($row->dt_create)),
                "dt_pelunasan"=>$pel,
                "sts_pmby"=>$sts,
                "almt_kt_rmh"=>$row->nama_kota,
                "paket"=>$row->nm_paket,
                "action"=>$button
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
    
        function dt_dp(){
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
             $searchQuery .= " and sts_pmby = '1'";
            if($searchValue != ''){
            $searchQuery .= " and (
            nm_mitra like '%".$searchValue."%' or  
            ats_nm_rekening like '%".$searchValue."%' ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_monitor->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_monitor->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
            
                
                
                    $button = '
                    <button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
                    <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                    </button>
                    <button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#modalPelunasan" data-keyboard="false" data-whatever="'.$row->kd_mitra.'">
                    <img src="'.base_url('assets/icon/credit-card.png').'" width="18" height="18">
                    </button>
                    ';

                    if($row->sts_vakum == 1){
                        $button .= '
                        <a href="Mapping/vakum/'.$row->kd_mitra.'" class="btn btn-light">
                        <i class="fa fa-heart" title="Off/ Vakum"></i>
                        </a>
                        ';
                    }else{
                        $button .= '
                        <a href="Mapping/vakum/'.$row->kd_mitra.'" class="btn btn-light">
                        <i class="fa fa-heart-o" title="On"></i>
                        </a>
                        ';
                    }

                    if($row->sts_pmby == 1){
                        $sts = 'DP';
                    }else if($row->sts_pmby == 2){
                        $sts = 'Lunas';
                    }else if($row->sts_pmby == 3){
                        $sts = 'Cicilan';
                    }
                if($row->dt_pelunasan == null){
                    $pel = '-';
                }else{
                    $pel = date('d-m-Y', strtotime($row->dt_pelunasan));
                }
                // onclick="load(this.value)"
            $data[] = array( 
                // "kd_inv"=>$row->kd_inv,
                "nm_mitra"=>$row->nm_mitra,
                "dt_create"=>date('d-m-Y', strtotime($row->dt_create)),
                "dt_pelunasan"=>$pel,
                "sts_pmby"=>$sts,
                "almt_kt_rmh"=>$row->nama_kota,
                "paket"=>$row->nm_paket,
                "action"=>$button
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

        function dt_cc(){
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
             $searchQuery .= " and sts_pmby = '3'";
            if($searchValue != ''){
            $searchQuery .= " and (
            nm_mitra like '%".$searchValue."%' or  
            ats_nm_rekening like '%".$searchValue."%' ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_monitor->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_monitor->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
            
                    $button = '
                    <button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
                    <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                    </button>
                    <button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#modalPelunasan" data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >
                    <img src="'.base_url('assets/icon/credit-card.png').'" width="18" height="18">
                    </button>
                    ';

                    if($row->sts_vakum == 1){
                        $button .= '
                        <a href="Mapping/vakum/'.$row->kd_mitra.'" class="btn btn-light">
                        <i class="fa fa-heart" title="Off/ Vakum"></i>
                        </a>
                        ';
                    }else{
                        $button .= '
                        <a href="Mapping/vakum/'.$row->kd_mitra.'" class="btn btn-light">
                        <i class="fa fa-heart-o" title="On"></i>
                        </a>
                        ';
                    }

                    if($row->sts_pmby == 1){
                        $sts = 'DP';
                    }else if($row->sts_pmby == 2){
                        $sts = 'Lunas';
                    }else if($row->sts_pmby == 3){
                        $sts = 'Cicilan';
                    }
                if($row->dt_pelunasan == null){
                    $pel = '-';
                }else{
                    $pel = date('d-m-Y', strtotime($row->dt_pelunasan));
                }
                // onclick="load(this.value)"
            $data[] = array( 
                // "kd_inv"=>$row->kd_inv,
                "nm_mitra"=>$row->nm_mitra,
                "dt_create"=>date('d-m-Y', strtotime($row->dt_create)),
                "dt_pelunasan"=>$pel,
                "sts_pmby"=>$sts,
                "almt_kt_rmh"=>$row->nama_kota,
                "paket"=>$row->nm_paket,
                "action"=>$button
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
    
        function dt_lunas(){
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
             $searchQuery .= " and sts_pmby = '2'";
            if($searchValue != ''){
            $searchQuery .= " and (
            nm_mitra like '%".$searchValue."%' or  
            ats_nm_rekening like '%".$searchValue."%' ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_monitor->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_monitor->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
            
                    $button = '
                    <button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
                    <img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
                    </button>
                    
                    ';

                    if($row->sts_vakum == 1){
                        $button .= '
                        <a href="Mapping/vakum/'.$row->kd_mitra.'" class="btn btn-light">
                        <i class="fa fa-heart" title="Off/ Vakum"></i>
                        </a>
                        ';
                    }else{
                        $button .= '
                        <a href="Mapping/vakum/'.$row->kd_mitra.'" class="btn btn-light">
                        <i class="fa fa-heart-o" title="On"></i>
                        </a>
                        ';
                    }

                    if($row->sts_pmby == 1){
                        $sts = 'DP';
                    }else if($row->sts_pmby == 2){
                        $sts = 'Lunas';
                    }else if($row->sts_pmby == 3){
                        $sts = 'Cicilan';
                    }
                if($row->dt_pelunasan == null){
                    $pel = '-';
                }else{
                    $pel = date('d-m-Y', strtotime($row->dt_pelunasan));
                }
                // onclick="load(this.value)"
            $data[] = array( 
                // "kd_inv"=>$row->kd_inv,
                "nm_mitra"=>$row->nm_mitra,
                "dt_create"=>date('d-m-Y', strtotime($row->dt_create)),
                "dt_pelunasan"=>$pel,
                "sts_pmby"=>$sts,
                "almt_kt_rmh"=>$row->nama_kota,
                "paket"=>$row->nm_paket,
                "action"=>$button
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

        function update_byr(){
            $kode = $this->input->post('pembayaran', true);
            if($this->input->post('sts_pmby', true) == 4){
                    $sts_byr = 2;
                    $data = array(
                        'nm_produk' => $this->input->post('nm_produk', TRUE),
                        'paket' => $this->input->post('paket', TRUE),
                        'ekspedisi' => $this->input->post('ekspedisi', TRUE),
                        'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
                        'almt_rmh' => $this->input->post('almt_rmh', TRUE),
                        'almt_prov_rmh' => $this->input->post('almt_prov_rmh', TRUE),
                        'almt_kt_rmh' => $this->input->post('almt_kt_rmh', TRUE),
                        'almt_kec_rmh' => $this->input->post('almt_kec_rmh', TRUE),
                        'almt_kel_rmh' => $this->input->post('almt_kel_rmh', TRUE),
                        'almt_outlet' => $this->input->post('almt_outlet', TRUE),
                        'almt_prov_outlet' => $this->input->post('almt_prov_outlet', TRUE),
                        'almt_kt_outlet' => $this->input->post('almt_kt_outlet', TRUE),
                        'almt_kec_outlet' => $this->input->post('almt_kec_outlet', TRUE),
                        'almt_kel_outlet' => $this->input->post('almt_kel_outlet', TRUE),
                        'almt_kirim' => $this->input->post('almt_kirim', TRUE),
                        'almt_prov_kirim' => $this->input->post('almt_prov_kirim', TRUE),
                        'almt_kt_kirim' => $this->input->post('almt_kt_kirim', TRUE),
                        'almt_kec_kirim' => $this->input->post('almt_kec_kirim', TRUE),
                        'almt_kel_kirim' => $this->input->post('almt_kel_kirim', TRUE),
                        'sts_pmby' => $sts_byr,
                        'dt_pelunasan' => date('Y-m-d')
                    );
                
            }else{
                $data = array(
                    'sts_pmby' => $this->input->post('sts_pmby', true),
                    'nm_produk' => $this->input->post('nm_produk', TRUE),
                    'paket' => $this->input->post('paket', TRUE),
                    'ekspedisi' => $this->input->post('ekspedisi', TRUE),
                    'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
                    'almt_rmh' => $this->input->post('almt_rmh', TRUE),
                    'almt_prov_rmh' => $this->input->post('almt_prov_rmh', TRUE),
                    'almt_kt_rmh' => $this->input->post('almt_kt_rmh', TRUE),
                    'almt_kec_rmh' => $this->input->post('almt_kec_rmh', TRUE),
                    'almt_kel_rmh' => $this->input->post('almt_kel_rmh', TRUE),
                    'almt_outlet' => $this->input->post('almt_outlet', TRUE),
                    'almt_prov_outlet' => $this->input->post('almt_prov_outlet', TRUE),
                    'almt_kt_outlet' => $this->input->post('almt_kt_outlet', TRUE),
                    'almt_kec_outlet' => $this->input->post('almt_kec_outlet', TRUE),
                    'almt_kel_outlet' => $this->input->post('almt_kel_outlet', TRUE),
                    'almt_kirim' => $this->input->post('almt_kirim', TRUE),
                    'almt_prov_kirim' => $this->input->post('almt_prov_kirim', TRUE),
                    'almt_kt_kirim' => $this->input->post('almt_kt_kirim', TRUE),
                    'almt_kec_kirim' => $this->input->post('almt_kec_kirim', TRUE),
                    'almt_kel_kirim' => $this->input->post('almt_kel_kirim', TRUE),
                );
            }
    
            if($this->input->post('cek_tmbb', true) == 'tambah'){
                date_default_timezone_set("Asia/Jakarta");
                $notif = array(
                    "notif_subject" => 'Tambah Bahan Baku',
                    "notif_text" => '+ '.$this->input->post('nm_tb', true),
                    "notif_status" => 0,
                    "notif_date" => date('Y-m-d H:i:s'),
                    "notif_nm_mitra" => 'Mitra '.$this->input->post('nm_mitra', TRUE)
                );
                $this->M_mapping->insert_notif($notif);
            }
    
            $datapmby = array(
                'kd_pmby' => $kode,
                'jml_transfer' => $this->input->post('jml_tarif', true),
                'nm_bank' => $this->input->post('nm_bank', true),
                'no_rekening' => $this->input->post('rekening', true),
                'ats_nm' => $this->input->post('ats_nm_rekening', true),
                'dt_trans' => date('Y-m-d')
            );
            $this->M_mapping->insertpmby($datapmby);
    
            if($this->input->post('jml_tarif2', true) != ''){
                $datapmby = array(
                    'kd_pmby' => $kode,
                    'jml_transfer' => $this->input->post('jml_tarif2', true),
                    'nm_bank' => $this->input->post('nm_bank2', true),
                    'no_rekening' => $this->input->post('rekening2', true),
                    'ats_nm' => $this->input->post('ats_nm_rekening2', true),
                    'dt_trans' => date('Y-m-d')
                );
                $this->M_mapping->insertpmby($datapmby);
            }
    
            if($this->input->post('jml_tarif3', true) != ''){
                $datapmby = array(
                    'kd_pmby' => $kode,
                    'jml_transfer' => $this->input->post('jml_tarif3', true),
                    'nm_bank' => $this->input->post('nm_bank3', true),
                    'no_rekening' => $this->input->post('rekening3', true),
                    'ats_nm' => $this->input->post('ats_nm_rekening3', true),
                    'dt_trans' => date('Y-m-d')
                );
                $this->M_mapping->insertpmby($datapmby);
            }
            
            $this->M_mapping->update($this->input->post('kd_mitra'), $data);
        }

        function get_dtmt_pel(){
            $id = $this->input->get('id', TRUE);
            $row = $this->M_mapping->get_dtmt_pel($id);
    
            echo json_encode($row);
        }

        function vakum($id){
            $row = $this->M_monitor->get_by_id($id);
            if($row){
                $sts_vakum = $row->sts_vakum;
            }
            if($sts_vakum == 1){
                $data = array(
                    'sts_vakum' => 0
                );
            }else{
                $data = array(
                    'sts_vakum' => 1
                );
            }
            
            $this->M_monitor->update($id, $data);
            redirect(site_url('Mapping'));
        }
    }
?>