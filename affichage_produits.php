<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MC STORE</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="logo.png">
    <script src="java.js"></script>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.html"> <img src="logo2.png" > </a></li>
            <li>
                <form action="recherche_produit.php" method="GET"><input type="search" placeholder="Search...">
                    <button type="submit" class="button">RECHERCHE</button></form>
            </li>
            <li><a href="#categories">CATEGORIES</a></li>
            <li><a href="about.html">A PROPOS DE NOUS</a></li>
            <li><a href="login.html">CONNEXION</a></li>
            <li><a id="cart" href="panier.html" class="cart-icon">
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
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "mc_db";

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}


$sql = "SELECT * FROM produits";
$resultat = mysqli_query($connexion, $sql);


if (mysqli_num_rows($resultat) > 0) {
    echo "<br><br><br><br><br><br>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prix</th><th>Description</th></tr>";
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . number_format($row["prix"],3,',','.') . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun produit trouvé.";
}

mysqli_close($connexion);
?>
</body>
