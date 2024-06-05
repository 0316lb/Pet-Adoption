<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adopt a Pet</title>  
<link rel="stylesheet" href="../home.css">
<link rel="stylesheet" href="styles.css">


</head>
<body>
<?php include 'adminHeader.php' ?>

<div id="account-table">
            <h1>Donation Item List:</h1>
            <table>
                <tr>
                    <th>Item ID</th>
                    <th>UID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Status</th>

                </tr>
                <?php
                $accountSQL = "SELECT * FROM item";
                $accountResult = $connection->query($accountSQL);

                if ($accountResult->num_rows > 0) {
                    while ($row = $accountResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ITEM_ID"] . "</td>";
                        echo "<td>" . $row["UID"] . "</td>";
                        echo "<td>" . $row["NAME"] . "</td>";
                        echo "<td>" . $row["QUANTITY"] . "</td>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "<td>" . $row["STATUS"] . "</td>";
                        echo "</tr>";
                    }
                } else {    
                    echo "<tr><td colspan='4'>0 results</td></tr>";
                }
                ?>
            </table>

        </div>


    <footer>
        <p>&copy; 2024 Pet Shelter. All rights reserved.</p>
    </footer>
</body>
</html>