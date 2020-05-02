<?php
class Monitor extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			// if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) /*&& (!empty($_SESSION['gugus']))*/) {
			$this->load->model('M_monitor');
			$this->load->library('form_validation');
			$this->load->helper('form');
			// }else {
			// 	echo redirect(base_url('../'));
			// }
	   }
 
	public function index(){
		$data = array(
			'dd_bg' => $this->M_monitor->get_barang(),
			'dd_ek' => $this->M_monitor->get_ekspedisi(),
			'dd_temp' => $this->M_monitor->get_temp(),
			'dd_pr' => $this->M_monitor->get_provinsi(),
			'dd_pro' => $this->M_monitor->get_produk(),
			// 'dd_mt' => $this->M_monitor->get_nm_mitra(),
		);
		$this->load->view('monitor/monitor', $data);
		}
		
	function create(){
		
		$data['dd_pk'] = $this->M_monitor->get_paket();
		$data = array(
			'dd_pk' => $this->M_monitor->get_paket(),
			'dd_ek' => $this->M_monitor->get_ekspedisi(),
			'dd_pr' => $this->M_monitor->get_provinsi(),
			'dd_bg' => $this->M_monitor->get_barang(),
			'dd_pro' => $this->M_monitor->get_produk()
		);
		 $this->load->view('monitor/monitor_form', $data);
	}

	public function validasi_input_mitra(){
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('nm_mitra','Nama mitra', 'required');
		$this->form_validation->set_rules('kt_lahir','Kota Kelahiran', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} 
	}

	public function create_action(){
		$aktif = 1;
		$kode = $this->get_kode_pmby();
		$data = array(
			'nm_mitra' => $this->input->post('nm_mitra', TRUE),
			'kt_lahir' => $this->input->post('kt_lahir', TRUE),
			'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('tgl_lahir'))),
			'almt_rmh' => $this->input->post('almt_rmh', TRUE),
			'almt_prov_rmh' => $this->input->post('almt_prov_rmh', TRUE),
			'almt_kt_rmh' => $this->input->post('almt_kt_rmh', TRUE),
			'almt_kec_rmh' => $this->input->post('almt_kec_rmh', TRUE),
			'almt_kel_rmh' => $this->input->post('almt_kel_rmh', TRUE),
			'no_hp1' => $this->input->post('no_hp1', TRUE),
			'no_hp2' => $this->input->post('no_hp2', TRUE),
			'almt_outlet' => $this->input->post('almt_outlet', TRUE),
			'almt_prov_outlet' => $this->input->post('almt_prov_outlet', TRUE),
			'almt_kt_outlet' => $this->input->post('almt_kt_outlet', TRUE),
			'almt_kec_outlet' => $this->input->post('almt_kec_outlet', TRUE),
			'almt_kel_outlet' => $this->input->post('almt_kel_outlet', TRUE),
			'ats_nm_kirim' => $this->input->post('ats_nm_penerima', TRUE),
			'almt_kirim' => $this->input->post('almt_kirim', TRUE),
			'almt_prov_kirim' => $this->input->post('almt_prov_kirim', TRUE),
			'almt_kt_kirim' => $this->input->post('almt_kt_kirim', TRUE),
			'almt_kec_kirim' => $this->input->post('almt_kec_kirim', TRUE),
			'almt_kel_kirim' => $this->input->post('almt_kel_kirim', TRUE),
			'almt_terusan' => $this->input->post('almt_terusan', TRUE),
			'almt_prov_terusan' => $this->input->post('almt_prov_terusan', TRUE),
			'almt_kt_terusan' => $this->input->post('almt_kt_terusan', TRUE),
			'almt_kec_terusan' => $this->input->post('almt_kec_terusan', TRUE),
			'almt_kel_terusan' => $this->input->post('almt_kel_terusan', TRUE),
			'nm_marketing' => $this->input->post('nm_marketing', TRUE),
			'sts_pmby' => $this->input->post('sts_pmby', TRUE),
			'nm_produk' => $this->input->post('nm_produk', TRUE),
			'paket' => $this->input->post('paket', TRUE),
			'ekspedisi' => $this->input->post('ekspedisi', TRUE),
			'biaya_kirim' => $this->input->post('biaya_kirim', TRUE),
			'tambahan' => $this->input->post('tambahan', TRUE),
			'ats_nm_penerusan' => $this->input->post('ats_nm_penerusan', TRUE),
			'by_tmbbb' => $this->input->post('by_tmbbb', TRUE),
			'nm_bank_tmbb' => $this->input->post('nm_bank_tmbb', TRUE),
			'rekening_tmbb' => $this->input->post('rekening_tmbb', TRUE),
			'jml_tarif_tmbbb' => $this->input->post('jml_tarif_tmbbb', TRUE),
			'ats_nm_rekening_tmbbb' => $this->input->post('ats_nm_rekening_tmbbb', TRUE),
			'kd_mitra' => $this->kode(),
			'pembayaran' => $kode,
			'dt_aktif' => $aktif,
			'sts_vakum' => $aktif,
			'dt_create' => date('Y-m-d')
		);

		$datapmby = array(
			'kd_pmby' => $kode,
			'jml_transfer' => $this->input->post('jml_tarif', true),
			'nm_bank' => $this->input->post('nm_bank', true),
			'no_rekening' => $this->input->post('rekening', true),
			'ats_nm' => $this->input->post('ats_nm_rekening', true),
			'dt_trans' => date('Y-m-d')
		);
		$this->M_monitor->insertpmby($datapmby);

		if($this->input->post('jml_tarif2', true) != ''){
			$datapmby = array(
				'kd_pmby' => $kode,
				'jml_transfer' => $this->input->post('jml_tarif2', true),
				'nm_bank' => $this->input->post('nm_bank2', true),
				'no_rekening' => $this->input->post('rekening2', true),
				'ats_nm' => $this->input->post('ats_nm_rekening2', true),
				'dt_trans' => date('Y-m-d')
			);
			$this->M_monitor->insertpmby($datapmby);
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
			$this->M_monitor->insertpmby($datapmby);
		}

		if($this->input->post('cek_tmbb', true) == 'tambah'){
			$notif = array(
				"notif_subject" => 'Tambah Bahan Baku',
				"notif_text" => '+ '.$this->input->post('nm_tb', true),
				"notif_status" => 0,
				"notif_date" => date('Y-m-d H:i:s'),
				"notif_nm_mitra" => 'Mitra '.$this->input->post('nm_mitra', TRUE)
			);
			$this->M_monitor->insert_notif($notif);
		}
		
		$this->M_monitor->insert($data);
		$this->session->set_flashdata('message','Data Barang Berhasil Ditambahkan');
		redirect(site_url('Monitor'));
		header(site_url('Monitor'));
	}
	
	function update($id){
		$row = $this->M_monitor->get_by_id($id);
		
		if ($row) {
			$data = array (
				'kd_mitra' => set_value('kd_mitra',$row->kd_mitra),
				'nm_mitra' => set_value('nm_mitra',$row->nm_mitra),
				'kt_lahir' => set_value('kt_lahir',$row->kt_lahir),
				'tgl_lahir' => set_value('tgl_lahir', date('d/m/Y', strtotime($row->tgl_lahir))),
				'almt_rmh' => set_value('almt_rmh', $row->almt_rmh),
				'almt_kt_rmh' => set_value('almt_kt_rmh', $row->almt_kt_rmh),
				'no_hp1' => set_value('no_hp1', $row->no_hp1),
				'no_hp2' => set_value('no_hp2', $row->no_hp2),
				'almt_outlet' => set_value('almt_outlet', $row->almt_outlet),
				'almt_kt_outlet' => set_value('almt_kt_outlet', $row->almt_kt_outlet),
				'almt_kirim' => set_value('almt_kirim', $row->almt_kirim),
				'paket' => set_value('paket', $row->paket),
				'jml_tarif' => set_value('jml_tarif', $row->jml_tarif),
				'nm_bank' => set_value('nm_bank', $row->nm_bank),
				'rekening' => set_value('rekening', $row->rekening),
				'ats_nm_rekening' => set_value('ats_nm_rekening', $row->ats_nm_rekening),
				'ekspedisi' => set_value('ekspedisi', $row->ekspedisi),
				'biaya_kirim' => set_value('biaya_kirim', $row->biaya_kirim),
				'sts_pmby' => set_value('sts_pmby', $row->sts_pmby),
				'dd_pk' => $this->M_monitor->get_paket(),
				'dd_ek' => $this->M_monitor->get_ekspedisi(),
			);
				$this->load->view('monitor/monitor_form_edit', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(base_url('Monitor'));
		}
	}
	
	function update_action(){
		$data = array(
			'nm_mitra' => $this->input->post('nm_mitra', TRUE),
			'kt_lahir' => $this->input->post('kt_lahir', TRUE),
			'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('tgl_lahir'))),
			'almt_rmh' => $this->input->post('almt_rmh', TRUE),
			'almt_prov_rmh' => $this->input->post('almt_kt_rmh', TRUE),
			'almt_kt_rmh' => $this->input->post('almt_kt_rmh', TRUE),
			'almt_kec_rmh' => $this->input->post('almt_kt_rmh', TRUE),
			'almt_kel_rmh' => $this->input->post('almt_kt_rmh', TRUE),
			'no_hp1' => $this->input->post('no_hp1', TRUE),
			'no_hp2' => $this->input->post('no_hp2', TRUE),
			'almt_outlet' => $this->input->post('almt_outlet', TRUE),
			'almt_prov_outlet' => $this->input->post('almt_kt_outlet', TRUE),
			'almt_kt_outlet' => $this->input->post('almt_kt_outlet', TRUE),
			'almt_kec_outlet' => $this->input->post('almt_kt_outlet', TRUE),
			'almt_kel_outlet' => $this->input->post('almt_kt_outlet', TRUE),
			'almt_kirim' => $this->input->post('almt_kirim'),
			'almt_prov_kirim' => $this->input->post('almt_prov_kirim', TRUE),
			'almt_kt_kirim' => $this->input->post('almt_kt_kirim', TRUE),
			'almt_kec_kirim' => $this->input->post('almt_kec_kirim', TRUE),
			'almt_kel_kirim' => $this->input->post('almt_kel_kirim', TRUE),
			);
				$this->M_monitor->update($this->input->post('kd_mitra', TRUE), $data);
				$this->session->set_flashdata('message','Ubah Data Barang Berhasil');
				redirect(base_url('Monitor'));
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
					'almt_outlet' => $this->input->post('almt_outlet', TRUE),
					'almt_rmh' => $this->input->post('almt_rmh', TRUE),
					// 'almt_prov_outlet' => $this->input->post('almt_prov_outlet', TRUE),
					'almt_kt_rmh' => $this->input->post('almt_kt_rmh', TRUE),
					'almt_kt_outlet' => $this->input->post('almt_kt_outlet', TRUE),
					'almt_kirim' => $this->input->post('almt_kirim', TRUE),
					// 'almt_prov_kirim' => $this->input->post('almt_prov_kirim', TRUE),
					'almt_kt_kirim' => $this->input->post('almt_kt_kirim', TRUE),
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
				'almt_outlet' => $this->input->post('almt_outlet', TRUE),
				'almt_rmh' => $this->input->post('almt_rmh', TRUE),
				'almt_kt_rmh' => $this->input->post('almt_kt_rmh', TRUE),
				// 'almt_prov_outlet' => $this->input->post('almt_prov_outlet', TRUE),
				'almt_kt_outlet' => $this->input->post('almt_kt_outlet', TRUE),
				'almt_kirim' => $this->input->post('almt_kirim', TRUE),
				// 'almt_prov_kirim' => $this->input->post('almt_prov_kirim', TRUE),
				'almt_kt_kirim' => $this->input->post('almt_kt_kirim', TRUE),
				// 'dt_pelunasan' => date('Y-m-d')
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
			$this->M_monitor->insert_notif($notif);
		}

		$datapmby = array(
			'kd_pmby' => $kode,
			'jml_transfer' => $this->input->post('jml_tarif', true),
			'nm_bank' => $this->input->post('nm_bank', true),
			'no_rekening' => $this->input->post('rekening', true),
			'ats_nm' => $this->input->post('ats_nm_rekening', true),
			'dt_trans' => date('Y-m-d')
		);
		$this->M_monitor->insertpmby($datapmby);

		if($this->input->post('jml_tarif2', true) != ''){
			$datapmby = array(
				'kd_pmby' => $kode,
				'jml_transfer' => $this->input->post('jml_tarif2', true),
				'nm_bank' => $this->input->post('nm_bank2', true),
				'no_rekening' => $this->input->post('rekening2', true),
				'ats_nm' => $this->input->post('ats_nm_rekening2', true),
				'dt_trans' => date('Y-m-d')
			);
			$this->M_monitor->insertpmby($datapmby);
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
			$this->M_monitor->insertpmby($datapmby);
		}
		
		$this->M_monitor->update($this->input->post('kd_mitra'), $data);
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
		redirect(site_url('Monitor'));
	}

	function pelunasan($id){
		$data = array(
			'dt_pelunasan'=>date('Y-m-d'),
			'sts_pmby'=> 2
		);
		$this->M_monitor->update($id, $data);
		redirect(base_url('Monitor'));
	}

	

	function delete($id){
		$row = $this->M_monitor->get_by_id($id);

		$aktif = 0;

		if($row){
			$data = array(
				'dt_aktif' => $aktif
			);
			$this->M_monitor->update($id, $data);
			$this->session->set_flashdata('messages', 'Hapus Data Berhasil');
			redirect(base_url('Monitor'));
		}
	}
	
	function read($id){
		$row = $this->M_monitor->get_by_id_read($id);
		if($row){
			$data = array(
				'nm_mitra' => set_value('nm_mitra',$row->nm_mitra),
				'kt_lahir' => set_value('kt_lahir',$row->kt_lahir),
				'tgl_lahir' => set_value('tgl_lahir', date('d/m/Y', strtotime($row->tgl_lahir))),
				'tgl_join' => set_value('tgl_join', date('d/m/Y', strtotime($row->tgl_join))),
				'almt_rmh' => set_value('almt_rmh', $row->almt_rmh),
				'prov_rmh' => set_value('prov_rmh', $row->provinsi1),
				'nm_kota' => set_value('nm_kota', $row->kota1),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'almt_outlet' => set_value('almt_outlet', $row->almt_outlet),
				'prov_outlet' => set_value('prov_outlet', $row->provinsi2),
				'kt_outlet' => set_value('kt_outlet', $row->kota2),
				'nm_produk' => set_value('nm_produk', $row->nm_produk),
				'paket' => set_value('paket', $row->paket),
				'rin_by' => $this->M_monitor->get_rin_by($id)
			);
			$this->load->view('monitor/monitor_read', $data);
		}else{
			$this->session->set_flashdata('messages', 'Data Tidak Ditemukan');
			redirect(base_url('Monitor'));
		}
	}

	function order($id){
		$row = $this->M_monitor->get_by_id($id);
		if($row){
			$data = array(
				'kd_mitra' => set_value('kd_mitra', $row->kd_mitra),
				'nm_mitra' => set_value('nm_mitra', $row->nm_mitra),
				'kt_lahir' => set_value('kt_lahir', $row->kt_lahir),
				'tgl_lahir' => set_value('tgl_lahir', date('m/d/Y', strtotime($row->tgl_lahir ))),
				'almt_rmh' => set_value('almt_rmh', $row->almt_rmh),
				'almt_kt_rmh' => set_value('almt_kt_rmh', $row->almt_kt_rmh),
				'almt_outlet' => set_value('almt_outlet', $row->almt_outlet),
				'almt_kt_outlet' => set_value('almt_kt_outlet', $row->almt_kt_outlet),
				'almt_kirim' => set_value('almt_kirim', $row->almt_kirim)
			);
			
		}
	}


	function kode(){
        $kode = $this->M_monitor->get_kode();
        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "MT";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}
	function get_kode_pmby(){
		$kode = $this->M_monitor->get_kode_pmby();
		foreach($kode as $row){
			$data = $row->maxkode;
		}

		$kdpmby = $data;
		$noUrut = (int) substr($kdpmby, 3, 6);
		$noUrut++;
		$char = "PB";
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
		$kd_mit = $this->input->post('id');
		$searchQuery .= " AND kd_mitra = '$kd_mit'";
		
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
		
			if($this->session->userdata('level')=='1'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='2'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='3'){
				$history = '<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoHistory"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
				<img src="'.base_url('assets/icon/History-icon.png').'" width="18" height="18">
				</button>';
				$info = '<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
				<img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
				</button>';
				if($row->sts_pmby == 1 || $row->sts_pmby == 3){
					$button = '
					<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'" disabled>
					<img src="'.base_url('assets/icon/tambah-order-icon.png').'" width="18" height="18">
					</button>
					';
				}else{
					$button = '
					<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'" onclick="load(this.value)">
					<img src="'.base_url('assets/icon/tambah-order-icon.png').'" width="18" height="18">
					</button>
					';
				}				
			}elseif($this->session->userdata('level')=='12'){
				$history = '<a href="monitor/history/'.$row->kd_mitra.'" class="btn btn-light">
				<i class="fa fa-history" title="History"></i>
				</a>';
				if($row->sts_pmby == 1 || $row->sts_pmby == 3){
					$button = '
					<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
					<i class="fa fa-info-circle" title="Info"></i>
					</a>
					<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'" disabled>
					<i class="fa fa-shopping-cart" title="Order"></i>
					</button>
					';
				}else{
					$button = '
					<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
					<i class="fa fa-info-circle" title="Info"></i>
					</a>
					<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'" onclick="load(this.value)">
					<i class="fa fa-shopping-cart" title="Order"></i>
					</button>
					';
				}				
			}
			// onclick="load(this.value)"
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			"nm_mitra"=>$row->nm_mitra,
			"last"=>$row->last,
			"nm_produk"=>$row->nm_produk,
			"almt_kt_rmh"=>$row->nama_kota,
			"history"=>$history,
			"info"=>$info,
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

	function get_kota(){
        $id=$this->input->post('id');
        $data=$this->M_monitor->get_kota($id);
        echo json_encode($data);
	}
	function get_kec(){
        $id=$this->input->post('id');
        $data=$this->M_monitor->get_kec($id);
        echo json_encode($data);
	}
	function get_kel(){
        $id=$this->input->post('id');
        $data=$this->M_monitor->get_kel($id);
        echo json_encode($data);
	}

	function get_jns_barang(){
        $id=$this->input->post('id');
        $data=$this->M_monitor->get_jns_barang($id);
        echo json_encode($data);
	}

	function get_jns_paket(){
		$id=$this->input->post('id');
		$data = $this->M_monitor->get_jns_paket($id);
		echo json_encode($data);
	}

	function get_rek_kantor(){
		$id = $this->input->get('id');
		$data = $this->M_monitor->get_rek_kantor($id);
		echo json_encode($data);
	}

	function get_no_rek(){
		$id = $this->input->get('id');
		$data = $this->M_monitor->get_no_rek($id);
		echo json_encode($data);
	}
	
	function get_temp(){
		$data = $this->M_monitor->get_temp();
		echo json_encode($data);
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
		
			if($this->session->userdata('level')=='1'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='2'){
				
				$button = '<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
				<img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
				</button>';
				
				
			}elseif($this->session->userdata('level')=='3'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
				<i class="fa fa-info-circle" title="Info"></i>
				</a>
				<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >Order</button>
				';
			}elseif($this->session->userdata('level')=='11'){
				$button = '
					<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
					<i class="fa fa-info-circle"></i>
					</a>
					<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#modalEdit"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >
					<i class="fa fa-edit"></i>
					</button>
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
		
			if($this->session->userdata('level')=='1'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='2'){
				$button = '<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
				<img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
				</button>';
			}elseif($this->session->userdata('level')=='3'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
				<i class="fa fa-info-circle" title="Info"></i>
				</a>
				<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >Order</button>
				';
			}elseif($this->session->userdata('level')=='11'){
				$button = '
					<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
					<i class="fa fa-info-circle"></i>
					</a>
					<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#modalEdit"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >
					<i class="fa fa-edit"></i>
					</button>
					';
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
		
			if($this->session->userdata('level')=='1'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='2'){
				$button = '<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
				<img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
				</button>';
			}elseif($this->session->userdata('level')=='3'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
				<i class="fa fa-info-circle" title="Info"></i>
				</a>
				<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >Order</button>
				';
			}elseif($this->session->userdata('level')=='11'){
				$button = '
					<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
					<i class="fa fa-info-circle"></i>
					</a>
					<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#modalEdit"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >
					<i class="fa fa-edit"></i>
					</button>
					';
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
		
			if($this->session->userdata('level')=='1'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
				<i class="fas fa-info-circle"></i>
				</a>
				<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
				<i class="fas fa-trash"></i>
				</a>
				<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-light btn-circle">
				<i class="fas fa-edit"></i>
				</a>
				';
			}elseif($this->session->userdata('level')=='2'){
				$button = '<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#infoModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'">
				<img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
				</button>';
			}elseif($this->session->userdata('level')=='3'){
				$button = '
				<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
				<i class="fa fa-info-circle" title="Info"></i>
				</a>
				<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'" >Order</button>
				';
			}elseif($this->session->userdata('level')=='11'){
				$button = '
					<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-light">
					<i class="fa fa-info-circle"></i>
					</a>
					<button value="'.$row->kd_mitra.'" class="btn btn-light" data-toggle="modal" data-target="#modalEdit"  data-keyboard="false" data-whatever="'.$row->kd_mitra.'" >
					<i class="fa fa-edit"></i>
					</button>
					';
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

	function tmp_order(){
		## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value
		$kd_mitra = $_POST['kd_mitra'];

		## Search 
		$searchQuery = " ";
		// if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
		// 	$searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
        //     $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
		// 	$searchQuery .= " and (dt_create BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
		//  }
		// //  $searchQuery .= " and sts_pmby = '2'";
		// if($searchValue != ''){
		// $searchQuery .= " and (
		// nm_mitra like '%".$searchValue."%' or  
		// ats_nm_rekening like '%".$searchValue."%' ) ";
		// }

		## Total number of records without filtering
		$sel = $this->M_monitor->get_total_dt_or($kd_mitra);
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_monitor->get_total_fl_or($searchQuery, $kd_mitra);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_monitor->get_total_ft_or($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage, $kd_mitra);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
			 $harga = $row->harga_barang*$row->jml_barang;

			 $button = '
				
				<button value="'.$row->id.'" class="btn btn-danger"  data-whatever="'.$row->kd_tmp_order.'" onclick="temp_hapus_order(this.value)">Hapus</button>
				';
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			// "kd_tmp_order"=>$row->kd_tmp_order,
			"nm_barang"=>$row->nm_barang,
			"jml_barang"=>$row->jml_barang,
			"harga"=>$row->harga_barang,
			"harga_total"=>$harga,
			"aksi"=>$button
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
	function tmp_bank(){
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

		## Total number of records without filtering
		$sel = $this->M_monitor->get_total_dt_bn();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_monitor->get_total_fl_bn($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_monitor->get_total_ft_bn($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){

			 $button = '
				
				<button value="'.$row->id.'" class="btn btn-danger"   onclick="temp_hapus_order(this.value)">Hapus</button>
				';
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			// "kd_tmp_order"=>$row->kd_tmp_order,
			"nm_bank"=>$row->nm_bank,
			"jml_transfer"=>$row->jml_transfer,
			"no_rekening"=>$row->no_rekening,
			"ats_nm"=>$row->ats_nm,
			"aksi"=>$button
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

	function get_dtorder_mitra(){
		$id = $this->input->get('id', TRUE);
		$row = $this->M_monitor->get_dt_mitra_order($id);

		echo json_encode($row);
	}

	function get_dtmt_pel(){
		$id = $this->input->get('id', TRUE);
		$row = $this->M_monitor->get_dtmt_pel($id);

		echo json_encode($row);
	}

	function get_harga_barang(){
		// if(isset($_POST['id_tindakan'])) {
			$kd_barang = $_POST['kd_barang'];
			$row = $this->M_monitor->get_harga_brg($kd_barang);
			if($row){
				$data = $row->harga_barang;
				// echo json_encode($data);
			}
			echo $data;
			// echo $row;
		// }
	}

	function tambah_mitra_order(){
		date_default_timezone_set("Asia/Jakarta");
		$kd_mitra = $this->input->post('kd_mitra', TRUE);
		$data = $this->M_monitor->get_all_harga($kd_mitra);
		$total = 0;
		$nm_p = $this->input->post('nm_produk', TRUE);

		if($nm_p == 'PR000001'){
			$kd_o = $this->kode_OR();
			$total = (int)$this->input->post('tot_h_paket3', true);
			$all = $this->M_monitor->get_tmp_tahu();
			foreach($all as $row){
				$total = $total + ($row->harga_barang * $row->jml_barang);
				$detail = array(
					"kd_order" => $kd_o,
					"kd_barang" => $row->kd_barang,
					"jml_barang" => $row->jml_barang
				);
				$this->M_monitor->insertdetail($detail);
			}
			$data = array(
				"kd_mitra" => $kd_mitra,
				"kd_order" => $kd_o,
				"total_order"=> $total,
				"dt_trans"=> date('Y-m-d H:i:s'),
				"ats_nm_kirim"=> $this->input->post('ats_nm_kirim', TRUE),
				"almt_kirim"=> $this->input->post('almt_kirim', TRUE),
				"almt_prov_kirim"=> $this->input->post('almt_prov_kirim', TRUE),
				"almt_kt_kirim"=> $this->input->post('almt_kt_kirim', TRUE),
				"almt_kec_kirim"=> $this->input->post('almt_kec_kirim', TRUE),
				"almt_kel_kirim"=> $this->input->post('almt_kel_kirim', TRUE),
				"jml_transfer"=> $this->input->post('jml_transfer', TRUE),
				"nm_bank"=> $this->input->post('nm_bank', TRUE),
				"rekening"=> $this->input->post('rekening', TRUE),
				"ats_nm_rekening"=> $this->input->post('ats_nm_rekening', TRUE),
				"ekspedisi"=> $this->input->post('ekspedisi', TRUE),
				"b_barang"=> $this->input->post('b_barang', TRUE),
				"biaya_kirim"=> $this->input->post('biaya_kirim', TRUE),
				"ket"=> $this->input->post('keterangan', TRUE),
				"porsi"=>$this->input->post('jmlporsi', TRUE),
				"dt_create"=> date('Y-m-d H:i:s'),
				"dt_aktif"=>1
			);
			$this->M_monitor->insert_order($data);

			if($this->input->post('ats_nm_terusan') != ''){
				$data = array(
					"ats_nm_terusan"=> $this->input->post('ats_nm_terusan', TRUE),
					"almt_terusan"=> $this->input->post('almt_terusan', TRUE),
					"almt_kt_terusan"=> $this->input->post('almt_kt_terusan', TRUE),
					"almt_kec_terusan"=> $this->input->post('almt_kec_terusan', TRUE),
					"almt_kel_terusan"=> $this->input->post('almt_kel_terusan', TRUE),
				);
			}

			if($this->input->post('jml_tarif2', true) != ''){
				$data = array(
					'jml_transfer2' => $this->input->post('jml_tarif2', true),
					'nm_bank2' => $this->input->post('nm_bank2', true),
					'rekening2' => $this->input->post('rekening2', true),
					'ats_nm_rekening2' => $this->input->post('ats_nm_rekening2', true),
				);
				$this->M_monitor->update_dtmitra_order($kd_o, $data);
			}
	
			if($this->input->post('jml_tarif3', true) != ''){
				$data = array(
					'jml_transfer3' => $this->input->post('jml_tarif3', true),
					'nm_bank3' => $this->input->post('nm_bank3', true),
					'rekening3' => $this->input->post('rekening3', true),
					'ats_nm_rekening3' => $this->input->post('ats_nm_rekening3', true),
				);
				$this->M_monitor->update_dtmitra_order($kd_o, $data);
			}

			//dt_barang
			if($this->input->post('jmltpng') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('tepung'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmltpng', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmltpng21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('tepung'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmltpng21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmltpng23') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('tepung'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmltpng23', true),
						"paket_tahu" => '2Item3'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlasin') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('asin'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlasin', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlasin21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('asin'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlasin21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlasin22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('asin'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlasin22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlpaperbag') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('paperbag'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlpaperbag', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlpaperbag22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('paperbag'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlpaperbag22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlpaperbag23') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('paperbag'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlpaperbag23', true),
						"paket_tahu" => '2Item3'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe1') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe1'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe1', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe121') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe1'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe121', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe122') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe1'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe122', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbox') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('box'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbox', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbox22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('box'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbox22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbox23') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('box'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbox23', true),
						"paket_tahu" => '2Item3'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe2') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe2'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe2', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe221') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe2'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe221', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe222') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe2'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe222', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe3') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe3'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe3', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe321') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe3'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe321', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlcabe322') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('cabe3'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlcabe322', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbbq') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('bbq'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbbq', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbbq21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('bbq'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbbq21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbbq22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('bbq'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbbq22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbalado') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('balado'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbalado', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbalado21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('balado'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbalado21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlbalado22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('balado'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlbalado22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlkeju') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('keju'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlkeju', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlkeju21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('keju'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlkeju21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlkeju22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('keju'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlkeju22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlpizza') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('pizza'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlpizza', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlpizza21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('pizza'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlpizza21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlpizza22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('pizza'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlpizza22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmljbakar') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('jbakar'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmljbakar', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmljbakar21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('jbakar'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmljbakar21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmljbakar22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('jbakar'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmljbakar22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlabp') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('abaw'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlabp', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlabp21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('abaw'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlabp21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlabp22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('abaw'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlabp22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlsp') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('sapip'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlsp', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlsp21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('sapip'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlsp21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlsp22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('sapip'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlsp22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlka') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('kari'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlka', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlka21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('kari'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlka21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlka22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('kari'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlka22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlrl') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('rumput'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlrl', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlrl21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('rumput'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlrl21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmlrl22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('rumput'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmlrl22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmljm') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('jmljm'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmljm', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmljm21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('jmljm'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmljm21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmljm22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('jmljm'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmljm22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmllh') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('jman'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmllh', true),
						"paket_tahu" => '3Item'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmllh21') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('jman'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmllh21', true),
						"paket_tahu" => '2Item1'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}
			if($this->input->post('jmllh22') != ''){
				$row = $this->M_monitor->cek_kd($nm_p, $this->input->post('ladah'));
				if($row){
					$detail = array(
						"kd_order" => $kd_o,
						"kd_barang" => $row->kd_barang,
						"jml_barang" => $this->input->post('jmllh22', true),
						"paket_tahu" => '2Item2'
					);
					$this->M_monitor->insertdetail($detail);
				}
			}

			$this->M_monitor->tmp_order_delete($kd_mitra);
		}else{
		foreach($data as $row){
			$total = $total + ($row->harga_barang * $row->jml_barang);
			$ko = $row->kd_tmp_order;
			$detail = array(
				"kd_order" => $row->kd_tmp_order,
				"kd_barang"=> $row->kd_barang,
				"jml_barang"=> $row->jml_barang
			);
			$this->M_monitor->insertdetail($detail);
		}
		
		$data = array(
			"total_order"=> $total,
			"dt_trans"=> date('Y-m-d H:i:s'),
			"almt_kirim"=> $this->input->post('almt_kirim', TRUE),
			"almt_kt_kirim"=> $this->input->post('almt_kt_kirim', TRUE),
			"almt_terusan"=> $this->input->post('almt_terusan', TRUE),
			"almt_kt_terusan"=> $this->input->post('almt_kt_terusan', TRUE),
			"jml_transfer"=> $this->input->post('jml_transfer', TRUE),
			"nm_bank"=> $this->input->post('nm_bank', TRUE),
			"rekening"=> $this->input->post('rekening', TRUE),
			"ats_nm_rekening"=> $this->input->post('ats_nm_rekening', TRUE),
			"ekspedisi"=> $this->input->post('ekspedisi', TRUE),
			"b_barang"=> $this->input->post('b_barang', TRUE),
			"biaya_kirim"=> $this->input->post('biaya_kirim', TRUE),
			"ket"=> $this->input->post('keterangan', TRUE),
		);
		$this->M_monitor->tmp_order_delete($kd_mitra);
		$this->M_monitor->update_dtmitra_order($ko, $data);

		if($this->input->post('jml_tarif2', true) != ''){
			$data = array(
				'jml_transfer2' => $this->input->post('jml_tarif2', true),
				'nm_bank2' => $this->input->post('nm_bank2', true),
				'rekening2' => $this->input->post('rekening2', true),
				'ats_nm_rekening2' => $this->input->post('ats_nm_rekening2', true),
			);
			$this->M_monitor->update_dtmitra_order($ko, $data);
		}

		if($this->input->post('jml_tarif3', true) != ''){
			$data = array(
				'jml_transfer3' => $this->input->post('jml_tarif3', true),
				'nm_bank3' => $this->input->post('nm_bank3', true),
				'rekening3' => $this->input->post('rekening3', true),
				'ats_nm_rekening3' => $this->input->post('ats_nm_rekening3', true),
			);
			$this->M_monitor->update_dtmitra_order($ko, $data);
		}

		$last = array(
			'dt_last_order'=>date('Y-m-d')
		);
		$this->M_monitor->update($kd_mitra, $last);
	}
	}

	function tambah_order(){
		$id = '1';
		$kd_mt = $this->input->post('kd_mitra', TRUE);
		$cek = $this->M_monitor->cek_kd_or($kd_mt);
		if($cek){
			$kd_tmp_order = $cek->kd_tmp_order;
		}else{
			$kd_tmp_order = $this->kode_OR();
		}
		$data = array(
			"kd_barang" => $this->input->post('brg', TRUE),
			"jml_barang" => $this->input->post('jml', TRUE),
			"harga_barang" => $this->input->post('harg', TRUE),
			"kd_mitra" => $kd_mt,
			"kd_tmp_order" => $kd_tmp_order
			
		);
		$data_in = array(
			"kd_mitra" => $kd_mt,
			"kd_order" => $kd_tmp_order
		);

		$cek_row = $this->M_monitor->cek_row($kd_mt, $kd_tmp_order);
		if($cek_row == false){
			$this->M_monitor->insert_order($data_in);
		}
		$this->M_monitor->tmp_order_insert($data);
	}
	function tambah_order_tahu(){
		$id = '1';
		$kd_mt = $this->input->post('kd_mitra', TRUE);
		
		$data = array(
			"kd_barang" => $this->input->post('brg', TRUE),
			"jml_barang" => $this->input->post('jml', TRUE),
			"harga_barang" => $this->input->post('harg', TRUE),
			"kd_mitra" => $kd_mt
			
		);
		
		$this->M_monitor->tmp_order_insert($data);
	}

	function tb_bank(){
		$data = array(
			'jml_transfer' => $this->input->post('jml_trf', TRUE),
			'nm_bank' => $this->input->post('nm_bank', TRUE),
			'no_rekening' => $this->input->post('no_rekening', TRUE),
			'ats_nm' => $this->input->post('ats_nm', TRUE),
			'kd_pmby' => $this->get_kode_pmby()
		);
		$this->M_monitor->tmp_pmby_insert($data);
	}
	function tb_bank_ad(){
		$data = array(
			'jml_transfer' => $this->input->post('jml_trf', TRUE),
			'nm_bank' => $this->input->post('nm_bank', TRUE),
			'no_rekening' => $this->input->post('no_rekening', TRUE),
			'ats_nm' => $this->input->post('ats_nm', TRUE),
			'kd_pmby' => $this->input->post('kd_pmby', TRUE)
		);
		$this->M_monitor->tmp_pmby_insert($data);
	}

	function hapus_order(){
		
			$data = $this->input->post('val', TRUE);
			$cek = $this->M_monitor->cek_kd_or($data);
			if($cek){
				$kd_tmp_order = $cek->kd_tmp_order;
			}else{
				$kd_tmp_order = $this->kode_OR();
			}
		$this->M_monitor->tmp_order_delete($data);
		$this->M_monitor->adilaya_order_delete($kd_tmp_order);
	}

	function hapus_bank(){
		$kd_tmp = $this->get_kode_pmby();
		$this->M_monitor->tmp_pmby_delete($kd_tmp);
	}

	function hapus_bank_ad(){
		$kd_tmp = $this->input->post('kd_pmby');
		$this->M_monitor->tmp_pmby_delete($kd_tmp);
	}

	function temp_hapus_order(){
		$data = $this->input->post('val', TRUE);
		$this->M_monitor->tmp_order_deletes($data);
	}

	function kode_OR(){
        $kode = $this->M_monitor->get_kode_order();
        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kodeinv = $data;
        $noUrut = (int) substr($kodeinv, 3, 6);
        $noUrut++;
        $char = "OR";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
	}

	function history($id){
		$row = $this->M_monitor->get_by_id($id);
		if($row){
			$data = array(
				'dthis' => $this->M_monitor->get_history($id),
				'nm_mitra' => set_value('nm_mitra', $row->nm_mitra),
				'almt_rmh' => set_value('almt_rmh', $row->almt_rmh),
				'produk' => set_value('produk', $row->nm_produk)
			);
		}
		
		$this->load->view('monitor/history', $data);
	}

	function update_notif(){
		if(isset($_POST['view'])){
			
			if($_POST["view"] != '')
			{
				$data = array(
					"notif_status" => 1
				);
				$id = 0;
				$this->M_monitor->update_notif($id, $data);
			}
			
			$result = $this->M_monitor->get_all_notif();
			$output = '';
			if($result > 0){
				foreach($result as $row){
					$output .= '
					<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="mr-3">
					  <div class="icon-circle bg-dark">
						<i class="fas fa-file-alt text-white"></i>
					  </div>
					</div>
					<div>
					  <div class="small text-gray-500">'.date('d-m-Y H:i:s', strtotime($row->notif_date)).'</div>
					  <span class="font-weight-bold">'.$row->notif_nm_mitra.'</span><br>
					  <span>'.$row->notif_text.'</span>
					</div>
					';
				}
			}else{
				$output .= '
				<div>
					<span class="font-weight-bold">Tidak Ada Notif</span>
			  	</div>
				';
			}
			
			
			$count = $this->M_monitor->count_notif();
			if($count){
				$jml = $count->total;
			}
			$data = array(
				'notification' => $output,
				'unseen_notification'  => $jml
			);
			
			echo json_encode($data);
			
			}
	}

	function get_nm_mitra(){
		$id = $this->input->get('id', TRUE);
		$data = $this->M_monitor->get_nm_mitra($id);
		echo json_encode($data);
	}

	function get_info_mitra(){
		$id = $this->input->get('id', TRUE);
		$data = array(
			'identy' => $this->M_monitor->get_info_mitra($id),
			'outlet' => $this->M_monitor->get_info_outlet($id)
		);
		echo json_encode($data);
	}

	function get_riwayat_order_mitra(){
		$id = $this->input->get('id', TRUE);
		$data = array(
			'info' => $this->M_monitor->get_info_outlet($id),
			'riwayat' => $this->M_monitor->get_history($id)
		);
		echo json_encode($data);
	}

	function get_riwayat_rinci_order(){
		$id = $this->input->get('id', TRUE);
		$data = $this->M_monitor->rincian_order($id);
		echo json_encode($data);
	}
	
	
}
?>