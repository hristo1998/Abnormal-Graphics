<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 13.4.2016 г.
 * Time: 22:58
 */

    session_start();
    require_once('dbClass.php');

    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];

    $password = trim($password);
    $password = mysqli_real_escape_string($db->link, $password);

    $newPassword = trim($newPassword);
    $newPassword = mysqli_real_escape_string($db->link, $newPassword);


    $query = "SELECT * FROM `users` WHERE `users`.`username` = '".$_SESSION['username']."'";
    $result = $db->fetchArray($query);


    if( md5($password) == $result[0]['password'] ){

        if( $password == $newPassword) {

            echo "samePass";

        }
        else
        {
            $savePass['id'] = $_SESSION['id'];
            $savePass['password'] = md5($newPassword);

            $db -> saveArray("users" , $savePass);
            echo "success";
        }

    }
    else {

        echo "wrongPass";

    }