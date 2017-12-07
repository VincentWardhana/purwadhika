<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Set Program Detail</title>

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

<body onload="start();">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navbar.php" ?>

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Set Program Detail</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row" style="padding:15px 0">
                <div class="col-lg-8" style="">
                    <div style="overflow-x: auto;font-size: 16px">
                    <form id="form" method="post" action="">    
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tbody>
                                <tr>
                                    <th>
                                        Category
                                    </th>
                                    <td>
                                        Category1
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Program Name
                                    </th>
                                    <td>
                                        Startup Incubation
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>
                                        Program Detail
                                    </th>
                                    <td>
                                        Startup Incubation Batch 120
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Layout Program
                                    </th>
                                    <td>
                                        <input type="text" name="" class="form-control" placeholder="Title">
                                        <textarea class="form-control" placeholder="Description 1"></textarea>
                                        <textarea class="form-control" placeholder="Description 2"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Program Available
                                    </th>
                                    <td>
                                        <select class="form-control" onchange="" id="programavailable">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Total Price
                                    </th>
                                    <td>
                                        <div class="input-group custom-search-form">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="padding:6px 10px">
                                                    Rp
                                                </button>
                                            </span>
                                            <input id="totalharga" name="totalharga" type="text" class="form-control" onkeypress="return isNumberKey(event);" placeholder="Total Price">
                                        </div>
                                        
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Installment Available
                                    </th>
                                    <td>
                                        <select class="form-control" onchange="installmentstatus();" id="installmentavailable">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                            
                                <tr id="dponly">
                                    <th>
                                        DP
                                    </th>
                                    <td>
                                        <div class="input-group custom-search-form">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="padding:6px 10px">
                                                    Rp
                                                </button>
                                            </span>
                                            <input type="text" name="" class="form-control" placeholder="DP" id="inputdp" onkeypress="return isNumberKey(event);">
                                        </div>
                                        
                                    </td>
                                </tr>

                                <tr id="paymentinstallment">
                                    <th>
                                        How many installment?
                                    </th>
                                    <td>
                                        <select class="form-control" onchange="createinstallment();" id="paymenttimes">
                                            <?php 
                                                for ($i=1; $i <= 12; $i++) { 
                                            ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <!-- <div class="input-group custom-search-form">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="padding:6px 10px">
                                                    X
                                                </button>
                                            </span>
                                            <input type="text" name="" class="form-control" onkeypress="return isNumberKey(event); createinstallment(); " placeholder="Payment Installment ex : 2" value="0" id="paymenttimes">
                                        </div> -->
                                    </td>
                                </tr>

                                <tr id="paymentinstallment2">
                                    <th>
                                        Payment Installment
                                    </th>
                                    <td>
                                        <div id="inputpaymentinstallment">
                                            
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <button style="border-radius: 4px;background: #046376;color:#FFF;border:none;padding:5px 10px">Save</button>
                    </form>
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
    <script type="text/javascript">
        function start ()
        {
            installmentstatus();
        }
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        function installmentstatus() 
        {
            var dropdown = document.getElementById("installmentavailable");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "no") {
                document.getElementById("dponly").style.display ="none";
                document.getElementById("paymentinstallment").style.display ="none";
                document.getElementById("paymentinstallment2").style.display ="none";
            }
            else if (current_value == "yes") {
                document.getElementById("dponly").style.display ="table-row";
                document.getElementById("paymentinstallment").style.display ="table-row";
                document.getElementById("paymentinstallment2").style.display ="table-row";
                createinstallment();
            }
        }
        function createinstallment()
        {
            inputpaymentinstallment.innerHTML = "";
            var dropdown = document.getElementById("paymenttimes");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            for (i = 1; i <= current_value; i++) { 
                inputpaymentinstallment.innerHTML = inputpaymentinstallment.innerHTML +"<div class='input-group custom-search-form' id='inputpaymentinstallment"+i+"'><span class='input-group-btn'><button class='btn btn-default' type='button' style='padding:6px 10px'>Rp.</button></span><input type='text' name='' class='form-control' onkeypress='return isNumberKey(event);' placeholder='Payment Installment"+i+"'  id='tbpaymentinstallment1'></div>";
            }
        }
    </script>    

</body>

</html>
