<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $login = $_POST["login"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Hasher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connexion à la base de données
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "Choupimolly8490.";
    $dbname = "livreor";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparer la requête d'insertion de l'utilisateur
    $insertStmt = $conn->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
    $insertStmt->bind_param("ss", $login, $hashed_password);

    // Exécuter la requête d'insertion
    if ($insertStmt->execute()) {
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
    } else {
        echo "Erreur lors de l'inscription.";
    }

    // Fermer la requête et la connexion à la base de données
    $insertStmt->close();
    $conn->close();
}
?>
