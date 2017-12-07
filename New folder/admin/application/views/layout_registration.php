<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Purwadhika Admin - Layout Registration</title>

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
                    <h1 class="page-header">Change Layout Content Registration</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Layout Updated!</b>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Layout update failed!</b>
                    </div>
                </div>
            </div>
            <div class="row" style="padding:15px 0">
                <div class="col-lg-12" style="padding: 0">
                    <div class="col-lg-4">
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <input type="file" name="" class="form-control">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <img src="https://pbs.twimg.com/profile_images/727238138716807168/YJdfvLsP.jpg" style="width:100%">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <input type="text" name="" placeholder="Title" class="form-control">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <textarea class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <input type="file" name="" class="form-control">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <img src="https://pbs.twimg.com/profile_images/727238138716807168/YJdfvLsP.jpg" style="width:100%">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <input type="text" name="" placeholder="Title" class="form-control">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <textarea class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <input type="file" name="" class="form-control">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <img src="https://pbs.twimg.com/profile_images/727238138716807168/YJdfvLsP.jpg" style="width:100%">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <input type="text" name="" placeholder="Title" class="form-control">
                        </div>
                        <div class="col-lg-12" style="padding:0;margin:10px 0">
                            <textarea class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" style="margin:20px 0">
                    <button type="submit" style="background: #3c763d;color:#FFF;border-radius: 4px;border:none;padding:10px 15px">Save</button>
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
