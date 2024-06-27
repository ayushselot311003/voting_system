<?php
 header("Access-Control-Allow-Origin: http://localhost:3000");
 header("Access-Control-Allow-Headers: http://localhost:3000");
 header("Access-Control-Allow-Methods: http://localhost:3000");
   echo '<script>
   alert("registers");
   </script>';
   $postData = file_get_contents("php://input");
   echo $postData;
    
    // Decode the JSON data into a PHP associative array
    $data = json_decode($postData, true);
   //echo "mobile is $_data['mobile']";

include('connect.php');
echo "<br>a<br>";
$username = $_POST['username'] ?? '';
echo "<br>b<br>";
$mobile=$_POST['mobile']  ?? '';
$password=$_POST['password']  ?? '';
$cpassword=$_POST['cpassword']  ?? '';
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$std=$_POST['std']  ?? '';
echo $username;
echo "<br>";
echo "mobile=$mobile";
echo "pic=$image";
echo "pictmp=$tmp_name";
if($password!=$cpassword){
    echo "<script>
    alert('Passwords do no match');
    
    </script>";
}

else{
   
    
    move_uploaded_file($tmp_name,"../uploads/$image");
    $sql="insert into userdata (username,mobile,password,photo,standard,status,votes) values ('$username','$mobile','$password','$image','$std',0,0)";
    if($username!='')
    {
    $result=mysqli_query($con,$sql);
    }
    else{
        $result="";
    }
    if($result){
        echo '<script>
    alert("Registration Successful");
    window.location="../";
    </script>';
    }
    else{
        die(mysqli_error($con));
    }
}


?>
