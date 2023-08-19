<?php SESSION_START(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recipe App</title>
    <!--<link rel="icon" type="image/x-icon" href="assets/imgs/img.png">-->
    <!-- font icons -->
    
    <!-- Bootstrap + main styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="displayRecipe.css">
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

    <!-- BODY THAT PRINTS OUT THE USERS TABLE -->
    <!-- PHP CODE -->
    <?php
            $title = $_POST["title"];
            $prepTime = $_POST["prepTime"];
            $cookTime = $_POST["cookTime"];
            $recipeType = $_POST["recipeType"];
            $originalCreator = $_POST["originalCreator"];
            $yield= $_POST["yield"];
            $dateAdded = $_POST["dateAdded"];
            $ingredientes = $_POST["ingredientes"];

        //TESTING
            //echo "<h2 id='discover-title'>$title</h2>";
            //echo "<p>$prepTime</p>";
            //echo "<p>$cookTime</p>";
            //echo "<p>$recipeType</p>";
            //echo "<p>$originalCreator</p>";
            //echo "<p>$yield</p>";
            //echo "<p>$dateAdded</p>";
            //echo "<p>$ingredientes</p>";

            echo"
                <div class='recipe-container' style='margin-top: 10px;'>
                    <div class='picture-holder'></div>
                    <div class='recipe-info' id='holder'>
                        <h2>$title</h2>
                        <p>Preperation Time: $prepTime</p>
                        <p>Time to Cook: $cookTime</p>
                        <p>Type of Recipe: $recipeType</p>
                        <p>Recipe Creator: $originalCreator</p>
                        <p>How much this recipe yields: $yield</p>
                        <p>Date Added: $dateAdded</p>
                        <p>Ingredientes Needed:<br>$ingredientes</p>
                        <p>Note: This is where steps will go</p>
                        <form action='discover.php'><input class='goBack' type='submit' value='Go back to Discover Page'></form><br>
                    </div>
                </div>
            ";
            
            print_r (explode(", ",$ingredientes));
    ?>

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