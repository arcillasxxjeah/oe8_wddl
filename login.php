<?php 

    session_start();
    require_once('connect.php');

    $emailaddress = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_tbl WHERE email ='".$emailaddress."' and password ='".$password."'";
    $run = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($run);

    if(mysqli_num_rows($run)==1){
        $_SESSION['logged_in']=true;
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];

        echo '<script type="text/JavaScript">';
        echo 'alert("Login Successful")';
        echo '</script>';
        header("Location:index1.php");
    }else{
        header("Location: login.html");
    }
?>