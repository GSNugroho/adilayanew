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
                        
                        <?php
                            if($mitra){
                                echo '<table><tr><td>Nama Mitra</td><td>:</td><td>'.$mitra->nm_mitra.'</td></tr>
                                <tr><td>Alamat Kirim</td><td>:</td><td>'.$mitra->almt_kirim.'</td></tr>
                                <tr><td>Kota</td><td>:</td><td>'.$mitra->nama_kota.'</td></tr>
                                <tr><td>Ekspedisi</td><td>:</td><td>'.$mitra->ekspedisi.'</td></tr>
                                <tr><td>Total Berat</td><td>:</td><td>'.$mitra->b_barang.' kg</td></tr>
                                <tr><td>Biaya Kirim</td><td>:</td><td>'.$mitra->biaya_kirim.'</td></tr>
                                <tr><td>Keterangan</td><td>:</td><td>'.$mitra->ket.'</td></tr>
                                </table>';
                                
                            }
                        ?>
                        <table class="table table-bordered dataTable">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Sub Total</th>
                            </tr>
                            <?php 
                            if($drior){
                                $total = 0;
                                foreach($drior as $row){
                                    $sub = $row->harga_barang*$row->jml_barang;
                                    echo '<tr><td>'.$row->nm_barang.'</td><td align="right">Rp '.number_format($row->harga_barang,2,',','.').'</td><td align="right">'.$row->jml_barang.'</td><td>'.$row->satuan.'</td><td align="right">Rp '.number_format($sub,2,',','.').'</td></tr>';
                                    $total = $total+($row->harga_barang*$row->jml_barang);
                                };
                                echo '<tr><td colspan="4" align="right">Total :</td><td align="right">Rp '.number_format($total,2,',','.').'</td></tr>';
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