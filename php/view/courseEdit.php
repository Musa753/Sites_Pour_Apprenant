<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <link rel="stylesheet" type="text/css" href="../../css/courseEdit.css">
        <title> <?= $pageTitle ?> un cours</title>
    </head>
    <body>
        <?php include('header.php');?>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']."?id=".$_GET['id']); ?>" method="post" enctype="multipart/form-data">
            <?php 
                if($_GET['id'] == -1) {
                    echo '<h1>Ajouter un cours</h1>';
                }
                else {
                    echo '<h1>Modification du cours</h1>';
                }
                echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
            ?>
            <input type="text" placeholder="titre" name="title" value="<?php echo $title ?>" required>
            <textarea style="width:100%;color:var(--light)" rows="2" name="description" placeholder="Description"><?php echo $description ?></textarea>
            <textarea style="width:100%;color:var(--light)" rows="24" name="text" placeholder="Cours"><?php echo $course ?></textarea>
            <select name="difficulty">
                <option>Difficulté</option>
                <option<?php if($difficulty=="beginner") {echo ' selected';} ?>>Facile</option>
                <option<?php if($difficulty=="confirmed") {echo ' selected';} ?>>Moyen</option>
                <option<?php if($difficulty=="expert") {echo ' selected';} ?>>Difficile</option>
            </select>
            <label class="label">
                <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept=".jpg, .jpeg, .png"/>
                <span>Miniature <span style="color:var(--text2)"><small>(format 16/9 recommandé, taille min. 229px*129px)</small></span></span>
            </label>
            <input type="submit" id='submit' value='Valider'>
        </form>
        <?php include('footer.php');?>
    </body>
</html>


