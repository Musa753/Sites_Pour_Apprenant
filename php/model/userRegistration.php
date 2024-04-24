<?php
    if(!empty($_POST)) {
        // Les identifiants sont transmis ?
        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['lastname']) && !empty($_POST['firstname'])) { 
            if(!testmail($conn,$_POST['email']) && testformatmail($_POST['email'])) {
                if($_POST['password'] !== $_POST['password1']) {
                    $errorMessage = 'Les mots de passe ne correspondent pas';
                }
                else { 
                    //insertion dans la base de données 
                    $sql ="INSERT INTO users(lastname, firstname , email, password, admin, level)values('$_POST[lastname]','$_POST[firstname]','$_POST[email]','$_POST[password]', 0, 'beginner')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    }
                    else {
                        die("Error: " . $sql . "<br>" . $conn->error);
                    }
                    // On redirige vers le fichier  
                    header('Location: http:../view/registrationSuccess.php');
                    $conn->close();
                    exit();
                }
            }
            else { 
                if(testmail($conn,$_POST['email'])) {    
                    $errorMessage="cet adresse-mail existe déjà, veuillez vous connecter";
                }
                else if(!testformatmail($_POST['email'])) {
                    $errorMessage="votre adresse-mail est invalide";
                }
            }
        }
        else {     
            $erorMessage="Remplissez tous les champs";  
        }
    }
    else {
        $errorMessage="";
    }
?>