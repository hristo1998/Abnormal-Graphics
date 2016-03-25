<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 13.3.2016 г.
 * Time: 17:18
 */

    require_once('dbClass.php');

    $user = $_POST;
    $hasError = false;




    foreach($user as $k=>$v)
    {
        $user[$k] = trim($user[$k]);
        $user[$k] = mysqli_real_escape_string($db->link, $user[$k]);
    }

    if(strlen($user['username'])<5)
    {
        $hasError = true;
        echo "username";
    }

    $query = "SELECT * FROM `users` WHERE `users`.`username` = '".$user['username']."'";
    $result = $db->fetchArray($query);

    if(count($result) > 0)
    {
        $hasError = true;
        echo "taken";
    }


    if(strlen($user['password'])< 4)
    {
        $hasError = true;
        echo "short pass";
    }

    if($user['password'] != $user['repeat_password'])
    {
        $hasError = true;
        echo "rep pass";
    }

    if(!$hasError){

        $user['password'] = md5($user['password']);
        unset($user['repeat_password']);
        $day = $user['user-born_at_day'];
        unset($user['user-born_at_day']);
        $month = $user['user-born_at_month'];
        unset($user['user-born_at_month']);
        $year = $user['user-born_at_year'];
        unset($user['user-born_at_year']);
        $user['birthdate'] = $year.'-'.$month.'-'.$day;

        $id = $db->saveArray("users", $user);


//        $file = file_get_contents($_FILES['file']['tmp_name']);
//        $tar = getcwd()."/pictures/picture_".$id.".jpg";
//
//        file_put_contents( $tar , $file );


    }
    else{

    }


