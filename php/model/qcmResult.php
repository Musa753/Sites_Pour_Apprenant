<?php
    $qcm = simplexml_load_file("../../xml/$_GET[name].xml");
    $difficulty = $qcm->xpath('//difficulte')[0];

    $userLevel = $conn->query("SELECT * FROM users WHERE id='$_SESSION[id]'")->fetch_assoc()['level'];
    $questionNum = 0;
    $correct = 0;
    foreach ($qcm->xpath('//question') as $question) {
        if ($_GET["q$questionNum"] == $question->reponse) {
            //Bonne réponse
            $correct++;
        }
        else {
            //Mauvaise réponse
        }
        $questionNum++;
    } 
    $ratio = 100;///$questionNum*$correct;

    $files = scandir('../../Images/congrats');
    $nbGifs = -3;
    foreach($files as $file) {
        $nbGifs++;
    }
    $rand = rand(0,$nbGifs);
?>