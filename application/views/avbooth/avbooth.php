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
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/booth.svg')?>" style="margin-right: 17px;margin-bottom: 4px;">
            Data Admin Vendor Booth
        </div>
    </div>
    <div class="check-awb-content" style="margin-top:5%;">
        <div class="container">
            <div class="check-awb-wrapper">   
                <div class="awb-input-field">   
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-borderless" id="dataVMitra" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Mitra</th>
                                            <th>Alamat Kirim</th>
                                            <th>Kota</th>
                                            <th>Brand</th>
                                            <th>Paket</th>
                                            <th>Keterangan</th>
                                            <th>Cek Info Detail</th>
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
                        $(document).ready(function(){
                            var table=$('#dataVMitra').DataTable({
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
                            'serverMethod': 'post',
                            'ajax': {
                                'url':'<?php echo base_url().'AVBooth/dt_tbl'?>'
                            },
                            'columns': [
                                { data: 'nm_mitra' },
                                { data: 'almt_kirim' },
                                { data: 'kota' },
                                { data: 'nm_produk' },
                                { data: 'paket' },
                                { data: 'tambahan' },
                                { data: 'action'}
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
                            $('#tgl2').on('dp.change', function(){
                                table.draw(true);
                            });
                        });
                    </script>
                </div>
                <div class="modal fade" id="rinciVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rincian Perlengkapan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="tutup()">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        <li class="nav-item "><a class="nav-link" href="#tab_1" data-toggle="tab">Data Mitra</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Rincian</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Pengiriman</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="form-group">
                                            <label for="nm_mitra">Nama Mitra</label>
                                            <input class="form-control" type="text" name="nm_mitra" id="nm_mitra" style="width: 80%;" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="almt_kirim">Alamat Kirim</label>
                                            <input class="form-control" type="text" name="almt_kirim" id="almt_kirim" style="width: 80%;" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nm_kota">Kota</label>
                                            <input class="form-control" type="text" name="almt_kt_kirim" id="almt_kt_kirim" style="width: 80%;" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="pro_mitra">Brand</label>
                                            <input class="form-control" type="text" name="pro_mitra" id="pro_mitra" style="width: 80%;" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="paket_mitra">Paket</label>
                                            <input class="form-control" type="text" name="paket_mitra" id="paket_mitra" style="width: 80%;" readonly>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div id="rinciantahugila" style="display: none;"><?php $this->load->view('avbooth/part/tahu_gila')?></div>
                                        <div id="rincianchickenpopop" style="display: none;"><?php $this->load->view('avbooth/part/tahu_gila')?></div>
                                        <div id="rincianpopchick" style="display: none;"><?php $this->load->view('avbooth/part/popchick')?></div>
                                        <div id="rincianchiclin" style="display: none;"><?php $this->load->view('avbooth/part/chiclin')?></div>
                                        <div id="rincianboboochicken" style="display: none;"><?php $this->load->view('avbooth/part/boboo_chicken')?></div>
                                        <div id="rinciancutchicken" style="display: none;"><?php $this->load->view('avbooth/part/cut_chicken')?></div>
                                        <div id="rinciancandycrepes" style="display: none;"><?php $this->load->view('avbooth/part/candy_crepes')?></div>
                                        <div id="rincianpisangnugget" style="display: none;"><?php $this->load->view('avbooth/part/pisang_nugget_kece')?></div>
                                        <div id="rincianolivgeprek" style="display: none;"><?php $this->load->view('avbooth/part/oliv_geprek')?></div>
                                        <div id="rinciantahuhotking" style="display: none;"><?php $this->load->view('avbooth/part/tahu_hot_king')?></div>
                                        <div id="rincianohana" style="display: none;"><?php $this->load->view('avbooth/part/ohana')?></div>
                                        <div id="rincianchipfinger" style="display: none;"><?php $this->load->view('avbooth/part/chip_finger')?></div>
                                        <div id="rincianxiaolin" style="display: none;"><?php $this->load->view('avbooth/part/xiaolin')?></div>
                                        <div id="rincianmartabakmini" style="display: none;"><?php $this->load->view('avbooth/part/martabak_mini')?></div>
                                        <div id="rincianbanananugget" style="display: none;"><?php $this->load->view('avbooth/part/banana_nugget')?></div>
                                        <div id="rincianeattoast" style="display: none;"><?php $this->load->view('avbooth/part/eat_toast')?></div>
                                        <div id="rincianlianling" style="display: none;"><?php $this->load->view('avbooth/part/lianling')?></div>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <div class="form-group">
                                            <label for="jns_eks">Ekspedisi</label>
                                            <input class="form-control" type="text" name="jns_eks" id="jns_eks" style="width: 80%;" readonly>
                                        </div>
                                        <input type="hidden" id="kd_mitra" name="kd_mitra">
                                        <input type="hidden" id="kd_produk" name="kd_produk">
                                        <button type="submit" class="btn btn-success" id="simpanRincian" style="color: white;">Kirim</button>
                                        <button type="button" id="close" class="btn btn-danger" onclick="tutup()">Batal</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function tutup(){
                        $('#rinciantahugila').hide();
                        $('#rincianchickenpopop').hide();
                        $('#rincianpopchick').hide();
                        $('#rincianchiclin').hide();
                        $('#rincianboboochicken').hide();
                        $('#rinciancutchicken').hide();
                        $('#rinciancandycrepes').hide();
                        $('#rincianpisangnugget').hide();
                        $('#rincianolivgeprek').hide();
                        $('#rinciantahuhotking').hide();
                        $('#rincianohana').hide();
                        $('#rincianchipfinger').hide();
                        $('#rincianxiaolin').hide();
                        $('#rincianmartabakmini').hide();
                        $('#rincianbanananugget').hide();
                        $('#rincianeattoast').hide();
                        $('#rincianlianling').hide();
                        $('#rinciVendor').modal('hide');
                        console.log('asdf')
                    }
                    $('#simpanRincian').click(function(){
                        var kd_mitra = $('#kd_mitra').val();
                        var kd_produk = $('#kd_produk').val();
                        dataString += '&kd_mitra='+kd_mitra+'&kd_produk='+kd_produk;
                        $.post("<?php echo base_url();?>Avbooth/simpanrincian", dataString,function(data){
                            $('#rinciantahugila').hide();
                            $('#rincianchickenpopop').hide();
                            $('#rincianpopchick').hide();
                            $('#rincianchiclin').hide();
                            $('#rincianboboochicken').hide();
                            $('#rinciancutchicken').hide();
                            $('#rinciancandycrepes').hide();
                            $('#rincianpisangnugget').hide();
                            $('#rincianolivgeprek').hide();
                            $('#rinciantahuhotking').hide();
                            $('#rincianohana').hide();
                            $('#rincianchipfinger').hide();
                            $('#rincianxiaolin').hide();
                            $('#rincianmartabakmini').hide();
                            $('#rincianbanananugget').hide();
                            $('#rincianeattoast').hide();
                            $('#rincianlianling').hide();
                            $('#rinciVendor').modal('hide');
                        })
                    })

                    $('#rinciVendor').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this)
                            var dataString = 'id='+recipient
                            $.get("<?php echo base_url();?>AVBooth/get_data_mitra", dataString, function(data){
                                $('#nm_mitra').val(data[0].nm_mitra);
                                $('#almt_kirim').val(data[0].almt_kirim);
                                $('#almt_kt_kirim').val(data[0].nama_kota);
                                $('#pro_mitra').val(data[0].nm_produk);
                                $('#paket_mitra').val(data[0].nm_paket);
                                $('#jns_eks').val(data[0].nama_ekspedisi);
                                $('#kd_mitra').val(data[0].kd_mitra);
                                $('#kd_produk').val(data[0].kd_produk);
                                if(data[0].nm_produk == 'Tahu Gila'){
                                    $('#rinciantahugila').show();
                                    if(data[0].nm_paket == 'Paket Tenda'){
                                        $('#tahu_tenpre').show();
                                        $('#tahu_tenda').show();
                                        $('#tahu_komgas').show();
                                        $('#tahu_wajan').show();
                                        $('#tahu_irus').show();
                                        $('#tahu_sotil').show();
                                        $('#tahu_saringan').show();
                                        $('#tahu_lampu').show();
                                        $('#tahu_rafia').show();
                                        $('#tahu_5').show();
                                    }else if(data[0].nm_paket == 'Paket Premium'){
                                        $('#tahu_tenpre').show();
                                        $('#tahu_deepgas').show();
                                        $('#tahu_deeplis').show();
                                        $('#tahu_lampu').show();
                                        $('#tahu_rafia').show();
                                        $('#tahu_4').show();
                                    }else if(data[0].nm_paket == 'Paket Indoor'){
                                        $('#tahu_indoor').show();
                                        $('#tahu_komgas').show();
                                        $('#tahu_wajan').show();
                                        $('#tahu_irus').show();
                                        $('#tahu_sotil').show();
                                        $('#tahu_saringan').show();
                                        $('#tahu_lampu').show();
                                        $('#tahu_rafia').show();
                                        $('#tahu_5').show();
                                    }else if(data[0].nm_paket == 'Paket Tanpa Booth'){
                                        $('#tahu_komgas').show();
                                        $('#tahu_wajan').show();
                                        $('#tahu_irus').show();
                                        $('#tahu_sotil').show();
                                        $('#tahu_saringan').show();
                                        $('#tahu_lakban').show();
                                        $('#tahu_1').show();
                                    }
                                }else if(data[0].nm_produk == 'Chicken Popop'){
                                    $('#rincianchickenpopop').show();
                                    if(data[0].nm_paket == 'Paket A'){
                                        $('#chicken_bo_put').show();
                                        $('#chicken_deep_gas').show();
                                        $('#chicken_selang').show();
                                        $('#chicken_rafia').show();
                                        $('#chicken_4').show();
                                        $('#chicken_botol_kaca').show();
                                        $('#chicken_celmer').show();
                                        $('#chicken_lampu').show();
                                    }else if(data[0].nm_paket == 'Paket B'){
                                        $('#chicken_bo_put').show();
                                        $('#chicken_deep_lis').show();
                                        $('#chicken_rafia').show();
                                        $('#chicken_4').show();
                                        $('#chicken_botol_kaca').show();
                                        $('#chicken_celmer').show();
                                        $('#chicken_lampu').show();
                                    }else if(data[0].nm_paket == 'Paket C'){
                                        $('#chicken_bo_put').show();
                                        $('#chicken_kom_gas').show();
                                        $('#chicken_selang').show();
                                        $('#chicken_rafia').show();
                                        $('#chicken_5').show();
                                        $('#chicken_wajan').show();
                                        $('#chicken_irus').show();
                                        $('#chicken_sotil').show();
                                        $('#chicken_saringan').show();
                                        $('#chicken_botol_kaca').show();
                                        $('#chicken_celmer').show();
                                        $('#chicken_lampu').show();
                                    }else if(data[0].nm_paket == 'Paket D'){
                                        $('#chicken_bo_pall').show();
                                        $('#chicken_kom_gas').show();
                                        $('#chicken_selang').show();
                                        $('#chicken_rafia').show();
                                        $('#chicken_5').show();
                                        $('#chicken_wajan').show();
                                        $('#chicken_irus').show();
                                        $('#chicken_sotil').show();
                                        $('#chicken_saringan').show();
                                        $('#chicken_botol_kaca').show();
                                        $('#chicken_celmer').show();
                                        $('#chicken_lampu').show();
                                    }else if(data[0].nm_paket == 'Paket E'){
                                        $('#kom_gas').show();
                                        $('#selang').show();
                                        $('#chicken_lakban').show();
                                        $('#chicken_1').show();
                                        $('#chicken_wajan').show();
                                        $('#chicken_irus').show();
                                        $('#chicken_sotil').show();
                                        $('#chicken_saringan').show();
                                        $('#chicken_wadah_bumbu').show();
                                        $('#chicken_polos').show();
                                    }
                                }else if(data[0].nm_produk == 'Popchick Chicken'){
                                    $('#rincianpopchick').show();
                                    if(data[0].nm_paket == 'Tenda Premium'){
                                        $('#pop_boput').show();
                                        $('#pop_tenda').show();
                                        $('#pop_rafia').show();
                                        $('#pop_4').show();
                                        $('#pop_deepgas').show();
                                        $('#pop_btol_bkaca').show();
                                        $('#pop_lampu').show();
                                    }else if(data[0].nm_paket == 'Booth 1'){
                                        $('#pop_boput').show();
                                        $('#pop_rafia').show();
                                        $('#pop_4').show();
                                        $('#pop_deepgas').show();
                                        $('#pop_btol_bkaca').show();
                                        $('#pop_lampu').show();
                                    }else if(data[0].nm_paket == 'Booth 2'){
                                        $('#pop_boput').show();
                                        $('#pop_rafia').show();
                                        $('#pop_5').show();
                                        $('#pop_komgas').show();
                                        $('#pop_wajan').show();
                                        $('#pop_irus').show();
                                        $('#pop_sotil').show();
                                        $('#pop_saringan').show();
                                        $('#pop_btol_b').show();
                                        $('#pop_lampu').show();
                                    }else if(data[0].nm_paket == 'Tanpa Booth'){
                                        $('#pop_lakban').show();
                                        $('#pop_1').show();
                                        $('#pop_komgas').show();
                                        $('#pop_wajan').show();
                                        $('#pop_irus').show();
                                        $('#pop_sotil').show();
                                        $('#pop_saringan').show();
                                        $('#pop_btol_b').show();
                                    }
                                }else if(data[0].nm_produk == 'Chiclin'){
                                    $('#rincianchiclin').show();
                                    if(data[0].nm_paket == 'Paket Gold'){
                                        $('#chi_tenda').show();
                                    }else if(data[0].nm_paket == 'Paket Silver'){
                                        $('#chi_lampu').show();
                                        $('#chi_banat').show();
                                    }
                                }else if(data[0].nm_produk == 'Boboo Chicken'){
                                    $('#rincianboboochicken').show();
                                    if(data[0].nm_paket == 'Paket Eksklusif'){
                                        $('#boboo_tenda').show();
                                    }
                                }else if(data[0].nm_produk == 'Cut Chicken'){
                                    $('#rinciancutchicken').show();
                                    if(data[0].nm_paket == 'Portable'){
                                        $('#cut_portable').show();
                                        $('#cut_neon').show();
                                        $('#cut_3').show();
                                    }else if(data[0].nm_paket == 'Booth'){
                                        $('#cut_booth').show();
                                        $('#cut_4').show();
                                    }
                                }else if(data[0].nm_produk == 'Candy Crepes'){
                                    $('#rinciancandycrepes').show();
                                    if(data[0].nm_paket == 'Outdoor'){
                                        $('#candy_bo_put').show();
                                        $('#candy_tenda').show();
                                        $('#candy_rafia').show();
                                        $('#candy_5').show();
                                        $('#candy_lampu').show();
                                    }else if(data[0].nm_paket == 'Indoor'){
                                        $('#candy_bo_put').show();
                                        $('#candy_rafia').show();
                                        $('#candy_5').show();
                                        $('#candy_lampu').show();
                                    }else if(data[0].nm_paket == 'Pallet'){
                                        $('#candy_bo_pall').show();
                                        $('#candy_rafia').show();
                                        $('#candy_5').show();
                                        $('#candy_lampu').show();
                                    }else if(data[0].nm_paket == 'Tanpa Booth'){
                                        $('#candy_lakban').show();
                                        $('#candy_1').show();
                                    }
                                }else if(data[0].nm_produk == 'Pisang Nugget Kece'){
                                    $('#rincianpisangnugget').show();
                                    if(data[0].nm_paket == 'Premium'){
                                        $('#psangke_bo_put').show();
                                        $('#psangke_rafia').show();
                                        $('#psangke_5').show();
                                        $('#psangke_lampu').show();
                                    }else if(data[0].nm_paket == 'Indoor'){
                                        $('#psangke_bo_pall').show();
                                        $('#psangke_rafia').show();
                                        $('#psangke_5').show();
                                        $('#psangke_lampu').show();
                                    }else if(data[0].nm_paket == 'Tanpa Booth'){
                                        $('#psangke_lakban').show();
                                        $('#psangke_1').show();
                                    }
                                }else if(data[0].nm_produk == 'Oliv Geprek Ekspress'){
                                    $('#rincianolivgeprek').show();
                                    if(data[0].nm_paket == 'Paket 1 (Booth Jumbo)'){
                                        $('#oliv_bo_put').show();
                                        $('#oliv_rafia').show();
                                        $('#oliv_5').show();
                                        $('#oliv_lampu').show();
                                    }else if(data[0].nm_paket == 'Paket 2 (FTB)'){
                                        $('#oliv_lakban').show();
                                        $('#oliv_1').show();
                                    }
                                }else if(data[0].nm_produk == 'Tahu Hot King'){
                                    $('#rinciantahuhotking').show();
                                    if(data[0].nm_paket == 'Paket A (Putih)'){
                                        $('#hot_bo_put').show();
                                        $('#hot_rafia').show();
                                        $('#hot_5').show();
                                        $('#hot_lampu').show();
                                    }else if(data[0].nm_paket == 'Paket B (Palet)'){
                                        $('#hot_bo_pal').show();
                                        $('#hot_rafia').show();
                                        $('#hot_5').show();
                                        $('#hot_lampu').show();
                                    }else if(data[0].nm_paket == 'Paket C (FTB)'){
                                        $('#hot_lakban').show();
                                        $('#hot_1').show();
                                    }
                                }else if(data[0].nm_produk == 'Ohana Fried Chicken'){
                                    $('#rincianohana').show();
                                    if(data[0].nm_paket == 'Paket Combo'){
                                        $('#oh_tenda').show();
                                        $('#oh_5').show();
                                    }else if(data[0].nm_paket == 'Paket Single'){
                                        $('#oh_5').show();
                                    }
                                }else if(data[0].nm_produk == 'Chip Finger'){
                                    $('#rincianchipfinger').show();
                                }else if(data[0].nm_produk == 'Xiaolin'){
                                    $('#rincianxiaolin').show();
                                    if(data[0].nm_paket == 'Paket Gold'){
                                        $('#xia_tenda').show();
                                    }
                                }else if(data[0].nm_produk == 'Martabak Mini Rainbow'){
                                    $('#rincianmartabakmini').show();
                                    if(data[0].nm_paket == 'Outdoor'){
                                        $('#martabak_bo_put').show();
                                        $('#martabak_tenda').show();
                                        $('#martabak_kanopi').show();
                                        $('#martabak_lampu').show();
                                    }else if(data[0].nm_produk == 'Indoor Putih'){
                                        $('#martabak_bo_put').show();
                                        $('#martabak_lampu').show();
                                    }else if(data[0].nm_produk == 'Pallet'){
                                        $('#martabak_bo_pall').show();
                                        $('#martabak_lampu').show();
                                    }else if(data[0].nm_produk == 'Tanpa Booth'){

                                    }
                                }else if(data[0].nm_produk == 'Banana Nugget Juara'){
                                    $('#rincianbanananugget').show();
                                    if(data[0].nm_paket == 'Juara 1 (Putih)'){
                                        $('#banug_put').show();
                                        $('#banu_lampu').show();
                                    }else if(data[0].nm_produk == 'Juara 2 (Palet)'){
                                        $('#banug_pall').show();
                                        $('#banu_lampu').show();
                                    }else if(data[0].nm_produk == 'Juara 3 (FTP)'){

                                    }
                                }else if(data[0].nm_produk == 'Eat Toast'){
                                    $('#rincianeattoast').show();
                                }else if(data[0].nm_produk == 'Lianglin'){
                                    $('#rincianlianling').show();
                                }
                            },'json')
                        })
                </script>