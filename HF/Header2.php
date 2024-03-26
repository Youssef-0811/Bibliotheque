<nav>
  <div class="logo">
    <img src="images/logo.png">
  </div>

  <ul>
    <li class="hideOnMobile"><a href="accueil.php">Accueil</a></li>
    <li class="hideOnMobile"><a href="index.php">Bibliotheque</a></li>
    <li class="hideOnMobile"><a href="voirauteur.php">Auteurs</a></li>
    <li class="hideOnMobile"><a href="#">Reglement</a></li>
    <li class="hideOnMobile"><a href="#contact">Contact</a></li>
    <?php
    session_start(); // Start session to check user login status
    if (isset($_SESSION['user_id'])) {
      // User is logged in
      echo '<li class="hideOnMobile"><a href="../Login/User/logout.php">Disconnect</a></li>';
    } else {
      // User is not logged in
      echo '<li class="hideOnMobile"><a href="Registration.php">Inscription</a></li>';
      echo '<li class="hideOnMobile"><a href="../Login/User/userLogin.php">Login</a></li>';
    }
    ?>
    <div class="menu-button" onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
          <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
        </svg></a></div>
    <ul class="sidebar">
      <div onclick="hideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
            <path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
          </svg></a></div>
      <li><a href="accueil.php">Accueil</a></li>
      <li><a href="index.php">Bibliotheque</a></li>
      <li><a href="#">Reglement</a></li>
      <li><a href="#contact">Contact</a></li>
      <?php
      if (isset($_SESSION['user_id'])) {
        // User is logged in
        echo '<li><a href="../Login\User\logout.php">Disconnect</a></li>';
      } else {
        // User is not logged in
        echo '<li><a href="Registration.php">Inscription</a></li>';
        echo '<li><a href="../Login/User/userLogin.php">Login</a></li>';
      }
      ?>
    </ul>
  </ul>
  <div class="social_icon">
    <i class="fa-solid fa-magnifying-glass"></i>
    <i class="fa-solid fa-heart"></i>
  </div>
</nav>