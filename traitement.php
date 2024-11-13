<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>traiment contact</title>

</head>

<body>

    


<?php
$servername = "localhost"; // L'adresse du serveur MySQL, généralement "localhost" si vous utilisez 00webhost.com
$username = "id21980875_jonhson"; // Votre nom d'utilisateur MySQL
$password = "Mitsimbina@101"; // Votre mot de passe MySQL
$database = "id21980875_mitsimbina"; // Le nom de votre base de données MySQL, assurez-vous de remplacer "votredatabase" par le nom réel de votre base de données

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Vérifier si le formulaire a été soumis
if(isset($_POST['nom'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $messageclient = $_POST['messageclient'];

    // Échapper les caractères spéciaux pour éviter les attaques par injection SQL
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $adresse = mysqli_real_escape_string($conn, $adresse);
    $telephone = mysqli_real_escape_string($conn, $telephone);
    $email = mysqli_real_escape_string($conn, $email);
    $messageclient = mysqli_real_escape_string($conn, $messageclient);

    // Écrire la requête SQL d'insertion
    $sql = "INSERT INTO clients (nom, prenom, adresse, telephone, email, messageclient)
    VALUES ('$nom', '$prenom', '$adresse', '$telephone', '$email', '$messageclient')";

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        echo "Merci beaucoup vos contact son bien enregistrer dans notre base des données.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
// Redirection vers la page d'accueil
header("Location: index.html");
exit;
?>



    

</body>

</html>