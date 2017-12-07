<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika - My Profile</title>

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
        
        <div class="row" style="">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<?php
				if ($this->session->flashdata('updateprofilesuccess')!="")
				{
				?>
					<div class="col-lg-12" style="padding: 15px;background: #dff0d8;color: #3c763d;border-color: #d6e9c6">
						<b><?php echo $this->session->flashdata('updateprofilesuccess'); ?></b>
					</div>
				<?php
				}
				?>
                
                <div class="col-lg-12" style="margin:10px 0">
                    <center>
                        <br>
                        <font style="color: #605E5E">
                            Edit information below to update your profile.
                        </font>
                        <br><br><br>
                    </center>
                </div>
                    
            </div>
        </div>
        <div class="row" style="">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
				<?php
				$getmemberdata = $this->model->getmemberdata($_SESSION['memberid']);
				foreach($getmemberdata as $row)
				{
					$name = $row['name'];
					
					$name = $row['name'];
					$email = $row['email'];
					$birthday = $row['birthday'];
					$occupation = $row['occupation'];
					$institution = $row['institution'];
					$lasteducation = $row['lasteducation'];
					$educationinstitution = $row['educationinstitution'];
					$phonenumber = $row['phonenumber'];
				}
				?>
                <form method="post" action="<?php echo base_url()."updateprofile"; ?>">
					<input type="text" name="name" placeholder="Name" value="<?php echo $name ?>" class="form-control" required><br>
					<input type="email" name="email" placeholder="Email Address" value="<?php echo $email ?>" class="form-control" required><br>
					<div>
						<div class="col-lg-4 col-md-4" style="padding: 0">
							<select class="form-control" name="birthdate" required>
								<option value="">Date</option>
								
								<?php
								for ($i=1; $i<=31; $i++)
								{
								?>
									<option value="<?php echo $i ?>" <?php if ($i == date('d', (strtotime($birthday)))){ echo "selected"; } ?>><?php echo $i ?></option>
								<?php
								}
								?>
								
							</select>
						</div>
						<div class="col-lg-4 col-md-4" style="padding: 0">
							<select class="form-control" name="birthmonth" required>
								<option value="">Month</option>
								<?php
								for ($i=1; $i<=12; $i++)
								{
									if ($i=="1")
									{
										$month = "January";
									}
									else if ($i=="2")
									{
										$month = "February";
									}
									else if ($i=="3")
									{
										$month = "March";
									}
									else if ($i=="4")
									{
										$month = "April";
									}
									else if ($i=="5")
									{
										$month = "May";
									}
									else if ($i=="6")
									{
										$month = "June";
									}
									else if ($i=="7")
									{
										$month = "July";
									}
									else if ($i=="8")
									{
										$month = "August";
									}
									else if ($i=="9")
									{
										$month = "September";
									}
									else if ($i=="10")
									{
										$month = "October";
									}
									else if ($i=="11")
									{
										$month = "November";
									}
									else if ($i=="12")
									{
										$month = "December";
									}
								?>
									<option value="<?php echo $i ?>" <?php if ($i == date('m', (strtotime($birthday)))){ echo "selected"; } ?>><?php echo $month ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="col-lg-4 col-md-4" style="padding: 0">
							<select class="form-control" name="birthyear" required>
								<option value="">Year</option>
								<?php
								$year = date ('Y');
								
								for ($i=0; $i<80; $i++)
								{
								?>
									<option value="<?php echo $year ?>" <?php if ($year == date('Y', (strtotime($birthday)))){ echo "selected"; } ?>><?php echo $year ?></option>
								<?php
								$year--;
								}
								?>
							</select>
						</div>
					</div>
					<br><br>
					<select class="form-control" name="occupation" required>
						<option value="">Occupation</option>
						<?php
						$getoccupationmaster = $this->model->getoccupationmaster();
						foreach($getoccupationmaster as $row)
						{
							$occupation = $row['occupation'];
						?>
						<option value="<?php echo $occupation ?>"><?php echo $occupation ?></option>
						<?php
						}
						?>
					</select><br>
					<input type="text" name="institution" placeholder="Institution Name" value="<?php echo $institution ?>" class="form-control" required><br>
					<input type="text" name="lasteducation" placeholder="Last Education Background" value="<?php echo $lasteducation ?>" class="form-control" required><br>
					<input type="text" name="educationinstitution" placeholder="Education Institution" value="<?php echo $educationinstitution ?>" class="form-control" required><br>
					
					<input type="number" name="phonenumber" placeholder="Mobile Phone" value="<?php echo $phonenumber ?>" class="form-control" required><br>

					<button type="submit" style="background: #046376;color: #FFF;" class="form-control" >Submit</button>
					<br><br>
				</form>
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include "footer.php" ?>

    <?php include "loadfilesfooter.php" ?>

</body>

</html>
