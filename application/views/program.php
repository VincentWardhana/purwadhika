<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika - Choose Program</title>

    <?php include "loadfilesheader.php" ?>

</head>

<body>

    <!-- Navigation -->
    <?php include "navbar.php" ?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <!-- <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </header> -->

    <!-- Main Content -->
    <div class="container" style="margin-top:60px;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;">
        <form method="post" action="<?php echo base_url()."filterprogram"; ?>">
		<div class="row" style="padding: 20px 0">
            <div class="col-lg-4 col-md-4">
				<select class="form-control" name="categoryid" onchange="this.form.submit()">
                    <option value="">Category</option>
					<?php
					$getprogramcategory = $this->model->getprogramcategory();
					foreach($getprogramcategory as $row)
					{
						$categoryid = $row['categoryid'];
						$category = $row['category'];
					?>
					<option value="<?php echo $categoryid ?>" <?php if ($filtercategoryid==$categoryid){ echo "selected"; } ?>><?php echo $category ?></option>
					<?php
					}
					?>
                </select>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="programname" value="<?php echo $programname ?>" placeholder="Search Program Name">
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
        <div class="row" style="padding:10px 0">
            <?php
			$getprogramdetail = $this->model->getprogramdetail($filtercategoryid,$programname);
			foreach($getprogramdetail as $row)
			{
				$programdetailid = $row['programdetailid'];
				$filename = $row['filename'];
				$title = $row['title'];
				$description1 = $row['description1'];
            ?>
				<div class="col-lg-3 col-md-3" style="padding:20px">
					<div class="col-lg-12 col-md-12" style="color:#000;padding:10px;border:1px solid #CCC;">
						<img src="<?php echo base_url() ?>/admin/programdetail/<?php echo $filename ?>" style="width:100%;">
						<br>
							<font style="font-weight: bold;font-size: 20px"><?php echo $title ?></font>
						<br>
						<font style="font-size: 14px"><?php echo $description1 ?></font>
						<br><br>
						<a href="<?php echo base_url()."programdetail/$programdetailid"; ?>">
							<button class="form-control" style="color:#FFF;background: #046376;font-size: 16px">Select Program</button>
						</a>
						
					</div>
				</div>
            <?php        
			}
            ?>
                    
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include "footer.php" ?>

    <?php include "loadfilesfooter.php" ?>

</body>

</html>
