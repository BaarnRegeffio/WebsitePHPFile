<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Login.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Fonts Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="Navbar">
            <a href="Index1.html" class="logo">MovieScope</a>
            <ul class="menu-links">
                <li><a class="men" href="Index1.html">Home</a></li>
                <li><a class="men" href="AboutUs.html">About us</a></li>
            </ul>
        </div>
    </header>

    <div class="login-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <i class="bx bx bxs-user"></i> 
                <input type="text" id="username" placeholder="Username" name="username" required />
            </div>
            <div class="input-box">
                <i class="bx bxs-lock-alt"></i>
                <input type="password" placeholder="Enter password here" id="password" name="password" required><br>
            </div>
            <button type="submit" class="button">Login</button>
            <div class="remember-forgot">
                <label><input type="checkbox" onclick="togglePassword()"> Show Password</label>
                <a class="fr" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCYPlu5xiBB5mU4WiXqO-los-G8m2QRrxmCRULb6XwmQ&s" target="_blank">Forgot password?</a>
            </div>
            <br>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </form>
        <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var confirmPasswordField = document.getElementById("confirm_password");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
            }
        }
     </script>
        <?php
        session_start();

        include 'dbConnectionsEnOperaties.php';

        $error_message = "";

        // Check if the form is submitted and then receive the data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Fetch user data
            $sql = "SELECT * FROM Gebruikers WHERE GebruikersNaam = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Username exists, verify password
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['Wachtwoord_Hash'])) {
                    // Password is correct, set session variables
                    $_SESSION['user_id'] = $row['GebruikersID'];
                    $_SESSION['role_id'] = $row['Rol_ID'];

                    if ($row['Rol_ID'] == 1) {
                        // Admin user
                        header("Location: start.php");
                        exit();
                    } else {
                        // Regular user
                        header("Location:Watchers/Movies.php");
                        exit();
                    }
                } else {
                    $error_message = "Error: Incorrect password.";
                }
            } else {
                $error_message = "Error: Username not found.";
            }

            $stmt->close();
        }

        if (!empty($error_message)) {
            echo '<div style="color: red;">' . $error_message . '</div>';
        }
        ?>
    </div>

    <div class="Bootstrap-footer">
        <footer class="bg-body-tertiary text-center">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                    <!-- Twitter -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                    <!-- Google -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>
                    <!-- Instagram -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                    <!-- Linkedin -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;" href="https://github.com/BaarnRegeffio/WebsitePHPFile" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.09);">
                © 2024 Copyright:
                <a class="text-body">Regeffio Baarn & Neal Soempeno</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>
</html>
