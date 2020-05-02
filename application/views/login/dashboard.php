<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIM Adilaya</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/font-awesome/css/font-awesome.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/flag-icon-css/css/flag-icon.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />

</head>

<body>
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!--<span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>-->
          <img class="img-profile rounded-circle" src="<?php echo base_url('assets/bootstrap/image/icno.png')?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <!-- <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
          </a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('Login/logout');?>">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

    </nav>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Yakin keluar ?</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih keluar jika sudah yakin</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo base_url('Login/logout');?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  </div>
</div>
<div class="container" style="background-image: url('<?php echo base_url('assets/bootstrap/image/home.jpg')?>');background-position: center;  background-size: cover;">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">SIM Adilaya</h1>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<div class="row">
<?php if($this->session->userdata('level')=='1' || $this->session->userdata('level')=='2'):?>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <h4 class="text-warning">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Monitor'?>" style="color: black">Marketing</a></div>
              </h4>
            </div>
            <div class="float-right">
              <!-- <p class="card-text text-dark">Orders</p>
              <h4 class="bold-text">656</h4> -->
            </div>
          </div>
          <p class="text-muted">
            <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
          </p>
        </div>
      </div>
    </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='1' || $this->session->userdata('level')=='3'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Monitor'?>" style="color: black">CS</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='4'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'RnD'?>" style="color: black">R&D</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='5'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Avbooth'?>" style="color: black">Admin Vendor Booth</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='6'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Mapping'?>" style="color: black">Mapping</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='7'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Avbb'?>" style="color: black">Admin Vendor Bahan Baku</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='8'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Vendorbb'?>" style="color: black">Vendor Bahan Baku</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='9'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Vendorbooth'?>" style="color: black">Vendor Booth</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='10'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Finance'?>" style="color: black">Finance</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='11'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Monitor'?>" style="color: black">Leader Marketing</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if($this->session->userdata('level')=='12'):?>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-warning">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><a href="<?php echo base_url().'Monitor'?>" style="color: black">Leader CS</a></div>
            </h4>
          </div>
          <div class="float-right">
            <!-- <p class="card-text text-dark">Orders</p> -->
            <!-- <h4 class="bold-text">656</h4> -->
          </div>
        </div>
        <p class="text-muted">
          <!-- <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Product-wise sales -->
        </p>
      </div>
    </div>
  </div>
<?php endif;?>
</div>
<!--<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>-->
 
 
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/login/js/jquery-1.11.3.min.js')?>"></script>
  <script src="<?php echo base_url('assets/login/js/bootstrap.bundle.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/login/js/jquery.easing.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/login/js/sb-admin-2.min.js')?>"></script>
  </body>
</html>