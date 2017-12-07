<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Edit Program</title>

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
                    <h1 class="page-header">Edit Program for Student</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Edit Program for StudentName Successfull!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Edit Program for StudentName Failed!</b>
                    </div>
                </div>
            </div>
            <div class="row" style="padding:15px 0">
                <div class="col-lg-12" style="padding: 0">
                    <div class="col-lg-3" style="">
                        <select class="form-control">
                            <option>Select Program</option>
                            <option>Startup Incubation</option>
                            <option>Job Connector</option>
                        </select>
                    </div>
                    <div class="col-lg-3" style="">
                        <select class="form-control">
                            <option>Student Name</option>
                            <option>Rudi</option>
                            <option>Rudo</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search Student Name">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </div>
                <div class="col-lg-12" style="padding: 5px 10px;margin: 10px;border:1px solid #CCC">
                    <div class="col-lg-12" style="padding: 0">
                        <div class="col-lg-12" style="padding: 0;margin: 10px 0">
                            <div class="col-lg-12">
                                <h3 style="margin:10px 0">Student Information</h3>    
                            </div>
                            <div class="col-lg-12" style="padding: 0">
                                <div class="col-lg-2">
                                    Student Name
                                </div>
                                <div class="col-lg-3">
                                    : Rudi 
                                </div>
                            </div>
                            <div class="col-lg-12" style="padding: 0">
                                <div class="col-lg-2">
                                    Student Phone Number
                                </div>
                                <div class="col-lg-3">
                                    : 082110820095
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-12" style="padding: 0;margin:10px 0">
                            <div class="col-lg-2">
                                Program
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option value="default">Selected Program</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding: 0;margin:10px 0">
                            <div class="col-lg-2">
                                Program Details
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option value="default">Selected Program Details</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding: 0;margin:10px 0">
                            <div class="col-lg-2">
                                Down Payment
                            </div>
                            <div class="col-lg-3">
                                <input type="number" name="" placeholder="Type Ammount of Down Payment" class="form-control">
                            </div>
                            <div class="col-lg-1">
                                <select class="form-control">
                                    <option value="default">Date</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <select class="form-control">
                                    <option value="default">Month</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <select class="form-control">
                                    <option value="default">Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding: 0;margin:10px 0">
                            <div class="col-lg-2">
                                Payment Installment
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control" id="setpayment" onchange="piqty();">
                                    <option value="default">Choose Installment</option>
                                    <option value="2">2</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        <div id="paymentinstallmentfield">
                            
                        </div>

                    </div>
                </div>
                <div class="col-lg-12" style="margin:20px 0">
                    <button type="submit" style="background: #3c763d;color:#FFF;border-radius: 4px;border:none;padding:10px 15px">Update</button>
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

    <script language="javascript">
        function piqty ()
        {
            paymentinstallmentfield.innerHTML = "";

            var dropdown = document.getElementById("setpayment");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            addtb (current_value);
        }
        function addtb(qty)
        {
            for (i = 1; i <= qty; i++) { 
                paymentinstallmentfield.innerHTML = paymentinstallmentfield.innerHTML +"<div class='col-lg-12' style='padding: 0;margin:10px 0'><div class='col-lg-2'>Payment Installment " + i +"</div><div class='col-lg-3'><input type='number' name='' placeholder='Type Ammount of Payment Installment' class='form-control'></div><div class='col-lg-1'><select class='form-control'><option value='default'>Date</option></select></div><div class='col-lg-1'><select class='form-control'><option value='default'>Month</option></select></div><div class='col-lg-1'><select class='form-control'><option value='default'>Year</option></select></div></div>";
            }
            
        }
    </script>

    

</body>

</html>
