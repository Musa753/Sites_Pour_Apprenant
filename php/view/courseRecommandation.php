<?php
	echo '<div class="courseRecommandation">';
	$userID=$_SESSION['id'];
	$level = $conn->query("SELECT * FROM users WHERE id ='$userID'")->fetch_assoc();
	$level = $level["level"];

    $result = $conn->query("SELECT * FROM courses WHERE difficulty ='$level'");
    $nb = 3;
    if ($result->num_rows > 0) {
    	if($result->num_rows >= 4) {
	    	$result = $conn->query("SELECT * FROM courses WHERE difficulty ='expert' ORDER BY RAND()");
	    }
	    else {
	    	$nb = $result->num_rows;
	    }
	    for ($i = 0; $i < $nb; $i++) {
	    	$row = $result->fetch_assoc();
	    		echo '
	    			<div class="course">
						<a href="course.php?id='.$row['id'].'">
							<img src="../../'.$row['thumbnail'].'" alt="miniature du cours" class="img"></img>
							<div class="courseRecoDescr">
								'. $row['title'].'
								<p class="courseText">'.$row['description'].'</p>
							</div>
						</a>
					</div>
	    		';
	    	}
    }
    else {
    	echo '<p>Aucun cours à vous recommander</p>';
    }
    echo '</div>';
?>