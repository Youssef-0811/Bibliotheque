<?php
session_start();

include('DataBase.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve data from the form
    $id_client = $_SESSION['ID']; // Assuming you have a way to determine the client ID, here set to 1 as an example
    $numero = $_POST['numerodelivre'];
    $dateActuelle = date("Y-m-d"); // Added this line to get the current date
    $date_retour = date("Y-m-d", strtotime($dateActuelle . " +7 days")); // Calculate the return date (7 days from current date)
    $date_emprunt = date("Y-m-d");

    // Prepare SQL statement to check if the book is already borrowed by the client
    $stmt = $conn->prepare("SELECT COUNT(*) FROM livresemprunter WHERE numero_livre_emprunter = ? AND id_client = ?");
    $stmt->bind_param('ss', $numero, $id_client);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();

    // Check if the value exists
    if ($count > 0) {
        echo "Vous avez dejat emprunter ce livre";
    } else {
        // Close the previous prepared statement
        $stmt->close();
        // Insert data into the "emprunt" table
        $sql = "INSERT INTO livresemprunter (id_client, numero_livre_emprunter, date_retour, date_emprunt) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $id_client, $numero, $date_retour, $date_emprunt);
        if ($stmt->execute()) {
            header('Location: index.php');
            exit(); // Added exit after header to stop further execution
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; // Corrected to use $stmt->error
        }
    }
    // Close the prepared statement
    $stmt->close();
    // Close the database connection
    $conn->close();
} else {
    echo "Error: The form was not submitted correctly.";
}
?>

