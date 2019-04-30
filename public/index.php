<?php
// Front controller

// for session
session_start();


// import dependencies
require_once "../config.php";

// connection
require_once "../mysqliConnect.php";

// routing to back controllers

// not connected (or invalide session)
if(!isset($_SESSION['myident'])||$_SESSION['myident']!=session_id()){

    // Public controller
    require_once "../controller/publicController.php";
}else{

    if($_SESSION['theperm']==0) {
        // Admin controller
        require_once "../controller/adminController.php";
    }else{
        // Redac controller
        require_once "../controller/redacController.php";
    }
}
