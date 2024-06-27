<?php
$sessionId="92a1d8d5ac21de98650710c2cf4cd31c2fa82ead8e2005d5885c8e6fc26408ba";
session_id($sessionId);
session_start();
if(!isset($_SESSION['id'])){
    header('location:http://localhost:3000');
}
$data=$_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            rel="stylesheet" crossorigin="anonymous">
        
</head>
<body class="bg-secondary text-light">
<a href="http://localhost:3000"><button class="btn btn-dark text-light px-3" style="margin-top:70px;margin-left:70px;">Back</button></a>
            <a href="http://localhost:8090/voting/PHPdashboard/logout.php"><button class="btn btn-dark text-light px-3" style="margin-top:70px;">Logout</button></a>
            <h1 class="my-3" style="margin-left:70px;">Voting System</h1>
<div class="row my-5">

                <div class="col-md-7">
                    <!-- Group -->
                    <?php 
                        if(isset($_SESSION['groups']))
                        {
                            $groups=$_SESSION['groups'];
                            $maxvotes=0;
                            $ID=0;
                            for($i=0;$i<count($groups);$i++)
                            {
                                if($groups[$i]['votes'] > $maxvotes)
                                {
                                    $maxvotes=$groups[$i]['votes'];
                                    $ID=$groups[$i]['id'];
                                }
                    ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../uploads/<?php echo $groups[$i]['photo'] ?>" alt="Group Image" style="width:100px;height:100px;objectFit:contain;margin-left:70px">
                                    </div>
                                    <div class="col-md-8">
                                        <strong class="text-dark h5" style="margin-left:70px">Group Name:</strong>
                                        <?php echo $groups[$i]['username'] ?><br>
                                        <strong class="text-dark h5" style="margin-left:70px">Votes:</strong>
                                        <?php echo $groups[$i]['votes'] ?><br>
                                    </div>
                                </div>
                                
                                <hr style="margin-left:70px;">
                    <?php
                            }
                        }
                        else
                        {
                    ?> 
                            <div class="container">
                                <p>No groups to display</p>
                            </div>
                    <?php
                        } 
                    ?>
                </div>
                <div class="col-md-5">
                  <?php
                   include('connect.php');
                   $sql="Select username from userdata where id=$ID";
                   $result=mysqli_query($con,$sql);
                   $data=mysqli_fetch_array($result);
                  echo "<h1>".$data['username']."  is winning</h1>";
                  
                 
                    ?>
                </div>

            </div>
    
</body>
</html>