<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{ 
  header('location:index.php');
}
else{ 

  if(isset($_POST['submit']))
  {
    $vehicletitle=$_POST['vehicletitle'];
    $brand=$_POST['brandname'];
    $vehicleoverview=$_POST['vehicalorcview'];
    $priceperday=$_POST['priceperday'];
    $fueltype=$_POST['fueltype'];
    $modelyear=$_POST['modelyear'];
    $seatingcapacity=$_POST['seatingcapacity'];
    $vimage1=$_FILES["img1"]["name"];
    $vimage2=$_FILES["img2"]["name"];
    $vimage3=$_FILES["img3"]["name"];
    $vimage4=$_FILES["img4"]["name"];
    $vimage5=$_FILES["img5"]["name"];
    $airconditioner=$_POST['airconditioner'];
    $powerdoorlocks=$_POST['powerdoorlocks'];
    $antilockbrakingsys=$_POST['antilockbrakingsys'];
    $brakeassist=$_POST['brakeassist'];
    $powersteering=$_POST['powersteering'];
    $driverairbag=$_POST['driverairbag'];
    $passengerairbag=$_POST['passengerairbag'];
    $powerwindow=$_POST['powerwindow'];
    $cdplayer=$_POST['cdplayer'];
    $centrallocking=$_POST['centrallocking'];
    $crashcensor=$_POST['crashcensor'];
    $leatherseats=$_POST['leatherseats'];
    move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
    move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
    move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
    move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
    move_uploaded_file($_FILES["img5"]["tmp_name"],"img/vehicleimages/".$_FILES["img5"]["name"]);

    $sql="INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner,:powerdoorlocks,:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
    $query->bindParam(':brand',$brand,PDO::PARAM_STR);
    $query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
    $query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
    $query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
    $query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
    $query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
    $query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
    $query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
    $query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
    $query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
    $query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR);
    $query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
    $query->bindParam(':powerdoorlocks',$powerdoorlocks,PDO::PARAM_STR);
    $query->bindParam(':antilockbrakingsys',$antilockbrakingsys,PDO::PARAM_STR);
    $query->bindParam(':brakeassist',$brakeassist,PDO::PARAM_STR);
    $query->bindParam(':powersteering',$powersteering,PDO::PARAM_STR);
    $query->bindParam(':driverairbag',$driverairbag,PDO::PARAM_STR);
    $query->bindParam(':passengerairbag',$passengerairbag,PDO::PARAM_STR);
    $query->bindParam(':powerwindow',$powerwindow,PDO::PARAM_STR);
    $query->bindParam(':cdplayer',$cdplayer,PDO::PARAM_STR);
    $query->bindParam(':centrallocking',$centrallocking,PDO::PARAM_STR);
    $query->bindParam(':crashcensor',$crashcensor,PDO::PARAM_STR);
    $query->bindParam(':leatherseats',$leatherseats,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
      $_SESSION['msg']="Vehicle posted successfully";
    }
    else 
    {
      $_SESSION['error']="Something went wrong. Please try again";
    }

  }


  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <link rel="shortcut icon" href="images/profile.png">
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Car Rental | Create Vehicles</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link type="text/css" href='datatabel/jquery.dataTables.min.css' rel='stylesheet'>
    <link type="text/css" href='datatabel/responsive.dataTables.min.css' rel='stylesheet'>
    <link type="text/css" href='datatabel/buttons.dataTables.min.css' rel='stylesheet'>




  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php include('include/header.php');?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include('include/sidebar.php');?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-pencil"></i> Create a Vehicle</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <?php if(isset($_POST['submit']))

              {?>

                <div class="alert alert-success">
                  <button type="button" id="demoNotify" class="close" data-dismiss="alert">×</button>
                  <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['error']="");?>
                </div>
              <?php } ?>
              
              
              <form method="post" enctype="multipart/form-data">
                <h3 class="tile-title">Basic Info</h3>
                <br/>
                <div class="row">
                  <div class="col-6">
                    <input type="text" class="form-control" name="vehicletitle" placeholder="Vehicle Title" required="">
                  </div>
                  <div class="col-6">
                    <select name="brandname" class="form-control" required="">
                      <option value=""> Select </option>
                      <?php $ret="select id,BrandName from tblbrands";
                      $query= $dbh -> prepare($ret);
                      $query-> execute();
                      $results = $query -> fetchAll(PDO::FETCH_OBJ);
                      if($query -> rowCount() > 0)
                      {
                        foreach($results as $result)
                        {
                          ?>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
                        <?php }} ?>

                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-6">
                      <input type="text" class="form-control" name="priceperday" placeholder="Price Per Day (Rp)" required="">
                    </div>
                    <div class="col-6">
                      <select class="form-control" name="fueltype" required>
                        <option value=""> Select </option>

                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="CNG">CNG</option>
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-6">
                      <input type="text" class="form-control" name="modelyear" placeholder="Model Yaer" required="">
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" name="seatingcapacity" placeholder="Seat Capacity" required="">
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-12">
                      <textarea class="form-control" name="vehicalorcview" rows="5" placeholder="overview" required=""></textarea>
                    </div>
                  </div>
                  <br/>
                  <h3 class="tile-title">Uploads Image</h3>

                  <div class="row">
                    <div class="col-4">
                      <input type="file" class="form-control" name="img1" required="">
                    </div>
                    <div class="col-4">
                      <input type="file" class="form-control" name="img2" required="">
                    </div>
                    <div class="col-4">
                      <input type="file" class="form-control" name="img3" required="">
                    </div>
                  </div>

                  <br/>
                  <div class="row">
                    <div class="col-4">
                      <input type="file" class="form-control" name="img4">
                    </div>
                    <div class="col-4">
                      <input type="file" class="form-control" name="img5">
                    </div>
                  </div>
                  <br/>
                  <h3 class="tile-title">Select Accesories</h3>

                  <div class="row">
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="airconditioner" name="airconditioner" value="1">
                          Air Conditioner
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="powerdoorlocks" name="powerdoorlocks" value="1">
                          Power Door Locks
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
                          AntiLock Braking System
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="brakeassist" name="brakeassist" value="1">
                          Brake Assist
                        </label>
                      </div>
                    </div>
                  </div>


                  <br/>
                  <div class="row">
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="powersteering" name="powersteering" value="1">
                          Power Steering
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="driverairbag" name="driverairbag" value="1">
                          Driver Airbag
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="passengerairbag" name="passengerairbag" value="1">
                          Passenger Airbag
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="powerwindow" name="powerwindow" value="1">
                          Power Windows
                        </label>
                      </div>
                    </div>
                  </div>


                  <br/>
                  <div class="row">
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="cdplayer" name="cdplayer" value="1">
                          CD Player
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="centrallocking" name="centrallocking" value="1">
                          Central Locking
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="crashcensor" name="crashcensor" value="1">
                          Crash Sensor
                        </label>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="leatherseats" name="leatherseats" value="1">
                          Leather Seats
                        </label>
                      </div>
                    </div>
                  </div>
                  <br/>


                  <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Published</button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-Danger" type="reset"><i class="fa fa-fw fa-lg fa-check-circle"></i> Cancel</button>
                  </div>
                </form>
              </div>

            </div>
          </div>

        </div>



      </main>
      <!-- Essential javascripts for application to work-->
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <!-- Google analytics script-->
      <script src="datatabel/jquery.dataTables.min.js"></script>
      <script src="datatabel/dataTables.responsive.min.js"></script>
      <script src="datatabel/dataTables.buttons.min.js"></script>
      <script src="datatabel/buttons.colVis.min.js"></script>

      <script>
       $(document).ready(function() {
        $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          'colvis'
          ]
        } );
      } );
    </script>

  </body>
  </html>
  <?php } ?>