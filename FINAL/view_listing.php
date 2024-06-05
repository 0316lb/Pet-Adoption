<?php include 'header.php'; //includes database connection?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('jason.jpg');
            background-size: 100% auto;
            background-repeat: repeat-y;
        }
        
        .container {
            margin: 120px auto;
            width: 900px;
            text-align: center;
        }

        .container1{
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px;
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
        <div class="container1">
        <h1>Listed Strays</h1>
            <table>
                <tr>
                    <th>NAME</th>
                    <th>SPECIES</th>
                    <th>BREED</th>
                    <th>ADOPTER</th>
                    <th>CONTACT</th>
                    <th>EMAIL</th>
                </tr>


                <?php
                    // Retrieve user's listings
                    $user_id = 1; // Example user ID, replace it with actual user ID
                    $query = "SELECT `adoption`.*, `user`.*, `pet`.*
                                FROM `adoption` 
                                    LEFT JOIN `user` ON `adoption`.`ADOPTER` = `user`.`USER_ID` 
                                    LEFT JOIN `pet` ON `adoption`.`PET_ID` = `pet`.`PET_ID`
                                        WHERE adoption.STATUS = 'PENDING';";
                    $result = mysqli_query($connection, $query);

                    // Check if there are any listings
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                
                ?>
                <tr>
                    <td><?php echo $row["NAME"] ?></td>
                    <td><?php echo $row["SPECIES"] ?></td>
                    <td><?php echo $row["BREED"] ?></td>
                    <td><?php echo $row["FULL_NAME"] ?></td>
                    <td><?php echo $row["CONTACT"] ?></td>
                    <td><?php echo $row["EMAIL"] ?></td>
                    <td style="width: 90px;"><a href="approve_request.php?AID=<?php echo $row['ADOPTION_ID']?>&PID=<?php echo $row['PET_ID']?>" class="edit-btn" onclick="return confirm('Are you sure you want to approve this Request?')">APPROVE</a></td>
                    <td style="width: 100px;"><a href="reject_request.php?AID=<?php echo $row['ADOPTION_ID']?>&PID=<?php echo $row['PET_ID']?>" class="delete-btn" onclick="return confirm('Are you sure you want to reject this Request?')">REJECT</a></td>
                </tr>
                <?php 
                        }
                    } else {
                        echo "No listings found.";
                    }
                ?>
            </table>
        </div>
        
        <br>


        <div class="container1">
        <h1>Listed Strays</h1>
            <table>
                <tr>
                    <th>NAME</th>
                    <th>SPECIES</th>
                    <th>BREED</th>
                </tr>


                <?php
                    // Retrieve user's listings
                    $user_id = 1; // Example user ID, replace it with actual user ID
                    $query = "SELECT * FROM pet WHERE RESCUER = '$user_id'AND STATUS = 'AVAILABLE';";
                    $result = mysqli_query($connection, $query);

                    // Check if there are any listings
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                
                ?>
                <tr>
                    <td><?php echo $row["NAME"] ?></td>
                    <td><?php echo $row["SPECIES"] ?></td>
                    <td><?php echo $row["BREED"] ?></td>
                    <td style="width: 100px;"><a href="delete_listing.php?petID=<?php echo $row['PET_ID']?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this pet?')">DELETE</a></td>
                </tr>
                <?php 
                        }
                    } else {
                        echo "No listings found.";
                    }
                
                    mysqli_close($connection);
                ?>
            </table>
        </div>
    </div>
</body>
</html>