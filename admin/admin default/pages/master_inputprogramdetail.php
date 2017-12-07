<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Input Program Detail</title>

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

<body onload="addstart();editstart();">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navbar.php" ?>

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Program Detail</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <select class="form-control">
                        <option value="default">Default</option>
                        <option value="category1">Category 1</option>
                        <option value="category2">Category 2</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2">
                    <select class="form-control">
                        <option value="default">All</option>
                        <option value="category1">Available</option>
                        <option value="category2">Not Available</option>
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
            
            <div class="row" style="padding:15px 0">
                <div class="col-lg-12" style="">
                    <div style="overflow-x: auto;font-size: 16px">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Category</th>
                                    <th>Program Name</th>
                                    <th>Program Detail</th>
                                    <th>Program Price</th>
                                    <th>Status</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="master_setprogramdetail.php">
                                            <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" id="set">Edit</button>
                                        </a>
                                            
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" id="categoryedit1" placeholder="Category" style="border:none;background: none;box-shadow: none;" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" id="programedit1" placeholder="Program" style="border:none;background: none;box-shadow: none;" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" class="form-control" style="border:none;background: none;box-shadow: none;" placeholder="Program Detail" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" class="form-control" style="border:none;background: none;box-shadow: none;" placeholder="Program Price" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" class="form-control" style="border:none;background: none;box-shadow: none;" placeholder="Status Available / No Available" disabled="true">
                                    </td>
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
    <script type="text/javascript">
        
    </script>    

</body>

</html>
