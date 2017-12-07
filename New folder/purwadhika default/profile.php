<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika - My Profile</title>

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
                <div class="col-lg-12" style="padding: 15px;background: #dff0d8;color: #3c763d;border-color: #d6e9c6">
                    <b>Information Update Successfull!</b>
                </div>
                <div class="col-lg-12" style="padding: 15px;background: #f2dede;color: #a94442;border-color: #ebccd1">
                    <b>Information Update Failed!</b>
                </div>
                <div class="col-lg-12" style="margin:10px 0">
                    <center>
                        <br>
                        <font style="color: #605E5E">
                            Edit information below to update your profile.
                        </font>
                        <br><br><br>
                    </center>
                </div>
                    
            </div>
        </div>
        <div class="row" style="">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
                <form>
                    <input type="text" name="" placeholder="Name" class="form-control"><br>
                    <input type="text" name="" placeholder="Email Address" class="form-control"><br>
                    <input type="password" name="" placeholder="Password" class="form-control"><br>
                    <input type="number" name="" placeholder="Age" class="form-control"><br>
                    <select class="form-control">
                        <option selected="true">Occupation</option>
                        <option>University Student</option>
                        <option>Fresh Graduate</option>
                        <option>Professional</option>
                        <option>Entrepreneur</option>
                        <option>Freelance</option>
                    </select><br>
                    <input type="text" name="" placeholder="Institution Name" class="form-control"><br>
                    <input type="text" name="" placeholder="Last Education Background" class="form-control"><br>
                    <input type="text" name="" placeholder="Education Institution" class="form-control"><br>
                    
                    <input type="number" name="" placeholder="Mobile Phone" class="form-control"><br>
                    <select class="form-control">
                        <option selected="true">Choose Schedule and Location</option>
                    </select><br>
                    <select class="form-control">
                        <option selected="true">Choose Schedule</option>
                    </select><br>
                    <select class="form-control">
                        <option selected="true">Choose Program</option>
                    </select><br>
                    <textarea placeholder="Tell us the reason why you take this program" class="form-control" rows="5"></textarea><br>
                    <button type="submit" style="background: rgb(96, 94, 94);color: #FFF;" class="form-control" >Save</button>
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

</body>

</html>
