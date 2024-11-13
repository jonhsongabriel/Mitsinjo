<?php
// Connexion à la base de données
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

// Vérifier si le paramètre d'ID de contact est passé dans l'URL
if(isset($_GET['delete_id'])) {
    // Supprimer le contact correspondant de la base de données
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM clients WHERE id = $delete_id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Le contact a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du contact: " . $conn->error;
    }
}

// Récupérer les données depuis la base de données
$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les données sous forme de tableau
    echo "<table border='1'>
    <tr>
    <th class='text-white bg-danger p-2 border'>Nom</th>
    <th class='text-white bg-danger p-2 border'>Prénom</th>
    <th class='text-white bg-danger p-2 border'>Adresse</th>
    <th class='text-white bg-danger p-2 border'>Téléphone</th>
    <th class='text-white bg-danger p-2 border'>Email</th>
    <th class='text-white bg-danger p-2 border'>Message</th>
    <th class='text-white bg-danger p-2 border'>Actions</th> <!-- Nouvelle colonne pour les actions -->
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='p-2 border'>" . $row['nom'] . "</td>";
        echo "<td class='p-2 border'>" . $row['prenom'] . "</td>";
        echo "<td class='p-2 border'>" . $row['adresse'] . "</td>";
        echo "<td class='p-2 border'>" . $row['telephone'] . "</td>";
        echo "<td class='p-2 border'>" . $row['email'] . "</td>";
        echo "<td class='p-2 border'>" . $row['messageclient'] . "</td>";
        echo "<td class='p-2 border text-white bg-danger'><a href='?delete_id=" . $row['id'] . " '><b class='text-white'>Supprimer</b></a></td>"; // Lien de suppression avec ID de contact
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucune donnée trouvée.";
}

// Fermer la connexion
$conn->close();
?>
