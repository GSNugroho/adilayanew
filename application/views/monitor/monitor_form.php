<?php 
    $this->load->view('mainmenu');
?>	
        <link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css')?>"/>
        <script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js')?>"></script>
        <script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js')?>"></script>
        <script src="<?php echo base_url('assets/datepicker/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js')?>"></script>
        <script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>
        <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
            <!-- <form action="<?php //echo base_url().'monitor/create_action';?>" method="post"> -->
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Data Mitra</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Identitas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Outlet</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Pengiriman</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Jenis Pembayaran</a></li>
                  <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                      Dropdown <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                      <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                      <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
                    </div>
                  </li> -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        <label for="nm_mitra">Nama Mitra </label> <?php echo form_error('nm_mitra')?>
                        <input class="form-control" type="text" name="nm_mitra" id="nm_mitra" style="width: 80%;" value="<?php //echo $nm_mitra?>">
                    </div>
                    <table width='80%'>
                        <tr>
                            <td width='10%'>
                            <div class="form-group">
                                <label for="tgl_terima">Kota & Tanggal Lahir </label> <?php echo form_error('tgl_lahir') ?>
                                    <input class="form-control" type="text" name="kt_lahir" id="kt_lahir" placeholder="Kota">
                                </div>
                            </td>
                            <td width='40%'>
                            <div class="form-group">
                                <label style="height: 17px;"></label>
                                <input class="form-control" type="text" name="tgl_lahir" id="tgl_lahir" placeholder="dd-mm-yyyy" >
                            </div>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <label for="almt_rmh">Alamat Rumah</label> <?php echo form_error('almt_rmh') ?>
                        <input class="form-control" type="text" name="almt_rmh" id="almt_rmh" style="width: 80%;">
                    </div>
                    <table width='80%'>
                        <tr>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi" style="width: 100%;">
                                        <option value="0">Pilih</option>
                                    <?php
                                    foreach ($dd_pr as $row) {  
                                        echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                        }
                                        echo"
                                    </select>"
                                    ?>
                                <div>
                            </td>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                        <select class="form-control" name="almt_kt_rmh" id="almt_kt_rmh" style="width: 100%;">
                                            <option value="0">Pilih</option>
                                        </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="no_hp1">Nomor Handphone</label>
                                    <input class="form-control" name="no_hp1" id="no_hp1" style="width: 100%">
                                </div>
                            </td>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="no_hp2">Nomor Handphone</label>
                                    <input class="form-control" name="no_hp2" id="no_hp2" style="width: 100%">
                                </div>
                            </td>
                        </tr>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="form-group">
                            <label for="almt_outlet">Alamat Outlet</label> <?php echo form_error('almt_outlet') ?>
                            <input class="form-control" type="text" name="almt_outlet" id="almt_outlet" style="width: 80%;">
                    </div>
                    <table width='80%'>
                        <tr>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi2" style="width: 100%;">
                                        <option value="0">Pilih</option>
                                    <?php
                                    foreach ($dd_pr as $row) {  
                                        echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                        }
                                        echo"
                                    </select>"
                                    ?>
                                </div>
                            </td>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                    <select class="form-control" name="almt_kt_outlet" id="almt_kt_outlet" style="width: 100%;">
                                        <option value="0">Pilih</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <input type="radio" name="cek2" id="cek3" value="1"> Seperti Alamat Rumah
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <div class="form-group">
                            <label for="almt_kirim">Alamat Kirim</label> <?php echo form_error('almt_kirim') ?>
                            <input class="form-control" type="text" name="almt_kirim" id="almt_kirim" style="width: 80%;">
                    </div>
                    <table width='80%'>
                        <tr>
                            <td width='50%'>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi3" style="width: 100%;">
                                        <option value="0">Pilih</option>
                                    <?php
                                    foreach ($dd_pr as $row) {  
                                        echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                        }
                                        echo"
                                    </select>"
                                    ?>
                                </div>
                            </td>
                            <td width='50%'>                               
                                <div class="form-group">
                                    <label for="almt_kt_rmh">Kota</label> <?php echo form_error('almt_kt_rmh') ?>
                                    <select class="form-control" name="almt_kt_kirim" id="almt_kt_kirim">
                                        <option value="0">Pilih</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <input type="radio" name="cek" id="cek1" value="1"> Seperti Alamat Rumah
                        &nbsp&nbsp
                        <input type="radio" name="cek" id="cek2" value="2"> Seperti Alamat Outlet
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="penerusan" id="penerusan">&nbsp&nbsp Penerusan Alamat
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
                                    <select class="form-control" name="prov_terusan" id="prov_terusan" style="width: 100%;" disabled>
                                        <option value="0">Pilih</option>
                                        <?php
                                        foreach ($dd_pr as $row) {  
                                            echo "<option value='".$row->id_provinsi."' >".$row->nama_provinsi."</option>";
                                            }
                                            echo"
                                        </select>"
                                        ?>
                                </div>
                            </td>
                            <td width='50%'>
                            <div class="form-group">
                                <label for="kt_terusan">Kota</label> 
                                <select class="form-control" name="kt_terusan" id="kt_terusan" disabled>
                                    <option value="0">Pilih</option>
                                </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <input type="radio" name="cekter" id="cekter1" value="1"> Seperti Alamat Rumah
                        &nbsp&nbsp
                        <input type="radio" name="cekter" id="cekter2" value="2"> Seperti Alamat Outlet
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_4">
                    <div class="form-group">
                        <label for="nm_marketing">Nama Marketing</label>
                        <input class="form-control" type="text" name="nm_marketing" id="nm_marketing" style="width: 80%">
                    </div>
                    <div class="form-group">
                        <label for="pembayaran">Pembayaran</label><br>
                        <!-- <input type="radio" name="sts_pmby" id="sts_pmby1" value="1"> DP
                        <input type="radio" name="sts_pmby" id="sts_pmby2" value="2"> Lunas -->
                        <select class="form-control" name="sts_pmby" id="sts_pmby" style="width: 80%">
                            <option value="1">DP</option>
                            <option value="2">Lunas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nm_produk">Nama Produk</label>
                        <select class="form-control" name="nm_produk" id="nm_produk" style="width: 80%">
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
                        <select class="form-control" name="paket" id="paket" style="width: 80%">
                            <option value="0">Pilih</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jml_tarif">Jumlah Transfer</label>
                        <input class="form-control" type="text" name="jml_tarif" id="jml_tarif" style="width: 80%;">
                    </div>
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
                        <input class="form-control" type="text" name="ats_nm_rekening" id="ats_nm_rekening" placeholder="Atas Nama" style="width: 80%;">
                    </div>
                    <button class="btn btn-primary" id="tambah" value="tambah" onclick="tm_bank()">Tambah</button>
                    <br>
                    <div class="form-group">
                            <label for="almt_outlet">Data Bank</label> <?php echo form_error('almt_outlet') ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableBank" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Nama Bank</th>
                                      <th>Jumlah Transfer</th>
                                      <th>No. Rekening</th>
                                      <th>Atasnama</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                </table>
                              </div>
                    </div>
                    <script>
                        table = $('#tableBank').DataTable({
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
                                'url': '<?php echo base_url('monitor/tmp_bank')?>',
                            },
                            'columns': [
                                {
                                    data: 'nm_bank'
                                },
                                {
                                    data: 'jml_transfer'
                                },
                                {
                                    data: 'no_rekening'
                                    //  render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                },
                                {
                                    data: 'ats_nm',
                                    // render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                },
                                {
                                    data: 'aksi'
                                }
                            ]
                        });

                        function tm_bank(){
                            var jml_tarif = $('#jml_tarif').val();
                            var nm_bank = $('#nm_bank option:selected').val();
                            var no_rekening = $('#rekening').val();
                            var ats_nm = $('#ats_nm_rekening').val();

                            var dataString = 'jml_trf='+jml_tarif+'&nm_bank='+nm_bank+'&no_rekening='+no_rekening+'&ats_nm='+ats_nm;
                            $.ajax({
                                type: 'post',
                                url: '<?php echo base_url('monitor/tb_bank')?>',
                                data: dataString,
                                success: function(){
                                    $('#tableBank').DataTable().ajax.reload();
                                    document.getElementById('jml_tarif').value = '';
                                    document.getElementById('nm_bank').value = '0';
                                    document.getElementById('rekening').value = '';
                                    document.getElementById('ats_nm_rekening').value = '';
                                }
                            })
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
                                    </select>"
                                ?>
                                </div>
                            </td>
                            <td width='50%'>             
                                <div class="form-group">
                                    <label for="biaya_kirim">Biaya Kirim</label>
                                    <input class="form-control" type="text" name="biaya_kirim" id="biaya_kirim" style="width: 100%;">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <label for="tambahan">Tambahan</label>
                        <input class="form-control" type="text" name="tambahan" id="tambahan" style="width: 80%;">
                    </div>
                    <button type="submit" class="btn btn-success" id="simpan" onclick="alert()">Simpan</button>
                    <a href="<?php echo site_url('monitor') ?>" class="btn btn-danger">Batal</a>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- </form> -->
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>

        <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Adilaya 2020</span>
          </div>
        </div>
      </footer>
	  <!-- End of Footer -->
		</div>
      </div>
      
        
        <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
        
        <script src="<?php echo base_url('assets/js/jquery-ui.js')?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>
        <script>
	  $('#tgl_lahir').datetimepicker({
		locale: 'id',
		format: 'DD-MM-YYYY'
	});

        $(document).ready(function(){
            $('#nm_produk').change(function(){
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
                        $('#paket').html(html);
                        
                    }
                });
            });
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
                    $('#almt_kt_rmh').html(html);
                     
                }
            });
        });
    });
            $(document).ready(function(){
        $('#provinsi2').change(function(){
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
                    $('#almt_kt_outlet').html(html);
                     
                }
            });
        });
    });
            $(document).ready(function(){
        $('#provinsi3').change(function(){
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
                        html += '<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
                    }
                    $('#kt_terusan').html(html);
                     
                }
            });
        });
    });

    var rupiah = document.getElementById('jml_tarif');
    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp ');
    });

    function formatRupiah(angka, prefix){
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



    var kirim = document.getElementById('biaya_kirim');
    kirim.addEventListener('keyup', function(e){
        kirim.value = formatRupiahKirim(this.value, 'Rp ');
    });

    function formatRupiahKirim(angka, prefix){
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
    //kirim
    $(document).ready(function(){
        $('#cek1').change(
            function(){
                if($(this).is(':checked')){
                    var almt = document.getElementById('almt_rmh').value;
                    document.getElementById('almt_kirim').value = almt;
                    document.getElementById('almt_kirim').disabled  = true;
                    $('#provinsi3').val($('#provinsi option:selected').val());
                    $('#provinsi3').prop('disabled', 'disabled');
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
    //outlet
    $(document).ready(function(){
        $('#cek3').change(
            function(){
                if($(this).is(':checked')){
                    var almt = document.getElementById('almt_rmh').value;
                    document.getElementById('almt_outlet').value = almt;
                    document.getElementById('almt_outlet').disabled = true;
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

    $(document).ready(function(){
        $('#cekter2').change(
            function(){
                if($(this).is(':checked')){
                    var almt = document.getElementById('almt_outlet').value;
                    document.getElementById('almt_terusan').value = almt;
                    document.getElementById('almt_terusan').disabled  = true;
                    $('#prov_terusan').val($('#provinsi2 option:selected').val());
                    $('#prov_terusan').prop('disabled', 'disabled');
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
                                $('#kt_terusan').html(html);
                                $('#kt_terusan').val($('#almt_kt_outlet option:selected').val());
                                $('#kt_terusan').prop('disabled', 'disabled');
                            }
                        });
                    }
                }
            }
        )
    })

    $(document).ready(function(){
        $('#cekter1').change(
            function(){
                if($(this).is(':checked')){
                    var almt = document.getElementById('almt_rmh').value;
                    document.getElementById('almt_terusan').value = almt;
                    document.getElementById('almt_terusan').disabled = true;
                    $('#prov_terusan').val($('#provinsi option:selected').val());
                    $('#prov_terusan').prop('disabled', 'disabled');
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
                                $('#kt_terusan').html(html);
                                $('#kt_terusan').val($('#almt_kt_rmh option:selected').val());
                                $('#kt_terusan').prop('disabled', 'disabled');
                            }
                        });
                    }
                }
            }
        )
    })

    $(document).ready(function(){
        $('#penerusan').on('click', function(){
            if($('#penerusan').is(':checked')){
                $('#almt_terusan').prop('disabled', false);
                $('#prov_terusan').prop('disabled', false);
                $('#kt_terusan').prop('disabled', false);
                console.log('a');
            }else{
                $('#almt_terusan').prop('disabled', true);
                $('#prov_terusan').prop('disabled', true);
                $('#kt_terusan').prop('disabled', true);
                $('#almt_terusan').val('');
                $('#prov_terusan').val('0');
                $('#kt_terusan').val('0');
                console.log('b');
            }
        })
    })

    $(document).ready(function(){
        $('#rek2').on('click', function(){
            if($('#rek2').is(':checked')){
                $('#jml_tarif2').prop('disabled', false);
                $('#nm_bank2').prop('disabled', false);
                $('#rekening2').prop('disabled', false);
                $('#ats_nm_rekening2').prop('disabled', false);
                console.log('cek');
            }else{
                $('#jml_tarif2').prop('disabled', true);
                $('#nm_bank2').prop('disabled', true);
                $('#rekening2').prop('disabled', true);
                $('#ats_nm_rekening2').prop('disabled', true);
                console.log('discek');
            }
        })
    })

    function alert(){
        Swal.fire({
            title: "Data Mitra",
            html: '<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 100%"><tr><td align="left" width=35%>Nama Mitra</td><td width=5%>:</td><td align="left">'+$('#in_nm_mitra').val()+
            '</td></tr><tr><td align="left">Kota, Tanggal Lahir</td><td>:</td><td align="left">'+$('#in_kt_lahir').val()+', '+$('#in_tgl_lahir').val()+
            '</td></tr><tr><td align="left">Alamat Rumah</td><td>:</td><td align="left"> '+$('#in_almt_rmh').val()+
            '</td></tr><tr><td align="left">Provinsi</td><td>:</td><td align="left"> '+$('#in_provinsi option:selected').html()+
            '</td></tr><tr><td align="left">Kota</td><td>:</td><td align="left"> '+$('#in_almt_kt_rmh option:selected').html()+
            '</td></tr><tr><td align="left">No HP</td><td>:</td><td align="left">'+ $('#in_no_hp1').val()+
            '</td></tr><tr><td align="left">No HP</td><td>:</td><td align="left">'+ $('#in_no_hp2').val()+
            '</td></tr></table><br>'+
            '<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 100%"><tr><td align="left" width=35%>Status Pembayaran</td><td width=5%>:</td><td align="left"> '+$('#in_sts_pmby option:selected').html()+
            '</td></tr><tr><td align="left">Nama Produk</td><td>:</td><td align="left"> '+$('#in_nm_produk option:selected').html()+
            '</td></tr><tr><td align="left">Paket</td><td>:</td><td align="left"> '+$('#in_paket option:selected').html()+
            '</td></tr><tr><td align="left">Jumlah Transfer</td><td>:</td><td align="left"> '+$('#in_jml_tarif').val()+
            '</td></tr><tr><td align="left">Bank</td><td>:</td><td align="left"> '+$('#in_nm_bank option:selected').html()+
            '</td></tr><tr><td align="left">No Rekening</td><td>:</td><td align="left"> '+$('#in_rekening').val()+
            '</td></tr><tr><td align="left">Alamat Outlet</td><td>:</td><td align="left"> '+$('#in_almt_outlet').val()+
            '</td></tr><tr><td align="left">Provinsi</td><td>:</td><td align="left"> '+$('#in_provinsi2 option:selected').html()+
            '</td></tr><tr><td align="left">Kota</td><td>:</td><td align="left"> '+$('#in_almt_kt_outlet option:selected').html()+
            '</td></tr></table><br>'+
            '<table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:3px black solid;width: 100%"><tr><td align="left" width=35%>Atas Nama</td><td width=5%>:</td><td align="left"> '+$('#in_ats_nm_rekening').val()+
            '</td></tr><tr><td align="left">Alamat Kirim</td><td>:</td><td align="left"> '+$('#in_almt_kirim').val()+
            '</td></tr><tr><td align="left">Provinsi</td><td>:</td><td align="left"> '+$('#in_provinsi3 option:selected').html()+
            '</td></tr><tr><td align="left">Kota</td><td>:</td><td align="left"> '+$('#in_almt_kt_kirim option:selected').html()+
            '</td></tr><tr><td align="left">Ekspedisi</td><td>:</td><td align="left"> '+$('#in_ekspedisi option:selected').html()+
            '</td></tr><tr><td align="left">Biaya Kirim</td><td>:</td><td align="left"> '+$('#in_biaya_kirim').val()+
            '</td></tr><tr><td align="left">Tambahan</td><td>:</td><td align="left"> '+$('#in_tambahan').val()+
            '</td></tr></table>',
            showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Kirim'
        }).then((result) => {
            if (result.value) {
                console.log('Sukses');
                simpan();
            }
            })
    }

    function simpan(){
        var nm_mitra = $('#nm_mitra').val();
        var kt_lahir = $('#kt_lahir').val();
        var tgl_lahir = $('#tgl_lahir').val();
        var almt_rmh = $('#almt_rmh').val();
        var almt_prov_rmh =$('#provinsi option:selected').val();
        var almt_kt_rmh =$('#almt_kt_rmh option:selected').val();
        var no_hp1 = $('#no_hp1').val();
        var no_hp2 = $('#no_hp2').val();
        var almt_outlet = $('#almt_outlet').val();
        var almt_prov_outlet = $('#provinsi2 option:selected').val();
        var almt_kt_outlet = $('#almt_kt_outlet option:selected').val();
        var almt_kirim = $('#almt_kirim').val();
        var almt_prov_kirim = $('#provinsi3 option:selected').val();
        var almt_kt_kirim = $('#almt_kt_kirim option:selected').val();
        // var radios = document.getElementsByName('sts_pmby');

        // for (var i = 0, length = radios.length; i < length; i++) {
        // if (radios[i].checked) {
        //     // do whatever you want with the checked radio
        //     // alert(radios[i].value);
        //     var sts_pmby = radios[i].value;

        //     // only one radio can be logically checked, don't check the rest
        //     break;
        // }

        var sts_pmby = $('#sts_pmby option:selected').val();
        
        var nm_produk = $('#nm_produk option:selected').val();
        var paket = $('#paket option:selected').val();
        var jml_tarif = $('#jml_tarif').val();
        var nm_bank = $('#nm_bank option:selected').val();
        var rekening = $('#rekening').val();
        var ats_nm_rekening = $('#ats_nm_rekening').val();
        var ekspedisi = $('#ekspedisi option:selected').val();
        var biaya_kirim = $('#biaya_kirim').val();

        var dataString = 'nm_mitra='+nm_mitra+'&kt_lahir='+kt_lahir+'&tgl_lahir='+tgl_lahir+'&almt_rmh='+almt_rmh+
        '&almt_prov_rmh='+almt_prov_rmh+'&almt_kt_rmh='+almt_kt_rmh+'&no_hp1='+no_hp1+'&no_hp2='+no_hp2+'&almt_outlet='+almt_outlet+
        '&almt_prov_outlet='+almt_prov_outlet+'&almt_kt_outlet='+almt_kt_outlet+'&almt_kirim='+almt_kirim+'&almt_prov_kirim='+almt_prov_kirim+
        '&almt_kt_kirim='+almt_kt_kirim+'&sts_pmby='+sts_pmby+'&nm_produk='+nm_produk+'&paket='+paket+'&jml_tarif='+jml_tarif+'&nm_bank='+nm_bank+'&rekening='+rekening+
        '&ats_nm_rekening='+ats_nm_rekening+'&ekspedisi='+ekspedisi+'&biaya_kirim='+biaya_kirim;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Monitor/create_action')?>',
            data: dataString,
            success: function(){
                console.log('yee');
                Swal.fire({
                    title: 'Sukses',
                    text: "Data Berhasil Disimpan!",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                    }).then((result) => {
                    if (result.value) {
                        window.location.href = "<?php echo base_url('Monitor')?>";
                    }
                })
            }
        })
        // }
    }
        </script>
        </body>
</html>