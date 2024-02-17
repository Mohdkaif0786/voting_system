<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <title>Online voting -Login</title>
    <style>
        form{height:350px;
        width:380px;
        margin:0 auto;
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
            height:80px;
            box-sizing:border-box;
            padding-top:20px;
           
        }
        a{text-decoration:none;}
        body{
        background-color:lightblue;
        }
        #head{padding:10px;}
    </style>
</head>
<body>
    <div id="heading"><h1><center>Online Voting System</center></h1></div>
    <hr>
    <form action="api/login.php" method="post">
        <div id="head" class="mb-3">
        <h2><center>Login Account</center></h2>
         
        </div>
        <hr>
        <div class="sub_contianer mb-3">
           <input type="number" name="num" id="num" class="input-filed form-control" placeholder="enter number"> 
        </div>
        <div class="sub_contianer mb-3">
            <input type="password" name="pass" id="" class="input-filed form-control" placeholder="enter password">
        </div>
        <div class="sub_contianer mb-3">
            <select name="roll" id="select" class="form-select">
                <option value="1">Voter</option>
                <option value="2">Group</option>
            </select>
        </div>
        <div class="sub_contianer mb-1">
             <button class="btn btn-primary">Submit</button>
        </div>
        <p>New user?<span><a href="registration.php">&nbsp Register here</span><a></p>
    </form>
</body>
</html>