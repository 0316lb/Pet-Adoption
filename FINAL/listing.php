<?php include "header.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Form data
        $name = $_POST['name'];
        $species = $_POST['species'];
        $breed = $_POST['breed'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $vaccination = isset($_POST['vaccination']) ? 1 : 0;
        $dewormed = isset($_POST['dewormed']) ? 1 : 0;
        $spayed = isset($_POST['spayed']) ? 1 : 0;
        $location = $_POST['location'];
        $description = $_POST['description'];
        $adoption_fee = $_POST['adoption_fee'];
        $rescuer = $_SESSION['UID']; 

        // Image upload
        $target_dir = "pet_img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileName = basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>alert('Sorry, file already exists.');</script>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "<script>alert('Sorry, your file is too large.');</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>"; 
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file was not uploaded.');</script>";

        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "<script>alert('The file " . $imageFileName . " has been uploaded.');</script>"; 
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>"; 
            }
        }
    
        // Insert data into database
        $query = "INSERT INTO pet (`NAME`, `SPECIES`, `BREED`, `GENDER`, `DOB`, `PICTURE`, `STATE`, `VACCINATION`, `DEWORMED`, `SPAYED`, `LOCATION`, `DESCRIPTION`, `STATUS`, `ADOPTION_FEE`, `RESCUER`) VALUES ('$name','$species','$breed','$gender','$dob','$imageFileName','HEALTHY', $vaccination, $dewormed,$spayed,'$location','$description','AVAILABLE',$adoption_fee,'$rescuer')";
    
        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Stray is Listed for Adoption.')</script>";
            echo '<script>window.location = "listing.php";</script>';
            exit;

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }

    mysqli_close($connection);?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Rescued Strays for Adoption</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('jason.jpg');
            background-size: 100% auto;
            background-repeat: repeat-y;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 120px auto;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
       
            
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2>List Rescued Strays for Adoption</h2>
            <form action="" method="post" enctype="multipart/form-data">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="species">Species:</label>
            <input type="text" id="species" name="species" required><br><br>

            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed"><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value= "null"><br><br>

            <label for="vaccination">Vaccination (the is stray vaccinated):</label>
            <input type="checkbox" id="vaccination" name="vaccination"><br><br>

            <label for="dewormed">Dewormed (the stray has been dewormed):</label>
            <input type="checkbox" id="dewormed" name="dewormed"><br><br>

            <label for="spayed">Spayed (the has stray been neutered or sterilized):</label>
            <input type="checkbox" id="spayed" name="spayed"><br><br>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

            <label for="adoption_fee">Adoption Fee:</label>
            <input type="number" id="adoption_fee" name="adoption_fee" min="0" step="0.01" value= 0.00><br><br>

            <input type="submit" value="Submit" name="btnSubmit">
        </form>
</div>
</body>
</html> 

    </div>
</body>
</html>
