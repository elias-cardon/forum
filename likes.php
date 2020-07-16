<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

if (isset($_GET['t'], $_GET['id']) and !empty($_GET['t']) and !empty($_GET['id'])); {
    $getid = (int) $_GET['id_categorie'];
    $gett = (int) $_GET['t'];
    $getIDMessage = $_GET['id_message'];
    $sessionid = 4;

    $requete = $bdd->prepare('SELECT id FROM messages WHERE id_categorie = ?');
    $requete->execute(array($getid));

    if ($requete->rowCount() > 0) {
        if ($gett == 1) {var_dump($gett);
            $ins = $bdd->prepare('INSERT INTO likes (id_messages, id_utilisateurs) VALUES (?, ?)');
            $ins->execute(array($getIDMessage, $sessionid));
            header('location: http://localhost/forum/message.php?id_categorie=' . $getid);
        } elseif ($gett == 2) {
            $ins = $bdd->prepare('INSERT INTO dislikes (id_messages, id_utilisateurs) VALUES (?, ?)');
            $ins->execute(array($getIDMessage,$sessionid));
            header('location: http://localhost/forum/message.php?id_categorie=' . $getid);
        } else {
            exit('Erreur <a href="http://localhost/forum/index.php');
        }
    }
}
