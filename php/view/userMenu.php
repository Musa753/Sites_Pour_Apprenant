<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include('css.php');?>
		<link rel="stylesheet" type="text/css" href="../../css/table.css">
		<link rel="stylesheet" type="text/css" href="../../css/userMenu.css">
		<title>Page personnelle</title>
	</head>
  	<body>
  		<?php 
	  		include('header.php');
	  		if(!isset($_SESSION['email'])) {
				echo '<p style="text-align:center;margin-top:20px;margin-bottom:700px;"><strong><a href="userConnection.php" style="color:var(--pink);">Connectez-vous </a></strong>pour accéder à votre page personnelle</p>';
	  		} 
	  		else {
				echo '<h1 style="text-align:center;margin-top:50px">Bienvenue ' . $_SESSION['firstname'] . ' ! Voici vos cours recommandés : </h1>';
				include("courseRecommandation.php");
				echo '<h3 style="text-align:center;margin-top:50px;">Votre niveau : '.$level.'</h3>';
                if ($followedCourses->num_rows > 0) {
                	echo '
					<table style = "margin: 70px auto 150px auto;">
						<tr>
							<th colspan="2"><h2>Mon tableau de bord</h2></th>
						</tr>
						<tr>
                    		<td style="width:90%;color:var(--light);"><strong>Cours</strong></td>
                    		<td style="width:10%;color:var(--light);text-align:center"><strong>Inscription</strong></td>
                    	</tr>

						';
                    while($row = $followedCourses->fetch_assoc()) {

						$row2 = $conn->query("SELECT * FROM courses WHERE id =".$row['course_id'])->fetch_assoc();
                    	echo '
                    		<tr>
                    			<td style="width:90%;"><a href="course.php?id='.$row2['id'].'">'.$row2['title'].'</a></td>
                    			<td style="width:10%;text-align:center">'.$row['date'].'</td>
                    		</tr>';
                    }
                    echo '</table>';
                }
                else {
                	echo '<p style="text-align:center;margin-bottom:300px;">Vous n\'êtes inscrit.e à aucun cours</p>';
                }
				echo '
				<div class="manageAccount">
					<h2>Gérer mon compte</h2>
		               <div class="manageAccountBox">
		                   <div class="ColLibelle">
		                       <div class="manageAccountText">
		                       		<a href="editMail.php">Modifier mail</a>
		                       		<br>
		                       		<a href="editPassword.php">Changer mot de passe</a>	
		                           	<br>';
		                           	if($_SESSION['theme'] == 'bright') {
		                           		echo '<a href="../model/switchTheme.php">Passer en theme sombre</a>';
		                           	}
		                           	else {
		                           		echo '<a href="../model/switchTheme.php">Passer en theme clair</a>';
		                           	}
		                           	echo '
		                       		<br>
		                           	<a href="../model/deleteAccount.php" style="color:#d11">Supprimer mon compte</a>
		                       </div>
		                       _
		                   </div>
		               </div>
		        </div>';

			}
			include('footer.php');
		?>
  	</body>
</html> 
