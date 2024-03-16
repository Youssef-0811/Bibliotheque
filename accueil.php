<?php

include('DataBase.php');

include('pagination.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css"> -->
    <link rel="stylesheet" href="acueil.css">
    <link rel="stylesheet" href="header-footer2.css">


    <title>Document</title>
</head>

<header>
    <?php
    include('HF/header2.php'); ?>
</header>

<?php
//importer les 8 derniers livres dans la base
$row_per_page = 8;

$sql0 = 'select * from livres';
$records = mysqli_query($conn, $sql0);

$nr_of_rows = mysqli_num_rows($records);

$pages = ceil($nr_of_rows / $row_per_page);

$start = max(0, $nr_of_rows - 8);
$sql = "SELECT * FROM livres LIMIT $start, $row_per_page";
$result = mysqli_query($conn, $sql);
?>

<body>
    <div>

        <div class="emp">
            <div class="txt">
                <h1>Bonjour dans Bibliotheque Online</h1>
                <h4>Emprunter Maintenant</h4>
                <div class="buttn">
                    <a href="index.php"><button id="btn">Emprunter</button></a>
                </div>
            </div>
        </div>
    </div>
    <br>



    <div class="wrapper">
        <?php
        include('testSlider.php')

        ?>
    </div>






    <!--Services-->


    <div class="services">

        <div class="services_box">

            <div class="services_card">

                <h3>Emprunter des livres</h3>
                <p>
                    Emprunter jusqua 4 livres au maximum
                </p>
            </div>

            <div class="services_card">

                <h3>Biographie d'auteur</h3>
                <p>
                    possibilite de lire la Biographie de vos auteurs preferes
                </p>
            </div>

            <div class="services_card">

                <h3>les commentaire </h3>
                <p>
                    voir les commentaires des personnes sur les livres
                </p>
            </div>

            <div class="services_card">

                <h3>compte</h3>
                <p>
                    Creez vote propre compte
                </p>
            </div>

        </div>

    </div>


    <!--About-->

    <div class="about">

        <div class="about_image">
            <img src="images/about.png">
        </div>
        <div class="about_tag">
            <h1>About Us</h1>
            <p>
                fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
                fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
                fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
                fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
                fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
            </p>
            <a href="#" class="about_btn">Learn More</a>
        </div>

    </div>


    <div class="arrivals">
        <h2>nouveaux livres</h2>
        <div class="arrivals_box">

            <?php while ($ligne = mysqli_fetch_array($result)) {

            ?>


                <div class="arrivals_card">
                    <div class="arrivals_image">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['image']); ?>">
                    </div>
                    <div class="arrivals_tag">
                        <p> <?php echo $ligne['Titre_Article']; ?> </p>
                        <div class="arrivals_icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <a href="#" class="arrivals_btn">Learn More</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <h2>Auteurs</h2>



</body>
<?php
include('HF/footer.php')
?>