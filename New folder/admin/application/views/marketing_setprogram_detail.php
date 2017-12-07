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

<body onload="start();">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navbar.php" ?>

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Set Program for Student Name</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Set Program for StudentName Successfull!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Set Program for StudentName Failed!</b>
                    </div>
                </div>
            </div>-->
			
			<?php
			$getprogramdetaildata = $this->model->getprogramdetaildata($programdetailid);
			foreach($getprogramdetaildata as $row)
			{
				$categoryid = $row['categoryid'];
				$programid = $row['programid'];
				$programdetail = $row['programdetail'];
				$title = $row['title'];
				$description1 = $row['description1'];
				$description2 = $row['description2'];
				$price = $row['price'];
				$availablestatus = $row['availablestatus'];
				$eventstatus = $row['eventstatus'];
				$installmentstatus = $row['installmentstatus'];
				$downpayment = $row['downpayment'];
				$paymentinstallment = $row['paymentinstallment'];
				$filename = $row['filename'];
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
			
			$getinvoicedata = $this->model->getinvoicedata($invoiceid);
			foreach($getinvoicedata as $row)
			{
				$location = $row['location'];
				$schedule = $row['schedule'];
				$memberid = $row['memberid'];
			}
			
			$getmemberdata = $this->model->getmemberdata($memberid);
			foreach($getmemberdata as $row)
			{
				$studentstatus = $row['studentstatus'];
			}
			?>
            <div class="row" style="padding:15px 0">
                <div class="col-lg-8" style="">
                    <div style="font-size: 16px">
                    <form role="form" method="post" action="<?php echo base_url()."admin/marketingsetpayment/$invoiceid/$programdetailid"; ?>">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tbody>
                                <tr>
                                    <th>
                                        Category
                                    </th>
                                    <td>
                                        <?php echo $category ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Program Name
                                    </th>
                                    <td>
                                        <?php echo $program ?>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>
                                        Program Detail
                                    </th>
                                    <td>
                                        <?php echo $programdetail ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Location and Schedule
                                    </th>
                                    <td>
                                        <?php echo $location ?><br>
                                        <?php echo $schedule ?>
                                    </td>
                                </tr>
								<tr>
                                    <th>
                                        Total Price
                                    </th>
                                    <td>
                                        <div class="input-group custom-search-form">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="padding:6px 10px">
                                                    Rp
                                                </button>
                                            </span>
                                            <input id="totalharga" name="price" type="text" class="form-control" onkeypress="return isNumberKey(event);" value="<?php echo $price ?>" placeholder="Total Price" disabled>
                                        </div>
                                        
                                    </td>
                                </tr>
								<tr id="dponly">
                                    <th>
                                        DP
                                    </th>
                                    <td>
                                        <div class="input-group custom-search-form">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="padding:6px 10px">
                                                    Rp
                                                </button>
                                            </span>
                                            <input type="text" name="downpayment" class="form-control" value="<?php echo $downpayment ?>" placeholder="DP" id="inputdp" onkeypress="return isNumberKey(event);" required>
                                        </div>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Registration Fee
                                    </th>
                                    <td>
                                        <div class="input-group custom-search-form">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="padding:6px 10px">
                                                    Rp
                                                </button>
                                            </span>
                                            <input id="registrationfee" name="registrationfee" type="text" class="form-control" onkeypress="return isNumberKey(event);" value="0" placeholder="Registration Fee" <?php if ($studentstatus=="1"){ echo "disabled"; } ?> required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Discount
                                    </th>
                                    <td>
                                        <div class="input-group custom-search-form">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="padding:6px 10px">
                                                    Rp
                                                </button>
                                            </span>
                                            <input id="totaldiscount" name="discount" type="text" class="form-control" onkeypress="return isNumberKey(event);" placeholder="Discount">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Installment Available
                                    </th>
                                    <td>
                                        <select class="form-control" onchange="geninstallmentstatus();" id="installmentavailable" disabled>
                                            <option value="0" <?php if($installmentstatus=="0") { echo "selected"; } ?>>No</option>
                                            <option value="1" <?php if($installmentstatus=="1") { echo "selected"; } ?>>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr id="paymentinstallment">
                                    <th>
                                        How many installment?
                                    </th>
                                    <td>
                                        <select class="form-control" onchange="createinstallment();" id="paymenttimes" name="paymentinstallmentcounter">
                                            <?php 
                                                for ($i=1; $i <= 12; $i++) { 
                                            ?>
                                                    <option value="<?php echo $i ?>" <?php if ($i==$paymentinstallment){ echo "selected"; } ?>><?php echo $i ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <!-- <div class="input-group custom-search-form">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="padding:6px 10px">
                                                    X
                                                </button>
                                            </span>
                                            <input type="text" name="" class="form-control" onkeypress="return isNumberKey(event); createinstallment(); " placeholder="Payment Installment ex : 2" value="0" id="paymenttimes">
                                        </div> -->
                                    </td>
                                </tr>

                                <tr id="paymentinstallment2">
                                    <th>
                                        Payment Installment
                                    </th>
                                    <td>
                                        <div id="inputpaymentinstallment">
                                            
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <button style="border-radius: 4px;background: #046376;color:#FFF;border:none;padding:5px 10px">Save</button>
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
        function start ()
        {
            geninstallmentstatus();
            firstcreateinstallment();
        }
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        function geninstallmentstatus() 
        {
            var dropdown = document.getElementById("installmentavailable");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "0") {
                document.getElementById("dponly").style.display ="none";
                document.getElementById("paymentinstallment").style.display ="none";
                document.getElementById("paymentinstallment2").style.display ="none";
            }
            else if (current_value == "1") {
                document.getElementById("dponly").style.display ="table-row";
                document.getElementById("paymentinstallment").style.display ="table-row";
                document.getElementById("paymentinstallment2").style.display ="table-row";
                createinstallment();
            }
        }
        function firstcreateinstallment()
        {
            inputpaymentinstallment.innerHTML = "";
            var dropdown = document.getElementById("paymenttimes");
            var current_value = dropdown.options[dropdown.selectedIndex].value;
			var i = 1;
			<?php
			$countpaymentinstallment = $this->model->countpaymentinstallment($programdetailid);
			if ($countpaymentinstallment > 0)
			{
				$getpaymentinstallment = $this->model->getpaymentinstallment($programdetailid);
				foreach($getpaymentinstallment as $row)
				{
					$paymentinstallmentprice = $row['paymentinstallmentprice'];
				?>
					inputpaymentinstallment.innerHTML = inputpaymentinstallment.innerHTML +"<div class='input-group custom-search-form' id='inputpaymentinstallment"+i+"'><span class='input-group-btn'><button class='btn btn-default' type='button' style='padding:6px 10px'>Rp.</button></span><input type='text' name='paymentinstallmentprice"+i+"' value='<?php echo $paymentinstallmentprice ?>' class='form-control' onkeypress='return isNumberKey(event);' placeholder='Payment Installment "+i+"' id='tbpaymentinstallment1'></div>";
					i++;
				<?php
				}
			}
			else
			{
			?>
				for (i = 1; i <= current_value; i++) { 
					inputpaymentinstallment.innerHTML = inputpaymentinstallment.innerHTML +"<div class='input-group custom-search-form' id='inputpaymentinstallment"+i+"'><span class='input-group-btn'><button class='btn btn-default' type='button' style='padding:6px 10px'>Rp.</button></span><input type='text' name='paymentinstallmentprice"+i+"' class='form-control' onkeypress='return isNumberKey(event);' placeholder='Payment Installment "+i+"' id='tbpaymentinstallment1'></div>";
				}
			<?php
			}
			?>
        }
		function createinstallment()
        {
            inputpaymentinstallment.innerHTML = "";
            var dropdown = document.getElementById("paymenttimes");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            for (i = 1; i <= current_value; i++) { 
                inputpaymentinstallment.innerHTML = inputpaymentinstallment.innerHTML +"<div class='input-group custom-search-form' id='inputpaymentinstallment"+i+"'><span class='input-group-btn'><button class='btn btn-default' type='button' style='padding:6px 10px'>Rp.</button></span><input type='text' name='paymentinstallmentprice"+i+"' class='form-control' onkeypress='return isNumberKey(event);' placeholder='Payment Installment "+i+"'  id='tbpaymentinstallment1' required></div>";
            }
        }
    </script>    

</body>

</html>
