<?php
//$sessionId = bin2hex(random_bytes(32));
$sessionId="92a1d8d5ac21de98650710c2cf4cd31c2fa82ead8e2005d5885c8e6fc26408ba";
session_id($sessionId);
session_start();
   
    header("Access-Control-Allow-Origin:http://localhost:3000");
    header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");


$postData = file_get_contents("php://input");
   //echo $postData;
    
    // Decode the JSON data into a PHP associative array
    $data = json_decode($postData, true);
    $user = $data['username'] ?? '';
    //echo "Hello from server: $user";
    include('connect.php');
    $username=$data['username'] ?? '';
    $mobile=$data['mobile'] ?? '';
    $password=$data['password'] ?? '';
    $std=$data['std'] ?? '';
    $sql="Select * from `userdata` where username='$username' and mobile='$mobile' and password='$password' and standard='$std'";
   $result=mysqli_query($con,$sql);
   if(mysqli_num_rows($result)>0){
   
   
    $sql="Select username,photo,votes,id from `userdata` where standard='group'";
    $resultgroup=mysqli_query($con,$sql);
    if(mysqli_num_rows($resultgroup)>0){
        $groups=mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
        $_SESSION['groups']=$groups;
        
    }
    $data=mysqli_fetch_array($result);
    $_SESSION['id']=$data['id'];
    $_SESSION['status']=$data['status'];
    $_SESSION['data']=$data;
    /*echo '<script>
    
    window.location.href="http://localhost:8090/voting/PHPlogin/dashboard.php";
    
    </script>';*/
    //echo "sessionid=".session_id()."<br>";
    //console.log(session_id());
    $SID=session_id();
    if($std=="admin")
    {
        //header('location:http://localhost:8090/voting/PHPlogin/admin.php');
       
        echo json_encode(['success' => true, 'message' => 'admin']);
    }
    else{
    echo json_encode(['success' => true, 'message' => '$SID'.$SID]);
    }
}
   
   else{
    /*echo '<script>
    alert("Invalid credentials");
    window.location="../src/app";
    
    </script>';*/
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
   }
?>