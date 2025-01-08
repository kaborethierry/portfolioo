<?php
$servername = "127.0.0.1";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL (par défaut : root)
$password = ""; // Remplacez par votre mot de passe MySQL (par défaut : vide)
$dbname = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
