<?php session_start();

$pageSelected = 'profil';


if (isset($_POST["deconnexion"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Catégorie</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <script src="https://kit.fontawesome.com/5a25ce672a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="src/css/index.css">
	<script src="https://kit.fontawesome.com/68a550b660.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="favicon/gamepad.png" type="image/x-icon">
</head>
<body>
<header>
    <?php include("include/header.php") ?>
</header>
<main>
	<?php
if (!isset($_GET['id_topics'])) {
	echo 'Sujet non défini.';
}
else {
?>
	<table width="500" border="1"><tr>
	<td>
	Auteur
	</td>
	<td>
		Titre
	</td>
	<td>
	Messages
	</td></tr>
	<?php
	$bdd = mysqli_connect ('localhost', 'root', '');
	mysqli_select_db ($bdd, 'forum') ;
	$sql = 'SELECT * FROM catégorie WHERE id="'.$_GET['id_topics'].'" ORDER BY date_heure ASC';
	$req = mysqli_query($bdd, $sql) or die('Erreur SQL !<br />' . $sql . '<br />');

	while ($data = mysqli_fetch_array($req)) {
		sscanf($data['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
		echo '<tr>';
	echo '<td>';

	echo htmlentities(trim($data['auteur']));
	echo '<br />';
	echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;

	echo '</td><td>';

	echo nl2br(htmlentities(trim($data['message'])));
	echo '</td></tr>';
	}
	?>
	</table>
	<br /><br />

	<a href="./message.php?id_categorie=<?php echo $_GET['id_categorie']; ?>">Répondre</a>
	<?php
}
?>
</main>
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>
</html>