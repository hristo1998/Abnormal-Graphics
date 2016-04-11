<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 12.3.2016 г.
 * Time: 23:09
 */

  require_once('dbClass.php');
  require_once("Sessions.php");

  $user = $_POST;

  foreach($user as $key=>$val)
  {
    $user[$key] = trim($user[$key]);
    $user[$key] = stripslashes($user[$key]);
    $user[$key] = mysqli_real_escape_string($db->link, $user[$key]);
  }

  $query = "SELECT * FROM `users` WHERE `users`.`username` = '".$user['username']."'";
  $result = $db->fetchArray($query);


  if( count($result)>0){
      if( $result[0]['password'] == md5($user['password']) ){

        startSession($result[0]['username'] , $result[0]['email'] ,$result[0]['firstname'] , $result[0]['lastname'] , $result[0]['gender'] , $result[0]['birthdate'] , $result[0]['joindate'] , $result[0]['profilePicId'] );
        echo "success";
        exit;
      }
  }

    echo "error";