<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="Register.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add any additional CSS styles here */
    </style>
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
            <h1>User Registration</h1>
            <div class="input-box">
                <i class="bx bx bxs-user"></i> 
                <input type="text" id="username" placeholder="Username" name="username" required />
            </div>
            <div class="input-box">
                <i class="bx bx-envelope"></i> 
                <input type="email" id="email" placeholder="Email Address" name="email" required />
            </div>
            <div class="input-box">
                <i class="bx bxs-lock-alt"></i>
                <input type="password" placeholder="Enter password here" id="password" name="password" required>
            </div>
            <div class="input-box">
                <i class="bx bxs-lock-alt"></i>
                <input type="password" placeholder="Confirm password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" onclick="togglePassword()"> Show Password</label>
            </div>
            <button type="submit" class="button">Register</button>
        </form>
    </div>

    

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
</body>
</html>
<?php
    session_start();
    include 'dbConnectionsEnOperaties.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate form data
        if ($password !== $confirm_password) {
            // Passwords don't match
            $registration_error = "Error: Passwords do not match.";
        } else {
            $Rol_ID = 2;

            // Check if the username or email already exists in the database
            $check_query = "SELECT * FROM Gebruikers WHERE GebruikersNaam = ? OR EmailAdres = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bind_param("ss", $username, $email);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            if ($result->num_rows > 0) {
                // Username or email already exists
                $registration_error = "Error: Username or email already exists. Please choose a different one.";
            } else {
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $insert_query = "INSERT INTO Gebruikers (GebruikersNaam, EmailAdres, Wachtwoord_Hash, Rol_ID) VALUES (?, ?, ?, ?)";
                $insert_stmt = $conn->prepare($insert_query);
                $insert_stmt->bind_param("sssi", $username, $email, $hashed_password, $Rol_ID);

                if ($insert_stmt->execute()) {
                    // Registration successful
                    echo "<p>Registration successful! You can now login.</p>";
                    // Redirect to a success page
                    header("Location: Login.php");
                    exit(); // Stop further execution (thing with the looping was pain)
                } else {
                    // Registration failed
                    $registration_error = "Error: " . $insert_query . "<br>" . $conn->error;
                }
            }
        }

        $check_stmt->close();
        $insert_stmt->close();
    }
 if (isset($registration_error)) { 
        echo $registration_error;
  } 
    ?>




<div class="Bootstrap-footer">
        <footer class="bg-body-tertiary text-center">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Social media icons -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
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