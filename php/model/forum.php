<?php
    if(isset($_SESSION['email']) && isset($_POST['title']) && isset($_POST['msg']) && isset($_POST['submit'])) {     
        $date1=date('Y-m-d');
        $title = $_POST['title'];
        $msg = $_POST['msg'];
        $author = $_SESSION['prenom'] ;

        $sql = "INSERT INTO topics(name, author_id, creation_date)values('$title','$_SESSION[id]','$date1')";
        if ($conn->query($sql) === FALSE) {
            die("Error: " . $sql . "<br>" . $conn->error);
        }

        $topicID = $conn->query("SELECT * FROM topics ORDER BY id DESC")->fetch_assoc();
        $topicID = $topicID['id'];

        $sql2 = "INSERT INTO messages(topic_id, message, date, author_id)values('$topicID','$msg','$date1','$_SESSION[id]')";
        if ($conn->query($sql2) === FALSE) {
            die("Error: " . $sql2 . "<br>" . $conn->error);
        }
        else {
            header("Location: http:../controller/topic.php?id=".$topicID);
        }
    }
    
    $allTopics = $conn->query("SELECT * FROM topics");
?>