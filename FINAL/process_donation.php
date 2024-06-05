<?php 
include 'database.php';

session_start();

if (isset($_SESSION['EMAIL'])){

    if(isset($_POST['Donate-Item-Button'])){
        $donationID = $_POST['donationID'];
        $quantity = $_POST['quantity'];
        // $status = $_POST['status'];
        $uidInt = intval($_SESSION['UID']);     
        
        $query = "INSERT INTO item (UID, NAME, QUANTITY) VALUES ('$uidInt','$donationID','$quantity')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo '<script>alert("Donation successful");</script>';
            // Redirect back to donationn.php after showing the alert
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
