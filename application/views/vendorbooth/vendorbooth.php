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
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/booth.svg')?>" style="margin-right: 17px;margin-bottom: 4px;">
            Data Booth Mitra
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
                                    <button style="height: 36px; margin-top: 10px;border-radius: 6px" class="btn btn-danger" id="tampil_data">Tampilkan Data</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="table-responsive" style="display: none;" id="konbooth">
                                <table class="table table-borderless" id="dataBB" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Mitra</th>
                                            <th>Alamat Kirim</th>
                                            <th>Kota</th>
                                            <th>Cek Data Rincian</th>
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
                            $('#konbooth').show();
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
                                    'url':'<?php echo base_url().'Vendorbooth/dt_booth'?>',
                                    'data': function(data){
                                        var nm_produk = $('#in_nm_produk option:selected').val();

                                        data.nm_produk = nm_produk;
                                    }
                                },
                                'columns': [
                                    { data: 'nm_mitra' },
                                    { data: 'almt_kirim' },
                                    { data: 'almt_kt_kirim' },
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
            <div class="modal fade" id="cekRincian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cekRincianLabel">Rincian Perlengkapan</h5>
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
                                        <div id="rinciantahugila" style="display: none;"><?php $this->load->view('vendorbooth/part/tahu_gila')?></div>
                                        <div id="rincianchickenpopop" style="display: none;"><?php $this->load->view('vendorbooth/part/tahu_gila')?></div>
                                        <div id="rincianpopchick" style="display: none;"><?php $this->load->view('vendorbooth/part/popchick')?></div>
                                        <div id="rincianchiclin" style="display: none;"><?php $this->load->view('vendorbooth/part/chiclin')?></div>
                                        <div id="rincianboboochicken" style="display: none;"><?php $this->load->view('vendorbooth/part/boboo_chicken')?></div>
                                        <div id="rinciancutchicken" style="display: none;"><?php $this->load->view('vendorbooth/part/cut_chicken')?></div>
                                        <div id="rinciancandycrepes" style="display: none;"><?php $this->load->view('vendorbooth/part/candy_crepes')?></div>
                                        <div id="rincianpisangnugget" style="display: none;"><?php $this->load->view('vendorbooth/part/pisang_nugget_kece')?></div>
                                        <div id="rincianolivgeprek" style="display: none;"><?php $this->load->view('vendorbooth/part/oliv_geprek')?></div>
                                        <div id="rinciantahuhotking" style="display: none;"><?php $this->load->view('vendorbooth/part/tahu_hot_king')?></div>
                                        <div id="rincianohana" style="display: none;"><?php $this->load->view('vendorbooth/part/ohana')?></div>
                                        <div id="rincianchipfinger" style="display: none;"><?php $this->load->view('vendorbooth/part/chip_finger')?></div>
                                        <div id="rincianxiaolin" style="display: none;"><?php $this->load->view('vendorbooth/part/xiaolin')?></div>
                                        <div id="rincianmartabakmini" style="display: none;"><?php $this->load->view('vendorbooth/part/martabak_mini')?></div>
                                        <div id="rincianbanananugget" style="display: none;"><?php $this->load->view('vendorbooth/part/banana_nugget')?></div>
                                        <div id="rincianeattoast" style="display: none;"><?php $this->load->view('vendorbooth/part/eat_toast')?></div>
                                        <div id="rincianlianling" style="display: none;"><?php $this->load->view('vendorbooth/part/lianling')?></div>
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

                    $('#cekRincian').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this)
                            var dataString = 'id='+recipient
                            $.get("<?php echo base_url();?>Vendorbooth/get_data_mitra", dataString, function(data){
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
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#cek_booth_put').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#cek_booth_pal').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#cek_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#cek_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#cek_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].komgas == 1){
                                                $('#cek_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deepgas == 1){
                                                $('#cek_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deeplis == 1){
                                                $('#cek_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sereg == 1){
                                                $('#cek_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#cek_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#cek_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#cek_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#cek_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tepung == 1){
                                                $('#cek_to_te').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_kocok == 1){
                                                $('#cek_to_pe').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_bumbu == 1){
                                                $('#cek_to_bu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#cek_bas_st').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].talenan == 1){
                                                $('#cek_telen').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cek_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#cek_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#cek_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#cek_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kain_serbet == 1){
                                                $('#cek_ka_ser').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_tahu == 1){
                                                $('#cek_tu_ta').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sergam_kun == 1){
                                                $('#cek_ser_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cek_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].surkon == 1){
                                                $('#cek_su_ko').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cek_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_kun == 1){
                                                $('#cek_ce_ku').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lampu_set == 1){
                                                $('#cek_la_set').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#cek_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#cek_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cek_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Paket Premium'){
                                        $('#tahu_tenpre').show();
                                        $('#tahu_deepgas').show();
                                        $('#tahu_deeplis').show();
                                        $('#tahu_lampu').show();
                                        $('#tahu_rafia').show();
                                        $('#tahu_4').show();
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#cek_booth_put').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#cek_booth_pal').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#cek_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#cek_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#cek_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].komgas == 1){
                                                $('#cek_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deepgas == 1){
                                                $('#cek_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deeplis == 1){
                                                $('#cek_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sereg == 1){
                                                $('#cek_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#cek_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#cek_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#cek_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#cek_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tepung == 1){
                                                $('#cek_to_te').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_kocok == 1){
                                                $('#cek_to_pe').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_bumbu == 1){
                                                $('#cek_to_bu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#cek_bas_st').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].talenan == 1){
                                                $('#cek_telen').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cek_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#cek_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#cek_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#cek_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kain_serbet == 1){
                                                $('#cek_ka_ser').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_tahu == 1){
                                                $('#cek_tu_ta').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sergam_kun == 1){
                                                $('#cek_ser_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cek_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].surkon == 1){
                                                $('#cek_su_ko').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cek_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_kun == 1){
                                                $('#cek_ce_ku').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lampu_set == 1){
                                                $('#cek_la_set').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#cek_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#cek_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cek_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#cek_booth_put').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#cek_booth_pal').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#cek_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#cek_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#cek_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].komgas == 1){
                                                $('#cek_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deepgas == 1){
                                                $('#cek_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deeplis == 1){
                                                $('#cek_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sereg == 1){
                                                $('#cek_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#cek_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#cek_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#cek_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#cek_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tepung == 1){
                                                $('#cek_to_te').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_kocok == 1){
                                                $('#cek_to_pe').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_bumbu == 1){
                                                $('#cek_to_bu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#cek_bas_st').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].talenan == 1){
                                                $('#cek_telen').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cek_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#cek_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#cek_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#cek_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kain_serbet == 1){
                                                $('#cek_ka_ser').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_tahu == 1){
                                                $('#cek_tu_ta').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sergam_kun == 1){
                                                $('#cek_ser_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cek_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].surkon == 1){
                                                $('#cek_su_ko').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cek_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_kun == 1){
                                                $('#cek_ce_ku').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lampu_set == 1){
                                                $('#cek_la_set').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#cek_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#cek_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cek_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Paket Tanpa Booth'){
                                        $('#tahu_komgas').show();
                                        $('#tahu_wajan').show();
                                        $('#tahu_irus').show();
                                        $('#tahu_sotil').show();
                                        $('#tahu_saringan').show();
                                        $('#tahu_lakban').show();
                                        $('#tahu_1').show();
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#cek_booth_put').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#cek_booth_pal').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#cek_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#cek_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#cek_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].komgas == 1){
                                                $('#cek_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deepgas == 1){
                                                $('#cek_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deeplis == 1){
                                                $('#cek_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sereg == 1){
                                                $('#cek_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#cek_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#cek_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#cek_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#cek_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tepung == 1){
                                                $('#cek_to_te').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_kocok == 1){
                                                $('#cek_to_pe').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_bumbu == 1){
                                                $('#cek_to_bu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#cek_bas_st').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].talenan == 1){
                                                $('#cek_telen').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cek_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#cek_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#cek_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#cek_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kain_serbet == 1){
                                                $('#cek_ka_ser').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_tahu == 1){
                                                $('#cek_tu_ta').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sergam_kun == 1){
                                                $('#cek_ser_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cek_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].surkon == 1){
                                                $('#cek_su_ko').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cek_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_kun == 1){
                                                $('#cek_ce_ku').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lampu_set == 1){
                                                $('#cek_la_set').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#cek_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#cek_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cek_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#chipo_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#chipo_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mmt_ban_atap == 1){
                                                $('#chipo_mmt_atap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#chipo_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#chipo_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#chipo_deep_fry_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#chipo_deep_fry_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#chipo_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#chipo_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#chipo_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#chipo_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#chipo_sel_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#chipo_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#chipo_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#chipo_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#chipo_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tep == 1){
                                                $('#chipo_toptep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#chipo_baskom').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#chipo_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_kaca == 1){
                                                $('#chipo_btol').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_bum == 1){
                                                $('#chipo_wdah').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#chipo_sndok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gelas_takar == 1){
                                                $('#chipo_glas_t').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#chipo_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#chipo_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#chipo_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#chipo_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#chipo_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_chic == 1){
                                                $('#chipo_tusuc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_mer == 1){
                                                $('#chipo_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#chipo_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#chipo_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#chipo_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_mer == 1){
                                                $('#chipo_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#chipo_cel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#chipo_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Paket B'){
                                        $('#chicken_bo_put').show();
                                        $('#chicken_deep_lis').show();
                                        $('#chicken_rafia').show();
                                        $('#chicken_4').show();
                                        $('#chicken_botol_kaca').show();
                                        $('#chicken_celmer').show();
                                        $('#chicken_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#chipo_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#chipo_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mmt_ban_atap == 1){
                                                $('#chipo_mmt_atap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#chipo_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#chipo_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#chipo_deep_fry_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#chipo_deep_fry_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#chipo_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#chipo_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#chipo_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#chipo_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#chipo_sel_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#chipo_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#chipo_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#chipo_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#chipo_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tep == 1){
                                                $('#chipo_toptep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#chipo_baskom').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#chipo_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_kaca == 1){
                                                $('#chipo_btol').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_bum == 1){
                                                $('#chipo_wdah').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#chipo_sndok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gelas_takar == 1){
                                                $('#chipo_glas_t').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#chipo_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#chipo_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#chipo_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#chipo_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#chipo_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_chic == 1){
                                                $('#chipo_tusuc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_mer == 1){
                                                $('#chipo_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#chipo_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#chipo_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#chipo_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_mer == 1){
                                                $('#chipo_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#chipo_cel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#chipo_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#chipo_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#chipo_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mmt_ban_atap == 1){
                                                $('#chipo_mmt_atap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#chipo_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#chipo_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#chipo_deep_fry_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#chipo_deep_fry_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#chipo_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#chipo_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#chipo_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#chipo_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#chipo_sel_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#chipo_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#chipo_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#chipo_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#chipo_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tep == 1){
                                                $('#chipo_toptep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#chipo_baskom').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#chipo_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_kaca == 1){
                                                $('#chipo_btol').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_bum == 1){
                                                $('#chipo_wdah').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#chipo_sndok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gelas_takar == 1){
                                                $('#chipo_glas_t').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#chipo_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#chipo_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#chipo_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#chipo_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#chipo_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_chic == 1){
                                                $('#chipo_tusuc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_mer == 1){
                                                $('#chipo_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#chipo_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#chipo_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#chipo_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_mer == 1){
                                                $('#chipo_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#chipo_cel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#chipo_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#chipo_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#chipo_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mmt_ban_atap == 1){
                                                $('#chipo_mmt_atap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#chipo_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#chipo_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#chipo_deep_fry_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#chipo_deep_fry_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#chipo_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#chipo_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#chipo_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#chipo_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#chipo_sel_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#chipo_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#chipo_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#chipo_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#chipo_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tep == 1){
                                                $('#chipo_toptep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#chipo_baskom').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#chipo_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_kaca == 1){
                                                $('#chipo_btol').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_bum == 1){
                                                $('#chipo_wdah').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#chipo_sndok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gelas_takar == 1){
                                                $('#chipo_glas_t').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#chipo_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#chipo_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#chipo_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#chipo_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#chipo_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_chic == 1){
                                                $('#chipo_tusuc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_mer == 1){
                                                $('#chipo_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#chipo_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#chipo_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#chipo_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_mer == 1){
                                                $('#chipo_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#chipo_cel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#chipo_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#chipo_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#chipo_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mmt_ban_atap == 1){
                                                $('#chipo_mmt_atap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#chipo_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#chipo_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#chipo_deep_fry_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#chipo_deep_fry_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#chipo_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#chipo_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#chipo_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#chipo_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#chipo_sel_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#chipo_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#chipo_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#chipo_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#chipo_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tep == 1){
                                                $('#chipo_toptep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#chipo_baskom').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#chipo_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_kaca == 1){
                                                $('#chipo_btol').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_bum == 1){
                                                $('#chipo_wdah').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#chipo_sndok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gelas_takar == 1){
                                                $('#chipo_glas_t').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pencapit == 1){
                                                $('#chipo_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#chipo_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#chipo_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#chipo_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#chipo_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_chic == 1){
                                                $('#chipo_tusuc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_mer == 1){
                                                $('#chipo_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#chipo_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#chipo_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#chipo_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_mer == 1){
                                                $('#chipo_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#chipo_cel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#chipo_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#popchick_boput').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#popchick_rollben').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#popchick_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#popchick_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#popchick_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#popchick_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#popchick_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#popchick_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#popchick_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#popchick_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#popchick_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#popchick_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#popchick_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#popchick_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#popchick_botols').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_kac == 1){
                                                $('#popchick_btol_kc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#popchick_btol').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#popchick_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#popchick_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#popchick_capit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_tep_ker == 1){
                                                $('#popchick_wtk').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_tep_bas == 1){
                                                $('#popchick_wtb').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].baskom == 1){
                                                $('#popchick_baskom').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#popchick_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#popchick_gtkr').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#popchick_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#popchick_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#popchick_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#popchick_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#popchick_sndok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#popchick_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_sat == 1){
                                                $('#popchick_tusus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#popchick_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#popchick_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#popchick_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#popchick_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#chiclin_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker_bo_set == 1){
                                                $('#chiclin_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#chiclin_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#chiclin_la_set').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#chiclin_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].banner_atap == 1){
                                                $('#chiclin_banat').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#chiclin_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#chiclin_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#chiclin_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#chiclin_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#chiclin_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sek_pot_ay == 1){
                                                $('#chiclin_se_pot').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#chiclin_nmst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tiris_ayam == 1){
                                                $('#chiclin_tsst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gas_troch == 1){
                                                $('#chiclin_gast').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#chiclin_icboxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].baskom_tep == 1){
                                                $('#chiclin_bastep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#chiclin_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#chiclin_pisauf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gunting == 1){
                                                $('#chiclin_gun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pemukul_daging == 1){
                                                $('#chiclin_pedag').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#chiclin_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#chiclin_btoksa').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#chiclin_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#chiclin_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tempt_sendok == 1){
                                                $('#chiclin_tsendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#chiclin_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#chiclin_bobum').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#chiclin_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#chiclin_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#chiclin_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].masker == 1){
                                                $('#chiclin_masker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_hitam == 1){
                                                $('#chiclin_seragam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek_merah == 1){
                                                $('#chiclin_clemek').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_sate == 1){
                                                $('#chiclin_tusuks').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#chiclin_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#chiclin_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Paket Silver'){
                                        $('#chi_lampu').show();
                                        $('#chi_banat').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#chiclin_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker_bo_set == 1){
                                                $('#chiclin_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#chiclin_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#chiclin_la_set').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#chiclin_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].banner_atap == 1){
                                                $('#chiclin_banat').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#chiclin_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#chiclin_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#chiclin_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#chiclin_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#chiclin_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sek_pot_ay == 1){
                                                $('#chiclin_se_pot').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#chiclin_nmst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tiris_ayam == 1){
                                                $('#chiclin_tsst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gas_troch == 1){
                                                $('#chiclin_gast').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#chiclin_icboxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].baskom_tep == 1){
                                                $('#chiclin_bastep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#chiclin_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#chiclin_pisauf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gunting == 1){
                                                $('#chiclin_gun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pemukul_daging == 1){
                                                $('#chiclin_pedag').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#chiclin_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#chiclin_btoksa').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#chiclin_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#chiclin_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tempt_sendok == 1){
                                                $('#chiclin_tsendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#chiclin_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#chiclin_bobum').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#chiclin_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#chiclin_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#chiclin_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].masker == 1){
                                                $('#chiclin_masker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_hitam == 1){
                                                $('#chiclin_seragam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek_merah == 1){
                                                $('#chiclin_clemek').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_sate == 1){
                                                $('#chiclin_tusuks').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#chiclin_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#chiclin_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Boboo Chicken'){
                                    $('#rincianboboochicken').show();
                                    if(data[0].nm_paket == 'Paket Eksklusif'){
                                        $('#boboo_tenda').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#bochi_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#bochi_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#bochi_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#bochi_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#bochi_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#bochi_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#bochi_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gastro == 1){
                                                $('#bochi_gast').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].botsus == 1){
                                                $('#bochi_btoksa').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].botkac == 1){
                                                $('#bochi_btol_kc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#bochi_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].talenan == 1){
                                                $('#bochi_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#bochi_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wd_tp_kering == 1){
                                                $('#bochi_wtk').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wd_tp_basah == 1){
                                                $('#bochi_wtb').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_dag == 1){
                                                $('#bochi_basdag').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#bochi_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_moz == 1){
                                                $('#bochi_top_moz').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_takar == 1){
                                                $('#bochi_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#bochi_seragam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parut_kej == 1){
                                                $('#bochi_par_kej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#bochi_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#bochi_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau_f == 1){
                                                $('#bochi_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#bochi_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#bochi_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_sate == 1){
                                                $('#bochi_tusuks').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#bochi_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#bochi_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#bochi_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#bochi_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_hit == 1){
                                                $('#bochi_clemek').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#bochi_la_set').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Cut Chicken'){
                                    $('#rinciancutchicken').show();
                                    if(data[0].nm_paket == 'Portable'){
                                        $('#cut_portable').show();
                                        $('#cut_neon').show();
                                        $('#cut_3').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_put == 1){
                                                $('#cutchi_booth').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_por == 1){
                                                $('#cutchi_portable').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].neon_box == 1){
                                                $('#cutchi_neon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#cutchi_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#cutchi_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#cutchi_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tep == 1){
                                                $('#cutchi_toptep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#cutchi_btoksap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#cutchi_btol_kc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cutchi_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#cutchi_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#cutchi_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#cutchi_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cutchi_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#cutchi_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_chi == 1){
                                                $('#cutchi_tusukc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#cutchi_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#cutchi_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#cutchi_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cutchi_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#cutchi_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cutchi_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Booth'){
                                        $('#cut_booth').show();
                                        $('#cut_4').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_put == 1){
                                                $('#cutchi_booth').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_por == 1){
                                                $('#cutchi_portable').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].neon_box == 1){
                                                $('#cutchi_neon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#cutchi_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#cutchi_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#cutchi_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tep == 1){
                                                $('#cutchi_toptep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#cutchi_btoksap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#cutchi_btol_kc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cutchi_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#cutchi_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#cutchi_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#cutchi_pisf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cutchi_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#cutchi_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_chi == 1){
                                                $('#cutchi_tusukc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#cutchi_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#cutchi_boxes').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#cutchi_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cutchi_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#cutchi_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cutchi_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Candy Crepes'){
                                    $('#rinciancandycrepes').show();
                                    if(data[0].nm_paket == 'Outdoor'){
                                        $('#candy_bo_put').show();
                                        $('#candy_tenda').show();
                                        $('#candy_rafia').show();
                                        $('#candy_5').show();
                                        $('#candy_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#cancre_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#cancre_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#cancre_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#cancre_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#cancre_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker_top == 1){
                                                $('#cancre_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pan_crep == 1){
                                                $('#cancre_pan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].segi_crepes == 1){
                                                $('#cancre_segitiga').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#cancre_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#cancre_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mix_set == 1){
                                                $('#cancre_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_ado == 1){
                                                $('#cancre_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_top == 1){
                                                $('#cancre_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_selai == 1){
                                                $('#cancre_topsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#cancre_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_ado == 1){
                                                $('#cancre_senad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#cancre_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parut_kej == 1){
                                                $('#cancre_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#cancre_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].solet_plas == 1){
                                                $('#cancre_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_top == 1){
                                                $('#cancre_setop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].scrap_crep == 1){
                                                $('#cancre_scre').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cancre_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cancre_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lap_serb == 1){
                                                $('#cancre_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#cancre_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#cancre_semer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#cancre_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cancre_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#cancre_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#cancre_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cancre_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_mer == 1){
                                                $('#cancre_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#cancre_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#pinuke_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_palet == 1){
                                                $('#pinuke_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#pinuke_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#pinuke_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#pinuke_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#pinuke_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#pinuke_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#pinuke_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#pinuke_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#pinuke_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mixer_set == 1){
                                                $('#pinuke_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#pinuke_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#pinuke_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#pinuke_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#pinuke_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_pis == 1){
                                                $('#pinuke_towapi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_ado == 1){
                                                $('#pinuke_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_top == 1){
                                                $('#pinuke_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_sel == 1){
                                                $('#pinuke_topsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_cok == 1){
                                                $('#pinuke_bocok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#pinuke_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#pinuke_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#pinuke_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#pinuke_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#pinuke_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#pinuke_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#pinuke_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#pinuke_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#pinuke_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#pinuke_sekun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#pinuke_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#pinuke_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#pinuke_cel_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#pinuke_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Indoor'){
                                        $('#psangke_bo_pall').show();
                                        $('#psangke_rafia').show();
                                        $('#psangke_5').show();
                                        $('#psangke_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#pinuke_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_palet == 1){
                                                $('#pinuke_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#pinuke_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#pinuke_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#pinuke_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#pinuke_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#pinuke_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#pinuke_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#pinuke_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#pinuke_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mixer_set == 1){
                                                $('#pinuke_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#pinuke_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#pinuke_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#pinuke_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#pinuke_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_pis == 1){
                                                $('#pinuke_towapi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_ado == 1){
                                                $('#pinuke_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_top == 1){
                                                $('#pinuke_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_sel == 1){
                                                $('#pinuke_topsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_cok == 1){
                                                $('#pinuke_bocok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#pinuke_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#pinuke_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#pinuke_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#pinuke_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#pinuke_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#pinuke_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#pinuke_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#pinuke_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#pinuke_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#pinuke_sekun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#pinuke_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#pinuke_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#pinuke_cel_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#pinuke_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Tanpa Booth'){
                                        $('#psangke_lakban').show();
                                        $('#psangke_1').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#pinuke_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_palet == 1){
                                                $('#pinuke_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#pinuke_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#pinuke_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#pinuke_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#pinuke_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#pinuke_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#pinuke_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#pinuke_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#pinuke_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mixer_set == 1){
                                                $('#pinuke_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#pinuke_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#pinuke_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#pinuke_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#pinuke_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_pis == 1){
                                                $('#pinuke_towapi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_ado == 1){
                                                $('#pinuke_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_top == 1){
                                                $('#pinuke_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_sel == 1){
                                                $('#pinuke_topsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_cok == 1){
                                                $('#pinuke_bocok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#pinuke_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#pinuke_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#pinuke_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#pinuke_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#pinuke_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#pinuke_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#pinuke_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#pinuke_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#pinuke_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#pinuke_sekun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#pinuke_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#pinuke_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#pinuke_cel_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#pinuke_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Oliv Geprek Ekspress'){
                                    $('#rincianolivgeprek').show();
                                    if(data[0].nm_paket == 'Paket 1 (Booth Jumbo)'){
                                        $('#oliv_bo_put').show();
                                        $('#oliv_rafia').show();
                                        $('#oliv_5').show();
                                        $('#oliv_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#oligep_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_set == 1){
                                                $('#oligep_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#oligep_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mmt == 1){
                                                $('#oligep_mmt_atap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cobex == 1){
                                                $('#oligep_cobex').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#oligep_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#oligep_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rice_cook == 1){
                                                $('#oligep_ricecok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].win_gas == 1){
                                                $('#oligep_gastor').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].termos_nas == 1){
                                                $('#oligep_termosnasi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#oligep_boxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_tep == 1){
                                                $('#oligep_basteps').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_say == 1){
                                                $('#oligep_topsay').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_sam == 1){
                                                $('#oligep_bassam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_tam == 1){
                                                $('#oligep_watamke').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#oligep_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#oligep_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#oligep_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].talenan == 1){
                                                $('#oligep_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau_b == 1){
                                                $('#oligep_pisaub').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#oligep_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#oligep_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#oligep_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#oligep_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#oligep_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#oligep_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#oligep_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#oligep_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#oligep_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#oligep_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#oligep_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#oligep_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#oligep_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#oligep_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Paket 2 (FTB)'){
                                        $('#oliv_lakban').show();
                                        $('#oliv_1').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#oligep_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_set == 1){
                                                $('#oligep_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#oligep_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mmt == 1){
                                                $('#oligep_mmt_atap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cobex == 1){
                                                $('#oligep_cobex').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#oligep_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#oligep_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rice_cook == 1){
                                                $('#oligep_ricecok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].win_gas == 1){
                                                $('#oligep_gastor').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].termos_nas == 1){
                                                $('#oligep_termosnasi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#oligep_boxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_tep == 1){
                                                $('#oligep_basteps').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_say == 1){
                                                $('#oligep_topsay').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_sam == 1){
                                                $('#oligep_bassam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wad_tam == 1){
                                                $('#oligep_watamke').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#oligep_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#oligep_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#oligep_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].talenan == 1){
                                                $('#oligep_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau_b == 1){
                                                $('#oligep_pisaub').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#oligep_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#oligep_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#oligep_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#oligep_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#oligep_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#oligep_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#oligep_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#oligep_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#oligep_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#oligep_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#oligep_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#oligep_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#oligep_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#oligep_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Tahu Hot King'){
                                    $('#rinciantahuhotking').show();
                                    if(data[0].nm_paket == 'Paket A (Putih)'){
                                        $('#hot_bo_put').show();
                                        $('#hot_rafia').show();
                                        $('#hot_5').show();
                                        $('#hot_lampu').show();
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#hoki_booth_put').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#hoki_booth_pal').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_baner == 1){
                                                $('#hoki_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_set == 1){
                                                $('#hoki_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#hoki_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#hoki_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#hoki_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#hoki_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotl == 1){
                                                $('#hoki_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#hoki_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tep == 1){
                                                $('#hoki_toptep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tahu == 1){
                                                $('#hoki_toptahu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_stain == 1){
                                                $('#hoki_bas_st').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_saus == 1){
                                                $('#hoki_to_sa').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#hoki_btoksap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#hoki_btol_kc').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].talenan == 1){
                                                $('#hoki_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#hoki_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#hoki_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#hoki_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#hoki_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#hoki_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_tahu == 1){
                                                $('#hoki_tusukt').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#hoki_sermer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#hoki_cel_mer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#hoki_ha_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#hoki_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#hoki_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#hoki_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lakban == 1){
                                                $('#hoki_lakban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#hoki_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#hoki_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
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
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#ohana_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_set == 1){
                                                $('#ohana_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#ohana_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#ohana_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#ohana_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#ohana_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#ohana_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].warmer == 1){
                                                $('#ohana_warmer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rice_cook == 1){
                                                $('#ohana_ricecok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].termos_nas == 1){
                                                $('#ohana_termosnasi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#ohana_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#ohana_boxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#ohana_btoksap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_tep == 1){
                                                $('#ohana_basteps').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_sam == 1){
                                                $('#ohana_bassam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tam == 1){
                                                $('#ohana_totamke').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#ohana_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau_b == 1){
                                                $('#ohana_pisaub').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#ohana_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#ohana_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#ohana_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#ohana_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#ohana_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#ohana_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#ohana_serhit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#ohana_cel_hit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#ohana_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#ohana_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].packing == 1){
                                                $('#ohana_kayu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#ohana_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#ohana_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_paket == 'Paket Single'){
                                        $('#oh_5').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#ohana_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_set == 1){
                                                $('#ohana_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#ohana_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#ohana_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#ohana_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#ohana_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#ohana_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].warmer == 1){
                                                $('#ohana_warmer').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rice_cook == 1){
                                                $('#ohana_ricecok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].termos_nas == 1){
                                                $('#ohana_termosnasi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#ohana_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#ohana_boxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#ohana_btoksap').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_tep == 1){
                                                $('#ohana_basteps').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_sam == 1){
                                                $('#ohana_bassam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_tam == 1){
                                                $('#ohana_totamke').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#ohana_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau_b == 1){
                                                $('#ohana_pisaub').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#ohana_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#ohana_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#ohana_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#ohana_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#ohana_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#ohana_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#ohana_serhit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#ohana_cel_hit').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#ohana_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#ohana_id_card').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].packing == 1){
                                                $('#ohana_kayu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#ohana_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#ohana_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Chip Finger'){
                                        $('#rincianchipfinger').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#chifin_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker_booth_set == 1){
                                                $('#chifin_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#chifin_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#chifin_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lakban == 1){
                                                $('#chifin_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#chifin_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#chifin_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#chifin_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#chifin_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#chifin_nmst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tiris == 1){
                                                $('#chifin_tsst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ice_box == 1){
                                                $('#chifin_icboxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_tep == 1){
                                                $('#chifin_bastep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#chifin_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#chifin_pisauf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_plas == 1){
                                                $('#chifin_topplas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#chifin_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#chifin_btoksa').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#chifin_bobum').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#chifin_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].temp_sendok == 1){
                                                $('#chifin_tsendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#chifin_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#chifin_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#chifin_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#chifin_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].masker == 1){
                                                $('#chifin_masker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#chifin_seragam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#chifin_clemek').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_sat == 1){
                                                $('#chifin_tusuks').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#chifin_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#chifin_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                }else if(data[0].nm_produk == 'Xiaolin'){
                                        $('#rincianxiaolin').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#cek_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_set == 1){
                                                $('#cek_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#cek_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#cek_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rumbai == 1){
                                                $('#cek_rumbai').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].neon_box == 1){
                                                $('#cek_neon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_spot == 1){
                                                $('#cek_lamspo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#cek_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#cek_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#cek_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sekop_ay == 1){
                                                $('#cek_se_pot').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#cek_nmst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tirisan == 1){
                                                $('#cek_tsst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gas_torch == 1){
                                                $('#cek_gast').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#cek_icboxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_tep == 1){
                                                $('#cek_bastep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#cek_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#cek_pisauf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gunting == 1){
                                                $('#cek_gun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pemukul_dag == 1){
                                                $('#cek_pedag').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#cek_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#cek_btoksa').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#cek_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cek_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tempt_sendok == 1){
                                                $('#cek_tsendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#cek_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#cek_bobum').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#cek_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#cek_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cek_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].masker == 1){
                                                $('#cek_masker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#cek_seragam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#cek_clemek').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_sate == 1){
                                                $('#cek_tusuks').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#cek_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cek_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#cek_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cek_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    if(data[0].nm_paket == 'Paket Gold'){
                                        $('#xia_tenda').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#cek_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_set == 1){
                                                $('#cek_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#cek_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#cek_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rumbai == 1){
                                                $('#cek_rumbai').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].neon_box == 1){
                                                $('#cek_neon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_spot == 1){
                                                $('#cek_lamspo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#cek_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#cek_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#cek_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sekop_ay == 1){
                                                $('#cek_se_pot').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#cek_nmst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tirisan == 1){
                                                $('#cek_tsst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gas_torch == 1){
                                                $('#cek_gast').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#cek_icboxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_tep == 1){
                                                $('#cek_bastep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#cek_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#cek_pisauf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gunting == 1){
                                                $('#cek_gun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pemukul_dag == 1){
                                                $('#cek_pedag').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#cek_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#cek_btoksa').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#cek_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#cek_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tempt_sendok == 1){
                                                $('#cek_tsendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#cek_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#cek_bobum').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#cek_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#cek_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#cek_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].masker == 1){
                                                $('#cek_masker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#cek_seragam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#cek_clemek').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_sate == 1){
                                                $('#cek_tusuks').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#cek_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#cek_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#cek_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#cek_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Martabak Mini Rainbow'){
                                    $('#rincianmartabakmini').show();
                                    if(data[0].nm_paket == 'Outdoor'){
                                        $('#martabak_bo_put').show();
                                        $('#martabak_tenda').show();
                                        $('#martabak_kanopi').show();
                                        $('#martabak_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#marmin_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_palet == 1){
                                                $('#marmin_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#marmin_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#marmin_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanopi == 1){
                                                $('#marmin_kanopi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#marmin_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#marmin_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#marmin_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#marmin_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pan == 1){
                                                $('#marmin_pan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mixer_set == 1){
                                                $('#marmin_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_top == 1){
                                                $('#marmin_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_ado == 1){
                                                $('#marmin_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#marmin_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_sel == 1){
                                                $('#marmin_botsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#marmin_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#marmin_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].garpu == 1){
                                                $('#marmin_garpu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_ado == 1){
                                                $('#marmin_senad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#marmin_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_mar == 1){
                                                $('#marmin_somar').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#marmin_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_top == 1){
                                                $('#marmin_setop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#marmin_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#marmin_parut').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#marmin_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lap == 1){
                                                $('#marmin_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#marmin_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#marmin_sebiru').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].plat_besi == 1){
                                                $('#marmin_plat').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#marmin_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#marmin_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#marmin_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#marmin_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#marmin_cel_biru').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#marmin_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_produk == 'Indoor Putih'){
                                        $('#martabak_bo_put').show();
                                        $('#martabak_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#marmin_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_palet == 1){
                                                $('#marmin_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#marmin_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#marmin_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanopi == 1){
                                                $('#marmin_kanopi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#marmin_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#marmin_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#marmin_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#marmin_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pan == 1){
                                                $('#marmin_pan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mixer_set == 1){
                                                $('#marmin_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_top == 1){
                                                $('#marmin_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_ado == 1){
                                                $('#marmin_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#marmin_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_sel == 1){
                                                $('#marmin_botsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#marmin_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#marmin_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].garpu == 1){
                                                $('#marmin_garpu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_ado == 1){
                                                $('#marmin_senad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#marmin_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_mar == 1){
                                                $('#marmin_somar').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#marmin_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_top == 1){
                                                $('#marmin_setop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#marmin_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#marmin_parut').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#marmin_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lap == 1){
                                                $('#marmin_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#marmin_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#marmin_sebiru').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].plat_besi == 1){
                                                $('#marmin_plat').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#marmin_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#marmin_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#marmin_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#marmin_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#marmin_cel_biru').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#marmin_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_produk == 'Pallet'){
                                        $('#martabak_bo_pall').show();
                                        $('#martabak_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#marmin_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_palet == 1){
                                                $('#marmin_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#marmin_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#marmin_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanopi == 1){
                                                $('#marmin_kanopi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#marmin_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#marmin_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#marmin_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#marmin_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pan == 1){
                                                $('#marmin_pan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mixer_set == 1){
                                                $('#marmin_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_top == 1){
                                                $('#marmin_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_ado == 1){
                                                $('#marmin_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#marmin_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_sel == 1){
                                                $('#marmin_botsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#marmin_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#marmin_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].garpu == 1){
                                                $('#marmin_garpu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_ado == 1){
                                                $('#marmin_senad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#marmin_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_mar == 1){
                                                $('#marmin_somar').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#marmin_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_top == 1){
                                                $('#marmin_setop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#marmin_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#marmin_parut').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#marmin_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lap == 1){
                                                $('#marmin_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#marmin_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#marmin_sebiru').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].plat_besi == 1){
                                                $('#marmin_plat').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#marmin_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#marmin_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#marmin_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#marmin_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#marmin_cel_biru').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#marmin_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_produk == 'Tanpa Booth'){
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#marmin_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_palet == 1){
                                                $('#marmin_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#marmin_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tenda == 1){
                                                $('#marmin_tenda').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanopi == 1){
                                                $('#marmin_kanopi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker == 1){
                                                $('#marmin_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#marmin_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#marmin_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#marmin_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pan == 1){
                                                $('#marmin_pan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mixer_set == 1){
                                                $('#marmin_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_top == 1){
                                                $('#marmin_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_ado == 1){
                                                $('#marmin_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#marmin_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_sel == 1){
                                                $('#marmin_botsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#marmin_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#marmin_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].garpu == 1){
                                                $('#marmin_garpu').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_ado == 1){
                                                $('#marmin_senad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#marmin_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_mar == 1){
                                                $('#marmin_somar').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plas == 1){
                                                $('#marmin_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok_top == 1){
                                                $('#marmin_setop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#marmin_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan == 1){
                                                $('#marmin_parut').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#marmin_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lap == 1){
                                                $('#marmin_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#marmin_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#marmin_sebiru').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].plat_besi == 1){
                                                $('#marmin_plat').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#marmin_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#marmin_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#marmin_rafla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#marmin_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#marmin_cel_biru').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lamp_set == 1){
                                                $('#marmin_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Banana Nugget Juara'){
                                    $('#rincianbanananugget').show();
                                    if(data[0].nm_paket == 'Juara 1 (Putih)'){
                                        $('#banug_put').show();
                                        $('#banu_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#banug_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#banug_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#banug_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#banug_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#banug_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#banug_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#banug_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mix_set == 1){
                                                $('#banug_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#banug_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#banug_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#banug_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#banug_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_wad_pis == 1){
                                                $('#banug_towapi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_adonan == 1){
                                                $('#banug_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_toping == 1){
                                                $('#banug_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_selai == 1){
                                                $('#banug_topsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#banug_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan_kej == 1){
                                                $('#banug_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#banug_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#banug_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plastik == 1){
                                                $('#banug_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#banug_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#banug_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#banug_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#banug_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_kun == 1){
                                                $('#banug_sekun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].surkon == 1){
                                                $('#banug_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#banug_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_kun == 1){
                                                $('#banug_cel_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#banug_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_produk == 'Juara 2 (Palet)'){
                                        $('#banug_pall').show();
                                        $('#banu_lampu').show();
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#banug_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#banug_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#banug_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#banug_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#banug_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#banug_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#banug_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mix_set == 1){
                                                $('#banug_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#banug_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#banug_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#banug_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#banug_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_wad_pis == 1){
                                                $('#banug_towapi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_adonan == 1){
                                                $('#banug_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_toping == 1){
                                                $('#banug_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_selai == 1){
                                                $('#banug_topsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#banug_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan_kej == 1){
                                                $('#banug_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#banug_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#banug_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plastik == 1){
                                                $('#banug_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#banug_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#banug_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#banug_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#banug_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_kun == 1){
                                                $('#banug_sekun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].surkon == 1){
                                                $('#banug_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#banug_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_kun == 1){
                                                $('#banug_cel_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#banug_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }else if(data[0].nm_produk == 'Juara 3 (FTP)'){
                                        var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrincibanana", dataString, function(data){
                                            if(data[0].booth_putih == 1){
                                                $('#banug_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].booth_pallet == 1){
                                                $('#banug_booth_pallet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#banug_rol_banner').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sticker == 1){
                                                $('#banug_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_top == 1){
                                                $('#banug_stickert').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kom_gas == 1){
                                                $('#banug_kom_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].selreg == 1){
                                                $('#banug_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].mix_set == 1){
                                                $('#banug_mixset').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].wajan == 1){
                                                $('#banug_wajan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sotil == 1){
                                                $('#banug_sotil').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].irus == 1){
                                                $('#banug_irus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].saringan == 1){
                                                $('#banug_saringan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_wad_pis == 1){
                                                $('#banug_towapi').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_adonan == 1){
                                                $('#banug_topad').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_toping == 1){
                                                $('#banug_toptop').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].top_selai == 1){
                                                $('#banug_topsel').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#banug_namst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].parutan_kej == 1){
                                                $('#banug_parkej').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisau == 1){
                                                $('#banug_pisau').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#banug_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sol_plastik == 1){
                                                $('#banug_sopla').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kuas == 1){
                                                $('#banug_kuas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#banug_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#banug_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#banug_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].ser_kun == 1){
                                                $('#banug_sekun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].surkon == 1){
                                                $('#banug_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#banug_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].cel_kun == 1){
                                                $('#banug_cel_kun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].lam_set == 1){
                                                $('#banug_lampu').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                    }
                                }else if(data[0].nm_produk == 'Eat Toast'){
                                    $('#rincianeattoast').show();
                                    var id = data[0].kd_mitra;
                                    var dataString = 'id='+id;
                                    $.get("<?php echo base_url();?>Vendorbooth/getrincieattoast", dataString, function(data){
                                        if(data[0].booth_put == 1){
                                            $('#eattoa_booth_putih').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].stiker == 1){
                                            $('#eattoa_sticker').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].neon_box == 1){
                                            $('#eattoa_neon').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].roll_banner == 1){
                                            $('#eattoa_roll_ban').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].baut_neon == 1){
                                            $('#eattoa_neonbaut').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].neon_led == 1){
                                            $('#eattoa_neonled').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].pan == 1){
                                            $('#eattoa_pan').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].kom_gas == 1){
                                            $('#eattoa_kom_gas').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].bot_saus == 1){
                                            $('#eattoa_bosaus').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].box_top == 1){
                                            $('#eattoa_boxtop').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].celmek == 1){
                                            $('#eattoa_clemek').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].seragam == 1){
                                            $('#eattoa_seragam').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].talenan == 1){
                                            $('#eattoa_telenan').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].sol_plas == 1){
                                            $('#eattoa_sopla').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].pisau_b == 1){
                                            $('#eattoa_pisaub').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].scrap == 1){
                                            $('#eattoa_scrapsand').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].par_keju == 1){
                                            $('#eattoa_parkej').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].kanebo == 1){
                                            $('#eattoa_kanebo').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].serbet == 1){
                                            $('#eattoa_serbet').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].masker == 1){
                                            $('#eattoa_masker').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].hand_glo == 1){
                                            $('#eattoa_hand_glo').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].nampan_stain == 1){
                                            $('#eattoa_nmst').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].colling == 1){
                                            $('#eattoa_coll').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].capitan == 1){
                                            $('#eattoa_capitan').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].kuas == 1){
                                            $('#eattoa_kuas').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].sel_reg == 1){
                                            $('#eattoa_se_reg').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].icebox == 1){
                                            $('#eattoa_boxes').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].kontainer == 1){
                                            $('#eattoa_kontainer').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].top_tel == 1){
                                            $('#eattoa_top_telur').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].cet_tel == 1){
                                            $('#eattoa_cet_telur').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].rafia_lak == 1){
                                            $('#eattoa_ra_la').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].kardus == 1){
                                            $('#eattoa_kardus').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].sur_kon == 1){
                                            $('#eattoa_sukon').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].idcard == 1){
                                            $('#eattoa_id_ca').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].top_mar == 1){
                                            $('#eattoa_top_mar').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].sendok == 1){
                                            $('#eattoa_sendok').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].tempt_sen == 1){
                                            $('#eattoa_tsendok').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].pisau_say == 1){
                                            $('#eattoa_pisausay').html('<i class="fa fa-check"></i>')
                                        }
                                        if(data[0].scrap_kecil == 1){
                                            $('#eattoa_scke').html('<i class="fa fa-check"></i>')
                                        }
                                    }, 'json')

                                }else if(data[0].nm_produk == 'Lianglin'){
                                    $('#rincianlianling').show();
                                    var id = data[0].kd_mitra;
                                        var dataString = 'id='+id;
                                        $.get("<?php echo base_url()?>Vendorbooth/getrinciboboo", dataString, function(data){
                                            if(data[0].booth_put == 1){
                                                $('#lianlin_booth_putih').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].stiker_set == 1){
                                                $('#lianlin_sticker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].roll_banner == 1){
                                                $('#lianlin_roll_ban').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].neon_box == 1){
                                                $('#lianlin_neon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].rafia_lak == 1){
                                                $('#lianlin_ra_la').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kardus == 1){
                                                $('#lianlin_kardus').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_gas == 1){
                                                $('#lianlin_deep_gas').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].deep_lis == 1){
                                                $('#lianlin_deep_lis').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sel_reg == 1){
                                                $('#lianlin_se_reg').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sekop_a == 1){
                                                $('#lianlin_se_pot').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].nampan_stain == 1){
                                                $('#lianlin_nmst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tirisan == 1){
                                                $('#lianlin_tsst').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gas_troch == 1){
                                                $('#lianlin_gast').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].icebox == 1){
                                                $('#lianlin_icboxs').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bas_tep == 1){
                                                $('#lianlin_bastep').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].telenan == 1){
                                                $('#lianlin_telenan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pisauf == 1){
                                                $('#lianlin_pisauf').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gunting == 1){
                                                $('#lianlin_gun').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].pemukul_dag == 1){
                                                $('#lianlin_pedag').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].timbangan == 1){
                                                $('#lianlin_timbangan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_saus == 1){
                                                $('#lianlin_btoksa').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].gel_tak == 1){
                                                $('#lianlin_getak').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sendok == 1){
                                                $('#lianlin_sendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tempt_sedok == 1){
                                                $('#lianlin_tsendok').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].capitan == 1){
                                                $('#lianlin_capitan').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].bot_bum == 1){
                                                $('#lianlin_bobum').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].serbet == 1){
                                                $('#lianlin_serbet').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].kanebo == 1){
                                                $('#lianlin_kanebo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].hand_glo == 1){
                                                $('#lianlin_hand_glo').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].masker == 1){
                                                $('#lianlin_masker').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].celmek == 1){
                                                $('#lianlin_clemek').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].seragam == 1){
                                                $('#lianlin_seragam').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].tusuk_sat == 1){
                                                $('#lianlin_tusuks').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].sur_kon == 1){
                                                $('#lianlin_sukon').html('<i class="fa fa-check"></i>')
                                            }
                                            if(data[0].idcard == 1){
                                                $('#lianlin_id_ca').html('<i class="fa fa-check"></i>')
                                            }
                                        })
                                }
                            },'json')
                        })
                </script>
        </div>
    </div>
</div>