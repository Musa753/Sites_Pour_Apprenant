<?php
    if(!empty($_POST['email'])&&!empty($_POST['email2'])&&!empty($_POST['password'])) {
        if(valideidentifiant($conn,$_SESSION['email'],$_POST['password'])) {
            if($_POST['email'] === $_POST['email2']) {
                if(testformatmail($_POST['email'])) {
                    $newmail = $_POST['email'];
                    $oldmail = $_SESSION['email'];
                    $sql = "UPDATE users SET email = '$newmail' WHERE email='$oldmail'";
                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                        $_SESSION['email'] = $newmail;
                        if($_SESSION['stayConnected']==='true') {
                            setcookie('email', $newmail, time() + 365*24*3600);
                        }
                    }
                    else {
                        die("Error: " . $sql . "<br>" . $conn->error);
                    }
                    header('Location: http:userMenu.php');
                    $conn->close();
                    exit();
                }
                else {
                    $errorMessage = 'Format d\'e-mail invalide';
                }
            }
            else {
                $errorMessage = 'Les adresses e-mail ne correspondent pas';
            }
        }
        else {
            $errorMessage = 'Mot de passe invalide';
        }
    }
    else {
        $errorMessage="Remplissez tous les champs";
    }

?>