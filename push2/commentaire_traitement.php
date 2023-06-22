<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: connexion.php");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le commentaire depuis le formulaire
    $commentaire = $_POST["commentaire"];

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

    // Préparer la requête d'insertion du commentaire
    $insertStmt = $conn->prepare("INSERT INTO commentaires (id_utilisateur, commentaire, date) VALUES (?, ?, NOW())");
    $insertStmt->bind_param("is", $user_id, $commentaire);

    // Exécuter la requête d'insertion
    if ($insertStmt->execute()) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur : échec de l'ajout du commentaire.";
    }

    // Fermer la requête et la connexion à la base de données
    $insertStmt->close();
    $conn->close();
}
?>
