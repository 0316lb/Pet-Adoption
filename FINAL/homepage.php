<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adopt a Pet</title>
<link rel="stylesheet" href="home.css">
<style>
  <?php include 'home.css'; ?>
</style>
</head>
<body>
<?php include 'header.php' ?>
<div class="container">
  <section>
    <h1 id="homeh1">Adopt, Love, Foster Happiness <span class="heart">❤️</span></h1>
    <p id="homeP">Help us matching the right pet with the right family. We aim to make it easy to adopt from local shelter & rescuer.</p>
</section>
  <div class="cta-buttons">
    <button type="button" onclick="location.href='adopt.php'">Adopt a Pet</button>
    <button type="button" onclick="location.href='donationn.php'" class="donate">Donate</button>
  </div>
</div>
<footer>
        <p>&copy; 2024 Pet Shelter. All rights reserved.</p>
    </footer>
</body>
</html>