<?php
    if(isset($_SESSION['theme']) && $_SESSION['theme'] == "bright") {
        echo '<link rel="stylesheet" type="text/css" href="../../css/bright.css">';
    }
    /*
    echo '<pre>';
    print_r($_COOKIE);
    print_r($_SESSION);
    echo '</pre>';
    */
?> 

<div class="mainheader">
    <a href="../../../../../../../index.php" style="color : var(--text);">Conscientia</a>
</div>
<div class="subheader" id="headerStay">
    <a href="../../../../../../../php/controller/courseList.php" class="headerElement">Les cours</a>
    <a href="../../../../../../../php/controller/qcmList.php" class="headerElement">Les QCM</a>
    <a href="../../../../../../../php/view/videos.php" class="headerElement">Les vidéos</a>
    <a href="../../../../../../../php/controller/forum.php" class="headerElement">Le forum</a>
    <div class="right_subheader">
        <?php 
            if(isset($_SESSION['email'])) {
                echo '<a href="../../../../../../../php/controller/userMenu.php" class="headerElement">Ma page</a>';
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']==='true') {
                    echo '<a href="../../../../../../../php/controller/adminMenu.php" class="headerElement">Ma page admin</a>';
                }
                echo '<a href="../../../../../../../php/controller/logout.php" class="headerElement">Déconnexion</a>';
            }
            else {
                echo '<a href="../../../../../../../php/controller/userConnection.php" class="headerElement">Se Connecter</a>';
                echo '<a href="../../../../../../../php/controller/userRegistration.php" class="headerElement">S\'inscrire</a>';
            }
        ?>
    </div>
</div>