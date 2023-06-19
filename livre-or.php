<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="livreor-style.css">
    <title>Livre d'Or</title>
</head>
<body>
    <section class=entete>
            <nav class="navbar">
                <div class="logo">
                    <img id="img_logo" src="logo_nav.png" alt="logo_module">
                    <a href class="txt_logo">MonEspace</a>
                </div>
                <div class="nav_links">
                    <ul>
                        <li><a href="logout.php">Déconnexion</a></li>';
                        <li><a href="profil.php">Mon profil</a></li>';
                        <li><a href="livre-or.php">Livre d'or</a></li>
                        <li><a href="commentaire.php">Laisser un commentaire</a></li>
                        <li><a href="inscription.php">Créer un compte</a></li>';
                        <li><a href="connexion.php">Se connecter</a></li>'; 
                        <li><a href="index.php">Accueil</a></li>
                    </ul>
                </div> 
                <img src="menu-btn.png" alt="" class="menu_hamburger">
            </nav>
    </section>
    <section class="section_1">
        <div class="container_add">
        <?php
        // Connexion à la base de données et récupération des commentaires
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "Choupimolly8490.";
        $dbname = "livreor";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        $sql = "SELECT c.commentaire, c.date, u.login FROM commentaires c JOIN utilisateurs u ON c.id_utilisateur = u.id ORDER BY c.date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $commentaire = $row["commentaire"];
                $date = $row["date"];
                $utilisateur = $row["login"];

                echo '<div class="comment-container">';
                echo "<p>Posté le $date par $utilisateur :<br>$commentaire</p>";
                echo '</div>';
            }
        } else {
            echo "<p>Aucun commentaire pour le moment.</p>";
        }

        $conn->close();
        ?>

        <!-- Lien vers le formulaire d'ajout de commentaire -->
        <?php
        session_start();
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
            echo '<a href="commentaire.php">Ajouter un commentaire</a>';
        }
        ?>
        </div>
    </section>
</body>
</html>
