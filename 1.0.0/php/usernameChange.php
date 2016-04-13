<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 13.4.2016 г.
 * Time: 0:33
 */
    session_start();
    require_once('dbClass.php');
    require_once('Sessions.php');

    $username = $_POST['username'];
    $error = false;

    $username = trim($username);
    $username = stripslashes($username);
    $username = mysqli_real_escape_string($db->link, $username);

    if(!ctype_alnum($username))
    {
        $error = true;

    }
    else if(strlen($username)<5)
    {
        $error = true;
    }
    else if(strlen($username)>21)
    {
        $error = true;
    }
    else if(!preg_match('/[a-zA-Z]/' , $username ) )
    {
        $error = true;
    }



    $query = "SELECT * FROM `users` WHERE `users`.`username` = '".$username."'";
    $result = $db->fetchArray($query);

    if( count($result) > 0 ) {

        $error = true;

    }


    if( $error == false ) {

        $saveUsername['id'] = $_SESSION['id'];
        $saveUsername['username'] = $username;

        $db -> saveArray("users" , $saveUsername);

        changeProfileUsernameSession($username);

        echo "success";

    }

    else {
        echo "error";

    }