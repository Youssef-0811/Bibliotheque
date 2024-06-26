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




    <?php
    include('slider.php')
    ?>



    <div class="selectdiv">
        <form id="categoryForm" action="index.php" method="GET" >
            <label>
                <select name="Categorie" onchange="submitForm()">
                    <option selected> Select Categorie </option>
                    <?php
            // Fetch categories from database
            $sql = "SELECT Nom FROM format";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($ligne = mysqli_fetch_array($result)) {
             echo "<option>".$ligne["Nom"]."</option>";?>
         
                 
<?php           
                }
            }
            ?>
                </select>
            </label>
        </form>
    </div>
    <script>
    function submitForm() {
        document.getElementById("categoryForm").submit();
    }
</script>
    <br>

    <div class="arrivals" id="arrivals">
        <h2>Books Available</h2>
        <div class="arrivals_box">
            <?php
            // Check if search query is set
            if (isset($_GET['search'])  &&  !empty($_GET['search'])) {
                $search = $_GET['search'];
                // Modify your SQL query to search by book title
                $sql = "SELECT * FROM livres WHERE Titre LIKE '%$search%' ";
                $result = mysqli_query($conn, $sql);
                // Loop through search results and display
                while ($ligne = mysqli_fetch_array($result)) { ?>


                    <div class="arrivals_card">
                        <div class="arrivals_image">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['Image']);?>" alt="<?php echo $ligne['Titre'];?>">
                        </div>
                        <div class="arrivals_tag">
                            <p> <?php echo $ligne['Titre']; ?></p>
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
                <?php
                }
            }
            else if (isset($_GET['Categorie'])) {
                // Check if a category has been selected
                
                    $selected_category = $_GET['Categorie'];

                    $sql = "SELECT * FROM livres 
                    JOIN format on format.Id = livres.Format_Id
                    where format.Nom ='$selected_category'";

                    $result = mysqli_query($conn, $sql);

                    while ($ligne = mysqli_fetch_array($result)) { ?>


                        <div class="arrivals_card">
                            <div class="arrivals_image">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['Image']); ?>"alt="<?php echo $ligne['Titre'];?>">
                            </div>
                            <div class="arrivals_tag">
                                <p> <?php echo $ligne['Titre']; ?></p>
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
      
                    <?php
                    

                    }

                } else {
                $sql = "select * from livres LIMIT  $start, $row_per_page";
                $result = mysqli_query($conn, $sql);

                // If no search query, display all books as before
                while ($ligne = mysqli_fetch_array($result)) { ?>


                    <div class="arrivals_card">
                        <div class="arrivals_image">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['Image']); ?>" alt="<?php echo $ligne['Titre'];?>">
                        </div>
                        <div class="arrivals_tag">
                            <p> <?php echo $ligne['Titre']; ?></p>
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
            <?php
                }
            }
            ?>
        </div>
    </div>



    <div class="page-info">

        <?php
        if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) { ?>
            affiche <?php echo $_GET['page-nr'] ?> sur <?php echo $pages ?>
        <?php } else { ?>
            affiche 1 sur <?php echo $pages ?>
        <?php
        } ?>

    </div>
    <div class="pagination">

        <a class="pagi" href="?page-nr=1#arrivals">first</a>

        <?php
        if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {

        ?>

            <a class="pagi" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>#arrivals">Previous</a>
        <?php
        } else {
        ?>


        <?php

        }


        ?>


        <div class="page-numbers">

            <?php

            for ($counter = 1; $counter <= $pages; $counter++) {
            ?>
                <a class="pagi" href="?page-nr=<?php echo $counter ?>#arrivals"><?php echo $counter ?></a>

            <?php
            }



            ?>


        </div>


        <?php

        if (!isset($_GET['page-nr'])) {
        ?>

            <a class="pagi" href="?page-nr=2#arrivals">Next</a>
            <?php
        } else {

            if ($_GET['page-nr'] >= $pages) { ?>



            <?php

            } else {
            ?>
                <a class="pagi" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>#arrivals">Next</a>

        <?php
            }
        }

        ?>



        <a class="pagi" href="?page-nr=<?php echo $pages ?>#arrivals">last</a>




    </div>









    <?php
    include('HF/footer.php')
    ?>



</body>

</html>