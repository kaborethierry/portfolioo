<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Contactez-moi</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="contact-form.php" method="post" class="contact-form">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Mon Nom. Tous droits réservés.</p>
    </footer>
</body>
</html>
