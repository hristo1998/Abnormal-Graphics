
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
<!--    <script src="http://code.jquery.com/jquery-1.12.0.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.js"></script>
    <script src="js/jquery-1.9.0.min.js"></script>
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
                <div class="profile-pic-edit-btn profile-edit-options">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
        </div>

        <div class="profile-info-col">

            <div class="profile-info-wrapper">
                <div class="profile-info-row profile-username" id="profile-info-username-field">
                    <?php
                    echo $_SESSION['username'];
                    ?>
                </div>
                <div class="profile-info-row">
                    <?php
                    echo $_SESSION['firstname']." ".$_SESSION['lastname'];
                    ?>
                </div>
                <div class="profile-info-row">
                    email:
                    <?php
                    echo $_SESSION['email'];
                    ?>
                </div>
                <div class="profile-info-row">
                    Birthdate:
                    <?php
                    echo $_SESSION['birthdate'];
                    ?>
                </div>
                <div class="profile-info-join-date">
                    Join date:
                    <?php
                    echo $_SESSION['joindate'];
                    ?>
                </div>
            </div>

            <div class="profile-black-btn" id="profile-info-edit-enable-btn">
                Options
            </div>

            <div class="profile-black-btn profile-edit-save-pic">
                Save picture
                <div class="profile-info-pic-err">No file validations</div>
            </div>

        </div>


        <div class="profile-edit-form-container profile-edit-options">

            <form action="php/profilePicChange.php" method="post" enctype="multipart/form-data" class="profile-edit-upload-form">

                <div class="black-separator"></div>

                <div class="profile-form-section">

                    <div class="profile-form-user-container">

                        <div class="profile-form-section-desc">
                            Change account username
                        </div>

                        <div class="profile-form-input-container">
                            <input type="text" name="username" class="profile-form-input" placeholder="Enter new username" id="profile-form-username-change-filed">
                            <div class="profile-input-err-msg"></div>
                        </div>

                        <div class="profile-form-section-note">
                            Note: your username should be unique and should consists of only letters and digits.
                        </div>

                    </div>

                    <div class="profile-form-controls-container">
                        <div class="profile-save-btn" id="profile-form-change-username">
                            Change
                        </div>
                    </div>

                </div>

                <div class="black-separator"></div>

                <div class="profile-form-section">

                    <div class="profile-form-user-container">

                        <div class="profile-form-section-desc">
                            Change account password
                        </div>

                        <div class="profile-form-input-container">
                            <input type="password" class="profile-form-input" placeholder="Enter your current password" id="profile-form-enter-password">
                            <div class="profile-input-err-msg"></div>
                        </div>
                        <div class="profile-form-input-container">
                            <input type="password" class="profile-form-input" placeholder="Enter new password" id="profile-form-enter-new-password">
                            <div class="profile-input-err-msg"></div>
                        </div>
                        <div class="profile-form-input-container">
                        <input type="password" class="profile-form-input" placeholder="Repeat new password" id="profile-form-repeat-new-password">
                            <div class="profile-input-err-msg"></div>
                        </div>

                        <div class="profile-form-section-note">
                            Note: your password should consists of only letters and digits.
                        </div>

                    </div>

                    <div class="profile-form-controls-container">
                        <div class="profile-save-btn" id="profile-form-change-password">
                            Change
                        </div>
                    </div>

                </div>

                <div class="black-separator"></div>

                <div class="profile-form-section">

                    <div class="profile-form-user-container">

                        <div class="profile-form-section-desc">
                            Change account email
                        </div>

                        <div class="profile-form-input-container">
                            <input type="email" name="email" class="profile-form-input" placeholder="Enter your current email">
                        </div>

                        <div class="profile-form-section-note">
                        </div>

                    </div>

                    <div class="profile-form-controls-container">
                        <div class="profile-save-btn" >
                            Change
                        </div>
                    </div>

                </div>

                <div class="black-separator"></div>

                <div class="profile-form-section">

                    <div class="profile-form-user-container">

                        <div class="profile-form-section-desc">
                            Change your name
                        </div>

                        <div class="profile-form-input-container">
                            <input type="text" name="name" class="profile-form-input" placeholder="Enter your name here">
                        </div>

                        <div class="profile-form-section-note">
                            Note: you name should consist of only letters and digits.
                        </div>

                    </div>

                    <div class="profile-form-controls-container">
                        <div class="profile-save-btn" >
                            Change
                        </div>
                    </div>

                </div>

                <div class="black-separator"></div>

                <div class="profile-form-section">

                    <div class="profile-form-user-container">

                        <div class="profile-form-section-desc">
                            Change your birthdate
                        </div>

                        <div class="profile-form-input-container">
                            <input type="text" name="name" class="profile-form-input" placeholder="Enter your name here">
                        </div>

                        <div class="profile-form-section-note">
                            Note: you name should consist of only letters and digits.
                        </div>

                    </div>

                    <div class="profile-form-controls-container">
                        <div class="profile-save-btn" >
                            Change
                        </div>
                    </div>

                </div>

                <div class="black-separator"></div>


                <input type="file" name="file" id="profile-form-upload-pic">
                <input type="submit" name="submit" id="profile-form-submit">

            </form>

            <div class="profile-stop-editing-btn profile-edit-options" id="profile-stop-editing">
                Close
            </div>

        </div>

    </div>

</section>


</body>
</html>