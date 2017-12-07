<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Payment Confirmation</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navbar.php" ?>

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Payment Confirmation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Student Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Student update failed!</b>
                    </div>
                </div>
            </div> -->
            
            <div class="row" style="padding:15px 0">
                <div class="col-lg-12" style="margin-bottom:10px">
                    <div class="col-lg-2" style="padding:0">
                        <select>
                            <option>Latest Payment Date</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12" style="">
                    <div style="overflow-x: auto;font-size: 16px">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>Student Name</th>
                                    <th>Payment Method</th>
                                    <th>Payment Details</th>
                                    <th>Transferred To</th>
                                    <th>Transferred From</th>
                                    <th>Payment Receipt</th>
                                    <th>Payment Confirm Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none"><i class="fa fa-minus" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="edit();" id="editbutton"><i class="fa fa-check" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        Rudi
                                    </td>
                                    <td>
                                        Bank Transfer
                                    </td>
                                    <td>
                                        <!-- Ambil dari payment details -->
                                        <!-- Ambil juga detail pembayaran untuk payment installment atau apa -->
                                        Payment Installment 1 <br>Billing : Rp 178.000
                                    </td>
                                    <td>BCA - 604401782 a/n Adrian Xaverius</td>
                                    <td>BCA - 604401771 a/n Rudia<br>Rp 178.000</td>
                                    <td>
                                        <a href="#" onClick="window.open('https://pbs.twimg.com/profile_images/727238138716807168/YJdfvLsP.jpg','_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=800, height=640');return(false)">
                                            <button class="form-control">View</button>
                                        </a>
                                    </td>
                                    <td>Monday, 26 Dec 2018</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    

</body>

</html>
