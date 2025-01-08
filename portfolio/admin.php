<?php
include('config.php'); // Inclure le fichier de configuration pour la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];
    $link_url = $_POST['link_url'];

    $stmt = $conn->prepare("INSERT INTO posts (title, content, image_url, link_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $image_url, $link_url);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

if (!$result) {
    die("Erreur de la requête SQL : " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tableau de Bord Administrateur</h1>
    </header>
    <main>
        <form action="admin.php" method="post">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Contenu :</label>
            <textarea id="content" name="content" required></textarea>
            <label for="image_url">URL de l'image :</label>
            <input type="text" id="image_url" name="image_url">
            <label for="link_url">URL du lien :</label>
            <input type="text" id="link_url" name="link_url">
            <button type="submit">Publier</button>
        </form>
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
    </main>
</body>
</html>

<?php
$result->close();
$conn->close();
?>
