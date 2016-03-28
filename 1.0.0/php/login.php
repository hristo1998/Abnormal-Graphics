<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 12.3.2016 г.
 * Time: 23:09
 */

  require_once('dbClass.php');

  $user = $_POST;

  foreach($user as $key=>$val)
  {
    $user[$key] = trim($user[$key]);
    $user[$key] = mysqli_real_escape_string($db->link, $user[$key]);
  }

  $query = "SELECT * FROM `users` WHERE `users`.`username` = '".$user['username']."'";
  $result = $db->fetchArray($query);


  if( count($result)>0){
      if( $result[0]['password'] == md5($user['password']) ){
        $_SESSION['logged_user'] = true;
        $_SESSION['username'] = $user['username'];
        echo "success";
      } else {
        echo "error";
      }
  }