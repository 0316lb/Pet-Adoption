<?php 
    include 'database.php';

/// Check if PET_ID is set and not empty
    if(isset($_GET['petID']) && !empty($_GET['petID'])) {
        // Get the PET_ID from the URL
        $PID = $_GET['petID'];

        // Update adoption record status to "APPROVED"
        $query = "DELETE FROM `pet` WHERE PET_ID = '$PID'";
        $result = mysqli_query($connection, $query);

        if($result) {
            // Approval successful, redirect back to the previous page
            header("Location: view_listing.php");
            exit();
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