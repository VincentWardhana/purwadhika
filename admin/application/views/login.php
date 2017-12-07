<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Login</title>

    <?php include "loadfilesheader.php"; ?>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo base_url()."admin/index.php/admin/adminlogin"; ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Username" value="<?php echo set_value('email'); ?>" style="height:30px;<?php if ($this->session->flashdata('loginfail')!="" && form_error('email') !="") { echo 'border:2px solid #a70f0f'; } ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="" style="height:25px;;<?php if ($this->session->flashdata('loginfail')!="" && form_error('password') !="") { echo 'border:2px solid #a70f0f'; } ?>">
                                </div>
								<?php
								if ($this->session->flashdata('adminidfail')!="")
								{
								?>
									<span style="color:#FF0000;font-size:12"><?php echo $this->session->flashdata('adminidfail'); ?></span>
								<?php
								}
								?>
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
								<button type="submit" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "loadfilesfooter.php"; ?>

</body>

</html>
