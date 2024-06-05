<?php include 'header.php'; //includes database connection

    $pet_id = $_GET["petID"];
    $pet_name = $_GET[ "petName" ];
    $pet_pic = $_GET[ "petPic" ];
    $date = date('y-m-d');

    $user_id = $_SESSION['UID'];


    if(isset( $_GET["btnConfirm"] )){
        $query = "INSERT INTO adoption (PET_ID, ADOPTER, DATE, STATUS) VALUES ('$pet_id', '$user_id', '$date', 'PENDING')";

        $update_query = "UPDATE pet SET STATUS = 'PENDING' WHERE PET_ID = '$pet_id'; ";

        if(mysqli_query($connection, $query) && mysqli_query($connection, $update_query)){
            echo "<script>alert('Your Request have been sent')</script>";
            echo '<script>window.location = "adopt.php";</script>';
            exit;
        }else{
            echo "Failed to Register";
        }

    }
    

    // close connection
    mysqli_close($connection)

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('dog.webp');
            background-size: 100% auto;
        }

        .container {
            margin-top: 120px;
            width: 600px;
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px solid #ccc;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        .back-button {
            align-self: flex-start;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position:absolute;
            margin: 5px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .name {
            font-size: 20px;
            margin-bottom: 10px;
        }

        img {
            max-width: 350px;
            max-height: 300px;
            margin-bottom: 20px;
            margin: auto;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .info_box{
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .adopt-button {
            width: 200px;
            align-self: center;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 12px;
            text-decoration: none;
            text-align: center;

        }

        .adopt-button:hover{
            background-color: #218838;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="goBack()">Back</button>
        <div class="name"><?php echo $pet_name ?></div>
        <img src="pet_img/<?php echo $pet_pic?>" alt=""> <br>
        <div class="info_box">
            Your Request to adopt this pet has been sent to the Rescuer.<br>
            You may find the status of your request on the Adoption Request page, <br>
            where you can also find the contact and email of the rescuer to futher iscuss about the adoption.

        </div>
        <form method="get">
            <input type="hidden" name="petID" value="<?php echo $pet_id; ?>">
            <input type="hidden" name="petName" value="<?php echo $pet_name; ?>">
            <input type="hidden" name="petPic" value="<?php echo $pet_pic; ?>">
            <input type="submit" value="Confirm" class="adopt-button" name="btnConfirm">
        </form>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
