<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Adilaya</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/font-awesome/css/font-awesome.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')?>" />
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
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
</head>

<body>
  <div id="login">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container" style="margin-top: 10%;">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
              <h3 class="card-title text-center mb-3" style="color: #d0021b;font-weight:bold"><img src='<?php echo base_url('assets/icon/login-rounded-right.png')?>' width='25' height='25'>&nbsp;&nbsp;Welcome</h3>
              <form method="POST" action="<?php echo base_url('Login/auth')?>" autocomplete="off">
                <div class="input-group" style="margin-left: 20%">
                  <span class="input-group-addon" style="border-radius:6px 0 0 6px"><img src='<?php echo base_url('assets/icon/34-349693_circled-user-icon-transparent-background-username-icon-hd.png')?>' width='20' height='20'></span>
                  <input type="text" class="form-control" placeholder="Username" name="username" id="username" style="margin-left: -5px; width:60%; border-radius:0 6px 6px 0">
                </div>
                <br>
                <div class="input-group" style="margin-left: 20%">
                  <span class="input-group-addon" style="border-radius:6px 0 0 6px"><img src='<?php echo base_url('assets/icon/this-is-a-graphic-reation-of-a-pad-lock-username-and-password-icon-115534595184fsadfncq6.png')?>' width='20' height='20'></span>
                  <input type="password" class="form-control" placeholder="Password" name="pass" id="pass" style="margin-left: -5px; width:60%; border-radius:0 6px 6px 0">
                </div>
                <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-danger" style="float: center;padding-left:10%;padding-right:10%;margin-left:40%;">Login</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
			document.getElementById('username').focus();
		</script>
  <script src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js')?>"></script>
</body>

</html>
