<?php SESSION_START(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recipe App</title>
    <!--<link rel="icon" type="image/x-icon" href="assets/imgs/img.png">-->
    <!-- font icons -->
    <!--<link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">-->

    <!-- Bootstrap + main styles -->
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Gets home.css Style -->
    <link rel="stylesheet" href="home.css"> 
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

<?php
        if(isset($_SESSION['username'])){
            $loginName = $_SESSION['username'];
        }else{
            $loginName = "Login/Sign up";      
        }
          
?>

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

    <div class="topRecipes-row">
        <div class="main-picture">
            <h1 class="h1-title">Start your Morning off Right!</h1>
            <h2><a href="" class="h2-recipe">Perfect Homemade Waffles</a></h2>
            <h2><a href="" class="h2-recipe">Avocado Toast with Eggs</a></h2>
        </div>
        <div>
            <h1><center><font color="black">Top 5 Recipes Of The Day!</font></center></h1>
        </div>
        <div id="r1" class="topRecipes-column">
            <h3 id="r1Name"> <a href="" class="centered">Blueberry Muffins</a></h3>
        </div>
        <div id="r2" class="topRecipes-column">
            <h3 id="r2Name"> <a href="" class="centered">Cheeseburger</a></h3>
        </div>
        <div id="r3" class="topRecipes-column">
            <h3 id="r3Name"> <a href="" class="centered">Deviled Eggs</a></h3>
        </div>
        <div id="r4" class="topRecipes-column">
            <h3 id="r4Name"> <a href="" class="centered">BBQ Chicken</a></h3>
        </div>
        <div id="r5" class="topRecipes-column">
            <h3 id="r5Name"> <a href="" class="centered">Chocolate Chip Cookies</a></h3>
        </div>
    </div>

    
    <footer>
        <div class="links">
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
</html>