<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIM Adilaya</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/bootstrap.min.css')?>" />
  <!-- <link rel="stylesheet" href="<?php echo base_url('assets/plugin/font-awesome.min.css')?>" /> -->
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/font-awesome/css/font-awesome.min.css')?>" />
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
  
  <link rel="icon" href="http://sicepat.com/application/websicepat/assets/img/favicon.png">    
  <style>
      .box-nav{
        padding: 5px;
        border-radius: 25px;
        margin: 10px;
        background-color: #f4f8fb;
      }
  </style>
</head>

<body>

<div class="ws-container">
        <div class="ws-header-container" style="height: 83px;margin-top: -5px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-12 text-center">
                        <nav class="navbar visible-sm visible-xs">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#ws-navbar-collapse" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- <button id="hamburger" class="hamburger hamburger--collapse navbar-toggle collapsed" onclick="hamburger()" data-toggle="collapse" data-target="#ws-navbar-collapse" aria-expanded="false" type="button">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button> -->
                                <a class="navbar-brand" href="#">
                                    <img src="<?php echo base_url('assets/image/logo.png')?>" class="main-logo img-responsive">
                                </a>
                                <div class="btn-group ws-cust-login pull-right hidden visible-xs">
                                   
                                </div>
                            </div>
                            <?php if($this->session->userdata('level')=='3' || $this->session->userdata('level')=='2' || $this->session->userdata('level')=='11' || $this->session->userdata('level')=='12'):?>
                            <div id="ws-navbar-collapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav ws-nav-responsive">
                                    <li class=""><a href="<?php echo base_url('Monitor')?>">HOME</a></li>
                                    <li class=""><a href="<?php echo base_url('Monitor')?>">DATA MITRA</a></li>
                                </ul>
                            </div>
                            <?php endif;?>
                        </nav>
                        <a href="#" class="hidden-xs hidden-sm">
                            <img src="<?php echo base_url('assets/image/logo.png')?>" class="main-logo img-responsive">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-10 hidden-sm">
                        <nav class="navbar hidden-xs hidden-sm">
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                  <?php if($this->session->userdata('level')=='3' || $this->session->userdata('level')=='2' || $this->session->userdata('level')=='11' || $this->session->userdata('level')=='12'):?>
                                    <li class=""><a href="<?php echo base_url('Monitor')?>">DATA MITRA</a></li>
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='3' || $this->session->userdata('level')=='12'):?>
                                    <li class=""><a href="<?php echo base_url('Order')?>">DATA ORDER</a></li>
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='4'):?>
                                    <!-- <li class=""><a href="<?php echo base_url('Rnd')?>">DATA R&D</a></li>
                                    <li class=""><a href="<?php echo base_url('Rnd/anggaran')?>">ANGGARAN R&D</a></li> -->
                                    <li class="nav-item dropdown dmenu">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        DIVISI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      </a>
                                      <div class="dropdown-menu sm-menu">
                                        <a class="dropdown-item" href="<?php echo base_url('Rnd')?>">R&D</a>
                                        <a class="dropdown-item" href="<?php echo base_url('Desain')?>">SOSMED</a>
                                      </div>
                                    </li>
                                    <li class="nav-item dropdown dmenu">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        ANGGARAN
                                      </a>
                                      <div class="dropdown-menu sm-menu">
                                        <a class="dropdown-item" href="<?php echo base_url('Rnd/anggaran')?>">R&D</a>
                                        <a class="dropdown-item" href="<?php echo base_url('Desain/anggaran')?>">SOSMED</a>
                                      </div>
                                    </li>
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='4'):?>
                                    <!-- <li class=""><a href="<?php echo base_url('Desain')?>">DATA SOSMED</a></li>
                                    <li class=""><a href="<?php echo base_url('Desain/tim_sosmed')?>">DATA TIM SOSMED</a></li>
                                    <li class=""><a href="<?php echo base_url('Desain/anggaran')?>">ANGGARAN SOSMED</a></li> -->
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='5'):?>
                                    <li class=""><a href="<?php echo base_url('Avbooth')?>">DATA MITRA</a></li>
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='6'):?>
                                    <li class=""><a href="<?php echo base_url('Mapping')?>">DATA MITRA</a></li>
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='7'):?>
                                    <li class=""><a href="<?php echo base_url('Avbb')?>">DATA ORDER</a></li>
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='8'):?>
                                    <li class=""><a href="<?php echo base_url('Vendorbb')?>">DATA ORDER</a></li>
                                    <li class=""><a href="<?php echo base_url('Vendorbb/stok')?>">STOK BAHAN BAKU</a></li>
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='9'):?>
                                    <li class=""><a href="<?php echo base_url('Vendorbooth')?>">DATA BOOTH</a></li>
                                  <?php endif;?>
                                  <?php if($this->session->userdata('level')=='10'):?>
                                    <li class=""><a href="<?php echo base_url('Finance')?>">DATA KELUAR</a></li>
                                    <li class=""><a href="<?php echo base_url('Finance/anggaran')?>">DATA ANGGARAN</a></li>
                                  <?php endif;?>
                                  <!-- <li class=""><a href="<?php echo base_url('Login/logout')?>">LOGOUT</a></li> -->
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-2 col-sm-2 hidden visible-lg">
                        <!-- <img src="http://sicepat.com/application/websicepat/assets/img/contact.png" class="ws-image-contact"/> -->
                        <!-- <div class="btn-group ws-hotline"> -->
                        
                        <!-- <div class="ws-hotline-number">
                            021-5020-0050    
                        </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
  <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/icheck.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
  <!-- <script src="<?php echo base_url('assets/js/app.min.js')?>"></script> -->
  <script src="<?php echo base_url('assets/js/wapp.js?v=6')?>"></script>
  <script src="<?php echo base_url('assets/js/slick.min.js')?>"></script>
</body>

</html>
