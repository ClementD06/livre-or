<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="commentaire_style.css">
    <title>Ajouter un commentaire</title>
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
                        <li><a href="index.php">Accueil</a></li>
                    </ul>
                </div> 
                <img src="menu-btn.png" alt="" class="menu_hamburger">
            </nav>
    </section>
    <section class="section_1">
    <h2>Ajouter un commentaire</h2>
    <form method="POST" action="commentaire_traitement.php">
        <!-- Champ du formulaire d'ajout de commentaire -->
        <label for="commentaire">Votre commentaire :</label><br>
        <textarea name="commentaire" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Ajouter le commentaire">
    </form>
    </section>
</body>
</html>
