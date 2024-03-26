<?php
include("DataBase.php");

// Connexion à la base de données et exécution de la requête SQL
$sql = "SELECT * FROM auteurs";
$result = $conn->query($sql);

// Vérifier si la requête a réussi
if ($result && $result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='data:" . $row['ImageType'] . ";base64," . base64_encode($row['Image']) . "' width='100'></td>";
        echo "<td>" . $row['Prenom'] . "</td>";
        echo "<td>" . $row['Nom'] . "</td>";
        // Display a limited number of lines for the biography
        echo "<td><div class='biography'>" . truncate_text($row['Bio'], 200) . "</div></td>";
        echo "<td>" . $row['DateNaissance'] . "</td>";
        echo "<td style='white-space: nowrap;'>"; // Open table data for buttons
        // Add delete button with confirmation
        echo "<button onclick='showDeleteModal(\"" . $row['Id'] . "\", \"" . $row['Nom'] . "\")' class='btn btn-danger' style='margin-right: 20px;'>Delete</button>";
        // Add edit button
        echo "<button onclick='editAuthor(\"" . $row['Id'] . "\", \"" . $row['Nom'] . "\")' class='btn btn-primary'>Edit</button>";
        echo "</td>"; // Close table data for buttons
        echo "</tr>";
    }
}
// Function to truncate the text
function truncate_text($text, $length)
{
    if (strlen($text) > $length) {
        $text = substr($text, 0, $length);
        $text .= '... <a href="#">Read More</a>'; // Add Read More link
    }
    return $text;
}

// Fermer la connexion à la base de données si elle n'est plus nécessaire
$conn->close();
