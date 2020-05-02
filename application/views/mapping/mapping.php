<?php
	$this->load->view('mainmenu');
?>
    	
<link href="<?php echo base_url('assets/nav-pill/nav-pill.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>" />
    

<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>

<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>
<style>
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
<script>
    $(document).ready(function () {
        var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script>
<div class="ws-main-content">
    <div class="check-awb-container">
        <div class="title">
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/address.svg')?>" style="margin-right: 17px;margin-bottom: 4px;">
            Data Mapping Lokasi Mitra
        </div>
    </div>
    <div class="check-awb-content" style="margin-top:5%;">
        <div class="container">
            <div class="check-awb-wrapper">   
                <div class="awb-input-field">   
                    <div class="row ">
                        <div class="col-md-12">
                                         
                    <br>
                    <div class="form-group" style="margin-top:-85px; margin-left:2%">
                        <label for="searching"></label>
                        <div class="input-group">
                            <span class="input-group-addon"><img src='<?php echo base_url('assets/icon/search--v2.png')?>' width='20' height='20'></span>
                            <input class="form-control" name="cari_nm_mitra" id="cari_nm_mitra" style="height: 44px;width:20%" placeholder="Masukkan nama mitra">
                        </div>
                    </div>
                    <br>
                    <br>
                    
                    
                    
                    <div id="dynamic-tabs">
                        <ul>
                            <li class="tabs" data-source="<?php echo base_url('Mapping/dt_mt_hri')?>" data-table="mthri-table"><a href="#tab-mthri">Hari ini</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('Mapping/dt_dp')?>" data-table="dp-table"><a href="#tab-dp">DP</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('Mapping/dt_cc')?>" data-table="cc-table"><a href="#tab-cc">Cicilan</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('Mapping/dt_lunas')?>" data-table="lunas-table"><a href="#tab-lunas">Lunas</a>
                            </li>
                        </ul>
                        <div id="tab-mthri" class="table-responsive">
                            <table id="mthri-table" class="table table-borderless" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Join</th>
                                        <th>Tanggal Lunas</th>
                                        <th>Status</th>
                                        <th>Kota</th>
                                        <th>Paket</th>
                                        <th style="width:16%;">Cek Info Detail</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-dp" class="table-responsive">
                            <table id="dp-table" class="table table-borderless" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Join</th>
                                        <th>Tanggal Lunas</th>
                                        <th style="display: none;">Status</th>
                                        <th>Kota</th>
                                        <th>Paket</th>
                                        <th style="width:16%;">Cek Info Detail</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-cc" class="table-responsive">
                            <table id="cc-table" class="table table-borderless" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Join</th>
                                        <th>Tanggal Lunas</th>
                                        <th style="display: none;">Status</th>
                                        <th>Kota</th>
                                        <th>Paket</th>
                                        <th style="width:16%;">Cek Info Detail</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-lunas" class="table-responsive">
                            <table id="lunas-table" class="table table-borderless" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Join</th>
                                        <th>Tanggal Lunas</th>
                                        <th style="display: none;">Status</th>
                                        <th>Kota</th>
                                        <th>Paket</th>
                                        <th style="width:13%;">Cek Info Detail</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
    $this->load->view('footer');
?>
                    
                    <script>
                            $(function() {
                                $(".tabs").click(function(){
                                var source = $(this).data("source");
                                var tableId = $(this).data("table");
                                console.log(tableId);
                                initiateTable(tableId,source);
                                });

                                function initiateTable(tableId, source) {
                                    if(tableId === 'mthri-table'){visible = true}else{visible = false}
                                    var table = $("#" + tableId).DataTable({
                                        language: {
                                            "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                                            "sProcessing":   "Sedang memproses...",
                                            "sLengthMenu":   "Tampilkan _MENU_ entri",
                                            "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                                            "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                            "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                                            "sInfoPostFix":  "",
                                            "sSearch":       "Cari:",
                                            "sUrl":          "",
                                            "oPaginate": {
                                                "sFirst":    "Pertama",
                                                "sPrevious": "Sebelumnya",
                                                "sNext":     "Selanjutnya",
                                                "sLast":     "Terakhir"
                                            }
                                            },
                                            'order': [[ 0, "desc" ]],
                                            'processing': true,
                                            'serverSide': true,
                                            "info":     false,
                                            "searching": false,
                                            "pagingType": "simple",
                                            "dom": '<"top"i>rt<"bottom"flp><"clear">',
                                            'serverMethod': 'post',
                                        "ajax": {
                                            'url' : source,
                                            'data' : function(data){
                                                var awal = $('#tgl1').val();
                                                var akhir = $('#tgl2').val();

                                                data.searchByAwal = awal;
                                                data.searchByAkhir = akhir;
                                            }
                                        },
                                        "columnDefs": [
                                            {
                                                "targets": [ 3 ],
                                                "visible": visible
                                            }
                                        ],
                                        'columns': [
                                            //{ data: 'no' },
                                            //  { data: 'kd_inv' },
                                            { data: 'nm_mitra' },
                                            { data: 'dt_create'},
                                            { data: 'dt_pelunasan' },
                                            { data: 'sts_pmby' },
                                            { data: 'almt_kt_rmh' },
                                            { data: 'paket' },
                                            { data: 'action'}
                                        ],
                                        "destroy": true,
                                        "bFilter": true
                                        // "bLengthChange": false,
                                        // "bPaginate": false
                                    });
                                    table.on( 'draw', function () {
                                        $('.paginate_button.previous').html("<img src='<?php echo base_url('assets/icon/previous.png')?>' width='30' height='30'>");
                                        $('.paginate_button.next').html("<img src='<?php echo base_url('assets/icon/next.png')?>' width='30' height='30'>");
                                        var total_records = table.rows().count();
                                        var page_length = table.page.info().length;
                                        var total_pages = Math.ceil(total_records / page_length);
                                        var current_page = table.page.info().page+1;
                                    } );
                                    $('#tgl2').on('dp.change', function(){
                                        table.draw(true);
                                    });
                                }
                                initiateTable("mthri-table", "<?php echo base_url('Mapping/dt_mt_hri')?>");
                                $("#dynamic-tabs").tabs();

                            });
                        </script>
                    <div class="modal fade" id="modalPelunasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <!-- <h3 class="modal-title" id="exampleModalLabel">Data Order</h3> -->
                                </div>
                                <div class="modal-body">
                                    <div class="card-header d-flex p-0">
                                        <h3 class="card-title p-3">Data Mitra</h3>
                                        <ul class="nav nav-pillsl ml-auto p-2">
                                            <li class="nav-item"><a class="nav-link" href="#tabs_1" data-toggle="tab">Identitas</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tabs_2" data-toggle="tab">Outlet</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tabs_3" data-toggle="tab">Pengiriman</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tabs_4" data-toggle="tab">Jenis Pembayaran</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tabs_1">
                                                <div class="form-group">
                                                    <label for="nm_mitra">Nama Mitra </label> <?php echo form_error('nm_mitra')?>
                                                    <input class="form-control" type="text" name="dt_nm_mitra" id="dt_nm_mitra" style="width: 80%;" disabled>
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='10%'>
                                                        <div class="form-group">
                                                            <label for="tgl_terima">Kota & Tanggal Lahir </label> <?php echo form_error('tgl_lahir') ?>
                                                                <input class="form-control" type="text" name="dt_kt_lahir" id="dt_kt_lahir" placeholder="Kota" disabled>
                                                            </div>
                                                        </td>
                                                        <td width='40%'>
                                                        <div class="form-group">
                                                            <label style="height: 32px;"></label>
                                                            <input class="form-control" type="text" name="dt_tgl_lahir" id="dt_tgl_lahir" placeholder="dd-mm-yyyy" disabled>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <label for="almt_rmh">Alamat Rumah</label> <?php echo form_error('almt_rmh') ?>
                                                    <input class="form-control" type="text" name="dt_almt_rmh" id="dt_almt_rmh" style="width: 80%;" >
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="provinsi">Provinsi</label>
                                                                <select class="select2-A provinsi" name="dt_provinsi" id="dt_provinsi" style="width: 100%;">
                                                                <?php
                                                                echo "<option></option>";
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id."' >".$row->name."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                    <select class="select2-A kota" name="dt_almt_kt_rmh" id="dt_almt_kt_rmh" style="width: 100%;">
                                                                        
                                                                    </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kec_rmh">Kecamatan</label>
                                                                <select class="select2-A kecamatan" name="dt_almt_kec_rmh" id="dt_almt_kec_rmh" style="width:100%">
                                                                    
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kel_rmh">Kelurahan</label>
                                                                <select class="select2-A kelurahan" name="dt_almt_kel_rmh" id="dt_almt_kel_rmh" style="width:100%">
                                                                    
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="no_hp1">Nomor Handphone</label>
                                                                <input class="form-control" name="dt_no_hp1" id="dt_no_hp1" style="width: 100%" >
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="no_hp2">Nomor Handphone</label>
                                                                <input class="form-control" name="dt_no_hp2" id="dt_no_hp2" style="width: 100%" >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="tabs_2">
                                                <div class="form-group">
                                                        <label for="almt_outlet">Alamat Outlet</label> <?php echo form_error('almt_outlet') ?>
                                                        <input class="form-control" type="text" name="dt_almt_outlet" id="dt_almt_outlet" style="width: 80%;" disabled>
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="provinsi">Provinsi</label>
                                                                <select class="select2-A provinsi" name="dt_provinsi" id="dt_provinsi2" style="width: 100%;" disabled>
                                                                <?php
                                                                echo "<option></option>";
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id."' >".$row->name."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                <select class="select2-A kota" name="dt_almt_kt_outlet" id="dt_almt_kt_outlet" style="width: 100%;" disabled>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kec_rmh">Kecamatan</label>
                                                                <select class="select2-A kecamatan" name="dt_almt_kec_outlet" id="dt_almt_kec_outlet" style="width:100%" disabled>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kel_rmh">Kelurahan</label>
                                                                <select class="select2-A kelurahan" name="dt_almt_kel_outlet" id="dt_almt_kel_outlet" style="width:100%" disabled>
                                                                    
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <div class="form-group">
                                                        <label for="almt_outlet">Alamat Outlet Perbaikan</label> <?php echo form_error('almt_outlet') ?>
                                                        <input class="form-control" type="text" name="in_almt_outlet_prb" id="in_almt_outlet_prb" style="width: 80%;">
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='50%'>
                                                        <div class="form-group">
                                                                <label for="provinsi">Provinsi</label>
                                                                <select class="select2-A provinsi" name="in_provinsi" id="in_provinsi2" style="width: 100%;">
                                                                <?php
                                                                echo "<option></option>";
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id."' >".$row->name."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                <select class="select2-A kota" name="in_almt_kt_outlet" id="in_almt_kt_outlet" style="width: 100%;">
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kec_rmh">Kecamatan</label>
                                                                <select class="select2-A kecamatan" name="in_almt_kec_outlet" id="in_almt_kec_outlet" style="width:100%">
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kel_rmh">Kelurahan</label>
                                                                <select class="select2-A kelurahan" name="in_almt_kel_outlet" id="in_almt_kel_outlet" style="width:100%">
                                                                    
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- <div class="form-group">
                                                    <input type="checkbox" name="incek2" id="incek3"> Seperti Alamat Rumah
                                                </div> -->
                                            </div>
                                            <div class="tab-pane" id="tabs_3">
                                                <div class="form-group">
                                                    <label for="ats_nm_penerima">Atas Nama</label>
                                                    <input class="form-control" type="text" name="dt_ats_nm_penerima" id="dt_ats_nm_penerima" style="width: 80%">
                                                </div>
                                                <div class="form-group">
                                                        <label for="almt_kirim">Alamat Kirim</label> <?php echo form_error('almt_kirim') ?>
                                                        <input class="form-control" type="text" name="dt_almt_kirim" id="dt_almt_kirim" style="width: 80%;" disabled>
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="provinsi">Provinsi</label>
                                                                <select class="select2-A provinsi" name="dt_provinsi3" id="dt_provinsi3" style="width: 100%;" disabled>
                                                                <?php
                                                                echo "<option></option>";
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id."' >".$row->name."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>                               
                                                            <div class="form-group">
                                                                <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                <select class="select2-A kota" name="dt_almt_kt_kirim" id="dt_almt_kt_kirim" style="width:100%" disabled>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kec_rmh">Kecamatan</label>
                                                                <select class="select2-A kecamatan" name="dt_almt_kec_kirim" id="dt_almt_kec_kirim" style="width:100%" disabled>                                                                    
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kel_rmh">Kelurahan</label>
                                                                <select class="select2-A kelurahan" name="dt_almt_kel_kirim" id="dt_almt_kel_kirim" style="width:100%" disabled>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                        <label for="almt_kirim">Alamat Kirim Perbaikan</label> <?php echo form_error('almt_kirim') ?>
                                                        <input class="form-control" type="text" name="dt_almt_kirim_prb" id="dt_almt_kirim_prb" style="width: 80%;">
                                                </div>
                                                <table width='80%'>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="provinsi">Provinsi</label>
                                                                <select class="select2-A provinsi" name="in_provinsi3" id="in_provinsi3" style="width: 100%;">
                                                                <?php
                                                                echo "<option></option>";
                                                                foreach ($dd_pr as $row) {  
                                                                    echo "<option value='".$row->id."' >".$row->name."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>                               
                                                        <div class="form-group">
                                                                <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                                                <select class="select2-A kota" name="in_almt_kt_kirim" id="in_almt_kt_kirim" style="width:100%">
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kec_rmh">Kecamatan</label>
                                                                <select class="select2-A kecamatan" name="in_almt_kec_kirim" id="in_almt_kec_kirim" style="width:100%">                                                                    
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="almt_kel_rmh">Kelurahan</label>
                                                                <select class="select2-A kelurahan" name="in_almt_kel_kirim" id="in_almt_kel_kirim" style="width:100%">
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- <div class="form-group">
                                                <input type="checkbox" name="in_cek" id="in_cek1" value="1"><label for="in_cek1">&nbsp Seperti Alamat Rumah</label>
                                                    &nbsp&nbsp
                                                    <input type="checkbox" name="in_cek" id="in_cek2" value="2"><label for="in_cek2">&nbsp Seperti Alamat Outlet</label>
                                                </div> -->
                                                <div class="form-group">
                                                    <input type="checkbox" name="in_penerusan" id="in_penerusan">&nbsp&nbsp Penerusan Alamat
                                                </div>
                                                <div class="form-group">
                                                    <label for="almt_terusan">Atasnama Penerusan</label>
                                                    <input class="form-control" type="text" name="in_ats_nm_terusan" id="in_ats_nm_terusan" style="width: 80%;" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="almt_terusan">Penerusan Alamat</label>
                                                    <input class="form-control" type="text" name="in_almt_terusan" id="in_almt_terusan" style="width: 80%;" disabled>
                                                </div>
                                                <table width="80%">
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="prov_terusan">Provinsi</label>
                                                                <select class="select2-A provinsi" name="in_prov_terusan" id="in_prov_terusan" style="width: 100%;" disabled>
                                                                    <?php
                                                                    echo '<option></option>';
                                                                    foreach ($dd_pr as $row) {  
                                                                        echo "<option value='".$row->id."' >".$row->name."</option>";
                                                                        }
                                                                        echo"
                                                                    </select>"
                                                                    ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                        <div class="form-group">
                                                            <label for="kt_terusan">Kota</label> 
                                                            <select class="select2-A kota" name="in_kt_terusan" id="in_kt_terusan" style="width: 100%;" disabled>
                                                            </select>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="kec_terusan">Kecamatan</label>
                                                                <select class="select2-A kecamatan" name="in_kec_terusan" id="in_kec_terusan" style="width:100%" disabled>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="kel_terusan">Kelurahan</label>
                                                                <select class="select2-A kelurahan" name="in_kel_terusan" id="in_kel_terusan" style="width:100%" disabled>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- <div class="form-group">
                                                <input type="checkbox" name="cekter" id="in_cekter1" value="1" disabled><label for="in_cekter1">&nbsp Seperti Alamat Rumah</label>
                                                    &nbsp&nbsp
                                                    <input type="checkbox" name="cekter" id="in_cekter2" value="2" disabled><label for="in_cekter2">&nbsp Seperti Alamat Outlet</label>
                                                </div> -->
                                            </div>
                                            <div class="tab-pane" id="tabs_4">
                                                <div class="form-group">
                                                    <label for="pembayaran">Pembayaran</label><br>
                                                    <!-- <input type="radio" name="sts_pmby" id="sts_pmby1" value="1"> DP
                                                    <input type="radio" name="sts_pmby" id="sts_pmby2" value="2"> Lunas -->
                                                    <select class="form-control" name="in_sts_pmby" id="in_sts_pmby" style="width: 80%">
                                                        <option value="3">Cicilan</option>
                                                        <option value="4">Pelunasan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nm_produk">Nama Produk</label>
                                                    <select class="form-control" name="in_nm_produk" id="in_nm_produk" style="width: 80%">
                                                        <option value="0">Pilih</option>
                                                        <?php
                                                        foreach ($dd_pro as $row) {  
                                                            echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                                            }
                                                            echo"
                                                        </select>"
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="paket">Paket</label> 
                                                    <select class="form-control" name="in_paket" id="in_paket" style="width: 80%">
                                                        <option value="0">Pilih</option>
                                                    </select>
                                                </div>
                                                <div class="dt_bank_form">
                                                    <table width='80%'>
                                                        <tr>
                                                            <td width='20%'>
                                                                <div class="form-group">
                                                                    <label for="rekening">Bank</label>
                                                                    <select class="form-control" name="in_nm_bank" id="in_nm_bank" style="width: 100%;">
                                                                        <option value="0">Pilih</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td width='80%'>
                                                                <div class="form-group">
                                                                    <label for="no_rekening">Nomor Rekening</label>
                                                                    <input class="form-control" type="text" name="in_rekening" id="in_rekening" style="width: 100%">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="form-group">
                                                        <label for="jml_tarif">Jumlah Transfer</label>
                                                        <input class="form-control" type="text" name="in_jml_tarif" id="in_jml_tarif" style="width: 80%;">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="in_ats_nm_rekening" id="in_ats_nm_rekening" placeholder="Atas Nama" style="width: 80%;">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="dt_kd_pmby" id="dt_kd_pmby">
                                                <!-- <button class="btn btn-primary" id="tambah" value="tambah" onclick="tmb_bank()">Tambah</button> -->
                                                <button class="btn btn-primary" id="dt_tambah" value="tambah">Tambah Bank</button>
                                                
                                                <script>
                                                $(document).ready(function() {
                                                    var max_fields      = 3; //maximum input boxes allowed
                                                    var wrapper   		= $(".dt_bank_form"); //Fields wrapper
                                                    var add_button      = $("#dt_tambah"); //Add button ID
                                                    
                                                    var x = 1; //initlal text box count
                                                    $(add_button).click(function(e){ //on add input button click
                                                        e.preventDefault();
                                                        if(x < max_fields){ //max input box allowed
                                                            x++; //text box increment
                                                            $(wrapper).append(`    
                                                            <div class=".dtbank">
                                                            <table width='80%'>
                                                                    <tr>
                                                                        <td width='20%'>
                                                                            <div class="form-group">
                                                                                <label for="rekening">Bank</label>
                                                                                <select class="form-control" name="dt_nm_bank" id="dt_nm_bank`+x+`" style="width: 100%;">
                                                                                    <option value="BNI">BNI</option>
                                                                                    <option value="BRI">BRI</option>
                                                                                    <option value="BCA">BCA</option>
                                                                                    <option value="Mandiri">Mandiri</option>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <td width='80%'>
                                                                            <div class="form-group">
                                                                                <label for="no_rekening">Nomor Rekening</label>
                                                                                <input class="form-control" type="text" name="dt_rekening" id="dt_rekening`+x+`" style="width: 100%">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <div class="form-group">
                                                                    <label for="jml_tarif">Jumlah Transfer</label>
                                                                    <input class="form-control" type="text" name="dt_jml_tarif" id="dt_jml_tarif`+x+`" style="width: 80%;">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="dt_ats_nm_rekening" id="dt_ats_nm_rekening`+x+`" placeholder="Atas Nama" style="width: 80%;">
                                                                </div>
                                                            <a href="#" class="remove_field">Remove</a></div>`); //add input box
                                                            console.log('aaa');
                                                        }
                                                    });
                                                    
                                                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                                        e.preventDefault(); $(this).parent('div').remove(); x--;
                                                    })
                                                });
                                                </script>
                                                <br>
                                                <div class="form-group">
                                                    <input type="checkbox" name="tmbbb" id="tmbb">&nbsp&nbsp Tambah Bahan Baku
                                                </div>
                                                <div id="by_tmbb" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="biaya_tmbbb">Biaya Tambahan Bahan Baku</label>
                                                        <input class="form-control" type="text" name="in_by_tmbbb" id="in_by_tmbbb" style="width: 80%;">
                                                    </div>
                                                    <table width='80%'>
                                                        <tr>
                                                            <td width='20%'>
                                                                <div class="form-group">
                                                                    <label for="rekening">Bank</label>
                                                                    <select class="form-control" name="in_nm_bank_tmbbb" id="in_nm_bank_tmbbb" style="width: 100%;">
                                                                        <option value="BNI">BNI</option>
                                                                        <option value="BRI">BRI</option>
                                                                        <option value="BCA">BCA</option>
                                                                        <option value="Mandiri">Mandiri</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td width='80%'>
                                                                <div class="form-group">
                                                                    <label for="no_rekening">Nomor Rekening</label>
                                                                    <input class="form-control" type="text" name="in_rekening_tmbbb" id="in_rekening_tmbbb" style="width: 100%">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="form-group">
                                                        <label for="jml_tarif">Jumlah Transfer</label>
                                                        <input class="form-control" type="text" name="in_jml_tarif_tmbbb" id="in_jml_tarif_tmbbb" style="width: 80%;">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="in_ats_nm_rekening_tmbbb" id="in_ats_nm_rekening_tmbbb" placeholder="Atas Nama" style="width: 80%;">
                                                    </div>
                                                </div>
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#tmbb').on('click', function(){
                                                                if($('#tmbb').is(':checked')){
                                                                    $('#by_tmbb').show();
                                                                }else{
                                                                    $('#by_tmbb').hide();
                                                                }
                                                            })
                                                        })
                                                    </script>
                                                <table width="80%">
                                                    <tr>
                                                        <td width='50%'>
                                                            <div class="form-group">
                                                                <label for="ekspedisi">Ekspedisi</label>
                                                                <select class="form-control" name="in_ekspedisi" id="in_ekspedisi" style="width: 100%;">
                                                                    <option value="0">Pilih</option>
                                                                <?php
                                                                foreach ($dd_ek as $row) {  
                                                                    echo "<option value='".$row->kd_ekspedisi."' >".$row->nama_ekspedisi."</option>";
                                                                    }
                                                                    echo"
                                                                </select>"
                                                            ?>
                                                            </div>
                                                        </td>
                                                        <td width='50%'>             
                                                            <div class="form-group">
                                                                <label for="biaya_kirim">Biaya Kirim</label>
                                                                <input class="form-control" type="text" name="in_biaya_kirim" id="in_biaya_kirim" style="width: 100%;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <label for="tambahan">Tambahan</label>
                                                    <input class="form-control" type="text" name="in_tambahan" id="in_tambahan" style="width: 80%;">
                                                </div>
                                                <input type="hidden" name="dt_kd_mitra" id="dt_kd_mitra">
                                                
                                                <button type="submit" class="btn btn-success" id="update_byr" style="color: white;" onclick="update_byr()">Simpan</button>
                                                <button class="btn btn-danger" onclick="ttp()">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <script>
                        $(".provinsi").select2({
                        dropdownParent: $('.modal-body', '#modalPelunasan'),
                         placeholder: "Pilih Provinsi",
                        allowClear: true
                        });
                        $(".kota").select2({
                        dropdownParent: $('.modal-body', '#modalPelunasan'),
                         placeholder: "Pilih Kota",
                        allowClear: true
                        });
                        $(".kecamatan").select2({
                        dropdownParent: $('.modal-body', '#modalPelunasan'),
                         placeholder: "Pilih Kecamatan",
                        allowClear: true
                        });
                        $(".kelurahan").select2({
                        dropdownParent: $('.modal-body', '#modalPelunasan'),
                         placeholder: "Pilih Kelurahan",
                        allowClear: true
                        });

                    var rupiah3 = document.getElementById('in_jml_tarif');
                    rupiah3.addEventListener('keyup', function(e){
                        rupiah3.value = formatRupiah3(this.value, 'Rp ');
                    });
                
                    function formatRupiah3(angka, prefix){
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                    
                        if(ribuan){
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }
                    
                        rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
                        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah :'');
                    }
                
                
                
                    var kirim3 = document.getElementById('in_biaya_kirim');
                    kirim3.addEventListener('keyup', function(e){
                        kirim3.value = formatRupiahKirim3(this.value, 'Rp ');
                    });

                    function formatRupiahKirim3(angka, prefix){
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        kirim = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        if(ribuan){
                            separator = sisa ? '.' : '';
                            kirim += separator + ribuan.join('.');
                        }

                        kirim = split[1] != undefined ? kirim + '.' + split[1] : kirim;
                        return prefix == undefined ? kirim : (kirim ? 'Rp ' + kirim :'');
                    }

                    function ttp(){
                            // document.getElementById('dt_nm_mitra').value = '';
                            // document.getElementById('dt_kt_lahir').value = '';
                            // document.getElementById('dt_tgl_lahir').value = '';
                            // document.getElementById('dt_almt_rmh').value = '';
                            // document.getElementById('dt_provinsi').value = '0';
                            // document.getElementById('dt_almt_kt_rmh').value = '0';
                            // document.getElementById('dt_no_hp1').value = '';
                            // document.getElementById('dt_no_hp2').value = '';
                            // document.getElementById('dt_almt_outlet').value = '';
                            // document.getElementById('dt_provinsi2').value = '0';
                            // document.getElementById('dt_almt_kt_outlet').value = '0';
                            // document.getElementById('dt_provinsi3').value = '0';
                            // document.getElementById('dt_almt_kirim').value = '';
                            // document.getElementById('dt_almt_kt_kirim').value = '0';
                            // document.getElementById('dt_almt_terusan').value = '';
                            // document.getElementById('dt_prov_terusan').value = '0';
                            // document.getElementById('dt_kt_terusan').value = '0';
                            // // document.getElementById('dt_nm_marketing').value = '';
                            // document.getElementById('dt_sts_pmby').value = '0';
                            // document.getElementById('dt_nm_produk').value = '0';
                            // document.getElementById('dt_paket').value = '0';
                            // document.getElementById('dt_ekspedisi').value = '0';
                            // document.getElementById('dt_biaya_kirim').value = '';
                            // document.getElementById('dt_cek3').checked = false;
                            // document.getElementById('dt_cek1').checked = false;
                            // document.getElementById('dt_cekter1').checked = false;
                            // document.getElementById('dt_cekter2').checked = false;
                            // document.getElementById('dt_penerusan').checked = false;
                            // lunas.destroy();
                            // $('#dttableBank').DataTable().ajax.reload();
                            $('.nav-pillsl a:first').tab('show');
                            $('#modalPelunasan').modal('hide');
                    }

                    $(document).ready(function(){
                        $('#in_penerusan').on('click', function(){
                            if($('#in_penerusan').is(':checked')){
                                $('#in_ats_nm_terusan').prop('disabled', false);
                                $('#in_almt_terusan').prop('disabled', false);
                                $('#in_prov_terusan').prop('disabled', false);
                                $('#in_kt_terusan').prop('disabled', false);
                                $('#in_kec_terusan').prop('disabled', false);
                                $('#in_kel_terusan').prop('disabled', false);
                                console.log('a');
                            }else{
                                $('#in_almt_terusan').prop('disabled', true);
                                $('#in_prov_terusan').prop('disabled', true);
                                $('#in_kt_terusan').prop('disabled', true);
                                $('#in_kec_terusan').prop('disabled', true);
                                $('#in_kel_terusan').prop('disabled', true);
                                $('#in_ats_nm_terusan').prop('disabled', true);
                                $('#in_almt_terusan').val('');
                                $('#in_prov_terusan').val(null).trigger('change');
                                $('#in_kt_terusan').val(null).trigger('change');
                                $('#in_kec_terusan').val(null).trigger('change');
                                $('#in_kel_terusan').val(null).trigger('change');
                                console.log('b');
                            }
                        })
                    })

                      function update_byr(){
                        // var byr = $('#dt_sts_pmby').val();
                        var kd_mitra = $('#dt_kd_mitra').val();
                        var almt_rmh = $('#dt_almt_rmh').val();
                        var almt_prov_rmh = $('#dt_provinsi option:selected').val();
                        var almt_kt_rmh = $('#dt_almt_kt_rmh option:selected').val();
                        var almt_kec_rmh =$('#dt_almt_kec_rmh option:selected').val();
                        var almt_kel_rmh =$('#dt_almt_kel_rmh option:selected').val();
                        var sts_pmby = $('#in_sts_pmby option:selected').val();
                        var nm_produk = $('#in_nm_produk option:selected').val();
                        var paket = $('#in_paket option:selected').val();
                        var ekspedisi =$('#in_ekspedisi option:selected').val();
                        var biaya_kirim = $('#in_biaya_kirim').val();
                        var tambahan = $('#in_tambahan').val();
                        var pembayaran = $('#dt_kd_pmby').val();
                        var jml_tarif = $('#in_jml_tarif').val();
                        var nm_bank = $('#in_nm_bank option:selected').val();
                        var rekening = $('#in_rekening').val();
                        var ats_nm_rekening = $('#in_ats_nm_rekening').val();

                        var dataString = 'kd_mitra='+kd_mitra+'&almt_rmh='+almt_rmh+'&almt_prov_rmh='+almt_prov_rmh+'&almt_kt_rmh='+almt_kt_rmh+'&almt_kec_rmh='+almt_kec_rmh+'&almt_kel_rmh='+almt_kel_rmh+'&sts_pmby='+sts_pmby+'&nm_produk='+nm_produk+'&paket='+paket+'&ekspedisi='+ekspedisi+'&biaya_kirim='+biaya_kirim+
                        '&tambahan='+tambahan+'&pembayaran='+pembayaran+'&jml_tarif='+jml_tarif+'&nm_bank='+nm_bank+'&rekening='+rekening+'&ats_nm_rekening='+ats_nm_rekening;
                        if($('#in_almt_outlet').val() !== undefined){
                            var almt_outlet = $('#in_almt_outlet').val();
                            var almt_prov_outlet = $('#in_provinsi2 option:selected').val();
                            var almt_kt_outlet = $('#in_almt_kt_outlet option:selected').val();
                            var almt_kec_outlet = $('#in_almt_kec_outlet option:selected').val();
                            var almt_kel_outlet = $('#in_almt_kel_outlet option:selected').val();
                            dataString += '&almt_outlet='+almt_outlet+'&almt_prov_outlet='+almt_prov_outlet+'&almt_kt_outlet='+almt_kt_outlet+'&almt_kec_outlet='+almt_kec_outlet+'&almt_kel_outlet='+almt_kel_outlet;
                        }else{
                            var almt_outlet = $('#dt_almt_outlet').val();
                            var almt_prov_outlet = $('#dt_provinsi2 option:selected').val();
                            var almt_kt_outlet = $('#dt_almt_kt_outlet option:selected').val();
                            var almt_kec_outlet = $('#dt_almt_kec_outlet option:selected').val();
                            var almt_kel_outlet = $('#dt_almt_kel_outlet option:selected').val();
                            dataString += '&almt_outlet='+almt_outlet+'&almt_prov_outlet'+almt_prov_outlet+'&almt_kt_outlet='+almt_kt_outlet+'&almt_kec_outlet='+almt_kec_outlet+'&almt_kel_outlet='+almt_kel_outlet;
                        }
                        if($('#in_almt_kirim').val() !== undefined){
                            var almt_kirim = $('#in_almt_kirim').val();
                            var almt_prov_kirim = $('#in_provinsi3 option:selected').val();
                            var almt_kt_kirim = $('#in_almt_kt_kirim option:selected').val();
                            var almt_kec_kirim = $('#in_almt_kec_kirim option:selected').val();
                            var almt_kel_kirim = $('#in_almt_kel_kirim option:selected').val();
                            dataString += '&almt_kirim='+almt_kirim+'&almt_prov_kirim='+almt_prov_kirim+'&almt_kt_kirim='+almt_kt_kirim+'&almt_kec_kirim='+almt_kec_kirim+'&almt_kel_kirim='+almt_kel_kirim;
                        }else{
                            var almt_kirim = $('#dt_almt_kirim').val();
                            var almt_prov_kirim = $('#dt_provinsi3 option:selected').val();
                            var almt_kt_kirim = $('#dt_almt_kt_kirim option:selected').val();
                            var almt_kec_kirim = $('#dt_almt_kec_kirim option:selected').val();
                            var almt_kel_kirim = $('#dt_almt_kel_kirim option:selected').val();
                            dataString += '&almt_kirim='+almt_kirim+'&almt_prov_kirim='+almt_prov_kirim+'&almt_kt_kirim='+almt_kt_kirim+'&almt_kec_kirim='+almt_kec_kirim+'&almt_kel_kirim='+almt_kel_kirim;
                        }
                        if($('#in_almt_terusan').val() !== undefined){
                            var almt_terusan = $('#in_almt_terusan').val();
                            var almt_prov_terusan = $('#in_prov_terusan option:selected').val();
                            var almt_kt_terusan = $('#in_kt_terusan option:selected').val();
                            var almt_kec_terusan = $('#in_kec_terusan option:selected').val();
                            var almt_kel_terusan = $('#in_kel_terusan option:selected').val();
                            dataString += '&almt_terusan='+almt_terusan+'&almt_prov_terusan='+almt_prov_terusan+'&almt_kt_terusan='+almt_kt_terusan+'&almt_kec_terusan='+almt_kec_terusan+'&almt_kel_terusan='+almt_kel_terusan;
                        }
                        if($('#dt_jml_tarif2').val() !== undefined){
                                var jml_tarif2 = $('#dt_jml_tarif2').val();
                                var nm_bank2 = $('#dt_nm_bank2 option:selected').val();
                                var rekening2 = $('#dt_rekening2').val();
                                var ats_nm_rekening2 = $('#dt_ats_nm_rekening2').val();
                                dataString += '&jml_tarif2='+jml_tarif2+'&nm_bank2='+nm_bank2+'&rekening2='+rekening2+'&ats_nm_rekening2='+ats_nm_rekening2;
                            }
                        if($('#dt_jml_tarif3').val() !== undefined){
                            var jml_tarif3 = $('#dt_jml_tarif3').val();
                            var nm_bank3 = $('#dt_nm_bank3 option:selected').val();
                            var rekening3 = $('#dt_rekening3').val();
                            var ats_nm_rekening3 = $('#dt_ats_nm_rekening3').val();
                            dataString += '&jml_tarif3='+jml_tarif3+'&nm_bank3='+nm_bank3+'&rekening3='+rekening3+'&ats_nm_rekening3='+ats_nm_rekening3;
                        }
                        $.ajax({
                              url: "<?php echo base_url('Mapping/update_byr')?>",
                              type: "POST",
                              data: dataString,
                              success: function(data){
                                console.log('suksas');
                                Swal.fire(
                                    'Sukses',
                                    'Update berhasil disimpan',
                                    'success'
                                )
                                $('#modalPelunasan').modal('hide');
                                $('.nav-pillsl a:first').tab('show');
                                $('#mthri-table').DataTable().ajax.reload();
                                $('#dp-table').DataTable().ajax.reload();
                                $('#cc-table').DataTable().ajax.reload();
                              }
                          });
                      }


                    $('#modalPelunasan').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var recipient = button.data('whatever')
                        var modal = $(this);
                        var dataString = 'id=' + recipient
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('Mapping/get_dtmt_pel')?>",
                            dataType: "json",
                            data: dataString,
                            success: function(data) {
                                $('#dt_nm_mitra').val(data[0]['nm_mitra']);
                                $('#dt_kt_lahir').val(data[0]['kt_lahir']);
                                $('#dt_tgl_lahir').val(data[0]['tgl_lahir']);
                                $('#dt_almt_rmh').val(data[0]['almt_rmh']);
                                $('#dt_provinsi').val(data[0]['almt_prov_rmh']);
                                $('#dt_provinsi').trigger('change');
                                var idkota = data[0]['almt_kt_rmh'];
                                if($('#dt_provinsi').val() !== 0){
                                    var id=$('#dt_provinsi option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kota",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kt_rmh').html(html);
                                            console.log(idkota);
                                            $('#dt_almt_kt_rmh').val(idkota);
                                            $('#dt_almt_kt_rmh').trigger('change');
                                        }
                                    });
                                }
                                var idkec = data[0]['almt_kec_rmh'];
                                if($('#dt_almt_kt_rmh').val() !== 0){
                                    var id=$('#dt_almt_kt_rmh option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kec",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kec_rmh').html(html);
                                            $('#dt_almt_kec_rmh').val(idkec);
                                            $('#dt_almt_kec_rmh').trigger('change');
                                        }
                                    });
                                }
                                var idkel = data[0]['almt_kel_rmh'];
                                if($('#dt_almt_kec_rmh').val() !== 0){
                                    var id=$('#dt_almt_kec_rmh option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kel",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kel_rmh').html(html);
                                            $('#dt_almt_kel_rmh').val(idkel);
                                            $('#dt_almt_kel_rmh').trigger('change');
                                        }
                                    });
                                }
                                $('#dt_no_hp1').val(data[0]['no_hp1']);
                                $('#dt_no_hp2').val(data[0]['no_hp2']);
                                $('#dt_almt_outlet').val(data[0]['almt_outlet']);
                                $('#dt_provinsi2').val(data[0]['almt_prov_outlet']);
                                $('#dt_provinsi2').trigger('change');
                                var ktout = data[0]['almt_kt_outlet'];
                                if($('#dt_provinsi2').val() !== 0){
                                    var id = $('#dt_provinsi2 option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kota",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kt_outlet').html(html);
                                            $('#dt_almt_kt_outlet').val(ktout);
                                            console.log(ktout)
                                            $('#dt_almt_kt_outlet').trigger('change');
                                        }
                                    });
                                }
                                var kecout = data[0]['almt_kec_outlet'];
                                if($('#dt_almt_kt_outlet').val() !== 0){
                                    var id = $('#dt_almt_kt_outlet option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kec",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kec_outlet').html(html);
                                            $('#dt_almt_kec_outlet').val(kecout);
                                            console.log(ktout)
                                            $('#dt_almt_kec_outlet').trigger('change');
                                        }
                                    });
                                }
                                var kelout = data[0]['almt_kel_outlet'];
                                if($('#dt_almt_kec_outlet').val() !== 0){
                                    var id = $('#dt_almt_kec_outlet option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kel",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kel_outlet').html(html);
                                            $('#dt_almt_kel_outlet').val(kelout);
                                            $('#dt_almt_kel_outlet').trigger('change');
                                        }
                                    });
                                }
                                $('#dt_ats_nm_penerima').val(data[0]['ats_nm_kirim']);
                                console.log(data[0]['ats_nm_kirim']);
                                $('#dt_almt_kirim').val(data[0]['almt_kirim']);
                                $('#dt_provinsi3').val(data[0]['almt_prov_kirim']);
                                $('#dt_provinsi3').trigger('change');
                                var ktkir = data[0]['almt_kt_kirim'];
                                if($('#dt_provinsi2').val() !== 0){
                                    var id = $('#dt_provinsi2 option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kota",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kt_kirim').html(html);
                                            $('#dt_almt_kt_kirim').val(ktkir);
                                            $('#dt_almt_kt_kirim').trigger('change');
                                        }
                                    });
                                }
                                var keckir = data[0]['almt_kec_kirim'];
                                if($('#dt_almt_kt_kirim').val() !== 0){
                                    var id = $('#dt_almt_kt_kirim option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kec",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kec_kirim').html(html);
                                            $('#dt_almt_kec_kirim').val(keckir);
                                            $('#dt_almt_kec_kirim').trigger('change');
                                        }
                                    });
                                }
                                var kelkir = data[0]['almt_kel_kirim'];
                                if($('#dt_almt_kec_kirim').val() !== 0){
                                    var id = $('#dt_almt_kec_kirim option:selected').val();
                                    $.ajax({
                                        url : "<?php echo base_url();?>Monitor/get_kel",
                                        method : "POST",
                                        data : {id: id},
                                        async : false,
                                        dataType : 'json',
                                        success: function(data){
                                            var html = '';
                                            var i;
                                            html += '<option></option>';
                                            for(i=0; i<data.length; i++){
                                                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                            }
                                            $('#dt_almt_kel_kirim').html(html);
                                            $('#dt_almt_kel_kirim').val(kelkir);
                                            $('#dt_almt_kel_kirim').trigger('change');
                                        }
                                    });
                                }
                                $('#in_nm_produk').val(data[0]['nm_produk']);
                                if($('#in_nm_produk').val() !== 0){
                                    var id = $('#in_nm_produk').val();
                                    $.ajax({
                                            url : "<?php echo base_url();?>monitor/get_jns_paket",
                                            method : "POST",
                                            data : {id: id},
                                            async : false,
                                            dataType : 'json',
                                            success: function(data){
                                                var html = '<option value="0">Pilih</option>';
                                                var i;
                                                for(i=0; i<data.length; i++){
                                                    html += '<option value="'+data[i].kd_paket+'">'+data[i].nm_paket+'</option>';
                                                }
                                                $('#in_paket').html(html);
                                            }
                                        });
                                }
                                if($('#in_nm_produk').val() !== ''){
                                    var id = $('#in_nm_produk').val();
                                    $.get("<?php echo base_url();?>Monitor/get_rek_kantor", {id: id}, function(data){
                                        var pilih = '<option value="0">Pilih</option>';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            pilih += '<option value="'+data[i].kd_bank+'">'+data[i].nm_bank+'</option>';
                                        }
                                        $('#in_nm_bank').html(pilih);
                                    }, "json");
                                }

                                $(document).ready(function(){
                                    $('#in_nm_bank').change(function(){
                                        var id = $('#in_nm_bank option:selected').val();
                                        $.get("<?php echo base_url();?>Monitor/get_no_rek", {id: id}, function(data){
                                            if(data[0] !== undefined){
                                                $('#in_rekening').val(data[0].no_rek);
                                            }else{
                                                $('#in_rekening').val('');
                                            }
                                            
                                        }, "json");
                                    })
                                })

                                $('#in_paket').val(data[0]['paket']);
                                $('#dt_kd_mitra').val(data[0]['kd_mitra']);
                                $('#dt_kd_pmby').val(data[0]['pembayaran']);
                                
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    });

                    $(document).ready(function(){
                        $('#dt_nm_produk').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_jns_paket",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '<option value="0">Pilih</option>';
                                    var i;
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].kd_paket+'">'+data[i].nm_paket+'</option>';
                                    }
                                    $('#dt_paket').html(html);
                                    
                                }
                            });
                        });
                    });

                    $(document).ready(function(){
                        $('#dt_provinsi_prb').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kota",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                    }
                                    $('#dt_almt_kt_rmh_prb').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_provinsi2').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>Monitor/get_kota",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_almt_kt_outlet').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_almt_kt_outlet').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>Monitor/get_kec",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_almt_kec_outlet').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_almt_kec_outlet').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>Monitor/get_kel",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_almt_kel_outlet').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_provinsi3').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kota",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_almt_kt_kirim').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_almt_kt_kirim').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kec",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_almt_kec_kirim').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_almt_kec_kirim').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kel",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_almt_kel_kirim').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_prov_terusan').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kota",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>'
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_kt_terusan').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_kt_terusan').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kec",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>'
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_kec_terusan').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                        $('#in_kec_terusan').change(function(){
                            var id=$(this).val();
                            $.ajax({
                                url : "<?php echo base_url();?>monitor/get_kel",
                                method : "POST",
                                data : {id: id},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option></option>'
                                    for(i=0; i<data.length; i++){
                                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                    }
                                    $('#in_kel_terusan').html(html);
                                    
                                }
                            });
                        });
                    });
                    $(document).ready(function(){
                            $('#cek1').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('almt_rmh').value;
                                        document.getElementById('almt_kirim').value = almt;
                                        document.getElementById('almt_kirim').disabled  = true;
                                        $('#provinsi').val($('#provinsi3 option:selected').val());
                                        $('#provinsi').prop('disabled', 'disabled');
                                        if($('#provinsi option:selected').val() !== 0){
                                            var id=$('#provinsi option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#almt_kt_kirim').html(html);
                                                    $('#almt_kt_kirim').val($('#almt_kt_rmh option:selected').val());
                                                    $('#almt_kt_kirim').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                        
                                    }
                                }
                            )
                        })
                    //kirim
                        $(document).ready(function(){
                            $('#cek2').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('almt_outlet').value;
                                        document.getElementById('almt_kirim').value = almt;
                                        document.getElementById('almt_kirim').disabled  = true;
                                        $('#provinsi3').val($('#provinsi2 option:selected').val());
                                        $('#provinsi3').prop('disabled', 'disabled');
                                        if($('#provinsi3 option:selected').val() !== 0){
                                            var id=$('#provinsi2 option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#almt_kt_kirim').html(html);
                                                    $('#almt_kt_kirim').val($('#almt_kt_outlet option:selected').val());
                                                    $('#almt_kt_kirim').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                    }
                                }
                            )
                        })
                        $('#tgl1').datetimepicker({
                            locale: 'id',
                            format: 'DD-MM-YYYY'
                        });

                        $('#tgl2').datetimepicker({
                            locale: 'id',
                            format: 'DD-MM-YYYY'
                        });

                        $(document).ready(function(){
                            $('#provinsi').change(function(){
                                var id=$(this).val();
                                $.ajax({
                                    url : "<?php echo base_url();?>monitor/get_kota",
                                    method : "POST",
                                    data : {id: id},
                                    async : false,
                                    dataType : 'json',
                                    success: function(data){
                                        var html = '';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                        }
                                        $('#almt_kt_kirim').html(html);
                                        
                                    }
                                });
                            });
                        });
                        $(document).ready(function(){
                            $('#cek1').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('almt_rmh').value;
                                        document.getElementById('almt_kirim').value = almt;
                                        document.getElementById('almt_kirim').disabled  = true;
                                        $('#provinsi2').val($('#provinsi option:selected').val());
                                        $('#provinsi2').prop('disabled', 'disabled');
                                        if($('#provinsi option:selected').val() !== 0){
                                            var id=$('#provinsi option:selected').val();
                                            $.ajax({
                                                url : "<?php echo base_url();?>monitor/get_kota",
                                                method : "POST",
                                                data : {id: id},
                                                async : false,
                                                dataType : 'json',
                                                success: function(data){
                                                    var html = '';
                                                    var i;
                                                    for(i=0; i<data.length; i++){
                                                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                                                    }
                                                    $('#almt_kt_outlet').html(html);
                                                    $('#almt_kt_outlet').val($('#almt_kt_rmh option:selected').val());
                                                    $('#almt_kt_outlet').prop('disabled', 'disabled');
                                                }
                                            });
                                        }
                                    }
                                }
                            )
                        })
                    //kirim
                        $(document).ready(function(){
                            $('#cek2').change(
                                function(){
                                    if($(this).is(':checked')){
                                        var almt = document.getElementById('almt_outlet').value;
                                        document.getElementById('almt_kirim').value = almt;
                                        document.getElementById('almt_kirim').disabled  = true;
                                    }
                                }
                            )
                        })
                </script>
                    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Info Mitra</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="info_mitra">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th style="width: 25%">Nama Mitra</th>
                                        <td style="width: 5%">:</td>
                                        <td><p id="nm_mitra_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Kota, Tanggal Lahir</th>
                                        <td>:</td>
                                        <td><p id="kotalahir_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Join</th>
                                        <td>:</td>
                                        <td id="tgljoin_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Rumah</th>
                                        <td>:</td>
                                        <td id="almt_rmh_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>:</td>
                                        <td id="almt_prov_rmh_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Kota</th>
                                        <td>:</td>
                                        <td><p id="almt_kt_rmh_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td>:</td>
                                        <td id="almt_kec_rmh_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Kelurahan</th>
                                        <td>:</td>
                                        <td><p id="almt_kel_rmh_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Handphone</th>
                                        <td>:</td>
                                        <td id="hp1_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Handphone</th>
                                        <td>:</td>
                                        <td><p id="hp2_info"></p></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th style="width: 25%">Alamat Outlet</th>
                                        <td style="width: 5%">:</td>
                                        <td><p id="almt_outlet_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>:</td>
                                        <td><p id="almt_prov_outlet_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Kota</th>
                                        <td>:</td>
                                        <td><p id="almt_kt_outlet_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td>:</td>
                                        <td><p id="almt_kec_outlet_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Kelurahan</th>
                                        <td>:</td>
                                        <td><p id="almt_kel_outlet_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Brand</th>
                                        <td>:</td>
                                        <td><p id="nm_produk_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Paket</th>
                                        <td>:</td>
                                        <td><p id="paket_info"></p></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered table-striped" title="Rincian Pembayaran Mitra Join">
                                    <th>Atas Nama</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Jumlah Transfer</th>
                                </table>
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#infoModal').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this)
                            var dataString = 'id='+recipient
                            $.get("<?php echo base_url();?>Monitor/get_info_mitra", dataString, function(data){
                                $('#nm_mitra_info').html(data.identy[0].nm_mitra);
                                if(data.identy[0].kt_lahir !== null && data.identy[0].tgl_lahir !== null){
                                    $('#kotalahir_info').html(data.identy[0].kt_lahir+', '+data.identy[0].tgl_lahir);
                                }
                                $('#tgljoin_info').html(data.identy[0].tgl_join);
                                $('#almt_rmh_info').html(data.identy[0].almt_rmh);
                                $('#almt_prov_rmh_info').html(data.identy[0].almt_prov_rmh);
                                $('#almt_kt_rmh_info').html(data.identy[0].almt_kt_rmh);
                                $('#almt_kec_rmh_info').html(data.identy[0].almt_kec_rmh);
                                $('#almt_kel_rmh_info').html(data.identy[0].almt_kel_rmh);
                                $('#hp1_info').html(data.identy[0].no_hp1);
                                $('#hp2_info').html(data.identy[0].no_hp2);

                                $('#almt_outlet_info').html(data.outlet[0].almt_outlet);
                                $('#almt_prov_outlet_info').html(data.outlet[0].almt_prov_outlet);
                                $('#almt_kt_outlet_info').html(data.outlet[0].almt_kt_outlet);
                                $('#almt_kec_outlet_info').html(data.outlet[0].almt_kec_outlet);
                                $('#almt_kel_outlet_info').html(data.outlet[0].almt_kel_outlet);
                                $('#nm_produk_info').html(data.outlet[0].nm_produk);
                                $('#paket_info').html(data.outlet[0].paket);
                                
                            }, 'json')
                        })
                    </script>