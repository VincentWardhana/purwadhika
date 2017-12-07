    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="border:none">
        <div class="container-fluid" style="font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;background:#FFF;border:none">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/web-logo-purwadhika.png" style="width:180px;"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url()."program"; ?>" style="color:#000">Programs</a>
                    </li>
					<?php
					if ($_SESSION['memberid'] != "")
					{
					?>
					<li>
                        <a href="<?php echo base_url()."paymentconfirmation"; ?>" style="color:#000">Confirmation</a>
                    </li>
					<li>
                        <a href="<?php echo base_url()."profile"; ?>" style="color:#000">Profile</a>
                    </li>
					<?php
					}
					?>
					<?php
					if ($_SESSION['memberid'] == "")
					{
					?>
					<li>
                        <a href="<?php echo base_url()."signup"; ?>" style="color: #000">Sign Up</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()."signin"; ?>" style="color:#000">Sign In</a>
                    </li>
					<?php
					}
					else
					{
					?>
					<li>
                        <a href="<?php echo base_url()."logout"; ?>" style="color: #000">Logout</a>
                    </li>
					<?php
					}
					?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>