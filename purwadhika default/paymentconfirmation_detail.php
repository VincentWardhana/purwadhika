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

<body onload="start();">

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
                <div class="col-lg-12" style="margin:10px 0">
                    <center>
                        <br>
                        <font style="color: #605E5E;font-weight: bold;font-size: 30px">
                            Payment Confirmation
                        </font>
                        <br><br>
                        <font style="color: #605E5E;font-weight: bold;font-size: 20px">
                            Course Name/Event Name/Class Name
                        </font>
                        <br><br><br>
                    </center>
                </div>    
            </div>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="margin-bottom:30px">
                <div class="col-lg-4">
                    About : <br>DP
                </div>
                <div class="col-lg-4">
                    Billing : <br>Rp 1,000,000
                </div>
                <div class="col-lg-4">
                    Due Date : <br>1 Oktober 2017
                </div>
            </div>
        </div>
        <div class="row" style="">
            
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
                <form action="paymentconfirmation_header.php">
                    
                    <select class="form-control" id="paymentmethod" onchange="check();">
                        <option selected="true" value="default">Payment Method</option>
                        <option value="Transfer">Bank Transfer</option>
                        <option value="Debit">Debit Card</option>
                        <option value="Credit">Credit Card</option>
                    </select><br>

                    <div id="transferto1">
                        <select class="form-control">
                            <option selected="true">Transferred to</option>
                            <option>BCA - 6044017371 a/n Adrian Xaverius</option>
                            <option>BCA - 6044017371 a/n Adrian Xaverius</option>
                            <option>BCA - 6044017371 a/n Adrian Xaverius</option>
                            <option>BCA - 6044017371 a/n Adrian Xaverius</option>
                            <option>BCA - 6044017371 a/n Adrian Xaverius</option>
                        </select><br>
                    </div>
                    
                    <div id="debitcredit">
                        <input type="text" name="" placeholder="Payment Details. Ex : 27 October 2017 Purwadhika Campus with Jeffry" class="form-control"><br>
                    </div>
                    
                    <div id="transferto2">
                        <select class="form-control">
                            <option selected="true">From Bank</option>
                            <option>BCA</option>
                        </select><br>
                        <input type="text" name="" placeholder="Beneficiary Account" class="form-control"><br>
                        <input type="number" name="" placeholder="Transfer Ammount" class="form-control"><br>
                    </div>

                    <font style="font-size: 16px">Upload your payment receipt below :</font><br>
                    <input type="file" name="" class="form-control" accept="image/*"><br>
                    
                    <button type="submit" id="simpan" style="background: rgb(96, 94, 94);color: #FFF;" class="form-control" >Save</button>
                </form>
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

    <script type="text/javascript">
        function start()
        {
            document.getElementById("transferto1").style.display = "none";
            document.getElementById("transferto2").style.display = "none";
            document.getElementById("debitcredit").style.display = "none";
            
        }
        function check() 
        {
            var dropdown = document.getElementById("paymentmethod");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "Transfer") {
                document.getElementById("transferto1").style.display = "block";
                document.getElementById("transferto2").style.display = "block";
                document.getElementById("debitcredit").style.display = "none";
                
            }
            else {
                document.getElementById("transferto1").style.display = "none";
                document.getElementById("transferto2").style.display = "none";
                document.getElementById("debitcredit").style.display = "block";
                
            }
        }
    </script>

</body>

</html>
