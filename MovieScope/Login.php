<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MovieSit</title>
    <link rel="stylesheet" href="Login.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!--Google Fonts Icons-->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,400;1,500&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <header>
      <div class="Navbar">
        <a href="Index1.html" class="logo">FilmScope</a>
        <ul class="menu-links">
          <li><a class="men" href="Index1.html">Home</a></li>
          <li><a class="men" href="#">MovieForm</a></li>
          <li><a class="men" href="#">About us</a></li>
        </ul>
      </div>
    </header>
  

    <div class="login-form">
      <form action="">
        <h1>Login</h1>
        <div class="input-box">
            <i class="bx bx bxs-user"></i> 
            <input type="text" id="username" placeholder="Username" required />
        </div>
        <div class="input-box">
            <i class="bx bxs-lock-alt"></i>
            <input type="password" placeholder="password" required />
        </div>
        <button type="submit" class="button">Login</button>
        <div class="remember-forgot">
          <label><input type="checkbox" /> Remember me</label>
          <a class="fr" href="#">Forgot password?</a>
        </div>
            <br>
        <div class="register-link">
          <p>Dont have acount? <a href="#">Register here</a></p>
        </div>
      </form>
    </div>
  </body>
</html>
