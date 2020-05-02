<?php
    class Desain extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_desain');
            $this->load->model('M_finance');
            $this->load->model('M_rnd');
            $this->load->library('form_validation');
            $this->load->helper(array('url', 'file', 'form'));
        }
         public function index(){
             $data = array(
                'dt_tgl' => $this->dt_tgl(),
                'dt_pro' => $this->M_desain->get_produk()
             );
             $this->load->view('desain/desain', $data);
         }

         public function tim_sosmed(){
            $this->load->view('desain/tim_sosmed');
         }

         
        public function anggaran(){
            $this->load->view('desain/anggaran');
        }

        function simpanAnggaran(){
            $data = array(
                'nm_anggaran' => $this->input->post('jns_pengeluaran', TRUE),
                'ket_anggaran' => $this->input->post('ket_pengeluaran', TRUE),
                'jns_pembayaran' => $this->input->post('jns_pembayaran', TRUE),
                'jml_anggaran' => $this->input->post('jml_pengeluaran', TRUE),
                'kd_anggaran' => $this->get_kode(),
                'dt_status' => 0,
                'dt_create' => date('Y-m-d'),
                'dt_aktif' => 1
            );
            $this->M_rnd->insert_anggaran($data);
        }

        function get_kode(){
            $kode = $this->M_rnd->get_kode_anggaran();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 3, 6);
            $noUrut++;
            $char = "AG";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }

         function dt_tgl(){
            $list=array();
            $month = date('m');
            $year = date('Y');
            
            for($d=1; $d<=31; $d++)
            {
                $time=mktime(12, 0, 0, $month, $d, $year);          
                if (date('m', $time)==$month)       
                $list[]=date('D d-M-Y', $time);
            }

            return $list;
         }

         function create_action(){
             $aktif = 1;
             $data = array(
                 'kd_medsos' => $this->kode_medsos(),
                 'nm_medsos' => $this->input->post('nm_medsos', TRUE),
                 'tgl_medsos' => date('Y-m-d', strtotime($this->input->post('tgl_medsos', TRUE))),
                 'pro_medsos' => $this->input->post('pro_medsos', TRUE),
                 'dt_create' => date('Y-m-d'),
                 'dt_aktif' => $aktif
             );
             $this->M_desain->insert($data);
         }

         function kode_medsos(){
            $kode = $this->M_desain->get_kode_medsos();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 2, 6);
            $noUrut++;
            $char = "MS";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
         }

         function proses_upload(){
            if($this->input->post('token_foto') == 'konsep'){
                $config['upload_path'] = FCPATH.'/upload/Konsep_medsos';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "konsep_medsos" => $this->upload->data('file_name')
                    );
                    $id = $this->kd_desain_fo();
                    $this->M_desain->up_foto($id, $data);
                }
            }else if($this->input->post('token_foto') == 'hasil'){
                $config['upload_path'] = FCPATH.'/upload/Hasil_medsos';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "hasil_medsos" => $this->upload->data('file_name')
                    );
                    $id = $this->kd_desain_fo();
                    $this->M_desain->up_foto($id, $data);
                }
            }
        }

         function proses_ed_upload(){
            $kd = $this->input->post('token_foto', TRUE);
            $pecah = explode(",", $kd);
            if($pecah[0] == 'konsep'){
                $config['upload_path'] = FCPATH.'/upload/Konsep_medsos';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "konsep_medsos" => $this->upload->data('file_name')
                    );
                    $id = $pecah[1];
                    $this->M_desain->up_foto($id, $data);
                }
            }else if($pecah[0] == 'hasil'){
                $config['upload_path'] = FCPATH.'/upload/Hasil_medsos';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "hasil_medsos" => $this->upload->data('file_name')
                    );
                    $id = $pecah[1];
                    $this->M_desain->up_foto($id, $data);
                }
            }
        }

        function kd_desain_fo(){
            $kode = $this->M_desain->get_kode_medsos();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodebaru = $data;
            return $kodebaru;
        }

        function edit_medsos(){
            $id = $this->input->get('id');
            $data = $this->M_desain->get_data_medsos($id);
            echo json_encode($data);
            exit();
        }

        function get_ed_foto_konsep(){
            $id = $this->input->get('id');
            $data = $this->M_desain->get_data_medsos($id);
            $html = '';
            if($data){
                foreach($data as $row){
                    $html .= '
                        <a target="_blank" href="'.sprintf("upload/Konsep_medsos/%s", $row->konsep_medsos).'">
                            <img src="'.sprintf("upload/Konsep_medsos/%s", $row->konsep_medsos).'" alt="'.$row->konsep_medsos.'" width="120" height="120">
                        </a>
                    ';
                }
            }else{
                $html .= 'Kosong';
            }
            
            echo $html;
        }

        function get_ed_foto_hasil(){
            $id = $this->input->get('id');
            $data = $this->M_desain->get_data_medsos($id);
            $html = '';
            if($data){
                foreach($data as $row){
                    $html .= '
                        <a target="_blank" href="'.sprintf("upload/Hasil_medsos/%s", $row->hasil_medsos).'">
                            <img src="'.sprintf("upload/Hasil_medsos/%s", $row->hasil_medsos).'" alt="'.$row->hasil_medsos.'" width="120" height="120">
                        </a>
                    ';
                }
            }else{
                $html .= 'Kosong';
            }
            
            echo $html;
        }

        function dt_tbl(){
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
            $tanggal = $this->input->post('id_tgl', TRUE);
            $bulan = date('m');
            
            $searchQuery .= "AND DAY(tgl_medsos) = '$tanggal' AND MONTH(tgl_medsos) = '$bulan' ";

            // if($searchValue != ''){
            // $searchQuery .= " and (
            // nm_mitra like '%".$searchValue."%' or  
            // ats_nm_rekening like '%".$searchValue."%' ) ";
            // }

            ## Total number of records without filtering
            $sel = $this->M_desain->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            

            ## Total number of record with filtering
            $sel = $this->M_desain->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            

            ## Fetch records
            $empQuery = $this->M_desain->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();

            foreach($empRecords as $row){
            
            $konsep = '<img src="'.sprintf("upload/Konsep_medsos/%s", $row->konsep_medsos).'" alt="'.$row->konsep_medsos.'" width="100" height="100">';
            $hasil = '<img src="'.sprintf("upload/Hasil_medsos/%s", $row->hasil_medsos).'" alt="'.$row->hasil_medsos.'" width="100" height="100">';
            $edit = '<button value="'.$row->kd_medsos.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#editMedsos" data-whatever="'.$row->kd_medsos.'" data-keyboard="false" data-backdrop="static">Edit</button>';

            $data[] = array( 
                // "kd_inv"=>$row->kd_inv,
                "nm_medsos"=>$row->nm_medsos,
                "tgl_medsos"=>date('d-m-Y', strtotime($row->tgl_medsos)),
                "pro_medsos"=>$row->nm_produk,
                "konsep_medsos"=>$konsep,
                "hasil_medsos"=>$hasil,
                "action"=>$edit
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

        function dt_tim(){
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
            $nm_tim = $this->input->post('nm_tim', TRUE);
            $tgl_tim = $this->input->post('tgl_tim', TRUE);
            $month = substr($tgl_tim, 0, 2);
            $year = substr($tgl_tim, 3, 4);
            if($nm_tim != ''){
                $searchQuery .= "AND nm_medsos = '$nm_tim' AND MONTH(tgl_medsos) = '$month'  AND YEAR(tgl_medsos) = '$year' ";
            }else{
                $searchQuery .= "AND nm_medsos = '' AND MONTH(tgl_medsos) = ''  AND YEAR(tgl_medsos) = '' ";
            }
            

            // if($searchValue != ''){
            // $searchQuery .= " and (
            // nm_mitra like '%".$searchValue."%' or  
            // ats_nm_rekening like '%".$searchValue."%' ) ";
            // }

            ## Total number of records without filtering
            $sel = $this->M_desain->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            

            ## Total number of record with filtering
            $sel = $this->M_desain->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            

            ## Fetch records
            $empQuery = $this->M_desain->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();

            foreach($empRecords as $row){
            
            $konsep = '<img src="'.sprintf("../upload/Konsep_medsos/%s", $row->konsep_medsos).'" alt="'.$row->konsep_medsos.'" width="100" height="100">';
            $hasil = '<img src="'.sprintf("../upload/Hasil_medsos/%s", $row->hasil_medsos).'" alt="'.$row->hasil_medsos.'" width="100" height="100">';
            $edit = '<button value="'.$row->kd_medsos.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#editMedsos" data-whatever="'.$row->kd_medsos.'" data-keyboard="false" data-backdrop="static">Edit</button>';

            $data[] = array( 
                "pro_medsos"=>$row->nm_produk,
                "tgl_medsos"=>date('d-m-Y', strtotime($row->tgl_medsos)),
                "konsep_medsos"=>$konsep,
                "hasil_medsos"=>$hasil,
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
            $nm_anggaran = $this->input->post('in_nm_pengajuan', TRUE);
            
                $searchQuery .= "AND nm_jns LIKE '%medsos%' ";
            
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
                <button value="'.$row->kd_anggaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_anggaran.'" data-keyboard="false" data-backdrop="static">
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
    }
?>