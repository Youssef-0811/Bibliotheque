<div class="contenair">
  <h4>Bibliotheque.web</h4>
  <div class="posi">
    <nav>
      <ul class="items">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="index.php">Bibliotheque</a></li>
        <li><a href="#">Reglement</a></li>
        <li><a href="#contact">Contact</a></li>
        <?php
        session_start(); // Start session to check user login status
        if (isset($_SESSION['user_id'])) {
          // User is logged in
          echo '<li><a href="../Login/User/logout.php">Disconnect</a></li>';
        } else {
          // User is not logged in
          echo '<li><a href="Registration.php">Inscription</a></li>';
          echo '<li><a href="../Login/User/userLogin.php">Login</a></li>';
        }
        ?>
      </ul>
    </nav>
  </div>
</div>