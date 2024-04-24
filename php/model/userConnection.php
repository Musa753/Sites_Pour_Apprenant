<?php
    // Les identifiants sont transmis ?
    if(!empty($_POST['email'])&&!empty($_POST['password'])) {
        if(testmailadmin($conn, $_POST['email'])) { 
            //on test si le mots de passe et le login coorrespondent   
            if(!valideidentifiantadmin($conn ,$_POST['email'], $_POST['password'])) {     
                $errorMessage = "vos identifiants sont invalides";
            }
            else { 
                $email=$_POST['email'];
                $password=$_POST['password'];
                $sqladmin = "SELECT * FROM users WHERE email='$email' and password='$password' and admin=1";
                if($conn->query($sqladmin)) {
                    $adminResult = $conn->query($sqladmin) ;
                }
                else {
                    die("error sql user not found") ;
                }
                if($adminResult->num_rows >0) {
                    while($row = $adminResult->fetch_assoc()) {
                        $_SESSION['id'] = $row["id"] ;
                        $_SESSION['email'] = $row["email"] ;
                        $_SESSION['password'] = $row["password"] ;
                        $_SESSION['firstname'] = $row["firstname"];
                        $_SESSION['isAdmin'] = 'true';
                        $_SESSION['stayConnected'] = 'false';
                        $_SESSION['theme'] = 'dark';
                        header("Location: http:adminMenu.php") ;
                    }
                }
            }
            if(isset($_POST['stayConnected'])) {
                $_SESSION['stayConnected'] = 'true';
                setcookie('email', $_SESSION['email'], time() + 365*24*3600, '/');
                setcookie('firstname', $_SESSION['firstname'], time() + 365*24*3600, '/');
                setcookie('isAdmin', 'true', time() + 365*24*3600, '/');
                setcookie('id', $_SESSION['id'], time() + 365*24*3600, '/');
                setcookie('stayConnected', $_SESSION['stayConnected'], time() + 365*24*3600, '/');
                setcookie('theme', $_SESSION['theme'], time() + 365*24*3600, '/');
            }
        }
        else if(testmail($conn , $_POST['email'])) {
            if(!valideidentifiant($conn ,$_POST['email'], $_POST['password'])) {
                $errorMessage = "vos identifiants sont invalides";
            }
            else {
                $email=$_POST['email'];
                $password=$_POST['password'];
                $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
                if($conn->query($sql)) {
                    $result = $conn->query($sql) ;
                }
                else {
                    die("error sql user not found") ;
                }
                if($result->num_rows >0) {
                        while($row = $result->fetch_assoc()) {
                        $errorMessage="Bienvenue sur notre site";
                        $_SESSION['id'] = $row["id"] ;
                        $_SESSION['email'] = $row["email"];
                        $_SESSION['password'] = $row["password"] ;
                        $_SESSION['firstname'] = $row["firstname"];
                        $_SESSION['isAdmin'] = 'false';
                        $_SESSION['stayConnected'] = 'false';
                        $_SESSION['theme'] = 'dark';
                        header("Location: http:userMenu.php");
                    }
                }
            }
            if(isset($_POST['stayConnected'])) {
                $_SESSION['stayConnected'] = 'true';
                setcookie('email', $_SESSION['email'], time() + 365*24*3600, '/');
                setcookie('firstname', $_SESSION['firstname'], time() + 365*24*3600, '/');
                setcookie('isAdmin', 'false', time() + 365*24*3600, '/');
                setcookie('id', $_SESSION['id'], time() + 365*24*3600, '/');
                setcookie('stayConnected', $_SESSION['stayConnected'], time() + 365*24*3600, '/');
                setcookie('theme', $_SESSION['theme'], time() + 365*24*3600, '/');
            }
        }
        else {
            $errorMessage="adresse invalide";
        }
    }
    else {
        $errorMessage="Remplissez tous les champs";
    }
?>