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
        <h2>BIENVENUE SUR LE FORUM</h2>

        <br/><br/>

        <?php
        $bdd = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($bdd, 'forum');

        $sql = 'SELECT * FROM topics INNER JOIN utilisateurs ON topics.id_utilisateurs = utilisateurs.id ORDER BY date_heure DESC';

        $req = mysqli_query($bdd, $sql) or die('Erreur SQL !<br />' . $sql . '<br />');

        $nb_sujets = mysqli_num_rows($req);

        if ($nb_sujets == 0) {
            echo 'Aucun sujet';
        } else {
            ?>
            <table width="500" border="1">
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
                while ($data = mysqli_fetch_array($req)) {

                    sscanf($data['date_heure'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);

                    echo '<tr>';
                    echo '<td>';

                    echo htmlentities(trim($data['login']));
                    echo '</td><td>';

                    echo '<a href="categorie.php?id_topics=', htmlspecialchars($data['id']), '">', htmlentities(trim($data['titre'])), '</a>';

                    echo '</td><td>';
                    echo $jour, '-', $mois, '-', $annee, ' ', $heure, ':', $minute;
                }
                ?>
                </td></tr></table>
            <?php
        }
        mysqli_free_result($req);
        ?>
        
    </div>

    <?php

    if(isset($_SESSION['login'])){

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
            $insert = $bdd->prepare("INSERT INTO topics(id_utilisateurs, titre, date_heure)
                                    VALUES(:id_utilisateurs, :titre, CURTIME())");
            $insert->execute(array('id_utilisateurs' => (int)$user['id'], 
                                'titre' => $titre));

            header("location:index.php");

        }else echo "Veuillez saisir un titre.";
    }
    ?>
    <div class="center_form_topic">
<form id="form-add-topics" action="#" method="post">
<h4 class="title-form">AJOUTER UN TOPIC ICI !</h4>
<input type="text" name="titre" placeholder="Saisir un titre">
<input type="text" name="titre" placeholder="Message">
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