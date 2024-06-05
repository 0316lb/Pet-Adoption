<?php 
include 'database.php';

session_start();

if (isset($_POST["register-btn"])) {
    $username = $_POST['register-username'];
    $email = $_POST['register-email'];
    $password = $_POST['register-password'];
    $dob = $_POST['register-dob'];

    $insert_query = "INSERT INTO user (FULL_NAME, EMAIL, PASSWORD, DOB) VALUES ('$username', '$email', '$password', '$dob')";
    if (mysqli_query($connection, $insert_query)) {
        $_SESSION['UID'] = mysqli_insert_id($connection); 
        $_SESSION['FULL_NAME'] = $username;
        $_SESSION['EMAIL'] = $email;
        $_SESSION['DOB'] = $dob;
        header("Location: homepage.php");
        exit();
    } else {
        // Registration failed, handle error 
        $_SESSION['registerError'] = "Registration failed. Please try again.";
        header("Location: register.php"); // Redirect back to the registration page
        exit();
    }

    mysqli_close($connection);
}
?>
