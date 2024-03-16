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
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Webook</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
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
            <li class="nav-item active">
                <a class="nav-link" href="Book.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Livres</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Auteur.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Auteurs</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Genre.php">
                    <i class="fas fa-fw fa-swatchbook"></i>
                    <span>Genres</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Format.php">
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
                                <h1 class="h3 text-gray-800">Livres</h1>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="https://www.linkedin.com/in/aude-velly-menut/" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline text-gray-600 small">Aude Velly Menut</span>
                                <img class="img-profile rounded-circle" src="https://media.licdn.com/dms/image/C4E03AQFiMuNDUqxhVQ/profile-displayphoto-shrink_100_100/0?e=1564617600&v=beta&t=NEstICqg4IbD-Kczp066VDKb9VpMGa7gJ_fmRm6FLU4">
                            </a>

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Ligne de statistiques -->
                    <div class="row">
                        <!-- Carte nombre d'avis positifs -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Avis positifs</div>
                                            <div id="statDivAvisPos" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Carte nombre d'avis négatifs -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Avis négatifs</div>
                                            <div id="statDivAvisNeg" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Carte note moyenne -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Note moyenne</div>
                                            <div id="statDivAvisMoy" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Carte nombre d'avis moyens -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre d'avis moyens</div>
                                            <div id="statDivAvisNb" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-left-primary shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Les livres disponibles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 55.5px;" aria-sort="ascending" aria-label="Name: activate to sort column descending"></th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 125.45px;" aria-label="Position: activate to sort column ascending">Titre
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 125.45px;" aria-label="Position: activate to sort column ascending">Auteur
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 55.45px;" aria-label="Position: activate to sort column ascending">Parution
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 185.45px;" aria-label="Position: activate to sort column ascending">Genre
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 185.45px;" aria-label="Position: activate to sort column ascending">Éditeur
                                                        </th>
                                                </thead>
                                                <tbody id="books">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card border-left-primary shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="titleForm" class="m-0 font-weight-bold text-primary">Ajouter un livre</h6>
                        </div>
                        <div class="card-body">
                            <form id="addBookForm" action="Addb.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="titleBook">Titre</label>
                                    <input required type="text" class="form-control" id="titleBook" name="titleBook">
                                </div>
                                <div class="form-group">
                                    <label for="authorBook">Auteur</label>
                                    <select class="form-control" id="authorBook" name="authorBook">
                                        <option value="">Choisissez un auteur</option>
                                        <?php
                                        include("DataBase.php");
                                        // Fetch authors from the database
                                        $sqlAuthors = "SELECT * FROM auteurs";
                                        $resultAuthors = $conn->query($sqlAuthors);
                                        if ($resultAuthors->num_rows > 0) {
                                            while ($rowAuthor = $resultAuthors->fetch_assoc()) {
                                                echo "<option value='" . $rowAuthor['ID'] . "'>" . $rowAuthor['Nom'] . " " . $rowAuthor['Prenom'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="genreBook">Genre</label>
                                    <select class="form-control" id="genreBook" name="genreBook">
                                        <option value="">Choisissez un genre</option>
                                        <?php
                                        // Fetch genres from the database
                                        $sqlGenres = "SELECT * FROM genre";
                                        $resultGenres = $conn->query($sqlGenres);
                                        if ($resultGenres->num_rows > 0) {
                                            while ($rowGenre = $resultGenres->fetch_assoc()) {
                                                echo "<option value='" . $rowGenre['ID'] . "'>" . $rowGenre['Nom'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formatBook">Format</label>
                                    <select class="form-control" id="formatBook" name="formatBook">
                                        <option value="">Choisissez un format</option>
                                        <?php
                                        // Fetch formats from the database
                                        $sqlFormats = "SELECT * FROM format";
                                        $resultFormats = $conn->query($sqlFormats);
                                        if ($resultFormats->num_rows > 0) {
                                            while ($rowFormat = $resultFormats->fetch_assoc()) {
                                                echo "<option value='" . $rowFormat['ID'] . "'>" . $rowFormat['Nom'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="countPageBook">Nombre de pages</label>
                                    <input type="number" class="form-control" id="countPageBook" name="countPageBook">
                                </div>
                                <div class="form-group">
                                    <label for="releaseBook">Date de parution</label>
                                    <input required type="number" class="form-control" id="releaseBook" name="releaseBook">
                                    <div id="releaseInvalidBook" style="color:red;display:none;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="isbnBook">ISBN</label>
                                    <input required type="number" class="form-control" id="isbnBook" name="isbnBook">
                                    <div id="isbnInvalidBook" style="color:red;display:none;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="resumeBook">Résumé</label>
                                    <textarea class="form-control" id="resumeBook" name="resumeBook"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input required type="file" class="form-control" id="image" name="image">
                                    <br>
                                </div>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Custom scripts for all pages-->
    <script src="js/common.js"></script>
    <script src="js/books.js"></script>

</body>

</html>










<!-- <form action="ADDb.php" method="POST" enctype="multipart/form-data">
    <table border="0" class="table" cellpadding="10" cellspacing="10">
        <tr>
            <td class="msg" align="center" colspan="2"></td>
        </tr>
        <tr>
            <td class="labels">Ordre: </td>
            <td><input type="text" id="Ordre" name="Ordre" placeholder="Entrer le nom de livre" size="25" class="fields" required="required" /></td>
        </tr>
        <tr>
            <td class="labels">EAN : </td>
            <td><input type="text" id="EAN" name="EAN" placeholder="Entre EAN de livre" size="25" class="fields" required="required" /></td>
        </tr>
        <tr>
            <td class="labels">Titre Article : </td>
            <td><input type="text" id="Titre_Article" name="Titre_Article" placeholder="Entrer le titre de l'article" size="25" class="fields" required="required" /></td>
        </tr>
        <tr>
            <td class="labels">Classe</td>
            <td>
                <select id="genre" name='genre'>
                    <option value='Dictionnaire'>Dictionnaire</option>
                    <option value='Informatique'>Informatique</option>
                    <option value='Mathematique'>Mathematique</option>
                    <option value='Physique'>Physique</option>
                    <option value='Chimie'>Chimie</option>
                    <option value='Biologie'>Biologie</option>
                    <option value='Science Appliquee'>Science Appliquee</option>
                    <option value='Ingenierie'>Ingenierie</option>
                    <option value='Gestion et service de lentreprise'>Gestion et service de l'entreprise</option>
                    <option value='Economie'>Economie</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="labels">Categorie: </td>
            <td><input type="text" id="categorie" name="Categorie" placeholder="Categorie" size="25" class="fields" required="required" /></td>
        </tr>
        <tr>
            <td class="labels">Inventaire: </td>
            <td><input type="text" id="Inventaire" name="Inventaire" placeholder="Inventaire" size="25" class="fields" required="required" /></td>
        </tr>
        <tr>
            <td class="labels">Disponible: </td>
            <td><input type="text" id="Disponible" name="Disponible" placeholder="Disponible" size="25" class="fields" required="required" /></td>
        </tr>
        <tr>
            <td class="labels">Auteurs: </td>
            <td>
                <div class="custom-dropdown">
                    <select id="authorSelect" name="author_id" class="custom-select" onclick="fetchAuthors()">
                        <option value="">Select Author</option>
                    </select>

                </div>
            </td>
        </tr>
        <tr>
            <td class="labels">Image: </td>
            <td><input type="file" id="image" name="image" accept="image/*" class="fields" />
            </td>
        </tr>


        <tr>
            <td colspan="2" align="center"><input type="submit" value="submit" name="submit" class="fields" /></td>
        </tr>
    </table>
</form> -->