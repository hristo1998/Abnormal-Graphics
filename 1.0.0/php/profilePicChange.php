<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 12.4.2016 г.
 * Time: 22:27
 */

        require_once('dbClass.php');
        require_once('Sessions.php');
        session_start();

        $file = file_get_contents($_FILES['file']['tmp_name']);

        // insert file validation


        $tar = chop(getcwd(), "/php");
        $tar = $tar."/Pictures/ProfilePictures/user_profile_pic_".$_SESSION['id'].".jpg";
        file_put_contents( $tar , $file );

        $query['id'] = $_SESSION['id'];
        $query['profilePicId'] = "user_profile_pic_".$_SESSION['id'].".jpg";

        $db->saveArray('users' , $query) ;

        changeProfilePicInSession("user_profile_pic_".$_SESSION['id'].".jpg");

        header("Location: ../profile.php");
