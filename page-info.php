<?php
include('DataBase.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitLiv'])) {


  $id_livre = mysqli_real_escape_string($conn, $_POST['id-livre']);


  $sql = "SELECT * FROM livres WHERE Numero = $id_livre ";

  $result = mysqli_query($conn, $sql);

  $ligne = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="header-footer2.css">
  <title>Document</title>
</head>
<header>
  <?php
  include('HF/header2.php');

  ?>
</header>

<body>

  <style>
    body {
      font-family: Noto Sans, sans-serif;
    }

    .main {
      margin: 0 80px;
    }

    .card {
      position: relative;
      margin-top: 10rem;
    }

    .card img {
      border-radius: 10px;
      width: 450px;
      height: 600px;
      fill: #333;
      transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 0 15px rgb(76, 44, 0);
    }





    .emprunt {
      right: 5rem;
      position: absolute;
      top: 10rem;
      float: left;
      width: 50%;

    }

    .emprunt h1 {
      font-size: 70px;

    }

    .emprunt #submit {
      margin-top: 1rem;
      width: 20rem;
      align-items: center;
      appearance: none;
      background-color: rgb(76, 44, 0);
      border-radius: 35px;
      border-width: 0;
      box-shadow: rgba(45, 35, 66, 0.2) 0 2px 4px, rgba(45, 35, 66, 0.15) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
      box-sizing: border-box;
      color: white;
      cursor: pointer;
      display: inline-flex;
      font-family: "JetBrains Mono", monospace;
      height: 48px;
      justify-content: center;
      line-height: 1;
      list-style: none;
      overflow: hidden;
      padding-left: 10px;
      padding-right: 10px;
      position: relative;
      text-align: left;
      text-decoration: none;
      transition: box-shadow .15s, transform .15s;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      white-space: nowrap;
      will-change: box-shadow, transform;
      font-size: 15px;
    }

    .emprunt #submit:focus {
      box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    .emprunt #submit:hover {
      box-shadow: rgba(45, 35, 66, 0.3) 0 4px 8px, rgba(45, 35, 66, 0.2) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
      transform: translateY(-2px);
    }

    .emprunt #submit:active {
      box-shadow: #D6D6E7 0 3px 7px inset;
      transform: translateY(2px);
    }


    #Etat,
    #DateR {
      font-size: 35px;
      margin-top: 3rem;
    }

    .emprunt .details {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
      border-radius: 10px;
    }

    .details .cont {
      margin-left: 30px;
      height: 12rem;
    }

    .details .cont .roz {
      display: grid;
      grid-template-columns: 1fr 1fr;
      margin-top: 2rem;
      align-items: center;
      grid-template-columns: 10rem max-content;
    }

    .cont h2 {
      padding-top: 0.5rem;
    }
  </style>


  <div class="main">
    <?php if ($result && mysqli_num_rows($result) > 0) { ?>

      <div class="card">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['Image']); ?>">

      </div>



      <div class="emprunt">
        <h1><?php echo $ligne['Titre']; ?></h1><br>

        <p id="Etat">Etat:Disponible</p>

        <form action="Empr.php" method="post">
          <div id="DateR">
            <label id="dateR" for="start">Saisir Date De retour:</label>
            <input type="date" id="start" name="trip-start" value="2023-07-22" min="2023-01-01" max="2023-12-31" /><br>
          </div>
          <input type="hidden" name="titredelivre" value="<?php echo $ligne['Titre']; ?>">
          <input type="hidden" name="numerodelivre" value="<?php echo $ligne['Numero']; ?>">

          <input class="button" id="submit" type="submit" value="Emprunter" name="submit">

        </form>

        <div class="details">
          <div class="cont">
            <h2>Détails du produit</h2>
            <hr width="80%">
            <div class="roz">
              <label for="nomlivre"><b>Nom de livre:</b></label>
              <p><?php echo $ligne['Titre']; ?></p>
              <label for="nomauteur"><b>Nom d'auteur:</b></label>
              <p>Auteur</p>
            </div>
          </div>
        </div>

      </div>
    <?php } ?>

  </div>
</body>

</html>