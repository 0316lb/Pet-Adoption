<?php 
    include 'database.php';

/// Check if PET_ID is set and not empty
    if(isset($_GET['AID']) && !empty($_GET['AID'])) {
        // Get the PET_ID from the URL
        $AID = $_GET['AID'];
        $PID = $_GET['PID'];

        // Update adoption record status to "APPROVED"
        $update_query1 = "UPDATE adoption SET STATUS = 'REJECTED' WHERE ADOPTION_ID = '$AID'";
        $result1 = mysqli_query($connection, $update_query1);

        $update_query2 = "UPDATE pet SET STATUS = 'AVAILABLE' WHERE PET_ID = '$PID'";
        $result2 = mysqli_query($connection, $update_query2);

        if($result1 && $result2) {
            // Approval successful, redirect back to the previous page
            echo '<script>window.location = "view_listing.php";</script>';
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