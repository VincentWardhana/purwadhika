<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika - Program Registration Success</title>

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
	<?php
	$getinvoicedata = $this->model->getinvoicedata($invoiceid);
	foreach($getinvoicedata as $row)
	{
		$title = $row['title'];
	}
	?>
    <div class="container" style="margin-top:60px;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;">
        
        <div class="row" style="">
            <div class="col-lg-12" style="padding:0">
                <div class="col-lg-6 col-lg-offset-3">
                    <center>
                        <h1 style="font-weight: 100;letter-spacing: 3px;font-size: 50px">
                            Program Registration Success
                        </h1 style="font-weight: 100;letter-spacing: 3px;font-size: 50px">

                        <br><br><br>

                    </center>
                    <!-- <form action="program.php">
                        <input type="text" name="" placeholder="Email Address" class="form-control"><br>
                        <input type="password" name="" placeholder="Password" class="form-control"><br>
                        <button type="submit" style="background: #046376;color: #FFF;" class="form-control" >Login</button>
                    </form>
                    <br><br> -->
                    <center>
                        Your registration of <?php echo $title ?> was successfull. Don't forget to confirm your payment <a href="<?php echo base_url()."paymentconfirmation/$invoiceid"; ?>">here</a> <br>
                        <!-- <font style="font-size:14px">Don't see an email on your inbox? <a href="verification.php" style="color:#046376;">Resend here</a></font> -->
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
