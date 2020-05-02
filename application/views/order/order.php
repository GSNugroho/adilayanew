<?php
	$this->load->view('mainmenu');
?>
	
<link href="<?php echo base_url('assets/nav-pill/nav-pill.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
    
<!-- <script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js') ?>"></script> -->
<script src="<?php echo base_url('assets/js/select2.full.min.js')?>"></script>
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
            Data Order
        </div>
    </div>
    <div class="check-awb-content" style="margin-top:5%;">
    <div class="container">
        <div class="check-awb-wrapper">   
            <div class="awb-input-field">   
                <div class="row ">
                    <div class="col-md-12">
                    <?php if($this->session->userdata('level')=='3' || $this->session->userdata('level')=='12'):?>
						<div id="dynamic-tabs">
							<ul>
								<li class="tabs" data-source="<?php echo base_url('Order/dt_hri')?>" data-table="hri-table"><a href="#tab-hri">Hari Ini</a>
								</li>
								<li class="tabs" data-source="<?php echo base_url('Order/dt_tbl')?>" data-table="dt-table"><a href="#tab-dt">Semua</a>
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
										<th>Nama Brand</th>
										<th>Cek Info Detail</th>
										</tr>
									</thead>
								</table>
							</div>
							<div id="tab-dt" class="table-responsive">
								<table id="dt-table" class="table table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Nama Mitra</th>
										<th>Tanggal Order</th>
										<th>Alamat Kirim</th>
										<th>Kota</th>
										<th>Nama Brand</th>
										<th>Cek Info Detail</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					<?php endif;?>
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
                                        "dom": '<"top"i>rt<"bottom"flp><"clear">',
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
                                        //{ data: 'no' },
                                        //  { data: 'kd_inv' },
                                        { data: 'nm_mitra' },
                                        { data: 'dt_trans'},
                                        { data: 'almt_kirim'},
                                        { data: 'nama_kota' },
                                        { data: 'nama_brand' },
                                        { data: 'button' }
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
                            initiateTable("hri-table", "<?php echo base_url('Order/dt_hri')?>");
                            $("#dynamic-tabs").tabs();
                        });

	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 0);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
	
	$(document).ready(function(){setTimeout(function(){$(".pesans").fadeIn('slow');}, 0);});
    setTimeout(function(){$(".pesans").fadeOut('slow');}, 3000);

	

	  $('#tgl1').datetimepicker({
		locale: 'id',
		format: 'DD-MM-YYYY'
	});

	$('#tgl2').datetimepicker({
		locale: 'id',
		format: 'DD-MM-YYYY'
	});
    </script>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!-- Tindakan popup -->
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" onclick="tutup()" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <!-- <h3 class="modal-title" id="exampleModalLabel">Data Order</h3> -->
                            </div>
                            <div class="modal-body">
							<div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                    
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">Data Order</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item "><a class="nav-link" href="#tab_1" data-toggle="tab"></a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Order</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Pengiriman</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Jenis Pembayaran</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="form-group">
                                <label for="nm_mitra">Nama Mitra </label> 
                                <input class="form-control" type="text" name="nm_mitra" id="nm_mitra" style="width: 80%;" disabled>
                            </div>
                            <div class="form-group">
                                <label for="almt_rmh">Alamat Rumah</label> 
                                <input class="form-control" type="text" name="almt_rmh" id="almt_rmh" style="width: 80%;" disabled>
                            </div>
                            <table width='80%'>
                                <tr style="display: none;">
                                    <td width='50%'>
                                        <div class="form-group">
                                            <select class="select2-A provinsi" name="provinsi" id="provinsi3" style="width: 100%; display: none;">
                                            <?php
                                            echo "<option></option>";
                                            foreach ($dd_pr as $row) {  
                                                echo "<option value='".$row->id."' >".$row->name."</option>";
                                                }
                                                echo"
                                            </select>"
                                            ?>
                                        <div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                                <select class="select2-A kota" name="almt_kt_rmh" id="almt_kt_rmh" style="width: 100%; display: none;">

                                                </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none;">
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="almt_kec_rmh">Kecamatan</label>
                                            <select class="select2-A kecamatan" name="almt_kec_rmh" id="almt_kec_rmh" style="width:100%; display: none;">
                                                
                                            </select>
                                        </div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="almt_kel_rmh">Kelurahan</label>
                                            <select class="select2-A kelurahan" name="almt_kel_rmh" id="almt_kel_rmh" style="width:100%; display: none;">
                                                
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="no_hp1">Nomor Handphone</label>
                                            <input class="form-control" name="no_hp1" id="no_hp1" style="width: 100%" disabled>
                                        </div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="no_hp2">Nomor Handphone</label>
                                            <input class="form-control" name="no_hp2" id="no_hp2" style="width: 100%" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="form-group">
                                <label for="Produk">Produk</label>
                                <select class="form-control" name="produk" id="daftarProduk" style="width: 80%" >
                                    <option value="0">Pilih</option>
                                    <?php
                                            foreach ($dd_pro as $row) {  
                                                echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                                }
                                                echo"
                                            </select>
                                            " 
                                            ?>
                                </select>
                            </div>
                            <div id="nav-tahu-gila" style="display: none">
                                <input type="checkbox" name="paketItem" id="paketItem3"> Eceran
                                <input type="checkbox" name="paketItem" id="paketItem2"> Paket 3 Item
                                <input type="checkbox" name="paketItem" id="paketItem1"> Paket 2 Item
                            </div>
                            <div id="eceran" style="display: none;">
                                <div class="form-group">
                                    <label for="Barang">Barang</label>
                                    <select class="form-control" name="barang" id="daftarBarang" style="width: 80%;" >
                                    <option value="0">Pilih</option>
                                                <?php
                                                // foreach ($dd_bg as $row) {  
                                                //     echo "<option value='".$row->kd_barang."' >".$row->nm_barang."</option>";
                                                //     }
                                                //     echo"
                                                // </select>
                                                // " 
                                                ?>
                                    </select>
                                    <br>
                                    <input class="form-control" name="inputHarga" id="inputHarga" type="text" placeholder="Harga Barang" style="width: 80%" disabled>
                                    <br>
                                    <input class="form-control" name="jml_barang" id="jml_barang" type="text" placeholder="Jumlah barang" style="width: 80%">
                                    <br>
                                    <button class="btn btn-primary" id="tambah_ecer" value="tambah" onclick="order()" style="display: none;">Tambah</button>
                                    <button class="btn btn-primary" id="tambah_tahu" value="tambah" onclick="order_tahu()" style="display: none;">Tambah</button>
                                </div>
                    
                                <div class="form-group">
                                        <label for="almt_outlet">Rincian Order</label> <?php echo form_error('almt_outlet') ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tableOrder" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                <th>Name</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                    <tr>
                                                        <th colspan="3" style="text-align:right">Total:</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                </div>
                            </div>

                            <div id="tahu-gila">
                                    <script>
                                    $(document).ready(function(){
                                        $('#paketItem1').on('click', function(){
                                            if($('#paketItem1').is(':checked')){
                                                $('#paket2').show();
                                                $("#tab3").attr("data-toggle", "tab");
                                                $("#tab4").attr("data-toggle", "tab");
                                            }else{
                                                $('#paket2').hide();
                                                $("#tab3").attr("data-toggle", "");
                                                $("#tab4").attr("data-toggle", "");
                                            }
                                        })
                                    })
                                    $(document).ready(function(){
                                        $('#paketItem2').on('click', function(){
                                            if($('#paketItem2').is(':checked')){
                                                $('#paket3').show();
                                                $("#tab3").attr("data-toggle", "tab");
                                                $("#tab4").attr("data-toggle", "tab");
                                            }else{
                                                $('#paket3').hide();
                                                $("#tab3").attr("data-toggle", "");
                                                $("#tab4").attr("data-toggle", "");
                                            }
                                        })
                                    })
                                    $(document).ready(function(){
                                        $('#paketItem3').on('click', function(){
                                            if($('#paketItem3').is(':checked')){
                                                $('#eceran').show();
                                                $("#tab3").attr("data-toggle", "tab");
                                                $("#tab4").attr("data-toggle", "tab");
                                            }else{
                                                $('#eceran').hide();
                                                $("#tab3").attr("data-toggle", "");
                                                $("#tab4").attr("data-toggle", "");
                                            }
                                        })
                                    })
                                    </script>
                                </div>

                                <div id="paket3" style="display: none;">
                                <div class="form-group">
                                <label for="paketPorsi">Jumlah Porsi</label>
                                <input class="form-control" type="number" name="paketPorsi" id="paketPorsi" style="width: 80%;">
                                </div>
                                <table class="table table-bordered" id="tablePaket3">
                                    <tr>
                                    <th colspan="2" width=30%>Bahan Baku</th>
                                    <th colspan="2" width=30%>Bumbu</th>
                                    <th colspan="2" width=30%>Kemasan</th>
                                    </tr>
                                    <tr>
                                    <td width=20%>Tepung</td>
                                    <td><input class="form-control" type="number" name="jmltpng" id="jmltpng" step="any">kg</td>
                                    <td width=20%>Asin</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlasin" id="jmlasin"></td>
                                    <td width=20%>Paperbag</td>
                                    <td><input class="form-control kemCal" type="number" name="jmlpaperbag" id="jmlpaperbag"></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Cabe Lev 1</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlcabe1" id="jmlcabe1"></td>
                                    <td width=20%>Box</td>
                                    <td><input class="form-control kemCal" type="number" name="jmlbox" id="jmlbox"></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Cabe Lev 2</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlcabe2" id="jmlcabe2"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Cabe Lev 3</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlcabe3" id="jmlcabe3"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>BBQ</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlbbq" id="jmlbbq"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Balado</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlbalado" id="jmlbalado"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Keju</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlkeju" id="jmlkeju"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Pizza</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlpizza" id="jmlpizza"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Jagung Bakar</td>
                                    <td><input class="form-control txtCal" type="number" name="jmljbakar" id="jmljbakar"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Ayam Bawang Pedas</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlabp" id="jmlabp"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Sapi Panggang</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlsp" id="jmlsp"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Kari Ayam</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlka" id="jmlka"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Rumput Laut</td>
                                    <td><input class="form-control txtCal" type="number" name="jmlrl" id="jmlrl"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Jagung Manis</td>
                                    <td><input class="form-control txtCal" type="number" name="jmljm" id="jmljm"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%></td>
                                    <td></td>
                                    <td width=20%>Lada Hitam</td>
                                    <td><input class="form-control txtCal" type="number" name="jmllh" id="jmllh"></td>
                                    <td width=20%></td>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <td width=20%>Total</td>
                                    <td><input class="form-control" type="number" name="jmlbb" id="jmlbb" >kg</td>
                                    <td width=20%>Total</td>
                                    <td><input class="form-control" type="number" name="jmlbumbu" id="jmlbumbu" >porsi</td>
                                    <td width=20%>Total</td>
                                    <td><input class="form-control" type="number" name="jmlkemasan" id="jmlkemasan" >pcs</td>
                                    </tr>
                                </table>
                                </div>
                                <script>
                                var tpng = 0.04;
                                var hitung = 0;
                                var jmlporsi = document.getElementById('paketPorsi');
                                jmlporsi.addEventListener('keyup', function(e){
                                    var tot = parseInt(document.getElementById('paketPorsi').value) * 1900;
                                    // document.getElementById('tot_harga').value = number_format(tot,2,',','.');
                                    
                                    document.getElementById("jmlbumbu").max = jmlporsi.value;
                                    document.getElementById("jmlkemasan").max = jmlporsi.value;
                                    hitung = parseInt(jmlporsi.value) * tpng;
                                    document.getElementById("jmltpng").value = hitung;
                                    document.getElementById("jmlbb").value = hitung;
                                })

                                $(document).ready(function(){
                                $("#tablePaket3").on('input', '.txtCal', function () {
                                        var calculated_total_sum = 0;
                                    
                                        $("#tablePaket3 .txtCal").each(function () {
                                            var get_textbox_value = $(this).val();
                                            if ($.isNumeric(get_textbox_value)) {
                                                calculated_total_sum += parseFloat(get_textbox_value);
                                                }                  
                                            });
                                                $("#jmlbumbu").val(calculated_total_sum);
                                        });

                                });
                                $(document).ready(function(){
                                $("#tablePaket3").on('input', '.kemCal', function () {
                                        var calculated_total_sum = 0;
                                    
                                        $("#tablePaket3 .kemCal").each(function () {
                                            var get_textbox_value = $(this).val();
                                            if ($.isNumeric(get_textbox_value)) {
                                                calculated_total_sum += parseFloat(get_textbox_value);
                                                }                  
                                            });
                                                $("#jmlkemasan").val(calculated_total_sum);
                                        });

                                });
                                </script>

                                <div id="paket2" style="display: none;">
                                <div class="form-group">
                                    <label for="paketPorsi">Jumlah Porsi</label>
                                    <input class="form-control" type="number" name="paketPorsi" id="paketPorsi2" style="width: 80%;">
                                </div>
                                <table class="table table-bordered" id="tablePaket2">
                                    <tr>
                                    <td align="center"><input type="checkbox" name="bbdanb" id="bbdanb"> Bahan & Bumbu</td>
                                    <td align="center"><input type="checkbox" name="kdanb" id="kdanb"> Kemasan & Bumbu</td>
                                    <td align="center"><input type="checkbox" name="bbdank" id="bbdank"> Bahan & Kemasan</td>
                                    <script>
                                        var jmlporsi2 = document.getElementById('paketPorsi2');
                                        var hitung2 = 0;
                                        jmlporsi2.addEventListener('keyup', function(e){
                                        var tot2 = parseInt(document.getElementById('paketPorsi2').value) * 1500;
                                        // var a = number_format(tot2,2,',','.');
                                        // document.getElementById('tot_harga').value = tot2;

                                        document.getElementById("jmlbumbu21").max = jmlporsi2.value;
                                        document.getElementById("jmlbumbu22").max = jmlporsi2.value;
                                        document.getElementById("jmlkemasan22").max = jmlporsi2.value;
                                        document.getElementById("jmlkemasan23").max = jmlporsi2.value;
                                        hitung2 = parseInt(jmlporsi2.value) * tpng;
                                        document.getElementById("jmlhtpng21").value = hitung2;
                                        document.getElementById("jmlhtpng23").value = hitung2;
                                        document.getElementById("jmlbb21").value = hitung2;
                                        document.getElementById("jmlbb23").value = hitung2;
                                        })
                                    </script>
                                    </tr>
                                    <tr>
                                    <td>
                                        <div id="bahandanbumbu" style="display: none;">
                                        <table class="table table-bordered" id="tablePaket21">
                                        <tr>
                                            <th colspan="2">Bahan</th>
                                            <th colspan="2">Bumbu</th>
                                        </tr>
                                        <tr>
                                            <td width=20%>Tepung</td>
                                            <td><input class="form-control" type="number" name="jmltpng21" id="jmlhtpng21" step="any">kg</td>
                                            <td width=20%>Asin</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlasin21" id="jmlasin21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 1</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlcabe121" id="jmlcabe121"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 2</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlcabe221" id="jmlcabe221"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 3</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlcabe321" id="jmlcabe321"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>BBQ</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlbbq21" id="jmlbbq21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Balado</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlbalado21" id="jmlbalado21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Keju</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlkeju21" id="jmlkeju21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Pizza</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlpizza21" id="jmlpizza21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Jagung Bakar</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmljbakar21" id="jmljbakar21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Ayam Bawang Pedas</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlabp21" id="jmlabp21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Sapi Panggang</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlsp21" id="jmlsp21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Kari Ayam</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlka21" id="jmlka21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Rumput Laut</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmlrl21" id="jmlrl21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Jagung Manis</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmljm21" id="jmljm21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Lada Hitam</td>
                                            <td><input class="form-control 21Cal" type="number" name="jmllh21" id="jmllh21"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlbb21" id="jmlbb21">kg</td>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlbumbu21" id="jmlbumbu21">porsi</td>
                                        </tr>
                                        </table>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                        $("#tablePaket21").on('input', '.21Cal', function () {
                                                var calculated_total_sum = 0;
                                            
                                                $("#tablePaket21 .21Cal").each(function () {
                                                    var get_textbox_value = $(this).val();
                                                    if ($.isNumeric(get_textbox_value)) {
                                                        calculated_total_sum += parseFloat(get_textbox_value);
                                                        }                  
                                                    });
                                                        $("#jmlbumbu21").val(calculated_total_sum);
                                                });

                                        });
                                        
                                    </script>
                                    </td>
                                    <td>
                                        <div id="kemasandanbumbu" style="display: none;">
                                        <table class="table table-bordered" id="tablePaket22">
                                        <tr>
                                            <th colspan="2">Kemasan</th>
                                            <th colspan="2">Bumbu</th>
                                        </tr>
                                        <tr>
                                            <td width=20%>Paperbag</td>
                                            <td><input class="form-control 22Kem" type="number" name="jmlpaperbag22" id="jmlpaperbag22"></td>
                                            <td width=20%>Asin</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlasin22" id="jmlasin22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%>Box</td>
                                            <td><input class="form-control 22Kem" type="number" name="jmlbox22" id="jmlbox22"></td>
                                            <td width=20%>Cabe Lev 1</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlcabe122" id="jmlcabe122"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 2</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlcabe222" id="jmlcabe222"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Cabe Lev 3</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlcabe322" id="jmlcabe322"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>BBQ</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlbbq22" id="jmlbbq22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Balado</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlbalado22" id="jmlbalado22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Keju</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlkeju22" id="jmlkeju22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Pizza</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlpizza22" id="jmlpizza22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Jagung Bakar</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmljbakar22" id="jmljbakar22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Ayam Bawang Pedas</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlabp22" id="jmlabp22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Sapi Panggang</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlsp22" id="jmlsp22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Kari Ayam</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlka22" id="jmlka22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Rumput Laut</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmlrl22" id="jmlrl22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Jagung Manis</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmljm22" id="jmljm22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Lada Hitam</td>
                                            <td><input class="form-control 22Cal" type="number" name="jmllh22" id="jmllh22"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlkemasan22" id="jmlkemasan22">pcs</td>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlbumbu22" id="jmlbumbu22">porsi</td>
                                        </tr>
                                        </table>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                        $("#tablePaket22").on('input', '.22Cal', function () {
                                            var calculated_total_sum = 0;
                                            
                                            $("#tablePaket22 .22Cal").each(function () {
                                                var get_textbox_value = $(this).val();
                                                if ($.isNumeric(get_textbox_value)) {
                                                    calculated_total_sum += parseFloat(get_textbox_value);
                                                    }                  
                                                    });
                                                    $("#jmlbumbu22").val(calculated_total_sum);
                                            });

                                        });
                                        $(document).ready(function(){
                                        $("#tablePaket22").on('input', '.22Kem', function () {
                                            var calculated_total_sum = 0;
                                            
                                            $("#tablePaket22 .22Kem").each(function () {
                                                var get_textbox_value = $(this).val();
                                                if ($.isNumeric(get_textbox_value)) {
                                                    calculated_total_sum += parseFloat(get_textbox_value);
                                                    }                  
                                                    });
                                                    $("#jmlkemasan22").val(calculated_total_sum);
                                            });

                                        });

                                    </script>
                                    </td>
                                    <td>
                                        <div id="bahandankemasan" style="display: none;">
                                        <table class="table table-bordered" id="tablePaket23">
                                        <tr>
                                            <th colspan="2">Bahan</th>
                                            <th colspan="2">Kemasan</th>
                                        </tr>
                                        <tr>
                                            <td width=20%>Tepung</td>
                                            <td><input class="form-control" type="number" name="jmltpng23" id="jmlhtpng23" step="any">kg</td>
                                            <td width=20%>Paperbag</td>
                                            <td><input class="form-control 23Kem" type="number" name="jmlpaperbag23" id="jmlpaperbag23"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%></td>
                                            <td></td>
                                            <td width=20%>Box</td>
                                            <td><input class="form-control 23Kem" type="number" name="jmlbox23" id="jmlbox23"></td>
                                        </tr>
                                        <tr>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlbb23" id="jmlbb23" step="any">kg</td>
                                            <td width=20%>Total</td>
                                            <td><input class="form-control" type="number" name="jmlkemasan23" id="jmlkemasan23">pcs</td>
                                        </tr>
                                        </table>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                        $("#tablePaket23").on('input', '.23Kem', function () {
                                                var calculated_total_sum = 0;
                                            
                                                $("#tablePaket23 .23Kem").each(function () {
                                                    var get_textbox_value = $(this).val();
                                                    if ($.isNumeric(get_textbox_value)) {
                                                        calculated_total_sum += parseFloat(get_textbox_value);
                                                        }                  
                                                    });
                                                        $("#jmlkemasan23").val(calculated_total_sum);
                                                });

                                        });
                                    </script>
                                    </td>
                                    
                                    </tr>
                                </table>
                                </div>
                                <script>
                                $(document).ready(function(){
                                        $('#bbdanb').on('click', function(){
                                            if($('#bbdanb').is(':checked')){
                                                $('#bahandanbumbu').show();
                                            }else{
                                                $('#bahandanbumbu').hide();
                                            }
                                        })
                                    })
                                $(document).ready(function(){
                                        $('#kdanb').on('click', function(){
                                            if($('#kdanb').is(':checked')){
                                                $('#kemasandanbumbu').show();
                                            }else{
                                                $('#kemasandanbumbu').hide();
                                            }
                                        })
                                    })
                                $(document).ready(function(){
                                        $('#bbdank').on('click', function(){
                                            if($('#bbdank').is(':checked')){
                                                $('#bahandankemasan').show();
                                            }else{
                                                $('#bahandankemasan').hide();
                                            }
                                        })
                                    })
                                </script>
                            </div>
                            <script>
                                
                                function load(val) {
                                        table = $('#tableOrder').DataTable({
                                                // columnDefs: [{
                                                //     orderable: false,
                                                //     // targets: [0, 1, 2, 3, 4]
                                                // }],
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
                                                        .column(3)
                                                        .data()
                                                        .reduce(function(a, b) {
                                                            return intVal(a) + intVal(b);
                                                        }, 0);

                                                    // Total over this page
                                                    pageTotal = api
                                                        .column(3, {
                                                            page: 'current'
                                                        })
                                                        .data()
                                                        .reduce(function(a, b) {
                                                            return intVal(a) + intVal(b);
                                                        }, 0);

                                                    // if (($('#pilDiskon option:selected').val()) == "Rp") {
                                                    //     totalbyr = pageTotal - diskon;
                                                    // } else {
                                                    //     diskon = pageTotal * (diskon / 100);
                                                    //     totalbyr = pageTotal - diskon;
                                                    // }

                                                    // Update footer
                                                    var numformat = $.fn.dataTable.render.number('.', ',', 2, 'Rp ').display;
                                                    $('tr:eq(0) th:eq(1)', api.table().footer()).html(
                                                        numformat(pageTotal)
                                                    );
                                                    // $('tr:eq(2) th:eq(1)', api.table().footer()).html(
                                                    //     numformat(totalbyr)
                                                    // );
                                                },
                                                "bLengthChange": false,
                                                "bFilter": false,
                                                language: {
                                                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                                                    "sProcessing": "Sedang memproses...",
                                                    "sLengthMenu": "Tampilkan _MENU_ entri",
                                                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                                                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                                                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                                                    "sInfoPostFix": "",
                                                    "sSearch": "Cari:",
                                                    "sUrl": "",
                                                    "oPaginate": {
                                                        "sFirst": "Pertama",
                                                        "sPrevious": "Sebelumnya",
                                                        "sNext": "Selanjutnya",
                                                        "sLast": "Terakhir"
                                                    }
                                                },
                                                // 'order': [[ 2, "desc" ]],
                                                'processing': true,
                                                'serverSide': true,
                                                'serverMethod': 'post',
                                                'ajax': {
                                                    'url': '<?php echo base_url('monitor/tmp_order')?>',
                                                    'data': function(d) {
                                                        d.kd_mitra = val;
                                                    }
                                                },
                                                'columns': [
                                                    {
                                                        data: 'nm_barang'
                                                    },
                                                    {
                                                        data: 'jml_barang'
                                                    },
                                                    {
                                                        data: 'harga',
                                                        render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                                    },
                                                    {
                                                        data: 'harga_total',
                                                        render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                                    },
                                                    {
                                                        data: 'aksi'
                                                    }
                                                ]
                                            });
                                        };

                                        $(document).on('change', '#daftarBarang', function(e){
                                            var harga = document.getElementById('inputHarga');
                                            var daftar = $('#daftarBarang option:selected').val();
                                            // id = daftar.options[daftar.selectedIndex].value();
                                            $.ajax({
                                                url: '<?php echo base_url('monitor/get_harga_barang')?>',
                                                type: 'POST',
                                                data: {
                                                    kd_barang: daftar,
                                                },
                                                success: function(result) {
                                                    harga.value = result;
                                                }
                                            });
                                        });
                                    
                                            function order(){
                                                // var poli = $('#inputPoliklinik').val();
                                                // var diag = $('#inputDiagnosis').val();
                                                var brg = $('#daftarBarang option:selected').val();
                                                var harg = document.getElementById('inputHarga').value;
                                                var jml = $('#jml_barang').val();
                                                var kd_mitra = $('#kd_mitra').val();
                                                // var idku = $('#inputIdkunj').val();

                                                // var dataString = 'poli=' + poli + '&diag=' + diag + '&tind=' + tind + '&harg=' + harg +
                                                //     '&idku=' + idku + '&pers=' + pers + '&jmlh=' + jmlh + '&tambah=' + tambah + '&usin=' + usin;
                                                
                                                var dataString = 'brg='+brg+'&harg='+harg+'&jml='+jml+'&kd_mitra='+kd_mitra;
                                                $.ajax({
                                                    type: 'post',
                                                    url: '<?php echo base_url('monitor/tambah_order')?>',
                                                    data: dataString,
                                                    success: function() {
                                                        $('#tableOrder').DataTable().ajax.reload();
                                                        document.getElementById('daftarBarang').value = "";
                                                        // $('.ui-autocomplete-input').focus().val('');
                                                        document.getElementById('inputHarga').value = "";
                                                        document.getElementById('jml_barang').value = "1";
                                                        // document.getElementById('tab3').data-toggle="tab"
                                                        $("#tab3").attr("data-toggle", "tab");
                                                        $("#tab4").attr("data-toggle", "tab");
                                                        console.log('YEEE');
                                                    }
                                                });
                                            }
                                            function order_tahu(){
                                                // var poli = $('#inputPoliklinik').val();
                                                // var diag = $('#inputDiagnosis').val();
                                                var brg = $('#daftarBarang option:selected').val();
                                                var harg = document.getElementById('inputHarga').value;
                                                var jml = $('#jml_barang').val();
                                                var kd_mitra = $('#kd_mitra').val();
                                                // var idku = $('#inputIdkunj').val();

                                                // var dataString = 'poli=' + poli + '&diag=' + diag + '&tind=' + tind + '&harg=' + harg +
                                                //     '&idku=' + idku + '&pers=' + pers + '&jmlh=' + jmlh + '&tambah=' + tambah + '&usin=' + usin;
                                                
                                                var dataString = 'brg='+brg+'&harg='+harg+'&jml='+jml+'&kd_mitra='+kd_mitra;
                                                $.ajax({
                                                    type: 'post',
                                                    url: '<?php echo base_url('monitor/tambah_order_tahu')?>',
                                                    data: dataString,
                                                    success: function() {
                                                        $('#tableOrder').DataTable().ajax.reload();
                                                        document.getElementById('daftarBarang').value = "";
                                                        // $('.ui-autocomplete-input').focus().val('');
                                                        document.getElementById('inputHarga').value = "";
                                                        document.getElementById('jml_barang').value = "1";
                                                        // document.getElementById('tab3').data-toggle="tab"
                                                        $("#tab3").attr("data-toggle", "tab");
                                                        $("#tab4").attr("data-toggle", "tab");
                                                        console.log('YEEE');
                                                    }
                                                });
                                            }
                            
                                        function hapus_order(val){
                                            var data = 'val='+val;
                                            $.ajax({
                                                type: 'post',
                                                url: '<?php echo base_url('monitor/hapus_order')?>',
                                                data: data,
                                                success: function(){
                                                    $('#tableOrder').DataTable().ajax.reload();
                                                    console.log('YEEE');
                                                }
                                            })
                                            // console.log(val);
                                        }
                                        function temp_hapus_order(val){
                                            var data = 'val='+val;
                                            $.ajax({
                                                type: 'post',
                                                url: '<?php echo base_url('monitor/temp_hapus_order')?>',
                                                data: data,
                                                success: function(){
                                                    $('#tableOrder').DataTable().ajax.reload();
                                                    console.log('YEEE');
                                                }
                                            })
                                            // console.log(val);
                                        }
                                        
                            </script>
                            <div class="form-group" stye="display: none;">
                                
                                <input class="form-control" type="text" name="almt_outlet" id="almt_outlet" style="width: 80%; display: none;" disabled>
                            </div>
                            <table width='80%' style='display:none'>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            
                                            <select class="select2-A provinsi" name="provinsi" id="provinsi2" style="width: 100%; display: none;">
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
                                            
                                            <select class="select2-A kota" name="almt_kt_outlet" id="almt_kt_outlet" style="width: 100%; display: none;">
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <select class="select2-A kecamatan" name="almt_kec_outlet" id="almt_kec_outlet" style="width:100%; display: none;">
                                                
                                            </select>
                                        </div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <select class="select2-A kelurahan" name="almt_kel_outlet" id="almt_kel_outlet" style="width:100%; display: none;">
                                                
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <div class="form-group">
                                <label for="ats_nm_penerima">Atas Nama</label>
                                <input class="form-control" type="text" name="ats_nm_penerima" id="ats_nm_penerima" style="width: 80%">
                            </div>
                            <div class="form-group">
                                    <label for="almt_kirim">Alamat Kirim</label> 
                                    <input class="form-control" type="text" name="almt_kirim" id="almt_kirim" style="width: 80%;">
                            </div>
                            <table width='80%'>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <select class="select2-A provinsi" name="provinsi" id="provinsi" style="width: 100%;">
                                            <?php
                                            echo "<option></option>";
                                            foreach ($dd_pr as $row) {  
                                                echo "<option value='".$row->id."' >".$row->name."</option>";
                                                }
                                                echo" 
                                            </select>
                                            " 
                                            ?>
                                        </div>
                                    </td>
                                    <td width='50%'>                               
                                        <div class="form-group">
                                            <label for="almt_kt_rmh">Kota</label>
                                            <select class="select2-A kota" name="almt_kt_kirim" id="almt_kt_kirim" style="width:100%">
                                                
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="almt_kec_rmh">Kecamatan</label>
                                            <select class="select2-A kecamatan" name="almt_kec_kirim" id="almt_kec_kirim" style="width:100%">
                                                
                                            </select>
                                        </div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="almt_kel_rmh">Kelurahan</label>
                                            <select class="select2-A kelurahan" name="almt_kel_kirim" id="almt_kel_kirim" style="width:100%">
                                                
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="form-group">
                                <input type="checkbox" name="cek" id="cek1" value="1"><label for="in_cek1">&nbsp Seperti Alamat Rumah</label>
                                &nbsp&nbsp
                                <input type="checkbox" name="cek" id="cek2" value="2"><label for="in_cek2">&nbsp Seperti Alamat Outlet</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="in_penerusan" id="penerusan">&nbsp&nbsp Penerusan Alamat
                            </div>
                            <div class="form-group">
                                <label for="almt_terusan">Atasnama Penerusan</label>
                                <input class="form-control" type="text" name="ats_nm_penerusan" id="ats_nm_penerusan" style="width: 80%;" disabled>
                            </div>
                            <div class="form-group">
                                <label for="almt_terusan">Penerusan Alamat</label>
                                <input class="form-control" type="text" name="almt_terusan" id="almt_terusan" style="width: 80%;" disabled>
                            </div>
                            <table width="80%">
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="prov_terusan">Provinsi</label>
                                            <select class="select2-A provinsi" name="prov_terusan" id="prov_terusan" style="width: 100%;" disabled>
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
                                        <select class="select2-A kota" name="kt_terusan" id="kt_terusan" style="width:100%" disabled>
                                            
                                        </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="kec_terusan">Kecamatan</label>
                                            <select class="select2-A kecamatan" name="kec_terusan" id="kec_terusan" style="width:100%" disabled>
                                            </select>
                                        </div>
                                    </td>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="kel_terusan">Kelurahan</label>
                                            <select class="select2-A kelurahan" name="kel_terusan" id="kel_terusan" style="width:100%" disabled>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <script>
                                $(document).ready(function(){
                                    $('#penerusan').on('click', function(){
                                        if($('#penerusan').is(':checked')){
                                            $('#almt_terusan').prop('disabled', false);
                                            $('#prov_terusan').prop('disabled', false);
                                            $('#kt_terusan').prop('disabled', false);
                                            $('#kec_terusan').prop('disabled', false);
                                            $('#kel_terusan').prop('disabled', false);
                                            $('#ats_nm_penerusan').prop('disabled', false);
                                            console.log('a');
                                        }else{
                                            $('#almt_terusan').prop('disabled', true);
                                            $('#prov_terusan').prop('disabled', true);
                                            $('#kt_terusan').prop('disabled', true);
                                            $('#ats_nm_penerusan').prop('disabled', true);
                                            $('#almt_terusan').val('');
                                            $('#prov_terusan').val(null).trigger('change');
                                            $('#kt_terusan').val(null).trigger('change');
                                            $('#kec_terusan').val(null).trigger('change');
                                            $('#kel_terusan').val(null).trigger('change');
                                            console.log('b');
                                        }
                                    })
                                })
                                $(document).ready(function(){
                                    $('#prov_terusan').change(function(){
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
                                                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                }
                                                $('#kt_terusan').html(html);
                                            }
                                        });
                                    });
                                });
                                $(document).ready(function(){
                                    $('#kt_terusan').change(function(){
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
                                                for(i=0; i<data.length; i++){
                                                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                }
                                                $('#kec_terusan').html(html);
                                            }
                                        });
                                    });
                                });
                                $(document).ready(function(){
                                    $('#kec_terusan').change(function(){
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
                                                for(i=0; i<data.length; i++){
                                                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                }
                                                $('#kel_terusan').html(html);
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                        <! /.tab-pane -->
                        <div class="tab-pane" id="tab_4">
                            <div class="or_bank">
                                <table width='80%'>
                                    <tr>
                                        <td width='20%'>
                                            <div class="form-group">
                                                <label for="rekening">Bank</label>
                                                <select class="form-control" name="nm_bank" id="nm_bank" style="width: 100%;">
                                                    <option value="BNI">BNI</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="Mandiri">Mandiri</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td width='80%'>
                                            <div class="form-group">
                                                <label for="no_rekening">Nomor Rekening</label>
                                                <input class="form-control" type="text" name="rekening" id="rekening" style="width: 100%">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="form-group">
                                    <label for="jml_tarif">Jumlah Transfer</label>
                                    <input class="form-control" type="text" name="jml_transfer" id="jml_transfer" style="width: 80%;">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="ats_nm_rekening" id="ats_nm_rekening" placeholder="Atas Nama" style="width: 80%;">
                                </div>
                            </div>
                            <button class="btn btn-primary" id="or_tambah" value="tambah">Tambah Bank</button>

                            <script>
                                $(document).ready(function() {
                                    var max_fields      = 3; //maximum input boxes allowed
                                    var wrapper   		= $(".or_bank"); //Fields wrapper
                                    var add_button      = $("#or_tambah"); //Add button ID
                                    
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
                                                                <select class="form-control" name="nm_bank" id="nm_bank`+x+`" style="width: 100%;">
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
                                                                <input class="form-control" type="text" name="rekening" id="rekening`+x+`" style="width: 100%">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="form-group">
                                                    <label for="jml_tarif">Jumlah Transfer</label>
                                                    <input class="form-control" type="text" name="jml_tarif" id="jml_tarif`+x+`" style="width: 80%;">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="ats_nm_rekening" id="ats_nm_rekening`+x+`" placeholder="Atas Nama" style="width: 80%;">
                                                </div>
                                            <a href="#" class="remove_field">Remove</a></div>`); //add input box
                                            console.log('aaa');
                                        }
                                    });
                                    
                                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                        e.preventDefault(); $(this).parent('div').remove(); x--;
                                    })
                                });

                                var rupiah2 = document.getElementById('jml_transfer');
                                rupiah2.addEventListener('keyup', function(e){
                                    rupiah2.value = formatRupiah2(this.value, 'Rp ');
                                });
                            
                                function formatRupiah2(angka, prefix){
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
                            </script>
                            <table width="80%">
                                <tr>
                                    <td width='50%'>
                                        <div class="form-group">
                                            <label for="ekspedisi">Ekspedisi</label>
                                            <select class="form-control" name="ekspedisi" id="ekspedisi" style="width: 100%;">
                                                <option value="0">Pilih</option>
                                            <?php
                                            foreach ($dd_ek as $row) {  
                                                echo "<option value='".$row->kd_ekspedisi."' >".$row->nama_ekspedisi."</option>";
                                                }
                                                echo"
                                            </select>
                                            <!-- "
                                        ?> -->
                                        </div>
                                    </td>
                                    <td width='50%'>             
                                        <div class="form-group">
                                            <label for="biaya_kirim">Berat</label>
                                            <input class="form-control" type="text" name="b_barang" id="b_barang" style="width: 100%;" placeholder="kg">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="form-group">
                                    <label for="biaya_kirim">Biaya Kirim</label>
                                    <input class="form-control" type="text" name="biaya_kirim" id="biaya_kirim" style="width: 80%;">
                                </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input class="form-control" type="text" name="keterangan" id="keterangan" style="width: 80%;">
                            </div>
                            <input type="hidden" id="kd_mitra">
                            <input type="hidden" id="almt_outlet">
                            <button id="submit" type="submit" class="btn btn-success" >Simpan</button>
                            <button type="button" class="btn btn-secondary" onclick="tutup()">Batal</button>
                        <script>
                            $(".provinsi").select2({
                                dropdownParent: $('.modal-body', '#exampleModal'),
                                placeholder: "Pilih Provinsi",
                                allowClear: true
                                });
                                $(".kota").select2({
                                dropdownParent: $('.modal-body', '#exampleModal'),
                                placeholder: "Pilih Kota",
                                allowClear: true
                                });
                                $(".kecamatan").select2({
                                dropdownParent: $('.modal-body', '#exampleModal'),
                                placeholder: "Pilih Kecamatan",
                                allowClear: true
                                });
                                $(".kelurahan").select2({
                                dropdownParent: $('.modal-body', '#exampleModal'),
                                placeholder: "Pilih Kelurahan",
                                allowClear: true
                                });
                            var kirim2 = document.getElementById('biaya_kirim');
                            kirim2.addEventListener('keyup', function(e){
                                kirim2.value = formatRupiahKirim2(this.value, 'Rp ');
                            });

                            function formatRupiahKirim2(angka, prefix){
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
                            $("#submit").click(function(){
                                $.ajax({
                                    url: "<?php echo base_url('Monitor/get_temp')?>",
                                    dataType: 'json',
                                    success: function(data){
                                        var rinci = '';
                                        var i;
                                        for(i=0; i<data.length; i++){
                                            rinci += '<tr><td>'+data[i].nm_barang+'</td><td>'+data[i].jml_barang+'</td></tr>';
                                            //   rinci += 'a';
                                        };
                                        //   console.log(rinci);
                                        Swal.fire({
                                                title: "Rincian Order",
                                                html: '<table><tr><td align="left">Nama Mitra</td><td>:</td><td align="left">'+document.getElementById('nm_mitra').value+
                                                '</td></tr><tr><td align="left">Alamat Kirim</td><td>:</td><td align="left">'+document.getElementById('almt_rmh').value+
                                                '</td></tr><tr><td align="left">No. HP</td><td>:</td><td align="left"> '+document.getElementById('no_hp1').value+
                                                '</td></tr><tr><td align="left">No. HP</td><td>:</td><td align="left"> '+document.getElementById('no_hp2').value+
                                                '</td></tr><tr><td align="left">Produk</td><td>:</td><td align="left"> '+$('#daftarProduk option:selected').html()+
                                                '</td></tr><tr><td align="left">Rincian Order</td><td>:</td><td align="left"> '+
                                                '<table border="1"><tr><td>Nama</td><td>Jumlah</td></tr>'+rinci+'</table></td></tr><tr><td align="left">Keterangan</td><td>:</td><td align="left">'+
                                                document.getElementById('keterangan').value+'</td></tr><tr><td align="left">Ekspedisi</td><td>:</td><td align="left"> '+$('#ekspedisi option:selected').text()+
                                                '</td></tr></table>',
                                                showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Kirim'
                                            }).then((result) => {
                                                if (result.value) {
                                                    console.log('Sukses');
                                                    simpan_order_mitra();
                                                }
                                                })
                                    }
                                });
                            })

                            function alert(){
                                console.log('BUG');
                                
                            }

                            function form_validation(){
                                var almt_kirim = $('#almt_kirim').val();
                                if (almt_kirim == "") {
                                    alert("Alamat kirim harus di isi");
                                    return false;
                                }
                            }

                            function simpan_order_mitra(){
                                var kd_mitra = $('#kd_mitra').val();
                                var nm_mitra = $('#nm_mitra').val();
                                var almt_rmh = $('#almt_rmh').val();
                                var no_hp1 = $('#no_hp1').val();
                                var no_hp2 = $('#no_hp2').val();
                                var ats_nm_kirim = $('#ats_nm_penerima').val();
                                var almt_kirim = $('#almt_kirim').val();
                                var almt_prov_kirim = $('#provinsi option:selected').val();
                                var almt_kt_kirim = $('#almt_kt_kirim option:selected').val();
                                var almt_kec_kirim = $('#almt_kec_kirim option:selected').val();
                                var almt_kel_kirim = $('#almt_kel_kirim option:selected').val();
                                var jml_transfer = $('#jml_transfer').val();
                                var nm_bank = $('#nm_bank option:selected').val();
                                var rekening = $('#rekening').val();
                                var ats_nm_rekening = $('#ats_nm_rekening').val();
                                var ekspedisi = $('#ekspedisi option:selected').val();
                                var b_barang = $('#b_barang').val();
                                var biaya_kirim = $('#biaya_kirim').val();
                                var keterangan = $('#keterangan').val();
                                var nm_produk = $('#daftarProduk option:selected').val();
                                // var 
                                var dataString = 'kd_mitra='+kd_mitra+'&nm_mitra='+nm_mitra+'&almt_rmh='+almt_rmh+
                                '&no_hp1='+no_hp1+'&no_hp2='+no_hp2+'&ats_nm_kirim='+ats_nm_kirim+'&almt_kirim='+almt_kirim+'&almt_prov_kirim='+almt_prov_kirim+
                                '&almt_kt_kirim='+almt_kt_kirim+'&almt_kec_kirim='+almt_kec_kirim+'&almt_kel_kirim='+almt_kel_kirim+'&jml_transfer='+jml_transfer+'&nm_bank='+nm_bank+
                                '&rekening='+rekening+'&ats_nm_rekening='+ats_nm_rekening+'&ekspedisi='+ekspedisi+
                                '&b_barang='+b_barang+'&biaya_kirim='+biaya_kirim+'&keterangan='+keterangan+
                                '&nm_produk='+nm_produk;

                                if($('#penerusan').is(':checked')){
                                    var ats_nm_penerusan = $('#ats_nm_penerusan').val();
                                    var almt_terusan = $('#almt_terusan').val();
                                    var prov_terusan = $('#prov_terusan option:selected').val();
                                    var almt_kt_terusan = $('#kt_terusan option:selected').val();
                                    var almt_kec_terusan = $('#kec_terusan option:selected').val();
                                    var almt_kel_terusan = $('#kel_terusan option:selected').val();
                                    dataString += '&ats_nm_penerusan='+ats_nm_penerusan+'&almt_terusan='+almt_terusan+'&almt_kt_terusan='+almt_kt_terusan;+'&almt_kec_terusan='+almt_kec_terusan;+'&almt_kel_terusan='+almt_kel_terusan;
                                }

                                if(($('#daftarProduk option:selected').val()) === 'PR000001'){
                                    if($('#paketItem2').is(':checked')){
                                        var jmlporsi = $('#paketPorsi').val();
                                        var jmltpng = $('#jmltpng').val();
                                        var tepung = 'tepung';
                                        
                                        var tot_h_paket3 = parseInt(document.getElementById('paketPorsi').value) * 1900;
                                        dataString += '&jmlporsi='+jmlporsi+'&jmltpng='+jmltpng+'&tot_h_paket3='+tot_h_paket3+'&tepung='+tepung;
                                        if($('#jmlasin').val() !== ''){
                                            var jmlasin = $('#jmlasin').val();
                                            var asin = 'asin';
                                            dataString += '&jmlasin='+jmlasin+'&asin='+asin
                                        }
                                        if($('#jmlpaperbag').val() !== ''){
                                            var jmlpaperbag = $('#jmlpaperbag').val();
                                            var paperbag = 'paperbag';
                                            dataString += '&jmlpaperbag='+jmlpaperbag+'&paperbag='+paperbag;
                                        }
                                        if($('#jmlcabe1').val() !== ''){
                                            var jmlcabe1 = $('#jmlcabe1').val();
                                            var cabe1 = 'cabe1';
                                            dataString += '&jmlcabe1='+jmlcabe1+'&cabe1='+cabe1;
                                        }
                                        if($('#jmlbox').val() !== ''){
                                            var jmlbox = $('#jmlbox').val();
                                            var box ='box';
                                            dataString += '&jmlbox='+jmlbox+'&box='+box;
                                        }
                                        if($('#jmlcabe2').val() !== ''){
                                            var jmlcabe2 = $('#jmlcabe2').val();
                                            var cabe2 = 'cabe2';
                                            dataString += '&jmlcabe2='+jmlcabe2+'&cabe2='+cabe2;
                                        }
                                        if($('#jmlcabe3').val() !== ''){
                                            var jmlcabe3 = $('#jmlcabe3').val();
                                            var cabe3 = 'cabe3';
                                            dataString += '&jmlcabe3='+jmlcabe3+'&cabe3='+cabe3;
                                        }
                                        if($('#jmlbbq').val() !== ''){
                                            var jmlbbq = $('#jmlbbq').val();
                                            var bbq = 'bbq';
                                            dataString += '&jmlbbq='+jmlbbq+'&bbq='+bbq;
                                        }
                                        if($('#jmlbalado').val() !== ''){
                                            var jmlbalado = $('#jmlbalado').val();
                                            var balado = 'balado';
                                            dataString += '&jmlbalado='+jmlbalado+'&balado='+balado;
                                        }
                                        if($('#jmlkeju').val() !== ''){
                                            var jmlkeju = $('#jmlkeju').val();
                                            var keju = 'keju';
                                            dataString += '&jmlkeju='+jmlkeju+'&keju='+keju;
                                        }
                                        if($('#jmlpizza').val() !== ''){
                                            var jmlpizza = $('#jmlpizza').val();
                                            var pizza = 'pizza';
                                            dataString += '&jmlpizza='+jmlpizza+'&pizza='+pizza;
                                        }
                                        if($('#jmljbakar').val() !== ''){
                                            var jmljbakar = $('#jmljbakar').val();
                                            var jbakar = 'jagung bakar';
                                            dataString += '&jmljbakar='+jmljbakar+'&jbakar='+jbakar;
                                        }
                                        if($('#jmlabp').val() !== ''){
                                            var jmlabp = $('#jmlabp').val();
                                            var abaw = 'ayam bawang';
                                            dataString += '&jmlabp='+jmlabp+'&abaw='+abaw;
                                        }
                                        if($('#jmlsp').val() !== ''){
                                            var jmlsp = $('#jmlsp').val();
                                            var sapip = 'sapi panggang';
                                            dataString += '&jmlsp='+jmlsp+'&sapip='+sapip;
                                        }
                                        if($('#jmlka').val() !== ''){
                                            var jmlka = $('#jmlka').val();
                                            var kari = 'kari';
                                            dataString += '&jmlka='+jmlka+'&kari='+kari;
                                        }
                                        if($('#jmlrl').val() !== ''){
                                            var jmlrl = $('#jmlrl').val();
                                            var rumput = 'rumput';
                                            dataString += '&jmlrl='+jmlrl+'&rumput='+rumput;
                                        }
                                        if($('#jmljm').val() !== ''){
                                            var jmljm = $('#jmljm').val();
                                            dataString += '&jmljm='+jmljm
                                        }
                                        if($('#jmllh').val() !== ''){
                                            var jmllh = $('#jmllh').val();
                                            var jman = 'jagung manis';
                                            dataString += '&jmllh='+jmllh+'&jman='+jman;
                                        }
                                        var jmlbb = $('#jmlbb').val();
                                        var jmlbumbu = $('#jmlbumbu').val();
                                        var jmlkemasan = $('#jmlkemasan').val();
                                        dataString += '&jmlbb='+jmlbb+'&jmlbumbu='+jmlbumbu+'&jmlkemasan='+jmlkemasan;

                                    }else if($('#paketItem1').is(':checked')){
                                        var jmlporsi = $('#paketPorsi2').val();
                                        var tot_h_paket3 = parseInt(document.getElementById('paketPorsi2').value) * 1500;
                                        dataString += '&jmlporsi='+jmlporsi+'&tot_h_paket3='+tot_h_paket3;

                                        if($('#bbdanb').is(':checked')){
                                            var jmltpng = $('#jmlhtpng21').val();
                                            var tepung = 'tepung';
                                            dataString += '&jmltpng='+jmltpng+'&tepung='+tepung;
                                            
                                            if($('#jmlasin21').val() !== ''){
                                                var jmlasin = $('#jmlasin21').val();
                                                var asin = 'asin';
                                                dataString += '&jmlasin='+jmlasin+'&asin='+asin
                                            }
                                            if($('#jmlcabe121').val() !== ''){
                                                var jmlcabe1 = $('#jmlcabe121').val();
                                                var cabe1 = 'cabe1';
                                                dataString += '&jmlcabe1='+jmlcabe1+'&cabe1='+cabe1;
                                            }
                                            if($('#jmlcabe221').val() !== ''){
                                                var jmlcabe2 = $('#jmlcabe221').val();
                                                var cabe2 = 'cabe2';
                                                dataString += '&jmlcabe2='+jmlcabe2+'&cabe2='+cabe2;
                                            }
                                            if($('#jmlcabe321').val() !== ''){
                                                var jmlcabe3 = $('#jmlcabe321').val();
                                                var cabe3 = 'cabe3';
                                                dataString += '&jmlcabe3='+jmlcabe3+'&cabe3='+cabe3;
                                            }
                                            if($('#jmlbbq21').val() !== ''){
                                                var jmlbbq = $('#jmlbbq21').val();
                                                var bbq = 'bbq';
                                                dataString += '&jmlbbq='+jmlbbq+'&bbq='+bbq;
                                            }
                                            if($('#jmlbalado21').val() !== ''){
                                                var jmlbalado = $('#jmlbalado21').val();
                                                var balado = 'balado';
                                                dataString += '&jmlbalado='+jmlbalado+'&balado='+balado;
                                            }
                                            if($('#jmlkeju21').val() !== ''){
                                                var jmlkeju = $('#jmlkeju21').val();
                                                var keju = 'keju';
                                                dataString += '&jmlkeju='+jmlkeju+'&keju='+keju;
                                            }
                                            if($('#jmlpizza21').val() !== ''){
                                                var jmlpizza = $('#jmlpizza21').val();
                                                var pizza = 'pizza';
                                                dataString += '&jmlpizza='+jmlpizza+'&pizza='+pizza;
                                            }
                                            if($('#jmljbakar21').val() !== ''){
                                                var jmljbakar = $('#jmljbakar21').val();
                                                var jbakar = 'jagung bakar';
                                                dataString += '&jmljbakar='+jmljbakar+'&jbakar='+jbakar;
                                            }
                                            if($('#jmlabp21').val() !== ''){
                                                var jmlabp = $('#jmlabp21').val();
                                                var abaw = 'ayam bawang';
                                                dataString += '&jmlabp='+jmlabp+'&abaw='+abaw;
                                            }
                                            if($('#jmlsp21').val() !== ''){
                                                var jmlsp = $('#jmlsp21').val();
                                                var sapip = 'sapi panggang';
                                                dataString += '&jmlsp='+jmlsp+'&sapip='+sapip;
                                            }
                                            if($('#jmlka21').val() !== ''){
                                                var jmlka = $('#jmlka21').val();
                                                var kari = 'kari';
                                                dataString += '&jmlka='+jmlka+'&kari='+kari;
                                            }
                                            if($('#jmlrl21').val() !== ''){
                                                var jmlrl = $('#jmlrl21').val();
                                                var rumput = 'rumput';
                                                dataString += '&jmlrl='+jmlrl+'&rumput='+rumput;
                                            }
                                            if($('#jmljm21').val() !== ''){
                                                var jmljm = $('#jmljm21').val();
                                                dataString += '&jmljm='+jmljm
                                            }
                                            if($('#jmllh21').val() !== ''){
                                                var jmllh = $('#jmllh21').val();
                                                var jman = 'jagung manis';
                                                dataString += '&jmllh='+jmllh+'&jman='+jman;
                                            }

                                        }else if($('#kdanb').is(':checked')){
                                            var jmlporsi = $('#paketPorsi2').val();
                                            var tot_h_paket3 = parseInt(document.getElementById('paketPorsi2').value) * 1500;
                                            dataString += '&jmlporsi='+jmlporsi+'&tot_h_paket3='+tot_h_paket3;

                                            if($('#jmlpaperbag22').val() !== ''){
                                                var jmlpaperbag = $('#jmlpaperbag22').val();
                                                var paperbag = 'paperbag';
                                                dataString += '&jmlpaperbag='+jmlpaperbag+'&paperbag='+paperbag;
                                            }
                                            if($('#jmlbox22').val() !== ''){
                                                var jmlbox = $('#jmlbox22').val();
                                                var box ='box';
                                                dataString += '&jmlbox='+jmlbox+'&box='+box;
                                            }
                                            if($('#jmlasin22').val() !== ''){
                                                var jmlasin = $('#jmlasin22').val();
                                                var asin = 'asin';
                                                dataString += '&jmlasin='+jmlasin+'&asin='+asin
                                            }
                                            if($('#jmlcabe122').val() !== ''){
                                                var jmlcabe1 = $('#jmlcabe122').val();
                                                var cabe1 = 'cabe1';
                                                dataString += '&jmlcabe1='+jmlcabe1+'&cabe1='+cabe1;
                                            }
                                            if($('#jmlcabe222').val() !== ''){
                                                var jmlcabe2 = $('#jmlcabe222').val();
                                                var cabe2 = 'cabe2';
                                                dataString += '&jmlcabe2='+jmlcabe2+'&cabe2='+cabe2;
                                            }
                                            if($('#jmlcabe322').val() !== ''){
                                                var jmlcabe3 = $('#jmlcabe322').val();
                                                var cabe3 = 'cabe3';
                                                dataString += '&jmlcabe3='+jmlcabe3+'&cabe3='+cabe3;
                                            }
                                            if($('#jmlbbq22').val() !== ''){
                                                var jmlbbq = $('#jmlbbq22').val();
                                                var bbq = 'bbq';
                                                dataString += '&jmlbbq='+jmlbbq+'&bbq='+bbq;
                                            }
                                            if($('#jmlbalado22').val() !== ''){
                                                var jmlbalado = $('#jmlbalado22').val();
                                                var balado = 'balado';
                                                dataString += '&jmlbalado='+jmlbalado+'&balado='+balado;
                                            }
                                            if($('#jmlkeju22').val() !== ''){
                                                var jmlkeju = $('#jmlkeju22').val();
                                                var keju = 'keju';
                                                dataString += '&jmlkeju='+jmlkeju+'&keju='+keju;
                                            }
                                            if($('#jmlpizza22').val() !== ''){
                                                var jmlpizza = $('#jmlpizza22').val();
                                                var pizza = 'pizza';
                                                dataString += '&jmlpizza='+jmlpizza+'&pizza='+pizza;
                                            }
                                            if($('#jmljbakar22').val() !== ''){
                                                var jmljbakar = $('#jmljbakar22').val();
                                                var jbakar = 'jagung bakar';
                                                dataString += '&jmljbakar='+jmljbakar+'&jbakar='+jbakar;
                                            }
                                            if($('#jmlabp22').val() !== ''){
                                                var jmlabp = $('#jmlabp22').val();
                                                var abaw = 'ayam bawang';
                                                dataString += '&jmlabp='+jmlabp+'&abaw='+abaw;
                                            }
                                            if($('#jmlsp22').val() !== ''){
                                                var jmlsp = $('#jmlsp22').val();
                                                var sapip = 'sapi panggang';
                                                dataString += '&jmlsp='+jmlsp+'&sapip='+sapip;
                                            }
                                            if($('#jmlka22').val() !== ''){
                                                var jmlka = $('#jmlka22').val();
                                                var kari = 'kari';
                                                dataString += '&jmlka='+jmlka+'&kari='+kari;
                                            }
                                            if($('#jmlrl22').val() !== ''){
                                                var jmlrl = $('#jmlrl22').val();
                                                var rumput = 'rumput';
                                                dataString += '&jmlrl='+jmlrl+'&rumput='+rumput;
                                            }
                                            if($('#jmljm22').val() !== ''){
                                                var jmljm = $('#jmljm22').val();
                                                dataString += '&jmljm='+jmljm
                                            }
                                            if($('#jmllh22').val() !== ''){
                                                var jmllh = $('#jmllh22').val();
                                                var jman = 'jagung manis';
                                                dataString += '&jmllh='+jmllh+'&jman='+jman;
                                            }
                                        }else if($('#bbdank').is(':checked')){
                                            var jmltpng = $('#jmlhtpng23').val();
                                            var tepung = 'tepung';
                                            dataString += '&jmltpng='+jmltpng+'&tepung='+tepung;

                                            if($('#jmlpaperbag23').val() !== ''){
                                                var jmlpaperbag = $('#jmlpaperbag23').val();
                                                var paperbag = 'paperbag';
                                                dataString += '&jmlpaperbag='+jmlpaperbag+'&paperbag='+paperbag;
                                            }
                                            if($('#jmlbox23').val() !== ''){
                                                var jmlbox = $('#jmlbox23').val();
                                                var box ='box';
                                                dataString += '&jmlbox='+jmlbox+'&box='+box;
                                            }
                                        }
                                    }
                                }
                                
                                if($('#jml_tarif2').val() !== undefined){
                                var jml_tarif2 = $('#jml_tarif2').val();
                                var nm_bank2 = $('#nm_bank2 option:selected').val();
                                var rekening2 = $('#rekening2').val();
                                var ats_nm_rekening2 = $('#ats_nm_rekening2').val();
                                dataString += '&jml_tarif2='+jml_tarif2+'&nm_bank2='+nm_bank2+'&rekening2='+rekening2+'&ats_nm_rekening2='+ats_nm_rekening2;
                                }
                                if($('#jml_tarif3').val() !== undefined){
                                    var jml_tarif3 = $('#jml_tarif3').val();
                                    var nm_bank3 = $('#nm_bank3 option:selected').val();
                                    var rekening3 = $('#rekening3').val();
                                    var ats_nm_rekening3 = $('#ats_nm_rekening3').val();
                                    dataString += '&jml_tarif3='+jml_tarif3+'&nm_bank3='+nm_bank3+'&rekening3='+rekening3+'&ats_nm_rekening3='+ats_nm_rekening3;
                                }

                                $.ajax({
                                    type: 'post',
                                    url: '<?php echo base_url('Monitor/tambah_mitra_order')?>',
                                    data: dataString,
                                    success: function(){
                                            document.getElementById('almt_kirim').value = "";
                                            document.getElementById('provinsi3').value = "";
                                            document.getElementById('provinsi3').disabled = false;
                                            document.getElementById('almt_outlet').value = "";
                                            document.getElementById('provinsi2').value = "";
                                            document.getElementById('provinsi2').disabled = false;
                                            document.getElementById('provinsi').value = "";
                                            document.getElementById('provinsi').disabled = false;
                                            document.getElementById('almt_kt_kirim').value = "";
                                            document.getElementById('almt_kt_kirim').disabled = false;
                                            document.getElementById('almt_kirim').disabled = false;
                                            document.getElementById('jml_transfer').value = "";
                                            document.getElementById('rekening').value = "";
                                            document.getElementById('ats_nm_rekening').value = "";
                                            document.getElementById('ekspedisi').value = "";
                                            document.getElementById('b_barang').value = "";
                                            document.getElementById('biaya_kirim').value = "";
                                            document.getElementById('keterangan').value = "";
                                            document.getElementById('daftarProduk').value = "";
                                            document.getElementById('daftarBarang').value = "";
                                            document.getElementById('jml_barang').value = "";
                                            document.getElementById("cek1").checked = false;
                                            document.getElementById("cek2").checked = false;
                                            // $(".nav-item:first-child").addClass("active");
                                            table.destroy();
                                            $('.nav-pills a:first').tab('show');
                                            $('#tahu-gila').hide();
                                            $('#nav-tahu-gila').hide();
                                            $('#eceran').hide();
                                            if($('#bbdanb').is(':checked')){
                                                $('#bahandanbumbu').hide();
                                                document.getElementById('bbdanb').checked = false;
                                            }
                                            if($('#kdanb').is(':checked')){
                                                $('#kemasandanbumbu').hide();
                                                document.getElementById('kdanb').checked = false;
                                            }
                                            if($('#bbdank').is(':checked')){
                                                $('#bahandankemasan').hide();
                                                document.getElementById('bbdank').checked = false;
                                            }
                                            if($('#paketItem1').is(':checked')){
                                                $('#paket2').hide();
                                                document.getElementById('paketItem1').checked = false;
                                            }
                                            if($('#paketItem2').is(':checked')){
                                                $('#paket3').hide();
                                                document.getElementById('paketItem2').checked = false;
                                            }
                                            if($('#paketItem3').is(':checked')){
                                                $('#eceran').hide();
                                                document.getElementById('paketItem3').checked = false;
                                            }
                                            $('#tambah_ecer').hide();
                                            $('#tambah_tahu').hide();
                                            $("#tab3").attr("data-toggle", "");
                                            $("#tab4").attr("data-toggle", "");
                                            $('#exampleModal').modal('hide');
                                            Swal.fire(
                                                'Sukses',
                                                'Order berhasil disimpan',
                                                'success'
                                            )
                                    }
                                })
                            
                            }

                            $('#exampleModal').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var recipient = button.data('whatever')
                                var modal = $(this);
                                var dataString = 'id=' + recipient
                                $.ajax({
                                    type: "GET",
                                    url: "<?php echo base_url('Monitor/get_dtmt_pel')?>",
                                    dataType: "json",
                                    data: dataString,
                                    success: function(data) {
                                        $('#nm_mitra').val(data[0]['nm_mitra']);
                                        $('#almt_rmh').val(data[0]['almt_rmh']);
                                        $('#provinsi3').val(data[0]['almt_prov_rmh']);
                                        $('#provinsi3').trigger('change');
                                        var idkota = data[0]['almt_kt_rmh'];
                                        if($('#provinsi3').val() !== 0){
                                            var id = $('#provinsi3 option:selected').val();
                                            $.ajax({
                                                    url : "<?php echo base_url();?>Monitor/get_kota",
                                                    method : "POST",
                                                    data : {id: id},
                                                    async : false,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        var html = '<option value="0">Pilih</option>';
                                                        var i;
                                                        for(i=0; i<data.length; i++){
                                                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                        }
                                                        $('#almt_kt_rmh').html(html);
                                                        $('#almt_kt_rmh').val(idkota);
                                                        $('#almt_kt_rmh').trigger('change');
                                                    }
                                                });
                                        }
                                        var idkec = data[0]['almt_kec_rmh'];
                                        if($('#almt_kt_rmh').val() !== 0){
                                            var id = $('#almt_kt_rmh option:selected').val();
                                            $.ajax({
                                                    url : "<?php echo base_url();?>Monitor/get_kec",
                                                    method : "POST",
                                                    data : {id: id},
                                                    async : false,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        var html = '<option value="0">Pilih</option>';
                                                        var i;
                                                        for(i=0; i<data.length; i++){
                                                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                        }
                                                        $('#almt_kec_rmh').html(html);
                                                        $('#almt_kec_rmh').val(idkec);
                                                        $('#almt_kec_rmh').trigger('change');
                                                    }
                                                });
                                        }
                                        var idkel = data[0]['almt_kel_rmh'];
                                        if($('#almt_kec_rmh').val() !== 0){
                                            var id = $('#almt_kec_rmh option:selected').val();
                                            $.ajax({
                                                    url : "<?php echo base_url();?>Monitor/get_kel",
                                                    method : "POST",
                                                    data : {id: id},
                                                    async : false,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        var html = '<option value="0">Pilih</option>';
                                                        var i;
                                                        for(i=0; i<data.length; i++){
                                                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                        }
                                                        $('#almt_kel_rmh').html(html);
                                                        $('#almt_kel_rmh').val(idkel);
                                                        $('#almt_kel_rmh').trigger('change');
                                                    }
                                                });
                                        }
                                        $('#almt_outlet').val(data[0]['almt_outlet']);
                                        $('#provinsi2').val(data[0]['almt_prov_outlet']);
                                        $('#provinsi2').trigger('change');
                                        var ktout = data[0]['almt_kt_outlet'];
                                        if($('#provinsi2').val() !== 0){
                                            var id = $('#provinsi2 option:selected').val();
                                            $.ajax({
                                                    url : "<?php echo base_url();?>Monitor/get_kota",
                                                    method : "POST",
                                                    data : {id: id},
                                                    async : false,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        var html = '<option value="0">Pilih</option>';
                                                        var i;
                                                        for(i=0; i<data.length; i++){
                                                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                        }
                                                        $('#almt_kt_outlet').html(html);
                                                        $('#almt_kt_outlet').val(ktout);
                                                        $('#almt_kt_outlet').trigger('change');
                                                    }
                                                });
                                        }
                                        var kecout = data[0]['almt_kec_outlet'];
                                        if($('#almt_kt_outlet').val() !== 0){
                                            var id = $('#almt_kt_outlet option:selected').val();
                                            $.ajax({
                                                    url : "<?php echo base_url();?>Monitor/get_kec",
                                                    method : "POST",
                                                    data : {id: id},
                                                    async : false,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        var html = '<option value="0">Pilih</option>';
                                                        var i;
                                                        for(i=0; i<data.length; i++){
                                                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                        }
                                                        $('#almt_kec_outlet').html(html);
                                                        $('#almt_kec_outlet').val(kecout);
                                                        $('#almt_kec_outlet').trigger('change');
                                                    }
                                                });
                                        }
                                        var kelout = data[0]['almt_kel_outlet'];
                                        if($('#almt_kec_outlet').val() !== 0){
                                            var id = $('#almt_kec_outlet option:selected').val();
                                            $.ajax({
                                                    url : "<?php echo base_url();?>Monitor/get_kel",
                                                    method : "POST",
                                                    data : {id: id},
                                                    async : false,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        var html = '<option value="0">Pilih</option>';
                                                        var i;
                                                        for(i=0; i<data.length; i++){
                                                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                                        }
                                                        $('#almt_kel_outlet').html(html);
                                                        $('#almt_kel_outlet').val(kelout);
                                                        $('#almt_kel_outlet').trigger('change');
                                                    }
                                                });
                                        }
                                        $('#no_hp1').val(data[0]['no_hp1']);
                                        $('#no_hp2').val(data[0]['no_hp2']);
                                        $('#kd_mitra').val(data[0]['kd_mitra']);
                                        $('#almt_outlet').val(data[0]['almt_outlet']);
                                        // document.getElementById("daftarProduk").selectedIndex = data[0]['nm_produk'];
                                        $('#daftarProduk').val(data[0]['nm_produk']);
                                        $('#daftarProduk').prop('disabled', 'disabled');
                                            if($('#daftarProduk').val() !== 0){
                                                var id=$('#daftarProduk').val();
                                                $.ajax({
                                                    url : "<?php echo base_url();?>monitor/get_jns_barang",
                                                    method : "POST",
                                                    data : {id: id},
                                                    async : false,
                                                    dataType : 'json',
                                                    success: function(data){
                                                        var html = '<option value="0">Pilih</option>';
                                                        var i;
                                                        for(i=0; i<data.length; i++){
                                                            html += '<option value="'+data[i].kd_barang+'">'+data[i].nm_barang+'</option>';
                                                        }
                                                        $('#daftarBarang').html(html);
                                                        
                                                    }
                                                });
                                            }
                                        if((data[0]['nm_produk']) === 'PR000001'){
                                            $('#tahu-gila').show();
                                            $('#nav-tahu-gila').show();
                                            $('#tambah_tahu').show();
                                        }else{
                                            $('#eceran').show();
                                            $('#tambah_ecer').show();
                                        }
                                    },
                                    error: function(err) {
                                        console.log(err);
                                    }
                                });
                            });

                                        function tutup() {
                                            table.destroy();
                                            val = $('#kd_mitra').val();
                                            var data = 'val='+val;
                                            $.ajax({
                                                type: 'post',
                                                url: '<?php echo base_url('monitor/hapus_order')?>',
                                                data: data,
                                                success: function(){
                                                    
                                                    console.log('YEEE');
                                                }
                                            });
                                            
                                            
                                            document.getElementById('almt_kirim').value = "";
                                            document.getElementById('almt_kirim').disabled = false;
                                            document.getElementById('jml_transfer').value = "";
                                            document.getElementById('rekening').value = "";
                                            document.getElementById('ats_nm_rekening').value = "";
                                            document.getElementById('ekspedisi').value = "";
                                            document.getElementById('b_barang').value = "";
                                            document.getElementById('biaya_kirim').value = "";
                                            document.getElementById('keterangan').value = "";
                                            document.getElementById('daftarProduk').value = "";
                                            document.getElementById('daftarBarang').value = "";
                                            document.getElementById('jml_barang').value = "";
                                            document.getElementById('provinsi3').value = "";
                                            document.getElementById('provinsi3').disabled = false;
                                            document.getElementById('almt_outlet').value = "";
                                            document.getElementById('provinsi2').value = "";
                                            document.getElementById('provinsi2').disabled = false;
                                            document.getElementById('provinsi').value = "";
                                            document.getElementById('provinsi').disabled = false;
                                            document.getElementById('almt_kt_kirim').value = "";
                                            document.getElementById('almt_kt_kirim').disabled = false;
                                            document.getElementById("cek1").checked = false;
                                            document.getElementById("cek2").checked = false;
                                            // $(".nav-item:first-child").addClass("active");
                                            // $('.nav-item a[href="#tab1"]').tab('show');
                                            $('.nav-pills a:first').tab('show');
                                            $('#tahu-gila').hide();
                                            $('#nav-tahu-gila').hide();
                                            $('#tambah_ecer').hide();
                                            $('#tambah_tahu').hide();
                                            $('#eceran').hide();
                                            if($('#bbdanb').is(':checked')){
                                                $('#bahandanbumbu').hide();
                                                document.getElementById('bbdanb').checked = false;
                                            }
                                            if($('#kdanb').is(':checked')){
                                                $('#kemasandanbumbu').hide();
                                                document.getElementById('kdanb').checked = false;
                                            }
                                            if($('#bbdank').is(':checked')){
                                                $('#bahandankemasan').hide();
                                                document.getElementById('bbdank').checked = false;
                                            }
                                            if($('#paketItem1').is(':checked')){
                                                $('#paket2').hide();
                                                document.getElementById('paketItem1').checked = false;
                                            }
                                            if($('#paketItem2').is(':checked')){
                                                $('#paket3').hide();
                                                document.getElementById('paketItem2').checked = false;
                                            }
                                            if($('#paketItem3').is(':checked')){
                                                $('#eceran').hide();
                                                document.getElementById('paketItem3').checked = false;
                                            }
                                            $("#tab3").attr("data-toggle", "");
                                            $("#tab4").attr("data-toggle", "");
                                            $('#exampleModal').modal('hide');
                                        }


                                        $('#editModal').on('show.bs.modal', function(event) {
                                            var button = $(event.relatedTarget)
                                            var recipient = button.data('whatever')
                                            var modal = $(this);
                                            var dataString = 'id=' + recipient
                                            $.ajax({
                                                type: "GET",
                                                url: "<?php echo base_url('Order/getdtorder')?>",
                                                dataType: "json",
                                                data: dataString,
                                                success: function(data) {
                                                    $('#nm_mitra').val(data[0].nm_mitra)
                                                },
                                                error: function(err) {
                                                    console.log(err);
                                                }
                                            });
                                        });
                        </script>
