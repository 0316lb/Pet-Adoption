<?php 
include 'header.php'; 
include 'database.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="donation-wrapper">
        <div class="donation-container">
            <h2>Make Item Donation</h2>
            <form id="donationForm" action="process_donation.php" method="post">
                <label for="Item for donate">Item of Donate:</label>
                <input type="text" id="donationID" name="donationID" required><br><br>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" required><br><br>
                <!-- <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br> -->
                <br>
                <input type="submit" value="Donate" name="Donate-Item-Button">
            </form>
        </div>
        <div class="donation-container">
            <h2>Make Money donation</h2>
            <form id="donationForm" action="money-donation.php" method="post">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" required><br><br>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>
                <br>
                <input type="submit" value="Donate" name="Donate-money-Button">
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>