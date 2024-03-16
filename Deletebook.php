<?php
include("DataBase.php");

// Check if the connection is established successfully
if ($conn) {
    // Define the SQL query
    $sql = 'SELECT * FROM livres';

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query execution was successful
    if ($result) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Document</title>
        </head>

        <body>

            <table class="content-table">
<thead>
                <tr>
                    <th>Image</th>
                    <th>EAN</th>
                    <th>Titre de l'article</th>
                    <th>classe</th>
                    <th>Categorie</th>
                    <th>Action</th>
                </tr>
</thead>
                <?php
                while ($ligne = mysqli_fetch_array($result)) {
                ?>
                    <form action="delete.php" method="post">
                        <tbody>
                        <tr>
                            <td><img src="data:image/jpeg;base64,<?php echo base64_encode($ligne['image']); ?>" width="70" height="70"></td>
                            <td><?php echo $ligne['EAN']; ?></td>
                            <td><?php echo $ligne['Titre_Article']; ?></td>
                            <td><?php echo $ligne['Classe']; ?></td>
                            <td><?php echo $ligne['Categorie']; ?></td>
                            <td><button type="submit" name="submit">Supprimer</button></td>
                            <input type="hidden" name="Numero" value="<?php echo $ligne['Numero']; ?>">
                        </tr>
                    </tbody>
                    </form>
                <?php
                }
                ?>

            </table>
            <a href="Admin.php"><button>Retour</button></a>
        </body>

        </html>
<?php
    } else {
        // Error handling if the query fails
        echo "Erreur: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Error handling if the connection fails
    echo "Erreur de connexion à la base de données.";
}
?>