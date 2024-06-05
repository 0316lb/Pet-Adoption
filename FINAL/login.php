<?php 
include 'database.php';

session_start();

if (isset($_POST["login-btn"])) {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    $query = "SELECT * FROM user WHERE EMAIL = '$email' AND PASSWORD = '$password'";
    $result = mysqli_query($connection, $query);
    $login = mysqli_fetch_array($result);

    if (is_array($login)) {

        $_SESSION['UID'] = $login['USER_ID'];
        $_SESSION['FULL_NAME'] = $login['FULL_NAME'];
        $_SESSION['EMAIL'] = $login['EMAIL'];
        $_SESSION['DOB'] = $login['DOB'];
        
        if($login['FULL_NAME']=="Admin"){
            header("Location: admin/homepage.php"); 
        }else{
            header("Location: homepage.php"); 
        }
        exit();
    } else {
        // $_SESSION['signInError'] = "Invalid credentials, please try again";
        // header("Location: donationn.php"); 
        // '<script> 
        //     alert("Invalid credentials, please try again"); 
        //     window.location.href = "../about.php";
        // </script>';
        header("Location: homepage.php");
        exit();
    }
   
    mysqli_close($connection);
}


?>
