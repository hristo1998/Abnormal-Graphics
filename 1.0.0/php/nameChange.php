<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 14.4.2016 г.
 * Time: 15:37
 */
    session_start();
    require_once('dbClass.php');
    require_once('Sessions.php');


    $name = $_POST['name'];


    $name[0] = trim($name[0]);
    $name[0] = mysqli_real_escape_string($db->link, $name[0]);

    $name[1] = trim($name[1]);
    $name[1] = mysqli_real_escape_string($db->link, $name[1]);

    if( strlen($name[0]) < 5 || strlen($name[0]) > 21 ||  strlen($name[1]) < 5 || strlen($name[1]) > 21  )
    {
        echo "error";
    }
    else
    {
        $saveQuery['id'] = $_SESSION['id'];
        $saveQuery['firstname'] = $name[0];
        $saveQuery['lastname'] = $name[1];
        $db -> saveArray("users" , $saveQuery);
        changeProfileFirstNameSession($name[0]);
        changeProfileLastNameSession($name[1]);
        echo "success";
    }