<?php

include 'connect.php';

if(isset($_POST['signUp'])){
    $fullName=$_POST['fName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $password=md5($password);//encrypt md5 password

    $checkEmail="SELECT * From user where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows> 0){
        echo"Email Address Already Exists!";
    } else{
        $insertQuery="INSERT INTO user(fullname,email,phone,password) VALUES ('$fullName','$email','$phone','$password')";
        if($conn->query($insertQuery)==TRUE){
            header("location: index.php");
        }else{
            echo "Error:".$conn->error;
        }
    }
}

if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM user WHERE email='$email' and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows> 0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("location: menu.php");
        exit();
    } else {
        echo"Incorrect Email or Password. Try again!";
    }
}
?>