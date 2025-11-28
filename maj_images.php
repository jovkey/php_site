<?php
include "connexion.php"; // ta connexion MySQL

// Fonction pour trouver une image depuis Open Library
function trouverImage($titre, $auteur) {
    $titre = urlencode($titre);
    $auteur = urlencode($auteur);

    $url = "https://openlibrary.org/search.json?title=$titre&author=$auteur&limit=1";
    $json = file_get_contents($url);
    $data = json_decode($json, true);

    if (!empty($data['docs'][0]['cover_i'])) {
        $coverId = $data['docs'][0]['cover_i'];
        return "https://covers.openlibrary.org/b/id/$coverId-L.jpg";
    }
    return null; // Aucun résultat trouvé
}

// Récupération de tous les livres sans image
$sql = "SELECT Id, Titre, Auteur FROM livres WHERE image IS NULL OR image = ''";
$result = mysqli_query($Login, $sql);

if (!$result) {
    die("Erreur SQL : " . mysqli_error($Login));
}

$maj = 0;

while ($livre = mysqli_fetch_assoc($result)) {
    $imageUrl = trouverImage($livre['Titre'], $livre['Auteur']);

    if ($imageUrl) {
        $id = intval($livre['Id']);
        mysqli_query($Login, "UPDATE livres SET image = '$imageUrl' WHERE Id = $id");
        echo "✅ Image trouvée et mise à jour pour <b>{$livre['Titre']}</b><br>";
        $maj++;
    } else {
        echo "⚠️ Aucune image trouvée pour <b>{$livre['Titre']}</b><br>";
    }
}

echo "<hr><strong>$maj images mises à jour avec succès !</strong>";
?>
