<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika - Payment Confirmation</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/favicon-purwadhika.png">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="col-lg-12" style="margin:10px 0;border:1px solid #CCC">
                    <center>
                        <br>
                        <font style="color: #605E5E;font-weight: bold;font-size: 20px">
                            Course Name/Event Name/Class Name
                        </font>
                        <br><br><br>
                    </center>
                    Term of Payment :
                    <div style="overflow-x: auto;font-size: 16px">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>About</th>
                                    <th>Billing Ammount</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>DP</td>
                                    <td>Rp 500,000</td>
                                    <td>Waiting Confirmation</td>
                                    <td>15 September 2017</td>
                                    <td><a href="paymentconfirmation_detail.php"><button style="border-radius: 4px;background: #046376;color:#FFF;border:none">Payment Confirm</button></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Payment Installment 1</td>
                                    <td>Rp 1,000,000</td>
                                    <td>Unpaid</td>
                                    <td>15 September 2017</td>
                                    <td><a href="paymentconfirmation_detail.php"><button style="border-radius: 4px;background: #046376;color:#FFF;border:none">Payment Confirm</button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>  



                <div class="col-lg-12" style="margin:10px 0;border:1px solid #CCC">
                    <center>
                        <br>
                        <font style="color: #605E5E;font-weight: bold;font-size: 20px">
                            Course Name/Event Name/Class Name
                        </font>
                        <br><br><br>
                    </center>
                    Term of Payment :
                    <div style="overflow-x: auto;font-size: 16px">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>About</th>
                                    <th>Billing Ammount</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>DP</td>
                                    <td>Rp 500,000</td>
                                    <td>Waiting Confirmation</td>
                                    <td>15 September 2017</td>
                                    <td><a href="paymentconfirmation_detail.php"><button style="border-radius: 4px;background: #046376;color:#FFF;border:none">Payment Confirm</button></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Payment Installment 1</td>
                                    <td>Rp 1,000,000</td>
                                    <td>Unpaid</td>
                                    <td>15 September 2017</td>
                                    <td><a href="paymentconfirmation_detail.php"><button style="border-radius: 4px;background: #046376;color:#FFF;border:none">Payment Confirm</button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>   
            </div>
            
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

    

</body>

</html>
