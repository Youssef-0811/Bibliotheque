<?php


include("DataBase.php");


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve data from the form
    $id_client = 1; // Assuming you have a way to determine the client ID, here set to 1 as an example
    $numero = $_POST['N°'];
    $date_emprunt = date("Y-m-d"); // Get the current date

   

    // Insert data into the "emprunt" table
    $sql = "INSERT INTO emprunt (id_client,	N°, date_emprunt) VALUES ('$id_client',' $numero','$date_emprunt')";

    if (mysqli_query($conn, $sql)) {
        header('location:Emprunt.php');
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Erreur: Le formulaire n'a pas été soumis correctement.";
}
?>
