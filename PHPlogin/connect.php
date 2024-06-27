<?php
//echo "connect";
$con=mysqli_connect("localhost:3307","root","","votingsystem");
if(!$con)
{
    die(mysqli_error($con));

}
?>