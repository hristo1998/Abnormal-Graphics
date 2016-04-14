<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 13.4.2016 г.
 * Time: 23:52
 */

    session_start();
    require_once('dbClass.php');
    require_once('Sessions.php');

    $email = $_POST['email'];

    $email = trim($email);
    $email = mysqli_real_escape_string($db->link, $email);

        // add email validation :D

    if( $email == $_SESSION['email'])
    {
        echo "sameEmail";
    }
    else
    {
        $saveQuery['id'] = $_SESSION['id'];
        $saveQuery['email'] = $email;

        $db -> saveArray("users" , $saveQuery) ;

        changeProfileEmailSession($email);

    }


