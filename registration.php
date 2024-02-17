 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <title>Registration Form</title>
    <style>
        form{height:580px;
        width:400px;
        margin:10px auto;
        background-color:white;
        /* border:2px solid red; */
        box-shadow:1px 1px 2px lightgrey ;
}
    .input-filed{
        margin:2px 16px;
        width:350px;
    }
    #select{margin:2px 16px;
        width:350px;}
        .btn{
            margin:2px 16px;
            width:350px;
        }
        p{margin:2px 16px;}
        h2{color:#1F51FF;}
        #heading{
            box-sizing:border-box;
            padding:10px 0px 3px 0px;
           
        } 
        a{text-decoration:none;}
        body{
        background-color:lightblue;
        }
        label{ 
            margin:2px 16px;
            color:grey;
        }
        /* .input_filed{border:none;} */
    </style>
</head>
<body>
<div id="heading"><h1><center>Online Voting System</center></h1></div>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <div class="mb-3" id="heading">
        <h2><center>Registration</center></h2>
         
        </div>
        <hr>
        <div class="sub_contianer mb-3">
           <input type="text" name="user" id="" class="input-filed form-control" placeholder="Name"> 
        </div>
        <div class="sub_contianer mb-3">
           <input type="number" name="mobile" id="" class="input-filed form-control" placeholder="Mobile" minlength="10" maxlength="10"> 
        </div>
        <div class="sub_contianer mb-3">
            <input type="password" name="password" id="" class="input-filed form-control" placeholder="Password">
        </div>
        <div class="sub_contianer mb-3">
            <input type="password" max="10" name="confirm" id="" class="input-filed form-control" placeholder="Confirm Password">
        </div>
        <div class="sub_contianer mb-3">
            <input type="text" name="address" id="" class="input-filed form-control" placeholder="Address">
        </div>
        <div class="sub_contianer mb-3">
            <label for="select">Select your role</label>
            <select name="roll" id="select" class="form-select">
                <option value="1">Voter</option>
                <option  value="2">Candidate</option>
            </select>
        </div>
        <div class="sub_contianer mb-3">
            <input type="file" name="image" id="" class="input-filed form-control" placeholder="Confirm Password">
        </div>
        <div class="sub_contianer mb-1">
             <button class="btn btn-primary" value="registration" name="registration">Register</button>
        </div>
        <p>already user?<span><a href="index.php">&nbspLogin here</span><a></p>
    </form>
</body>
    <?php 
       if(isset($_POST['registration'])){
            echo "<pre>";     
            print_r($_FILES['image']);
            $file_name=$_FILES['image']['name'];
            $file_tmp=$_FILES['image']['tmp_name'];
            $file_ext=explode(".",$file_name);
            $file_size=$_FILES['image']['size'];
            $file_type=strtolower(end($file_ext));
            $file_array=array("jpeg","png","svg","jpg","webp");
            $file_location="upload/".$file_name;//this is file_location
            $con=mysqli_connect("localhost","root","","online_vote");
            if(!in_array($file_type,$file_array)){
                $error[]="error!,only jpge,png,svg and webp file upload...";
            }
            if($file_size>2097152){
                $error[]="error!,maximum file size mb 2..";
            }
            if(empty($error)){
                if($con->connect_error){
                    echo "<br>connection error...";
                }
                else{
                    echo "<br>connection databses successfull";
                    $user=$_POST['user'];
                    $mobile=$_POST['mobile'];
                    $password=$_POST['password'];
                    $confirm=$_POST['confirm'];
                    $roll=$_POST['roll'];
                    $address=$_POST['address'];    
                    $insert_query="insert into register(name,mobile,password,file,select_roll,address,voter,status) values('$user',$mobile,'$password','$file_location','$roll','$address',0,0)";
                    if($password==$confirm){
                        $insert_data=mysqli_query($con,$insert_query);
                        $uplod_img=move_uploaded_file($file_tmp,$file_location);
                        if($insert_data){
                            echo "<script>alert('resigstration successfull...');</script>";
                            //echo "<script>window.location='/index.php'</script>";
                            header("location:index.php");                            
                          }
                         else{echo "<script>somting error for registration</script>";}
                         
                    }
                    else{echo "<script>alert('password and confirm password colud not match please chek it');</script>";}
                  
                }
            }
            else{
                print_r($error);
            }
       }
       else{
        // echo "<br>connection failed..";
    }
    ?>
</html>