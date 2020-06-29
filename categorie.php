<?php session_start();

<<<<<<< HEAD
$pageSelected = 'profil';


=======
>>>>>>> lea
if (isset($_POST["deconnexion"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>
<<<<<<< HEAD
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

	<a href="./insert_reponse.php?numero_du_sujet=<?php echo $_GET['id_sujet_a_lire']; ?>">Répondre</a>
	<?php
}
?>
</main>
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>
=======

<head>
    <title>SOLUCES GAMING</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <script src="https://kit.fontawesome.com/5a25ce672a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" href="src/css/index.css">
</head>

<body>
    <header>
        <?php include("include/header.php") ?>
    </header>
    <main>

        <?php

        $bdd = mysqli_connect("localhost", "root", "", "forum");
        $requete = 'SELECT categories.*, utilisateurs.*,topics.* 
                    FROM categories 
                    INNER JOIN utilisateurs ON categories.id_utilisateurs = utilisateurs.id
                    INNER JOIN topics';
        $query = mysqli_query($bdd, $requete);
        $datas = mysqli_fetch_all($query);
        var_dump($datas);

        ?>
        <div class="table-center">
            <table width="500" border="1">
                <tr>
                    <td>
                        Titre topics
                    </td>
                    <td>
                        Titre catégorie
                    </td>
                    <td>
                        Login
                    </td>
                    <td>
                        Date, heure de poste
                    </td>
                </tr>
                <?php


                foreach ($datas as $key => $data) {
                    echo '<tr>';
                    echo '<td>';
                    echo htmlentities(trim($datas[$key][9]));


                    echo '</td>';
                    echo '<td>';

                    // echo htmlentities(trim($datas[$key][2]));
                    echo '<a href="topics.php?id=', $datas[$key][4], '">', htmlentities(trim($datas[$key][3])), '</a>';
                    echo '</td>';
                    echo '<td>';
                    echo htmlentities(trim($datas[$key][6]));



                    echo '</td>';
                    echo '<td>';
                    echo htmlentities(trim($datas[$key][2]));

                    echo '</td>';
                    echo '</tr>';

                ?>
                <?php } ?>

            </table>
        </div>
        <?php
        mysqli_free_result($query);
        ?>
        </div>
    </main>
    <footer>
        <?php include("include/footer.php") ?>
    </footer>
</body>

>>>>>>> lea
</html>