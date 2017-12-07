<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Payment Confirmation</title>

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
                    <h1 class="page-header">Payment Confirmation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Student Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Program for Student update failed!</b>
                    </div>
                </div>
            </div> -->
            
			<form method="post" action="<?php echo base_url()."admin/filterpaymentconfirmation"; ?>">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <select class="form-control" name="filterbank" onchange="this.form.submit()">
                        <option value="">Bank</option>
						<?php
						$getmasterbank = $this->model->getmasterbank();
						foreach($getmasterbank as $row)
						{
							$masterbankid = $row['masterbankid'];
							$namabank = $row['namabank'];
							$atasnama = $row['atasnama'];
							$norekening = $row['norekening'];
						?>
							<option value="<?php echo $norekening ?>" <?php if ($norekening==$filterbank){ echo "selected"; } ?>><?php echo $namabank ?> - <?php echo $norekening ?> a/n <?php echo $atasnama ?></option>
						<?php
						}
						?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2">
                    <select class="form-control" name="filterprogramid" onchange="this.form.submit()">
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
                                    <th colspan="2"></th>
                                    <th>Student Name</th>
                                    <th>Payment Method</th>
                                    <th>Payment Details</th>
                                    <th>Transferred To</th>
                                    <th>Transferred From</th>
                                    <th>Payment Receipt</th>
                                    <th>Payment Confirm Date</th>
                                </tr>
                            </thead>
							<form role="form" method="post" action="<?php echo base_url()."admin/confirmpayment"; ?>">
                            <tbody>
								<?php
								$getpaymentconfirmation = $this->model->getpaymentconfirmation($filterbank,$filterprogramid,$search);
								foreach($getpaymentconfirmation as $row)
								{
									$paymentconfirmationid = $row['paymentconfirmationid'];
									$memberid = $row['memberid'];
									$paymentid = $row['paymentid'];
									$paymentmethod = $row['paymentmethod'];
									$tobankname = $row['tobankname'];
									$toaccountname = $row['toaccountname'];
									$toaccountnumber = $row['toaccountnumber'];
									$frombankname = $row['frombankname'];
									$fromaccountname = $row['fromaccountname'];
									$fromaccountnumber = $row['fromaccountnumber'];
									$transferammount = $row['transferammount'];
									$filename = $row['filename'];
									$remarks = $row['remarks'];
									$confirmationtime = $row['confirmationtime'];
								
									$getmemberdata = $this->model->getmemberdata($memberid);
									foreach($getmemberdata as $row)
									{
										$name = $row['name'];
									}
									
									$getpaymentdata = $this->model->getpaymentdata($paymentid);
									foreach($getpaymentdata as $row)
									{
										$paymentpurpose = $row['paymentpurpose'];
										$price = $row['price'];
									}
								?>
								<tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none" name="confirmstatus" value="0"><i class="fa fa-minus" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" name="confirmstatus" value="1"><i class="fa fa-check" style="color:#FFF"></i></button>
                                    </td>
									<input type="hidden" name="paymentconfirmationid" value="<?php echo $paymentconfirmationid ?>">
									<input type="hidden" name="paymentid" value="<?php echo $paymentid ?>">
                                    <td>
                                        <?php echo $name ?>
                                    </td>
                                    <td>
                                        <?php echo $paymentmethod ?>
                                    </td>
                                    <td>
                                        <!-- Ambil dari payment details -->
                                        <!-- Ambil juga detail pembayaran untuk payment installment atau apa -->
                                        <b><?php echo $paymentpurpose ?> <br>Billing : Rp <?php echo number_format($price , 0, ',', '.'); ?></b><br>
										<?php echo $remarks ?>
                                    </td>
									<?php
									if ($paymentmethod=="Transfer")
									{
									?>
									<td><?php echo $tobankname ?> - <?php echo $toaccountnumber ?> a/n <?php echo $toaccountname ?></td>
                                    <td><?php echo $frombankname ?> - <?php echo $fromaccountnumber ?> a/n <?php echo $fromaccountname ?><br>Rp <?php echo number_format($transferammount , 0, ',', '.'); ?></td>
									<td>
                                        <a href="#" onClick="window.open('<?php echo base_url() ?>/admin/paymentconfirmation/<?php echo $filename ?>','_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=800, height=640');return(false)">
                                            <button class="form-control">View</button>
                                        </a>
                                    </td>
									<?php
									}
									else
									{
									?>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<?php
									}
									?>
                                   
                                    
                                    <td><?php echo date('d F Y H:i:s',strtotime($confirmationtime)); ?></td>
                                </tr>
								<?php
								}
								?>
                            </tbody>
							</form>
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
