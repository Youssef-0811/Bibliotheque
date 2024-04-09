
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="header-footer2.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css.css">

    <title>Document</title>
</head>
<body>
    <header>
    <?php 
    
    include("DataBase.php");
include('HF/Header2.php');

?>
</header>





<?php


// Check if the connection is established successfully
$id_client = $_SESSION['ID'];
    // Define the SQL query
    $sql = "SELECT livresemprunter.id_client, livres.ISBN AS ISBN, livres.Titre AS Titre, genre.nom AS GenreL, format.Nom AS FormatL, livres.Image AS 'Image' FROM livresemprunter 
    
    JOIN livres 
    ON livresemprunter.numero_livre_emprunter = livres.Numero 
    JOIN genre ON livres.Genre_Id = genre.Id
    JOIN format ON livres.Format_Id = format.Id
    WHERE livresemprunter.id_client = $id_client";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query execution was successful
    if ($result) {
?>


            <table class="content-table">
<thead>
                <tr>
                   <th></th>
                    <th>ISBN</th>
                    <th>Titre de l'article</th>
                    <th>classe</th>
                    <th colspan="2">Categorie</th>
                    
                </tr>
</thead>
                <?php
                while ($ligne = mysqli_fetch_array($result)) {
                ?>
                    <form action="delete.php" method="post">
                        
                        <tbody> 
                        <tr>
                        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['Image']); ?>" width="70" height="70"></td>
                            <td><?php echo $ligne['ISBN']; ?></td>
                            <td><?php echo $ligne['Titre']; ?></td>
                            <td><?php echo $ligne['GenreL']; ?></td>
                            <td><?php echo $ligne['FormatL']; ?></td>
                            <td><button type="submit" name="submit">Supprimer</button></td>

                            <input type="hidden" name="Numero" value="<?php echo $ligne['Numero'];?>">
                        </tr>
                    </tbody>
                 
                    </form>
                <?php
                }
                ?>

            </table>
            
        
<?php
}
?>
<div class="livres">

<?php
$queryLiv = "SELECT * FROM livres 
 EXCEPT SELECT * FROM livres WHERE Numero = 10 ";
$resultLiv = mysqli_query($conn,$queryLiv);
?>
<h2>livres</h2>
<div class="arrivals_box">
    <?php while ($ligne = mysqli_fetch_array($resultLiv)) { ?>
        <div class="arrivals_card">
            <div class="arrivals_image">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['Image']); ?>">
            </div>
            <div class="arrivals_tag">
                <p> <?php echo $ligne['Titre']; ?> </p>
                <div class="arrivals_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <form action="page-info.php" method="post">
                                <input class="arrivals_btn" type="submit" name="submitLiv" value="Savoir plus">
                                <input type="hidden" name="id-livre" value=" <?php echo $ligne['Numero']; ?>">
                            </form>
            </div>
        </div>
    <?php } ?>
</div>
<a href="accueil.php"><button >Retour</button></a>
</body>
</html>