<?php
$sessionId="92a1d8d5ac21de98650710c2cf4cd31c2fa82ead8e2005d5885c8e6fc26408ba";
session_id($sessionId);

session_start();
include('connect.php'); 
if($_SESSION['status']==0)
{

$votes=$_POST['groupvotes'];
$totalvotes=$votes+1;

$gid=$_POST['groupid'];
$uid=$_SESSION['id']; 

$updatevotes=mysqli_query($con,"update `userdata` set votes='$totalvotes' where id='$gid'");
$updatestatus=mysqli_query($con,"update `userdata` set status=1 where id='$uid'");

if($updatevotes and $updatestatus)
{
    $getgroups=mysqli_query($con,"Select username,photo,votes,id from `userdata` where standard='group'");
    $groups=mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
    $_SESSION['groups']=$groups;
    $_SESSION['status']=1;
    echo 
        '<script>
            alert("Voting Successful");
            window.location="dashboard2.php";
        </script>';
}
else
{
    echo 
        '<script>
            alert("Technical Error !! Vote after semtime");
            window.location="dashboard2.php";
    
            </script>';
}
}
else{
    echo 
        '<script>
            alert("already voted");
            window.location="dashboard2.php";
    
            </script>';

}
?>