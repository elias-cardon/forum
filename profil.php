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
    <meta charset="utf-8">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/profil.css">
    <script src="https://kit.fontawesome.com/5a25ce672a.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- Header -->
<header id="header">
    <?php include("include/header.php") ?>
</header>
<!-- Main -->
<main id="milieu">
    <?php
    if ($_SESSION['login']) {
        echo "<p>Bienvenue " . $_SESSION['login'] . " ! <br/><br/>

					<a href='changement_mdp.php'>Changer de mot de passe</a><br/>

					<a href='changement_login.php'>Changer de login</a><br/>

					<a href='logout.php'>Se déconnecter</a></p>";
    } else {
        header("Location:connexion.php");
    }
    ?>
</main>
<!-- Footer -->
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>
</html>