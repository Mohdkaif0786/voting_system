<?php
 session_start();
//  print_r($_SESSION['user']); 

 $group=$_SESSION['group'];
//  print_r($group);
 echo "</pre>";
//  $con=mysqli_connect("localhost","root","","online_vote");
//  if($con->connect_error){
//     echo "connection error";
//  }
//  else{
//     echo "connection successfull";
//     $img=$_SESSION['user']['mobile'];
//     $user_image_query="select file from register where mobile=$img";
//     $image_data=mysqli_query($con,$user_image_query);
//     // print_r(mysqli_num_rows($image_data));
//     $image_res=mysqli_fetch_assoc($image_data);
    
// }
// echo $_SESSION['user']['file'];
 if(!isset( $_SESSION['user'])){
    header("location: /voting/index.php");
 }
 if( $_SESSION['user']['status']==0){
    $status="<b  style='color:red;'>Not Voted</b>";
  }
  else{$status="<b style='color:green;'>Voted</b>";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <title>Dashborad</title>
    <style>
         #header{height:50px;
            width:97%;
            margin:10px 2%;
            /* border:1px solid red; */
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        body{background-color:lightblue;}
        address{display:inline-block;}
        #profile_saction{
            background-color:red;
            width:100%;
        }
        #profile{box-shadow:1px 1px 2px lightgrey;
            overflow:hidden;
            padding-top:20px;
        }
        #group_saction{
                width:100%;
                padding:10px 24px;
                background-color:white;
        }
        #btn{
            width:70px;
        }
        #profile_image{
            height:150px;
            width:150px;
            margin:20px;
            box-shadow:1px 1px 2px lightgrey;
            border-radius:40%;
        }
        #group_image{width:140px;
        height:140px;
        float:right;
    }
        #group_saction{
            width:100%;
            /* border:1px solid red; */
        }
    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div id="header" class="mb-3">
                  <button class="btn btn-primary" id="back">Back</button>    
                 <h2><center>Online Voting System</center></h2>
                 <button class="btn btn-primary"id="logout">Logout</button>
            </div>
            </div>
        </div>
        <hr>
        <div class="row m-4">
            <div class="col-3 bg-white m-4" id="profile">
                        <div class="mb-4 "><center><img src="<?php echo$_SESSION['user']['file'];?>" id="profile_image" alt="user_image"></center></div> 
                        <div class="mb-3"><b>Name:-&nbsp</b><?php echo $_SESSION['user']['name'];?></div>
                        <div class="mb-3"><b>Mobile:-&nbsp</b><?php echo $_SESSION['user']['mobile'];?></div>
                        <div class="mb-2"><b>Address:-&nbsp  </b><address><?php echo $_SESSION['user']['address'];?></address></div>
                        <div class="mb-2"><b>Status:-&nbsp</b><?php echo $status;?></div>
            
            </div>
            <div class="col-6 bg-white" id="">
                        <?php
                           if($_SESSION['group']){
                                for($i=0;$i<count($group);$i++){
                                    // echo "hello world";
                                    
                                    ?>
                                    <div class="m-3">
                                    <img src="<?php echo $group[$i]['file']?>" alt="candidate_party_iamge" id="group_image" class="mx-2">
                                        <div class="mb-3" id="candidate_name"><b >Candidate Name: </b><?php echo $group[$i]['name'];?></div>
                                         <div class="mb-4"><b>Vote:- </b><?php echo $group[$i]['voter'];?></div>
                                        <form action="api/votes.php " method="POST">
                                            <input type="hidden" name="gvote" value="<?php echo $group[$i]['voter']?>">
                                            <input type="hidden" name="gid" value="<?php echo $group[$i]['id'];?>"> 
                                            <?php
                                            if($status==1){ 
                                                ?>                                               
                                                <button type="submit" id="btn" class="btn btn-danger" name="vote_btn">Voted</button>
                                              <?php
                                            }   
                                            else{
                                                ?>
                                                 <button type="submit" id="btn" class="btn btn-success"name="vote_btn">Vote</button>
                                                <?php
                                            }
                                        ?>
                                        </form>
                                    </div>
                                    <hr>
                                    <?php
                                    // api/votes.php
                                }
                            }
                        ?>

            </div>
        </div>
    </div>
    
</body>
    <script>
        x=document.getElementById("back");
        y=x.addEventListener('click',click);
        function click(){
          x=confirm("do you want back?");
          if(x){
            window.location=window.location='/voting/index.php';
          }
          else{
            console.log("click cancel")
          }
            
        }

0
        // this section for logout button action;
        // x=document.getElementById("logout");
        // x.addEventListener('click',click);
        // function click(){
       //console.log("<?php #session_destroy();?> ")
        //     window.location=window.location='/voting/index.php';
        // }
    </script>
</html>