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
                    <h1 class="page-header">Input Program for Student <!-- Title Registration --></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Student <!-- Title Registration --> Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Student <!-- Title Registration --> update failed!</b>
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
                                    <th>Program Name</th>
                                    <th>Program Detail</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                    <th>Updated By</th>
                                    <th>Updated Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none"><i class="fa fa-minus" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="edit();" id="editbutton">Edit</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display:none" onclick="cancel();" id="cancelbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="editdata();" id="editdata" disabled="true">
                                            <option value="default">Choose Edit Type</option>
                                            <option value="programname">Program Name</option>
                                            <option value="programdetailsname">Program Details</option>
                                        </select>

                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="programdata" disabled="true">
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                            <option value="New">New</option>
                                        </select>
                                        <input type="text" name="" id="programdataedit" class="form-control" style="display: none">
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="check2();" id="programdetailsdata" disabled="true">
                                            <option value="startupincubation">SI Batch 1</option>
                                            <option value="jobconnector">SI Batch 2</option>
                                            <option value="New">New</option>
                                        </select>
                                        <input type="text" name="" id="programdetailsdataedit" class="form-control" style="display:none">
                                    </td>
                                    <td>Admin1</td>
                                    <td>15 September 2017</td>
                                    <td>Admin1</td>
                                    <td>15 September 2017</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="add();" id="addbutton">Add</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceladd();" id="canceladdbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="adddata();" id="chooseaddprogram" disabled="true">
                                            <option value="default">Choose Add Type</option>
                                            <option value="newprogram">Add New Program</option>
                                            <option value="newprogramdetails">Add New Details</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="addprogram" disabled="true">
                                            <option value="default">Program</option>
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                        </select>
                                        <input type="text" name="" class="form-control" id="addnewprogram" style="display: none">
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" id="addnewprogramdetails" style="display: none">
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Program for Short Classes <!-- Title Registration --></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Short Classes <!-- Title Registration --> Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Short Classes <!-- Title Registration --> update failed!</b>
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
                                    <th>Program Name</th>
                                    <!-- <th>Program Detail</th> -->
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                    <th>Updated By</th>
                                    <th>Updated Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none"><i class="fa fa-minus" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="edit();" id="editbutton">Edit</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display:none" onclick="cancel();" id="cancelbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="editdata();" id="editdata" disabled="true">
                                            <option value="default">Choose Edit Type</option>
                                            <option value="programname">Program Name</option>
                                            <!-- <option value="programdetailsname">Program Details</option> -->
                                        </select>

                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="programdata" disabled="true">
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                            <option value="New">New</option>
                                        </select>
                                        <input type="text" name="" id="programdataedit" class="form-control" style="display: none">
                                    </td>
                                    <!-- <td>
                                        <select class="form-control" onchange="check2();" id="programdetailsdata" disabled="true">
                                            <option value="startupincubation">SI Batch 1</option>
                                            <option value="jobconnector">SI Batch 2</option>
                                            <option value="New">New</option>
                                        </select>
                                        <input type="text" name="" id="programdetailsdataedit" class="form-control" style="display:none">
                                    </td> -->
                                    <td>Admin1</td>
                                    <td>15 September 2017</td>
                                    <td>Admin1</td>
                                    <td>15 September 2017</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="add();" id="addbutton">Add</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceladd();" id="canceladdbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="adddata();" id="chooseaddprogram" disabled="true">
                                            <option value="default">Choose Add Type</option>
                                            <option value="newprogram">Add New Program</option>
                                            <!-- <option value="newprogramdetails">Add New Details</option> -->
                                        </select>
                                    </td>
                                    <td>
                                        <!-- <select class="form-control" onchange="" id="addprogram" disabled="true">
                                            <option value="default">Program</option>
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                        </select> -->
                                        <input type="text" name="" class="form-control" id="addnewprogram" style="display: none">
                                    </td>
                                    <!-- <td>
                                        <input type="text" name="" class="form-control" id="addnewprogramdetails" style="display: none">
                                    </td> -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Program for Event <!-- Title Registration --></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Event <!-- Title Registration --> Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Event <!-- Title Registration --> update failed!</b>
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
                                    <th>Program Name</th>
                                    <!-- <th>Program Detail</th> -->
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                    <th>Updated By</th>
                                    <th>Updated Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none"><i class="fa fa-minus" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="edit();" id="editbutton">Edit</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display:none" onclick="cancel();" id="cancelbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="editdata();" id="editdata" disabled="true">
                                            <option value="default">Choose Edit Type</option>
                                            <option value="programname">Program Name</option>
                                            <!-- <option value="programdetailsname">Program Details</option> -->
                                        </select>

                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="programdata" disabled="true">
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                            <option value="New">New</option>
                                        </select>
                                        <input type="text" name="" id="programdataedit" class="form-control" style="display: none">
                                    </td>
                                    <!-- <td>
                                        <select class="form-control" onchange="check2();" id="programdetailsdata" disabled="true">
                                            <option value="startupincubation">SI Batch 1</option>
                                            <option value="jobconnector">SI Batch 2</option>
                                            <option value="New">New</option>
                                        </select>
                                        <input type="text" name="" id="programdetailsdataedit" class="form-control" style="display:none">
                                    </td> -->
                                    <td>Admin1</td>
                                    <td>15 September 2017</td>
                                    <td>Admin1</td>
                                    <td>15 September 2017</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="add();" id="addbutton">Add</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceladd();" id="canceladdbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="adddata();" id="chooseaddprogram" disabled="true">
                                            <option value="default">Choose Add Type</option>
                                            <option value="newprogram">Add New Program</option>
                                            <!-- <option value="newprogramdetails">Add New Details</option> -->
                                        </select>
                                    </td>
                                    <td>
                                        <!-- <select class="form-control" onchange="" id="addprogram" disabled="true">
                                            <option value="default">Program</option>
                                            <option value="startupincubation">Startup Incubation</option>
                                            <option value="jobconnector">Job Connector</option>
                                        </select> -->
                                        <input type="text" name="" class="form-control" id="addnewprogram" style="display: none">
                                    </td>
                                    <!-- <td>
                                        <input type="text" name="" class="form-control" id="addnewprogramdetails" style="display: none">
                                    </td> -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
        function edit()
        {
            document.getElementById("editdata").disabled = false;
            document.getElementById("programdata").disabled = true;
            document.getElementById("programdetailsdata").disabled = true;
            document.getElementById("cancelbutton").style.display = "block";
            document.getElementById("editbutton").style.display = "none";
        }
        function cancel()
        {
            document.getElementById("editdata").disabled = true;
            document.getElementById("programdata").disabled = true;
            document.getElementById("programdetailsdata").disabled = true;
            document.getElementById("cancelbutton").style.display = "none";
            document.getElementById("editbutton").style.display = "block";
            editdata();
        }
        function editdata()
        {
            var dropdown = document.getElementById("editdata");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "default") {
                document.getElementById("programdata").disabled = true;
                document.getElementById("programdetailsdata").disabled = true;
            }
            else if (current_value == "programname") {
                document.getElementById("programdataedit").style.display = "block";
                document.getElementById("programdetailsdataedit").style.display = "none";
                document.getElementById("programdata").style.display = "none";
                document.getElementById("programdetailsdata").style.display = "none";
            }
            else if (current_value == "programdetailsname") {
                document.getElementById("programdataedit").style.display = "none";
                document.getElementById("programdetailsdataedit").style.display = "block";
                document.getElementById("programdata").style.display = "block";
                document.getElementById("programdetailsdata").style.display = "none";
            }
        }
        function add()
        {
            document.getElementById("chooseaddprogram").disabled = false;
            document.getElementById("addprogram").disabled = true;
            document.getElementById("canceladdbutton").style.display = "block";
            document.getElementById("addbutton").style.display = "none";
        }

        function canceladd()
        {
            document.getElementById("chooseaddprogram").disabled = true;
            document.getElementById("addprogram").disabled = true;
            document.getElementById("canceladdbutton").style.display = "none";
            document.getElementById("addbutton").style.display = "block";
            document.getElementById("addnewprogram").style.display = "none";
            document.getElementById("addnewprogramdetails").style.display = "none";
        }
        
        function adddata() 
        {
            var dropdown = document.getElementById("chooseaddprogram");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "default") {
                document.getElementById("addprogram").disabled = true;
                document.getElementById("addnewprogram").style.display = "none";
                document.getElementById("addnewprogramdetails").style.display = "none";
            }
            else if (current_value == "newprogram") {
                document.getElementById("addprogram").style.display = "none";
                document.getElementById("addprogram").disabled = true;
                document.getElementById("addnewprogram").style.display = "block";
                document.getElementById("addnewprogramdetails").style.display = "none";
            }
            else if (current_value == "newprogramdetails") {
                document.getElementById("addprogram").style.display = "block";
                document.getElementById("addprogram").disabled = false;
                document.getElementById("addnewprogram").style.display = "none";
                document.getElementById("addnewprogramdetails").style.display = "block";
            }
        }
    </script>

</body>

</html>
