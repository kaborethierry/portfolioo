<?php
include('config.php'); // Inclure le fichier de configuration pour la connexion à la base de données

// Récupérer les publications récentes
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIXELAR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="profile-container">
            <img src="profil.png" alt="Photo de profil" class="profile-pic"> 
            <h1>Bienvenue sur mon portfolio</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>À propos de moi</h2>
            <p>Je suis un développeur polyvalent qui travaille plus avec flutter</br>Avec une année d'expérience, </br>j'ai eu l'opportunité de travailler sur divers projets</br>Mon objectif est de créer des solutions innovantes</br> et efficaces qui répondent aux besoins des utilisateurs.</br>
            </p>
        </section>
        <section>
            <h2>Publications récentes</h2>
            <?php while ($row = $result->fetch_assoc()): ?>
                <article>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                    <?php if ($row['image_url']): ?>
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Image associée">
                    <?php endif; ?>
                    <?php if ($row['link_url']): ?>
                        <p><a href="<?php echo htmlspecialchars($row['link_url']); ?>" target="_blank">Lire plus</a></p>
                    <?php endif; ?>
                    <small>Publié le <?php echo $row['created_at']; ?></small>
                </article>
            <?php endwhile; ?>
        </section>
        <section>
            <h2>Télécharger mon CV</h2>
            <a href="cv.pdf" class="btn-download" download>Télécharger mon CV</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 KABORE Wend Puire Christian Thierry Thierry. Tous droits réservés.</p>
    </footer>
</body>
</html>

<?php
$result->close();
$conn->close();
?>
