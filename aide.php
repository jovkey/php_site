<?php
include "connexion.php";
include "header.php";

$message = "";

if (isset($_POST["ajout_livre"])) {
    $titre = mysqli_real_escape_string($Login, $_POST["titre"]);
    $auteur = mysqli_real_escape_string($Login, $_POST["auteur"]);
    $desc = mysqli_real_escape_string($Login, $_POST["description"]);
    $maison = mysqli_real_escape_string($Login, $_POST["maison"]);
    $nb = intval($_POST["nombre"]);

    $sql = "INSERT INTO livres (Titre, Auteur, description, Maison_d_edition, Nombre_exemplaires)
            VALUES ('$titre', '$auteur', '$desc', '$maison', $nb)";
    if (mysqli_query($Login, $sql)) {
        $message = "📘 Livre ajouté avec succès !";
    } else {
        $message = "❌ Erreur lors de l’ajout.";
    }
}
?>

<section id="aide" class="p-8 max-w-2xl mx-auto">

    <h2 class="text-3xl font-bold text-yellow-400 text-center mb-6">Ajouter un livre</h2>

    <?php if ($message): ?>
        <div class="mb-6 px-4 py-3 rounded-xl shadow 
            <?php if (str_starts_with($message, '📘')): ?>
                bg-green-600 text-white
            <?php else: ?>
                bg-red-600 text-white
            <?php endif; ?>
        ">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form method="post" onsubmit="return confirm('Confirmez-vous l’ajout de ce livre ?');"
          class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl p-6 shadow-lg text-white space-y-5">

        <input type="text" name="titre" placeholder="Titre" required
               class="w-full p-3 rounded-xl text-blue-900 outline-none">

        <input type="text" name="auteur" placeholder="Auteur" required
               class="w-full p-3 rounded-xl text-blue-900 outline-none">

        <textarea name="description" placeholder="Description"
                  class="w-full p-3 rounded-xl text-blue-900 outline-none h-32"></textarea>

        <input type="text" name="maison" placeholder="Maison d’édition"
               class="w-full p-3 rounded-xl text-blue-900 outline-none">

        <input type="number" name="nombre" min="1" value="1"
               class="w-full p-3 rounded-xl text-blue-900 outline-none">

        <button type="submit" name="ajout_livre"
                class="w-full py-3 bg-yellow-500 text-blue-900 font-semibold rounded-xl shadow hover:bg-yellow-400 transition">
            Ajouter le livre
        </button>
    </form>

</section>

<?php include "footer.php"; ?>
