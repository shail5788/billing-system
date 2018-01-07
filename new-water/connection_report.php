<?php error_reporting(0);
    session_start();
   if(!isset($_SESSION['user']))
   {
          header('Location:login.php');
   }
?>
<?php
  
  include('db/connect.php');

?>

<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
 <script type="text/javascript">
           
          $(document).ready(function(){

                var action1="GetAllConnectionYear"; 

                $.post('ajax.php',{action1:action1},function(data){

                       console.log(data);
                       var conYear=[];
                       var conData=[];
                       var conDactData=[];
                       
                       var action="noOfConnection";
                       
                       for(var i=0;i<data.length;i++)
                       {
                          
                          conYear.push(data[i].year);
                          
                          var year=data[i].year;
                          
                          $.post("ajax.php",{action:action,year:year},function(data1){
                                
                                 // console.log(data1);
                                 conData.push(data1.total_connection);
                                 conDactData.push(data1.deActive);
                                // console.log(conData);

                          },'json');

                       }
                        var chartData={
                            labels:conYear,
                            datasets:[
                          
                          {
                            
                            label:'Total Connection',
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba(75,192,192,0.4)",
                            borderColor: "rgba(75,192,192,1)",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "rgba(75,192,192,1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data:conData
                            

                          },
                          {
                            
                            label:'Total Deactivated Connection',
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba(231, 76, 60,1.0)",
                            borderColor: "rgba(231, 76, 60,1.0)",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "rgba(75,192,192,1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(75,192,192,1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data:conDactData
                            

                          }
                         
                        ]
                    };
                    var ctx=$("#yearlyCon");
                        Chart.defaults.scale.ticks.beginAtZero=true;
                      var barGraph=new Chart(ctx,{
                          type:'line',
                          data:chartData

                     });
                    
                     // barGraph.destroy(); 
                      console.log(conData);
                },'json');




                  $('#year').change(function(){
                     
                      var year=$(this).val();
                      var action="getNoOfConnectionYearly";
                      var total=[];
                      var totalC=[];
                      var totalD=[];
                      var glabel=[];
                      $.post('ajax.php',{year:year,action:action},function(data){

                      console.log(data);

                          
                             glabel.push(data.year);
                             total.push(data.total);
                             totalC.push(data.total_Con);
                             totalD.push(data.total_DCon);

                          
                          var chartData={
                            labels:glabel,
                            datasets:[
                          {
                            
                            label:'Total Connection',
                            backgroundColor:'rgba(230, 126, 34,1.0)',
                            borderColor:'rgba(230, 126, 34,1.0)',
                            hoverBackgroundColor:'rgba(211, 84, 0,1.0)',
                            hoverBorderColor:'rgba(211, 84, 0,1.0)',
                            data:total
                            

                          },
                          {
                            
                            label:'Total Active Connection',
                            backgroundColor:'rgba(46, 204, 113,1.0)',
                            borderColor:'rgba(46, 204, 113,1.0)',
                            hoverBackgroundColor:'rgba(39, 174, 96,1.0)',
                            hoverBorderColor:'rgba(39, 174, 96,1.0)',
                            data:totalC
                            

                          },
                          {
                            
                            label:'Total Deactivated Connection',
                            backgroundColor:'rgba(231, 76, 60,1.0)',
                            borderColor:'rgba(231, 76, 60,1.0)',
                            hoverBackgroundColor:'rgba(192, 57, 43,1.0)',
                            hoverBorderColor:'rgba(192, 57, 43,1.0)',
                            data:totalD


                          }
                        

                        ]
                    };
                    var ctx=$("#myChart");
                    
                      var barGraph=new Chart(ctx,{
                          type:'bar',
                          data:chartData

                     });

                      },'json');



                     

                     
                     
                  });

                  $("#month").change(function(){

                       var month =$('#month').val();
                       var year =$('#year').val();
                        //alert(year);

                        $.post('monthlycongraph.php',{year:year,month:month},function(data){

                            $('#monthgraph').html(data);
                        });
                  });
          });
         </script>
<?php include "include/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->

     
 <?php
       
        $type=$_SESSION['type'];
        if($type==1)
        { 
          include('navbar/super-adminheader.php');
        }
        else if($type==2)
        {
         include("navbar/admin-header.php");
        }
        
 ?> 

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Report And Analysis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active"> Connection</li><li class="active">Report And Analysis </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-md-12">
        
         <div class="col-md-3">
       <select id="year" name="year" class="form-control">
       <option value="0">Select Year </option>
  
        <?php 
     $str="select  Distinct year from customer";
     $row11=$con->query($str);
     while($rslt=$row11->fetch_assoc())
       {
         echo"<option value='".$rslt['year']."'>".$rslt['year']."</option>";

       }
        ?>
            

            
       </select></div><div class="col-md-3">
          <select id="month" name ="month" class="form-control">
                   <option value="0">Select Month</option>
                          
          </select>
       </div>
       
      </div>
        
       <!-- Graph code  -->

       <div class='row'>

       <div class="clr-20"></div>
       <div class="clr-20"></div>
       <div class="clr-20"></div>

       <div class='col-mid-12'>
          
          <div class="col-md-5">
            
            <canvas id="yearlyCon" width="700" height="500"></canvas>
          </div>
          <div class="col-md-5">
            
            <canvas id="myChart" width="700" height="500"></canvas>
          </div>
      
   

               <div class="clr30"></div>
              
              <div class="clr30"></div>

</section></div>
<?php include "include/footer.php"; ?>