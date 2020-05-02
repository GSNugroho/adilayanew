<?php
    class Avbooth extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_avbooth');
            $this->load->model('M_monitor');
            $this->load->library('form_validation');
            $this->load->helper(array('url', 'file', 'form'));
        }

        public function index(){
            $this->load->view('avbooth/avbooth');
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

             $searchQuery .= " and sts_pmby = 2  ";
            if($searchValue != ''){
            $searchQuery .= " and (
            nm_mitra like '%".$searchValue."%' ) ";
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
            
            
            $button = '<button value="'.$row->kd_mitra.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#rinciVendor" data-whatever="'.$row->kd_mitra.'" data-keyboard="false" data-backdrop="static"><img src="'.base_url('assets/icon/pencil-512.png').'" width="18" height="18"></button>';

            $data[] = array( 
                
                "nm_mitra"=>$row->nm_mitra,
                "almt_kirim"=>$row->almt_kirim,
                "kota"=>$row->nama_kota,
                "nm_produk"=>$row->nm_produk,
                "paket"=>$row->nm_paket,
                "tambahan"=>$row->tambahan,
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

        function get_data_mitra(){
            $id = $this->input->get('id', TRUE);
            $data = $this->M_avbooth->get_data_mitra($id);
            echo json_encode($data);
        }

        function simpanrincian(){
            switch($this->input->post('kd_produk')){
                case "PR000001":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'booth_pallet' => $this->input->post('booth_pallet', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'sticker' => $this->input->post('sticker', TRUE),
                        'komgas' => $this->input->post('komgas', TRUE),
                        'deepgas' => $this->input->post('deepgas', TRUE),
                        'deeplis' => $this->input->post('deeplis', TRUE),
                        'sereg' => $this->input->post('sereg', TRUE),
                        'wajan' => $this->input->post('wajan', TRUE),
                        'irus' => $this->input->post('irus', TRUE),
                        'sotil' => $this->input->post('sotil', TRUE),
                        'saringan' => $this->input->post('saringan', TRUE),
                        'top_tepung' => $this->input->post('top_tepung', TRUE),
                        'top_kocok' => $this->input->post('top_kocok', TRUE),
                        'top_bumbu' => $this->input->post('top_bumbu', TRUE),
                        'bas_stain' => $this->input->post('bas_stain', TRUE),
                        'talenan' => $this->input->post('talenan', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'pencapit' => $this->input->post('pencapit', TRUE),
                        'pisau' => $this->input->post('pisau', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'kain_serbet' => $this->input->post('kain_serbet', TRUE),
                        'tusuk_tahu' => $this->input->post('tusuk_tahu', TRUE),
                        'sergam_kun' => $this->input->post('sergam_kun', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'surkon' => $this->input->post('surkon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'cel_kun' => $this->input->post('cel_kun', TRUE),
                        'lampu_set' => $this->input->post('lampu_set', TRUE),
                        'rafia_lakban' => $this->input->post('rafia_lakban', TRUE),
                        'lakban' => $this->input->post('lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_gila($data);
                    break;
                case "PR000002":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'booth_pallet' => $this->input->post('booth_pallet', TRUE),
                        'mmt_ban_atap' => $this->input->post('mmt_ban_atap', TRUE),
                        'stiker' => $this->input->post('stiker', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'deep_lis' => $this->input->post('deep_lis', TRUE),
                        'kom_gas' => $this->input->post('kom_gas', TRUE),
                        'rafia_lakban' => $this->input->post('rafia_lakban', TRUE),
                        'lakban' => $this->input->post('lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'selreg' => $this->input->post('selreg', TRUE),
                        'wajan' => $this->input->post('wajan', TRUE),
                        'irus' => $this->input->post('irus', TRUE),
                        'sotil' => $this->input->post('sotil', TRUE),
                        'saringan' => $this->input->post('saringan', TRUE),
                        'top_tep' => $this->input->post('top_tep', TRUE),
                        'bas_stain' => $this->input->post('bas_stain', TRUE),
                        'timbangan' => $this->input->post('timbangan', TRUE),
                        'bot_kaca' => $this->input->post('bot_kaca', TRUE),
                        'wad_bum' => $this->input->post('wad_bum', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'gelas_takar' => $this->input->post('gelas_takar', TRUE),
                        'pencapit' => $this->input->post('pencapit', TRUE),
                        'telenan' => $this->input->post('telenan', TRUE),
                        'pisauf' => $this->input->post('pisauf', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'tusuk_chic' => $this->input->post('tusuk_chic', TRUE),
                        'ser_mer' => $this->input->post('ser_mer', TRUE),
                        'ice_box' => $this->input->post('ice_box', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'cel_mer' => $this->input->post('cel_mer', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'lam_set' => $this->input->post('lam_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_chicken($data);
                    break;
                case "PR000003":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'booth_palet' => $this->input->post('booth_palet', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'stiker' => $this->input->post('stiker', TRUE),
                        'stiker_top' => $this->input->post('stiker_top', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'lakban' => $this->input->post('lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'kom_gas' => $this->input->post('kom_gas', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'mixer_set' => $this->input->post('mixer_set', TRUE),
                        'wajan' => $this->input->post('wajan', TRUE),
                        'sotil' => $this->input->post('sotil', TRUE),
                        'irus' => $this->input->post('irus', TRUE),
                        'saringan' => $this->input->post('saringan', TRUE),
                        'top_pis' => $this->input->post('top_pis', TRUE),
                        'top_ado' => $this->input->post('top_ado', TRUE),
                        'top_top' => $this->input->post('top_top', TRUE),
                        'top_sel' => $this->input->post('top_sel', TRUE),
                        'bot_cok' => $this->input->post('bot_cok', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'parutan' => $this->input->post('parutan', TRUE),
                        'pisau' => $this->input->post('pisau', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'sol_plas' => $this->input->post('sol_plas', TRUE),
                        'kuas' => $this->input->post('kuas', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'lamp_set' => $this->input->post('lamp_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_pisang($data);
                    break;
                case "PR000004":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'sticker_bo_set' => $this->input->post('sticker_bo_set', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'lam_set' => $this->input->post('lam_set', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'banner_atap' => $this->input->post('banner_atap', TRUE),
                        'rafia_lakban' => $this->input->post('rafia_lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'deep_lis' => $this->input->post('deep_lis', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'sek_pot_ay' => $this->input->post('sek_pot_ay', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'tiris_ayam' => $this->input->post('tiris_ayam', TRUE),
                        'gas_troch' => $this->input->post('gas_troch', TRUE),
                        'ice_box' => $this->input->post('ice_box', TRUE),
                        'baskom_tep' => $this->input->post('baskom_tep', TRUE),
                        'telenan' => $this->input->post('telenan', TRUE),
                        'pisauf' => $this->input->post('pisauf', TRUE),
                        'gunting' => $this->input->post('gunting', TRUE),
                        'pemukul_daging' => $this->input->post('pemukul_daging', TRUE),
                        'timbangan' => $this->input->post('timbangan', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'tempt_sendok' => $this->input->post('tempt_sendok', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'bot_bum' => $this->input->post('bot_bum', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'masker' => $this->input->post('masker', TRUE),
                        'ser_hitam' => $this->input->post('ser_hitam', TRUE),
                        'celmek_merah' => $this->input->post('celmek_merah', TRUE),
                        'tusuk_sate' => $this->input->post('tusuk_sate', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_chiclin($data);
                    break;
                case "PR000005":
                    $data = array(
                        'booth_put' => $this->input->post('booth_put', TRUE),
                        'booth_por' => $this->input->post('booth_por', TRUE),
                        'neon_box' => $this->input->post('neon_box', TRUE),
                        'stiker' => $this->input->post('stiker', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'top_tep' => $this->input->post('top_tep', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'bot_bum' => $this->input->post('bot_bum', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'telenan' => $this->input->post('telenan', TRUE),
                        'pisauf' => $this->input->post('pisauf', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'tusuk_chi' => $this->input->post('tusuk_chi', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'ice_box' => $this->input->post('ice_box', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_cut($data);
                    break;
                case "PR000006":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'booth_pallet' => $this->input->post('booth_pallet', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'sticker' => $this->input->post('sticker', TRUE),
                        'stiker_top' => $this->input->post('stiker_top', TRUE),
                        'kom_gas' => $this->input->post('kom_gas', TRUE),
                        'selreg' => $this->input->post('selreg', TRUE),
                        'mix_set' => $this->input->post('mix_set', TRUE),
                        'wajan' => $this->input->post('wajan', TRUE),
                        'sotil' => $this->input->post('sotil', TRUE),
                        'irus' => $this->input->post('irus', TRUE),
                        'saringan' => $this->input->post('saringan', TRUE),
                        'top_wad_pis' => $this->input->post('top_wad_pis', TRUE),
                        'top_adonan' => $this->input->post('top_adonan', TRUE),
                        'top_toping' => $this->input->post('top_toping', TRUE),
                        'top_selai' => $this->input->post('top_selai', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'parutan_kej' => $this->input->post('parutan_kej', TRUE),
                        'pisau' => $this->input->post('pisau', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'sol_plastik' => $this->input->post('sol_plastik', TRUE),
                        'kuas' => $this->input->post('kuas', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'ser_kun' => $this->input->post('ser_kun', TRUE),
                        'surkon' => $this->input->post('surkon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'lam_set' => $this->input->post('lam_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_banana($data);
                    break;
                case "PR000007":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'sticker' => $this->input->post('sticker', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'deep_lis' => $this->input->post('deep_lis', TRUE),
                        'selreg' => $this->input->post('selreg', TRUE),
                        'gastro' => $this->input->post('gastro', TRUE),
                        'botsus' => $this->input->post('botsus', TRUE),
                        'botkac' => $this->input->post('botkac', TRUE),
                        'icebox' => $this->input->post('icebox', TRUE),
                        'talenan' => $this->input->post('talenan', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'wd_tp_kering' => $this->input->post('wd_tp_kering', TRUE),
                        'wd_tp_basah' => $this->input->post('wd_tp_basah', TRUE),
                        'bas_dag' => $this->input->post('bas_dag', TRUE),
                        'timbangan' => $this->input->post('timbangan', TRUE),
                        'top_moz' => $this->input->post('top_moz', TRUE),
                        'gel_takar' => $this->input->post('gel_takar', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'parut_kej' => $this->input->post('parut_kej', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'pisau_f' => $this->input->post('pisau_f', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'tusuk_sate' => $this->input->post('tusuk_sate', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'rafia_lakban' => $this->input->post('rafia_lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'cel_hit' => $this->input->post('cel_hit', TRUE),
                        'lam_set' => $this->input->post('lam_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_boboo($data);
                    break;
                case "PR000008":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'booth_pallet' => $this->input->post('booth_pallet', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'sticker' => $this->input->post('sticker', TRUE),
                        'sticker_top' => $this->input->post('sticker_top', TRUE),
                        'pan_crep' => $this->input->post('pan_crep', TRUE),
                        'segi_crepes' => $this->input->post('segi_crepes', TRUE),
                        'kom_gas' => $this->input->post('kom_gas', TRUE),
                        'selreg' => $this->input->post('selreg', TRUE),
                        'mix_set' => $this->input->post('mix_set', TRUE),
                        'top_ado' => $this->input->post('top_ado', TRUE),
                        'top_top' => $this->input->post('top_top', TRUE),
                        'top_selai' => $this->input->post('top_selai', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'sendok_ado' => $this->input->post('sendok_ado', TRUE),
                        'kuas' => $this->input->post('kuas', TRUE),
                        'parut_kej' => $this->input->post('parut_kej', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'solet_plas' => $this->input->post('solet_plas', TRUE),
                        'sendok_top' => $this->input->post('sendok_top', TRUE),
                        'scrap_crep' => $this->input->post('scrap_crep', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'lap_serb' => $this->input->post('lap_serb', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'rafia_lakban' => $this->input->post('rafia_lakban', TRUE),
                        'lakban' => $this->input->post('lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'cel_mer' => $this->input->post('cel_mer', TRUE),
                        'lam_set' => $this->input->post('lam_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_candy($data);
                    break;
                case "PR000009":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'booth_pallet' => $this->input->post('booth_pallet', TRUE),
                        'roll_baner' => $this->input->post('roll_baner', TRUE),
                        'stiker_set' => $this->input->post('stiker_set', TRUE),
                        'kom_gas' => $this->input->post('kom_gas', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'wajan' => $this->input->post('wajan', TRUE),
                        'irus' => $this->input->post('irus', TRUE),
                        'sotl' => $this->input->post('sotl', TRUE),
                        'saringan' => $this->input->post('saringan', TRUE),
                        'top_tep' => $this->input->post('top_tep', TRUE),
                        'top_tahu' => $this->input->post('top_tahu', TRUE),
                        'bas_stain' => $this->input->post('bas_stain', TRUE),
                        'top_saus' => $this->input->post('top_saus', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'bot_bum' => $this->input->post('bot_bum', TRUE),
                        'talenan' => $this->input->post('talenan', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'pisau' => $this->input->post('pisau', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'tusuk_tahu' => $this->input->post('tusuk_tahu', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'lakban' => $this->input->post('lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'lamp_set' => $this->input->post('lamp_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_king($data);
                    break;
                case "PR000010":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'booth_palet' => $this->input->post('booth_palet', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'kanopi' => $this->input->post('kanopi', TRUE),
                        'stiker' => $this->input->post('stiker', TRUE),
                        'stiker_top' => $this->input->post('stiker_top', TRUE),
                        'kom_gas' => $this->input->post('kom_gas', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'pan' => $this->input->post('pan', TRUE),
                        'mixer_set' => $this->input->post('mixer_set', TRUE),
                        'top_top' => $this->input->post('top_top', TRUE),
                        'top_ado' => $this->input->post('top_ado', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'bot_sel' => $this->input->post('bot_sel', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'garpu' => $this->input->post('garpu', TRUE),
                        'sendok_ado' => $this->input->post('sendok_ado', TRUE),
                        'kuas' => $this->input->post('kuas', TRUE),
                        'sol_mar' => $this->input->post('sol_mar', TRUE),
                        'sol_plas' => $this->input->post('sol_plas', TRUE),
                        'sendok_top' => $this->input->post('sendok_top', TRUE),
                        'pisau' => $this->input->post('pisau', TRUE),
                        'parutan' => $this->input->post('parutan', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'lap' => $this->input->post('lap', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'plat_besi' => $this->input->post('plat_besi', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'lamp_set' => $this->input->post('lamp_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_martabak($data);
                    break;
                case "PR000011":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'stiker_set' => $this->input->post('stiker_set', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'deep_lis' => $this->input->post('deep_lis', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'warmer' => $this->input->post('warmer', TRUE),
                        'rice_cook' => $this->input->post('rice_cook', TRUE),
                        'termos_nas' => $this->input->post('termos_nas', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'icebox' => $this->input->post('icebox', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'bas_tep' => $this->input->post('bas_tep', TRUE),
                        'bas_sam' => $this->input->post('bas_sam', TRUE),
                        'top_tam' => $this->input->post('top_tam', TRUE),
                        'telenan' => $this->input->post('telenan', TRUE),
                        'pisau_b' => $this->input->post('pisau_b', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'packing' => $this->input->post('packing', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_ohana($data);
                    break;
                case "PR000012":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'stiker' => $this->input->post('stiker', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'lakban' => $this->input->post('lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'kom_gas' => $this->input->post('kom_gas', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'wajan' => $this->input->post('wajan', TRUE),
                        'irus' => $this->input->post('irus', TRUE),
                        'sotil' => $this->input->post('sotil', TRUE),
                        'saringan' => $this->input->post('saringan', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'bot_kac' => $this->input->post('bot_kac', TRUE),
                        'bot_bum' => $this->input->post('bot_bum', TRUE),
                        'icebox' => $this->input->post('icebox', TRUE),
                        'telenan' => $this->input->post('telenan', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'wad_tep_ker' => $this->input->post('wad_tep_ker', TRUE),
                        'wad_tep_bas' => $this->input->post('wad_tep_bas', TRUE),
                        'baskom' => $this->input->post('baskom', TRUE),
                        'timbangan' => $this->input->post('timbangan', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'pisauf' => $this->input->post('pisauf', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'tusuk_sat' => $this->input->post('tusuk_sat', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'lamp_set' => $this->input->post('lamp_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_popchick($data);
                    break;
                case "PR000013":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'stiker_set' => $this->input->post('stiker_set', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'mmt' => $this->input->post('mmt', TRUE),
                        'cobex' => $this->input->post('cobex', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'rice_cook' => $this->input->post('rice_cook', TRUE),
                        'win_gas' => $this->input->post('win_gas', TRUE),
                        'termos_nas' => $this->input->post('termos_nas', TRUE),
                        'icebox' => $this->input->post('icebox', TRUE),
                        'bas_tep' => $this->input->post('bas_tep', TRUE),
                        'top_say' => $this->input->post('top_say', TRUE),
                        'bas_sam' => $this->input->post('bas_sam', TRUE),
                        'wad_tam' => $this->input->post('wad_tam', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'parutan' => $this->input->post('parutan', TRUE),
                        'sol_plas' => $this->input->post('sol_plas', TRUE),
                        'talenan' => $this->input->post('talenan', TRUE),
                        'pisau_b' => $this->input->post('pisau_b', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'lakban' => $this->input->post('lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'lamp_set' => $this->input->post('lamp_set', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_oliv($data);
                    break;
                case "PR000014":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'sticker_booth_set' => $this->input->post('sticker_booth_set', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'rafia_lakban' => $this->input->post('rafia_lakban', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'deep_lis' => $this->input->post('deep_lis', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'tiris' => $this->input->post('tiris', TRUE),
                        'ice_box' => $this->input->post('ice_box', TRUE),
                        'bas_tep' => $this->input->post('bas_tep', TRUE),
                        'telenan' => $this->input->post('telenan', TRUE),
                        'pisauf' => $this->input->post('pisauf', TRUE),
                        'top_plas' => $this->input->post('top_plas', TRUE),
                        'timbangan' => $this->input->post('timbangan', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'bot_bum' => $this->input->post('bot_bum', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'temp_sendok' => $this->input->post('temp_sendok', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'masker' => $this->input->post('masker', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'tusuk_sat' => $this->input->post('tusuk_sat', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_chip($data);
                    break;
                case "PR000015":
                    $data = array(
                        'booth_put' => $this->input->post('booth_put', TRUE),
                        'stiker' => $this->input->post('stiker', TRUE),
                        'neon_box' => $this->input->post('neon_box', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'baut_neon' => $this->input->post('baut_neon', TRUE),
                        'neon_led' => $this->input->post('neon_led', TRUE),
                        'pan' => $this->input->post('pan', TRUE),
                        'kom_gas' => $this->input->post('kom_gas', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'box_top' => $this->input->post('box_top', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'talenan' => $this->input->post('talenan', TRUE),
                        'sol_plas' => $this->input->post('sol_plas', TRUE),
                        'pisau_b' => $this->input->post('pisau_b', TRUE),
                        'scrap' => $this->input->post('scrap', TRUE),
                        'par_keju' => $this->input->post('par_keju', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'masker' => $this->input->post('masker', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'colling' => $this->input->post('colling', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'kuas' => $this->input->post('kuas', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'icebox' => $this->input->post('icebox', TRUE),
                        'kontainer' => $this->input->post('kontainer', TRUE),
                        'top_tel' => $this->input->post('top_tel', TRUE),
                        'cet_tel' => $this->input->post('cet_tel', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'top_mar' => $this->input->post('top_mar', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'tempt_sen' => $this->input->post('tempt_sen', TRUE),
                        'pisau_say' => $this->input->post('pisau_say', TRUE),
                        'scrap_kecil' => $this->input->post('scrap_kecil', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_eat($data);
                    break;
                case "PR000016":
                    $data = array(
                        'booth_putih' => $this->input->post('booth_putih', TRUE),
                        'stiker_set' => $this->input->post('stiker_set', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'tenda' => $this->input->post('tenda', TRUE),
                        'rumbai' => $this->input->post('rumbai', TRUE),
                        'neon_box' => $this->input->post('neon_box', TRUE),
                        'lamp_spot' => $this->input->post('lamp_spot', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'deep_lis' => $this->input->post('deep_lis', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'sekop_ay' => $this->input->post('sekop_ay', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'tirisan' => $this->input->post('tirisan', TRUE),
                        'gas_torch' => $this->input->post('gas_torch', TRUE),
                        'icebox' => $this->input->post('icebox', TRUE),
                        'bas_tep' => $this->input->post('bas_tep', TRUE),
                        'telenan' => $this->input->post('telenan', TRUE),
                        'pisauf' => $this->input->post('pisauf', TRUE),
                        'gunting' => $this->input->post('gunting', TRUE),
                        'pemukul_dag' => $this->input->post('pemukul_dag', TRUE),
                        'timbangan' => $this->input->post('timbangan', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'tempt_sendok' => $this->input->post('tempt_sendok', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'bot_bum' => $this->input->post('bot_bum', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'masker' => $this->input->post('masker', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'tusuk_sate' => $this->input->post('tusuk_sate', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_xiao($data);
                    break;
                case "PR000017":
                    $data = array(
                        'booth_put' => $this->input->post('booth_put', TRUE),
                        'stiker_set' => $this->input->post('stiker_set', TRUE),
                        'roll_banner' => $this->input->post('roll_banner', TRUE),
                        'neon_box' => $this->input->post('neon_box', TRUE),
                        'rafia_lak' => $this->input->post('rafia_lak', TRUE),
                        'kardus' => $this->input->post('kardus', TRUE),
                        'deep_gas' => $this->input->post('deep_gas', TRUE),
                        'deep_lis' => $this->input->post('deep_lis', TRUE),
                        'sel_reg' => $this->input->post('sel_reg', TRUE),
                        'sekop_a' => $this->input->post('sekop_a', TRUE),
                        'nampan_stain' => $this->input->post('nampan_stain', TRUE),
                        'tirisan' => $this->input->post('tirisan', TRUE),
                        'gas_troch' => $this->input->post('gas_troch', TRUE),
                        'icebox' => $this->input->post('icebox', TRUE),
                        'bas_tep' => $this->input->post('bas_tep', TRUE),
                        'telenan' => $this->input->post('telenan', TRUE),
                        'pisauf' => $this->input->post('pisauf', TRUE),
                        'gunting' => $this->input->post('gunting', TRUE),
                        'pemukul_dag' => $this->input->post('pemukul_dag', TRUE),
                        'timbangan' => $this->input->post('timbangan', TRUE),
                        'bot_saus' => $this->input->post('bot_saus', TRUE),
                        'gel_tak' => $this->input->post('gel_tak', TRUE),
                        'sendok' => $this->input->post('sendok', TRUE),
                        'tempt_sedok' => $this->input->post('tempt_sedok', TRUE),
                        'capitan' => $this->input->post('capitan', TRUE),
                        'bot_bum' => $this->input->post('bot_bum', TRUE),
                        'serbet' => $this->input->post('serbet', TRUE),
                        'kanebo' => $this->input->post('kanebo', TRUE),
                        'hand_glo' => $this->input->post('hand_glo', TRUE),
                        'masker' => $this->input->post('masker', TRUE),
                        'celmek' => $this->input->post('celmek', TRUE),
                        'seragam' => $this->input->post('seragam', TRUE),
                        'tusuk_sat' => $this->input->post('tusuk_sat', TRUE),
                        'sur_kon' => $this->input->post('sur_kon', TRUE),
                        'idcard' => $this->input->post('idcard', TRUE),
                        'kd_mitra' => $this->input->post('kd_mitra', TRUE)
                    );
                    $this->M_avbooth->insert_lian($data);
                    break;
            }
        }
    }
?>