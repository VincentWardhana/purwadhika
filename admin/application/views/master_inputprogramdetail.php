<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Input Program Detail</title>

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
                    <h1 class="page-header">Input Program Detail</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<form method="post" action="<?php echo base_url()."admin/filtermasterprogramdetail"; ?>">
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
                    <select class="form-control" name="filterstatus" onchange="this.form.submit()">
                        <option value="">Status</option>
                        <option value="1" <?php if ($filterstatus=="1"){ echo "selected"; } ?>>Available</option>
                        <option value="0" <?php if ($filterstatus=="0"){ echo "selected"; } ?>>Not Available</option>
                    </select>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" value="<?php echo $search ?>" placeholder="Search Program Detail">
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
                                    <th>Category</th>
                                    <th>Program Name</th>
                                    <th>Program Detail</th>
                                    <th>Program Price</th>
                                    <th>Status</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								$getprogramdetail = $this->model->getprogramdetail($filtercategoryid,$filterstatus,$search);
								foreach($getprogramdetail as $row)
								{
									$categoryid = $row['categoryid'];
									$programid = $row['programid'];
									$programdetailid = $row['programdetailid'];
									$programdetail = $row['programdetail'];
									$price = $row['price'];
									$availablestatus = $row['availablestatus'];
									
									if ($availablestatus=="1")
									{
										$availablestatus = "Available";
									}
									else
									{
										$availablestatus = "Not Available";
									}
									
									$getprogramcategorydata = $this->model->getprogramcategorydata($categoryid);
									foreach($getprogramcategorydata as $row)
									{
										$category = $row['category'];
									}
									
									$getprogramdata = $this->model->getprogramdata($programid);
									foreach($getprogramdata as $row)
									{
										$program = $row['program'];
									}
								?>
								<tr>
                                    <td>
                                        <a href="<?php echo base_url()."admin/setprogramdetail/$programdetailid"; ?>">
                                            <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" id="set">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" id="categoryedit1" value="<?php echo $category ?>" placeholder="Category" style="border:none;background: none;box-shadow: none;" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" class="form-control" id="programedit1" value="<?php echo $program ?>" placeholder="Program" style="border:none;background: none;box-shadow: none;" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" value="<?php echo $programdetail ?>" class="form-control" style="border:none;background: none;box-shadow: none;" placeholder="Program Detail" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" value="<?php echo number_format($price , 0, ',', '.'); ?>" class="form-control" style="border:none;background: none;box-shadow: none;" placeholder="Program Price" disabled="true">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="programdetailedit1" value="<?php echo $availablestatus ?>" class="form-control" style="border:none;background: none;box-shadow: none;" placeholder="Status Available / No Available" disabled="true">
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
