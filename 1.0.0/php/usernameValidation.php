<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 15.3.2016 г.
 * Time: 21:55
 */


    require_once('dbClass.php');

    $username = $_POST['username'];

    if(!ctype_alnum($username))
    {
        echo "invalid-input";

    }
    else if(strlen($username)<5)
    {
        echo "too-short";
    }
    else if(strlen($username)>21)
    {
        echo "too-long";
    }
    else if(!preg_match('/[a-zA-Z]/' , $username ) )
    {
        echo "no-letters";

    }
    else {

//        session_start();
//
//        if( isset($_SESSION['logged_user'])) {
//
//            if($username == $_SESSION['username']) {
//                echo "thatsyou";
//            }
//        }
//        else
        {
            $query = "SELECT * FROM `users` WHERE `users`.`username` = '".$username."'";
            $result = $db->fetchArray($query);

            if(count($result) > 0)
            {
                echo "taken";
            }
            else
            {
                echo "Ok!";
            }
        }
    }


