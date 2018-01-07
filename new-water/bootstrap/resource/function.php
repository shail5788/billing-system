<?php
  error_reporting(0);
  session_start();
  //include("../connect.php");
          

      /*********************************************************
       *********************************************************
       ************* Reusable functions code *******************
       *********************************************************
       *********************************************************/
          

          class database
          {
            
                protected $con; 
                protected $condetion; 
               
            
                public function __construct($con)
                {
                   $this->con=$con;
                }
            
                public  function login($username,$password)
                {
                     // global $con;
                     $queryStr="select * from login_info where username ='$username' AND password='$password'";
                     $row=$this->con->query($queryStr);
                     $result=$row->fetch_assoc();
                     if($result)
                     {
                       return "true";
                     }
                     else 
                     {
                       return  "false";
                     }

                 }
                 public function insert($table,$data)
                 {
                     
                       $table_fields=array(); 
                       $table_value=array();
                 
                       foreach ($data as $key => $value) {
                         $table_fields[]=$key;
                         $table_value[]=$value;
                       }

                       $length=count($table_fields);
                       $fields="";
                       $data="";
                       
                       for($i=0;$i<$length;$i++)
                        {
                           $fields=$fields.$table_fields[$i].",";
                           $data .="'$table_value[$i]'".",";
                        }
                        
                        $fields= rtrim($fields, ",");
                        $data=rtrim($data, ",");
                       
                      $str ="insert into ".$table."($fields)values($data)";
                        $result=$this->con->query($str);
                       
                        if($result)
                        {
                            return true;
                        }
                        else
                        {
                            return false;  
                             
                        }
                  }
                  public function fetch_all($table)
                  {
                       

                       $str="select * from ".$table;
                       $row=$this->con->query($str);
                       $data =array();
                       
                       while($result=$row->fetch_assoc())
                       {
                          $data[]=$result;
                       }  
                       
                       return $data;

                   }
                   public function select_column($table,$colums)
                   {
                       
                        $array=array();
                        
                        for($i=0;$i<count($colums);$i++)
                        {
                          $colum.=$colums[$i].","; 
                        }
                        $colum=rtrim($colum, ",");

                        $str="select DISTINCT ".$colum." from ".$table;
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                            $array[]=$result;
                        }
                        
                        return $array;


                   }
                   public function selectColum($table,$colums)
                   {
                       


                        $array=array();
                        
                        for($i=0;$i<count($colums);$i++)
                        {
                          $colum.=$colums[$i].","; 
                        }
                        $colum=rtrim($colum, ",");
                        
                        $str="select ".$colum." from ".$table;
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                            $array[]=$result;
                        }
                        
                        return $array;


                   }
                   public function select_colum_where($table,$colums,$condition)
                   {
                         

                          $colum="";
                          $array=array();

                          for($i=0;$i<count($colums);$i++)
                          {
                            $colum.=$colums[$i].","; 
                          }
                          
                          $colum=rtrim($colum, ",");
                          
                          $where_condetion=$this->where($condition);
                          
                          $str="select ". $colum ." from ".$table." where ".$where_condetion;
                          $row=$this->con->query($str);
                          
                          while($result=$row->fetch_assoc())
                          {
                             $array[]=$result;
                          }
                          
                          return $array;
                          
                    }
                    function selectDistinct($table,$colums,$condetion)
                    {
                       

                        $colum="";
                        $array=array();
                        
                        for($i=0;$i<count($colums);$i++)
                        {
                          $colum.=$colums[$i].","; 
                        }
                        $colum=rtrim($colum, ",");
                        
                        $where_condetion=$this->where($condetion);
                        
                        $str="select DISTINCT ". $colum ." from ".$table." where ".$where_condetion;
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                           $array[]=$result;
                        }
                        return $array;
                        
                   } 
                   public function selectDistinctGroupBy($table,$colums,$condetion,$groupBy)
                   {
                      
                        $colum="";
                        $array=array();
                        
                        for($i=0;$i<count($colums);$i++)
                        {
                          $colum.=$colums[$i].","; 
                        }
                        $colum=rtrim($colum, ",");
                        
                        $where_condetion=$this->where($condetion);
                        
                        $str="select ". $colum ." from ".$table." where ".$where_condetion." GROUP BY ". $groupBy;
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                           $array[]=$result;
                        }
                        
                        return $array;
                        
                   }
                    public function select($table,$condetion)
                    {
                       
                        $where_condetion=$this->where($condetion);
                        
                       $str ="select * from ".$table." where ".$where_condetion;
                        $str_row=$this->con->query($str);
                        
                        $record_set=array();
                        
                        while( $result=$str_row->fetch_assoc())
                        {
                         $record_set[]=$result;
                        }
                        
                        return $record_set;
                    
                    }
           
                    public function where($condetion)
                    {
                        
                       $this->condetion=$condetion;
                        
                       $table_fields=array(); 
                       $table_value=array();
                       $fields="";
                       $data="";
                       
                       foreach ($this->condetion as $key => $value) {
                         $table_fields[]=$key;
                         $table_value[]=$value;
                       }
                       $length=count($table_fields);
                       
                       for($i=0;$i<$length;$i++)
                        {
                           $fields=$fields.$table_fields[$i]."='$table_value[$i]' AND ";
                           
                        }
                        $cond = preg_replace('/\W\w+\s*(\W*)$/', '$1', $fields);
                        // remove last AND from the query string
                        
                        return $cond;
                    }
                    public function row_update($table,$colums,$condetion)
                    {
                       
                       
                        $wcondetion=$this->where($condetion);
                        $table_fields=array(); 
                        $table_value=array();
                        $fields="";
                        $data="";
                        
                        foreach ($colums as $key => $value) {
                         
                         $table_fields[]=$key;
                         $table_value[]=$value;
                        
                        }
                        $length=count($table_fields);
                        
                        for($i=0;$i<$length;$i++)
                        {
                           
                           $fields=$fields.$table_fields[$i]."='$table_value[$i]',";
                           
                        }
                        
                        $fields=rtrim($fields, ",");
                        $str="UPDATE ".$table. " SET ".$fields. " where ".$wcondetion;
                        $row=$this->con->query($str);
                        
                        if($row)
                         {
                          return true;
                         } 
                        else{
                          return false;
                         }

                        
                    }                          
  
          } 
          

 
?>