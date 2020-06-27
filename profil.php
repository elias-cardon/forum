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
    <meta charset="utf-8">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="src/css/index.css">
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
        echo "<div class='center_pProfil'> <p>Bienvenue " . $_SESSION['login'] . " ! <br/><br/>

					<a href='changement_mdp.php'>Changer de mot de passe</a><br/>

					<a href='changement_login.php'>Changer de login</a><br/>

					<a href='logout.php'>Se déconnecter</a></p></div>";
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