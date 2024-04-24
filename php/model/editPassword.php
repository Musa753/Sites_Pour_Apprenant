<?php 
    if(!empty($_POST['password'])&&!empty($_POST['newpassword'])&&!empty($_POST['newpassword2'])) {
        if(valideidentifiant($conn,$_SESSION['email'],$_POST['password'])) {
            if($_POST['newpassword'] === $_POST['newpassword2']) {                              
                $newpassword = $_POST['newpassword'];
                $oldpassword = $_SESSION['password'];                                       
                $sql = "UPDATE users SET password = '$newpassword' WHERE password='$oldpassword'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                    $_SESSION['password'] = $newpassword;
                }
                else {
                    die("Error: " . $sql . "<br>" . $conn->error);
                }
                header('Location: http:userMenu.php');
                $conn->close();
                exit();
            }
            else {
                $errorMessage = 'Les mots de passe ne correspondent pas';
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