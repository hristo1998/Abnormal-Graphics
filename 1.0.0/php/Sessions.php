<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 7.4.2016 г.
 * Time: 15:30
 */


/*
 * Begins an empty session
 */

    function startEmptySession(){

//        session_start();
        $_SESSION['id'] = "";
        $_SESSION['logged_user'] = false;
        $_SESSION['username'] = "";
        $_SESSION['email'] = "";
        $_SESSION['firstname'] = "";
        $_SESSION['lastname'] = "";
        $_SESSION['gender'] = "";
        $_SESSION['birthdate'] = "";
        $_SESSION['joindate'] = "";
        $_SESSION['profilePicId'] = "";

    }

    function startSession($id ,$username , $email , $firstName , $lastName , $gender , $birthdate , $joindate , $profilePicId){

        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['logged_user'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $firstName;
        $_SESSION['lastname'] = $lastName;
        $_SESSION['gender'] = $gender;
        $_SESSION['birthdate'] = $birthdate;
        $_SESSION['joindate'] = $joindate;
        $_SESSION['profilePicId'] = $profilePicId;

    }

    function changeProfilePicInSession($profilePicId){
        $_SESSION['profilePicId'] = $profilePicId;
    }

    function changeProfileUsernameSession($username) {
        $_SESSION['username'] = $username;
    }

    function changeProfileEmailSession($email){
        $_SESSION['email'] = $email;
    }


