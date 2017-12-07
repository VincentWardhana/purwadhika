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

<body onload="start();">

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
	$getpaymentdata = $this->model->getpaymentdata($paymentid);
	foreach($getpaymentdata as $row)
	{
		$invoiceid = $row['invoiceid'];
		$paymentpurpose = $row['paymentpurpose'];
		$price = $row['price'];
		$paymentduedate = $row['price'];
	}
	
	$getinvoicedata = $this->model->getinvoicedata($invoiceid);
	foreach($getinvoicedata as $row)
	{
		$programdetail = $row['programdetail'];
	}
	?>
    <div class="container" style="margin-top:60px;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;">
        
        <div class="row" style="">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="col-lg-12" style="margin:10px 0">
                    <center>
                        <br>
                        <font style="color: #605E5E;font-weight: bold;font-size: 30px">
                            Payment Confirmation
                        </font>
                        <br><br>
                        <font style="color: #605E5E;font-weight: bold;font-size: 20px">
                            <?php echo $programdetail ?>
                        </font>
                        <br><br><br>
                    </center>
                </div>    
            </div>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="margin-bottom:30px">
                <div class="col-lg-4">
                    About : <br><?php echo $paymentpurpose ?>
                </div>
                <div class="col-lg-4">
                    Billing : <br>Rp <?php echo number_format($price , 0, ',', '.'); ?>
                </div>
                <div class="col-lg-4">
                    Due Date : <br><?php echo date('d F Y',strtotime($paymentduedate)); ?>
                </div>
            </div>
        </div>
        <div class="row" style="">
            
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url()."confirmpayment/$paymentid"; ?>">
                    
                    <select class="form-control" id="paymentmethod" name="paymentmethod" onchange="check();" required>
                        <option value="">Payment Method</option>
                        <option value="Transfer">Bank Transfer</option>
                        <option value="Debit">Debit Card</option>
                        <option value="Credit">Credit Card</option>
                        <option value="Cash">Cash</option>
                    </select><br>

                    <div id="transferto1">
                        <select class="form-control" name="masterbankid" id="transferto">
                            <option value="">Transferred to</option>
							<?php
							$getmasterbank = $this->model->getmasterbank();
							foreach($getmasterbank as $row)
							{
								$masterbankid = $row['masterbankid'];
								$norekening = $row['norekening'];
								$atasnama = $row['atasnama'];
								$namabank = $row['namabank'];
							?>
								<option value="<?php echo $masterbankid ?>"><?php echo $namabank ?> - <?php echo $norekening ?> a/n <?php echo $atasnama ?></option>
							<?php
							}
							?>
                            
                        </select><br>
                    </div>

                    <div id="debitedctype">
                        <select class="form-control" name="frombanknamedebit" id="frombanknamedebit">
							<option value="">Select Bank</option>
							<?php
							$getmasterbank = $this->model->getmasterbank();
							foreach($getmasterbank as $row)
							{
								$namabank = $row['namabank'];
							?>
								<option value="<?php echo $namabank ?>"><?php echo $namabank ?></option>
							<?php
							}
							?>
                        </select><br>
                    </div>

                    <div id="creditedctype">
                        <select class="form-control"name="frombanknamecredit" id="frombanknamecredit">
							<option value="">Select Bank</option>
							<?php
							$getmasterbank = $this->model->getmasterbank();
							foreach($getmasterbank as $row)
							{
								$namabank = $row['namabank'];
							?>
								<option value="<?php echo $namabank ?>"><?php echo $namabank ?></option>
							<?php
							}
							?>
                        </select><br>
                    </div>
                    
                    <div id="debitcredit">
                        <input type="text" name="remarks" id="remarks" placeholder="Payment Details. Ex : 27 October 2017 Purwadhika Campus with Jeffry" class="form-control"><br>
                    </div>
                    
                    <div id="transferto2">
                        <select class="form-control" name="frombanknametransfer" id="frombanknametransfer">
                            <option value="">From Bank</option>
							<?php
							$getbankmaster = $this->model->getbankmaster();
							foreach($getbankmaster as $row)
							{
								$nama = $row['Nama'];
							?>
								<option value="<?php echo $nama ?>"><?php echo $nama ?></option>
							<?php
							}
							?>
                        </select><br>
                        <input type="text" name="fromaccountname" id="fromaccountname" placeholder="Beneficiary Account Name" class="form-control"><br>
                        <input type="text" name="fromaccountnumber" id="fromaccountnumber" placeholder="Beneficiary Account Number" class="form-control"><br>
                        <input type="number" name="transferammount" id="transferammount" placeholder="Transfer Ammount" class="form-control"><br>
                    </div>

					<font style="font-size: 16px">Upload your payment receipt below :</font><br>
                    <input type="file" name="userfile" id="userfile" class="form-control"><br>
                    
                    <button type="submit" id="simpan" style="background: rgb(96, 94, 94);color: #FFF;" class="form-control" >Save</button>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <?php include "footer.php" ?>

    <?php include "loadfilesfooter.php" ?>

    <script type="text/javascript">
        function start()
        {
            document.getElementById("transferto1").style.display = "none";
            document.getElementById("transferto2").style.display = "none";
            document.getElementById("debitcredit").style.display = "none";
            document.getElementById("debitedctype").style.display = "none";
            document.getElementById("creditedctype").style.display = "none";
            
        }
        function check() 
        {
            var dropdown = document.getElementById("paymentmethod");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "Transfer") 
			{
                document.getElementById("transferto1").style.display = "block";
                document.getElementById("transferto2").style.display = "block";
                document.getElementById("debitcredit").style.display = "none";
                document.getElementById("debitedctype").style.display = "none";
                document.getElementById("creditedctype").style.display = "none";
				
                document.getElementById("transferto").required = true;
                document.getElementById("frombanknametransfer").required = true;
                document.getElementById("fromaccountname").required = true;
                document.getElementById("fromaccountnumber").required = true;
                document.getElementById("transferammount").required = true;
                document.getElementById("userfile").required = true;
                document.getElementById("frombanknamedebit").required = false;
                document.getElementById("frombanknamecredit").required = false;
                document.getElementById("remarks").required = false;
            }
            else if (current_value == "Debit") 
			{
                document.getElementById("transferto1").style.display = "none";
				document.getElementById("transferto2").style.display = "none";
                document.getElementById("debitcredit").style.display = "block";
                document.getElementById("debitedctype").style.display = "block";
                document.getElementById("creditedctype").style.display = "none";
				
				document.getElementById("transferto").required = false;
                document.getElementById("frombanknametransfer").required = false;
                document.getElementById("fromaccountname").required = false;
                document.getElementById("fromaccountnumber").required = false;
                document.getElementById("transferammount").required = false;
                document.getElementById("userfile").required = false;
                document.getElementById("frombanknamedebit").required = true;
                document.getElementById("frombanknamecredit").required = false;
                document.getElementById("remarks").required = false;
            }
            else if (current_value == "Credit") 
			{
                document.getElementById("transferto1").style.display = "none";
                document.getElementById("transferto2").style.display = "none";
                document.getElementById("debitcredit").style.display = "block";
                document.getElementById("debitedctype").style.display = "none";
                document.getElementById("creditedctype").style.display = "block";
                
				document.getElementById("transferto").required = false;
                document.getElementById("frombanknametransfer").required = false;
                document.getElementById("fromaccountname").required = false;
                document.getElementById("fromaccountnumber").required = false;
                document.getElementById("transferammount").required = false;
                document.getElementById("userfile").required = false;
                document.getElementById("frombanknamedebit").required = false;
                document.getElementById("frombanknamecredit").required = true;
                document.getElementById("remarks").required = false;
            }
			else if (current_value == "Cash") 
			{
                document.getElementById("transferto1").style.display = "none";
                document.getElementById("transferto2").style.display = "none";
                document.getElementById("debitcredit").style.display = "block";
                document.getElementById("debitedctype").style.display = "none";
                document.getElementById("creditedctype").style.display = "none";
                
				document.getElementById("transferto").required = false;
                document.getElementById("frombanknametransfer").required = false;
                document.getElementById("fromaccountname").required = false;
                document.getElementById("fromaccountnumber").required = false;
                document.getElementById("transferammount").required = false;
                document.getElementById("userfile").required = false;
                document.getElementById("frombanknamedebit").required = false;
                document.getElementById("frombanknamecredit").required = false;
                document.getElementById("remarks").required = true;
            }
        }

    </script>

</body>

</html>
