<?php
	$this->load->view('mainmenu');
?>
	
<link href="<?php echo base_url('assets/nav-pill/nav-pill.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/dropzone/dropzone.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/dropzone/basic.min.css') ?>" />
    

<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>

<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/dropzone/dropzone.min.js')?>"></script>
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
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/book.svg')?>" style="margin-right: 17px;margin-bottom: 4px;">
            Data Stok Bahan Baku
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
                                <div class="form-group" style="margin-left:18%">
                                    <label for="nm_tim">Search by brand</label>
                                    <select class="form-control" name="in_nm_produk" id="in_nm_produk" style="width: 80%;border-radius:6px">
                                    <option value="0">Nama Brand</option>
                                    <?php
                                    foreach ($dd_pro as $row) {  
                                        echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                        }
                                        echo"
                                    </select>"
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                <button style="height: 36px; margin-top: 10px; border-radius: 6px" class="btn btn-danger" id="tampil_data">Cari Data</button>
                                </div>
                            </div>
                            <div class="table-responsive" style="display: none;" id="konor">
                                <table class="table table-borderless" id="dataBB" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Bahan Baku</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Ubah Data Stok</th>
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
                            $('#dataBB').DataTable().ajax.reload();
                            $('#konor').show();
                            // $('#dataTim').DataTable().draw(true);                            
                        })

                        $(document).ready(function(){
                                var table=$('#dataBB').DataTable({
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
                                    'url':'<?php echo base_url().'Vendorbb/dt_stok'?>',
                                    'data': function(data){
                                        var nm_produk = $('#in_nm_produk option:selected').val();

                                        data.nm_produk = nm_produk;
                                    }
                                },
                                'columns': [
                                    { data: 'nm_barang' },
                                    { data: 'jml_stok' },
                                    { data: 'satuan' },
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
                </div>
            </div>
            <div class="modal fade" id="editStok" tabindex="-1" role="dialog" aria-labelledby="editStokLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="editStokLabel">Edit Jumlah Stok</h5>
                            <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jml_stok">Jumlah Stok</label>
                                <input class="form-control" type="text" name="jml_stok" id="jml_stok" style="width: 80%;">
                            </div>
                            <input type="hidden" name="kd_order" id="kd_order">
                            <button type="submit" class="btn btn-success" id="kirimOrder" style="color: white;">Ubah Stok</button>
                            <button type="button" id="close" class="btn btn-danger" onclick="wis()">Batal</button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function ttp(){
                    $('#editStok').modal('hide');
                }
                $('#editStok').on('show.bs.modal', function(event){
                    var button = $(event.relatedTarget)
                    var recipient = button.data('whatever')
                    var modal = $(this);
                    var dataString = 'id=' + recipient
                    $.get("<?php echo base_url()?>Avbb/get_dt_stok", dataString, function(data){
                        $('#jml_stok').val(data[0].jml_stok);
                    }, "json")
                })
            </script>
       