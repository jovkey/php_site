<?php
include "connexion.php";
include "header.php";

if (!isset($_GET['id'])) {
    echo "<div class='container mt-5 text-center text-danger'>Aucun livre sélectionné.</div>";
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($Login, "SELECT * FROM livres WHERE Id = $id");
$livre = mysqli_fetch_assoc($result);

if (!$livre) {
    echo "<div class='container mt-5 text-center text-danger'>Livre introuvable.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($livre['Titre']) ?> - JOV-LIBRAIRIE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f8f9fa;">
<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <?php if (!empty($livre['Image'])): ?>
                    <img src="uploads/<?= htmlspecialchars($livre['Image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($livre['Titre']) ?>" style="height:400px; object-fit:cover;">
                <?php endif; ?>

                <div class="card-body">
                    <h3 class="card-title fw-bold text-primary"><?= htmlspecialchars($livre['Titre']) ?></h3>
                    <p class="card-text"><strong>Auteur :</strong> <?= htmlspecialchars($livre['Auteur']) ?></p>
                    <p class="card-text"><strong>Maison d’édition :</strong> <?= htmlspecialchars($livre['Maison_d_edition']) ?></p>
                    <hr>
                    <p class="card-text"><?= nl2br(htmlspecialchars($livre['description'])) ?></p>
                    <div class="mt-4 text-center">
                        <a href="wishlist.php" class="btn btn-secondary">← Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

<?php include "footer.php"; ?>
