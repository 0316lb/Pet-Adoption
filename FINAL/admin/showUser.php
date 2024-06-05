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
            <h1>Registered User List:</h1>
            <table>
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Date of birth</th>

                </tr>
                <?php
                $accountSQL = "SELECT * FROM user";
                $accountResult = $connection->query($accountSQL);

                if ($accountResult->num_rows > 0) {
                    while ($row = $accountResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["USER_ID"] . "</td>";
                        echo "<td>" . $row["FULL_NAME"] . "</td>";
                        echo "<td>" . $row["EMAIL"] . "</td>";
                        echo "<td>" . $row["PASSWORD"] . "</td>";
                        echo "<td>" . $row["DOB"] . "</td>";
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
