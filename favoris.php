<?php
include "connexion.php";
include "header.php";

$user_id = $_SESSION['user_id'];
$message = "";

// Suppression d’un favori
if (isset($_POST["supprimer_favori"])) {
    $id = intval($_POST["id_favori"]);
    mysqli_query($Login, "DELETE FROM favoris WHERE Id = $id AND Id_utilisateur = $user_id");
    $message = "❌ Favori supprimé avec succès.";
}

// Modification d’un favori
if (isset($_POST["modifier_favori"])) {
    $id = intval($_POST['id_favori']);
    $titre = mysqli_real_escape_string($Login, $_POST['titre_perso']);
    $auteur = mysqli_real_escape_string($Login, $_POST['auteur_perso']);
    $note = intval($_POST['note']);
    $com = mysqli_real_escape_string($Login, $_POST['commentaire']);
    mysqli_query($Login, "UPDATE favoris SET Titre_perso='$titre', Auteur_perso='$auteur', Note=$note, Commentaire_TEXTE='$com' WHERE Id=$id AND Id_utilisateur=$user_id");
    $message = "✅ Favori modifié avec succès.";
}

// Liste des favoris
$favoris = mysqli_query($Login, "SELECT f.*, l.Titre, l.Auteur FROM favoris f JOIN livres l ON f.Id_livre=l.Id WHERE f.Id_utilisateur=$user_id");

// ID du favori en cours de modification
$id_modif = isset($_POST['editer']) ? intval($_POST['id_favori']) : 0;
?>

<section id="favoris" class="p-8 max-w-4xl mx-auto">

    <h2 class="text-3xl font-bold text-yellow-400 mb-6 text-center">📚 Mes favoris</h2>

    <?php if ($message): ?>
        <div class="bg-green-600 text-white px-4 py-3 rounded-xl mb-6 shadow-md text-center">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <ul class="space-y-6">
    <?php while ($fav = mysqli_fetch_assoc($favoris)): ?>
        
        <li class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl p-6 shadow-lg text-white">

            <strong class="text-xl text-yellow-400">
                <?= htmlspecialchars($fav['Titre_perso'] ?: $fav['Titre']) ?>
            </strong>  
            <span class="text-white/60">
                — <?= htmlspecialchars($fav['Auteur_perso'] ?: $fav['Auteur']) ?>
            </span>

            <!-- Boutons d'action -->
            <div class="mt-4 flex gap-4">

                <form method="post">
                    <input type="hidden" name="id_favori" value="<?= $fav['Id'] ?>">
                    <button type="submit" name="editer"
                        class="px-4 py-2 bg-yellow-500 text-blue-900 font-semibold rounded-xl shadow hover:bg-yellow-400 transition">
                         Modifier
                    </button>
                </form>

                <form method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce favori ?');">
                    <input type="hidden" name="id_favori" value="<?= $fav['Id'] ?>">
                    <button type="submit" name="supprimer_favori"
                        class="px-4 py-2 bg-red-600 text-white rounded-xl shadow hover:bg-red-500 transition">
                         Supprimer
                    </button>
                </form>

            </div>

            <?php if ($id_modif === intval($fav['Id'])): ?>

            <!-- Formulaire de modification -->
            <form method="post" class="mt-6 border-t border-white/20 pt-6 space-y-4">

                <input type="hidden" name="id_favori" value="<?= $fav['Id'] ?>">

                <input type="text" name="titre_perso"
                    value="<?= htmlspecialchars($fav['Titre_perso'] ?: $fav['Titre']) ?>"
                    placeholder="Titre personnalisé"
                    required
                    class="w-full p-3 rounded-xl text-blue-900 outline-none">

                <input type="text" name="auteur_perso"
                    value="<?= htmlspecialchars($fav['Auteur_perso'] ?: $fav['Auteur']) ?>"
                    placeholder="Auteur personnalisé"
                    required
                    class="w-full p-3 rounded-xl text-blue-900 outline-none">

                <input type="number" name="note"
                    value="<?= htmlspecialchars($fav['Note']) ?>"
                    min="0" max="10"
                    placeholder="Note (0-10)"
                    required
                    class="w-full p-3 rounded-xl text-blue-900 outline-none">

                <textarea name="commentaire" placeholder="Votre commentaire"
                    class="w-full p-3 rounded-xl text-blue-900 outline-none h-28"><?= htmlspecialchars($fav['Commentaire_TEXTE']) ?></textarea>

                <button type="submit" name="modifier_favori"
                    class="w-full py-3 bg-yellow-500 text-blue-900 font-semibold rounded-xl shadow hover:bg-yellow-400 transition">
                    💾 Enregistrer
                </button>

            </form>
            <?php endif; ?>

        </li>

    <?php endwhile; ?>
    </ul>
</section>

<?php include "footer.php"; ?>
