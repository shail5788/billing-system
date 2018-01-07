<?php
    //error_reporting(0);
    session_start();
   if(!isset($_SESSION['user']))
         {
          header('Location:login.php');
         }

   $date=date("Y-m-d");
   $date1=explode('-',$date);
   $year=$date1[0];
   $month=$date1[1];


    include("db/connect.php");
    include_once('resource/api_function.php');
    
    $db=new database($con);
     
     $todayCom=$db->rowCount('complainregister',['date'=>$date]);
  
     $totalCom=$db->rowCount('complainregister',['year'=>$year]);
     
     $totalUnP=$db->rowCount('complainregister',['status'=>'1','year'=>$year]);

     $totalunp=$db->rowCount('complainregister',['status'=>'0','year'=>$year]);

?>

<?php include "include/header.php"; ?>
  <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
         if($_SESSION['type']==4)
         include('navbar/complainheader.php');
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
     <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $todayCom; ?></h3>

              <p>Today Complaint </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalCom; ?></h3>

              <p>Total Complaint </p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $totalUnP; ?></h3>

              <p>Total Processed Complaint </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $totalunp;  ?></h3>

              <p>Total Unprocessed Complaint </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
 
 
 <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
 </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
