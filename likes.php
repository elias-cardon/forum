<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

if (isset($_GET['t'], $_GET['id']) and !empty($_GET['t']) and !empty($_GET['id'])); {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];
    $sessionid = 4;

    $requete = $bdd->prepare('SELECT id FROM messages WHERE id = ?');
    $requete->execute(array($getid));

    if ($requete->rowCount() == 1) {
        if ($gett == 1) {
            $ins = $bdd->prepare('INSERT INTO likes (id_messages, id_utilisateurs) VALUES (?, ?)');
            $ins->execute(array($getid, $sessionid));
        } elseif ($gett == 2) {
            $ins = $bdd->prepare('INSERT INTO dislikes (id_messages, id_utilisateurs) VALUES (?, ?)');
            $ins->execute(array($getid,$sessionid));
            header('location: http://localhost/forum/message.php?id_categories=' . $getid);
        } else {
            exit('Erreur <a href="http://localhost/forum/index.php');
        }
    }
}
