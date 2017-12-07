<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Set Program Detail</title>

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
                    <h1 class="page-header">Set Program Detail</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
			
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
			?>
            <div class="row" style="padding:15px 0">
                <div class="col-lg-8" style="">
                    <div style="font-size: 16px">
					<?php echo form_open_multipart("admin/updateprogramdetail/$programdetailid");?>
					
                        <table class="table table-bordered table-condensed">
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
                                        Layout Program
                                    </th>
                                    <td>
                                        <input type="text" name="title" class="form-control" value="<?php echo $title ?>" placeholder="Title" required>
                                        <textarea class="form-control" name="description1" placeholder="Description 1" required><?php echo $description1 ?></textarea>
                                        <textarea class="form-control" name="description2" placeholder="Description 2" required><?php echo $description2 ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Program Available
                                    </th>
                                    <td>
                                        <select class="form-control" name="availablestatus" id="programavailable" required>
                                            <option value="0" <?php if ($availablestatus=="0") { echo "selected"; } ?>>No</option>
                                            <option value="1" <?php if ($availablestatus=="1") { echo "selected"; } ?>>Yes</option>
                                        </select>
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
                                            <input id="totalharga" name="price" value="<?php echo $price ?>" type="text" class="form-control" onkeypress="return isNumberKey(event);" placeholder="Total Price" required>
                                        </div>
                                        
                                    </td>
                                </tr>
								<tr>
                                    <th>
                                        Event Status
                                    </th>
                                    <td>
                                        <select class="form-control" id="eventstatus" name="eventstatus" required>
                                            <option value="0" <?php if ($eventstatus=="0") { echo "selected"; } ?>>No</option>
                                            <option value="1" <?php if ($eventstatus=="1") { echo "selected"; } ?>>Yes</option>
                                        </select>
                                    </td>
                                </tr>
								<tr>
                                    <th>
                                        Program Image
                                    </th>
                                    <td>
										<input type="file" name="userfile" size="20" /><br>
										<div class="col-lg-12 col-md-12" style="color:#000;padding:10px;border:1px solid #CCC;">
											<img src="<?php echo base_url() ?>/admin/programdetail/<?php echo $filename ?>" style="width:200px;height:150px">
										</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Location and Schedule
                                    </th>
                                    <td>
                                        <table class="table table-condensed" style="margin: 0" id="locationandschedule">
                                            <thead>
                                                <tr>
                                                    <th>Location</th>
                                                    <th>Schedule</th>
                                                </tr>
                                            </thead>
											
                                            <tbody>
											<?php
											$locationcounter = 1;
											$getprogramdetaillocation = $this->model->getprogramdetaillocation($programdetailid);
											foreach($getprogramdetaillocation as $row)
											{
												$programlocationid = $row['programlocationid'];
												$location = $row['location'];
											?>
											<tr id="row,<?php echo $locationcounter ?>">
												<td>
													<input type="text" name="location<?php echo $locationcounter ?>" value="<?php echo $location ?>" placeholder="Location" class="form-control" id="Location<?php echo $locationcounter ?>">
													<input type="button" onclick="pluslocation();" value="Add more location" class="form-control" style="border: none;box-shadow: none;padding:0;margin:0;font-size:12px;text-align: left">
													<!-- <font style="font-size: 12px">Add more location</font> -->
												</td>
												<td style="padding: 5px 0">
												<table class="table-condensed table" style="margin: 0;" id="Schedule<?php echo $locationcounter ?>">
													<tbody>
													<?php
													$schedulecounter = 1;
													$getprogramlocationschedule = $this->model->getprogramlocationschedule($programlocationid);
													foreach($getprogramlocationschedule as $row)
													{
														$schedule = $row['schedule'];
														$validuntil = $row['validuntil'];
													?>
														<tr id="row<?php echo $locationcounter ?>,<?php echo $schedulecounter ?>">
															<td style="border: none;padding: 0 5px">
															   <input type='text' name='schedule<?php echo $locationcounter ?>,<?php echo $schedulecounter ?>' value="<?php echo $schedule ?>" id='schedule<?php echo $locationcounter ?>,<?php echo $schedulecounter ?>' placeholder='Schedule' class='form-control'>
															</td>
															<td style="border: none;padding: 0 5px">
															   <input type='date' name='validuntil<?php echo $locationcounter ?>,<?php echo $schedulecounter ?>' value="<?php echo $validuntil ?>" id='validuntil<?php echo $locationcounter ?>,<?php echo $schedulecounter ?>' placeholder='Valid Until' class='form-control'>
															</td>
															<td style="border: none;padding: 0 5px">
																<input type="button" onclick="deleteschedule(<?php echo $locationcounter ?>,<?php echo $schedulecounter ?>);" value="-" class="form-control" style="font-size:12px;background:#cc0000;color:#FFF">
															</td>
														</tr>
														
														
													<?php
													$schedulecounter++;
													}
													?>
													</tbody>
												</table>
													 <input type="hidden" name="schedulecounter<?php echo $locationcounter ?>" id="schedulecounter<?php echo $locationcounter ?>" value="<?php echo $schedulecounter-1 ?>">
													 <table class="table-condensed table" style="margin: 0;" id="buttonschedule<?php echo $locationcounter ?>">
														<tr>
															<td colspan="5" style="border: none;padding: 0 5px">
																<input type="button" onclick="plusschedule(<?php echo $locationcounter ?>);" value="Add more schedule" class="form-control" style="border: none;box-shadow: none;padding:0;margin:0;font-size:12px;text-align: left">
															</td>
														</tr>
													 </table>
												</td>
											</tr>
											<?php
											$locationcounter++;
											}
											?>
											<tr id="row,<?php echo $locationcounter ?>">
												<td>
													<input type="text" name="location<?php echo $locationcounter ?>" placeholder="Location" class="form-control" id="Location<?php echo $locationcounter ?>">
													<input type="button" onclick="pluslocation();" value="Add more location" class="form-control" style="border: none;box-shadow: none;padding:0;margin:0;font-size:12px;text-align: left">
													<!-- <font style="font-size: 12px">Add more location</font> -->
												</td>
												<td style="padding: 5px 0">
													<table class="table-condensed table" style="margin: 0;" id="Schedule<?php echo $locationcounter ?>">
														<tbody>
														<tr id="row<?php echo $locationcounter ?>,1">
															<td style="border: none;padding: 0 5px">
															   <input type='text' name='schedule<?php echo $locationcounter ?>,1' id='schedule<?php echo $locationcounter ?>,1' placeholder='Schedule' class='form-control'>
															</td>
															<td style="border: none;padding: 0 5px">
															   <input type='date' name='validuntil<?php echo $locationcounter ?>,1' id='validuntil<?php echo $locationcounter ?>,1' placeholder='Valid Until' class='form-control'>
															</td>
															<td style="border: none;padding: 0 5px">
																<input type="button" onclick="deleteschedule(<?php echo $locationcounter ?>,1);" value="-" class="form-control" style="font-size:12px;background:#cc0000;color:#FFF">
															</td>
														</tr>
														<input type="hidden" name="schedulecounter<?php echo $locationcounter ?>" id="schedulecounter<?php echo $locationcounter ?>" value="1">
														</tbody>
													 </table>
													 <table class="table-condensed table" style="margin: 0;" id="buttonschedule1">
														<tr>
															<td colspan="5" style="border: none;padding: 0 5px">
																<input type="button" onclick="plusschedule(<?php echo $locationcounter ?>);" value="Add more schedule" class="form-control" style="border: none;box-shadow: none;padding:0;margin:0;font-size:12px;text-align: left">
															</td>
														</tr>
													 </table>
												</td>
											</tr>
                                                
                                            </tbody>
                                        </table>
										<input type="hidden" name="locationcounter" id="locationcounter" value="<?php echo $locationcounter ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Installment Available
                                    </th>
                                    <td>
                                        <select class="form-control" onchange="geninstallmentstatus();" id="installmentavailable" name="installmentstatus">
                                            <option value="0" <?php if($installmentstatus=="0") { echo "selected"; } ?>>No</option>
                                            <option value="1" <?php if($installmentstatus=="1") { echo "selected"; } ?>>Yes</option>
                                        </select>
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
                                            <input type="text" name="downpayment" value="<?php echo $downpayment ?>" class="form-control" placeholder="DP" id="inputdp" onkeypress="return isNumberKey(event);">
                                        </div>
                                        
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
                inputpaymentinstallment.innerHTML = inputpaymentinstallment.innerHTML +"<div class='input-group custom-search-form' id='inputpaymentinstallment"+i+"'><span class='input-group-btn'><button class='btn btn-default' type='button' style='padding:6px 10px'>Rp.</button></span><input type='text' name='paymentinstallmentprice"+i+"' class='form-control' onkeypress='return isNumberKey(event);' placeholder='Payment Installment "+i+"'  id='tbpaymentinstallment1'></div>";
            }
        }
        function pluslocation()
        {
            
            //
            var table = document.getElementById('locationandschedule');
            var rowCount = table.rows.length;
            var row = table.rows[rowCount-1].id;
            if (row == "")
            {
                a = 1;
                var row = table.insertRow(rowCount);
                row.setAttribute("id", "row," + a);
            }
            else
            {
                var result = row
                result = result.split(',');
                var num = parseInt(result[1]);
                var a = num+1;
                var row = table.insertRow(rowCount);
                row.setAttribute("id", "row," + a );
            }
            
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = "<input type='text' name='location"+a+"' placeholder='Location' class='form-control' id='Location"+a+"'><input type='button' onclick='pluslocation();' value='Add more location' class='form-control' style='border: none;box-shadow: none;padding:0;margin:0;font-size:12px;text-align: left'>";
            cell2.innerHTML = "<table class='table-condensed table' style='margin: 0;' id='Schedule"+a+"'><tr id='row"+a+",1'><td style='border: none;padding: 0 5px'><input type='text' name='schedule"+a+",1' class='form-control' id='schedule"+a+",1' placeholder='Schedule'></td><td style='border: none;padding: 0 5px'><input type='date' name='validuntil"+a+",1' id='validuntil"+a+",1' placeholder='Valid Until' class='form-control'></td><td style='border: none;padding: 0 5px'><input type='button' onclick='deleteschedule("+a+",1);' value='-' class='form-control' style='font-size:12px;background:#cc0000;color:#FFF'></td></tr></table><table class='table-condensed table' style='margin: 0;' id='buttonschedule"+a+"'><tr><td colspan='5' style='border: none;padding: 0 5px'><input type='button' onclick='plusschedule("+a+");' value='Add more schedule' class='form-control' style='border: none;box-shadow: none;padding:0;margin:0;font-size:12px;text-align: left'></td></tr></table>";
			cell3.innerHTML = "<input type='hidden' name='schedulecounter"+a+"' id='schedulecounter"+a+"' value='1'>";
			
			
			document.getElementById('locationcounter').value = a;
	   }
        function plusschedule(xx)
        {
            var table = document.getElementById('Schedule'+xx);
            var rowCount = table.rows.length;
            var row = table.rows[rowCount-1].id;
            var result = row
            result = result.split(',');
            var num = parseInt(result[1]);
            var a = num+1;
            var row = table.insertRow(rowCount);
            row.setAttribute("id", result[0] + "," + a );
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            cell1.innerHTML = "<input type='text' name='schedule"+xx+","+a+"' id='schedule"+xx+","+a+"' placeholder='Schedule' class='form-control'>";
            cell1.style.border = "none";
            cell1.style.padding = "0 5px";
			cell2.innerHTML = "<input type='date' name='validuntil"+xx+","+a+"' id='validuntil"+xx+","+a+"' placeholder='Valid Until' class='form-control'>";
            cell2.style.border = "none";
            cell2.style.padding = "0 5px";
            cell3.innerHTML = "<input type='button' onclick='deleteschedule("+xx+","+a+");' value='-' class='form-control' style='font-size:12px;background:#cc0000;color:#FFF'>";
            cell3.style.border = "none";
            cell3.style.padding = "0 5px";
			
			
			document.getElementById("schedulecounter"+xx+"").value = a+1;	
        }
        function deleteschedule(xx2,xx3)
        {
            var table = document.getElementById('Schedule'+xx2);
            var rowCounter = table.rows.length;
			
            if (rowCounter == 1)
            {
                var r = confirm("This is a last schedule available for this location, if you delete this schedule the location will be deleted.");
                if (r == true) {
                    document.getElementById('row,'+xx2).remove();
                    // document.getElementById('locationandschedule').deleteRow(xx2);
                    var tableparent = document.getElementById('locationandschedule');
                    var rowCount = tableparent.rows.length;
                    var a = rowCount;
                    if (a == 1)
                    {
                        var row = tableparent.insertRow(rowCount);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        cell1.innerHTML = "<input type='button' onclick='deletethis();pluslocation();' value='Add more location' class='form-control' style='border: none;box-shadow: none;padding:0;margin:0;font-size:12px;text-align: left' id='adnewlocationbutton'>";
                        cell2.innerHTML = "";
                        
                    }
                }
            }
            else
            {
                document.getElementById('row'+xx2+','+xx3).remove();
            }
			
			document.getElementById("schedulecounter"+xx2+"").value = xx3-1;	
        }
        function deletethis()
        {
            document.getElementById("adnewlocationbutton").remove();
        }
    </script>    

</body>

</html>
