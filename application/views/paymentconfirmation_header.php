<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika - Payment Confirmation</title>

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
				$getregistrationfee = $this->model->getregistrationfee($_SESSION['memberid']);
				foreach($getregistrationfee as $row)
				{
					$paymentid = $row['paymentid'];
					$price = $row['price'];
					$paymentstatus = $row['paymentstatus'];
					$paymentduedate = $row['paymentduedate'];
					
					if ($paymentstatus=="0")
					{
						$paymentstatus = "Unpaid";
					}
					else if ($paymentstatus=="1")
					{
						$paymentstatus = "Waiting Confirmation";
					}
					else if ($paymentstatus=="2")
					{
						$paymentstatus = "Paid Off";
					}
				?>
					<div class="col-lg-12" style="margin:10px 0;border:1px solid #CCC">
						<center>
							<br>
							<font style="color: #605E5E;font-weight: bold;font-size: 20px">
								Registration Fee
							</font>
							<br><br><br>
						</center>
						Term of Payment :
						<div style="overflow-x: auto;font-size: 16px">
							<table class="table table-striped table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>#</th>
										<th>About</th>
										<th>Billing Ammount</th>
										<th>Status</th>
										<th>Due Date</th>
										<th>-</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Registration Fee</td>
										<td>Rp <?php echo number_format($price , 0, ',', '.'); ?></td>
										<td><?php echo $paymentstatus ?></td>
										<td><?php echo date('d F Y',strtotime($paymentduedate)); ?></td>
										<?php
										if ($paymentstatus=="Unpaid")
										{
										?>
										<td><a href="<?php echo base_url()."paymentconfirmationdetail/$paymentid"; ?>"><button style="border-radius: 4px;background: #046376;color:#FFF;border:none">Confirm Payment</button></a></td>
										<?php
										}
										else
										{
										?>
										<td>-</td>
										<?php
										}
										?>
										
									</tr>
								</tbody>
							</table>
						</div>
					</div> 
				<?php
				}
				?>
				
				
				<?php
				$getmemberinvoice = $this->model->getmemberinvoice($_SESSION['memberid']);
				foreach($getmemberinvoice as $row)
				{
					$invoiceid = $row['invoiceid'];
					$programdetail = $row['programdetail'];
				?>
					<div class="col-lg-12" style="margin:10px 0;border:1px solid #CCC">
						<center>
							<br>
							<font style="color: #605E5E;font-weight: bold;font-size: 20px">
								<?php echo $programdetail ?>
							</font>
							<br><br><br>
						</center>
						Term of Payment :
						<div style="overflow-x: auto;font-size: 16px">
							<table class="table table-striped table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>#</th>
										<th>About</th>
										<th>Billing Ammount</th>
										<th>Status</th>
										<th>Due Date</th>
										<th>-</th>
									</tr>
								</thead>
								<tbody>
									
									<?php
									$counter=1;
									$getpaymentperinvoice = $this->model->getpaymentperinvoice($invoiceid);
									foreach($getpaymentperinvoice as $row)
									{
										$paymentid = $row['paymentid'];
										$paymentpurpose = $row['paymentpurpose'];
										$price = $row['price'];
										$paymentstatus = $row['paymentstatus'];
										$paymentduedate = $row['paymentduedate'];
										
										if ($paymentstatus=="0")
										{
											$paymentstatus = "Unpaid";
										}
										else if ($paymentstatus=="1")
										{
											$paymentstatus = "Waiting Confirmation";
										}
										else if ($paymentstatus=="2")
										{
											$paymentstatus = "Paid Off";
										}
									?>
									<tr>
										<td><?php echo $counter ?></td>
										<td><?php echo $paymentpurpose ?></td>
										<td>Rp <?php echo number_format($price , 0, ',', '.'); ?></td>
										<td><?php echo $paymentstatus ?></td>
										<td><?php echo date('d F Y',strtotime($paymentduedate)); ?></td>
										<?php
										if ($paymentstatus=="Unpaid")
										{
										?>
										<td><a href="<?php echo base_url()."paymentconfirmationdetail/$paymentid"; ?>"><button style="border-radius: 4px;background: #046376;color:#FFF;border:none">Confirm Payment</button></a></td>
										<?php
										}
										else
										{
										?>
										<td>-</td>
										<?php
										}
										?>
									</tr>
									<?php
									$counter++;
									}
									?>
									
									<?php
									if ($counter=="1")
									{
									?>
									<!-- jika invoice event statusnya 0 dan admin belom memasukan payment DP dan payment installment-->
									<tr>
										<td colspan="6"><center>Waiting for Marketing Confirmation</center></td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				<?php
				}
				?>
				
				
				
            </div>
            
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include "footer.php" ?>

    <?php include "loadfilesfooter.php" ?>

    

</body>

</html>
