<?php

$myCourses = $conn->query("SELECT * FROM courses WHERE author_id = ".$_SESSION["id"]);

?>