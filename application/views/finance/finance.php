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
<script src="<?php echo base_url('assets/js/autosize.min.js')?>"></script>
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
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/money-give.svg')?>" style="margin-right: 17px;margin-bottom: 4px;">
            Data Pengeluaran
        </div>
    </div>
    <div class="check-awb-content" style="margin-top:5%;">
        <div class="container">
            <div class="check-awb-wrapper">   
                <div class="awb-input-field">   
                    <div class="row ">
                        <div class="col-md-12">
                            <table>
                            <tr>
                                <td>
                                    <label for="tglm">Dari</label>
                                    <input type="text" class="form-control" name="rtm_waktu" id="tgl1"placeholder="dd-mm-yyyy"/>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label for="tgls">Sampai</label>
                                    <input type="text" class="form-control" name="rta_waktu" id="tgl2" placeholder="dd-mm-yyyy"/>	
                                </td>
                            </tr>
                        </table>                    
                        <br>
                        <button style="height: 36px" class="btn btn-danger" data-toggle="modal" data-target="#inputPengeluaran"  data-keyboard="false" data-backdrop="static">Input Pengeluaran</button>
                        <br>
                        <br>
                        <div class="form-group" style="float:right;margin-top:-85px; margin-right:2%">
                            <label for="searching"></label>
                            <div class="input-group">
                                <span class="input-group-addon"><img src='<?php echo base_url('assets/icon/search--v2.png')?>' width='20' height='20'></span>
                                <input class="form-control" name="cari_jns_peng" id="cari_jns_peng" style="height: 44px;" placeholder="Masukkan jenis pengeluaran">
                            </div>
                        </div>
                        <div id="dynamic-tabs">
                            <ul>
                                <li class="tabs" data-source="<?php echo base_url('Finance/trans_hri')?>" data-table="transhr-table"><a href="#tab-transhr">Hari ini (Transfer)</a>
                                </li>
                                <li class="tabs" data-source="<?php echo base_url('Finance/tunai_hri')?>" data-table="tunaihr-table"><a href="#tab-tunaihr">Hari ini (Tunai)</a>
                                </li>
                                <li class="tabs" data-source="<?php echo base_url('Finance/trans_sm')?>" data-table="transsm-table"><a href="#tab-transsm">Semua (Transfer)</a>
                                </li>
                                <li class="tabs" data-source="<?php echo base_url('Finance/tunai_sm')?>" data-table="tunaism-table"><a href="#tab-tunaism">Semua (Tunai)</a>
                                </li>
                            </ul>
                            <div id="tab-transhr" class="table-responsive">
                                <table id="transhr-table" class="table table-borderless" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Keterangan Guna Pembayaran</th>
                                            <th>Nominal Biaya</th>
                                            <th style="width:16%;">Cek Info Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" style="text-align:right">Total:</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div id="tab-tunaihr" class="table-responsive">
                                <table id="tunaihr-table" class="table table-borderless" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Keterangan Guna Pembayaran</th>
                                            <th>Nominal Biaya</th>
                                            <th style="width:16%;">Cek Info Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" style="text-align:right">Total:</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div id="tab-transsm" class="table-responsive">
                                <table id="transsm-table" class="table table-borderless" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Keterangan Guna Pembayaran</th>
                                            <th>Nominal Biaya</th>
                                            <th style="width:16%;">Cek Info Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" style="text-align:right">Total:</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div id="tab-tunaism" class="table-responsive">
                                <table id="tunaism-table" class="table table-borderless" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Keterangan Guna Pembayaran</th>
                                            <th>Nominal Biaya</th>
                                            <th style="width:16%;">Cek Info Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" style="text-align:right">Total:</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
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
                                        "footerCallback": function(row, data, start, end, display) {
                                            var api = this.api(),
                                                data;
                                            // Remove the formatting to get integer data for summation
                                            var intVal = function(i) {
                                                return typeof i === 'string' ?
                                                    i.replace(/[\$,]/g, '') * 1 :
                                                    typeof i === 'number' ?
                                                    i : 0;
                                            };
                                            // Total over all pages
                                            total = api
                                                .column(2)
                                                .data()
                                                .reduce(function(a, b) {
                                                    return intVal(a) + intVal(b);
                                                }, 0);
                                            // Total over this page
                                            pageTotal = api
                                                .column(2, {
                                                    page: 'current'
                                                })
                                                .data()
                                                .reduce(function(a, b) {
                                                    return intVal(a) + intVal(b);
                                                }, 0);
                                            
                                            // Update footer
                                            var numformat = $.fn.dataTable.render.number('.', ',', 2, 'Rp ').display;
                                            $('tr:eq(0) th:eq(1)', api.table().footer()).html(
                                                numformat(pageTotal)
                                            );
                                        },
                                        "bLengthChange": false,
                                        "bFilter": false,
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
                                            { data: 'jns_pengeluaran' },
                                            { data: 'ket_pengeluaran'},
                                            { data: 'jml_pengeluaran', render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ') },
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
                                initiateTable("transhr-table", "<?php echo base_url('Finance/trans_hri')?>");
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
                </div>
            </div>
            <div class="modal fade" id="inputPengeluaran" tabindex="-1" role="dialog" aria-labelledby="inputPengeluaran" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="inputPengeluaranLabel">Input Data Pengeluaran</h5>
                            <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputJns">Jenis Pengeluaran</label>
                                <select class="form-control" name="jns_pengeluaran" id="jns_pengeluaran" style="width: 80%;">
                                <?php
                                echo "<option></option>";
                                foreach ($dd_jns as $row) {  
                                    echo "<option value='".$row->kd_jns."' >".$row->nm_jns."</option>";
                                    }
                                    echo"
                                </select>"
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="ket_pengeluaran">Keterangan</label>
                                <textarea class="form-control" name="ket_pengeluaran" id="ket_pengeluaran" style="width: 80%; height:50%"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="jml_pengeluaran">Jumlah Pengeluaran</label>
                                <div class="input-group" style="width: 80%">
                                    <span class="input-group-addon">Rp</span>
                                    <input class="form-control" name="jml_pengeluaran" id="jml_pengeluaran">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jns_pembayaran">Tipe Pembayaran</label>
                                <select class="form-control" name="jns_pembayaran" id="jns_pembayaran" style="width: 80%">
                                    <option></option>
                                    <option value="0">Transfer</option>
                                    <option value="1">Tunai</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success" id="simpanPengeluaran" style="color: white;">Simpan</button>
                            <button type="button" id="close" class="btn btn-danger" onclick="tutup()">Batal</button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                autosize(document.getElementById("ket_pengeluaran"));
                function ttp(){
                    $('#inputPengeluaran').modal('hide');
                }
                $('#simpanPengeluaran').click(function(event){
                    var jns_pengeluaran = $('#jns_pengeluaran option:selected').val();
                    var ket_pengeluaran = $('#ket_pengeluaran').val();
                    var jns_pembayaran = $('#jns_pembayaran').val();
                    var jml_pengeluaran = $('#jml_pengeluaran').val();
                    
                    var dataString = 'jns_pengeluaran='+jns_pengeluaran+'&ket_pengeluaran='+ket_pengeluaran+'&jns_pembayaran='+jns_pembayaran+'&jml_pengeluaran='+jml_pengeluaran;

                    $.post("<?php echo base_url()?>Finance/simpanPengeluaran", dataString, function(data){
                        $('#jns_pengeluaran option:selected').val('');
                        $('#ket_pengeluaran').val('');
                        $('#jns_pembayaran').val('');
                        $('#jml_pengeluaran').val('');
                        $('#inputPengeluaran').modal('hide');
                        $('#tab-transhr').DataTable().ajax.reload();
                        $('#tab-tunaihr').DataTable().ajax.reload();
                        $('#tab-transsm').DataTable().ajax.reload();
                        $('#tab-tunaism').DataTable().ajax.reload();
                        Swal.fire({
                                title: 'Sukses',
                                text: "Data Berhasil Disimpan!",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                                })
                    })
                })
            </script>
            <div class="modal fade" id="edinputPengeluaran" tabindex="-1" role="dialog" aria-labelledby="edPengeluaran" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="edPengeluaranLabel">Edit Data Pengeluaran</h5>
                            <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputJns">Jenis Pengeluaran</label>
                                <select class="form-control" name="edjns_pengeluaran" id="edjns_pengeluaran" style="width: 80%;">
                                <?php
                                echo "<option></option>";
                                foreach ($dd_jns as $row) {  
                                    echo "<option value='".$row->kd_jns."' >".$row->nm_jns."</option>";
                                    }
                                    echo"
                                </select>"
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="ket_pengeluaran">Keterangan</label>
                                <textarea class="form-control" name="edket_pengeluaran" id="edket_pengeluaran" style="width: 80%; height:50%"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="jml_pengeluaran">Jumlah Pengeluaran</label>
                                <div class="input-group" style="width: 80%">
                                    <span class="input-group-addon">Rp</span>
                                    <input class="form-control" name="edjml_pengeluaran" id="edjml_pengeluaran">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jns_pembayaran">Tipe Pembayaran</label>
                                <select class="form-control" name="edjns_pembayaran" id="edjns_pembayaran" style="width: 80%">
                                    <option></option>
                                    <option value="0">Transfer</option>
                                    <option value="1">Tunai</option>
                                </select>
                            </div>
                            <input type="hidden" name="ed_kd_pengeluaran" id="ed_kd_pengeluaran">
                            <button type="submit" class="btn btn-success" id="edsimpanPengeluaran" style="color: white;">Simpan</button>
                            <button type="button" id="close" class="btn btn-danger" onclick="tutup()">Batal</button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                autosize(document.getElementById("edket_pengeluaran"));
                function tutup(){
                    $('#edinputPengeluaran').modal('hide');
                }

                $('#edinputPengeluaran').on('show.bs.modal', function(event){
                    var button = $(event.relatedTarget)
                    var recipient = button.data('whatever')
                    var modal = $(this);
                    var dataString = 'id=' + recipient
                    $.get("<?php echo base_url()?>Finance/get_data_pengeluaran", dataString, function(data){
                        $('#edjns_pengeluaran').val(data[0].jns_pengeluaran);
                        $('#edket_pengeluaran').val(data[0].ket_pengeluaran);
                        $('#edjns_pembayaran').val(data[0].jns_pembayaran);
                        $('#edjml_pengeluaran').val(data[0].jml_pengeluaran);
                        $('#ed_kd_pengeluaran').val(data[0].kd_pengeluaran);
                    }, "json")
                })

                $('#edsimpanPengeluaran').click(function(event){
                    var jns_pengeluaran = $('#edjns_pengeluaran option:selected').val();
                    var ket_pengeluaran = $('#edket_pengeluaran').val();
                    var jns_pembayaran = $('#edjns_pembayaran').val();
                    var jml_pengeluaran = $('#edjml_pengeluaran').val();
                    
                    var dataString = 'jns_pengeluaran='+jns_pengeluaran+'&ket_pengeluaran='+ket_pengeluaran+'&jns_pembayaran='+jns_pembayaran+'&jml_pengeluaran='+jml_pengeluaran;

                    $.post("<?php echo base_url()?>Finance/simpanPengeluaran", dataString, function(data){
                        $('#edjns_pengeluaran option:selected').val('');
                        $('#edket_pengeluaran').val('');
                        $('#edjns_pembayaran').val('');
                        $('#edjml_pengeluaran').val('');
                        $('#edinputPengeluaran').modal('hide');
                        $('#tab-transhr').DataTable().ajax.reload();
                        $('#tab-tunaihr').DataTable().ajax.reload();
                        $('#tab-transsm').DataTable().ajax.reload();
                        $('#tab-tunaism').DataTable().ajax.reload();
                        Swal.fire({
                                title: 'Sukses',
                                text: "Data Berhasil Diubah!",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                                })
                    })
                })
            </script>
        <?php
    $this->load->view('footer');
?>