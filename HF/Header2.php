
<nav>
    <div class="logo">
        <img src="images/logo.png">
    </div>

    <ul>
          <li class="hideOnMobile"><a href="accueil.php">Accueil</a></li>
          <li class="hideOnMobile"><a href="Registration.php">Inscription</a></li>
          <li class="hideOnMobile"><a href="index.php">Bibliotheque</a></li>
          <li class="hideOnMobile"><a href="voirauteur.php">auteurs</a></li>
          <li class="hideOnMobile"><a href="#">Reglement</a></li>
          <li class="hideOnMobile"><a href="#contact">Contact</a></li>
          <li class="hideOnMobile"><a href="userLogin.php">Login</a></li>
          <div class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></div>
    
    
    <ul class="sidebar">
      <div onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></div>
      <li><a href="accueil.php">Accueil</a></li>
          <li><a href="Registration.php">Inscription</a></li>
          <div class="ligne"></div>
          <li><a href="index.php">Bibliotheque</a></li>
          <li><a href="#">Reglement</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="userLogin.php">Login</a></li>
    </ul>

  </ul>
  

    <div class="social_icon">
        <i class="fa-solid fa-magnifying-glass"></i>
        <i class="fa-solid fa-heart"></i>
    </div>

</nav>
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