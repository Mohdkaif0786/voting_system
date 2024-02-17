<?php
session_start();
echo "<pre>";
print_r($_POST);
$gid=$_POST['gid'];
$uid=$_SESSION['user']['id'];
$votes=$_POST['gvote'];
$total_votes=$votes+1;
$con=mysqli_connect("localhost","root","","online_vote");
if($con->connect_error){
  echo "connection  error";
}
else{
  $update_votes=mysqli_query($con,"update register set voter=$total_votes where id=$gid");
  $update_status=mysqli_query($con,"update register set status=1 where id =$uid");
  if($update_votes and $update_status){
        $query_group="select * from register where select_roll=2";
       $group_data=mysqli_query($con,$query_group);
       $group_len=mysqli_num_rows($group_data);
       $group_res=mysqli_fetch_all($group_data,MYSQLI_ASSOC);
       $_SESSION['user']['status']=1;
       $_SESSION['group']=$group_res;
       echo "<script>alert('voting successfulli..')</script>";
       echo "<script>window.location='../dashboard.php';</script>"; 

  }
  else{
    echo "<script>alert('something error, please try a few minutes..')</script>";  
    echo "<script>window.location='../';</script>"; 
 }
  } 
?>