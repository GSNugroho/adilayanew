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
                      <a href="<?php echo site_url('monitor')?>" class="btn btn-danger">Kembali</a>
                      <br>
                      <br>
                      <table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 80%">
                        <tr><td>Nama Mitra</td><td>:</td><td><?php echo $nm_mitra; ?></td></tr>
                        <tr><td>Kota, Tanggal Lahir</td><td>:</td><td><?php echo $kt_lahir; ?>, <?php echo $tgl_lahir;?></td></tr>
                        <tr><td>Tanggal Join</td><td>:</td><td><?php echo $tgl_join; ?></td></tr>
                        <tr><td>Alamat Rumah</td><td>:</td><td><?php echo $almt_rmh; ?></td></tr>
                        <tr><td>Provinsi</td><td>:</td><td><?php echo $prov_rmh; ?></td></tr>
                        <tr><td>Kota</td><td>:</td><td><?php echo $nm_kota; ?></td></tr>
                        <tr><td>No HP</td><td>:</td><td><?php echo $no_hp; ?></td></tr>
                      </table>
                      <br>
                      <table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 80%">
                      <tr><td>Alamat Outlet</td><td>:</td><td><?php echo $almt_outlet; ?></td></tr>
                      <tr><td>Provinsi</td><td>:</td><td><?php echo $prov_outlet; ?></td></tr>
                      <tr><td>Kota</td><td>:</td><td><?php echo $kt_outlet; ?></td></tr>
                      <tr><td>Nama Produk</td><td>:</td><td><?php echo $nm_produk; ?></td></tr>
                      <tr><td>Paket</td><td>:</td><td><?php echo $paket; ?></td></tr>
                      </table>
                      <br>
                      Rincian Pembayaran Mitra Join :
                      <table class="table table-bordered dataTable" style="width: 80%">
                        <tr>
                          <th>Atas Nama</th>
                          <th>Nama Bank</th>
                          <th>No Rekening</th>
                          <th>Jumlah Transfer</th>
                        </tr>
                        <?php
                          foreach($rin_by as $row){
                            echo '<tr><td>'.$row->ats_nm.'</td><td>'.$row->nm_bank.'</td><td>'.$row->no_rekening.'</td><td>'.$row->jml_transfer.'</td>
                            </tr>';
                        };
                        ?>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
    </body>
</html>