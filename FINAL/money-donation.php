<?php 
include 'database.php';

session_start();

if (isset($_SESSION['EMAIL'])){

    if(isset($_POST['Donate-money-Button'])){
        // $donationID = $_POST['donationID'];
        $quantity = $_POST['quantity'];
        $date = $_POST['date'];
        $status = $_POST['status'];
        $uidInt = intval($_SESSION['UID']);

        $query = "INSERT INTO money_donation (USER_ID, AMOUNT, DATE) VALUES ('$uidInt','$quantity','$date')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo '<script>alert("Donation successful");</script>';
            echo '<script>window.location.href = "donationn.php";</script>';
            exit();
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        }

} else{
    echo'<script>
    setTimeout(function(){
        alert("Please sign in before donating");
        window.location.href = "homepage.php",true;
    }, 100);
    </script>';

}
?>