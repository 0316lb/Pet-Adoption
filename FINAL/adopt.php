<?php include 'header.php'; //includes database connection?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('111.avif');
            background-size: 100% auto; 
            background-repeat: repeat-y;
        }

        .container {
            max-width: 1100px;
            width: 90%;
            margin: auto;
            display: grid;
            grid-template-columns: minmax(260px, 1fr) minmax(auto, 3fr);
            grid-gap: 1vw;
            margin-top: 120px;
            margin-bottom: 1vw;
        }

        .left_container {
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        /* Adjustments for smaller screens */
        @media screen and (max-width: 768px) {
            .container {
                grid-template-columns: 1fr; /* Display only one column on smaller screens */
            }
            
            .left_container {
                grid-row: 2; /* Ensure it occupies the full width */
                margin-top: 20px;
            }
        }

        .sort,
        .filter {
            background-color: #f2f2f2;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .sort h2,
        .filter h2 {
            margin-top: 0;
        }

        .sort label,
        .filter label {
            display: block;
            margin-bottom: 10px;
        }
        .sort,
        .filter {
            background-color: #f2f2f2;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .sort h2,
        .filter h2 {
            margin-top: 0;
        }

        .sort label,
        .filter label {
            display: block;
            margin-bottom: 10px;
        }


        .pet_box {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Adjust grid columns */
            grid-gap: 1vw;
            margin-top: 1vw;
        }

        .pet {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: whitesmoke;
            border-radius: 10px;
            padding: 10px;
        }

        .pet img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 5px;
            object-fit: cover;
        }

        .pet_info ul {
            padding: 0;
            margin: 10px 0 0 0;
            list-style-type: none;
            text-align: center;
        }

        .pet_info ul li {
            font-size: 14px;
        }

        .pet_info ul li:first-child {
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: black;
        }

        /* Hover effect */
        .pet:hover {
            background-color: #9bcc50;

        }



    </style>
</head>
<body>
    <div class="container">

        <div class="left_container">


            <div class="sort">
                <h2>Sort</h2>
                <form action="" method="post">
                    <label for="sort_field">Sort By:</label>
                    <select id="sort_field" name="sort_field">
                        <option value="NAME">Name</option>
                        <option value="DOB">Age</option>
                    </select>
                    <br>
                    <label for="sort_order">Order:</label>
                    <select id="sort_order" name="sort_order">
                        <option value="ASC">ASC</option>
                        <option value="DESC">DESC</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Sort" name="btnSort">
                </form>
            </div>

            <div class="filter"><h2>Filter</h2>
                <form action="" method="post">
                    Species: <br>
                    <label><input type="radio" name="rdoSpecies" id="" value="All" checked>All</label>
                    <label><input type="radio" name="rdoSpecies" id="" value="Dog">Dog</label>
                    <label><input type="radio" name="rdoSpecies" id="" value="Cat">Cat</label><br>
                    <br>
                    <input type="submit" value="Filter" name="btnFilter">
                </form>
            </div>


        </div>


        <?php
    // Initialize $query
    $query = "SELECT * FROM pet WHERE STATUS = 'AVAILABLE'";

    // Handle sorting
    if (isset($_POST['btnSort'])) {
        $sort_method = $_POST['sort_field'];
        $sort_order = $_POST['sort_order'];
        $sort = "$sort_method $sort_order";
        $query .= " ORDER BY $sort";
    }

    // Handle filtering
    if (isset($_POST['btnFilter'])) {
        $filter_target = $_POST['rdoSpecies'];
        if ($filter_target !== 'All') {
            if (strpos($query, 'WHERE') !== false) {
                $query .= " AND SPECIES = '$filter_target'";
            } else {
                $query .= " WHERE SPECIES = '$filter_target'";
            }
        }
    }

    $results = mysqli_query($connection, $query);
?>

<div class="pet_box">
    <?php while ($row = mysqli_fetch_assoc($results)): ?>
        
            <a href="pet_details.php?petID=<?php echo $row['PET_ID']?>">
                <div class="pet">
                    <img src="pet_img/<?php echo $row['PICTURE']?>" alt=""/>
                    <div class="pet_info">
                        <ul>
                            <li><?php echo $row['NAME']?></li>
                            <li><?php echo $row['SPECIES']?></li>
                            <li><?php echo $row['BREED']?></li>
                            <li><?php echo $row['DOB']?></li>
                        </ul>
                    </div>
                </div>
            </a>
        
    <?php endwhile; 
    mysqli_close($connection)
    ?>
</div>

    </div>
    
</body>
</html>
