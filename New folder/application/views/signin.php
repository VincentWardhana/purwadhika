<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika - Sign In</title>

    <?php include "loadfilesheader.php" ?>

</head>

<body>

    <!-- Navigation -->
    <?php include "navbar.php" ?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <!-- <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </header> -->

    <!-- Main Content -->
    <div class="container" style="margin-top:60px;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;">
        
        <div class="row" style="">
            <div class="col-lg-12" style="padding:0">
                <div class="col-lg-6 col-lg-offset-3">
                    <center>
                        <h1 style="font-weight: 100;letter-spacing: 3px;font-size: 50px">
                            Sign In Form
                        </h1 style="font-weight: 100;letter-spacing: 3px;font-size: 50px">

                        <br><br><br>

                    </center>
                    <form method="post" action="<?php echo base_url()."signinproc"; ?>">
                        <input type="text" name="email" placeholder="Email Address" class="form-control" required><br>
                        <input type="password" name="password" placeholder="Password" class="form-control" required><br>
                        <?php
						if ($this->session->flashdata('memberidfail')!="")
						{
						?>
							<span style="color:#FF0000;font-size:12"><?php echo $this->session->flashdata('memberidfail'); ?></span>
						<?php
						}
						?>
						<button type="submit" style="background: #046376;color: #FFF;" class="form-control" >Sign In</button>
                    </form>
                    <br><br>
                    <center>
                        <font style="font-size:14px">Don't have an account? <a href="signup.php" style="color:#046376;">Sign up here</a></font>
                    </center>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include "footer.php" ?>

    <?php include "loadfilesfooter.php" ?>

</body>

</html>
