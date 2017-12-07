<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Set Program</title>

    <?php include "loadfilesheader.php"; ?>

</head>

<body onload="addstart();editstart();">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navbar.php" ?>

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Set Program</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<form method="post" action="<?php echo base_url()."admin/filtermarketingsetprogram"; ?>">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <select class="form-control" name="filtercategory" onchange="this.form.submit()">
                        <option value="">Category</option>
						<?php
						$getprogramcategory = $this->model->getprogramcategory();
						foreach($getprogramcategory as $row)
						{
							$categoryid = $row['categoryid'];
							$category = $row['category'];
						?>
							<option value="<?php echo $categoryid ?>" <?php if ($categoryid==$filtercategoryid){ echo "selected"; } ?>><?php echo $category ?></option>
						<?php
						}
						?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2">
                    <select class="form-control" name="filterprogram" onchange="this.form.submit()">
                        <option value="">Program</option>
						<?php
						$getprogram = $this->model->getprogram();
						foreach($getprogram as $row)
						{
							$programid = $row['programid'];
							$program = $row['program'];
						?>
						<option value="<?php echo $programid ?>" <?php if ($programid==$filterprogramid){ echo "selected"; } ?>><?php echo $program ?></option>
						<?php
						}
						?>
                    </select>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" value="<?php echo $search ?>" placeholder="Search Student Name">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" style="padding:6px 10px">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </div>
            </div>
			</form>
            
            <div class="row" style="padding:15px 0">
                <div class="col-lg-12" style="">
                    <div style="overflow-x: auto;font-size: 16px">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Student Name</th>
                                    <th>Program Detail</th>
                                    <th>Student Registration Date</th>
                                    <th>Status</th> 
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$getinvoicepaymentinstallmentnotset = $this->model->getinvoicepaymentinstallmentnotset($filtercategoryid,$filterprogramid,$search);
								foreach($getinvoicepaymentinstallmentnotset as $row)
								{
									$memberid = $row['memberid'];
									$title = $row['title'];
									$invoiceid = $row['invoiceid'];
									$programdetailid = $row['programdetailid'];
									$invoicetime = strtotime($row['invoicetime']);
									
									$invoicetime = date('d F Y', $invoicetime);
									
									$getmemberdata = $this->model->getmemberdata($memberid);
									foreach($getmemberdata as $row)
									{
										$name = $row['name'];
									}
								?>
								<tr>
                                    <td>
                                        <a href="<?php echo base_url()."admin/marketingprogramdetail/$invoiceid/$programdetailid"; ?>">
                                            <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" id="set">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" id="categoryedit1" value="<?php echo $name ?>" placeholder="Student Name" style="border:none;background: none;box-shadow: none;" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" id="programedit1" value="<?php echo $title ?>" placeholder="Program Name" style="border:none;background: none;box-shadow: none;" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" class="form-control" style="border:none;background: none;box-shadow: none;" value="<?php echo $invoicetime ?>" placeholder="Student Registration Date" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" class="form-control" style="border:none;background: none;box-shadow: none;" value="Pending" placeholder="Status" disabled="true">
                                    </td>
                                </tr>
								<?php
								}
								?>
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

    <?php include "loadfilesfooter.php"; ?>

</body>

</html>
