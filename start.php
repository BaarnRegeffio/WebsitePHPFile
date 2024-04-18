<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
<body>
<a href="login.php"><button>Logout</button></a>

    <h1>Welcome!</h1>
    <form method="post" action="showmovies.php">
        <button type="submit" name="ShowAllMovies">Show All Movies</button>
    </form>

    <form method="post" action="addmovies.php">
        <button type="submit" name="AddMovies">Add Movies</button>
    </form>

    <form method="post" action="showgenres.php">
        <button type="submit" name="ShowAllGenres">Show All Genres</button>
    </form>

    <form method="post" action="addgenres.php">
        <button type="submit" name="AddGenres">Add Genres</button>
    </form>

    <form method="post" action="showdirectors.php">
        <button type="submit" name="ShowAllDirectors">Show All Directors</button>
    </form>

    <form method="post" action="adddirectors.php">
        <button type="submit" name="AddDirectors">Add Directors</button>
    </form>

    <form method="post" action="showusers.php">
        <button type="submit" name="ShowAllUsers">Show All Users</button>
    </form>
</body>
</html>
