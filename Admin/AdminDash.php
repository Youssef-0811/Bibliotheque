<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Aude Velly Menut">

    <title>WeBook - Gestion de livres </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<?php
session_start(); // Start the session

// Check if admin is logged in, if not redirect to login page
if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id'])) {
    header("Location: ../../AdminLogin.php");
    exit();
}

// Retrieve admin's name and image URL from session variables
$admin_name = $_SESSION['admin_name'];
// Retrieve admin's image URL from session variable
$admin_image_url = isset($_SESSION['admin_image']) ? $_SESSION['admin_image'] : "images\avatar icon.png"; // Provide a default image URL if admin image is not set

?>

<style>
    /* CSS to hide the dropdown initially */
    .dropdown-menu {
        display: none;
    }

    /* CSS to show the dropdown when hovering over the admin's name or image */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="AdminDash.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Webook</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../Admin/AdminDash.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../Admin/Livres/Book.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Livres</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Admin/Auteurs/Auteur.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Auteurs</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Admin/Genres/Genre.php">
                    <i class="fas fa-fw fa-swatchbook"></i>
                    <span>Genres</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Admin/Format/Format.php">
                    <i class="fas fa-fw fa-align-left"></i>
                    <span>Formats</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <div class="input-group-append">
                                <h1 class="h3 text-gray-800">Tableau de bord</h1>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow" style="margin-right: 10px;">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline text-gray-600 "><?php echo $admin_name; ?></span>
                                <!-- <img class="img-profile rounded-circle" src="<?php echo $admin_image_url; ?>"> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="Deconexion.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Deconnexion
                                </a>
                                <a class="dropdown-item" href="../Deconexion.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Compte
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">

                        <?php
                        include("../../DataBase.php");
                        $query = "SELECT * FROM livres ORDER BY Numero DESC LIMIT 3";
                        $result = mysqli_query($conn, $query);
                        // Display the "Livres" heading inside a box with a different color
                        echo '<div class="col-xl-3 col-md-6 mb-4">';
                        echo '<div class="card border-left-primary shadow h-100 py-2">';
                        echo '<div class="card-body" >'; // Change the background color as needed
                        echo '<div class="text-xs font-weight-bold text-primary text-uppercase mb-1" >'; // Change the text color as needed
                        echo '<a href="../Admin/Livres/Book.php">Livres</a>';
                        echo '</div>';

                        // Display each book inside the "Livres" box as a list
                        echo '<ul class="list-group list-group-flush">';
                        while ($row = mysqli_fetch_assoc($result)) {
                            $book_name = $row['Titre'];
                            $book_id = $row['Numero']; // Assuming book_id is the primary key in the database

                            echo '<li class="list-group-item" style="background-color: #fff;">'; // Change the background color of each list item
                            echo '<a href="../Admin/Livres/Book.php?id=' . $book_id . '" style="color: #000; text-decoration: none;">' . $book_name . '</a>'; // Change the text color and remove underline
                            echo '</li>';
                        }
                        echo '</ul>';

                        // Close the "Livres" box
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        ?>






                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="../Admin/Auteurs/Auteur.php">Auteurs</a>
                                            </div>
                                            <div id="statDivAuthors" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="../Admin/Auteurs/Auteur.php"><i class="fas fa-user fa-2x text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="../Admin/Genres/Genre.php">Genres</a>
                                            </div>
                                            <div id="statDivGenres" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="../Admin/Genres/Genre.php"><i class="fas fa-swatchbook fa-2x text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="../Admin/Format/Format.php">Formats</a>
                                            </div>
                                            <div id="statDivFormats" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="../Admin/Format/Format.php"><i class="fas fa-align-left fa-2x text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Avis</div>
                                            <div id="statDivAvis" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-info fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Custom scripts for all pages-->
        <script src="js/common.js"></script>
        <script src="js/index.js"></script>

</body>

</html>