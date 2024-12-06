<?php
require "dbconnect.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (empty($email AND $password )) {
        header("location: /Forum/index.php");
    }else{
        $sql = "SELECT * FROM  `users` WHERE Email = '$email' AND Password = '$password'";
        $result = mysqli_query($con,$sql);
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['srn'] = $row['srn'];
            $_SESSION['email'] = $email;
            header("location: /Forum/index.php?loginsuccessfull=true");
            exit();
        }else{
            header("location: /Forum/index.php?invalidcredentials=true");
            exit();
        }

    }
}
