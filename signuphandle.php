<?php
require "dbconnect.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if (empty($name AND $email AND $password AND $cpassword)) {
        header("location: /Forum/index.php");
    }else{
        $existsql = "SELECT * FROM `users` WHERE Email = '$email' ";
        $results = mysqli_query($con,$existsql);
        $row = mysqli_num_rows($results);
        if($row>0){
            header("location: /Forum/index.php?Emailalreadyexist=true");
            exit();
        }else{
            if($password==$cpassword){
                $sql = "INSERT INTO `users` (`Name`, `Email`, `Password`) VALUES ('$name', '$email', '$password')";
                $result = mysqli_query($con,$sql);
                if($result){
                    header("location: /Forum/index.php?registersuccessfull=true");
                    exit();
                }
            }else{
                header("location: /Forum/index.php?Passwordnotmatch=true");
                exit();
            }

        }


    }
    







}

?>