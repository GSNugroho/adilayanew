<?php 
    class RnD extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_rnd');
            $this->load->model('M_finance');
            $this->load->library('form_validation');
            $this->load->helper(array('url', 'file', 'form'));
        }

        public function index(){
            $this->load->view('rnd/rnd');
        }

        public function anggaran(){
            $this->load->view('rnd/anggaran');
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
            if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
                $searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
                $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
                $searchQuery .= " and (dt_create BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
            }
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_brand like '%".$searchValue."%' ) ";
            }

            ## Total number of records without filtering
            $sel = $this->M_rnd->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            

            ## Total number of record with filtering
            $sel = $this->M_rnd->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            

            ## Fetch records
            $empQuery = $this->M_rnd->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();

            foreach($empRecords as $row){

                $action = '<button value="'.$row->kd_brand.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#infoModal" data-whatever="'.$row->kd_brand.'">Info</button>
                <button value="'.$row->kd_brand.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#editModal" data-whatever="'.$row->kd_brand.'" data-keyboard="false" data-backdrop="static">Edit</button>
                <button type="button" class="btn btn-white">Hapus</button>
                ';

                $booth = '<button value="'.$row->kd_brand.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#boothModal" data-whatever="'.$row->kd_brand.'">
                Foto Booth
                </button>';
                $stiker = '<button value="'.$row->kd_brand.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#stikerModal" data-whatever="'.$row->kd_brand.'">
                Foto Stiker
                </button>';
                $kemasan = '<button value="'.$row->kd_brand.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#kemasanModal" data-whatever="'.$row->kd_brand.'">
                Foto Stiker
                </button>';
            
            $data[] = array( 
                // "kd_inv"=>$row->kd_inv,
                "nm_brand"=>$row->nm_brand,
                "pro_brand"=>$row->pro_brand,
                // "perkap_ket"=>$row->perkap_ket,
                // "bb_ket"=>$row->bb_ket,
                "bulan"=>date('M Y', strtotime($row->dt_create)),
                // "url_ins"=>$row->url_ins,
                "deadline"=>date('d-m-y', strtotime($row->deadline)),
                "status"=>$kemasan,
                "action"=>$action,
                // "action"=>$button
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

        function create_action(){
            $aktif = 1;
            $data = array(
                'kd_brand' => $this->kd_brand(),
                'nm_brand' => $this->input->post('nm_brand', TRUE),
                'pro_brand' => $this->input->post('pro_brand', TRUE),
                'perkap_ket' => $this->input->post('perkap_ket', TRUE),
                'bb_ket' => $this->input->post('bb_ket', TRUE),
                'url_ins' => $this->input->post('url_ins', TRUE),
                'url_web' => $this->input->post('url_web', TRUE),
                'url_gd' => $this->input->post('url_gd', TRUE),
                'med_iklan' => $this->input->post('med_iklan', TRUE),
                'dt_create' => date('Y-m-d'),
                'dt_aktif' => $aktif
            );
            $this->M_rnd->insert_rnd($data);
        }

        function proses_upload(){
            if($this->input->post('token_foto') == 'booth'){
                $config['upload_path'] = FCPATH.'/upload/Booth';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "nm_foto" => $this->upload->data('file_name'),
                        "kd_foto" => $this->kd_foto_booth(),
                        "id_rnd" => $this->kd_foto_rnd()
                    );
                    $this->M_rnd->insert_booth($data);
                }
            }else if($this->input->post('token_foto') == 'stiker'){
                $config['upload_path'] = FCPATH.'/upload/Stiker';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "nm_foto" => $this->upload->data('file_name'),
                        "kd_foto" => $this->kd_foto_stiker(),
                        "id_rnd" => $this->kd_foto_rnd()
                    );
                    $this->M_rnd->insert_stiker($data);
                }
            }else if($this->input->post('token_foto') == 'kemasan'){
                $config['upload_path'] = FCPATH.'/upload/Kemasan';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "nm_foto" => $this->upload->data('file_name'),
                        "kd_foto" => $this->kd_foto_kemasan(),
                        "id_rnd" => $this->kd_foto_rnd()
                    );
                    $this->M_rnd->insert_kemasan($data);
                }
            }else if($this->input->post('token_foto') == 'perkap'){
                $config['upload_path'] = FCPATH.'/upload/Perlengkapan';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "nm_foto" => $this->upload->data('file_name'),
                        "kd_foto" => $this->kd_foto_perkap(),
                        "id_rnd" => $this->kd_foto_rnd()
                    );
                    $this->M_rnd->insert_perkap($data);
                }
            }else if($this->input->post('token_foto') == 'bb'){
                $config['upload_path'] = FCPATH.'/upload/Bahan_baku';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $data = array(
                        "nm_foto" => $this->upload->data('file_name'),
                        "kd_foto" => $this->kd_foto_bb(),
                        "id_rnd" => $this->kd_foto_rnd()
                    );
                    $this->M_rnd->insert_bb($data);
                }
            }
        }

        function kd_foto_booth(){
            $kode = $this->M_rnd->get_kode_booth();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 2, 6);
            $noUrut++;
            $char = "FB";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }
        function kd_foto_stiker(){
            $kode = $this->M_rnd->get_kode_stiker();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 2, 6);
            $noUrut++;
            $char = "FS";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }
        function kd_foto_kemasan(){
            $kode = $this->M_rnd->get_kode_kemasan();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 2, 6);
            $noUrut++;
            $char = "FK";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }
        function kd_foto_perkap(){
            $kode = $this->M_rnd->get_kode_perkap();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 2, 6);
            $noUrut++;
            $char = "FP";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }
        function kd_foto_bb(){
            $kode = $this->M_rnd->get_kode_bb();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 2, 6);
            $noUrut++;
            $char = "FH";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }

        function kd_foto_rnd(){
            $kode = $this->M_rnd->get_foto_rnd();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodebaru = $data;
            return $kodebaru;
        }

        function kd_brand(){
            $kode = $this->M_rnd->get_kode_brand();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 2, 6);
            $noUrut++;
            $char = "BR";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }

        function get_foto_booth(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_booth($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                <div class="gallery">
                    <a target="_blank" href="'.sprintf("upload/Booth/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Booth/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="400" height="200">
                    </a>
                </div>
                ';
            }
            echo $html;
        }

        function get_ed_foto_booth(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_booth($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                    <a target="_blank" href="'.sprintf("upload/Booth/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Booth/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="120" height="120">
                    </a>
                ';
            }
            echo $html;
        }

        function get_foto_stiker(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_stiker($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                <div class="gallery">
                    <a target="_blank" href="'.sprintf("upload/Stiker/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Stiker/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="400" height="200">
                    </a>
                </div>
                ';
            }
            echo $html;
        }

        function get_ed_foto_stiker(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_stiker($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                    <a target="_blank" href="'.sprintf("upload/Stiker/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Stiker/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="120" height="120">
                    </a>
                ';
            }
            echo $html;
        }

        function get_foto_kemasan(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_kemasan($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                <div class="gallery">
                    <a target="_blank" href="'.sprintf("upload/Kemasan/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Kemasan/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="400" height="200">
                    </a>
                </div>
                ';
            }
            echo $html;
        }

        function get_ed_foto_kemasan(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_kemasan($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                    <a target="_blank" href="'.sprintf("upload/Kemasan/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Kemasan/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="120" height="120">
                    </a>
                ';
            }
            echo $html;
        }

        function get_foto_perkap(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_perkap($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                <div class="gallery">
                    <a target="_blank" href="'.sprintf("upload/Perlengkapan/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Perlengkapan/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="400" height="200">
                    </a>
                </div>
                ';
            }
            echo $html;
        }

        function get_ed_foto_perkap(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_perkap($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                    <a target="_blank" href="'.sprintf("upload/Perlengkapan/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Perlengkapan/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="120" height="120">
                    </a>
                ';
            }
            echo $html;
        }

        function get_foto_bb(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_bb($id);
            $html = '';
            foreach($data as $row){
                $html .= '
                <div class="gallery">
                    <a target="_blank" href="'.sprintf("upload/Bahan_baku/%s", $row->nm_foto).'">
                        <img src="'.sprintf("upload/Bahan_baku/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="400" height="200">
                    </a>
                </div>
                ';
            }
            echo $html;
        }

        function get_ed_foto_bb(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_foto_bb($id);
            $html = '';
            if($data){
                foreach($data as $row){
                    $html .= '
                        <a target="_blank" href="'.sprintf("upload/Bahan_baku/%s", $row->nm_foto).'">
                            <img src="'.sprintf("upload/Bahan_baku/%s", $row->nm_foto).'" alt="'.$row->nm_foto.'" width="120" height="120">
                        </a>
                    ';
                }
            }else{
                $html .= 'Kosong';
            }
            
            echo $html;
        }

        function get_info_brand(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_info_brand($id);
            echo json_encode($data); 
            exit();
        }

        function get_edit_brand(){
            $id = $this->input->get('id');
            $data = $this->M_rnd->get_info_brand($id);
            echo json_encode($data); 
            exit();
        }

        function remove_foto(){
            $token = $this->input->post('token');
            $foto = $this->db->get_where('foto', array('token'=>$token));

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
            
                $searchQuery .= "AND nm_jns LIKE '%R&D%' ";
            
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