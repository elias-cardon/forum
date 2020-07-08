<?php session_start();
$pageSelected = 'index';
if (isset($_POST["deconnexion"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Le Bon Game</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <script src="https://kit.fontawesome.com/5a25ce672a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="shortcut icon" href="favicon/gamepad.png" type="image/x-icon">
    
</head>

<body>
<header>
    <?php include("include/header.php") ?>
</header>
<main>
<div class="bg-image"></div>
    <div id="banner">
        <div class="deco_title">
            <h2>BIENVENUE SUR LE FORUM</h2>
        </div>

        <br/><br/>

        <?php
        $bdd = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($bdd, 'forum');
        $sql = "SELECT t.*, u.* FROM topics as t, utilisateurs as u WHERE t.id_utilisateurs = u.id  ORDER BY t.date_heure DESC";

        $req = mysqli_query($bdd, $sql) or die('Erreur SQL !<br />' . $sql . '<br />');

        $nb_sujets = mysqli_num_rows($req);

        if ($nb_sujets == 0) {
            echo 'Aucun sujet';
        } else {
            ?>
            <div class="table-center">
            <table width="500" border="1">
                <h3>Topics</h3>
                <tr>
                    <th>
                        Auteur
                    </th>
                    <th>
                        Titre du sujet
                    
                    </th>
                    <th>
                        Date de création
                    </th>
                </tr>
                <?php
                $datas  = mysqli_fetch_all($req);
                foreach ($datas as $key => $data) {

                      //connexion à la bdd pdo
                    try {
                        $bdd = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    }

                    $visibilite = $bdd->query("SELECT visibilite FROM topics JOIN utilisateurs ON topics.id_utilisateurs = utilisateurs.id WHERE visibilite = 1");
                    $result = $visibilite->fetch(PDO::FETCH_ASSOC);
                            foreach ($datas as $key => $data) {
                                    sscanf($data[2], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
                                

                                echo '<tr>';
                                echo '<td>';

                                echo htmlentities(trim($data[3]));
                                echo '</td><td>';

                                echo '<a href="categorie.php?id_topics=', htmlspecialchars($data[0]), '">', htmlentities(trim($data[1])), '</a>';

                                echo '</td><td>';
                                echo $jour, '-', $mois, '-', $annee, ' ', $heure, ':', $minute;
                            }
                        
                    
                }
                ?>
                </td></tr></table></div>
            <?php
        }
        mysqli_free_result($req);
        ?>
        
    </div>

    <?php

    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
    if(isset($_POST['submit'])){

        //SECURE TITRE
        $titre = htmlspecialchars($_POST['titre']);

        if(!empty($titre)){

            //connexion à la bdd
            try {
                $bdd = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
            }catch(PDOException $e){
                echo 'Erreur : ' . $e->getMessage();
            }
            $prepare = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ? ORDER BY ID DESC');
            $prepare->execute([$_SESSION['login']]);
            $user = $prepare->fetch(PDO::FETCH_ASSOC);
            //inserer dans bdd  
            $insert = $bdd->prepare("INSERT INTO topics(id_utilisateurs, titre, date_heure, login,visibilite)
                                    VALUES(:id_utilisateurs, :titre, CURTIME(), :login, :visibilite)");
            $insert->execute(array('id_utilisateurs' => (int)$user['id'], 
                                'titre' => $titre,
                                'login' => $_SESSION['login'],
                                'visibilite' => $_POST['visibilite']));

            header("location:index.php");

        }else echo "Veuillez saisir un titre.";
    }
    ?>
    <div class="center_form_topic">
<form id="form-add-topics" action="#" method="post">
<h4 class="title-form">AJOUTER UN TOPIC ICI !</h4>
<input type="text" name="titre" placeholder="Saisir un titre">
<div class="row">
<label for="1">Privée:</label>
<input type="radio" name="visibilite" value="1">
<label for="0">Public:</label>
<input type="radio" name="visibilite" value="0">
</div>
<input class="button" type="submit" name="submit" value="POSTER">
</form>
</div>
   <?php } ?>


</main>
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>

</html>