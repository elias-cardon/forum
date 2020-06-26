<nav id="nav-index">
        <div id="top-logo">
          <img class="logo"
        <div id="top-title">
            <a href="index.php"><h3>SOLUCES GAMING</h3>
        </div>
        <?php 
          if(!isset($_SESSION['login'])){
            ?>
            <div class="btn_center">
            <button class="bttn-unite bttn-md bttn-primary"><a href="connexion.php">Se connecter</button></a>
            <button class="bttn-unite bttn-md bttn-primary"><a href="inscription.php">S'inscrire</a></div>
            </div>
        <?php
          }
        ?>
<?php
if (isset($_SESSION['login'])) {
    ?>
    
    <div class="btn_center">
    <ul class="menu-nav">
        <li class="btn"><a href="reservation-form.php">RESERVATION</a></li>
        <li class="btn"><a href="planning.php">PLANNING</a></li>
        <li class="btn"><a href="profil.php">PROFIL</a></li>
        <li class="btn"><a href="logout.php">DECONNEXION</a></li>
    </ul> 
    </div>
    <?php
}
?>
</nav>