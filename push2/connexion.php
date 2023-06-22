<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_connexion.css">
    <title>Connexion</title>
</head>
<body>
    <section class=entete>
            <nav class="navbar">
                <div class="logo">
                    <img id="img_logo" src="logo_nav.png" alt="logo_module">
                    <a href class="txt_logo">Mon livre d'or</a>
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
        <h2>Connexion</h2>
        <form method="POST" action="connexion_traitement.php">
            <!-- Champs du formulaire de connexion -->
            <label for="login">Login :</label>
            <input type="text" name="login" required><br>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Se connecter">
        </form>
    </section>
</body>
</html>
