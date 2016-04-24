
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
    <script src="js/LogInSignIn.js"></script>
    <script src="js/searchField.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="Pictures/transparent-logo.ico">

    <title>Profile</title>



    <?php

        require_once('php/dbClass.php');

        $user = $_POST;

        $query = "SELECT * FROM `users` WHERE `users`.`username` = '".$user['username']."'";
        $result = $db->fetchArray($query);

        $username = $result[0]['username'];
        $name = $result[0]['firstname']." ".$result[0]['lastname'];
        $email = $result[0]['email'];
        $birthdate = $result[0]['birthdate'];
        $joindate = $result[0]['joindate'];
        $profilePicId = $result[0]['profilePicId'];







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

                <div class="profile-btn-icon">
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

                    <a class="info-links">
                        Contact us
                    </a>
                    <a class="info-links">
                        About us
                    </a>
                    <a class="info-links">
                        Terms and polices
                    </a>

                    <div class="separator"></div>

                    <div id="user-options">
                        <?php

                        if( $_SESSION['logged_user'] == true ) {
                            ?>
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

               <?php
                    if($_SESSION['logged_user'] ==false){
                        ?>
                        <div class="user-message log-in-msg">
                            <img src="Pictures/up-arrow-curr.png" alt="" class="curr-selected">
                            <span class="user-message-text">You better log in !!!</span>
                        </div>
                    <?php
                    }
               ?>

            </div>



            <div class="search-btn tool-btn">
                <i class="fa fa-search toolbox-icon"></i>
            </div>

            <div class="search-field-container">
                <input type="text" class="search-field" placeholder="Search AGraphics" id="nav-search-field">

                <div class="nav-search-results-container">
                    <div class="search-result-field-separator">
                        People
                    </div>
                    <div class="nav-search-results-user-profiles" id="nav-search-results-user-profiles">

                    </div>
                    <div class="search-result-field-separator">
                        Articles
                    </div>
                    <div class="nav-search-results-articles" id="nav-search-results-articles">

                    </div>
                </div>

                <form action="profile.php" id="nav-search-hidden-submit-form" method="post">
                    <input type="hidden" name="username" id="nav-hidden-search-field" value="">
                </form>

            </div>


        </div>

</header>

<section class="non-select profile">


    <div class="profile-wrapper">

        <div class="profile-pic-col">
            <div class="profile-profilePic-img">
                <img src="Pictures/ProfilePictures/<?php echo $profilePicId;?>" alt="">
                <div class="profile-pic-edit-btn profile-edit-options">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
        </div>

        <div class="profile-info-col">

            <div class="profile-info-wrapper">
                <div class="profile-info-row profile-username" id="profile-info-username-field">
                    <?php
                    echo $username;
                    ?>
                </div>
                <div class="profile-info-row" id="profile-info-name-field">
                    <?php
                    echo $name;
                    ?>
                </div>
                <div class="profile-info-row" id="profile-info-email-field">
                    email:
                    <?php
                    echo $email;
                    ?>
                </div>
                <div class="profile-info-row" id="profile-info-birthdate-field">
                    Birthdate:
                    <?php
                    echo $birthdate;
                    ?>
                </div>
                <div class="profile-info-join-date">
                    Join date:
                    <?php
                    echo $joindate;
                    ?>
                </div>
            </div>

           <?php
                if($_SESSION['logged_user'] == true && $username == $_SESSION['username']){
                    ?>
                    <div class="profile-black-btn" id="profile-info-edit-enable-btn">
                        Options
                    </div>
                    <?php
                }
           ?>

            <div class="profile-black-btn profile-edit-save-pic">
                Save picture
                <div class="profile-info-pic-err">No file validations</div>
            </div>

        </div>


       <?php
            if($_SESSION['logged_user'] == true && $username == $_SESSION['username']) {      // if there is logged user and he is looking at his profile edit options are available
                ?>
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
                                    <input type="email" name="email" class="profile-form-input" placeholder="Enter your current email" id="profile-form-email-change-filed">
                                    <div class="profile-input-err-msg"></div>
                                </div>

                                <div class="profile-form-section-note">
                                </div>

                            </div>

                            <div class="profile-form-controls-container">
                                <div class="profile-save-btn" id="profile-form-change-email">
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
                                    <input type="text" name="name" class="profile-form-input" placeholder="Enter your name here" id="profile-form-name-change-filed">
                                    <div class="profile-input-err-msg"></div>
                                </div>

                                <div class="profile-form-section-note">
                                    Note: you name should consist of only letters and digits , first name and last name.
                                </div>

                            </div>

                            <div class="profile-form-controls-container">
                                <div class="profile-save-btn" id="profile-form-change-name">
                                    Change
                                </div>
                            </div>

                        </div>

                        <div class="black-separator"></div>

                        <div class="profile-form-section">

                            <div class="profile-form-user-container">

                                <div class="profile-form-section-desc">
                                    Other info
                                </div>

                                <div class="profile-form-input-container">

                                    <div class="profile-form-select-container">
                                        <select class="profile-form-select" name="profile-form-gender" id="profile-form-gender">
                                            <option value="" selected>Gender</option>
                                            <option value="1" >Male</option>
                                            <option value="2" >Female</option>
                                            <option value="3" >Other</option>
                                        </select>
                                        <select class="profile-form-select" name="profile-form-birthday" id="profile-form-birthday">
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
                                        <select class="profile-form-select" name="profile-form-birthmonth" id="profile-form-birthmonth">
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
                                        <select class="profile-form-select" name="profile-form-birthyear" id="profile-form-birthyear">
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
                                    <div class="profile-input-err-msg-select profile-input-err-msg"></div>
                                </div>

                                <div class="profile-form-section-note">
                                    Note: empty fields won't be changed!
                                </div>
                            </div>

                            <div class="profile-form-controls-container">
                                <div class="profile-save-btn" id="profile-form-change-birthdate-gender">
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
                <?php
            }
       ?>

    </div>

</section>


<?php //if there is no logged person log in and sign in forms are available

    if($_SESSION['logged_user'] == false){

        ?>

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
                <div class="log-in-form-error"></div>
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
                        <option value="" class="profile-select-default">Month</option>
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


        <?php

    }

?>


</body>
</html>