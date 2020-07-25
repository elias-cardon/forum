<?php session_start();

$pageSelected = 'profil';
if (isset($_POST["deconnexion"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}

$bdd = new PDO('mysql:host=127.0.0.1;dbname=forum;charset=utf8', 'root', '');
if (isset($_GET['type']) and $_GET['type'] == 'membre') {
    if (isset($_GET['confirme']) and !empty($_GET['confirme'])) {
        $confirme = (int)$_GET['confirme'];
        $req = $bdd->prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
        $req->execute(array($confirme));
    }
    if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
        $supprime = (int)$_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $req->execute(array($supprime));
    }
} elseif (isset($_GET['type']) and $_GET['type'] == 'commentaire') {
    if (isset($_GET['approuve']) and !empty($_GET['approuve'])) {
        $approuve = (int)$_GET['approuve'];
        $req = $bdd->prepare('UPDATE commentaires SET approuve = 1 WHERE id = ?');
        $req->execute(array($approuve));
    }
    if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
        $supprime = (int)$_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
        $req->execute(array($supprime));
    }
}
$membres = $bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,5');
$commentaires = $bdd->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT 0,5');
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
        <?php while ($m = $membres->fetch()) { ?>
            <li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if ($m['confirme'] == 0) { ?> - <a
                        href="index.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a
                        href="index.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
        <?php } ?>
    </ul>
    <br/><br/>
    <ul>
        <?php while ($c = $commentaires->fetch()) { ?>
            <li><?= $c['id'] ?> : <?= $c['pseudo'] ?> : <?= $c['contenu'] ?><?php if ($c['approuve'] == 0) { ?> - <a
                        href="index.php?type=commentaire&approuve=<?= $c['id'] ?>">Approuver</a><?php } ?> - <a
                        href="index.php?type=commentaire&supprime=<?= $c['id'] ?>">Supprimer</a></li>
        <?php } ?>
    </ul>
</main>
<footer>
    <?php include("include/footer.php") ?>
</footer>
</body>
</html>