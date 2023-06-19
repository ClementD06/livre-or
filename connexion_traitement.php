<?php
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

    // Préparer la requête de sélection de l'utilisateur
    $selectStmt = $conn->prepare("SELECT id, password FROM utilisateurs WHERE login = ?");
    $selectStmt->bind_param("s", $login);

    // Exécuter la requête de sélection
    $selectStmt->execute();

    // Récupérer le résultat de la requête
    $result = $selectStmt->get_result();

    // Vérifier si l'utilisateur existe et si le mot de passe correspond
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        if (password_verify($password, $hashed_password)) {
            // Démarrer la session et enregistrer l'identifiant de l'utilisateur
            session_start();
            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"] = $row["id"];

            // Rediriger vers la page du livre d'or
            header("Location: index.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }

    // Fermer la requête et la connexion à la base de données
    $selectStmt->close();
    $conn->close();
}
?>
