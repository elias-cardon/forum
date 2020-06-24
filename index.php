<!-- Negotium est negotium -->
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

        <a href="topic.php">Insérer un sujet</a>

<br /><br />

<?php
$bdd = mysqli_connect('localhost', 'root', '');
mysqli_select_db($bdd, 'forum');

$sql = 'SELECT id, titre, date_heure FROM topics ORDER BY date_heure DESC';

$req = mysqli_query($bdd, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());

$nb_sujets = mysqli_num_rows ($req);

if ($nb_sujets == 0) {
    echo 'Aucun sujet';
}
else {
?>
<table width="500" border="1"><tr>
    <td>
    Auteur
    </td><td>
    Titre du sujet
    </td><td>
    Date dernière réponse
    </td></tr>
    <?php
    while ($data = mysql_fetch_array($req)) {

        sscanf($data['date_derniere_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);

        echo '<tr>';
    echo '<td>';

    echo htmlentities(trim($data['auteur']));
    echo '</td><td>';

    echo '<a href="./lire_sujet.php?id_sujet_a_lire=' , $data['id'] , '">' , htmlentities(trim($data['titre'])) , '</a>';

    echo '</td><td>';
echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;
    }
    ?>
    </td></tr></table>
    <?php
}
mysqli_free_result ($req);
?>
    </div>

</main>
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>

</html>