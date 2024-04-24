<?php
    //test si le login n'existe pas deja dans la base de donnée 
    function testmail($conn,$email) {   
        $sql="SELECT lastname FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        return $result->num_rows > 0;
    }

    function testmailadmin($conn, $email) {
        $sql="SELECT lastname FROM users WHERE email='$email' and admin=1";
        $result = $conn->query($sql) ;
        return $result->num_rows > 0 ;
    }
    //ces deux fonctions parcours la base de donnée et verifie que le couple login et mot de passe correspondent
    function valideidentifiantadmin($conn,$email,$password) {
        $sql="SELECT lastname FROM users WHERE email='$email' AND password='$password' and admin=1";
        $result = $conn->query($sql);
        return $result->num_rows > 0;
    }
    function valideidentifiant($conn,$email,$password) {
        $sql="SELECT lastname FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);
        return $result->num_rows > 0;
    }
    //test le format du login
    function testformatmail($email) { 
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    //teste le format de du mots de passe 
    function testpasswordformate($password) { 
        return preg_match('@[A-Z]@', $password) && preg_match('@[a-z]@', $password) && preg_match('@[0-9]@', $password) && preg_match('@[^\w]@', $password);
    }

    function getUsername($conn, $userID) {
        return $conn->query("SELECT * FROM users WHERE id = '$userID'")->fetch_assoc()["firstname"];
    }

    function isAdmin($conn, $userID) {
        return $conn->query("SELECT * FROM users WHERE id = '$userID'")->fetch_assoc()["admin"];
    }
