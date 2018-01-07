<?php
     include("db/connect.php");
     include('function.php');
     session_start();

 class apiFunction
 {
   
	    public $customer_id;
	    public $merter_id;
	    public $previous_m;
      public $c_reading;
	    public $db;
	    public $con;
      public $mobile;
      public $emp_id;
     

         
        public function __construct(database $db,$con)
        {
               $this->db=$db;
               $this->con=$con;  
        }
        
        // @ Customer Module 

        public function create_customer($customerDetail)
        {
         
             $create=$this->db->insert('customer',$customerDetail);
             
             return $create;
        
        }
        public function generateComplain($data)
        {

                $response=$this->db->insert('complainregister',$data);

                return $response;

        }
        public function get_customerById($table,$customer_id)
        {
             
             // $customer_id is an associative array 

             $this->customer_id=$customer_id;
              
             $data=$this->db->LikeQuery($table,$this->customer_id);

             return $data;


        }
        public function get_customerByMobile($mobile)
        {


             $this->mobile=$mobile;
              
             $data=$this->db->select('customer',['mobile'=>$this->mobile]);

             return $data;
        
        }
        public function get_customerByMeterId($meter_id)
        {

            
            $this->meter_id=$meter_id;

            $data=$this->db->select('customer',['meter_id'=>$this->meter_id]);

            return $data;


        }
        public function sendForApprovel($table,$customer)
        {

            $response=$this->db->insert($table,$customer);

            return $response;

        }
        public function deActivate($customer_id)
        {

            $this->customer_id=$customer_id;
            
            $response=$this->db-row_update('customer',['isActive'=>'0'],['customer_id'=>$customer_id]);

            return $response;


        }
       //@ User Module 
       
        public function create_user($user)
        {
            
            $response=$this->db->insert($user);
            
            return $response;
        }
        public function edit_user($user)
        {
              
              $emp_id=$user['emp_id'];
              
              $response=$this->db->row_update('employee',$user,['emp_id'=>$emp_id]);

              return $response;
        
        }


        public function getCustomerInfo($customer_id,$merter_id=null)
        {

           $this->customer_id=$customer_id;
           $this->meter_id=$meter_id;

          
           if($this->customer_id!='')
           {
              
              $customer=$this->db->select('customer',['customer_id'=>$this->customer_id]);
              return $customer;
           }
           else if($this->meter_id != '')
           {
             
              $costomer=$this->db->select('customer',['meter_id'=>$merter_id]);
              return $customer;
           }
         
  


        }
        public function getEmployeeInfo($emp_id,$Mobile=null)
        {
               
              
              $this->emp_id=$emp_id;
              $this->mobile=$mobile;
              
              if($this->emp_id!='')
              {
                
                $emp=$this->db->select('employee',['emp_id'=>$this->emp_id]);
                return $emp;
              }
              else if($this->mobile != '')
              {
               
                $emp=$this->db->select('employee',['contactNo'=>$this->mobile]);
                return $emp;
              
              }
        
        }
        public function getPhoto($customer_id)
        {
            
            $photo=$this->db->select('document',['customer_id'=>$customer_id]);

            return $photo;
        }
        public function getEmployeePhoto($emp_id)
        {
            
            
            $photo=$this->db->select('employeephoto1',['emp_id'=>$emp_id]);

            return $photo;
        

        }
        public function getEmployeeAsset($emp_id)
        {
            
            
           $assets=$this->db->select_colum_where('assets',['asset_name','brand','asset_id'],['emp_id'=>$emp_id]);

            return $assets;
        

        }
        public function updateEmployeeInfo($table,$data)
        {
            
            $status= $this->db->row_update($table,$data,['emp_id'=>$data['emp_id']]);
            
            return $status;
        
        }
        public function updateAssetInfo($table,$data,$emp_id)
        {

            
            $status= $this->db->row_update($table,$data,['id'=>$emp_id]);
            
            return $status;
        
        }
        public function getTempData($table,$id)
        {

              $data=$this->db->select($table,['customer_id'=>$id]);

              return $data;

        }
        public function managingEmployee($param)
        {
                 

                 $emp_type=$param['emp_type'];
                 
                 $emp_id=$param['emp_id'];
                 

                 if($emp_type=="2" || $emp_type=="3")
                 {
                       
                       $response1=$this->db->row_update('employee',['emp_type'=>$emp_type,'mr_type'=>''],['emp_id'=>$emp_id]);

                       $response2=$this->db->row_update('login',['login_type'=>$emp_type],['emp_id'=>$emp_id]);
                       
                       if($response1 && $response2)
                       {
                            return true;
                       }
                       else
                       {
                            return false;
                       }


                 }
                 else if($emp_type=="5")
                 {
                     
                      $area=$param['area'];

                      $array=array('emp_type'=>$emp_type,'assign_area'=>$area,'mr_type'=>'');
                      
                      $response1=$this->db->row_update('employee',$array,['emp_id'=>$emp_id]);

                      $response2=$this->db->row_update('login',['login_type'=>$emp_type],['emp_id'=>$emp_id]);

                      if($response1 && $response2)
                      {
                           return true;
                      }
                      else
                      {
                          return false ;
                      }

                 }
                 else
                 {

                      
                      $mrtype=$param['mrType'];
                      
                      $array=array('emp_type'=>$emp_type,'mr_type'=>$mrtype,'assign_area'=>'');
                      
                      $response1=$this->db->row_update('employee',$array,['emp_id'=>$emp_id]);

                      $response2=$this->db->row_update('login',['login_type'=>$emp_type],['emp_id'=>$emp_id]);

                      if($response1 && $response2)
                      {
                           return true;
                      }
                      else
                      {
                          return false ;
                      }

                 }

        }
        public function tariffUpdate($table,$data,$cond)
        {
          
               $res=$this->db->row_update($table,$data,$cond);

               return $res;

        }
        public function addArea($table,$data)
        {

             $res=$this->db->insert($table,$data);

             return $res;

        }

        public function saveMail($table, $data)
        {

             
              $status=$this->db->insert($table,$data);
             
              return $status;
        
        }
        public function gettingDataforApproval($table,$numRow)
        {
             
              $data=$this->db->getAllWithLimit($table,$numRow);

              return $data;

        }
        public function approvingProcess($table,$record,$cond)
        {
               
               
               $response=$this->db->row_update($table,$record,$cond);

               return $response;


        }

        public function dataRemove($table,$condition)
        {

             
             $response=$this->db->delete($table,$condition);

             return $response;
        
        }
	    public function getPreviousReading($customer_id,$date2,$meter_id=null) // for employees
	    {
	       
	          
            $this->customer_id=$customer_id;
	          $this->meter_id=$meter_id;
	          $this->previous_m=$date2;

	         
  			  
  			      $qery="select * from customer where customer_id='$this->customer_id' OR meter_id='$this->meter_id' ";
	            
	            $row=$this->con->query($qery);
	            $result=$row->fetch_assoc();
	           
              $cun_type=$result['type_of_customer'];

	            $empid=$_SESSION['empid'];
	            $data=$this->db->select('employee',['emp_id'=>$empid]);
	            $mrtype=$data[0]['mr_type'];
            
                if($cun_type!=$mrtype)
                {
                   
                    
                    $this->customer_id='';
                    $qery="select * from customer where customer_id='$this->customer_id' OR meter_id='$this->meter_id' ";
                    $row=$this->con->query($qery);
                    $result=$row->fetch_assoc();

                }
                else
                {
                     
                      /*   Code For getting previous meter reading    */
                    
                      $this->previous_m;
                      $string=explode('-', $this->previous_m);
                      $month=$string[1];
                      $year=$string[2];
                      $year1=$year-1;

                      $monthS=$month-1;
                       $month1="0".$monthS;
                      $nov="11";
                      $dec="12"; 
                      if($month=="01")
                      {
                            
                            $getM=$this->db->select('bill',['month'=>'12','year'=>$year,'customer_id'=>$this->customer_id]); 
                            
                             return $getM[0]['meterReading'];
                             
                             if($getM[0]['meterReading']=='')
                             {
                                $result1=$getM['meterReading'];
                                return $result=0;
                             }

                      }
                      if($month!="11" && $month!="12")
                      {
                             
	                          $getM=$this->db->select('bill',['month'=>$month1,'year'=>$year,'customer_id'=>$this->customer_id]);
	                          return $previous_meterReading= $getM[0]['meterReading'];
                        
                       }
                       else
                       {
                        
	                           $getM=$this->db->select('bill',['month'=>$monthS,'year'=>$year,'customer_id'=>$this->customer_id]);
	                           return $previous_meterReading= $getM[0]['meterReading'];
                       }
               
               }  

	        
	    }

      public function previousReading($customer_id,$date2,$meter_id=null)
      {

            

            $this->customer_id=$customer_id;
            $this->meter_id=$meter_id;
            $this->previous_m=$date2;

           
          
              $qery="select * from customer where customer_id='$this->customer_id' OR meter_id='$this->meter_id' ";
              
              $row=$this->con->query($qery);
              $result=$row->fetch_assoc();
             
              $cun_type=$result['type_of_customer'];

             
                  
                      /*   Code For getting previous meter reading    */
                    
                      $this->previous_m;
                      $string=explode('-', $this->previous_m);
                      $month=$string[1];
                      $year=$string[2];
                      $year1=$year-1;

                      $monthS=$month-1;
                       $month1="0".$monthS;
                      $nov="11";
                      $dec="12"; 
                      if($month=="01")
                      {
                            
                            $getM=$this->db->select('bill',['month'=>'12','year'=>$year,'customer_id'=>$this->customer_id]); 
                            
                             return $getM[0]['meterReading'];
                             
                             if($getM[0]['meterReading']=='')
                             {
                                $result1=$getM['meterReading'];
                                return $result=0;
                             }

                      }
                      if($month!="11" && $month!="12")
                      {
                             
                            $getM=$this->db->select('bill',['month'=>$month1,'year'=>$year,'customer_id'=>$this->customer_id]);
                            return $previous_meterReading= $getM[0]['meterReading'];
                        
                       }
                       else
                       {
                        
                             $getM=$this->db->select('bill',['month'=>$monthS,'year'=>$year,'customer_id'=>$this->customer_id]);
                             return $previous_meterReading= $getM[0]['meterReading'];
                       }
               
               


      }

	    public function getReading($customer_id,$date2,$cr,$meter_id=null)
	    {

                 

                 $this->customer_id=$customer_id;
	               $this->meter_id=$meter_id;
	               $this->previous_m=$date2;
                 $this->c_reading=$cr;
                 $_SESSION['customer_id']=$this->customer_id;
                 
                 $prev_m=$this->getPreviousReading($this->customer_id, $this->previous_m);
                 if($prev_m==0)
                 {
                     return $this->c_reading;
                 }
                 else
                 {
                 	 
                    $final_reading=$this->c_reading-$prev_m;
                    return $final_reading;

                 } 





	   }
     public function findAmount($getUnitPrice,$final_reading)
     {
         
        

               if($final_reading>0 && $final_reading<=8)
               {

                 
                   $amount= $this->getReadingAmount($final_reading,$getUnitPrice[0]['price']);
                    
                
               }
               else if($final_reading>8 && $final_reading<=15)
               {
                  
                   $amount=$this->getReadingAmount($final_reading,$getUnitPrice[1]['price']);
                   
               
               }
               else if($final_reading>15 && $final_reading<=25)
               {
                     
                   $amount=$this->getReadingAmount($final_reading,$getUnitPrice[2]['price']);
                   
               
               }
               else 
               {
                    
                   $amount=$this->getReadingAmount($final_reading,$getUnitPrice[3]['price']);
                 
               
               }

         
         return $amount;

     } 

     public function acualUnitPrice($getUnitPrice,$get_actual_reading)
     {

            $unit_price=0;
            
               if($get_actual_reading > 0 && $get_actual_reading<=8)
               {
                 
                  $unit_price= $getUnitPrice[0]['price']; 
                  
               }
               else if($get_actual_reading>8 && $get_actual_reading<=15)
               {
                
                  $unit_price= $getUnitPrice[1]['price'];
                
               }
               else if($get_actual_reading>15 && $get_actual_reading<=25)
               {
                   
                  
                  $unit_price= $getUnitPrice[2]['price'];
                 
               }
               else 
               {

                  $unit_price=$getUnitPrice[3]['price'];
                 
               }

            return $unit_price;


     } 
     public function getUnitPrice($customer_type)
     {
            

            // $customer_type=$this->customer_type();
            
            $tariff=$this->db->select('tariff',['ctype'=>$customer_type]);
            
            return $tariff;

            
     }

     public function customer_type()
     {
          
          
          $c_id=$_SESSION['customer_id'];
          
          $customer=$this->db->select_colum_where('customer',['type_of_customer'],['customer_id'=>$c_id]);

          $customer_type=$customer[0]['type_of_customer'];
          
          return $customer_type;

     
     }

     public function getReadingAmount($getReading,$getTarrif)
     {

               return ($getReading*$getTarrif); 
     }

     public function getExtra()
     {

             $getExtra=$this->db->fetch_all('extra_charge');
             
             return $getExtra;
 
     } 

     public function GetImageExtension($imagetype)
     {  

            if(empty($imagetype)) return false;

                
                switch($imagetype)
                {
                    
                    case 'image/bmp': return '.bmp';
                    
                    case 'image/gif': return '.gif';
                    
                    case 'image/jpeg': return '.jpg';
                    
                    case 'image/png': return '.png';
                    
                    default: return false;

                }


     }
       /* 
      *  check bill paid or not paid 
      *
      */
      public function checking_payment_done($month,$customer_id,$year)
      {
        
          $data= $this->db->select('billpay',['bill_month'=>$month,'bill_year'=>$year,'customer_id'=>$customer_id]);

           if(!empty($data))
           {
              return $status=true;
           }
           else{
              return $status=false;
           }
      }

      public function make_bill_payment($data)
      {
           $status=$this->db->insert('billpay',$data);
           return $status;
      }

      public function update_bill_status($update,$condition)
      {
          $status=$this->db->row_update('bill',$update,$condition);
          return $status;
      }


      public function imageUpload($file,$bill_id)
      {
          
        
    
           if (!empty($file["name"]))
           {
                

                $file["name"];
                $temp_name=$file["tmp_name"];
                $imgtype=$file["type"];
                $ext=$this->GetImageExtension($imgtype);
                $imagename="bill_no".$bill_id.$ext;
                $target_path = "meterPic/".$imagename;
                if(move_uploaded_file($temp_name, $target_path))
                {

                     return $target_path;       
                }
                else 
                {
                     return "Sorry !";
                }
           
           }


      }
      public function empImageUpload($file,$bill_id)
      {
          
        
    
           if (!empty($file["name"]))
           {
                

                $file["name"];
                $temp_name=$file["tmp_name"];
                $imgtype=$file["type"];
                $ext=$this->GetImageExtension($imgtype);
                $imagename="bill_no".$bill_id.$ext;
                $target_path = "empphoto/".$imagename;

                if(move_uploaded_file($temp_name, $target_path))
                {

                     $array=array('pic_name'=>$imagename,'path'=>$target_path);
                     return $array;       
                }
                else 
                {
                     return "Sorry !";
                }
           
           }


      }

      public function multiImage($file,$customer_id)
      {
           
           $response="";


           foreach ($_FILES['picture']['tmp_name'] as $key => $tmp_name) 
           {
       
              
                     if (!empty($_FILES["picture"]["name"][$key]))
                     {

                           $file_name=$_FILES["picture"]["name"][$key];
                           $imgtype=$_FILES["picture"]["type"][$key];
                           $size=$_FILES["picture"]["size"][$key];
                           $ext=$this->GetImageExtension($imgtype);
                           $name_type=array("photo","IdPtoof","AddressProof");
                           for($i=0;$i<3;$i++)
                           {
                               
                              $imagename=$customer_id.$name_type[$i].$ext;
                              $target_path = "document/".$imagename;
                              $temp_name=$_FILES["picture"]["tmp_name"][$i];
                              

                                 
                                       
                                  
                                  if(move_uploaded_file($temp_name,$target_path))  
                                  {
                                    
                                       $array=array('customer_id'=>$customer_id,'doc_name'=>$imagename,'doc_path'=>$target_path);
                                   
                                       $res=$this->db->insert('document',$array);
                                         
                                       if($res)
                                       {
                                        
                                         $response=true;
                                       
                                       }
                                       else
                                       {

                                         $response=false;
                                       
                                       }
                                  

                                   }
                            
                            
                            
                          }
                      
                      }      
            
            }

          return $response;
    
    }
    // for updating existing Document 

    public function multiImageUpdate($file,$customer_id,$array1)
    {
          
           return "hiiii";

           /*$response="";
           foreach ($_FILES['picture']['tmp_name'] as $key => $tmp_name) 
           {
       
              
                     if (!empty($_FILES["picture"]["name"][$key]))
                     {

                           $file_name=$_FILES["picture"]["name"][$key];
                           $imgtype=$_FILES["picture"]["type"][$key];
                           $size=$_FILES["picture"]["size"][$key];
                           $ext=$this->GetImageExtension($imgtype);
                           $name_type=array("photo","IdPtoof","AddressProof");
                           for($i=0;$i<3;$i++)
                           {
                               
                                $imagename=$customer_id.$name_type[$i].$ext;
                               // $imagename=$file_name;
                                $target_path = "document/".$imagename;
                                $temp_name=$_FILES["picture"]["tmp_name"][$i];
                                
                                if(move_uploaded_file($temp_name,$target_path))  
                                {
                                  
                                     $array=array('customer_id'=>$customer_id,'doc_name'=>$imagename,'doc_path'=>$target_path);

                                     $res=$this->db->row_update('document',$array,['doc_id'=>$array1[$i]]);

                                         if($res)
                                         {
                                          
                                           $response=true;
                                         
                                         }
                                         else
                                         {

                                           $response=false;
                                         
                                         }
                                

                                 }
                            
                            
                            }
                      
                      }      
            
            }

            return $response;*/
    } 

      public function getMonth($month)
      {

             $mstring="";
             switch($month)
             {
                   

                   case "01":
                     $mstring="Jan";
                     break;
                   case "02":
                    $mstring="Fab";
                    break;
                   case "03":
                    $mstring="March";
                    break;
                   case "04":
                    $mstring="April";
                    break;
                   case "05":
                    $mstring="May";
                    break;
                   case "06":
                    $mstring="June";
                    break;
                   case "07":
                    $mstring="July";
                    break;
                   case "08":
                    $mstring="Aug";
                    break;
                   case "09":
                    $mstring="Sept";
                    break;
                   case "10":
                    $mstring="Oct";
                    break;
                   case "11":
                    $mstring="Nov";
                    break;
                   case "12":
                    $mstring="Dec";
                    break;
             

             }
             return $mstring;
      }

      public function billingDetail($customer_id,$date,$reading,$meter_id=null)
      {
          
          
            $this->customer_id=$customer_id;
            $this->meter_id=$meter_id;
            $this->previous_m=$date;
            $this->c_reading=$reading;

            $date=explode('-', $this->previous_m);
            $month=$date[1];
            $mstring=$this->getMonth($month); // get month name  

            

            $getCustomer=$this->getCustomerInfo($this->customer_id); // Get customer details 
            $customer=$getCustomer[0]['customer_fullname'];
            $address=$getCustomer[0]['address'];
            $mobile=$getCustomer[0]['mobile'];
            

            $pre_reading=$this->getPreviousReading($this->customer_id, $this->previous_m);
            
            $get_actual_reading=$this->getReading($this->customer_id,$this->previous_m,$this->c_reading);

             $current_reading=$pre_reading+$get_actual_reading;
             
             // get Unit Price chart  
             $getUnitPrice=$this->getUnitPrice();
           
             // get Unit Price According our consumption 
             $unitPrice=$this->acualUnitPrice($getUnitPrice,$get_actual_reading); 
           
             // find Actual reading amount
             $readingAmt=$this->findAmount($getUnitPrice,$get_actual_reading);   

             $customer_type =$this->customer_type(); 

             //get Extra charges 
             $getExtra=$this->getExtra();
             $extra_charge=$getExtra[0]['sanitary']+$getExtra[0]['meter_charge']+$getExtra[0]['other_charge'];
             $final_total=$readingAmt+$extra_charge;
             $bill_id=rand(1000000,9999999);
             
             $bill =array("bill_id"=>$bill_id,"date"=>$this->previous_m,
                          "customer_id"=>$this->customer_id,"pre_reading"=>$pre_reading,
                          "month"=>$mstring,
                          "current_reading"=>$current_reading,
                          'actual_reading'=>$get_actual_reading,
                          "unit_price"=>$unitPrice,'amount'=>$readingAmt,
                          "total sum"=>$final_total,
                          "customer_type"=>$customer_type,"customer_name"=>$customer,
                          'address'=>$address,
                          "mobile"=>$mobile,
                          'extra'=>$getExtra);

             return $bill;





      }
      public function generateBill($billingDetail) 
      {

       // customer Information 

       $customer_id=$billingDetail['customer_id'];
       $customer_name=$billingDetail['customer_name'];
       $customer_type=$billingDetail['customer_type'];
       $address=$billingDetail['address'];
       $mobile_no=$billingDetail['mobile'];

      // Billing Information 
       $bill_id=$billingDetail['bill_id'];
       $current_reading=$billingDetail['current_reading'];
       $previous_reading=$billingDetail['pre_reading'];
       $actual_reading=$billingDetail['actual_reading'];
       $unit_price=$billingDetail['unit_price'];
       $amount=$billingDetail['amount'];
       $total=$billingDetail['total sum'];
       $extra_charge=$total -$amount;
       $bill_month=$billingDetail['month'];
       $billing_date=$billingDetail['date'];
       
       // Extra charges 
       
        $sanitary=$billingDetail['extra'][0]['sanitary'];
        $meter_cost=$billingDetail['extra'][0]['meter_charge'];
        $other_charge=$billingDetail['extra'][0]['other_charge'];

        $printingData=
        $this->occupySpace().$this->spaceCount($area).$area."\n\n".
        $this->occupySpace().$this->spaceCount($bill_id).$bill_id."\n\n".
        $this->occupySpace().$this->spaceCount($customer_id).$customer_id."\n\n".
        $this->occupySpace().$this->spaceCount($customer_name).$customer_name."\n\n".
        $this->occupySpace().$this->spaceCount($customer_type).$customer_type."\n\n".
        $this->occupySpace().$this->spaceCount($bill_month).$bill_month."\n\n".
        $this->occupySpace().$this->spaceCount($current_reading).$current_reading."\n\n".
        $this->occupySpace().$this->spaceCount($billing_date).$billing_date."\n\n".
        $this->occupySpace().$this->spaceCount($previous_reading).$previous_reading."\n\n".
        $this->occupySpace().$this->spaceCount($actual_reading).$actual_reading."\n\n".
        $this->occupySpace().$this->spaceCount($amount).$amount."\n\n".
        $this->occupySpace().$this->spaceCount($sanitary).$sanitary."\n\n".
        $this->occupySpace().$this->spaceCount($meter_cost).$meter_cost."\n\n".
        $this->occupySpace().$this->spaceCount($other_charge).$other_charge."\n\n".
        $this->occupySpace().$this->spaceCount($total).$total."\n\n";


          return $printingData;

              
              
        }
        
        public function preOccupy() // return pre-occupied charector length  
        {
            
              return 32;
        
        }
        
        public function occupySpace() // return pre-occupied space 
        {

               $space="";
               $num=$this->preOccupy();
               
               for ($i=0; $i <$num ; $i++)
               { 
                  
                  $space.=" ";
                
               }
                
               return $space;
        }

        public function spaceCount($word)// it gives space between title and value
        {
                
                
                $wordLength=50;
                $createSpace=''; 
                
                $preOccupySpace=$this->preOccupy();
                $remainningSpace=$wordLength-$preOccupySpace;
                $space=$remainningSpace-count($word);
                
                for ($i=0; $i <$space ; $i++) { 
                    
                    $createSpace.=" ";
                
                }
                
                return $createSpace;



        }


       public function gettingNewNotification()
       {

            $row= $this->db->countUnprocessedRow();

            return $row ;
       
       }

       public function getBillList($table,$cond)
       {

           $data=$this->db->select($table,$cond);

           return $data;
       
       }
       public function getBillListByDate($table,$condition)
       {

            $list=$this->db->select($table,$condition);

            return $list;

       }  

       public function getComplainList($year,$month)
       {



             $LikeQuery="select complainregister.*,customer.customer_fullname, customer.address,complainasingnbook.emp_id from customer right join complainregister on customer.customer_id=complainregister.customer_id
              right join complainasingnbook on complainregister.complain_id=complainasingnbook.complain_id where complainregister.year='$year' AND complainregister.month='$month' GROUP BY customer.customer_id";

              $row =$this->con->query($LikeQuery);
               
              $array =array();

              while($result=$row->fetch_assoc())
              {
             
                      $array[]=$result;
              }

              return $array;

              
       } 

       public function getComplaintBydate($date)
       {



              $LikeQuery="select complainregister.*,customer.customer_fullname, customer.address,complainasingnbook.emp_id from customer right join complainregister on customer.customer_id=complainregister.customer_id
                right join complainasingnbook on complainregister.complain_id=complainasingnbook.complain_id where complainregister.date='$date' GROUP BY customer.customer_id";

              $row =$this->con->query($LikeQuery);
               
              $array =array();

              while($result=$row->fetch_assoc())
              {
             
                      $array[]=$result;
              }

              return $array;
       }
       public function getWard($zone)
       {

            $ward=$this->db->select('area',['area'=>$zone]);

            return $ward;


       }
       public function getRoad($zone,$ward)
       {
           
          $road=$this->db->select('area',['area'=>$zone,'locality'=>$ward]);

          return $road;

       }
       public function getPreAmt($customer_id,$date)
       {
            
           $date1=explode('-',$date);
   
           $month=$date1[1];
           $year=$date1[0];

           $query="select total from bill where month < $month AND year ='$year' AND status='0'";               
           $row =$this->con->query($query);
           
           $due=0;
           
           while($result=$row->fetch_assoc())
           {
                
                $due+=$result['total'];
           
           }  


          return $due;

       }
       public function getAllComplainByDate($date)
       {


            $compalin=$this->db->select('complainregister',['date'=>$date]);

            return $compalin;


       }

       public function getTotalBillAmt($year)
       {


              $total=0;
              
              $data=$this->db->select_colum_where('bill',['total'],['year'=>$year]);

              foreach ($data as $key => $value) {
                
                 $total+=$value['total'];

              }

             return $total; 


       }
       public function paidYearlyBill($year)
       {

             $total=0;
              
              $data=$this->db->select_colum_where('bill',['total'],['year'=>$year,'status'=>'1']);

              foreach ($data as $key => $value) {
                
                 $total+=$value['total'];

              }

             return $total; 
       }
       public function unpaidYearlyBill($year)
       {

             $total=0;
              
              $data=$this->db->select_colum_where('bill',['total'],['year'=>$year,'status'=>'0']);

              foreach ($data as $key => $value) {
                
                 $total+=$value['total'];

              }

             return $total; 
       }


        public function getTotalMBillAmt($year,$month)
       {


              $total=0;
              
              $data=$this->db->select_colum_where('bill',['total'],['year'=>$year,'month'=>$month]);

              foreach ($data as $key => $value) {
                
                 $total+=$value['total'];

              }

             return $total; 


       }
       public function paidMBill($year,$month)
       {

             $total=0;
              
              $data=$this->db->select_colum_where('bill',['total'],['year'=>$year,'status'=>'1','month'=>$month]);

              foreach ($data as $key => $value) {
                
                 $total+=$value['total'];

              }

             return $total; 
       }
       public function unpaidMBill($year,$month)
       {

              
              $total=0;
              
              $data=$this->db->select_colum_where('bill',['total'],['year'=>$year,'status'=>'0','month'=>$month]);

              foreach ($data as $key => $value) {
                
                 $total+=$value['total'];

              }

             return $total;

       }

       public function getBillMonth($year)
       {
              
            
            $month=$this->db->selectDistinct('bill',['month'],['year'=>$year]);

            return $month;

       } 

       public function customerDeactivate($customer_id)
       {

            
            $response=$this->db->row_update('customer',['isActive'=>'0'],['customer_id'=>$customer_id]);

            return $response;



       }
       public function customerActivate($customer_id)
       {

             

             $response=$this->db->row_update('customer',['isActive'=>'1'],['customer_id'=>$customer_id]);

             return $response;


       }

       public function getBillDetail($param)
       {

             $customer_id=$param['customer_id'];
             $meter_id=$param['meter_id'];
             $month=$param['month'];
             $year=$param['year'];
             $data=array();

             if($customer_id!='' && $meter_id=='')
             {

                 $str="select bill .*,customer.customer_fullname,customer.address,customer.area,customer.location from bill inner JOIN customer ON customer.customer_id=bill.customer_id where bill.customer_id='$customer_id' AND bill.month='$month' AND bill.year='$year'";

                 $row=$this->con->query($str);


                 while($result=$row->fetch_assoc())
                 {
                    $data[]=$result;
                 }
 
             }
             else if($customer_id=='' && $meter_id!="")
             {

                 
                 $str="select bill .*,customer.customer_fullname,customer.address,customer.area,customer.location from bill inner JOIN customer ON customer.customer_id=bill.customer_id where bill.meter_id='$meter_id' AND bill.month='$month' AND bill.year='$year'";

                $row=$this->con->query($str);


                 while($result=$row->fetch_assoc())
                 {
                    $data[]=$result;
                 }
 

             }

            
              return $data;




       }

       public function billFeeding($table,$bill)
       {

               $response=$this->db->insert($table,$bill);

               return $response;
       }

      public function sendMessage($message,$mobile)
       {
            
             // $mobile_no=$data['mobile'];
             // $reciept_no=$data['receipt_no'];
             // $bill_id=$data['bill_id'];
             // $customer_id=$data['customer_id'];
             // $payment_date=$data['date'];
             // $month=$data['bill_month'];
             // $amount=$data['amount'];
        
             // $message=urlencode("Your Transection has done Your Reciept No".$reciept_no.
             //           "Bill No".$bill_id."CustomerID".$customer_id.
             //           "payment date".$payment_date."Month".$month.
             //           "Amount-Rs".$amount);


            $param="user=vilindia&pass=123456&sender=VSVRAJ&phone=".$mobile."&text=".$message."&priority=ndnd&stype=normal";
            $url="http://trans.smsfresh.co/api/sendmsg.php?".$param;
            $curl=curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            $response=curl_exec($curl);
            curl_close($curl);
            return $response;


       }    

      
}


?> 