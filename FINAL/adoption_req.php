<?php include 'header.php'; //includes database connection?>

<!DOCTYPE html>
<html>
<head>
    <title>View Adoption Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('dog.webp');
            background-size: 100% auto;
        }
         
        .container {
            margin: 120px auto;
            width: 900px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        
        th {
            text-align: center;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .edit-btn, .delete-btn {
            display: inline-block;
            padding: 6px 12px;
            margin: auto;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
        
        .edit-btn:hover, .delete-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Adoption Requests</h2>
        <?php
        $UID = $_SESSION['UID'];

        // Query to fetch adoption requests
        $sql = "SELECT *
                        FROM `adoption` 
                            LEFT JOIN `pet` ON `adoption`.`PET_ID` = `pet`.`PET_ID` 
                            LEFT JOIN `user` ON `adoption`.`ADOPTER` = `user`.`USER_ID`
                            WHERE adoption.ADOPTER = $UID";

        $result = mysqli_query($connection, $sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Pet Name</th><th>Species</th><th>Rescuer Name</th><th>Rescuer Email</th><th>Stats</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["NAME"] . "</td>";
                echo "<td>" . $row["SPECIES"] . "</td>";
                echo "<td>" . $row["FULL_NAME"] . "</td>";
                echo "<td>" . $row["EMAIL"] . "</td>";
                echo "<td>" . $row["STATUS"] . "</td>";
                echo "<td><a href='delete_request.php?AID=" . $row["ADOPTION_ID"] . "&PID=" . $row["PET_ID"] . "&STATUS=" . $row["STATUS"] . "' class='delete-btn' onclick=\"return confirm('Are you sure you want to reject this Request?')\">Delete</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($connection)
        ?>

    </div>
    
</body>
</html>
