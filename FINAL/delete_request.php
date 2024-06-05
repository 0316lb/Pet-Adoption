<?php 
    include 'database.php';

/// Check if PET_ID is set and not empty
    if(isset($_GET['AID']) && !empty($_GET['AID'])) {
        // Get the PET_ID from the URL
        $AID = $_GET['AID'];
        $PID = $_GET['PID'];
        $STATUS = $_GET['STATUS'];

        // Update adoption record status to "APPROVED"
        $query = "DELETE FROM `adoption` WHERE ADOPTION_ID = '$AID'";
        $result = mysqli_query($connection, $query);

        if($STATUS == "PENDING"){
            $update_query = "UPDATE pet SET STATUS = 'AVAILABLE' WHERE PET_ID = '$PID'";
            $result2 = mysqli_query($connection, $update_query);
        }

        if($result) {
            // Approval successful, redirect back to the previous page
            echo '<script>window.location = "adoption_req.php";</script>';
            exit;
        } else {
            // Error occurred
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        // PET_ID parameter not set or empty
        echo "Invalid request.";
    }

    // Close connection
    mysqli_close($connection);
?>