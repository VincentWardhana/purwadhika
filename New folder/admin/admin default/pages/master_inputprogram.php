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

<body onload="addstart();editstart();">

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
                                    <th colspan="3"></th>
                                    <th>Category</th>
                                    <th>Program Name</th>
                                    <th>Program Detail</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none" id="deletebutton1"><i class="fa fa-minus" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="edit(1);" id="editbutton1">Edit</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display:none" onclick="cancel(1);" id="canceleditbutton1">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="chooseedittype(1);" id="edittype1">
                                            <option value="default">Choose Type</option>
                                            <option value="editcategory">Edit Category</option>
                                            <option value="editprogram">Edit Program</option>
                                            <option value="editdetail">Edit Detail</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="choosecategoryedit1">
                                            <option value="default">Choose Category</option>
                                            <option value="Category1">Category1</option>
                                            <option value="Category2">Category2</option>
                                        </select>
                                        <input type="text" name="" class="form-control" id="categoryedit1" placeholder="Category" style="display:block">
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="chooseprogramedit1">
                                            <option value="default">Choose Program</option>
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                        </select>
                                        <input type="text" name="" class="form-control" id="programedit1" placeholder="Program Detail" style="display:block">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" class="form-control" style="display:block" placeholder="Program Detail">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="add();" id="addbutton">Add</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceladd();" id="canceladdbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="chooseaddtype();" id="addtype">
                                            <option value="default">Choose Type</option>
                                            <option value="newcategory">New Category</option>
                                            <option value="newprogram">New Program</option>
                                            <option value="newdetail">New Detail</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="choosecategory">
                                            <option value="default">Choose Category</option>
                                            <option value="Category1">Category1</option>
                                            <option value="Category2">Category2</option>
                                        </select>
                                        <input type="text" name="" class="form-control" id="inputcategory" placeholder="Category" style="display:block">
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="chooseprogram" style="display: block">
                                            <option value="default">Choose Program</option>
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                        </select>
                                        <input type="text" name="" class="form-control" id="inputprogram" placeholder="Program Detail" style="display:block">
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" id="inputprogramdetail" placeholder="Program Detail" style="display:block">
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
    <script type="text/javascript">
        var b = 1;
        function editstart()
        {
            for (var i = b; i >= 1; i--) {
                document.getElementById("editbutton"+i).disabled = false;
                document.getElementById("canceleditbutton"+i).disabled = true;
                document.getElementById("edittype"+i).disabled = true;
                document.getElementById("choosecategoryedit"+i).disabled = true;
                document.getElementById("categoryedit"+i).disabled = true;
                document.getElementById("chooseprogramedit"+i).disabled = true;
                document.getElementById("programedit"+i).disabled = true;
                document.getElementById("programdetailedit"+i).disabled = true;

                document.getElementById("editbutton"+i).style.display = "block";
                document.getElementById("canceleditbutton"+i).style.display ="none";
                document.getElementById("edittype"+i).style.display ="block";
                document.getElementById("choosecategoryedit"+i).style.display ="block";
                document.getElementById("categoryedit"+i).style.display ="none";
                document.getElementById("chooseprogramedit"+i).style.display ="block";
                document.getElementById("programedit"+i).style.display ="none";
                document.getElementById("programdetailedit"+i).style.display ="block";
            }
                
        }
        function edit(x)
        {
            document.getElementById("editbutton"+x).disabled = true;
            document.getElementById("canceleditbutton"+x).disabled = false;
            document.getElementById("edittype"+x).disabled = false;
            document.getElementById("choosecategoryedit"+x).disabled = true;
            document.getElementById("categoryedit"+x).disabled = true;
            document.getElementById("chooseprogramedit"+x).disabled = true;
            document.getElementById("programedit"+x).disabled = true;
            document.getElementById("programdetailedit"+x).disabled = true;

            document.getElementById("editbutton"+x).style.display = "none";
            document.getElementById("canceleditbutton"+x).style.display ="block";
            document.getElementById("edittype"+x).style.display ="block";
            document.getElementById("choosecategoryedit"+x).style.display ="block";
            document.getElementById("categoryedit"+x).style.display ="none";
            document.getElementById("chooseprogramedit"+x).style.display ="block";
            document.getElementById("programedit"+x).style.display ="none";
            document.getElementById("programdetailedit"+x).style.display ="block";
        }
        function cancel(x1)
        {
            document.getElementById("editbutton"+x1).disabled = false;
            document.getElementById("canceleditbutton"+x1).disabled = true;
            document.getElementById("edittype"+x1).disabled = true;
            document.getElementById("choosecategoryedit"+x1).disabled = true;
            document.getElementById("categoryedit"+x1).disabled = true;
            document.getElementById("chooseprogramedit"+x1).disabled = true;
            document.getElementById("programedit"+x1).disabled = true;
            document.getElementById("programdetailedit"+x1).disabled = true;

            document.getElementById("editbutton"+x1).style.display = "block";
            document.getElementById("canceleditbutton"+x1).style.display ="none";
            document.getElementById("edittype"+x1).style.display ="block";
            document.getElementById("choosecategoryedit"+x1).style.display ="block";
            document.getElementById("categoryedit"+x1).style.display ="none";
            document.getElementById("chooseprogramedit"+x1).style.display ="block";
            document.getElementById("programedit"+x1).style.display ="none";
            document.getElementById("programdetailedit"+x1).style.display ="block";
        }
        function chooseedittype(x2) 
        {
            var dropdown = document.getElementById("edittype"+x2);
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "default") {
                document.getElementById("editbutton"+x2).disabled = true;
                document.getElementById("canceleditbutton"+x2).disabled = false;
                document.getElementById("edittype"+x2).disabled = false;
                document.getElementById("choosecategoryedit"+x2).disabled = true;
                document.getElementById("categoryedit"+x2).disabled = true;
                document.getElementById("chooseprogramedit"+x2).disabled = true;
                document.getElementById("programedit"+x2).disabled = true;
                document.getElementById("programdetailedit"+x2).disabled = true;

                document.getElementById("editbutton"+x2).style.display = "none";
                document.getElementById("canceleditbutton"+x2).style.display ="block";
                document.getElementById("edittype"+x2).style.display ="block";
                document.getElementById("choosecategoryedit"+x2).style.display ="block";
                document.getElementById("categoryedit"+x2).style.display ="none";
                document.getElementById("chooseprogramedit"+x2).style.display ="block";
                document.getElementById("programedit"+x2).style.display ="none";
                document.getElementById("programdetailedit"+x2).style.display ="block";
                
            }
            else if (current_value == "editcategory") {
                document.getElementById("editbutton"+x2).disabled = true;
                document.getElementById("canceleditbutton"+x2).disabled = false;
                document.getElementById("edittype"+x2).disabled = false;
                document.getElementById("choosecategoryedit"+x2).disabled = true;
                document.getElementById("categoryedit"+x2).disabled = false;
                document.getElementById("chooseprogramedit"+x2).disabled = true;
                document.getElementById("programedit"+x2).disabled = true;
                document.getElementById("programdetailedit"+x2).disabled = true;

                document.getElementById("editbutton"+x2).style.display = "none";
                document.getElementById("canceleditbutton"+x2).style.display ="block";
                document.getElementById("edittype"+x2).style.display ="block";
                document.getElementById("choosecategoryedit"+x2).style.display ="none";
                document.getElementById("categoryedit"+x2).style.display ="block";
                document.getElementById("chooseprogramedit"+x2).style.display ="block";
                document.getElementById("programedit"+x2).style.display ="none";
                document.getElementById("programdetailedit"+x2).style.display ="block";
                
            }
            else if (current_value == "editprogram") {
                document.getElementById("editbutton"+x2).disabled = true;
                document.getElementById("canceleditbutton"+x2).disabled = false;
                document.getElementById("edittype"+x2).disabled = false;
                document.getElementById("choosecategoryedit"+x2).disabled = true;
                document.getElementById("categoryedit"+x2).disabled = true;
                document.getElementById("chooseprogramedit"+x2).disabled = true;
                document.getElementById("programedit"+x2).disabled = false;
                document.getElementById("programdetailedit"+x2).disabled = true;

                document.getElementById("editbutton"+x2).style.display = "none";
                document.getElementById("canceleditbutton"+x2).style.display ="block";
                document.getElementById("edittype"+x2).style.display ="block";
                document.getElementById("choosecategoryedit"+x2).style.display ="block";
                document.getElementById("categoryedit"+x2).style.display ="none";
                document.getElementById("chooseprogramedit"+x2).style.display ="none";
                document.getElementById("programedit"+x2).style.display ="block";
                document.getElementById("programdetailedit"+x2).style.display ="block";
                
            }
            else if (current_value == "editdetail") {
                document.getElementById("editbutton"+x2).disabled = true;
                document.getElementById("canceleditbutton"+x2).disabled = false;
                document.getElementById("edittype"+x2).disabled = false;
                document.getElementById("choosecategoryedit"+x2).disabled = false;
                document.getElementById("categoryedit"+x2).disabled = true;
                document.getElementById("chooseprogramedit"+x2).disabled = false;
                document.getElementById("programedit"+x2).disabled = true;
                document.getElementById("programdetailedit"+x2).disabled = false;

                document.getElementById("editbutton"+x2).style.display = "none";
                document.getElementById("canceleditbutton"+x2).style.display ="block";
                document.getElementById("edittype"+x2).style.display ="block";
                document.getElementById("choosecategoryedit"+x2).style.display ="block";
                document.getElementById("categoryedit"+x2).style.display ="none";
                document.getElementById("chooseprogramedit"+x2).style.display ="block";
                document.getElementById("programedit"+x2).style.display ="none";
                document.getElementById("programdetailedit"+x2).style.display ="block";
                
            }
        }
        function addstart()
        {
            document.getElementById("addbutton").disabled = false;
            document.getElementById("canceladdbutton").disabled = true;
            document.getElementById("addtype").disabled = true;
            document.getElementById("choosecategory").disabled = true;
            document.getElementById("inputcategory").disabled = true;
            document.getElementById("chooseprogram").disabled = true;
            document.getElementById("inputprogram").disabled = true;
            document.getElementById("inputprogramdetail").disabled = true;

            document.getElementById("addbutton").style.display = "block";
            document.getElementById("canceladdbutton").style.display = "none";
            document.getElementById("choosecategory").style.display = "block";
            document.getElementById("inputcategory").style.display = "none";
            document.getElementById("chooseprogram").style.display = "block";
            document.getElementById("inputprogram").style.display = "none";
            document.getElementById("inputprogramdetail").style.display = "block";
        }
        function add()
        {
            document.getElementById("addbutton").disabled = true;
            document.getElementById("canceladdbutton").disabled = false;
            document.getElementById("addtype").disabled = false;
            document.getElementById("choosecategory").disabled = true;
            document.getElementById("inputcategory").disabled = true;
            document.getElementById("chooseprogram").disabled = true;
            document.getElementById("inputprogram").disabled = true;
            document.getElementById("inputprogramdetail").disabled = true;

            document.getElementById("addbutton").style.display = "none";
            document.getElementById("canceladdbutton").style.display = "block";
            document.getElementById("choosecategory").style.display = "block";
            document.getElementById("inputcategory").style.display = "none";
            document.getElementById("chooseprogram").style.display = "block";
            document.getElementById("inputprogram").style.display = "none";
            document.getElementById("inputprogramdetail").style.display = "block";
            
        }

        function canceladd()
        {
            document.getElementById("addbutton").disabled = false;
            document.getElementById("canceladdbutton").disabled = true;
            document.getElementById("addtype").disabled = true;
            document.getElementById("choosecategory").disabled = true;
            document.getElementById("inputcategory").disabled = true;
            document.getElementById("chooseprogram").disabled = true;
            document.getElementById("inputprogram").disabled = true;
            document.getElementById("inputprogramdetail").disabled = true;

            document.getElementById("addbutton").style.display = "block";
            document.getElementById("canceladdbutton").style.display = "none";
            document.getElementById("choosecategory").style.display = "block";
            document.getElementById("inputcategory").style.display = "none";
            document.getElementById("chooseprogram").style.display = "block";
            document.getElementById("inputprogram").style.display = "none";
            document.getElementById("inputprogramdetail").style.display = "block";
        }
        
        function chooseaddtype() 
        {
            var dropdown = document.getElementById("addtype");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "default") {
                document.getElementById("addbutton").disabled = true;
                document.getElementById("canceladdbutton").disabled = false;
                document.getElementById("addtype").disabled = false;
                document.getElementById("choosecategory").disabled = true;
                document.getElementById("inputcategory").disabled = true;
                document.getElementById("chooseprogram").disabled = true;
                document.getElementById("inputprogram").disabled = true;
                document.getElementById("inputprogramdetail").disabled = true;

                document.getElementById("addbutton").style.display = "none";
                document.getElementById("canceladdbutton").style.display = "block";
                document.getElementById("choosecategory").style.display = "block";
                document.getElementById("inputcategory").style.display = "none";
                document.getElementById("chooseprogram").style.display = "block";
                document.getElementById("inputprogram").style.display = "none";
                document.getElementById("inputprogramdetail").style.display = "block";
                
            }
            else if (current_value == "newcategory") {
                document.getElementById("addbutton").disabled = true;
                document.getElementById("canceladdbutton").disabled = false;
                document.getElementById("addtype").disabled = false;
                document.getElementById("choosecategory").disabled = true;
                document.getElementById("inputcategory").disabled = false;
                document.getElementById("chooseprogram").disabled = true;
                document.getElementById("inputprogram").disabled = true;
                document.getElementById("inputprogramdetail").disabled = true;

                document.getElementById("addbutton").style.display = "none";
                document.getElementById("canceladdbutton").style.display = "block";
                document.getElementById("choosecategory").style.display = "none";
                document.getElementById("inputcategory").style.display = "block";
                document.getElementById("chooseprogram").style.display = "block";
                document.getElementById("inputprogram").style.display = "none";
                document.getElementById("inputprogramdetail").style.display = "block";
                
            }
            else if (current_value == "newprogram") {
                document.getElementById("addbutton").disabled = true;
                document.getElementById("canceladdbutton").disabled = false;
                document.getElementById("addtype").disabled = false;
                document.getElementById("choosecategory").disabled = false;
                document.getElementById("inputcategory").disabled = true;
                document.getElementById("chooseprogram").disabled = true;
                document.getElementById("inputprogram").disabled = false;
                document.getElementById("inputprogramdetail").disabled = true;

                document.getElementById("addbutton").style.display = "none";
                document.getElementById("canceladdbutton").style.display = "block";
                document.getElementById("choosecategory").style.display = "block";
                document.getElementById("inputcategory").style.display = "none";
                document.getElementById("chooseprogram").style.display = "none";
                document.getElementById("inputprogram").style.display = "block";
                document.getElementById("inputprogramdetail").style.display = "block";
                
            }
            else if (current_value == "newdetail") {
                document.getElementById("addbutton").disabled = true;
                document.getElementById("canceladdbutton").disabled = false;
                document.getElementById("addtype").disabled = false;
                document.getElementById("choosecategory").disabled = false;
                document.getElementById("inputcategory").disabled = true;
                document.getElementById("chooseprogram").disabled = false;
                document.getElementById("inputprogram").disabled = true;
                document.getElementById("inputprogramdetail").disabled = false;

                document.getElementById("addbutton").style.display = "none";
                document.getElementById("canceladdbutton").style.display = "block";
                document.getElementById("choosecategory").style.display = "block";
                document.getElementById("inputcategory").style.display = "none";
                document.getElementById("chooseprogram").style.display = "block";
                document.getElementById("inputprogram").style.display = "none";
                document.getElementById("inputprogramdetail").style.display = "block";
                
            }
        }
    </script>    

</body>

</html>
