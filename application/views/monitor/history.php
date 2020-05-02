<?php
	$this->load->view('mainmenu');
?>
	
<link href="<?php echo base_url('assets/nav-pill/nav-pill.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
    
<!-- <script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js') ?>"></script> -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
    
<script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>
    <style>
    table {
            table-layout: fixed;
        }
        textarea{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }
    input[type=number] {
        -moz-appearance: textfield;
        padding-left: 6px;
        padding-right: 6px;
    }
    .card{
        border-radius: 30px;
    }
    .logo-adilaya{
        position: relative;
        float: right;
    }
    </style>
    
    <div class="content-wrapper">
      <div class="row mb-2">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title mb-4">Informasi Mitra</h5>
                      <div class="logo-adilaya">
                          <img src="<?php echo base_url('assets/image/adilaya.png')?>" width="144" height="135">
                      </div>
                      <h2></h2>
                      <!-- <a href="<?php echo site_url('monitor')?>" class="btn btn-danger">Kembali</a> -->
                      Nama Mitra : <?php echo $nm_mitra?> <br>
                      Alamat Rumah : <?php echo $almt_rmh?>
                      <table class="table table-bordered dataTable">
                          <tr>
                              <th>Tanggal Order</th>
                              <th>Total Biaya Order</th>
                              <th>Ekspedisi</th>
                              <th>Berat</th>
                              <th>Biaya Kirim</th>
                              <th>Rincian Order</th>
                          </tr>
                          <?php 
                          if($dthis){
                              foreach($dthis as $row){
                                  echo '<tr><td>'.date('d-m-Y', strtotime($row->dt_trans)).'</td><td>Rp '.number_format($row->total_order,2,',','.').'</td><td>'.$row->nama_ekspedisi.'</td><td>'.$row->b_barang.' kg</td><td>'.$row->biaya_kirim.'</td>
                                  <td><a href="'.base_url().'Order/read/'.$row->kd_order.'" class="btn btn-info" style="width: 100%;color: white">
                                  Rincian Order
                                  </a></td></tr>';
                              };
                          }else{
                              echo 'Tidak ada data';
                          }
                          ?>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
    </body>
</html>