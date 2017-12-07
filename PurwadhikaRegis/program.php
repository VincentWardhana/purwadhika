<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika - Choose Program</title>

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
        <div class="row" style="padding: 20px 0">
            <div class="col-lg-4 col-md-4">
                <select class="form-control">
                    <option value="default">Default</option>
                    <option>Kategori1</option>
                    <option>Kategori2</option>
                </select>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search Program Name">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" style="padding:6px 10px">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </div>
        </div>
        <div class="row" style="padding:10px 0">
            <?php 
                for ($i=0; $i < 4; $i++) { 
            ?>
                    <div class="col-lg-3 col-md-3" style="padding:20px">
                        <div class="col-lg-12 col-md-12" style="color:#000;padding:10px;border:1px solid #CCC;">
                            <img src="img/example.jpg" style="width:100%">
                            <br>
                                <font style="font-weight: bold;font-size: 20px">Program Name</font>
                            <br>
                            <font style="font-size: 14px">Simple description of this program if needed, if not needed can be deleted</font>
                            <br><br>
                            <a href="program_detail.php">
                                <button class="form-control" style="color:#FFF;background: #046376;font-size: 16px">Select Program</button>
                            </a>
                            
                        </div>
                    </div>
            <?php        
                }
            ?>
                    
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
