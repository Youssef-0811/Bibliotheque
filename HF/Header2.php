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
 <!--search-->
  
        <form action="" method="GET">
        <div class="search">
  <div class="search-box">
    <div class="search-field">
      <input placeholder="Search..." class="input" type="text" name="search">
      <div class="search-box-icon">
        <button class="btn-icon-content" type="submit">
          <i class="search-icon">
            <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#fff"></path></svg>
          </i>
        </button>
      </div>
    </div>
  </div>
</div>
        </form>
  

  <script>
    function showSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }
    function hideSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }
    </script>
</nav>
