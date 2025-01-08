<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "kaborethierry34@gmail.com"; // Remplacez par votre adresse email
    $subject = "Nouveau message de contact de $nom";
    $body = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";
    
    if (mail($to, $subject, $body, $headers)) {
        echo "Merci! Votre message a été envoyé.";
    } else {
        echo "Désolé, quelque chose s'est mal passé. Veuillez réessayer.";
    }
}
?>
