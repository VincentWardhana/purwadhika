<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Input Program</title>

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
                    <h1 class="page-header">Input Program</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                        <b>Program Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                        <b>Program Update Failed!</b>
                    </div>
                </div>
            </div>
            
            <div class="row" style="padding:15px 0">
                <div class="col-lg-12" style="">
                    <div style="overflow-x: auto;font-size: 16px">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>Category</th>
                                    <th>Program Name</th>
                                    <th>Program Detail</th> <!-- Event Only -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none"><i class="fa fa-minus" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="" id="editbutton">Edit</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display:none" onclick="" id="cancelbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="programdata">
                                            <option value="default">Choose Category</option>
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                            <option value="New">New</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="programname">
                                            <option value="default">Choose Program</option>
                                            <option value="startupincubation">SI Batch 1</option>
                                            <option value="jobconnector">SI Batch 2</option>
                                            <option value="New">New</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit" class="form-control" style="display:block" placeholder="Program Detail">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="add();" id="addbutton">Add</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceladd();" id="canceladdbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="programdata">
                                            <option value="default">Choose Type</option>
                                            <option value="newcategory">New Category</option>
                                            <option value="newprogram">New Program</option>
                                            <option value="newdetail">New Detail</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="programdata">
                                            <option value="default">Choose Category</option>
                                            <option value="Category1">Category1</option>
                                            <option value="Category2">Category2</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="addprogram" style="display: block">
                                            <option value="default">Choose Program</option>
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="" class="form-control" id="addprogramdetail" placeholder="Program Detail" style="display:block">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12" style="margin:20px 0" id="submitprogram">
                    <button type="submit" style="background: #3c763d;color:#FFF;border-radius: 4px;border:none;padding:10px 15px">Save</button>
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
