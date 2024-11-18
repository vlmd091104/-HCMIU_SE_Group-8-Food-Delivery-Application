<?php
$username = filter_input(INPUT_POST,"username");
$password = filter_input(INPUT_POST,"password");
$host = "localhost";
$dbusername = "root";
$dbpassword = "Minhduc@0911";
$dbname = "food_delivery_application";

//create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_errno()) {
    die("Connect Error (". mysqli_connect_errno().")".mysqli_connect_error());
}else{
    $sql = "INSERT INTO user (username, password) values('$username', '$$password')";
    if($conn->query($sql)){
        echo "New record is inserted successfully";
    }else{
        echo "Error: " .$sql."<br>".$conn->error;
    }
    $conn->close();
}

if(!empty($username)){

}else{
    echo "Username should not be empty";
    die();
}

if(!empty($password)){

}else{
    echo "Password should not be empty";
    die();
}

?>
