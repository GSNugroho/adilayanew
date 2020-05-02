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
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/money-min.svg')?>" style="margin-right: 17px;margin-bottom: 4px;">
            Data Pengajuan Anggaran
        </div>
    </div>
    <div class="check-awb-content" style="margin-top:5%;">
        <div class="container">
            <div class="check-awb-wrapper">   
                <div class="awb-input-field">   
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nm_tim"></label>
                                    <select class="form-control" name="in_nm_pengajuan" id="in_nm_pengajuan" style="width: 80%; border-radius:6px;margin-left:12%">
                                    <option value="0">Pilih Jenis Pengajuan</option>
                                    <?php
                                    foreach ($dd_jns as $row) {  
                                        echo "<option value='".$row->kd_jns."' >".$row->nm_jns."</option>";
                                        }
                                        echo"
                                    </select>"
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                <button style="height: 36px; margin-top: 10px;margin-left: 25%;border-radius:6px;" class="btn btn-danger" id="tampil_data">Tampilkan Data</button>
                                </div>
                            </div>
                            <div class="table-responsive" style="display: none;" id="konpeng">
                                <table class="table table-borderless" id="dtAnggaran" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Jenis Pengeluaran</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">Keterangan Guna Pembayaran</th>
                                            <th style="text-align: center">Nominal Biaya</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Cek Info Detail</th>
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
<?php
    $this->load->view('footer');
?>
                <script>

                        $('#tampil_data').click(function(){
                            $('#dtAnggaran').DataTable().ajax.reload();
                            $('#konpeng').show();
                        })

                        $(document).ready(function(){
                                var table=$('#dtAnggaran').DataTable({
                                language: {
                                "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                                "sProcessing":   "Sedang memproses...",
                                "sLengthMenu":   "Tampilkan Data _MENU_ ",
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
                                'ajax': {
                                    'url':'<?php echo base_url().'Finance/dt_anggaran'?>',
                                    'data': function(data){
                                        var nm_anggaran = $('#in_nm_pengajuan option:selected').val();

                                        data.nm_anggaran = nm_anggaran;
                                    }
                                },
                                'columns': [
                                    { data: 'nm_anggaran' },
                                    { data: 'dt_create' },
                                    { data: 'ket_anggaran' },
                                    { data: 'jml_anggaran', render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ') },
                                    { data: 'sts_anggaran' },
                                    { data: 'action' }
                                ]
                                });
                                table.on( 'draw', function () {
                                        $('.paginate_button.previous').html("<img src='<?php echo base_url('assets/icon/previous.png')?>' width='30' height='30'>");
                                        $('.paginate_button.next').html("<img src='<?php echo base_url('assets/icon/next.png')?>' width='30' height='30'>");
                                        var total_records = table.rows().count();
                                        var page_length = table.page.info().length;
                                        var total_pages = Math.ceil(total_records / page_length);
                                        var current_page = table.page.info().page+1;
                                    } );
                                $('#tampil_data').on('click', function(){
                                    table.draw(true);
                                });
                            });
                    </script>
                    <div class="modal fade" id="inputValidasi" tabindex="-1" role="dialog" aria-labelledby="inputPengeluaran" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="inputValidasiLabel">Persetujuan Pengajuan</h5>
                                    <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputJns">Jenis Pengeluaran</label>
                                        <select class="form-control" name="jns_anggaran" id="jns_anggaran" style="width: 80%;" disabled>
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
                                        <textarea class="form-control" name="ket_anggaran" id="ket_anggaran" style="width: 80%; height:50%" disabled></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="jml_pengeluaran">Jumlah Pengeluaran</label>
                                        <div class="input-group" style="width: 80%">
                                            <span class="input-group-addon">Rp</span>
                                            <input class="form-control" name="jml_anggaran" id="jml_anggaran" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jns_pembayaran">Tipe Pembayaran</label>
                                        <select class="form-control" name="tipe_anggaran" id="tipe_anggaran" style="width: 80%" disabled>
                                            <option></option>
                                            <option value="0">Transfer</option>
                                            <option value="1">Tunai</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="kd_anggaran" id="kd_anggaran">
                                    <button type="submit" class="btn btn-success" id="Validanggaran" style="color: white;">Setuju</button>
                                    <button type="button" id="Tvalidanggaran" class="btn btn-danger" >Tidak Setuju</button>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function ttp(){
                            $('#inputValidasi').modal('hide');
                        }

                        $('#inputValidasi').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this);
                            var dataString = 'id=' + recipient
                            $.get("<?php echo base_url()?>Finance/get_dt_pengajuan", dataString, function(data){
                                $('#jns_anggaran').val(data[0].nm_anggaran);
                                $('#ket_anggaran').val(data[0].ket_anggaran);
                                $('#jml_anggaran').val(data[0].jml_anggaran);
                                $('#tipe_anggaran').val(data[0].jns_pembayaran);
                                $('#kd_anggaran').val(data[0].kd_anggaran);
                            }, "json")
                        })

                        $('#Validanggaran').on('click', function(data){
                            var id = $('#kd_anggaran').val();
                            dataString = 'id='+id;
                            $.post("<?php echo base_url()?>Finance/anggaranok", dataString, function(data){
                                $('#inputValidasi').modal('hide');
                                $('#dt_anggaran').DataTable().ajax.reload();
                                Swal.fire({
                                title: 'Sukses',
                                text: "Anggaran Berhasil Disetujui",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                                })
                            })
                        })

                        $('#Tvalidanggaran').on('click', function(data){
                            var id = $('#kd_anggaran').val();
                            dataString = 'id='+id;
                            $.post("<?php echo base_url()?>Finance/anggaranno", dataString, function(data){
                                $('#inputValidasi').modal('hide');
                                $('#dt_anggaran').DataTable().ajax.reload();
                                Swal.fire({
                                title: 'Sukses',
                                text: "Anggaran Berhasil Ditolak",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                                })
                            })
                        })
                    </script>
            </div>
        </div>
    </div>
</div>