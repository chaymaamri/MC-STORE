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
                        <span id="cart-counter">0</span> 
                    </span>
                </a>
            <li><a href="admin.html">Espace Admin</a></li>
            </li>
        </ul>
    </nav>
<?php
session_start();

$produits = array(
    1 => array('nom' => 'Victoria Secret', 'prix' => 49),
    2 => array('nom' => 'Victoria Secret', 'prix' => 49),
    3 => array('nom' => 'Victoria Secret', 'prix' => 49),
    4 => array('nom' => 'Parfum Zara', 'prix' => 30),
    5 => array('nom' => 'GLOSS KIKO 103 & EYELINER KIKO', 'prix' => 30),
    6 => array('nom' => 'Victoria Secret', 'prix' => 49),
    7 => array('nom' => 'Défroisseur a main', 'prix' => 100),
    8 => array('nom' => 'handheld sewing machine', 'prix' => 30),
    9 => array('nom' => 'led mirror', 'prix' => 50)
);


if(!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}


if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
    $panier = $_SESSION['panier'];

    foreach ($panier as $id_produit) {
       
        if(isset($produits[$id_produit])) {
            echo "<div>";
            echo "<p>Nom du produit: " . $produits[$id_produit]['nom'] . "</p>";
            echo "<p>Prix: " . $produits[$id_produit]['prix'] . " DT</p>";
            echo "</div>";
        }
    }
} else {
    echo "<p>Votre panier est vide.</p>";
}
?>




</body>