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

    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;
    }

    /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
    .active, .accordion:hover {
        background-color: #ccc;
    }

    /* Style the accordion panel. Note: hidden by default */
    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    .accordion:after {
        content: '\02795'; /* Unicode character for "plus" sign (+) */
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2796"; /* Unicode character for "minus" sign (-) */
    }
</style>

<div class="ws-main-content">
    <div class="check-awb-container">
        <div class="title">
            <img class="check-awb-icon" src="<?php echo base_url('assets/icon/cam.svg')?>" style="margin-right: 17px;margin-bottom: 4px;">
            KEGIATAN SOSMED
        </div>
    </div>
    <div class="check-awb-content" style="margin-top:5%;">
        <div class="container">
            <div class="check-awb-wrapper">   
                <div class="awb-input-field">   
                    <div class="row ">
                        <div class="col-md-12">
                            <button style="height: 36px" class="btn btn-dark" data-toggle="modal" data-target="#inputMedsos"  data-keyboard="false" data-backdrop="static" >Tambah Kegiatan</button>
                                <br>
                                <br>
                                <?php 
                                    foreach($dt_tgl as $row){
                                        echo '
                                        <button class="accordion" value="'.$row[4].''.$row[5].'" id="'.$row[4].''.$row[5].'">'.$row.'</button>
                                        <div class="panel">
                                            <table id="todo-'.$row[4].''.$row[5].'" class="table table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Tanggal</th>
                                                        <th>Brand</th>
                                                        <th>Konsep Foto</th>
                                                        <th>Hasil Foto</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        ';
                                    }
                                ?>
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
                    var acc = document.getElementsByClassName("accordion");
                    var i;

                    for (i = 0; i < acc.length; i++) {
                    
                    acc[i].addEventListener("click", function() {
                        id = this.id;
                        this.classList.toggle("active");
                        initiateTable(id);
                        console.log(id)

                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                        } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                        } 
                        
                    });
                    }

                    function initiateTable(id){
                        console.log(id);
                        var table = $("#todo-" + id).DataTable({
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
                                'processing': true,
                                'serverSide': true,
                                'serverMethod': 'post',
                                'searching': false,
                                "paging":   false,
                                'ajax': {
                                        'url':'<?php echo base_url().'Desain/dt_tbl'?>',
                                        'data': function(data){
                                            data.id_tgl = id;
                                        }
                                    },
                                'columns': [
                                    { data: 'nm_medsos' },
                                    { data: 'tgl_medsos'},
                                    { data: 'pro_medsos' },
                                    { data: 'konsep_medsos' },
                                    { data: 'hasil_medsos' },
                                    { data: 'action' }
                                ],
                                "destroy": true,
                                "bFilter": true
                        });
                    }
                </script>

                <div class="modal fade" id="inputMedsos" tabindex="-1" role="dialog" aria-labelledby="inputMedsosLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" aria-label="Close" onclick="tutup()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Data Medsos</h3>
                                </div>
                                <form id="input_medsos">
                                <div class="form-group">
                                    <label for="in_nm_medsos">Nama</label>
                                    <input class="form-control" type="text" name="in_nm_medsos" id="in_nm_medsos" style="width: 80%;">
                                </div>
                                <div class="form-group">
                                    <label for="in_tgl_medsos">Tanggal</label>
                                    <input class="form-control" type="text" name="in_tgl_medsos" id="in_tgl_medsos" placeholder="dd-mm-yyyy" style="width: 80%;">
                                </div>
                                <div class="form-group">
                                    <label for="in_pro_medsos">Brand</label>
                                    <br>
                                    <select class="select2-A brand" name="in_pro_medsos" id="in_pro_medsos" style="width: 80%;">
                                        <?php 
                                            echo '<option></option>';
                                            foreach ($dt_pro as $row){
                                                echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                            }
                                            echo"
                                            </select>"
                                        ?>
                                    </select>
                                </div>
                                </form>
                                <div class="form-group">
                                    <label for="in_konsep_medsos">Konsep Foto</label>
                                    <div class="dropzone" id="konsep_fo">
                                        <div class="dz-message">
                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="in_hasil_medsos">Hasil Foto</label>
                                    <div class="dropzone" id="hasil_fo">
                                        <div class="dz-message">
                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" id="simpanMedsos" style="color: white;">Simpan</button>
                                <button type="button" id="close" class="btn btn-danger" onclick="tutup()">Batal</button>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    Dropzone.autoDiscover = false;

                    var foto_upload1= new Dropzone("#konsep_fo",{
                        url: "<?php echo base_url('Desain/proses_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });

                    var foto_upload2= new Dropzone("#hasil_fo",{
                        url: "<?php echo base_url('Desain/proses_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });

                    foto_upload1.on("sending",function(a,b,c){
                        a.token='konsep';
                        c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                    });
                    foto_upload2.on("sending",function(a,b,c){
                        a.token='hasil';
                        c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                    });

                    $(".brand").select2({
                    dropdownParent: $('.modal-body', '#inputMedsos'),
                    placeholder: "Pilih Brand",
                    allowClear: true
                    });

                    $('#in_tgl_medsos').datetimepicker({
                        locale: 'id',
                        format: 'DD-MM-YYYY'
                    });

                    function tutup(){
                        dz = document.getElementsByClassName('dropzone');
                        for (i = 0; i < dz.length; i++) {
                        $('.dropzone')[i].dropzone.files.forEach(function(file) { 
                            file.previewElement.remove(); 
                        });
                        }
                        $('.dropzone').removeClass('dz-started');
                        $("#input_medsos").trigger("reset");
                        document.getElementById('in_pro_medsos').value = '';
                        $('#inputMedsos').modal('hide');
                    }

                    $('#simpanMedsos').click(function(event){
                        var nm_medsos = $('#in_nm_medsos').val();
                        var tgl_medsos = $('#in_tgl_medsos').val();
                        var pro_medsos = $('#in_pro_medsos').val();

                        var dataString = 'nm_medsos='+nm_medsos+'&tgl_medsos='+tgl_medsos+'&pro_medsos='+pro_medsos;

                        $.post("<?php echo base_url();?>Desain/create_action", dataString, function(data){
                            foto_upload1.processQueue();
                            foto_upload2.processQueue();
                            dz = document.getElementsByClassName('dropzone');
                            for (i = 0; i < dz.length; i++) {
                                $('.dropzone')[i].dropzone.files.forEach(function(file) { 
                                    file.previewElement.remove(); 
                                });
                            }
                            $('.dropzone').removeClass('dz-started');
                            $("#input_medsos").trigger("reset");
                            document.getElementById('in_pro_medsos').value = '0';
                            $('#inputMedsos').modal('hide');
                        })
                    })
                </script>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="editMedsos" tabindex="-1" role="dialog" aria-labelledby="editMedsosLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" aria-label="Close" onclick="tup()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Data Medsos</h3>
                                </div>
                                <form id="input_medsos">
                                <div class="form-group">
                                    <label for="ed_nm_medsos">Nama</label>
                                    <input class="form-control" type="text" name="ed_nm_medsos" id="ed_nm_medsos" style="width: 80%;" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="ed_tgl_medsos">Tanggal</label>
                                    <input class="form-control" type="text" name="ed_tgl_medsos" id="ed_tgl_medsos" placeholder="dd-mm-yyyy" style="width: 80%;" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="ed_pro_medsos">Brand</label>
                                    <br>
                                    <select class="select2-A produk" name="ed_pro_medsos" id="ed_pro_medsos" style="width: 80%;" readonly>
                                        <?php 
                                            echo '<option></option>';
                                            foreach ($dt_pro as $row){
                                                echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                            }
                                            echo"
                                            </select>"
                                        ?>
                                    </select>
                                </div>
                                </form>
                                <div class="form-group">
                                    <label for="dt_fo_booth">Konsep Foto Sebelumnya</label>
                                    <div class="ed_foto" >
                                        <div class="dz-message" id="if_kon_fo">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ed_konsep_medsos">Konsep Foto</label>
                                    <div class="dropzone" id="ed_konsep_fo">
                                        <div class="dz-message">
                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dt_fo_booth">Hasil Foto Sebelumnya</label>
                                    <div class="ed_foto" >
                                        <div class="dz-message" id="if_has_fo">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ed_hasil_medsos">Hasil Foto</label>
                                    <div class="dropzone" id="ed_hasil_fo">
                                        <div class="dz-message">
                                            <h3 style="color: #7c8efc">Klik Atau Drop Gambar Disini</h3>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="ed_kd_medsos" name="ed_kd_medsos">
                                <button type="submit" class="btn btn-success" id="ed_simpanMedsos" style="color: white;">Simpan</button>
                                <button type="button" id="close" class="btn btn-danger" onclick="tup()">Batal</button>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function tup(){
                        $('#editMedsos').modal('hide');
                    }

                    $(".produk").select2({
                    dropdownParent: $('.modal-body', '#editMedsos'),
                    placeholder: "Pilih Brand",
                    allowClear: true
                    });

                    $('#ed_tgl_medsos').datetimepicker({
                        locale: 'id',
                        format: 'DD-MM-YYYY'
                    });

                    $('#editMedsos').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this)
                            var dataString = 'id='+recipient
                            $.get("<?php echo base_url();?>Desain/edit_medsos", dataString, function(data){
                            $('#ed_kd_medsos').val(data[0].kd_medsos);                                 
                            $('#ed_nm_medsos').val(data[0].nm_medsos);                                 
                            $('#ed_tgl_medsos').val(data[0].tgl);
                            $('#ed_pro_medsos').val(data[0].pro_medsos);
                            $('#ed_pro_medsos').trigger('change');
                            var foko = 'id='+ data[0].kd_medsos;
                            $.get("<?php echo base_url();?>Desain/get_ed_foto_konsep", foko, function(html){
                                $('#if_kon_fo').html(html);
                            })
                            var foha = 'id='+ data[0].kd_medsos;
                            $.get("<?php echo base_url();?>Desain/get_ed_foto_hasil", foha, function(html){
                                $('#if_has_fo').html(html);
                            })
                        }, 'json')
                    })
                    
                    Dropzone.autoDiscover = false;

                    var foto_upload3= new Dropzone("#ed_konsep_fo",{
                        url: "<?php echo base_url('Desain/proses_ed_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });

                    var foto_upload4= new Dropzone("#ed_hasil_fo",{
                        url: "<?php echo base_url('Desain/proses_ed_upload') ?>",
                        maxFilesize: 2,
                        method:"post",
                        acceptedFiles:"image/*",
                        paramName:"userfile",
                        dictInvalidFileType:"Type file ini tidak dizinkan",
                        addRemoveLinks:true,
                        autoProcessQueue: false
                        });


                    $('#ed_simpanMedsos').click(function(event){
                        var kd_medsos = $('#ed_kd_medsos').val();
                        var dataString = 'kd_medsos='+kd_medsos;
                        foto_upload3.on("sending",function(a,b,c){
                            a.token='konsep,'+kd_medsos;
                            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                        });
                        foto_upload4.on("sending",function(a,b,c){
                            a.token='hasil,'+kd_medsos;
                            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                        });

                        $.post("<?php echo base_url();?>Desain/update_action", dataString, function(data){
                            
                            foto_upload3.processQueue();
                            foto_upload4.processQueue();
                            dz = document.getElementsByClassName('dropzone');
                            for (i = 0; i < dz.length; i++) {
                                $('.dropzone')[i].dropzone.files.forEach(function(file) { 
                                    file.previewElement.remove(); 
                                });
                            }
                            $('.dropzone').removeClass('dz-started');
                            // $("#input_medsos").trigger("reset");
                            document.getElementById('in_pro_medsos').value = '0';
                            $('#editMedsos').modal('hide');
                        })
                    })
                </script>