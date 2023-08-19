<?php SESSION_START(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recipe App</title>
    <!--<link rel="icon" type="image/x-icon" href="assets/imgs/img.png">-->
    <!-- font icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    
    <!-- Bootstrap + main styles -->
    <link rel="stylesheet" href="addRecipe.css">
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

    <?php 
        if(isset($_SESSION['username'])){
    ?>
    <div clas="addRecipe-container">
        <form class="addRecipe-form" method="POST">
            <h1 class="title">Add a Recipe</h1>
            <input id="recipe-title" class="recipe-title" name="recipeTitle" placeholder="[Recipe title here]" type="text"><br>
            <textarea class="section" id="introduction-title" name="desc" placeholder="Description:" rows="10" cols="142" style="margin-bottom:15px;"></textarea>
            <textarea class="section" id="ingredients-title" name="ingredients" placeholder="Add Ingredients and separate them by the enter key" rows="10" cols="142" style="margin-bottom: 15px;"></textarea><br>
            <input type="text" class="inputBox" id="" name="prepTime" placeholder="Add Prep Time (min)">
            <input type="text" class="inputBox" id="" name="cookTime" placeholder="Add Cook Time (min)">
            <input type="text" class="inputBox" id="" name="recipeType" placeholder="Breakfast">
            <input type="text" class="inputBox" id="" name="originalCreator" placeholder="Your Name">
            <input type="text" class="inputBox" id="" name="dateAdded" placeholder="2023-04-28">
            <input type="text" class="inputBox" id="" name="yields" placeholder="Yields"><br>
            <textarea class="section" id="steps-title" name="steps" placeholder="Steps:" rows="15" cols="200"></textarea><br>
            <input id="submitButton" class="submitButton" type="submit">
        </form>
    </div>
    <?php
        }else{
            echo "<h1 style='text-align: center;'>Restricted Access - Please sign up or log in to an account.</h1>";
            echo "<div style='text-align: center;'><a href='login.php' style='text-decoration: none;'>Go to the login Page</a><div>";
        }
    ?>

    <!-- PHP CODE -->
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
             //Sets up the connection to MySql DB
                $connection = mySqli_connect("localhost", "root", "", "recipeapp");

            //Gets data from html form
                $title = $_POST["recipeTitle"];
                $desc = $_POST["desc"];
                $ingredients = $_POST["ingredients"];
                $prepTime = $_POST["prepTime"];
                $cookTime = $_POST["cookTime"];
                $recipeType = $_POST["recipeType"];
                $originalCreator = $_POST["originalCreator"];
                $dateAdded = $_POST["dateAdded"];
                $yields = $_POST["yields"];
                $steps = $_POST["steps"];

            //Testing
                //echo "$title";
                //echo "$desc";
                //echo "$ingredients";
                //echo "$prepTime";
                //echo "$cookTime";
                //echo "$recipeType";
                //echo "$originalCreator";
                //echo "$dateAdded";
                //echo "$yields";
                //echo "$steps";
            
            
            //Checks connection
                if ($connection->connect_error) {
                    die("Connection failed: "
                        . $connection->connect_error);
                }
            
            //Insert into DB
                $sql = "INSERT INTO `recipes`(`title`, `PrepTime`, `cookTime`, `recipeType`, `originalCreator`, `ingredientes`, `dateAdded`, `yield`) 
                VALUES ('$title','$prepTime','$cookTime','$recipeType','$originalCreator','$ingredients','$dateAdded','$yields')";

            //Checks to see if data was sent correctly
                if ($connection->query($sql) === TRUE) {
                    echo "<h1 class='recipeAdded-alert'>New Recipe has been added!</h1>";
                    echo "<div style='text-align: center;'><a href='discover.php' style='text-decoration: none;'>Go to the Discover Page</a><div>";
                } else {
                    echo "Error: " . $sql . "<br>" . $connection->error;
                }
        }

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