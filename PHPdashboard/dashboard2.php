<?php
$sessionId="92a1d8d5ac21de98650710c2cf4cd31c2fa82ead8e2005d5885c8e6fc26408ba";
session_id($sessionId);
session_start();
if(!isset($_SESSION['id'])){
    header('location:http://localhost:3000');
}
$data=$_SESSION['data'];
if($_SESSION['status']==1){
    $status='<b class="text-success">voted</b>';
}
else{
    $status='<b class="text-danger">Not voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Voting System - Dashboard</title>
        
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            rel="stylesheet" crossorigin="anonymous">
        
    </head>
    <body class="bg-secondary text-light">
        <div class="container my-5">
            <a href="http://localhost:3000"><button class="btn btn-dark text-light px-3">Back</button></a>
            <a href="logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>
            <h1 class="my-3">Voting System</h1>
            <div class="row my-5">
                <div class="col-md-7">
                    <!-- Group -->
                    <?php 
                        if(isset($_SESSION['groups']))
                        {
                            $groups=$_SESSION['groups'];
                            for($i=0;$i<count($groups);$i++)
                            {
                    ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../uploads/<?php echo $groups[$i]['photo'] ?>" alt="Group Image" style="width:100px;height:100px;objectFit:contain">
                                    </div>
                                    <div class="col-md-8">
                                        <strong class="text-dark h5">Group Name:</strong>
                                        <?php echo $groups[$i]['username'] ?><br>
                                        <strong class="text-dark h5">Votes:</strong>
                                        <?php echo $groups[$i]['votes'] ?><br>
                                    </div>
                                </div>
                                <form action="voting.php" method="post">
                                    <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes'] ?>">
                                    <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id'] ?>">
                                    <?php 
                                        if($_SESSION['status']==1) {
                                    ?>
                                            <button class="bg-success my-3 text-white px-3">voted</button>
                                    <?php
                                        } else {
                                    ?>
                                            <button class="bg-danger my-3 text-white px-3" type="submit">vote</button>
                                    <?php
                                        }
                                    ?>
                                </form>
                                <hr>
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
                    <!-- User Profile -->
                    <img src="../uploads/<?php echo $data['photo']; ?>" alt="User Image" style="width:100px;height:100px;objectFit:contain">
                    <br><br>
                    <strong class="text-dark h5">Name:</strong>
                    <?php echo $data['username']; ?><br><br>
                    <strong class="text-dark h5">Mobile:</strong>
                    <?php echo $data['mobile']; ?><br><br>
                    <strong class="text-dark h5">Status:</strong>
                    <?php echo $status; ?><br><br>
                </div>
            </div>
        </div>
    </body>
</html>