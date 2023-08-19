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
    <link rel="stylesheet" href="favorites.css">
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

    <?php
        //Restricts Access
            if(isset($_SESSION['username'])){ //User is logged in
                if(isset($_POST['removeRecipe'])){ //Button clicked
                    //Connection to DB
                        $connection = mySqli_connect("localhost", "root", "", "recipeapp");

                    //Get data
                        $title = $_POST["title"];
                        //$desc = $_POST["desc"];
                        //$ingredients = $_POST["ingredients"];
                        //$prepTime = $_POST["prepTime"];
                        //$cookTime = $_POST["cookTime"];
                        //$recipeType = $_POST["recipeType"];
                        //$originalCreator = $_POST["originalCreator"];
                        //$dateAdded = $_POST["dateAdded"];
                        //$yields = $_POST["yields"];
                        //$steps = $_POST["steps"];

                    //Checks connection
                        if ($connection->connect_error) {
                            die("Connection failed: "
                                . $connection->connect_error);
                        }
                    
                    //Remove from DB
                        $sql = "DELETE FROM `favorites` WHERE title = '$title'";

                    //Checks to see if data was sent correctly
                        if ($connection->query($sql) === TRUE) {
                            echo "<h1 class='recipeAdded-alert' style='text-align: center;'>Recipe has been removed!</h1>";
                            echo "<div style='text-align: center;'><a href='discover.php' style='text-decoration: none;'>Go to the Discover Page</a><div>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $connection->error;
                        }
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