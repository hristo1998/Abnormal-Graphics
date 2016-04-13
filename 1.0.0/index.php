
<!--Created by Zerzolar-->

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <meta name="viewport" content="width=device-width">

    <link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">  <!-- Font Awesome -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.js"></script>
<!--    <script src="js/jquery-1.9.0.min.js"></script>-->
    <script src="js/main.js"></script>
    <script src="js/LogInSignIn.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="Pictures/transparent-logo.ico">

    <title>Abnormal Graphics</title>

    <?php

        session_start();


        require_once("php/Sessions.php");

        if( !isset($_SESSION['logged_user'])) {

            startEmptySession();

        }



    ?>

</head>
<body>

<header class="non-select" >


    <div class="wrapper">

        <a href="index.php" class="logo-link">
            <img src="Pictures/transparent-logo-2.png" alt="" />
        </a>


        <nav>
            <div class="nav-btn">
                News
            </div>
            <div class="nav-btn">
                Reviews
            </div>
            <div class="nav-btn">
                Hardware
            </div>
        </nav>

        <div class="toolbox">

            <div class="profile-btn tool-btn">

                <?php
                if( $_SESSION['logged_user']  == true ){

                    ?>
                        <img src="Pictures/ProfilePictures/<?php echo $_SESSION['profilePicId'];?>" alt="" class="profile-pic-menu">
                    <?php

                }
                else
                {
                    ?>
                        <i class="fa fa-chevron-down toolbox-icon"></i>
                    <?php
                }
                ?>


            </div>

            <div id="profile-dropdown">

                <img src="Pictures/up-arrow-curr.png" alt="" class="curr-selected">

                <a href="" class="info-links">
                    Contact us
                </a>
                <a href="" class="info-links">
                    About us
                </a>
                <a href="" class="info-links">
                    Terms and polices
                </a>

                <div class="separator"></div>

                <div id="user-options">
                    <?php

                    if( $_SESSION['logged_user'] == true ) {
                        ?>
                            <a href="profile.php" id="profile-button" class="info-links">
                                Profile
                            </a>
                            <a href="php/logout.php" id="logout-button" class="info-links">
                                Logout
                            </a>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div id="sign-in-button" class="info-links">
                                Sign in
                            </div>
                            <div id="login-button" class="info-links">
                                Log in
                            </div>
                        <?php
                    }

                    ?>

                </div>

            </div>

            <div class="user-message">
                <img src="Pictures/up-arrow-curr.png" alt="" class="curr-selected">
                <span class="user-message-text"></span>
            </div>

            <div class="search-btn tool-btn">
                <i class="fa fa-search toolbox-icon"></i>
            </div>



    </div>

</header>


<section class="non-select">


        <?php
            print_r($_SESSION);
        ?>


</section>


<div id="darker-bg"> </div>

<form method="post" id="login-form" class="sign-in-login-form">

    <div class="current-form form-links log-in-link non-select">Log In </div>
    <div class="not-current-form form-links sign-in-link non-select">Sign In </div>

    <div class="container">
        <div class="input">
            <input type="text" name="username" id="login_username" placeholder="Username" class="sign-in-login-input">
        </div>
        <div class="input">
            <input type="password" name="password" id="login_password" placeholder="Password" class="sign-in-login-input">
        </div>

        <input type="submit" value="Log In" id="submit-log-in" class="submit sign-in-login-input">
        <p class="form-comments" id="forgotten-password">Forgot password?</p>
        <div class="sign-in-form-error"></div>
    </div>
</form>

<form  id="sign-in-form" class="sign-in-login-form">

    <div class="not-current-form form-links log-in-link non-select">Log In</div>
    <div class="current-form form-links sign-in-link non-select">Sign In</div>

    <div class="container">
        <div class="input">
            <input type="text" name="username" id="sign-in-username" placeholder="Username" class="sign-in-login-input">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="password" name="password" id="sign-in-password" placeholder="Password" class="sign-in-login-input">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="password" name="repeat_password" id="repeat_password" placeholder="Repeat password" class="sign-in-login-input">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="email" name="email" id="email" placeholder="e-mail" class="sign-in-login-input">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="text" name="firstName" id="firstName" placeholder="First name" class="sign-in-login-input">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="text" name="lastName" id="lastName" placeholder="Last name" class="sign-in-login-input">
            <div class="validation_check"></div>
        </div>

        <div class="form-select-container">
            <select class="selectForm" name="gender" id="gender">
                <option value="" selected>Gender</option>
                <option value="1" >Male</option>
                <option value="2" >Female</option>
                <option value="3" >Other</option>
            </select>
            <select class="selectForm" name="user_born_at_day" id="date_day">
                <option value="">Day</option>
                <?php
                for( $i=1; $i<=31 ; $i++ )
                {
                    ?>
                    <option value="<?php echo"$i" ?>"><?php echo"$i" ?></option>
                    <?php
                }
                ?>
            </select>
            <select class="selectForm" name="user_born_at_month" id="date_month">
                <option value="">Month</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select class="selectForm" name="user_born_at_year" id="date_year">
                <option value="">Year</option>
                   <?php
                    for( $i=date("Y"); $i>=1916 ; $i-- )
                    {
                        ?>
                            <option value="<?php echo"$i" ?>"><?php echo"$i" ?></option>
                       <?php
                    }
                 ?>
            </select>
        </div>

<!--        <div class="input">-->
<!--            <input type="file" name="file">-->
<!--        </div>-->

        <span class="form-comments"> By clicking up "Sign up" you agree to our <span class="terms-and-policies-link">Terms and Policies</span> </span>
        <input type="submit" value="Sign up" id="submit-sign-in" class="submit sign-in-login-input"">
        <div class="sign-in-form-error"></div>

    </div>
</form>



</body>
</html>

