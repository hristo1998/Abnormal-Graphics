
<!-- Created by Zerzolar -->

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
    <script src="http://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.js"></script>
<!--    <script src="js/jquery-1.9.0.min.js"></script>-->
    <script src="js/main.js"></script>
    <script src="js/profile.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="Pictures/transparent-logo.ico">

    <title>Profile</title>



    <?php

        session_start();

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

                <img src="Pictures/ProfilePictures/<?php echo $_SESSION['profilePicId'];?>" alt="" class="profile-pic-menu">

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

                <a href="php/logout.php" id="logout-button" class="info-links">
                    Logout
                </a>

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


<section class="non-select profile">

    <div class="profile-wrapper">

        <div class="profile-pic-col">
            <div class="profile-profilePic-img">
                <img src="Pictures/ProfilePictures/<?php echo $_SESSION['profilePicId'];?>" alt="">
                <div class="profile-pic-edit-btn profile-edit-btn profile-edit-options">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
        </div>

        <div class="profile-info-col">

            <div class="profile-username profile-info-row">
                <div class="profile-username-text profile-info-text">
                    <?php
                        echo $_SESSION['username'];
                    ?>
                </div>
            </div>
            <div class="profile-info-name profile-info-row">
                <?php
                    echo $_SESSION['firstname']." ".$_SESSION['lastname'];
                ?>
            </div>
            <div class="profile-info-email profile-info-row">
                <?php
                    echo $_SESSION['email'];
                ?>
            </div>
            <div class="profile-info-birthdate profile-info-row ">
                Birthdate:
                <?php
                    echo $_SESSION['birthdate'];
                ?>
            </div>
            <div class="profile-info-small-text">
                Member since:
                <?php
                    echo $_SESSION['joindate'];
                ?>
            </div>

<!--            <div class="profile-edit-btn profile-edit-info-btn profile-edit-options">-->
<!--                <i class="fa fa-pencil"></i>-->
<!--            </div>-->

            <div class="profile-info-col-edit-btn-enable" id="profile-enable-editing-btn">
                Edit
            </div>

            <form action="#" method="post" enctype="multipart/form-data" class="profile-edit-upload-form">
                <input type="file" name="file" id="profile-form-upload-pic">
                <input type="text" name="username" id="profile-background-uploader-username">
                <input type="text" name="name" id="profile-background-uploader-name">
                <input type="email" name="email" id="profile-background-uploader-email">
                <input type="text" name="birthdate" id="profile-background-uploader-birthdate">
                <input type="submit" name="submit" class="profile-form-upload-pic-btn">
            </form>

            <div class="profile-info-small-text profile-save-editing-btn profile-edit-options" id="profile-save-editing">
                Save
            </div>

            <div class="profile-info-small-text profile-stop-editing-btn profile-edit-options" id="profile-stop-editing">
                Close
            </div>
        </div>
    </div>

</section>


</body>
</html>