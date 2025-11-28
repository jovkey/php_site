<?php
include "connexion.php";
include "header.php";

$user_id = $_SESSION['user_id'];
$messages = [];
$livresTrouves = [];

if (isset($_POST["recherche"])) {
    $motCle = mysqli_real_escape_string($Login, $_POST["motcle"]);
    $sql = "SELECT * FROM livres WHERE Titre LIKE '%$motCle%' OR Auteur LIKE '%$motCle%'";
    $result = mysqli_query($Login, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $livresTrouves = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $messages[] = "❌ Aucun livre trouvé pour '$motCle'.";
    }
}

if (isset($_POST["ajout_favori"])) {
    $idLivre = intval($_POST["id_livre"]);
    $check = mysqli_query($Login, "SELECT Id FROM livres WHERE Id = $idLivre");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($Login, "INSERT INTO favoris (Id_utilisateur, Id_livre, Date_ajout) VALUES ($user_id, $idLivre, NOW())");
        $messages[] = "✅ Livre ajouté à vos favoris.";
    } else {
        $messages[] = "⚠️ Ce livre n’existe pas.";
    }
}

if (isset($_POST["supprimer_livre"])) {
    $id = intval($_POST["id_livre"]);
    mysqli_query($Login, "DELETE FROM livres WHERE Id = $id");
    $messages[] = "📕 Livre supprimé avec succès.";
}
?>

<section class="min-h-screen py-20 px-8 bg-cover bg-center"
         style="background-image: url('accueil.jpg');">

    <div class="bg-[var(--scolor)] bg-opacity-80 max-w-3xl mx-auto rounded-xl p-10 shadow-xl">

        <h2 class="text-4xl text-center font-bold text-[var(--pcolor)] mb-6">Recherche de livres</h2>

        <p class="text-xl text-center mb-10">
            Bienvenue sur <strong class="text-[var(--pcolor)]">JOV-LIBRAIRIE</strong> — recherchez, découvrez, lisez.
        </p>

        <!-- FORMULAIRE -->
        <form method="post" class="flex flex-col gap-4">

            <input type="text" name="motcle"
                class="p-4 rounded-lg text-black placeholder-gray-600 border border-[var(--pcolor)]"
                placeholder="Titre ou Auteur..." required>

            <button type="submit" name="recherche"
                class="py-3 bg-[var(--pcolor)] text-[var(--scolor)] font-bold rounded-lg hover:bg-white hover:text-[var(--scolor)] transition">
                Rechercher
            </button>
        </form>

        <div class="text-center mt-8">
            <h1 class="text-2xl font-bold">Explorez tes livres extraordinaires</h1>
            <a href="wishlist.php" class="text-[var(--pcolor)] hover:text-white underline">AJOUTES UN LIVRE ET VOIT LE ICI..</a>
        </div>

        <!-- MESSAGES -->
        <?php foreach ($messages as $msg): ?>
            <div class="mt-6 p-4 bg-blue-100 text-blue-900 font-semibold rounded shadow">
                <?= htmlspecialchars($msg) ?>
            </div>
        <?php endforeach; ?>

        <!-- RESULTATS -->
        <?php if (!empty($livresTrouves)): ?>
            <h3 class="text-3xl font-bold text-center text-white mt-10 mb-4">Résultats :</h3>

            <table class="w-full bg-white text-black rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-[var(--pcolor)] text-[var(--scolor)]">
                    <tr>
                        <th class="p-3">Titre</th>
                        <th class="p-3">Auteur</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">Maison d'édition</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($livresTrouves as $livre): ?>
                    <tr class="border-b border-gray-300">
                        <td class="p-3"><?= htmlspecialchars($livre['Titre']) ?></td>
                        <td class="p-3"><?= htmlspecialchars($livre['Auteur']) ?></td>
                        <td class="p-3"><?= htmlspecialchars($livre['description']) ?></td>
                        <td class="p-3"><?= htmlspecialchars($livre['Maison_d_edition']) ?></td>

                        <td class="p-3 flex gap-2">

                            <form method="post">
                                <input type="hidden" name="id_livre" value="<?= $livre['Id'] ?>">
                                <button name="ajout_favori"
                                        class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-500">
                                    Ajouter
                                </button>
                            </form>

                            <form method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?');">
                                <input type="hidden" name="id_livre" value="<?= $livre['Id'] ?>">
                                <button name="supprimer_livre"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-500">
                                    Supprimer
                                </button>
                            </form>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</section>

<?php include "footer.php"; ?>
