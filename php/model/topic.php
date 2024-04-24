<?php

    $topicName = $conn->query("SELECT * FROM topics WHERE id='$_GET[id]'")->fetch_assoc()['name'];
    $messages = $conn->query("SELECT * FROM messages WHERE topic_id='$_GET[id]'");

    if(isset($_SESSION['email'])&&isset($_POST['msg'])&& isset($_POST['submit']) && isset($_GET['id'])) {     
        $date1=date('Y-m-d');
        $message = $_POST['msg'];
        $author = $_SESSION['id'] ;
        $sql ="INSERT INTO messages(topic_id, message, date, author_id)values('$_GET[id]','$message','$date1','$author')";
        if ($conn->query($sql) === FALSE) {
            die("Error: " . $sql . "<br>" . $conn->error);
        }
    }
?>