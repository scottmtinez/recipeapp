<?php SESSION_START(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Recipe App</title>

        <!-- Boostrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

        <!-- CSS -->
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="home.css">  
    </head>
    
    <body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
        <!-- Nav Bar from home.html -->
            <nav>
                <ul class="search">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="discover.php">Discover</a></li>
                    <li><a href="addRecipe.php">Add Recipes</a></li>
                    <li><a href="favorites.php">My Favorites</a></li>
                    <li><a href="login.php"><?php echo "$loginName" ?></a></li>
                    <form>
                    <li>
                        <input class="searchBar" type="text" placeholder="Search" />
                    </li>
                    </form>
                </ul>
            </nav>
        
        <?php
            $_SESSION = array(); //Empty array
            session_destroy(); //Destroys the session (logout)
            header("Location: login.php"); //Sends user back to login box
        ?>

        <!-- Footer -->
            <footer>
                <div class="links" id="links">
                    <p class="links"><font color="white">Follow us:</font></p>
                </div>
                <div class="links">
                    <a href="https://www.facebook.com"><font color="white"><i class="bi bi-facebook"></i></font></a>
                </div>
                <div class="links">
                    <a href="https://twitter.com"><font color="white"><i class="bi bi-twitter"></i></font></a>
                </div>
                <div class="links">
                    <a href="https://www.instagram.com"><font color="white"><i class="bi bi-instagram"></i></font></a>
                </div>
                <p class="links">
                    <font color="white">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>
                    </font>
                </p>
            </footer>
    </body>