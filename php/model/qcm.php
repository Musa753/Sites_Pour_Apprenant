<?php
    if(!$_SESSION['email']){
        echo("Veuillez vous connecter d'abord") ;
        header("Location: userConnection.php") ;
    }

    $valid = true;
    $questionNum = 0;
    $qcm = simplexml_load_file("../../xml/$_GET[name].xml");
    foreach ($qcm->xpath('//question') as $question) {
        $questionNum += 1;
    }
    
    $url = "qcmResult.php?name=$_GET[name]";
    for ($i = 0; $i < $questionNum; $i++) {     //Pour chaque question
        $checked = false;
        $propositionNum = 0;
        $question = $qcm->xpath('//question')[$i];
        foreach ($question->proposition as $proposition) {
            $propositionNum += 1;
        }
        for ($j = 1; $j < $propositionNum+1; $j++) {     //Pour chaque proposition de la question
            if(isset($_POST['q'.$i.'p'.$j])) {
                $checked = true;
                $url .= "&q$i=$j";
            }
        }
        if($checked == false) {
            $valid = false;
        }
    }
    if($valid == true) {   
        header("Location: http:$url");
    }
?>