<?php session_start();

$pageSelected = 'profil';
if (isset($_POST["deconnexion"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}

$bdd = new PDO('mysql:host=127.0.0.1;dbname=forum', 'root','');

$membres = $bdd->query('SELECT * FROM membres');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administrateur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
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
    <ul>
        <?php while($m = $membres->fetch()) { ?>
        <li><?= $m['id'] ?> : <?= $m['login'] ?></li>
    <?php } ?>
    </ul>
</main>
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>
</html>