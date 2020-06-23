<!-- [ russian roulette is not the same without a gun ] -->
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
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
<header>
    <?php include("include/header.php") ?>
</header>
<main>
    <div id="banner">
        <h2>BIENVENUE</h2>

        <h4> Trouvez la salle idéal pour vos évènements !</h4>


        <form method="post" action="">
            <input class="recherche" type="search" name="search" placeholder="Nom de l'évènement mariage, anniversaire">
            <input class="recherche" type="search" name="search" placeholder="Où Paris, Marseille">
            <i class="fas fa-search"></i>
        </form>
    </div>

</main>
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>

</html>