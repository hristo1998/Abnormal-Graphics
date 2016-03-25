
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
<!--    <script src="http://code.jquery.com/jquery-1.12.0.js"></script>-->
   <script src="js/jquery-1.9.0.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="Pictures/transparent-logo.ico">

    <title>Abnormal Graphics</title>


</head>
<body>

<header class="non-select">

    <div id="video-bg" >
        <video controls loop muted autoplay poster="Pictures/tech-blocks.jpg" id="video">
            <source src="videos/tech-blocks.webm" type="video/webm">
            <source src="videos/tech-blocks.mp4" type="video/mp4">
            <source src="videos/tech-blocks.ogv" type="video/ogg">
        </video>
    </div>

    <nav>
        <div class="logo-link">
            <a href="index.php">
                <img src="Pictures/transparent-logo.png" alt="" />
            </a>
            <a href="index.php">
                <p>AbnormalGraphics</p>
            </a>
        </div>

       <div id="nav-menu">
           <div id="sign-in-button">
               Sign in
           </div>
           <div id="login-button">
               Log in
           </div>
       </div>

    </nav>

    <p id="main-header">Abnormal Graphics</p>


</header>


<section class="non-select">

    <div id="wrapper">

    </div>

</section>

<!--<footer class="non-select">-->
<!--    <div class="pull-left">-->
<!--        <a href="http://www.facebook.com/" target="_blank">-->
<!--            <img src="picture/transparent-facebook-logo.png" alt="Facebook"  height="30px" width="45px" />-->
<!--        </a>-->
<!--        <a href="https://plus.google.com/" target="_blank">-->
<!--            <img src="picture/transparent-google-logo.png" alt="Google+" height="28px" width="34.5px"/>-->
<!--        </a>-->
<!--        <a href="https://twitter.com/" target="_blank">-->
<!--            <img src="picture/transparent-twitter-logo.png" alt="Twitter" height="28px" width="34.5px"/>-->
<!--        </a>-->
<!--        <a href="https://www.youtube.com/" target="_blank">-->
<!--            <img src="picture/transparent-youtube-logo.png" alt="YouTube" height="30px" width="45px"/>-->
<!--        </a>-->
<!--    </div>-->
<!--    <div class="pull-right">-->
<!--        <p>-->
<!--            Copyright © 1998-2015 Abnormal Graphics Inc. <br />-->
<!--            All trademarks or registered trademarks are property of their respective owners.-->
<!--        </p>-->
<!--    </div>-->
<!--</footer>-->


<div id="darker-bg"> </div>

<form action="php/login.php" method="post" id="login-form">

    <div class="current-form form-links log-in-link non-select">Log In </div>
    <div class="not-current-form form-links sign-in-link non-select">Sign In </div>

    <div class="container">
        <div class="input">
            <input type="text" name="username" id="username" placeholder="Username">
        </div>
        <div class="input">
            <input type="password" name="password" id="password" placeholder="Password">
        </div>

        <input type="submit" value="Log In" class="submit" >
        <p class="form-comments" id="forgotten-password">Forgot password?</p>
    </div>
</form>

<form action="php/signIn.php" method="post" id="sign-in-form" enctype="multipart/form-data">

    <div class="not-current-form form-links log-in-link non-select">Log In</div>
    <div class="current-form form-links sign-in-link non-select">Sign In</div>

    <div class="container">
        <div class="input">
            <input type="text" name="username" class="username" placeholder="Username">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="password" name="password" class="password" placeholder="Password">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="password" name="repeat_password" class="repeat_password" placeholder="Repeat password">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="email" name="email" id="email" placeholder="e-mail">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="text" name="firstName" class="firstName" placeholder="First name">
            <div class="validation_check"></div>
        </div>
        <div class="input">
            <input type="text" name="lastName" class="lastName" placeholder="Last name">
            <div class="validation_check"></div>
        </div>

        <div class="form-select-container">
            <select class="selectForm" name="gender" id="gender">
                <option value="" selected>Gender</option>
                <option value="1" >Male</option>
                <option value="2" >Female</option>
                <option value="3" >Other</option>
            </select>
            <select class="selectForm" name="user-born_at_day" id="date_day">
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
            <select class="selectForm" name="user-born_at_month" id="date_month">
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
            <select class="selectForm" name="user-born_at_year" id="date_year">
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
        <input type="submit" value="Sign up" class="submit">

    </div>
</form>



</body>
</html>

