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
	
	<?php
	$getprogramdetaildata = $this->model->getprogramdetaildata($programdetailid);
	foreach($getprogramdetaildata as $row)
	{
		$filename = $row['filename'];
		$title = $row['title'];
		$description2 = $row['description2'];
		$price = $row['price'];
		$installmentstatus = $row['installmentstatus'];
		
		if ($installmentstatus=="0")
		{
			$installmentstatus = "Not Available";
		}
		else
		{
			$installmentstatus = "Available";
		}
	}
	?>
    <div class="container" style="margin-top:60px;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;">
        <div class="row" style="padding: 20px 10px">
            <h2><?php echo $title ?></h2>
        </div>
        <div class="row" style="padding:10px 0">
            
            <div class="col-lg-3 col-md-3" style="padding:20px">
                <div class="col-lg-12 col-md-12" style="color:#000;padding:10px;">
                    <img src="<?php echo base_url() ?>/admin/programdetail/<?php echo $filename ?>" style="width:100%;">
                    <br>
                </div>
            </div>
            <div class="col-lg-9 col-md-9" style="padding:20px">
                <div class="col-lg-12 col-md-12" style="color:#000;padding:10px;">
                    <font style="font-size: 14px"><?php echo $description2 ?></font>
                </div>
                <form method="post" action="<?php echo base_url()."createinvoice/$programdetailid"; ?>">
                    <div class="col-lg-12 col-md-12" style="color:#000;padding:10px;font-size: 14px">
                        <div class="form-group">
                            <p style="margin:10px 0;font-size: 20px">
                                Fee : Rp. <?php echo number_format($price , 0, ',', '.'); ?>
                            </p>
							<p style="margin:10px 0;font-size: 14px">
                                Installment : <?php echo $installmentstatus ?>
                            </p>
                        </div>  
                        <div class="form-group">
                            <p style="margin:10px 0">
                                Location :
                            </p>
                            <select class="form-control" name="programdetaillocationid" onchange="genschedule(this.value)" required>
								<option value="">Select Location</option>
								<?php
								$getprogramdetaillocation = $this->model->getprogramdetaillocation($programdetailid);
								foreach($getprogramdetaillocation as $row)
								{
									$programdetaillocationid = $row['programlocationid'];
									$location = $row['location'];
								?>
								<option value="<?php echo $programdetaillocationid ?>"><?php echo $location ?></option>
								<?php
								}
								?>
                            </select>
                        </div>
                        <div class="form-group">
                            <p style="margin:10px 0">
                                Schedule :
                            </p>
							<div id="schedule">
							
							</div>
                        </div>
						<div class="form-group">
                            <input type="text" class="form-control" name="marketingsource" placeholder="How do You know Us?">
                        </div>
						<div class="form-group">
                            <input type="text" class="form-control" name="registerreason" placeholder="Why do You chose this program?">
                        </div>
                        <div class="form-group">
                            <button type="submit" style="background: #046376;color: #FFF;" class="form-control" >Register for This Program</button>
                        </div>  
                    </div>
                </form>
            </div>
                    
        </div>
    </div>

	<script>
	function genschedule(programlocationid)
	{
		var checkedcounter=0;
		document.getElementById("schedule").innerHTML = "";
		
		var s = document.getElementById("schedule");
		<?php
		$getprogramschedule = $this->model->getprogramschedule();
		foreach($getprogramschedule as $row)
		{
			$getprogramlocationid = $row['programlocationid'];
			$getschedule = $row['schedule'];
		?>
		if (programlocationid==<?php echo $getprogramlocationid ?>)
		{
			if (checkedcounter==0)
			{
				var checked = "checked";
			}
			else
			{
				var checked = "";
			}
			
			s.insertAdjacentHTML("beforeend", "<input type='radio' name='schedule' value='<?php echo $getschedule ?>' "+checked+">&nbsp;&nbsp;&nbsp;<?php echo $getschedule ?> <br>");
			
			checkedcounter++;
		}
		
		<?php
		}
		?>
	}
	</script>
    <hr>

    <!-- Footer -->
    <?php include "footer.php" ?>

    <?php include "loadfilesfooter.php" ?>

</body>

</html>
