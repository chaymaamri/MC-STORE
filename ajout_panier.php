<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Inscription / Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <br><br><br><br>
    <nav>
        <ul>
            <li><a href="index.html"> <img src="logo2.png"> </a></li>
            <li>
                <form action="recherche_produit.php" method="GET"><input type="search" placeholder="Search...">
                    <button type="submit">RECHERCHE</button>
                </form>
            </li>
            <li><a href="#categories">CATEGORIES</a></li>
            <li><a href="about.html">A PROPOS DE NOUS</a></li>
            <li><a href="account.html">CONNEXION</a></li>
            <li>
                <a id="cart" href="#" class="cart-icon">
                    <span class="cart-count">
                        <img src="panier1.png" class="img">
                        <span id="cart-counter">0</span> <!-- Compteur initialisé à 0 -->
                    </span>
                </a>
            <li><a href="admin.html">Espace Admin</a></li>
            </li>
        </ul>
    </nav>
<?php
session_start();


if(isset($_POST['id_produit'])) {
   
    $id_produit = $_POST['id_produit'];

    
    if(!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

   
    if (!in_array($id_produit, $_SESSION['panier'])) {
       
        $_SESSION['panier'][] = $id_produit;
    }

    
    header("Location: panier.php");
    exit();
}
?>


</body>
</html>