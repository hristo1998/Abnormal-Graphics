<?php
/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 24.4.2016 г.
 * Time: 16:18
 */


require_once('dbClass.php');
$search = $_POST['search'];


if(ctype_alnum($search)) {


    $query = "SELECT * FROM `users`";  // search fo users
    $result = $db->fetchArray($query);

    $numOfResults = 0;
    $resultUsers = "";

    foreach( $result as $user  ){

        if( strpos( $user['username'] , $search ) !== false ){
            $numOfResults++;
            $resultUsers = $resultUsers.$user['username'].":".$user['firstname']." ".$user['lastname'].":".$user['profilePicId']."|";
        }

        if($numOfResults == 4){
            break;
        }

    }

    $resultUsers = rtrim($resultUsers, "|");

    if($numOfResults == 0) {
        $resultUsers  = "noresults";
    }



//    $query = "SELECT * FROM `articles`";  // search fo articles
//    $result = $db->fetchArray($query);

//    $numOfResults = 0;
    $resultArticles = "noresults";
//
//    foreach( $result as $user  ){
//
//        if( strpos( $user['username'] , $search ) !== false ){
//            $numOfResults++;
//            $resultUsers = $resultUsers.."|";
//        }
//
//        if($numOfResults == 4){
//
//            break;
//        }
//         $resultUsers = rtrim($resultUsers, "|");
//    }

    echo $resultUsers."][".$resultArticles;

}