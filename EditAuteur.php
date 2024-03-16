<?php
include("DataBase.php");

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
?>
<?php
include("DataBase.php");

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
?>
<!-- Button to trigger the modal -->
<button onclick="openEditModal()">Edit Author</button>
<style>
    /* Modal styles */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal content */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }
</style>
<!-- The modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <!-- Edit form -->
        <form id="editForm">
            <input type="hidden" id="authorId" name="authorId" value="">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom"><br>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom"><br>
            <label for="dateNaissance">Date de Naissance:</label>
            <input type="text" id="dateNaissance" name="dateNaissance"><br>
            <label for="bio">Biographie:</label>
            <textarea id="bio" name="bio"></textarea><br>
            <input type="submit" value="Save">
        </form>
    </div>
</div>