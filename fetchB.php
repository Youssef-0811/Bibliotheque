<?php
// Include the database connection file
include("DataBase.php");

// Initialize an empty variable to store the result
$result = "";

// SQL query to fetch data from the "livre" table
$sql = "SELECT * FROM livres";
$query_result = $conn->query($sql);

// Check if the query was successful
if ($query_result) {
    // Check if there are rows returned
    if ($query_result->num_rows > 0) {
        // Fetch associative array of each row
        while ($row = $query_result->fetch_assoc()) {
            // Append each row to the result variable
            $result .= "<tr>";
            $result .= "<td>" . '<img src="data:' . $row['ImageType'] . ';base64,' . base64_encode($row['Image']) . '" width="100">' . "</td>";
            $result .= "<td>" . $row['Titre'] . "</td>";
            $result .= "<td>" . $row['Auteur_Id'] . "</td>";
            $result .= "<td>" . $row['ISBN'] . "</td>";
            $result .= "<td>" . $row['Parution'] . "</td>";
            // Add edit link
            $result .= "<td><a href='EditLivre.php?id=" . $row['Numero'] . "'>Edit</a>";
            // Add delete button with onclick event
            $result .= "<button onclick='showDeleteModal(" . $row['Numero'] . ", \"" . $row['Titre'] . "\")'>Delete</button></td>";
            $result .= "</tr>";
        }
    } else {
        // If no rows are returned, display a message
        $result = "<tr><td colspan='6'>Aucun livre trouvé.</td></tr>";
    }
} else {
    // If the query was not successful, display an error message
    $result = "<tr><td colspan='5'>Erreur lors de l'exécution de la requête.</td></tr>";
}

// Output the result
echo $result;

// Close the database connection
$conn->close();
