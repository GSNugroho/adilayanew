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
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/79467.png')?>" style="margin-right: 17px;margin-bottom: 4px;">
            Data Order Mitra
        </div>
    </div>
    <div class="check-awb-content" style="margin-top:5%;">
        <div class="container">
            <div class="check-awb-wrapper">   
                <div class="awb-input-field">   
                    <br>
                    
                    <br>
                        <div class="row ">
                            <div class="col-md-12">
                            <div class="form-group" style="margin-top:-85px; margin-left:2%">
                            <label for="searching"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><img src='<?php echo base_url('assets/icon/search--v2.png')?>' width='20' height='20'></span>
                                <input class="form-control" name="cari_nm_mitra" id="cari_nm_mitra" style="height: 44px;width:20%" placeholder="Masukkan nama mitra">
                            </div>
                        </div>   
                    <br>
                    <div id="dynamic-tabs">
                        <ul>
                            <li class="tabs" data-source="<?php echo base_url('Vendorbb/dt_hri')?>" data-table="hri-table"><a href="#tab-hri">Hari ini</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('Vendorbb/dt_sm')?>" data-table="sm-table"><a href="#tab-sm">Semua</a>
                            </li>
                        </ul>
                        <div id="tab-hri" class="table-responsive">
                            <table id="hri-table" class="table table-borderless" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Order</th>
                                        <th>Alamat Kirim</th>
                                        <th>Kota</th>
                                        <th style="width:16%;">Cek Info Detail</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-sm" class="table-responsive">
                            <table id="sm-table" class="table table-borderless" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Order</th>
                                        <th>Alamat Kirim</th>
                                        <th>Kota</th>
                                        <th style="width:16%;">Cek Info Detail</th>
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
                                        'columns': [
                                            { data: 'nm_mitra' },
                                            { data: 'tgl_order'},
                                            { data: 'almt_kirim' },
                                            { data: 'kota' },
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
                                initiateTable("hri-table", "<?php echo base_url('Vendorbb/dt_hri')?>");
                                $("#dynamic-tabs").tabs();

                            });
                            $('#tgl1').datetimepicker({
                                locale: 'id',
                                format: 'DD-MM-YYYY'
                            });

                            $('#tgl2').datetimepicker({
                                locale: 'id',
                                format: 'DD-MM-YYYY'
                            });
                        </script>
                        <div class="modal fade" id="cekModal" tabindex="-1" role="dialog" aria-labelledby="cekModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="cekModalLabel">Rincian Mitra Order</h5>
                                    <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th style="width: 25%">Nama Mitra</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="nm_mitra_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Alamat Kirim</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="almt_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Provinsi</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="prov_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Kota</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="kota_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Kecamatan</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="kec_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Kelurahan</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="kel_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Rincian</th>
                                            <td style="width: 5%">:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan='3'>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Total</th>
                                                    </thead>
                                                    <tbody id="isirinci">
                                                    <tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Total Order</th>
                                            <td style="width: 5%">:</td>
                                            <td ><p id="total_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Ekspedisi</th>
                                            <td style="width: 5%">:</td>
                                            <td ><p id="ekspedisi_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Berat</th>
                                            <td style="width: 5%">:</td>
                                            <td ><p id="berat_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Biaya Kirim</th>
                                            <td style="width: 5%">:</td>
                                            <td ><p id="biaya_kirim_cek"></p></td>
                                        </tr>
                                    </table>
                                    <input type="hidden" name="kd_order" id="kd_order">
                                    <button type="submit" class="btn btn-success" id="kirimOrder" style="color: white;">Kirim Barang</button>
                                    <button type="button" id="close" class="btn btn-danger" onclick="ttp()">Batal</button>
                                    <form method="POST" action="<?php echo base_url('Vendorbb/printinvoice')?>">
                                        <input type="hidden" name="kdp_order" id="kdp_order">
                                        <button type="submit" id="printinvoice" class="btn btn-info" formtarget="_blank" style="float: right; margin-top: -35px;">
                                            <i class="fa fa-print" title="Print Invoice"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function ttp(){
                            $('#cekModal').modal('hide');
                        }
                        function uang(uang){
                            var reverse = uang.toString().split('').reverse().join(''),
                            ribuan = reverse.match(/\d{1,3}/g);
                            ribuan = 'Rp '+ribuan.join('.').split('').reverse().join('');
                            return ribuan
                        }

                        $('#cekModal').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this);
                            var dataString = 'id=' + recipient
                            $.get("<?php echo base_url()?>Avbb/get_dt_order", dataString, function(data){
                                $('#nm_mitra_cek').html(data.dt_mitra[0].nm_mitra);
                                $('#kd_order').val(data.dt_mitra[0].kd_order);
                                $('#kdp_order').val(data.dt_mitra[0].kd_order);
                                $('#almt_kirimm_cek').html(data.dt_mitra[0].almt_kirim);
                                $('#prov_kirimm_cek').html(data.dt_mitra[0].almt_prov_kirim);
                                $('#kota_kirimm_cek').html(data.dt_mitra[0].almt_kt_kirim);
                                $('#kec_kirimm_cek').html(data.dt_mitra[0].almt_kec_kirim);
                                $('#kel_kirimm_cek').html(data.dt_mitra[0].almt_kel_kirim);
                                var table ='';
                                for(var i = 0; i < data.dt_order.length; i++){
                                    table += '<tr><td>'+data.dt_order[i].nm_barang+'</td><td>'+data.dt_order[i].jml_barang+'</td><td>'+uang(data.dt_order[i].harga_barang)+'</td><td>'+uang(data.dt_order[i].jml_barang * data.dt_order[i].harga_barang)+'</td></tr>'
                                }
                                $('#isirinci').html(table);
                                $('#total_cek').html(uang(data.dt_mitra[0].total_order));
                                $('#ekspedisi_cek').html(data.dt_mitra[0].ekspedisi);
                                $('#berat_cek').html(data.dt_mitra[0].berat+' kg');
                                $('#biaya_kirim_cek').html(data.dt_mitra[0].biaya_kirim);
                            }, "json")
                        })

                        $('#kirimOrder').click(function(event){
                            var kd_order = $('#kd_order').val()
                            dataString = 'kd_order='+kd_order;
                            $.post("<?php echo base_url()?>Avbb/updatekirim", dataString, function(data){
                                $('#cekModal').modal('hide');
                                Swal.fire({
                                        title: 'Sukses',
                                        text: "Data Berhasil Dikirm!",
                                        icon: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                        })
                            })
                        })
                    </script>
                