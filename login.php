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
                echo "<h1><i class='bi bi-person-circle'></i></h1>";
                echo "<h1>Username: {$_SESSION['username']}</h1>";
                echo "<p><a href='logout.php' class='logout'>Logout</a><p>";
            }else{ //Outputs form if a user is not logged in
        ?>

        <!-- Login & Signup containers -->
            <div id="loginBox" class="loginBox"> <!-- LOGIN BOX -->
                <form class="loginForm" id="loginBox" method="POST" action="loginAction.php">
                    <h1 class="title">LOGIN</h1>
                    <input class="username" name="username" type="text" placeholder="Username..." required><br>
                    <input class="password" name="password" type="password" placeholder="Password..." required><br>
                    <input class="loginBtn" type="submit" name="loginBtn" value="Login">
                    <p class="qlink">Need an Account? <a href="#" class="qlinks" onclick="popup()"> Click here</a></p>
                    <p class="qlink">Forgot Password? <a href="#" class="qlinks" onclick="forgotpw()"">Click here</a></p>
                </form>
            </div>
            <div id="signupBox" class="signupBox"> <!-- SIGNUP BOX -->
                <form class="signupForm" id="signupBox" method="POST" action="signupAction.php">
                    <h1 class="title">SIGN UP</h1>
                    <input class="username" name="username" type="text" placeholder="Username..." required><br>
                    <input class="email" name="email" type="email" placeholder="Email..." required><br>
                    <input class="password" name="password" type="password" placeholder="Password..." required><br>
                    <input class="signupBtn" type="submit" value="Sign Up">
                    <p class="qlink">Have an account?<a href="#" onclick="popup()" class="qlinks"> Click here</a></p>
                </form>
            </div>
            <div class=""> <!-- Forgot Password Container -->
                <form class="">
                   
                </form>
            </div>

            <?php
                } //Doesnt display the form if the the user is logged in.
            ?>

            <script>               
                function popup(){
                    var signupBox = document.getElementById('signupBox');
                    var loginBox = document.getElementById('loginBox');
                    
                    if(signupBox.style.display == "none"){
                        console.log(signupBox);
                        signupBox.style.display = "inline";
                        console.log(loginBox);
                        loginBox.style.display = "none";
                    }else if(signupBox.style.display != "none"){
                        console.log(signupBox);
                        signupBox.style.display = "none";
                        console.log(loginBox);
                        loginBox.style.display = "inline";
                    }
                }
            </script>
            
        <!-- Footer -->
            <footer>
                <div class="links" id="links">
                    <p class="links"><font color="white">Follow us:</font></p>
                </div>
                <div class="links">
                    <a href="https://www.facebook.com/profile.php?id=100092618317604"><font color="white"><i class="bi bi-facebook"></i></font></a>
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