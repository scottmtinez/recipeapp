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
    <link rel="stylesheet" href="discover.css">
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


    <h2 id="discover-title" style='text-decoration: underline;'>Discover</h2>

    <div id="discover-search">
        <form>
            <input type="text" placeholder="Filter" id="filter-search" />
        </form>
    </div>

    <!-- BODY THAT PRINTS OUT THE USERS TABLE -->
    <!-- PHP CODE -->
    <?php
        //Displays users MySQL Table
            $connection = mySqli_connect("localhost", "root", "", "recipeapp");
            $sql = "SELECT * FROM recipes";
            $result = $connection->query($sql);

            if($result->num_rows > 0 ){
                while($row = $result->fetch_assoc()){
                    $title = $row['title'];
                    
                    echo 
                    "
                        <div class='recipe-container'>
                            <div class='picture-holder'></div>

                            <div class='recipe-info' id='holder'>
                                <h1 class='rec-title' id='$title'>".$row["title"]."</h1>
                                <p class='prepTime'>Prep Time: ".$row["PrepTime"]."</p>
                                <p class='cookTime'>Cook Time: ".$row["cookTime"]."</p>
                                <p class='recipeType'>Recipe Type: ".$row["recipeType"]."</p>
                                <p class='originalCreator'>Creator: ".$row["originalCreator"]."</p>
                                <p class='yield'>Yield's: ".$row["yield"]."</p>
                                <p class='dateAdded'>Date Posted: ".$row["dateAdded"]."</p>
                                <!-- <p class='dateAdded'>Ingredientes: ".$row["ingredientes"]."</p> --> 
                                <form method='POST' action='recipeAddedToFavorites.php'>
                                    <input type='hidden' name='title' value='".$row["title"]."'>
                                    <input type='hidden' name='prepTime' value='".$row["PrepTime"]."'>
                                    <input type='hidden' name='cookTime' value='".$row["cookTime"]."'>
                                    <input type='hidden' name='recipeType' value='".$row["recipeType"]."'>
                                    <input type='hidden' name='originalCreator' value='".$row["originalCreator"]."'>
                                    <input type='hidden' name='yield' value='".$row["yield"]."'>
                                    <input type='hidden' name='dateAdded' value='".$row["dateAdded"]."'>
                                    <input type='hidden' name='ingredientes' value='".$row["ingredientes"]."'>
                                    <input class='addToFav' type='submit' value='Add to Favorites'>
                                </form>
                                <form method='POST' action='displayRecipes.php'>
                                    <input type='hidden' name='title' value='".$row["title"]."'>
                                    <input type='hidden' name='prepTime' value='".$row["PrepTime"]."'>
                                    <input type='hidden' name='cookTime' value='".$row["cookTime"]."'>
                                    <input type='hidden' name='recipeType' value='".$row["recipeType"]."'>
                                    <input type='hidden' name='originalCreator' value='".$row["originalCreator"]."'>
                                    <input type='hidden' name='yield' value='".$row["yield"]."'>
                                    <input type='hidden' name='dateAdded' value='".$row["dateAdded"]."'>
                                    <input type='hidden' name='ingredientes' value='".$row["ingredientes"]."'>
                                    <input class='addToFavorites' type='submit' value='View Recipe'>
                                </form>
                            </div>
                        </div>
                    ";
                }
            }else{
                echo "<h1 style='text-align: center;'>Users DB is empty. </h1>";
            }
    ?>
    <script src="jquery.js"></script>
    <script>

        
           
        var data = {};
        data = document.getElementById("filter-search").value;

        (function() {

            var $recipes = $('.recipe-container');
            var $search = $('#filter-search');
            var $searchBar = $('#submit');
            document.addEventListener('e', filter);
            console.log($searchBar);
            var cache = [];
            $search.load(filter);

            $recipes.each(function() {
                cache.push({
                element: this,
                text: this.children[1].children[0].textContent.toLowerCase()
                });
                //console.log(this.children[1].children[0].textContent);
                

            });
            console.log(cache);
            function filter() {
                var query = this.value.trim().toLowerCase();
                //console.log(this.value);
                cache.forEach(function(recipe) {
                    var index = 0;

                    if (query) {
                        index = recipe.text.indexOf(query);
                    }
                    
                    recipe.element.style.display = index === -1 ? 'none' : ''; // Show / hide element
                });
            }
            if ('oninput' in $search[0]) { // Trigger event
                $search.on('input', filter);
            } else {
                //$search.on('keyup', filter);
                $search.on('load', filter);
                $searchBar.on('submit', filter);
            }

        }());
    </script>

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