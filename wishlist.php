<?php
include "connexion.php";
include "header.php";

$user_id = $_SESSION['user_id'];
$message = "";

// Suppression d’un favori depuis wishlist
if (isset($_POST["supprimer_wishlist"])) {
    $id = intval($_POST["id_livre"]);
    mysqli_query($Login, "DELETE FROM favoris WHERE Id_livre = $id AND Id_utilisateur = $user_id");
    $message = "❌ Livre supprimé de la wishlist.";
}

// Modification d’un favori depuis wishlist
if (isset($_POST["modifier_wishlist"])) {
    $id = intval($_POST['id_livre']);
    $titre = mysqli_real_escape_string($Login, $_POST['titre_perso']);
    $auteur = mysqli_real_escape_string($Login, $_POST['auteur_perso']);
    mysqli_query($Login, "UPDATE favoris SET Titre_perso='$titre', Auteur_perso='$auteur' WHERE Id_livre=$id AND Id_utilisateur=$user_id");
    $message = "✅ Livre modifié dans la wishlist.";
}

// Récupération des favoris
$favoris = mysqli_query($Login, "SELECT f.*, l.Titre, l.Auteur, l.Image, l.Maison_d_edition 
                                 FROM favoris f 
                                 JOIN livres l ON f.Id_livre = l.Id 
                                 WHERE f.Id_utilisateur = $user_id");
?>

<section class="p-8 max-w-7xl mx-auto">

    <!-- Bouton toggle wishlist -->
    <div class="text-center mb-8">
        <button id="toggleWishlist"
            class="px-6 py-3 bg-yellow-500 text-blue-900 font-semibold rounded-xl shadow hover:bg-yellow-400 transition">
            📚 Afficher / Masquer ma Wishlist
        </button>
    </div>

    <?php if ($message): ?>
        <div class="mb-6 px-4 py-3 rounded-xl shadow 
            <?php if (str_starts_with($message, '✅')): ?>
                bg-green-600 text-white
            <?php else: ?>
                bg-red-600 text-white
            <?php endif; ?>
        ">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <!-- Wishlist Container -->
    <div id="wishlistContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 hidden">

        <?php while ($fav = mysqli_fetch_assoc($favoris)): ?>
            <div class="bg-white/10 backdrop-blur border border-white/20 rounded-2xl shadow-lg overflow-hidden flex flex-col">
                <img src="<?= htmlspecialchars($fav['Image'] ?: 'uploads/default_book.jpg') ?>"
                    alt="<?= htmlspecialchars($fav['Titre']) ?>"
                    class="h-64 w-full object-cover">

                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-yellow-400 mb-2">
                            <?= htmlspecialchars($fav['Titre_perso'] ?: $fav['Titre']) ?>
                        </h3>
                        <p class="text-white mb-1"><strong>Auteur :</strong> <?= htmlspecialchars($fav['Auteur_perso'] ?: $fav['Auteur']) ?></p>
                        <p class="text-white mb-3"><strong>Maison :</strong> <?= htmlspecialchars($fav['Maison_d_edition']) ?></p>
                    </div>

                    <!-- Actions: Modifier / Supprimer -->
                    <div class="flex flex-col gap-2 mt-auto">
                        <form method="post" class="flex flex-col gap-2">
                            <input type="hidden" name="id_livre" value="<?= $fav['Id_livre'] ?>">
                            <input type="text" name="titre_perso" placeholder="Titre personnalisé"
                                value="<?= htmlspecialchars($fav['Titre_perso'] ?: $fav['Titre']) ?>"
                                class="p-2 rounded-lg text-blue-900 outline-none">
                            <input type="text" name="auteur_perso" placeholder="Auteur personnalisé"
                                value="<?= htmlspecialchars($fav['Auteur_perso'] ?: $fav['Auteur']) ?>"
                                class="p-2 rounded-lg text-blue-900 outline-none">
                            <button type="submit" name="modifier_wishlist"
                                class="w-full py-2 bg-yellow-500 text-blue-900 font-semibold rounded-xl shadow hover:bg-yellow-400 transition">
                                ✏️ Modifier
                            </button>
                        </form>
                        <form method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce livre de la wishlist ?');">
                            <input type="hidden" name="id_livre" value="<?= $fav['Id_livre'] ?>">
                            <button type="submit" name="supprimer_wishlist"
                                class="w-full py-2 bg-red-600 text-white font-semibold rounded-xl shadow hover:bg-red-500 transition">
                                🗑 Supprimer
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        <?php endwhile; ?>

    </div>
</section>

<script>
    const toggleBtn = document.getElementById('toggleWishlist');
    const wishlist = document.getElementById('wishlistContainer');

    toggleBtn.addEventListener('click', () => {
        wishlist.classList.toggle('hidden');
        wishlist.scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>

<?php include "footer.php"; ?>