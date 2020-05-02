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
    .dropzone{
        margin-top: 5px;
        width: 80%;
	    border: 2px dashed #d9d9d9;
    }
    .ed_foto{
        margin-top: 5px;
        width: 80%;
	    border: 2px dashed #d9d9d9;
        transition: transform .2s;
        padding: 5px;
    }
    .ed_foto img:hover{
        transition: transform .2s;
        border: 1px solid #777;
        transform: scale(1.5);
    }
    div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 48%;
    height: 50%;
    transition: transform .2s;
    }

    div.gallery:hover {
    border: 1px solid #777;
    transform: scale(1.5);
    }

    div.gallery img {
    width: 100%;
    height: 100%;
    }

    div.desc {
    padding: 15px;
    text-align: center;
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
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/input-icon.png')?>" style="margin-right: 17px;margin-bottom: 4px;">
            Laporan Project R&D
        </div>
    </div>
    <div class="check-awb-content" style="margin-top:5%;">
        <div class="container">
            <div class="check-awb-wrapper">   
                <div class="awb-input-field">   
                    <div class="row ">
                        <div class="col-md-12">                  
                            <br>
                            <button style="height: 36px; border-radius:6px; padding-right:3%; padding-left:3%" class="btn btn-danger" data-toggle="modal" data-target="#inputRnd"  data-keyboard="false" data-backdrop="static" >+ Input Laporan</button>
                            <br>
                            <br>
                            <div class="form-group" style="float:right;margin-top:-85px; margin-right:2%">
                                    <label for="searching"></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><img src='<?php echo base_url('assets/icon/search--v2.png')?>' width='20' height='20'></span>
                                        <input class="form-control" name="cari_nm_mitra" id="cari_nm_mitra" style="height: 44px;" placeholder="Masukkan nama mitra">
                                    </div>
                                </div>
                            <div class="table-responsive">
                                <table class="table table-borderless" id="dataRnDM" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Brand</th>
                                            <!-- <th>Produk Brand</th> -->
                                            <!-- <th>Perlengkapan</th>
                                            <th>Bahan Baku</th> -->
                                            <th>Jenis Brand</th>
                                            <th>Project Bulan</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <!-- <th>Web</th> -->
                                            <!-- <th>Google Drive</th> -->
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
                            var table=$('#dataRnDM').DataTable({
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
                                'url':'<?php echo base_url().'RnD/dt_tbl'?>',
                                'data': function(data){
                                    var awal = $('#tgl1').val();
                                    var akhir = $('#tgl2').val();

                                    data.searchByAwal = awal;
                                    data.searchByAkhir = akhir;
                                }
                            },
                            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                                    if (aData['last'] === "Di atas 3 bulan") {
                                        $('td', nRow).css('background-color', 'LightCoral');
                                    } else {
                                        $('td', nRow).css('background-color', '');
                                    }
                                },
                            'columns': [
                                //{ data: 'no' },
                                //  { data: 'kd_inv' },
                                { data: 'nm_brand' },
                                { data: 'pro_brand' },
                                // { data: 'perkap_ket' },
                                // { data: 'bb_ket' },
                                { data: 'bulan' },
                                // { data: 'url_ins' },
                                { data: 'deadline' },
                                { data: 'status' },
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
                    <div class="modal fade" id="inputRnd" tabindex="-1" role="dialog" aria-labelledby="inputRndLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-label="Close" onclick="tutup()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-header d-flex p-0">
                                        <h3 class="card-title p-3">Data R&D</h3>
                                        <ul class="nav nav-pills ml-auto p-2">
                                            <li class="nav-item "><a class="nav-link" href="#tab_1" data-toggle="tab">Brand</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Desain</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Perlengkapan</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Bahan Baku</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Media</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                                <div class="form-group">
                                                    <label for="nm_brand">Nama Brand</label>
                                                    <input class="form-control" type="text" name="in_nm_brand" id="in_nm_brand" style="width: 80%;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pro_brand">Produk Yang Ditawarkan</label>
                                                    <input class="form-control" type="text" name="in_pro_brand" id="in_pro_brand" style="width: 80%;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deadline">Tanggal Deadline</label>
                                                    <input type="text" class="form-control" name="tgl_dead" id="tgl_dead" placeholder="dd-mm-yyyy" style="width: 80%"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lau_brand">Tanggal Launching</label>
                                                    <input class="form-control" type="text" name="in_tgl_lau" id="in_tgl_lau" style="width: 80%;" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="penj_brand">Tanggal Ke Penjualan</label>
                                                    <input class="form-control" type="text" name="in_tgl_penj" id="in_tgl_penj" style="width: 80%;" disabled>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab_2">
                                                <div class="form-group">
                                                    <label for="booth_brand">Booth</label>
                                                    <!-- <input class="form-control" type="file" name="in_booth_brand" id="in_booth_brand" style="width: 80%;"> -->
                                                    <div class="dropzone" id="booth_fo">
                                                        <div class="dz-message">
                                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="stiker_brand">Stiker</label>
                                                    <!-- <input class="form-control" type="file" name="in_striker_brand" id="in_stiker_brand" style="width: 80%;"> -->
                                                    <div class="dropzone" id="stiker_fo">
                                                        <div class="dz-message">
                                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kemasan_brand">Kemasan</label>
                                                    <!-- <input class="form-control" type="file" name="in_kemasan_brand" id="in_kemasan_brand" style="width: 80%"> -->
                                                    <div class="dropzone" id="kemasan_fo">
                                                        <div class="dz-message">
                                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab_3">
                                                <div class="form-group">
                                                    <label for="perkap_brand">Perlengkapan</label>
                                                    <textarea class="form-control" name="in_perkap_brand" id="in_perkap_brand" style="width: 80%; height:50%"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="foperkap_brand">Foto Perlengkapan</label>
                                                    <!-- <input class="form-control dropzone" type="file" name="in_foperkap_brand" id="in_foperkap_brand" style="width: 80%"> -->
                                                    <div class="dropzone" id="perkap_fo">
                                                        <div class="dz-message">
                                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab_4">
                                                <div class="form-group">
                                                    <label for="bb_brand">Bahan Baku</label>
                                                    <textarea class="form-control" name="in_bb_brand" id="in_bb_brand" style="width: 80%; height:50%"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fobb_brand">Foto Bahan Baku (Optional)</label>
                                                    <!-- <input class="form-control dropzone" type="file" name="in_foperkap_brand" id="in_foperkap_brand" style="width: 80%"> -->
                                                    <div class="dropzone" id="bb_fo">
                                                        <div class="dz-message">
                                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab_5">
                                                <div class="form-group">
                                                    <label for="inst_brand">Instagram Brand</label>
                                                    <input class="form-control" name="in_inst_brand" id="in_inst_brand" style="width: 80%;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="web_brand">Website Brand</label>
                                                    <input class="form-control" name="in_web_brand" id="in_web_brand" style="width: 80%;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gd_brand">Konten Penjualan (Link Google Drive)</label>
                                                    <input class="form-control" name="in_gd_brand" id="in_gd_brand" style="width: 80%;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="iklan_brand">Media Iklan</label>
                                                    <input class="form-control" name="in_iklan_brand" id="in_iklan_brand" style="width: 80%;">
                                                </div>
                                                <button type="submit" class="btn btn-success" id="simpanBrand" style="color: white;">Simpan</button>
                                                <button type="button" id="close" class="btn btn-danger" onclick="wis()">Batal</button>
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
                        $('#in_tgl_lau').datetimepicker({
                            locale: 'id',
                            format: 'DD-MM-YYYY'
                        });
                        $('#tgl_dead').datetimepicker({
                                locale: 'id',
                                format: 'DD-MM-YYYY'
                            });

                        autosize(document.getElementById("in_perkap_brand"));
                        autosize(document.getElementById("in_bb_brand"));

                        Dropzone.autoDiscover = false;

                        var foto_upload1= new Dropzone("#booth_fo",{
                        url: "<?php echo base_url('RnD/proses_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });
                        var foto_upload2= new Dropzone("#stiker_fo",{
                        url: "<?php echo base_url('RnD/proses_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });
                        var foto_upload3= new Dropzone("#kemasan_fo",{
                        url: "<?php echo base_url('RnD/proses_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });
                        var foto_upload4= new Dropzone("#perkap_fo",{
                        url: "<?php echo base_url('RnD/proses_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });
                        var foto_upload5= new Dropzone("#bb_fo",{
                        url: "<?php echo base_url('RnD/proses_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });


                        //Event Upload Fotone
                        foto_upload1.on("sending",function(a,b,c){
                            a.token='booth';
                            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                        });
                        foto_upload2.on("sending",function(a,b,c){
                            a.token='stiker';
                            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                        });
                        foto_upload3.on("sending",function(a,b,c){
                            a.token='kemasan';
                            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                        });
                        foto_upload4.on("sending",function(a,b,c){
                            a.token='perkap';
                            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                        });
                        foto_upload5.on("sending",function(a,b,c){
                            a.token='bb';
                            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                        });

                        //Event Hapus Fotone
                        foto_upload1.on("removedfile", function(a){
                            var token = a.token;
                            $.ajax({
                                type: "POST",
                                data: {token:token},
                                url: "<?php echo base_url('RnD/remove_foto')?>",
                                cache: false,
                                dataType: 'json',
                                success: function(){
                                    console.log('Foto Berhasil Dihapus');
                                },
                                error: function(){
                                    console.log('Error');
                                }
                            })
                        })
                        foto_upload2.on("removedfile", function(a){
                            var token = a.token;
                            $.ajax({
                                type: "POST",
                                data: {token:token},
                                url: "<?php echo base_url('RnD/remove_foto')?>",
                                cache: false,
                                dataType: 'json',
                                success: function(){
                                    console.log('Foto Berhasil Dihapus');
                                },
                                error: function(){
                                    console.log('Error');
                                }
                            })
                        })
                        foto_upload3.on("removedfile", function(a){
                            var token = a.token;
                            $.ajax({
                                type: "POST",
                                data: {token:token},
                                url: "<?php echo base_url('RnD/remove_foto')?>",
                                cache: false,
                                dataType: 'json',
                                success: function(){
                                    console.log('Foto Berhasil Dihapus');
                                },
                                error: function(){
                                    console.log('Error');
                                }
                            })
                        })
                        foto_upload4.on("removedfile", function(a){
                            var token = a.token;
                            $.ajax({
                                type: "POST",
                                data: {token:token},
                                url: "<?php echo base_url('RnD/remove_foto')?>",
                                cache: false,
                                dataType: 'json',
                                success: function(){
                                    console.log('Foto Berhasil Dihapus');
                                },
                                error: function(){
                                    console.log('Error');
                                }
                            })
                        })
                        foto_upload5.on("removedfile", function(a){
                            var token = a.token;
                            $.ajax({
                                type: "POST",
                                data: {token:token},
                                url: "<?php echo base_url('RnD/remove_foto')?>",
                                cache: false,
                                dataType: 'json',
                                success: function(){
                                    console.log('Foto Berhasil Dihapus');
                                },
                                error: function(){
                                    console.log('Error');
                                }
                            })
                        })

                        function tutup(){
                            $('#inputRnd').modal('hide');
                            dz = document.getElementsByClassName('dropzone');
                            for (i = 0; i < dz.length; i++) {
                                $('.dropzone')[i].dropzone.files.forEach(function(file) { 
                                    file.previewElement.remove(); 
                                });
                            }
                        }

                        $('#simpanBrand').click(function(){
                            var nm_brand = $('#in_nm_brand').val();
                            var pro_brand = $('#in_pro_brand').val();
                            var tgl_lau_brand = $('#in_tgl_lau').val();
                            var tgl_penj_brand = $('#in_tgl_penj').val();
                            var perkap_ket = $('#in_perkap_brand').val();
                            var bb_ket = $('#in_bb_brand').val();
                            var url_ins = $('#in_inst_brand').val();
                            var url_web = $('#in_web_brand').val();
                            var url_gd = $('#in_gd_brand').val();
                            var med_iklan = $('#in_iklan_brand').val();

                            var dataString = 'nm_brand='+nm_brand+'&pro_brand='+pro_brand+'&perkap_ket='+perkap_ket+'&bb_ket='+bb_ket+
                            '&url_ins='+url_ins+'&url_web='+url_web+'&url_gd='+url_gd+'&med_iklan='+med_iklan;

                            $.post("<?php echo base_url();?>RnD/create_action", dataString, function(data){
                                foto_upload1.processQueue();
                                foto_upload2.processQueue();
                                foto_upload3.processQueue();
                                foto_upload4.processQueue();
                                foto_upload5.processQueue();
                                dz = document.getElementsByClassName('dropzone');
                                for (i = 0; i < dz.length; i++) {
                                    $('.dropzone')[i].dropzone.files.forEach(function(file) { 
                                        file.previewElement.remove(); 
                                    });
                                }
                                $('.dropzone').removeClass('dz-started');
                                $('#inputRnd').modal('hide');
                                $('#dataRnDM').DataTable().ajax.reload();
                            })
                        })
                    </script>
                    <div class="modal fade" id="boothModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Foto Booth</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="all_booth">
                                
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#boothModal').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this)
                            var dataString = 'id='+recipient
                            $.get("<?php echo base_url();?>RnD/get_foto_booth", dataString, function(html){
                                $('#all_booth').html(html);
                            })
                        })
                    </script>
                    <div class="modal fade" id="stikerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Foto Stiker</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="all_stiker">
                                
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#stikerModal').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this)
                            var dataString = 'id='+recipient
                            $.get("<?php echo base_url();?>RnD/get_foto_stiker", dataString, function(html){
                                $('#all_stiker').html(html);
                            })
                        })
                    </script>
                    <div class="modal fade" id="kemasanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Foto Stiker</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="all_kemasan">
                                
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#kemasanModal').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this)
                            var dataString = 'id='+recipient
                            $.get("<?php echo base_url();?>RnD/get_foto_kemasan", dataString, function(html){
                                $('#all_kemasan').html(html);
                            })
                        })
                    </script>

                    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Info Brand</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="info_brand">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th style="width: 25%">Nama Brand</th>
                                        <td style="width: 5%">:</td>
                                        <td><p id="nm_brand_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Produk Yang Ditawarkan</th>
                                        <td>:</td>
                                        <td><p id="pro_brand_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Foto Booth</th>
                                        <td>:</td>
                                        <td id="ft_booth_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Foto Stiker</th>
                                        <td>:</td>
                                        <td id="ft_stiker_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Foto Kemasan</th>
                                        <td>:</td>
                                        <td id="ft_kemasan_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Perlengkapan</th>
                                        <td>:</td>
                                        <td><p id="perkap_brand_info" style="white-space: pre-line"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Foto Perlengkapan</th>
                                        <td>:</td>
                                        <td id="ft_perkap_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Bahan Baku</th>
                                        <td>:</td>
                                        <td><p id="bb_brand_info" style="white-space: pre-line"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Foto Bahan Baku</th>
                                        <td>:</td>
                                        <td id="ft_bb_info"></td>
                                    </tr>
                                    <tr>
                                        <th>Instagram</th>
                                        <td>:</td>
                                        <td><p id="ins_brand_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Website</th>
                                        <td>:</td>
                                        <td><p id="web_brand_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Google Drive</th>
                                        <td>:</td>
                                        <td><p id="gd_brand_info"></p></td>
                                    </tr>
                                    <tr>
                                        <th>Media Iklan</th>
                                        <td>:</td>
                                        <td><p id="mi_brand_info"></p></td>
                                    </tr>
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
                            $.get("<?php echo base_url();?>RnD/get_info_brand", dataString, function(data){
                                $('#nm_brand_info').html(data[0].nm_brand); 
                                $('#pro_brand_info').html(data[0].pro_brand);
                                var fobo = 'id='+ data[0].kd_brand;
                                $.get("<?php echo base_url();?>RnD/get_foto_booth", fobo, function(html){
                                    $('#ft_booth_info').html(html);
                                })
                                var fost = 'id='+ data[0].kd_brand;
                                $.get("<?php echo base_url();?>RnD/get_foto_stiker", fost, function(html){
                                    $('#ft_stiker_info').html(html);
                                })
                                var fokm = 'id='+ data[0].kd_brand;
                                $.get("<?php echo base_url();?>RnD/get_foto_kemasan", fokm, function(html){
                                    $('#ft_kemasan_info').html(html);
                                })
                                $('#perkap_brand_info').html(data[0].perkap_ket);
                                var fobo = 'id='+ data[0].kd_brand;
                                $.get("<?php echo base_url();?>RnD/get_foto_perkap", fobo, function(html){
                                    $('#ft_perkap_info').html(html);
                                })
                                $('#bb_brand_info').html(data[0].bb_ket);
                                var fobb = 'id='+ data[0].kd_brand;
                                $.get("<?php echo base_url();?>RnD/get_foto_bb", fobb, function(html){
                                    $('#ft_bb_info').html(html);
                                })
                                $('#ins_brand_info').html(data[0].url_ins);
                                $('#web_brand_info').html(data[0].url_web);
                                $('#gd_brand_info').html(data[0].url_gd);
                                $('#mi_brand_info').html(data[0].med_iklan);
                            }, 'json')
                        })
                    </script>
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Data R&D</h3>
                                    <ul class="nav nav-pillss ml-auto p-2">
                                        <li class="nav-item "><a class="nav-link" href="#tabb_1" data-toggle="tab">Brand</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tabb_2" data-toggle="tab">Desain</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tabb_3" data-toggle="tab">Perlengkapan</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tabb_4" data-toggle="tab">Bahan Baku</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tabb_5" data-toggle="tab">Media</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabb_1">
                                            <div class="form-group">
                                                <label for="nm_brand">Nama Brand</label>
                                                <input class="form-control" type="text" name="ed_nm_brand" id="ed_nm_brand" style="width: 80%;">
                                            </div>
                                            <div class="form-group">
                                                <label for="pro_brand">Produk Yang Ditawarkan</label>
                                                <input class="form-control" type="text" name="ed_pro_brand" id="ed_pro_brand" style="width: 80%;">
                                            </div>
                                            <div class="form-group">
                                                <label for="lau_brand">Tanggal Launching</label>
                                                <input class="form-control" type="text" name="ed_tgl_lau" id="ed_tgl_lau" style="width: 80%;" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="penj_brand">Tanggal Ke Penjualan</label>
                                                <input class="form-control" type="text" name="ed_tgl_penj" id="ed_tgl_penj" style="width: 80%;" disabled>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tabb_2">
                                            <div class="form-group">
                                                <label for="dt_fo_booth">Foto Booth Sebelumnya</label>
                                                <div class="ed_foto" >
                                                    <div class="dz-message" id="if_booth_fo">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="booth_brand">Booth</label>
                                                <!-- <input class="form-control" type="file" name="in_booth_brand" id="in_booth_brand" style="width: 80%;"> -->
                                                <div class="dropzone" id="ed_booth_fo">
                                                    <div class="dz-message">
                                                        <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="dt_fo_booth">Foto Stiker Sebelumnya</label>
                                                <div class="ed_foto" >
                                                    <div class="dz-message" id="if_stiker_fo">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="stiker_brand">Stiker</label>
                                                <!-- <input class="form-control" type="file" name="in_striker_brand" id="in_stiker_brand" style="width: 80%;"> -->
                                                <div class="dropzone" id="ed_stiker_fo">
                                                    <div class="dz-message">
                                                        <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="dt_fo_booth">Foto Kemasan Sebelumnya</label>
                                                <div class="ed_foto" >
                                                    <div class="dz-message" id="if_kemasan_fo">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kemasan_brand">Kemasan</label>
                                                <!-- <input class="form-control" type="file" name="in_kemasan_brand" id="in_kemasan_brand" style="width: 80%"> -->
                                                <div class="dropzone" id="ed_kemasan_fo">
                                                    <div class="dz-message">
                                                        <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tabb_3">
                                            <div class="form-group">
                                                <label for="perkap_brand">Perlengkapan</label>
                                                <textarea class="form-control" name="ed_perkap_brand" id="ed_perkap_brand" style="width: 80%; height:50%"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="dt_fo_booth">Foto Perlengkapan Sebelumnya</label>
                                                <div class="ed_foto" >
                                                    <div class="dz-message" id="if_perlengkapan_fo">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="foperkap_brand">Foto Perlengkapan</label>
                                                <!-- <input class="form-control dropzone" type="file" name="in_foperkap_brand" id="in_foperkap_brand" style="width: 80%"> -->
                                                <div class="dropzone" id="ed_perkap_fo">
                                                    <div class="dz-message">
                                                        <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tabb_4">
                                            <div class="form-group">
                                                <label for="bb_brand">Bahan Baku</label>
                                                <textarea class="form-control" name="ed_bb_brand" id="ed_bb_brand" style="width: 80%; height:50%"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="dt_fo_booth">Foto Bahan Baku Sebelumnya</label>
                                                <div class="ed_foto" >
                                                    <div class="dz-message" id="if_bb_fo">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="fobb_brand">Foto Bahan Baku (Optional)</label>
                                                <!-- <input class="form-control dropzone" type="file" name="in_foperkap_brand" id="in_foperkap_brand" style="width: 80%"> -->
                                                <div class="dropzone" id="ed_bb_fo">
                                                    <div class="dz-message">
                                                        <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tabb_5">
                                            <div class="form-group">
                                                <label for="inst_brand">Instagram Brand</label>
                                                <input class="form-control" name="ed_inst_brand" id="ed_inst_brand" style="width: 80%;">
                                            </div>
                                            <div class="form-group">
                                                <label for="web_brand">Website Brand</label>
                                                <input class="form-control" name="ed_web_brand" id="ed_web_brand" style="width: 80%;">
                                            </div>
                                            <div class="form-group">
                                                <label for="gd_brand">Konten Penjualan (Link Google Drive)</label>
                                                <input class="form-control" name="ed_gd_brand" id="ed_gd_brand" style="width: 80%;">
                                            </div>
                                            <div class="form-group">
                                                <label for="iklan_brand">Media Iklan</label>
                                                <input class="form-control" name="ed_iklan_brand" id="ed_iklan_brand" style="width: 80%;">
                                            </div>
                                            <button type="submit" class="btn btn-success" id="ed_simpanBrand" style="color: white;">Simpan</button>
                                            <button type="button" id="ed_close" class="btn btn-danger" onclick="wis()">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                            <script>
                                $('#editModal').on('show.bs.modal', function(event){
                                    var button = $(event.relatedTarget)
                                    var recipient = button.data('whatever')
                                    var modal = $(this)
                                    var dataString = 'id='+recipient
                                    $.get("<?php echo base_url();?>RnD/get_edit_brand", dataString, function(data){
                                        $('#ed_nm_brand').val(data[0].nm_brand); 
                                        $('#ed_pro_brand').val(data[0].pro_brand);
                                        var fobo = 'id='+ data[0].kd_brand;
                                        $.get("<?php echo base_url();?>RnD/get_ed_foto_booth", fobo, function(html){
                                            $('#if_booth_fo').html(html);
                                        })
                                        var fose = 'id='+ data[0].kd_brand;
                                        $.get("<?php echo base_url();?>RnD/get_ed_foto_stiker", fose, function(html){
                                            $('#if_stiker_fo').html(html);
                                        })
                                        var foke = 'id='+ data[0].kd_brand;
                                        $.get("<?php echo base_url();?>RnD/get_ed_foto_kemasan", foke, function(html){
                                            $('#if_kemasan_fo').html(html);
                                        })
                                        $('#ed_perkap_brand').val(data[0].perkap_ket);
                                        var fope = 'id='+ data[0].kd_brand;
                                        $.get("<?php echo base_url();?>RnD/get_ed_foto_perkap", fope, function(html){
                                            $('#if_perlengkapan_fo').html(html);
                                        })
                                        $('#ed_bb_brand').val(data[0].bb_ket);
                                        var fobab = 'id='+ data[0].kd_brand;
                                        $.get("<?php echo base_url();?>RnD/get_ed_foto_bb", fobab, function(html){
                                            $('#if_bb_fo').html(html);
                                        })
                                        $('#ed_inst_brand').val(data[0].bb_ket);
                                        $('#ed_web_brand').val(data[0].bb_ket);
                                        $('#ed_gd_brand').val(data[0].bb_ket);
                                        $('#ed_iklan_brand').val(data[0].bb_ket);
                                    }, 'json')
                                })
                                $('#ed_simpanBrand').click(function(){
                                    var nm_brand = $('#ed_nm_brand').val();
                                    var pro_brand = $('#ed_pro_brand').val();
                                    var tgl_lau_brand = $('#ed_tgl_lau').val();
                                    var tgl_penj_brand = $('#ed_tgl_penj').val();
                                    var perkap_ket = $('#ed_perkap_brand').val();
                                    var bb_ket = $('#ed_bb_brand').val();
                                    var url_ins = $('#ed_inst_brand').val();
                                    var url_web = $('#ed_web_brand').val();
                                    var url_gd = $('#ed_gd_brand').val();
                                    var med_iklan = $('#ed_iklan_brand').val();

                                    var dataString = 'nm_brand='+nm_brand+'&pro_brand='+pro_brand+'&perkap_ket='+perkap_ket+'&bb_ket='+bb_ket+
                                    '&url_ins='+url_ins+'&url_web='+url_web+'&url_gd='+url_gd+'&med_iklan='+med_iklan;

                                    
                                })
                            </script>
                    