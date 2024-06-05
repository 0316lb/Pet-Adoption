<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adopt a Pet</title>  
<link rel="stylesheet" href="../home.css">
<style>
  <?php include '../home.css'; ?>
</style>
</head>
<body>
<?php include 'adminHeader.php' ?>
<div class="container">
  <section>
    <h1 id="homeh1_admin">Welcome Petshelter Admin</h1>
    <!-- <p id="homeP">Help us matching the right pet with the right family. We aim to make it easy to adopt from local shelter & rescuer.</p> -->
</section>
<br>
<br>
  <div class="cta-buttons">
    <button type="button" onclick="location.href='showUser.php'">User</button>
    <button type="button" onclick="location.href='showItemDonation.php'">Item Donation</button>
    <button type="button" onclick="location.href='showMoneyDonation.php'">Money Donation</button>
  </div>
</div>
<footer>
        <p>&copy; 2024 Pet Shelter. All rights reserved.</p>
    </footer>
</body>
</html>
