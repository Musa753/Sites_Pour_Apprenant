<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" type="text/css" href="../../css/courseEdit.css">
        <title><? if($_GET['file'] == '-1') { echo 'Ajouter';}else{echo 'Modifier';}?> un QCM</title>
    </head>
    <body>
        <?php include('header.php');?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?file=".$_GET['file']); ?>" method="post" enctype="multipart/form-data">
            <?php 
                if($_GET['file'] == '-1') {
                    echo '<h1>Ajouter un QCM</h1>';
                }
                else {
                    echo '<h1>Modification du QCM</h1>';
                }
                echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
            ?>
            <input type="text" placeholder="titre" name="title" value="<?php echo $title ?>" required>
            <textarea style="width:100%;color:var(--light)" rows="2" name="instructions" placeholder="Instructions"><?php echo $instructions ?></textarea>
            <select name="difficulty">
                <option>Difficulté</option>
                <option<?php if($difficulty=="beginner") {echo ' selected';} ?>>Facile</option>
                <option<?php if($difficulty=="confirmed") {echo ' selected';} ?>>Moyen</option>
                <option<?php if($difficulty=="expert") {echo ' selected';} ?>>Difficile</option>
            </select>
            <!--questions-->
            <input type="submit" id='submit' value='Valider'>
        </form>
        <?php include('footer.php');?>
    </body>
</html>


