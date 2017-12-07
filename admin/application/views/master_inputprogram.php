<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Input Program</title>

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
                    <h1 class="page-header">Input Program</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                        <b>Program Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                        <b>Program Update Failed!</b>
                    </div>
                </div>
            </div>-->
            <form method="post" action="<?php echo base_url()."admin/updatemasterprogram"; ?>">
            <div class="row" style="padding:15px 0">
                <div class="col-lg-12" style="">
                    <div style="overflow-x: auto;font-size: 16px">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th colspan="3"></th>
                                    <th>Category</th>
                                    <th>Program Name</th>
                                    <th>Program Detail</th> 
                                </tr>
                            </thead>
                            <tbody>
								
                                <?php
								$counter=0;
                                $getprogramdetail = $this->model->getprogramdetail();
								foreach($getprogramdetail as $row)
								{
									$dbprogramdetailid = $row['programdetailid'];
									$programdetail = $row['programdetail'];
									$dbprogramid = $row['programid'];
									$dbcategoryid = $row['categoryid'];
									
									$getprogramdata = $this->model->getprogramdata($dbprogramid);
									foreach($getprogramdata as $row)
									{
										$dbprogram = $row['program'];
									}
									
									$getprogramcategorydata = $this->model->getprogramcategorydata($dbcategoryid);
									foreach($getprogramcategorydata as $row)
									{
										$dbcategory = $row['category'];
									}
								?>
								<tr>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background:#cc0000;color:#FFF;border:none" name="deletebutton<?php echo $counter ?>" value="1" id="deletebutton<?php echo $counter ?>"><i class="fa fa-minus" style="color:#FFF"></i></button>
                                    </td>
                                    <td>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="edit(<?php echo $counter ?>);" id="editbutton<?php echo $counter ?>">Edit</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display:none" onclick="cancel(<?php echo $counter ?>);" id="canceleditbutton<?php echo $counter ?>">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" name="edittype<?php echo $counter ?>" onchange="chooseedittype(<?php echo $counter ?>);" id="edittype<?php echo $counter ?>">
                                            <option value="">Choose Type</option>
                                            <option value="editcategory">Edit Category</option>
                                            <option value="editprogram">Edit Program</option>
                                            <option value="editdetail">Edit Detail</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="geneditprogram(this.value,<?php echo $counter ?>)" name="choosecategoryedit<?php echo $counter ?>" id="choosecategoryedit<?php echo $counter ?>">
                                            <option value="">Choose Category</option>
                                            <?php
											$getprogramcategory = $this->model->getprogramcategory();
											foreach($getprogramcategory as $row)
											{
												$categoryid = $row['categoryid'];
												$category = $row['category'];
											?>
												<option value="<?php echo $categoryid ?>" <?php if($dbcategoryid==$categoryid) { echo "selected"; } ?>><?php echo $category ?></option>
											<?php
											}
											?>
                                        </select>
                                        <input type="text" name="editcategory<?php echo $counter ?>" value="<?php echo $dbcategory ?>" class="form-control" id="categoryedit<?php echo $counter ?>" placeholder="Category" style="display:block">
                                    </td>
									<input type="hidden" name="defaultcategoryid<?php echo $counter ?>" value="<?php echo $dbcategoryid ?>">
                                    <td>
                                        <select class="form-control" name="chooseprogramedit<?php echo $counter ?>" id="chooseprogramedit<?php echo $counter ?>">
                                            <option value="">Choose Program</option>
											<?php
											$getprogrampercategory = $this->model->getprogrampercategory($dbcategoryid);
											foreach($getprogrampercategory as $row)
											{
												$programid = $row['programid'];
												$program = $row['program'];
											?>
												<option value="<?php echo $programid ?>" <?php if($dbprogramid==$programid) { echo "selected"; } ?>><?php echo $program ?></option>
											<?php
											}
											?>
                                        </select>
                                        <input type="text" name="editprogram<?php echo $counter ?>" value="<?php echo $dbprogram ?>" class="form-control" id="programedit<?php echo $counter ?>" placeholder="Program Detail" style="display:block">
										<input type="hidden" name="defaultprogramid<?php echo $counter ?>" value="<?php echo $dbprogramid ?>">
									</td>
                                    <td>
                                        <input type="text" name="editprogramdetail<?php echo $counter ?>" value="<?php echo $programdetail ?>" id="programdetailedit<?php echo $counter ?>" class="form-control" style="display:block" placeholder="Program Detail">
                                    </td>
                                </tr>
								<input type="hidden" name="defaultprogramdetailid<?php echo $counter ?>" value="<?php echo $dbprogramdetailid ?>">
								<?php
								$counter++;
								}
								?>
								<Input type="hidden" name="counter" value="<?php echo $counter ?>">
								<tr>
									<td colspan="2">
										<button type="button" class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="deleteitem();" id="deletebutton">Delete</button>
										<button type="button" class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceldelete();" id="canceldeletebutton">Cancel</button>
									</td>
									<td>
										<select class="form-control" name="deletetype" onchange="gendeleteitem(this.value);" id="deletetype" disabled>
                                            <option value="">Choose Type</option>
                                            <option value="deletecategory">Delete Category</option>
                                            <option value="deleteprogram">Delete Program</option>
                                        </select>
									</td>
									<td>
										<select class="form-control" name="choosedeleteitem" onchange="" id="choosedeleteitem" disabled>
                                            <option value="">Choose Item</option>
                                        </select>
									</td>
								</tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none" onclick="add();" id="addbutton">Add</button>
                                        <button class="form-control" style="border-radius: 4px;background: #046376;color:#FFF;border:none;display: none" onclick="canceladd();" id="canceladdbutton">Cancel</button>
                                    </td>
                                    <td>
                                        <select class="form-control" name="addnew" onchange="chooseaddtype();" id="addtype">
                                            <option value="">Choose Type</option>
                                            <option value="newcategory">New Category</option>
                                            <option value="newprogram">New Program</option>
                                            <option value="newdetail">New Detail</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="gennewprogram(this.value)" id="choosecategory" name="choosecategory">
                                            <option value="">Choose Category</option>
                                            <?php
											$getprogramcategory = $this->model->getprogramcategory();
											foreach($getprogramcategory as $row)
											{
												$categoryid = $row['categoryid'];
												$category = $row['category'];
											?>
												<option value="<?php echo $categoryid ?>"><?php echo $category ?></option>
											<?php
											}
											?>
                                        </select>
                                        <input type="text" name="newcategory" class="form-control" id="inputcategory" placeholder="Category" style="display:block">
                                    </td>
                                    <td>
                                        <select class="form-control" onchange="" id="chooseprogram" name="chooseprogram" style="display: block">
                                            <option value="">Choose Program</option>
                                        </select>
                                        <input type="text" name="newprogram" class="form-control" id="inputprogram" placeholder="Program Detail" style="display:block">
                                    </td>
                                    <td>
                                        <input type="text" name="newprogramdetail" class="form-control" id="inputprogramdetail" placeholder="Program Detail" style="display:block">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12" style="margin:20px 0" id="submitprogram">
                    <button type="submit" style="background: #3c763d;color:#FFF;border-radius: 4px;border:none;padding:10px 15px">Save</button>
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
		function gennewprogram(categoryid)
		{
			var s= document.getElementById("chooseprogram");
			s.options.length = 0;
			s.options[s.options.length]= new Option('Choose Program', '');
			<?php
			$getprogram = $this->model->getprogram();
			foreach($getprogram as $row)
			{
				$categoryid = $row['categoryid'];
				$programid = $row['programid'];
				$program = $row['program'];
			?>
			if (categoryid==<?php echo $categoryid ?>)
			{
				s.options[s.options.length]= new Option('<?php echo $program; ?>', '<?php echo $programid; ?>');
			}
			<?php
			}
			?>
		}
		
		function geneditprogram(categoryid,counter)
		{
			var s= document.getElementById("chooseprogramedit"+counter);
			s.options.length = 0;
			s.options[s.options.length]= new Option('Choose Program', '');
			<?php
			$getprogram = $this->model->getprogram();
			foreach($getprogram as $row)
			{
				$categoryid = $row['categoryid'];
				$programid = $row['programid'];
				$program = $row['program'];
			?>
			if (categoryid==<?php echo $categoryid ?>)
			{
				s.options[s.options.length]= new Option('<?php echo $program; ?>', '<?php echo $programid; ?>');
			}
			<?php
			}
			?>
		}
	
		var i = 0;
        function editstart()
        {
            <?php
			$getprogramdetail2 = $this->model->getprogramdetail();
			foreach($getprogramdetail2 as $row)
			{
			?>
				document.getElementById("editbutton"+i).disabled = false;
                document.getElementById("canceleditbutton"+i).disabled = true;
                document.getElementById("edittype"+i).disabled = true;
                document.getElementById("choosecategoryedit"+i).disabled = true;
                document.getElementById("categoryedit"+i).disabled = true;
                document.getElementById("chooseprogramedit"+i).disabled = true;
                document.getElementById("programedit"+i).disabled = true;
                document.getElementById("programdetailedit"+i).disabled = true;

                document.getElementById("editbutton"+i).style.display = "block";
                document.getElementById("canceleditbutton"+i).style.display ="none";
                document.getElementById("edittype"+i).style.display ="block";
                document.getElementById("choosecategoryedit"+i).style.display ="block";
                document.getElementById("categoryedit"+i).style.display ="none";
                document.getElementById("chooseprogramedit"+i).style.display ="block";
                document.getElementById("programedit"+i).style.display ="none";
                document.getElementById("programdetailedit"+i).style.display ="block";
				
				i++;
				
			<?php
			}
			?>
        }
        function edit(x)
        {
            document.getElementById("editbutton"+x).disabled = true;
            document.getElementById("canceleditbutton"+x).disabled = false;
            document.getElementById("edittype"+x).disabled = false;
            document.getElementById("choosecategoryedit"+x).disabled = true;
            document.getElementById("categoryedit"+x).disabled = true;
            document.getElementById("chooseprogramedit"+x).disabled = true;
            document.getElementById("programedit"+x).disabled = true;
            document.getElementById("programdetailedit"+x).disabled = true;

            document.getElementById("editbutton"+x).style.display = "none";
            document.getElementById("canceleditbutton"+x).style.display ="block";
            document.getElementById("edittype"+x).style.display ="block";
            document.getElementById("choosecategoryedit"+x).style.display ="block";
            document.getElementById("categoryedit"+x).style.display ="none";
            document.getElementById("chooseprogramedit"+x).style.display ="block";
            document.getElementById("programedit"+x).style.display ="none";
            document.getElementById("programdetailedit"+x).style.display ="block";
        }
        function cancel(x1)
        {
            document.getElementById("editbutton"+x1).disabled = false;
            document.getElementById("canceleditbutton"+x1).disabled = true;
            document.getElementById("edittype"+x1).disabled = true;
            document.getElementById("choosecategoryedit"+x1).disabled = true;
            document.getElementById("categoryedit"+x1).disabled = true;
            document.getElementById("chooseprogramedit"+x1).disabled = true;
            document.getElementById("programedit"+x1).disabled = true;
            document.getElementById("programdetailedit"+x1).disabled = true;

            document.getElementById("editbutton"+x1).style.display = "block";
            document.getElementById("canceleditbutton"+x1).style.display ="none";
            document.getElementById("edittype"+x1).style.display ="block";
            document.getElementById("choosecategoryedit"+x1).style.display ="block";
            document.getElementById("categoryedit"+x1).style.display ="none";
            document.getElementById("chooseprogramedit"+x1).style.display ="block";
            document.getElementById("programedit"+x1).style.display ="none";
            document.getElementById("programdetailedit"+x1).style.display ="block";
        }
        function chooseedittype(x2) 
        {
            var dropdown = document.getElementById("edittype"+x2);
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "default") {
                document.getElementById("editbutton"+x2).disabled = true;
                document.getElementById("canceleditbutton"+x2).disabled = false;
                document.getElementById("edittype"+x2).disabled = false;
                document.getElementById("choosecategoryedit"+x2).disabled = true;
                document.getElementById("categoryedit"+x2).disabled = true;
                document.getElementById("chooseprogramedit"+x2).disabled = true;
                document.getElementById("programedit"+x2).disabled = true;
                document.getElementById("programdetailedit"+x2).disabled = true;

                document.getElementById("editbutton"+x2).style.display = "none";
                document.getElementById("canceleditbutton"+x2).style.display ="block";
                document.getElementById("edittype"+x2).style.display ="block";
                document.getElementById("choosecategoryedit"+x2).style.display ="block";
                document.getElementById("categoryedit"+x2).style.display ="none";
                document.getElementById("chooseprogramedit"+x2).style.display ="block";
                document.getElementById("programedit"+x2).style.display ="none";
                document.getElementById("programdetailedit"+x2).style.display ="block";
                
            }
            else if (current_value == "editcategory") {
                document.getElementById("editbutton"+x2).disabled = true;
                document.getElementById("canceleditbutton"+x2).disabled = false;
                document.getElementById("edittype"+x2).disabled = false;
                document.getElementById("choosecategoryedit"+x2).disabled = true;
                document.getElementById("categoryedit"+x2).disabled = false;
                document.getElementById("chooseprogramedit"+x2).disabled = true;
                document.getElementById("programedit"+x2).disabled = true;
                document.getElementById("programdetailedit"+x2).disabled = true;

                document.getElementById("editbutton"+x2).style.display = "none";
                document.getElementById("canceleditbutton"+x2).style.display ="block";
                document.getElementById("edittype"+x2).style.display ="block";
                document.getElementById("choosecategoryedit"+x2).style.display ="none";
                document.getElementById("categoryedit"+x2).style.display ="block";
                document.getElementById("chooseprogramedit"+x2).style.display ="block";
                document.getElementById("programedit"+x2).style.display ="none";
                document.getElementById("programdetailedit"+x2).style.display ="block";
                
            }
            else if (current_value == "editprogram") {
                document.getElementById("editbutton"+x2).disabled = true;
                document.getElementById("canceleditbutton"+x2).disabled = false;
                document.getElementById("edittype"+x2).disabled = false;
                document.getElementById("choosecategoryedit"+x2).disabled = true;
                document.getElementById("categoryedit"+x2).disabled = true;
                document.getElementById("chooseprogramedit"+x2).disabled = true;
                document.getElementById("programedit"+x2).disabled = false;
                document.getElementById("programdetailedit"+x2).disabled = true;

                document.getElementById("editbutton"+x2).style.display = "none";
                document.getElementById("canceleditbutton"+x2).style.display ="block";
                document.getElementById("edittype"+x2).style.display ="block";
                document.getElementById("choosecategoryedit"+x2).style.display ="block";
                document.getElementById("categoryedit"+x2).style.display ="none";
                document.getElementById("chooseprogramedit"+x2).style.display ="none";
                document.getElementById("programedit"+x2).style.display ="block";
                document.getElementById("programdetailedit"+x2).style.display ="block";
                
            }
            else if (current_value == "editdetail") {
                document.getElementById("editbutton"+x2).disabled = true;
                document.getElementById("canceleditbutton"+x2).disabled = false;
                document.getElementById("edittype"+x2).disabled = false;
                document.getElementById("choosecategoryedit"+x2).disabled = false;
                document.getElementById("categoryedit"+x2).disabled = true;
                document.getElementById("chooseprogramedit"+x2).disabled = false;
                document.getElementById("programedit"+x2).disabled = true;
                document.getElementById("programdetailedit"+x2).disabled = false;

                document.getElementById("editbutton"+x2).style.display = "none";
                document.getElementById("canceleditbutton"+x2).style.display ="block";
                document.getElementById("edittype"+x2).style.display ="block";
                document.getElementById("choosecategoryedit"+x2).style.display ="block";
                document.getElementById("categoryedit"+x2).style.display ="none";
                document.getElementById("chooseprogramedit"+x2).style.display ="block";
                document.getElementById("programedit"+x2).style.display ="none";
                document.getElementById("programdetailedit"+x2).style.display ="block";
                
            }
        }
        function addstart()
        {
            document.getElementById("addbutton").disabled = false;
            document.getElementById("canceladdbutton").disabled = true;
            document.getElementById("addtype").disabled = true;
            document.getElementById("choosecategory").disabled = true;
            document.getElementById("inputcategory").disabled = true;
            document.getElementById("chooseprogram").disabled = true;
            document.getElementById("inputprogram").disabled = true;
            document.getElementById("inputprogramdetail").disabled = true;

            document.getElementById("addbutton").style.display = "block";
            document.getElementById("canceladdbutton").style.display = "none";
            document.getElementById("choosecategory").style.display = "block";
            document.getElementById("inputcategory").style.display = "none";
            document.getElementById("chooseprogram").style.display = "block";
            document.getElementById("inputprogram").style.display = "none";
            document.getElementById("inputprogramdetail").style.display = "block";
        }
        function add()
        {
            document.getElementById("addbutton").disabled = true;
            document.getElementById("canceladdbutton").disabled = false;
            document.getElementById("addtype").disabled = false;
            document.getElementById("choosecategory").disabled = true;
            document.getElementById("inputcategory").disabled = true;
            document.getElementById("chooseprogram").disabled = true;
            document.getElementById("inputprogram").disabled = true;
            document.getElementById("inputprogramdetail").disabled = true;

            document.getElementById("addbutton").style.display = "none";
            document.getElementById("canceladdbutton").style.display = "block";
            document.getElementById("choosecategory").style.display = "block";
            document.getElementById("inputcategory").style.display = "none";
            document.getElementById("chooseprogram").style.display = "block";
            document.getElementById("inputprogram").style.display = "none";
            document.getElementById("inputprogramdetail").style.display = "block";
            
        }

        function canceladd()
        {
            document.getElementById("addbutton").disabled = false;
            document.getElementById("canceladdbutton").disabled = true;
            document.getElementById("addtype").disabled = true;
            document.getElementById("choosecategory").disabled = true;
            document.getElementById("inputcategory").disabled = true;
            document.getElementById("chooseprogram").disabled = true;
            document.getElementById("inputprogram").disabled = true;
            document.getElementById("inputprogramdetail").disabled = true;

            document.getElementById("addbutton").style.display = "block";
            document.getElementById("canceladdbutton").style.display = "none";
            document.getElementById("choosecategory").style.display = "block";
            document.getElementById("inputcategory").style.display = "none";
            document.getElementById("chooseprogram").style.display = "block";
            document.getElementById("inputprogram").style.display = "none";
            document.getElementById("inputprogramdetail").style.display = "block";
        }
        
        function chooseaddtype() 
        {
            var dropdown = document.getElementById("addtype");
            var current_value = dropdown.options[dropdown.selectedIndex].value;

            if (current_value == "default") {
                document.getElementById("addbutton").disabled = true;
                document.getElementById("canceladdbutton").disabled = false;
                document.getElementById("addtype").disabled = false;
                document.getElementById("choosecategory").disabled = true;
                document.getElementById("inputcategory").disabled = true;
                document.getElementById("chooseprogram").disabled = true;
                document.getElementById("inputprogram").disabled = true;
                document.getElementById("inputprogramdetail").disabled = true;

                document.getElementById("addbutton").style.display = "none";
                document.getElementById("canceladdbutton").style.display = "block";
                document.getElementById("choosecategory").style.display = "block";
                document.getElementById("inputcategory").style.display = "none";
                document.getElementById("chooseprogram").style.display = "block";
                document.getElementById("inputprogram").style.display = "none";
                document.getElementById("inputprogramdetail").style.display = "block";
                
            }
            else if (current_value == "newcategory") {
                document.getElementById("addbutton").disabled = true;
                document.getElementById("canceladdbutton").disabled = false;
                document.getElementById("addtype").disabled = false;
                document.getElementById("choosecategory").disabled = true;
                document.getElementById("inputcategory").disabled = false;
                document.getElementById("chooseprogram").disabled = true;
                document.getElementById("inputprogram").disabled = true;
                document.getElementById("inputprogramdetail").disabled = true;

                document.getElementById("addbutton").style.display = "none";
                document.getElementById("canceladdbutton").style.display = "block";
                document.getElementById("choosecategory").style.display = "none";
                document.getElementById("inputcategory").style.display = "block";
                document.getElementById("chooseprogram").style.display = "block";
                document.getElementById("inputprogram").style.display = "none";
                document.getElementById("inputprogramdetail").style.display = "block";
				
				document.getElementById("choosecategory").required = false;
                document.getElementById("inputcategory").required = true;
                document.getElementById("chooseprogram").required = false;
                document.getElementById("inputprogram").required = false;
                document.getElementById("inputprogramdetail").required = false;
            }
            else if (current_value == "newprogram") {
                document.getElementById("addbutton").disabled = true;
                document.getElementById("canceladdbutton").disabled = false;
                document.getElementById("addtype").disabled = false;
                document.getElementById("choosecategory").disabled = false;
                document.getElementById("inputcategory").disabled = true;
                document.getElementById("chooseprogram").disabled = true;
                document.getElementById("inputprogram").disabled = false;
                document.getElementById("inputprogramdetail").disabled = true;

                document.getElementById("addbutton").style.display = "none";
                document.getElementById("canceladdbutton").style.display = "block";
                document.getElementById("choosecategory").style.display = "block";
                document.getElementById("inputcategory").style.display = "none";
                document.getElementById("chooseprogram").style.display = "none";
                document.getElementById("inputprogram").style.display = "block";
                document.getElementById("inputprogramdetail").style.display = "block";
				
				document.getElementById("choosecategory").required = true;
                document.getElementById("inputcategory").required = false;
                document.getElementById("chooseprogram").required = false;
                document.getElementById("inputprogram").required = true;
                document.getElementById("inputprogramdetail").required = false;
            }
            else if (current_value == "newdetail") {
                document.getElementById("addbutton").disabled = true;
                document.getElementById("canceladdbutton").disabled = false;
                document.getElementById("addtype").disabled = false;
                document.getElementById("choosecategory").disabled = false;
                document.getElementById("inputcategory").disabled = true;
                document.getElementById("chooseprogram").disabled = false;
                document.getElementById("inputprogram").disabled = true;
                document.getElementById("inputprogramdetail").disabled = false;

                document.getElementById("addbutton").style.display = "none";
                document.getElementById("canceladdbutton").style.display = "block";
                document.getElementById("choosecategory").style.display = "block";
                document.getElementById("inputcategory").style.display = "none";
                document.getElementById("chooseprogram").style.display = "block";
                document.getElementById("inputprogram").style.display = "none";
                document.getElementById("inputprogramdetail").style.display = "block";
                
				document.getElementById("choosecategory").required = true;
                document.getElementById("inputcategory").required = false;
                document.getElementById("chooseprogram").required = true;
                document.getElementById("inputprogram").required = false;
                document.getElementById("inputprogramdetail").required = true;
            }
        }
		
		function deleteitem()
        {
            document.getElementById("deletebutton").disabled = true;
            document.getElementById("canceldeletebutton").disabled = false;
            document.getElementById("deletetype").disabled = false;
            document.getElementById("choosedeleteitem").disabled = false;

            document.getElementById("deletebutton").style.display = "none";
            document.getElementById("canceldeletebutton").style.display = "block";
            
        }
		
		function canceldelete()
        {
            document.getElementById("deletebutton").disabled = false;
            document.getElementById("canceldeletebutton").disabled = true;
            document.getElementById("deletetype").disabled = true;
            document.getElementById("choosedeleteitem").disabled = true;

            document.getElementById("deletebutton").style.display = "block";
            document.getElementById("canceldeletebutton").style.display = "none";
            
        }
		
		function gendeleteitem(item)
		{
			if (item=="deletecategory")
			{
				var opt = document.getElementById("choosedeleteitem");
				opt.options.length = 0;
				opt.options[opt.options.length]= new Option('Choose Item', '');
				
				<?php
				$getprogramcategory = $this->model->getprogramcategory();
				foreach($getprogramcategory as $row)
				{
					$categoryid = $row['categoryid'];
					$category = $row['category'];
				?>
					opt.options[opt.options.length]= new Option('<?php echo $category ?>', '<?php echo $categoryid ?>');
				<?php
				}
				?>
			}
			else if (item=="deleteprogram")
			{
				var opt = document.getElementById("choosedeleteitem");
				opt.options.length = 0;
				opt.options[opt.options.length]= new Option('Choose Item', '');
				
				<?php
				$getprogram = $this->model->getprogram();
				foreach($getprogram as $row)
				{
					$programid = $row['programid'];
					$program = $row['program'];
				?>
					opt.options[opt.options.length]= new Option('<?php echo $program ?>', '<?php echo $programid ?>');
				<?php
				}
				?>
			}
		}
    </script>    

</body>

</html>
