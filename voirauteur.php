<?php include('DataBase.php')


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="header-footer2.css">
    <title>Document</title>
</head>


<header>
    <?php
    include('HF/header2.php');?>
</header>


<body>
    
<div class="image">

<img src="images/15034229 (1).webp" alt="">
<div class="info">
<P>Nom: auteur</P>
<p>Prenom: auteur</p>
<p>age: 66ans</p>
<p>Nationalite: Marrocain</p>
</div>

  </div>

<div class="desc">
<div class="description">
<h1>Description</h1>

<p>
Biographie courte de Mark Twain - Samuel Langhorne Clemens, plus connu sous le nom de Mark Twain, est un écrivain et humoriste américain né le 30 novembre 1835 à Florida aux États-Unis. Son père décède alors qu'il n'a que 12 ans. Pour subsister aux besoins de la famille, le jeune Clemens abandonne ses études et devient apprenti typographe dans l'imprimerie du village. En 1850, il rejoint le journal fondé par son frère et rédige ses premiers articles. Alors qu'il vient d'embarquer sur le Mississippi pour se rendre à La Nouvelle-Orléans, le jeune homme rencontre un capitaine de bateau à vapeur nommé Horace E. Bixby, lequel parvient à le convaincre de travailler pour lui. De cette rencontre naîtra son pseudonyme : lorsqu'il vérifie la profondeur du fleuve, le capitaine lui crie "mark twain !", des mots de jargon pour signaler que la profondeur est suffisante.

En 1864, Mark Twain travaille à San Francisco en tant que reporter et voyage régulièrement en Europe. Cinq ans plus tard, il publie son premier roman, Le Voyage des innocents, dans lequel il s'inspire de ses voyages, suivi de À la dure ! en 1872. Mais c'est grâce à son roman Les Aventures de Tom Sawyer, publié en 1876 que l'écrivain connaît la célébrité. Ses qualités de romancier se confirment à la publication de la suite, Les Aventures de Huckleberry Finn, en 1885. Mark Twain se caractérise par la précision de ses descriptions, démontrant à quel point il s'imprègne des lieux qu'il traverse. Grâce à son expérience et à ses voyages, il parvient à décrire la société américaine d'un point de vue inhabituel pour son époque. Il décède d'une crise cardiaque le 21 avril 1910 à Redding (États-Unis) à l'âge de 74 ans. Il venait de perdre successivement sa femme et deux de ses trois filles.
</p>
</div>
</div>




<div class="livres">

<?php
$query = "select * from livres;";
$result = mysqli_query($conn,$query);

?>
        <h2>livres</h2>
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




<div class="livres">

<?php
$query = "select * from livres;";
$result = mysqli_query($conn,$query);

?>
        <h2>livres de meme genre</h2>
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




</body>
<?php
include('HF/footer.php')
?>
</html>