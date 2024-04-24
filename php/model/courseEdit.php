<?php

    if($_GET['id'] == -1) {
        $pageTitle = 'Ajouter';
    }
    else {
        $pageTitle = 'Modifier';
    }

    $title = "";
    $description = "";
    $course = "";
    $difficulty = "";
    if(!empty($_POST['title'])&&!empty($_POST['text'])&&!empty($_POST['description'])&& $_POST['difficulty'] != "Difficulté") {
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
            if ($_FILES['thumbnail']['size'] <= 1000000) {
                $fileInfo = pathinfo($_FILES['thumbnail']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
                if (in_array($extension, $allowedExtensions)){
                    do {
                        $md5 = include('../model/randomString.php');
                    } while (file_exists($_SERVER['DOCUMENT_ROOT'].'/Images/thumbnails/'.$md5));
                        
                    $fullname = "Images/thumbnails/$md5.$extension";
                    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/'.$fullname);
                    $sql = "SELECT * FROM courses WHERE id='".$_GET['id']."'";
                    if($conn->query($sql)) {
                        $result = $conn->query($sql) ;
                    }
                    else {
                        die("error sql user not found") ;
                    }
                    if($_POST['difficulty'] == "Facile") {
                        $difficulty = "beginner";
                    }
                    else if ($_POST['difficulty'] == "Moyen") {
                        $difficulty = "confirmed";
                    }
                    else if($_POST['difficulty'] == "Difficile") {
                        $difficulty = "expert";
                    }
                    $chars = str_split($_POST['text']);
                    $validText = '';
                    foreach($chars as $char) {
                        if($char == '\'' || $char == '\\' || $char == '"') {
                            $validText .= '\\';
                            $validText .= $char;
                        }
                        else {
                            $validText .= $char;
                        }
                    }
                    echo $validText;
                    if($result->num_rows > 0) {
                        $sql = "UPDATE courses SET title = '".$_POST['title']."', description = '".$_POST['description']."', text = '".$validText."', thumbnail='".$fullname."',  difficulty = '".$difficulty."' WHERE id='".$_GET['id']."'";
                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        }
                        else {
                            die("Error: " . $sql . "<br>" . $conn->error);
                        }
                    }
                    else {
                        $sql = "INSERT INTO courses(title, description, text, author_id, difficulty, thumbnail)values('$_POST[title]', '$_POST[description]', '$validText', '$_SESSION[id]', '$difficulty', '$fullname')";
                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        }
                        else {
                            die("Error: " . $sql . "<br>" . $conn->error);
                        }
                    }
                    header('Location: http:../controller/courseManagement.php');
                    $conn->close();
                    exit();
                }
                else {
                    $errorMessage="Extension non valide";
                }
            }
            else {
                $errorMessage="Fichier trop volumineux !";
            }
        }
        else {
            $errorMessage="Erreur avec la miniature";
        }
    }
    else {
        $sql = "SELECT * FROM courses WHERE id='".$_GET['id']."'";
        if($conn->query($sql)) {
            $result = $conn->query($sql) ;
        }
        else {
            die("error sql user not found") ;
        }
        if($result->num_rows >0) {
            $row = $result->fetch_assoc(); 
            $title = $row['title'];
            $description = $row['description'];
            $course = $row['text'];
            $difficulty = $row['difficulty'];
        }
        $errorMessage="Remplissez tous les champs";
    }
?>