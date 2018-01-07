<?php
error_reporting(0);
        include_once("db/connect.php");
        include_once('resource/api_function.php');
        
        $db=new database($con);   //object of query builder
        $api= new apiFunction($db,$con); // object apiFunction class
      
        $query1="select DISTINCT complain_type from complainregister";

        $row=$con->query($query1);

        $query2="select DISTINCT year from complainregister";

        $row1=$con->query($query2);

   //$per=$i*100/$i;
?>
 <?php  include('include/header.php'); ?>

  <!-- Left side column. contains the logo and sidebar -->
 <?php include("navbar/super-adminheader.php"); ?>

 <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>

   <script type="text/javascript">
       $(document).ready(function(){

             $("#year").change(function(){

                 var year=$(this).val();

                 var action="complainMonth";
                 
                 var html="";
                 
                 var getData="GetcomplainData";
                 
                 var glabel=[];
                 var tcomplain=[];
                 var pComplain=[];
                 var upComplain=[];

                 $.post("ajax.php",{getData:getData,year:year},function(data){
                   
                     console.log(data);
                     for(var i=0;i<data.length;i++)
                     {
                       
                         glabel.push(data[i].month);
                         
                         tcomplain.push(data[i].Total_Complain);
                         
                         pComplain.push(data[i].process_comp);
                         
                         upComplain.push(data[i].unprocessed_comp);   
                     
                     }
                      
                     var chartData={
                        labels:glabel,
                        datasets:[
                          
                          {
                            
                            label:'Total Complain',
                            backgroundColor:'rgba(230, 126, 34,1.0)',
                            borderColor:'rgba(230, 126, 34,1.0)',
                            hoverBackgroundColor:'rgba(211, 84, 0,1.0)',
                            hoverBorderColor:'rgba(211, 84, 0,1.0)',
                            data:tcomplain


                          },
                          {
                            
                            label:'Process Complain',
                            backgroundColor:'rgba(46, 204, 113,1.0)',
                            borderColor:'rgba(46, 204, 113,1.0)',
                            hoverBackgroundColor:'rgba(39, 174, 96,1.0)',
                            hoverBorderColor:'rgba(39, 174, 96,1.0)',
                            data:pComplain


                          },
                          {
                            
                            label:'Pending Complain',
                            backgroundColor:'rgba(231, 76, 60,1.0)',
                            borderColor:'rgba(231, 76, 60,1.0)',
                            hoverBackgroundColor:'rgba(200,200,200,1)',
                            hoverBorderColor:'rgba(200,200,200,1)',
                            data:upComplain


                          }

                        ]
                    };
                    var ctx=$("#myChart");
                    Chart.defaults.scale.ticks.beginAtZero=true;
                    var barGraph=new Chart(ctx,{
                        type:'bar',
                        data:chartData

                    });
                   barGraph.destroy(); 
                 },'json'); 

                 


                  html+="<option>Select Month</option>";
                 $.post('ajax.php',{year:year,action:action},function(data){

                        //console.log(data);
                        
                        for(var i=0;i<data.length;i++)
                        {
                             
                             html+="<option value='"+data[i].month+"'>"+data[i].month+"</option>";
                        
                        }
                        
                        $("#month").html(html); 
                
                },'json');

            
               
           });


             $("#complain_type").change(function(){

                 var type=$(this).val();

                 var action="getComplainByType";

                 var glabel=[];
                 var tcomplain=[];
                 var pComplain=[];
                 var upComplain=[];

                 $.post('ajax.php',{action:action,type:type},function(data){

                         console.log(data);

                         for(var i=0;i<data.length;i++)
                         {
                       
                             glabel.push(data[i].month);
                             
                             tcomplain.push(data[i].total_complain);
                             pComplain.push(data[i].process_comp);
                             upComplain.push(data[i].unProcessed_comp);
                         
                         }

                     var chartData={
                        labels:glabel,
                        datasets:[
                          
                          {
                            
                            label:'Total Complain',
                            backgroundColor:'rgba(230, 126, 34,1.0)',
                            borderColor:'rgba(230, 126, 34,1.0)',
                            hoverBackgroundColor:'rgba(211, 84, 0,1.0)',
                            hoverBorderColor:'rgba(211, 84, 0,1.0)',
                            data:tcomplain


                          },
                           {
                            
                            label:'Process Complain',
                            backgroundColor:'rgba(46, 204, 113,1.0)',
                            borderColor:'rgba(46, 204, 113,1.0)',
                            hoverBackgroundColor:'rgba(39, 174, 96,1.0)',
                            hoverBorderColor:'rgba(39, 174, 96,1.0)',
                            data:pComplain


                          },
                          {
                            
                            label:'Pending Complain',
                            backgroundColor:'rgba(231, 76, 60,1.0)',
                            borderColor:'rgba(231, 76, 60,1.0)',
                            hoverBackgroundColor:'rgba(200,200,200,1)',
                            hoverBorderColor:'rgba(200,200,200,1)',
                            data:upComplain


                          }
                          
                          

                        ]
                    };
                    var ctx=$("#myChart");
                    var barGraph=new Chart(ctx,{
                        type:'bar',
                        data:chartData

                    });
                    barGraph.destroy();
                 },'json');
             });
      });
   </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Report And Analysis </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin Tool</li>
        <li class="active">Report And Analysis</li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class='row'>
        <div class="clr-20"></div>
         <div class='col-mid-12'>
            <div class="col-md-2">
              <select class="form-control" name="complain_type" id="complain_type">
                  <option value="">Select Complain Type</option>
                   
                   <?php while($result=$row->fetch_assoc()){ 
                   
                         echo "<option value='".$result['complain_type']."'>".$result['complain_type']."</option>";
                   } ?>
                  
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-control" name="year" id="year">
                  <option value="">Select Year</option>

                   <?php while($result1=$row1->fetch_assoc()){ 
                   
                         echo "<option value='".$result1['year']."'>".$result1['year']."</option>";
                   } ?>

              </select>
            </div>
            <div class="col-md-2">
              <select class="form-control" name="month" id="month">
                  <option value="">Select Month</option>
              </select>
            </div>
         </div> 
        <div class="clr-20"></div>
        <div class="clr-20"></div>
         <div class="col-md-12" id="chart-container">
               <div class="col-md-6">
                 <canvas id="myChart" width="700" height='500'></canvas>
                 </div>
         </div>

      </div>
<!-- ./wrapper -->

</section>
</div>
<?php include_once('include/footer.php')?>
