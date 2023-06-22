<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_profil.css">
    <title>Profil</title>
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
        <br><h2>Modifier le profil</h2>
        <form method="POST" action="profil_traitement.php">
            <!-- Champs du formulaire de modification de profil -->
            <label for="login">Nouveau login :</label>
            <input type="text" name="login" required><br>

            <label for="password">Nouveau mot de passe :</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Modifier">
        </form>
    </section>
</body>
</html>
