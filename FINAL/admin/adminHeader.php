<?php
    include '../database.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETSHELTER</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <header style="background-color: #bbb;">
        <h2 class="logo">PETSHELTER<h2>
        <nav class="navigation">
            <a href="showUser.php">User</a>
            <a href="showItemDonation.php">Item Donatiopn</a>
            <a href="showMoneyDonation.php">Money Donation</a>
            <?php
                if (isset($_GET['logout'])) {
                    session_destroy();
                    header("Location: ../homepage.php");
                    exit();
                }
                if (isset($_SESSION['FULL_NAME'])) {
                    echo '
                        <div class="dropdown">
                        <button class="btnLogin-popup">' . $_SESSION['FULL_NAME'] . '</button>
                        <div class="dropdown-content" id="profileDropdown">
                            <a href="?logout=true" id="logoutLink">Logout</a>
                        </div>
                        </div>';
                } else {
                    echo '<button class="btnLogin-popup">Login</button>';
                }
            ?>
        </nav>
    </header>
    
    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>

        <div class="form-box login">
            <form action="login.php" method='post'>
                <h2>Login</h2>
                <form action="#">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name='login-email'required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name='login-password'  required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">Remember me</label>
                    </div>
                    <button type="submit" class="btn" name='login-btn'>Login</button>
                    <div class="login-register">
                        <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                    </div>
                </form>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="register.php" method='post'>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="register-username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="register-email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="register-password" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="date of birth"></ion-icon></span>
                    <input type="Date" name="register-dob" required>
                    <label></label>
                </div>
                <!-- <div class="input-box">
                    <span class="icon"><ion-icon name="checkbox"></ion-icon></span>
                    <input type="radio" name="Gender" id="male" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" name="Gender" id="female" value="female" required>
                    <label for="female">Female</label>
                    <label>Gender</label>
                </div> -->

                <button type="submit" class="btn" name="register-btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>