<?php
// Include database connection
include("DataBase.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST["titleBook"];
    $authorId = $_POST["authorBook"];
    $genreId = $_POST["genreBook"];
    $formatId = $_POST["formatBook"];
    $countPages = $_POST["countPageBook"];
    $releaseDate = $_POST["releaseBook"];
    $isbn = $_POST["isbnBook"];
    $resume = $_POST["resumeBook"];

    // Upload image
    $image = $_FILES["image"];
    $imageType = pathinfo($image["name"], PATHINFO_EXTENSION);
    $imageData = file_get_contents($image["tmp_name"]);
    $base64Image = 'data:image/' . $imageType . ';base64,' . base64_encode($imageData);

    // Prepare SQL statement to insert data into livres table
    $sql = "INSERT INTO livres (Titre, auteur_id, Genre_Id, Format_Id, Nbr_pages, Parution, ISBN, Resume, Image, ImageType)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisiiisss", $title, $authorId, $genreId, $formatId, $countPages, $releaseDate, $isbn, $resume, $base64Image, $imageType);

    // Execute the query
    if ($stmt->execute()) {
        header('Location: Book.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
