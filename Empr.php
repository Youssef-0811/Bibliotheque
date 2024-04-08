<?php

session_start();

include("DataBase.php");


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve data from the form
    $id_client = $_SESSION['ID']; // Assuming you have a way to determine the client ID, here set to 1 as an example
    $numero = $_POST['numerodelivre'];
    $date_retour = date("Y-m-d", strtotime($dateActuelle . " +7 days")); // Get the current date
    $date_emprunt = date("Y-m-d");

    // Insert data into the "emprunt" table
    $sql = "INSERT INTO livresemprunter (id_client,numero_livre_emprunter,date_retour,date_emprunt) VALUES ('$id_client',' $numero','$date_retour',' $date_emprunt')";

    if (mysqli_query($conn, $sql)) {
        header('location:index.php');
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Erreur: Le formulaire n'a pas été soumis correctement.";
}
