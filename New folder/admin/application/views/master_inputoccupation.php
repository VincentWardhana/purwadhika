<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Input Occupation</title>

    <?php include "loadfilesheader.php"; ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navbar.php" ?>

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Occupation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                        <b>Occupation Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                        <b>Occupation Update Failed!</b>
                    </div>
                </div>
            </div>-->
            
            <div class="row" style="padding:15px 0">
                <div class="col-lg-7" style="">
                    <div style="overflow-x: auto;font-size: 16px">
					<form method="post" action="<?php echo base_url()."admin/updateoccupation"; ?>">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>Occupation Name</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$occupationcounter=0;
                                $getoccupationmaster = $this->model->getoccupationmaster();
								foreach($getoccupationmaster as $row)
								{
									$occupationid = $row['occupationid'];
									$occupation = $row['occupation'];
								?>
								<tr>
                                    <td>
                                        <a href="<?php echo base_url()."admin/deleteoccupationmaster/$occupationid"; ?>"><button type="button" class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none" id="deletebutton<?php echo $occupationcounter ?>"><i class="fa fa-minus" style="color:#FFF"></i></button></a>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="edit(<?php echo $occupationcounter ?>);" id="editbutton<?php echo $occupationcounter ?>">Edit</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display:none" onclick="cancel(<?php echo $occupationcounter ?>);" id="canceleditbutton<?php echo $occupationcounter ?>">Cancel</button>
                                    </td>
                                    <td>
                                        <input type="text" name="editoccupation<?php echo $occupationcounter ?>" value="<?php echo $occupation ?>" placeholder="Type Occupation" class="form-control" id="editoccupation<?php echo $occupationcounter ?>" disabled="true">
                                    </td>
                                </tr>
								<input type="hidden" name="occupationid<?php echo $occupationcounter ?>" value="<?php echo $occupationid ?>">
								<?php
								$occupationcounter++;
								}
								?>
								
								<input type="hidden" name="occupationcounter" value="<?php echo $occupationcounter ?>">
                                
                                <tr>
                                    <td colspan="2">
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="add(<?php echo $occupationcounter ?>);" id="addbutton">Add</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceladd();" id="canceladdbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <input type="text" name="addoccupation" placeholder="Type Occupation" class="form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
					</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "loadfilesfooter.php"; ?>
    <script type="text/javascript">
        function edit(x)
        {
            document.getElementById("editbutton"+x).disabled = true;
            document.getElementById("canceleditbutton"+x).disabled = false;
            document.getElementById("editoccupation"+x).disabled = false;

            document.getElementById("editbutton"+x).style.display = "none";
            document.getElementById("canceleditbutton"+x).style.display = "block";
        }
        function cancel(xx)
        {
            document.getElementById("editbutton"+xx).disabled = false;
            document.getElementById("canceleditbutton"+xx).disabled = true;
            document.getElementById("editoccupation"+xx).disabled = true;

            document.getElementById("editbutton"+xx).style.display = "block";
            document.getElementById("canceleditbutton"+xx).style.display = "none";
        }
		function add(occupationcounter)
		{
			var i = 0;
			for (i=0; i<occupationcounter; i++)
			{
				document.getElementById("editbutton"+i).disabled = true;
				document.getElementById("canceleditbutton"+i).disabled = false;
				document.getElementById("editoccupation"+i).disabled = false;
			}
		}
    </script>    

</body>

</html>
