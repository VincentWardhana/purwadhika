<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Input Bank</title>

    <?php include "loadfilesheader.php"; ?>

</head>

<body onload="">

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "navbar.php" ?>

        <!-- Content -->
        <div id="page-wrapper" style="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Bank Data</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Input successful!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Input failed!</b>
                    </div>
                </div>
            </div>-->
            
			<form role="form" method="post" action="<?php echo base_url()."admin/editmasterbank"; ?>">
            <div class="row" style="padding:15px 0">
                <div class="col-lg-12" style="">
                    <div style="overflow-x: auto;font-size: 16px">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Beneficiary Name</th>
                                    <th>Branch</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$bankcounter = 0;
								$getmasterbank = $this->model->getmasterbank($invoiceid);
								foreach($getmasterbank as $row)
								{
									$masterbankid = $row['masterbankid'];
									$norekening = $row['norekening'];
									$atasnama = $row['atasnama'];
									$namabank = $row['namabank'];
									$cabang = $row['cabang'];
								?>
								<tr>
                                    <td>
                                        <a href="<?php echo base_url()."admin/deletemasterbank/$masterbankid"; ?>"><button type="button" class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none" id="delbutton<?php echo $bankcounter ?>"><i class="fa fa-minus" style="color:#FFF"></i></button></a>
                                    </td>
                                    <td>
                                        <button type="button" class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="edit(<?php echo $bankcounter ?>);" id="editbutton<?php echo $bankcounter ?>">Edit</button>
										<button type="button" class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display:none" onclick="cancel(<?php echo $bankcounter ?>);" id="cancelbutton<?php echo $bankcounter ?>">Cancel</button>
                                    </td>
                                    <td>
                                        <input type="text" name="editbankname<?php echo $bankcounter ?>" id="editbankname<?php echo $bankcounter ?>" class="form-control" value="<?php echo $namabank ?>" placeholder="Bank Name" disabled="true" required>
                                    </td>
                                    <td>
                                        <input type="text" name="editaccnumber<?php echo $bankcounter ?>" id="editaccnumber<?php echo $bankcounter ?>" class="form-control" value="<?php echo $norekening ?>" placeholder="Bank Account Number" disabled="true" required>
                                    </td>
                                    <td>
                                        <input type="text" name="editaccname<?php echo $bankcounter ?>" id="editaccname<?php echo $bankcounter ?>" class="form-control" value="<?php echo $atasnama ?>" placeholder="Beneficiary Account" disabled="true" required>
                                    </td>
                                    <td>
                                        <input type="text" name="editbranch<?php echo $bankcounter ?>" class="form-control" id="editbranch<?php echo $bankcounter ?>" value="<?php echo $cabang ?>" placeholder="Branch" disabled="true" required>
                                    </td>
                                </tr>
								<input type="hidden" name="masterbankid<?php echo $bankcounter ?>" value="<?php echo $masterbankid ?>">
								<?php
								$bankcounter++;
								}
								?>
								<input type="hidden" name="bankcounter" value="<?php echo $bankcounter ?>">
                                
                                <tr>
                                    <td colspan="2">
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="add(<?php echo $bankcounter ?>);" id="addbutton">Add</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceladd();" id="canceladdbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <input type="text" name="addbankname" id="bankname" class="form-control" placeholder="Bank Name">
                                    </td>
                                    <td>
                                        <input type="text" name="addaccnumber" id="bankaccount" class="form-control" placeholder="Bank Account Number">
                                    </td>
                                    <td>
                                        <input type="text" name="addaccname" id="beneficiaryaccount" class="form-control" placeholder="Beneficiary Account">
                                    </td>
                                    <td>
                                        <input type="text" name="addbranch" class="form-control" id="branch" placeholder="Branch">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			</form>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        

    </div>
    <!-- /#wrapper -->

    <?php include "loadfilesfooter.php"; ?>

    <script type="text/javascript">
        function edit(x)
        {
			document.getElementById("editbutton"+x).disabled = true;
            document.getElementById("cancelbutton"+x).disabled = false;
            document.getElementById("editbankname"+x).disabled = false;
            document.getElementById("editaccnumber"+x).disabled = false;
            document.getElementById("editaccname"+x).disabled = false;
            document.getElementById("editbranch"+x).disabled = false;

            document.getElementById("editbutton"+x).style.display = "none";
            document.getElementById("cancelbutton"+x).style.display = "block";
        }
        function cancel(xx)
        {
            document.getElementById("editbutton"+xx).disabled = false;
            document.getElementById("cancelbutton"+xx).disabled = true;
            document.getElementById("editbankname"+xx).disabled = true;
            document.getElementById("editaccnumber"+xx).disabled = true;
            document.getElementById("editaccname"+xx).disabled = true;
            document.getElementById("editbranch"+xx).disabled = true;

            document.getElementById("editbutton"+xx).style.display = "block";
            document.getElementById("cancelbutton"+xx).style.display = "none";
        }
		function add(bankcounter)
		{
			var i = 0;
			for (i=0; i<bankcounter; i++)
			{
				document.getElementById("editbutton"+i).disabled = true;
				document.getElementById("cancelbutton"+i).disabled = false;
				document.getElementById("editbankname"+i).disabled = false;
				document.getElementById("editaccnumber"+i).disabled = false;
				document.getElementById("editaccname"+i).disabled = false;
				document.getElementById("editbranch"+i).disabled = false;
			}
		}
        
    </script>

</body>

</html>
