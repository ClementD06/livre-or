<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: connexion.php");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Connexion à la base de données
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "Choupimolly8490.";
    $dbname = "livreor";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Vérifier si l'identifiant de l'utilisateur est disponible dans la session
    if (!isset($_SESSION["user_id"])) {
        echo "Erreur : l'identifiant de l'utilisateur n'est pas disponible.";
        exit();
    }

    // Récupérer l'identifiant de l'utilisateur depuis la session
    $user_id = $_SESSION["user_id"];

    // Préparer la requête de mise à jour du profil
    $updateStmt = $conn->prepare("UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?");
    $updateStmt->bind_param("ssi", $login, $password, $user_id);

    // Exécuter la requête de mise à jour
    if ($updateStmt->execute()) {
        echo "Profil mis à jour avec succès.";
    } else {
        echo "Erreur : échec de la mise à jour du profil.";
    }

    // Fermer la requête et la connexion à la base de données
    $updateStmt->close();
    $conn->close();
}
?>
