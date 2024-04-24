<?php    
    include ($_SERVER['DOCUMENT_ROOT'].'/php/model/cookies.php');

    if(isset($_COOKIE['email'])) {
        setcookie('email', $_SESSION['email'], time() - 3600, '/');
    }
    if(isset($_COOKIE['firstname'])) {
        setcookie('firstname', $_SESSION['firstname'], time() - 3600, '/');
    }
    if(isset($_COOKIE['isAdmin'])) {
        setcookie('isAdmin', $_SESSION['isAdmin'], time() - 3600, '/');
    }
    if(isset($_COOKIE['id'])) {
        setcookie('id', $_SESSION['id'], time() - 3600, '/');
    }
    if(isset($_COOKIE['stayConnected'])) {
        setcookie('stayConnected', $_SESSION['stayConnected'], time() - 3600, '/');
    }
    if(isset($_COOKIE['theme'])) {
        setcookie('theme', $_SESSION['theme'], time() - 3600, '/');
    }


    if(isset($_SESSION['email'])) {
        unset($_SESSION['email']); 
    }
    if(isset($_SESSION['firstname'])) {
        unset($_SESSION['firstname']); 
    }
    if(isset($_SESSION['isAdmin'])) {
        unset($_SESSION['isAdmin']); 
    }
    if(isset($_SESSION['id'])) {
        unset($_SESSION['id']); 
    }
    if(isset($_SESSION['stayConnected'])) {
        unset($_SESSION['stayConnected']); 
    }
    if(isset($_SESSION['password'])) {
        unset($_SESSION['password']); 
    }
    if(isset($_SESSION['theme'])) {
        unset($_SESSION['theme']); 
    }
    header("Location: ../../index.php");
?>
