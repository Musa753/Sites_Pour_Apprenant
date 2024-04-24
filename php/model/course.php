<?php 

$pageTitle = $conn->query("SELECT * FROM courses WHERE id='$_GET[id]'")->fetch_assoc()['title'];

?>