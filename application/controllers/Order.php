<?php
class Order extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_order');
    }

    public function index(){
        $this->load->view('order/order');
	}
	
	public function read($id){
		$row = $this->M_order->dt_mitra_order($id);
		if($row){
			if($row->nm_produk == 'PR000001'){
				$data = array(
					"mitra" => $this->M_order->dt_mitra_order($id),
					"tigaitem" => $this->M_order->rincian_order_tahu3($id),
					"duasitem" => $this->M_order->rincian_order_tahu21($id),
					"duaditem" => $this->M_order->rincian_order_tahu22($id),
					"duatitem" => $this->M_order->rincian_order_tahu23($id),
					"ecer" => $this->M_order->rincian_order_ecer($id),
				);
			}else{
				$data = array(
					"mitra" => $this->M_order->dt_mitra_order($id),
					"drior" => $this->M_order->rincian_order($id)
				);
			}
		}
		
		$this->load->view('order/order_rincian', $data);
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
			$searchQuery .= " and (dt_trans BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
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
		
			// if($this->session->userdata('level')=='1'){
			// 	$button = '
			// 	<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
			// 	<i class="fas fa-info-circle"></i>
			// 	</a>
			// 	<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
			// 	<i class="fas fa-edit"></i>
			// 	</a>
			// 	<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
			// 	<i class="fas fa-trash"></i>
			// 	</a>
			// 	<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
			// 	<i class="fas fa-edit"></i>
			// 	</a>
			// 	';
			// }elseif($this->session->userdata('level')=='2'){
			// 	$button = '
			// 	<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
			// 	<i class="fas fa-info-circle"></i>
			// 	</a>
			// 	<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
			// 	<i class="fas fa-edit"></i>
			// 	</a>
			// 	<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
			// 	<i class="fas fa-trash"></i>
			// 	</a>
			// 	';
			// }elseif($this->session->userdata('level')=='3'){
			// 	$history = '<a href="monitor/history/'.$row->kd_mitra.'" class="btn btn-success" style="width: 100%;">
			// 	History
			// 	</a>';
			if($this->session->userdata('level')=='3'){
				$button = '
				<a href="Order/read/'.$row->kd_order.'" class="btn btn-light">
				<img src="'.base_url('assets/icon/123-1239992_info-svg-png-icon-free-download-info-icon.png').'" width="18" height="18">
				</a>
				
				';
			}elseif($this->session->userdata('level')=='12'){
				$button = '
				<a href="Order/read/'.$row->kd_order.'" class="btn btn-light">
				<i class="fa fa-list" title="Order"></i>
				</a>
				<button value="'.$row->kd_order.'" class="btn btn-light" data-toggle="modal" data-target="#editModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_order.'">
					<i class="fa fa-edit" title="Edit Order"></i>
				</button>
				';
			}
				// <button value="'.$row->kd_mitra.'" class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'" onclick="load(this.value)">Order</button>
			// }
			// onclick="load(this.value)"
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			"nm_mitra"=>$row->nm_mitra,
			"dt_trans"=>date('d-m-Y H:i:s', strtotime($row->dt_trans)),
			"almt_kirim"=>$row->almt_kirim,
			"nama_kota"=>$row->nama_kota,
			"nama_brand"=>$row->nm_produk,
			"button"=>$button
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
		
			// if($this->session->userdata('level')=='1'){
			// 	$button = '
			// 	<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
			// 	<i class="fas fa-info-circle"></i>
			// 	</a>
			// 	<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
			// 	<i class="fas fa-edit"></i>
			// 	</a>
			// 	<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
			// 	<i class="fas fa-trash"></i>
			// 	</a>
			// 	<a href="monitor/order/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
			// 	<i class="fas fa-edit"></i>
			// 	</a>
			// 	';
			// }elseif($this->session->userdata('level')=='2'){
			// 	$button = '
			// 	<a href="monitor/read/'.$row->kd_mitra.'" class="btn btn-info btn-circle">
			// 	<i class="fas fa-info-circle"></i>
			// 	</a>
			// 	<a href="monitor/update/'.$row->kd_mitra.'" class="btn btn-warning btn-circle">
			// 	<i class="fas fa-edit"></i>
			// 	</a>
			// 	<a href="monitor/delete/'.$row->kd_mitra.'" class="btn btn-danger btn-circle">
			// 	<i class="fas fa-trash"></i>
			// 	</a>
			// 	';
			// }elseif($this->session->userdata('level')=='3'){
			// 	$history = '<a href="monitor/history/'.$row->kd_mitra.'" class="btn btn-success" style="width: 100%;">
			// 	History
			// 	</a>';
			if($this->session->userdata('level')=='3'){
				$button = '
				<a href="Order/read/'.$row->kd_order.'" class="btn btn-info" style="width: 100%;color: white">
				Rincian Order
				</a>
				
				';
			}elseif($this->session->userdata('level')=='12'){
				$button = '
				<a href="Order/read/'.$row->kd_order.'" class="btn btn-info" style="width: 100%;color: white">
				Rincian Order
				</a>
				<button value="'.$row->kd_order.'" class="btn btn-light" data-toggle="modal" data-target="#editModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_order.'">
					<i class="fa fa-edit" title="Edit Order"></i>
				</button>
				';
			}
				// <button value="'.$row->kd_mitra.'" class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#exampleModal"  data-keyboard="false" data-backdrop="static" data-whatever="'.$row->kd_mitra.'" onclick="load(this.value)">Order</button>
			// }
			// onclick="load(this.value)"
		$data[] = array( 
			// "kd_inv"=>$row->kd_inv,
			"nm_mitra"=>$row->nm_mitra,
			"dt_trans"=>date('d-m-Y H:i:s', strtotime($row->dt_trans)),
			// "almt_kirim"=>$row->almt_kirim,
			"nama_kota"=>$row->nama_kota,
			// "jml_transfer"=>$row->jml_transfer,
			// "nm_bank"=>$row->nm_bank,
			// "ats_nm_rekening"=>$row->ats_nm_rekening,
			// "nama_ekspedisi"=>$row->nama_ekspedisi,
			// "ket"=>$row->ket,
			"button"=>$button
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

	function getdtorder(){
		$id = $this->input->get('id', TRUE);
		$data = $this->M_order->get_dt_order($id);
		echo json_encode($data);
	}
}
?>