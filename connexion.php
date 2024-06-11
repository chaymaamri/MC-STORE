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

    
    $nom_utilisateur = mysqli_real_escape_string($connexion, $_POST['login_username']);
    $mot_de_passe = mysqli_real_escape_string($connexion, $_POST['login_password']);

    
    $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur='$nom_utilisateur'";
    $resultat = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($resultat) == 1) {
        $utilisateur = mysqli_fetch_assoc($resultat);
        if (password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            
            $_SESSION['loggedin'] = true;
            $_SESSION['nom_utilisateur'] = $nom_utilisateur;
            header("Location: index.html"); 
            exit();
        } else {
            
          $_SESSION['login_error'] = "Mot de passe incorrect";
        }
    } else {
       
        $_SESSION['login_error'] = "Nom d'utilisateur incorrect";
    }

    
    mysqli_close($connexion);
}


header("Location: index.html");
exit();
?>

