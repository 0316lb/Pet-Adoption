<?php include 'header.php'; //includes database connection

    $user_id = $_SESSION['UID'];

    $pet_id = $_GET['petID'];

    $query = "SELECT * FROM pet WHERE PET_ID = '$pet_id'";

    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('dog.webp');
            background-size: 100% auto;
        }

        .container{
            width: 950px;
            margin: 120px auto;
            display: flex;
            flex-direction: column;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .name {
            text-align: center;
            width: 100%;
        }

        .pet_container{
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        img{
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            margin: auto;
            border-radius: 10px;
        }

        .info {
            font-size: medium;
            width: auto;
            margin-top:auto ;
            margin-bottom: auto;
        }

        tr {
            display: inline-flex;
            flex-direction: column;
            padding: 10px;
        }

        th {
            text-align: left;
        }

        .description {
            padding: 50px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 20px
        }

        .description p {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            text-align: justify;
        }

        .description p:first-of-type {
            margin-top: 0;
        }

        .description p:last-of-type {
            margin-bottom: 0;
        }

        .back-button {
            width: 800px;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .adopt-button:hover{
            background-color: #218838;
        }


        .adopt-button {
            width: 800px;
            margin: auto;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            }

    </style>
</head>
<body>
    <div class="container">
        <div class="name"><h1><?php echo $row['NAME']; ?></h1></div>
        <div class="pet_container">
            <img class="picture" src="pet_img/<?php echo $row["PICTURE"] ;?>" alt="">
            <div class="info">
                <table>
                    <tr>
                        <th>Species</th>
                        <th>Breed</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Vacination</th>
                        <th>Dewormed</th>
                        <th>Spayed</th>
                        <th>Condition</th>
                        <th>Location</th>
                        <th>Adoption Fee</th>
                    </tr>

                    <tr>
                        <td><?php echo $row['SPECIES']; ?></td>
                        <td><?php echo $row['BREED']; ?></td>
                        <td><?php echo $row['GENDER']; ?></td>
                        <td><?php echo $row['DOB']; ?></td>
                        <td>
                            <?php 
                                if  ($row['VACCINATION'] == True){
                                    echo "YES";
                                } else{
                                    echo "NO";}
                                ?>
                        </td>
                        <td>
                            <?php 
                                if  ($row['DEWORMED'] == True){
                                    echo "YES";
                                } else{
                                    echo "NO";}
                                ?>
                        </td>
                        <td>
                            <?php 
                                if  ($row['SPAYED'] == True){
                                    echo "YES";
                                } else{
                                    echo "NO";}
                                ?>
                        </td>
                        <td><?php echo $row['STATE']; ?></td>
                        <td><?php echo $row['LOCATION']; ?></td>
                        <td>
                            <?php 
                                    if  ($row['ADOPTION_FEE'] == 0.00){
                                        echo "FREE";
                                    } else{
                                        echo "RM". $row['ADOPTION_FEE'];}
                                    ?>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="description">
            <p>
                <?php echo $row['DESCRIPTION']; ?>
            </p>
        </div>

        <a class="adopt-button button" href="adoption.php?petID=<?php echo $row['PET_ID']?>&petName=<?php echo $row['NAME']?>&petPic=<?php echo $row['PICTURE']?>">Adopt</a>
        <button class="back-button button" onclick="goBack()">Back</button>
    
    </div>

    <?php mysqli_close($connection) ?>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>