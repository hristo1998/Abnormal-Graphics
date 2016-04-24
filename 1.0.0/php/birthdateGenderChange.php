<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 16.4.2016 г.
 * Time: 1:16
 */

    require_once('dbClass.php');
    require_once('Sessions.php');
    session_start();

    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $birthmonth = $_POST['birthmonth'];
    $birthyear = $_POST['birthyear'];

    $birthdate = $_SESSION['birthdate'];


    if($gender < 1 || $gender >3)
    {
        echo "sexerror ".$gender;
//        exit;
    }

    if($birthday <1 || $birthday>31)
    {
        echo "dayerror ".$birthday;
//        exit;
    }

    if($birthmonth<1 || $birthmonth>12)
    {
        echo "montherror ".$birthmonth;
//        exit;
    }

    if($birthyear<1900 || $birthyear>date("Y"))
    {
        echo "yearerror ".$birthyear;
//        exit;
    }

    $genderChangeFlag = 0;

    if($gender != "")
    {
        $saveQuery['id'] = $_SESSION['id'];
        $saveQuery['gender'] = $gender;
        $db->saveArray("users", $saveQuery);
        changeProfileGenderSession($gender);

        if( $_SESSION['profilePicId'] =="default-male-profile-pic.jpg" && $gender==2)
        {
            $saveQuery['id'] = $_SESSION['id'];
            $saveQuery['profilePicId'] = "default-female-profile-pic.jpg";
            $db->saveArray("users", $saveQuery);
            changeProfilePicSession("default-female-profile-pic.jpg");
            $genderChangeFlag = 1;
        }

        if($_SESSION['profilePicId'] =="default-female-profile-pic.jpg" && $gender==1 || $gender==3)
        {
            $saveQuery['id'] = $_SESSION['id'];
            $saveQuery['profilePicId'] = "default-male-profile-pic.jpg";
            $db->saveArray("users", $saveQuery);
            changeProfilePicSession("default-male-profile-pic.jpg");
            $genderChangeFlag = 1;
        }
    }

    $changeFlag = 0;

    if($birthday != "")
    {
        $dates = explode("-",$birthdate);
        $dates[2] = $birthday;
        $birthdate = $dates[0].'-'.$dates[1].'-'.$dates[2] ;
        $changeFlag = 1;
    }

    if($birthmonth != "")
    {
        $dates = explode("-",$birthdate);
        $dates[1] = $birthmonth;
        $birthdate = $dates[0].'-'.$dates[1].'-'.$dates[2] ;
        $changeFlag = 1;
    }

    if($birthyear != "")
    {
        $dates = explode("-",$birthdate);
        $dates[0] = $birthyear;
        $birthdate = $dates[0].'-'.$dates[1].'-'.$dates[2] ;
        $changeFlag = 1;
    }

    if($changeFlag == 1)
    {
        $saveQuery['id'] = $_SESSION['id'];
        $saveQuery['birthdate'] = $birthdate;
        $db->saveArray("users", $saveQuery);
        changeProfileBirthDateSessoin($birthdate);
    }

    echo $changeFlag.':'.$birthdate.':'.$genderChangeFlag.':'.$_SESSION['profilePicId'];