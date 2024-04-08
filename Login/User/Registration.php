<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="../../loginstyles.css">
</head>

<body>
    <span class="SubHead">Inscription Etudiant</span>
    <br />
    <br />
    <div class="container">
        <h2>Registration</h2>

        <form action="Register.php" method="post">

            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required><br>
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" required>
            <label for="filiere">Filiere</label>
            <select name="branch" class="fields" required>
                <option value="" disabled="disabled" selected="selected">- - Selectionnez votre département - -</option>
                <option style="color:black" value="Génie Appliqué">Genie Appliqué</option>
                <option style="color:black" value="Génie Informatique">Génie Informatique</option>
                <option style="color:black" value="Management">Management</option>
            </select>
            <label for="password">password</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Register">

            <button><a href="../../accueil.php">Retour</a></button>


        </form>

    </div>
</body>

</html>