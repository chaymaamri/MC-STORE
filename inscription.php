<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $base_de_donnees = "mc_db";

    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

 
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
   
    $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES ('$nom_utilisateur', '$email', '$mot_de_passe')";


    if (mysqli_query($connexion, $sql)) {
    
        $_SESSION['inscription_success'] = true;
        header("Location: connexion.html"); 
        exit();
    } else {
  
        $_SESSION['inscription_error'] = "Erreur lors de l'inscription : " . mysqli_error($connexion);
    }
if (isset($_SESSION['inscription_error'])) {
    echo "<p>" . $_SESSION['inscription_error'] . "</p>";
    unset($_SESSION['inscription_error']);
}

if (isset($_SESSION['inscription_success'])) {
    echo "<p>Inscription réussie !</p>";
    unset($_SESSION['inscription_success']);
}

mysqli_close($connexion);
}
?>
