<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 8.4.2016 г.
 * Time: 22:56
 */


    require_once('Sessions.php');
    session_start();
    startEmptySession();
    header("Location: ../index.php");