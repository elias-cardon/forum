<?php session_start();

if (isset($_POST["deconnexion"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Réservation-Salles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <script src="https://kit.fontawesome.com/5a25ce672a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/index.css">
</head>

<body>
<header>
    <?php include("include/header.php") ?>
</header>
<main>
    <div id="banner">
        <h2>BIENVENUE</h2>

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
                        Date dernière réponse
                    </th>
                </tr>
                <?php
                while ($data = mysqli_fetch_array($req)) {

                    sscanf($data['date_heure'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);

                    echo '<tr>';
                    echo '<td>';

                    echo htmlentities(trim($data['login']));
                    echo '</td><td>';

                    echo '<a href="#', $data['id'], '">', htmlentities(trim($data['titre'])), '</a>';

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
    <form id="form-add-topics" action="#" method="post">

<label for="titre">Titre:</label><br />
<input type="text" name="titre">

<input type="submit" name="submit" value="Réserver">
</form>
</main>
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>

</html>