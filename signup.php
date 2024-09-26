<!doctype html>
<html lang="fr">
<?php include 'includes/head.php' ?>
<body>
<form class="container" method="post">
    <br><br>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pseudonyme</label>
        <input type="text" class="form-control" name="pseudo">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom</label>
        <input type="text" class="form-control" name="lastname">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
</form>
</body>
</html>