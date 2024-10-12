<?php

$fullname = $_POST["fullName"];
$host = "localhost";
$database = "ecommers";
$username = "root";
$password = "";

$dsn = "mysql: host=$host;dbname=$database;";
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('INSERT INTO users (fullname,username,passwordcreated_at,updatedat) VALUES (:p_fullname, :p_username, :p_password,NOW(),NOW())');
    $stmt->bindParam(':p_fullname',$fullname);
    $stmt->bindParam(':p_username',$fullname);
    $stmt->bindParam(':p_password',$fullname);
    $stmt->execute();
} catch (Exception $e){
    echo "Connection Failed: " . $e->getMessage();
}

$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];


if($_SERVER["REQUEST_METHOD"] == "POST"){
//validate confirmpassword

if(trim($password) == trim($confirmPassword)){
    $host = "localhost";
$database = "ecommers";
$username = "root";
$password = "";

$dsn = "mysql: host=$host;dbname=$database;";
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"connection successful";
} catch (Exception $e){
    echo "Connection Failed: " . $e->getMessage();
}

    header("location: /registration.php?success=Password matched");
    exit;


} else {    
    header("location: /registration.php?error=Password not the same");
    exit;


}


}
//received user input
?>