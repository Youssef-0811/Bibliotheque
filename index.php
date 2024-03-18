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

include('HF/header2.php')
?>
</header><br>

<body>
    


    <div class="wrapper">
<?php
include('testSlider.php')

?>
    </div>




<div class="arrivals">
        <h2>livres Disponibles</h2>
<div class="arrivals_box">

       <?php while ($ligne = mysqli_fetch_array($result)) {
       
    ?>
         

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['image']); ?>">
                </div>
                <div class="arrivals_tag">
                    <p>  <?php echo $ligne['Titre_Article']; ?> </p>
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
        <div class="page-info">
       
            <?php
        if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {?>
affiche <?php echo $_GET['page-nr']?>  sur <?php echo $pages ?>
<?php }else{?>
 affiche 1  sur <?php echo $pages ?>
<?php
}?>
            
        </div>
        <div class="pagination">

            <a class="pagi" href="?page-nr=1">first</a>

            <?php
            if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {

            ?>

                <a class="pagi" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
            <?php
            } else {
            ?>

                <a class="pagi" href="">previous</a>
            <?php

            }


            ?>


            <div class="page-numbers">

                <?php

                for ($counter = 1; $counter <= $pages; $counter++) {
                ?>
                    <a class="pagi" href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>

                <?php
                }



                ?>


            </div>


            <?php

            if (!isset($GET['page-nr'])) {
            ?>

                <a class="pagi" href="?page-nr=2">Next</a>
                <?php
            } else {

                if ($GET['page-nr'] >= $pages) { ?>

                    <a>Next</a>

                <?php

                } else {
                ?>
                    <a class="pagi" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">next</a>

            <?php
                }
            }

            ?>



            <a class="pagi" href="?page-nr=<?php echo $pages ?>">last</a>




        </div>





    </section>



<?php
include('HF/footer.php')
?>



</body>

</html>