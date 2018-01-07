<?php 
    session_start();
    include_once("db/connect.php");
        include_once('resource/api_function.php');
        
       
     $type=$_POST['type'];
      $consumption=$_POST['get'];
     $new=$_POST['new'];
     $msg='';

        $db=new database($con);   //object of query builder
        $api= new apiFunction($db,$con); // object apiFunction class
   
    if(isset($_POST['submit']))
    {
       if($type=="Domestic" && $consumption=='8')
        {
            
            $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);
          
     
      		if($res)
      			{
      				$msg="Tariff has been updataed ";
      				$_SESSION['message']=$msg;
      				header('Location:tariff.php');
      			}
      		
       }
        elseif($type=="Domestic" && $consumption=='15')
        {

         		
             $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);   
            
      	 			 if($res)
      	 			 {

      	  				$msg="Tariff has been updataed ";
      	  				$_SESSION['message']=$msg;
      	  				header('Location:tariff.php');

      	  			} 
      	}
        elseif($type=="Domestic" && $consumption=='25')
        {

            $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);
           
               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                } 
        }
        elseif($type=="Domestic" && $consumption=='26')
        {

              

              $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);

               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                }

        }

        elseif($type=="Commercial" && $consumption=='8')
        {

           
              $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);

               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                } 
        }
        elseif($type=="Commercial" && $consumption=='15')
        {

             $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);

               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                } 
        }
        elseif($type=="Commercial" && $consumption=='25')
        {

             $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);

               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                } 
        }
        elseif($type=="Commercial" && $consumption=='26')
        {
             

              $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);
           
     
               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                }

        }
        elseif($type=="Non-Commercial" && $consumption=='8')
        {

             

             $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);

           
     
               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                }

        }
        elseif($type=="Non-Commercial" && $consumption=='15')
        {

              $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);

            

     
               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                }

        }
        elseif($type=="Non-Commercial" && $consumption=='25')
        {

             
              $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);
             

     
               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                } 


        }
        elseif($type=="Non-Commercial" && $consumption=='26')
        {

             $res=$api->tariffUpdate('tariff',['price'=>$new],['ctype'=>$type,'consumption'=>$consumption]);
            

               if($res)
               {

                  $msg="Tariff has been updataed ";
                  $_SESSION['message']=$msg;
                  header('Location:tariff.php');

                } 
                
        }




  }

?>