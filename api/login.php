<?php
   session_start();
   echo "<pre>";
   // print_r($_POST);

$con=mysqli_connect("localhost","root","","online_vote");
if($con->connect_error){
    echo "connection error";
}
else{
     echo "connection successfull<br>";
    $number=$_POST['num'];
    $password=$_POST['pass'] ;
     $roll=$_POST['roll'];
   //  echo $number,$password,$roll;
     $query="select * from register where mobile=$number and password='$password' and select_roll=$roll";
     $data=mysqli_query($con,$query);   
     echo "dta exist in database;<br>";
     $len=mysqli_num_rows($data);
     if($len>0){
         echo "<br>";
         $res=mysqli_fetch_assoc($data);
        // print_r($res);
         $query_group="select * from register where select_roll=2";
         $group_data=mysqli_query($con,$query_group);
         $group_len=mysqli_num_rows($group_data);
         $group_res=mysqli_fetch_all($group_data,MYSQLI_ASSOC);

         #i am going to make towo session first voter and second group
         $_SESSION['user']=$res;
         $_SESSION['group']=$group_res; 
         echo "<script>window.location='/voting/dashboard.php';</script>";
         echo "<script>alert('hello')</script>";     
      }

     else{
        echo "<script>alert('number colud not match with password and roll')</script>";  
        echo "<script>window.location='../';</script>"; 
     }


}


?>