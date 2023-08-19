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
                //SIGN UP BOX
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        //Sets up the connection to MySql DB
                            $connection = mySqli_connect("localhost", "root", "", "recipeapp");
                            
                        //Gets data from html form
                            $username = $_POST["username"]; 
                            $password = $_POST["password"]; 
                            $email = $_POST["email"];

                        //Testing
                            echo "Username: $username";
                            echo "Password: $password";
                            echo "Email: $email";

                        //Checks connection
                            if ($connection->connect_error) {
                                die("Connection failed: "
                                    . $connection->connect_error);
                            }

                        //Send user input (html) data to MySQL DB
                            $findUsername = "SELECT * FROM users WHERE Username = '$username' ";   
                            $result = $connection->query($findUsername);

                            if($result->num_rows == 0){
                                $sql = "INSERT INTO `users`(`Username`, `Password`, `Email`) 
                                VALUES ('$username', '$password', '$email')";
                                if ($connection->query($sql) === TRUE) {
                                    echo "<h1 style='text-align:center;'>Your account was created successfully!</h1>";
                                    echo "<h2 style='text-align:center;'><a href='discover.php' style='text-align:center;'>Go to the Discover Page</a>";
                                }
                            }else{
                                echo "<h1 style='text-align:center;'>Invalid Username - Please try signing up again!</h1>";
                                echo "<h2 style='text-align:center;'><a href='login.php' style='text-align:center;'>Try signing up again. </a>";
                            }
                            

                        

                        //Checks to see if data was sent correctly
                        /*
                            if ($connection->query($sql) === TRUE) {
                                echo "<h1 style='text-align:center;'>Your account was created successfully!</h1>";
                                echo "<a href='discover.php' style='text-align:center;'>Go to the Discover Page</a>";
                                //NOTE: Add something here?
                            } else {
                                echo "Error: " . $sql . "<br>" . $connection->error;
                            }
                        */
                    }
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