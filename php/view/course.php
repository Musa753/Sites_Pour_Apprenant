<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('css.php');?>
        <title> <?= $pageTitle ?> </title>
    </head>
    <body>
        <?php include('header.php');?>
        <?php 
            if($conn->query("SELECT * FROM courses WHERE id='$_GET[id]'")->num_rows > 0) {
                $course = $conn->query("SELECT * FROM courses WHERE id='$_GET[id]'")->fetch_assoc();
                echo '
                    <div style="width:800px;margin:20px auto;">
                        <h1 style="text-align:center;">'.$course['title'].'</h1>
                        <h3>Difficulte : '.$course['difficulty'].'</h3><br><br>
                        <p>'.$course['text'].'</p>
                    </div>
                ';
            }
            else {
                echo '<p style="text-align:center;margin-top:20px;margin-bottom:650px;">Cours inexistant</p>';
            }
        ?>
        <?php include('footer.php');?>
    </body>
</html>


