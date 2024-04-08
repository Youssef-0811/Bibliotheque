<?php
include("../../DataBase.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $authorId = $_POST['authorId'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['dateNaissance'];
    $bio = $_POST['bio'];

    if (!empty($authorId)) {
        // Update the existing author record
        $updateQuery = "UPDATE auteurs SET Nom='$nom', Prenom='$prenom', DateNaissance='$dateNaissance', Bio='$bio' WHERE ID = $authorId";
        $result = $conn->query($updateQuery);

        if ($result) {
            echo "Author updated successfully";
        } else {
            echo "Error updating author: " . $conn->error;
        }
    } else {
        echo "Author ID is missing";
    }
}
