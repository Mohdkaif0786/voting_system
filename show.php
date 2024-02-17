<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <?php
        echo "hello world";
        $con=mysqli_connect("localhost","root","","online_vote");
        if($con->connect_error){
            echo "<br>connection error...";
        }
        else{
            echo "<br>connection successsfull..";
               
            $select_query="select * from register";
            $show_data=mysqli_query($con,$select_query);
            $row=mysqli_num_rows($show_data);
            
        }
    ?>
</head>
<body>
     <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>mobile</th>
                            <th>password</th>
                            <th>select_roll</th>
                            <th>file</th>
                        </thead>
                        <tbody>
                            <?php
                                if($row!=0){
                                    while($res=mysqli_fetch_assoc($show_data)){
                                        ?>
                                        <tr>
                                            <td><?php echo $res['id']; ?></td>
                                            <td><?php echo $res['name']; ?></td>
                                            <td><?php echo $res['mobile']; ?></td>
                                            <td><?php echo $res['password']; ?></td>
                                            <td><?php echo $res['select_roll']; ?></td>
                                            <td><img src="<?php echo $res['file'];?>" height="100px" width="100";></td>
                                        </tr>
                                     <?php   
                                    }
                                }
                                else{echo "not show data..";
                                
                                }
                            ?>  
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>
</body>
</html>