<script src="https://kit.fontawesome.com/68a550b660.js" crossorigin="anonymous"></script>
    
    <nav id="nav-index">
        <div id="top-title">
            <a href="index.php"><h3>Le Bon Game</h3></a><i class="fas fa-gamepad"></i>
        </div>
        <?php 
          if(!isset($_SESSION['login'])){
            ?>
            <div class="btn_center">
            <div class="btn"><a href="connexion.php">Se connecter</a></div>
            <div class="btn"><a href="inscription.php">S'inscrire</a></div>
            </div>
        <?php
          }
        ?>
<?php
if (isset($_SESSION['login'])) {
    ?>
    
    <div class="btn_center">
    <ul class="menu-nav">
    <?php if($pageSelected == 'profil'){?>
        <li class="btn"><a href="index.php">ACCUEIL</a></li>
    <?php } ?>
        <li class="btn"><a href="profil.php">PROFIL</a></li>
        <li class="btn"><a href="logout.php">DECONNEXION</a></li>
    </ul> 
    </div>
    <?php
}
?>
</nav>

