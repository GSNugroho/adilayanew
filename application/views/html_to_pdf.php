<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/blue.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/dataTables.bootstrap.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/responsive.bootstrap.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/fixedHeader.bootstrap.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/bootstrap-slider.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/app.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/_all-skins.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/wapp.css?v=10')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/index.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/slick.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/slick-theme.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/style.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/hamburger.css')?>" />
</head>
<body>
<div class="ws-container">
        <div class="ws-header-container" style="height: 83px;margin-top: -5px;">
            <div class="container">
                <div class="row">
                <div class="col-lg-8 col-md-10 hidden-sm">
                        <nav class="navbar hidden-xs hidden-sm">
                            <div class="collapse navbar-collapse">
                                
                            </div>
                        </nav>
                    </div>
                </div>
<?php foreach($dt_mitra as $row){?>
<table class="table table-bordered table-striped">
    <tr>
        <th style="width: 25%" align="left">Nama Mitra</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->nm_mitra?></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Alamat Kirim</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_kirim?></p></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Provinsi</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_prov_kirim?></p></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Kota</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_kt_kirim?></p></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Kecamatan</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_kec_kirim?></p></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Kelurahan</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_kel_kirim?></p></td>
    </tr>
</table>
<br>
<?php }?>
<table class="table table-bordered" border="1" style="width: 100%;">
    <tr>
        <th width="10%">No</th>
        <th width="30%">Nama Barang</th>
        <th width="20%">Jumlah</th>
        <th width="20%">Harga</th>
        <th width="20%">Total</th>
    </tr>
    <?php
        $i = 0;
        $totka = 0;
        foreach($dt_order as $row){
            $i++;
            $total = $row->harga_barang * $row->jml_barang;
            $totka += $totka+$total;
    ?>
         <tr>
            <td align="center"><?php echo $i?></td>
            <td><?php echo $row->nm_barang?></td>
            <td><?php echo $row->jml_barang?></td>
            <td><?php echo 'Rp '.number_format($row->harga_barang, 2, ",", ".")?></td>
            <td><?php echo 'Rp '.number_format($total, 2, ",", ".")?></td>
        </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan="4" style="width: 25%" align="right">Total Order</td>
        <td ><?php echo'Rp '.number_format($totka, 2, ",", ".")?></td>
    </tr>
</table>
</body>
</html>