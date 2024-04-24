<?php

$level = $conn->query("SELECT * FROM users WHERE id =".$_SESSION['id'])->fetch_assoc()['level'];
$followedCourses = $conn->query("SELECT * FROM courses_subs WHERE user_id =".$_SESSION['id']);

?>