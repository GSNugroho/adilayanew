<div class="ws-footer-page" style="margin-top: 5%;">
    <div class="ws-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url('assets/image/logo_a.png')?>" width="58" height="51">
                    <i class="fa fa-copyright"></i> 2020 Adilaya. All rights reserved.
                    <p style="margin-left: 20%; margin-top:-10px">a place we call home.</p>
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <p style="float: right">You currently logged in on <b><u><i><?php echo $this->session->userdata('username')?></i></u></b></p>
                    <br>
                    <br>
                    <p style="float:right"><u><a href="<?php echo base_url('Login/logout')?>" style="color: #fff;">Logout</a></u></p>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12"><div class="ws-footer-divider"></div></div>
            </div>
        </div>
    </div>
</div>


</div>
</body>
</html>