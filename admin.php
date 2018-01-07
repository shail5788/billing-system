<?php 
    session_start();
         if(!isset($_SESSION['user']))
         {
          header('Location:login.php');
         }
?>
<?php 

      include('db/connect.php');
      include_once('resource/api_function.php');
      $db=new database($con);
      

      $date1=date("Y-m-d");
      $month=explode('-', $date1);
      $month1=$month[1];
      $year=$month[0];
     
      $newConnection=$db->count_row('customer',['month'=>$month,'year'=>$year]);

      $billDue=$db->count_row('bill',['status'=>'0','year'=>$year]);
      
      
      $totalCollection=$db->select_colum_where('bill',['total'],['status'=>'1','month'=>$month1,'year'=>$year]);
      $sum=0;
      foreach ($totalCollection as $key => $value) {
         
         $sum=$sum+$value['total'];
      
      }
      
     $complain=$db->count_row('complainregister',['month'=>$month1,'year'=>$year]);

?>


<?php include "include/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('navbar/admin-header.php');?>

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
      <!-- Small boxes (Stat box) -->
       <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $newConnection; ?></h3>

              <p>New Connection</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $billDue;?></h3>

              <p>Bill Due</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
           </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $sum; ?></h3>

              <p>Amount Collection</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $complain; ?></h3>

              <p>Complain</p>
            </div>
            <div class="icon">
              <i class="ion ion-steam"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
    
         <!--  <div class="nav-tabs-custom">
           
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-inbox"></i>Bill Collection</li>
            </ul>
            <div class="tab-content no-padding">
           
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div> -->
          <!-- /.nav-tabs-custom -->

          <!-- TO DO List -->
         <!--  <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Pending Actions</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
           <!-- <div class="box-body">
              <ul class="todo-list">
                <li>
                  <!-- drag handle -->
                    <!--  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
          
                  <input type="checkbox" value="">
       
                  <span class="text">Design a nice theme</span>
                  
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
           
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Make the theme responsive</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Check your messages and notifications</span>
                  <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
              </ul>
            </div>

          </div> -->
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

           <!-- solid sales graph -->
          <!-- <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Connections</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            
          </div> -->
          <!-- /.box -->


          <!-- Calendar -->
         
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
