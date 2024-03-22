<?php
include('DataBase.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


    $id_livre = mysqli_real_escape_string($conn, $_POST['id-livre']);


$sql = "SELECT * FROM livres WHERE Numero = $id_livre ";

$result = mysqli_query($conn,$sql);

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
<body>

<style>

.card {
  position: relative;
  width: 220px;
  height: 300px;

  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  perspective: 1000px;
  box-shadow: 0 0 0 5px #ffffff80;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  margin-top: 10rem;
}

.card img {
  width: 180px;
  fill: #333;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  box-shadow: 0 0 15px rgb(76, 44, 0);
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
}

.card__content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f2f2f2;
  transform: rotateX(-90deg);
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover .card__content {
  transform: rotateX(0deg);
}

.card__title {
  margin: 0;
  font-size: 24px;
  color: #333;
  font-weight: 700;
}

.card:hover img {
  scale: 0;
}

.card__description {
  margin: 10px 0 0;
  font-size: 14px;
  color: #777;
  line-height: 1.4;
}
.nomlivre{
    position: absolute;
    top: 10rem;
    left: 40%;
}

.auteur h2{
    display: table-caption;
}

.emprunt{
    right: 1rem;
    position: absolute;
    top: 10rem;
    border: #333 solid;
    padding: 14rem 7rem;
}


.emprunt #submit{
margin-top: 1rem;
 align-items: center;
 appearance: none;
 background-color: #FCFCFD;
 border-radius: 4px;
 border-width: 0;
 box-shadow: rgba(45, 35, 66, 0.2) 0 2px 4px,rgba(45, 35, 66, 0.15) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
 box-sizing: border-box;
 color: #36395A;
 cursor: pointer;
 display: inline-flex;
 font-family: "JetBrains Mono",monospace;
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
 transition: box-shadow .15s,transform .15s;
 user-select: none;
 -webkit-user-select: none;
 touch-action: manipulation;
 white-space: nowrap;
 will-change: box-shadow,transform;
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
.emprunt h4{
    top: 0;
    position: absolute
}

</style>

<header>
<?php
include('HF/header2.php');

?>
</header>
<?php if ( $result && mysqli_num_rows($result) > 0) {?>

    <div class="card">
  <img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['image']); ?>">

  <div class="card__content">
    <p class="card__title"> <?php echo $ligne['Titre_Article'];?> </p>
    <p class="card__description">Ecrit par: auteur</p>
  </div>
</div>
<div class="auteur">
 <h2>L'auteur: auteur</h2><p></p>


</div>



<div class="nomlivre">  

 <h1><p>  <?php echo $ligne['Titre_Article'];?> </p></h1>


</div>
<div class="emprunt">
    <h4>Etat:Disponible</h4>
  <form action="">
    <label for="start">Start date:</label>
    <input type="date" id="start" name="trip-start" value="2023-07-22" min="2023-01-01" max="2023-12-31" /><br>

    <input id="submit" type="submit" value="Emprunter" name="submit">

</form>
</div>



<?php } ?>
</body>
</html>
