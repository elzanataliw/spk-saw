<?php
require 'connect.php';
$user=@$_POST['username'];
$pass=@$_POST['password'];

if (empty($user)){
    $result="Username cannot be empty";
}elseif (empty($pass)){
    $result="Password cannot be empty";
}elseif (empty($username) && empty($pass)){
    $ressult="Username and password cannot be empty";
}else{
    $query="SELECT*FROM user WHERE username='$user'";
    $execute=$konek->query($query);
    if ($execute->num_rows > 0){
        $data=$execute->fetch_array(MYSQLI_ASSOC);
        if (password_verify($pass,$data['password'])){
            session_start();
            $_SESSION['user']=$data['username'];
            $_SESSION['pass']=$data['password'];
            //header('location:./index.php');
            $result='success';
        }else{
            $result="Username and password don't match";
        }
    }else{
        $result="Username not registered";
    }
}
echo json_encode($result);