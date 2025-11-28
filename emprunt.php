<?php
include "connexion.php";
include "header.php";

$user_id = $_SESSION['user_id'];
$message = "";

if (isset($_POST["emprunter"])) {
    $titre = mysqli_real_escape_string($Login, $_POST["nom_livre"]);
    $retour = $_POST["date_retour"];

    $res = mysqli_query($Login, "SELECT Id FROM livres WHERE Titre='$titre' LIMIT 1");
    if ($livre = mysqli_fetch_assoc($res)) {
        $id = $livre['Id'];
        $sql = "INSERT INTO listes_lectures (Id_lecteurs, Id_livres, Date_emprunt, Date_retour) VALUES ($user_id, $id, NOW(), '$retour')";
        if (mysqli_query($Login, $sql)) {
            $message = "✅ Livre emprunté avec succès !";
        } else {
            $message = "⚠️ Erreur d’enregistrement.";
        }
    } else {
        $message = "❌ Livre introuvable.";
    }
}
?>

<section id="emprunt" class="p-8 max-w-2xl mx-auto">

    <h2 class="text-3xl font-bold text-yellow-400 mb-6 text-center">📘 Emprunter un livre</h2>

    <?php if ($message): ?>
        <div class="mb-6 px-4 py-3 rounded-xl shadow 
            <?php if (str_starts_with($message, '✅')): ?>
                bg-green-600 text-white
            <?php elseif (str_starts_with($message, '❌')): ?>
                bg-red-600 text-white
            <?php else: ?>
                bg-blue-600 text-white
            <?php endif; ?>
        ">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form method="post" onsubmit="return confirm('Confirmer l’emprunt ?');"
          class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl p-6 shadow-lg text-white space-y-5">

        <input type="text" name="nom_livre" placeholder="Titre du livre" required
            class="w-full p-3 rounded-xl text-blue-900 outline-none">

        <input type="date" name="date_retour" required
            class="w-full p-3 rounded-xl text-blue-900 outline-none">

        <button type="submit" name="emprunter"
            class="w-full py-3 bg-yellow-500 text-blue-900 font-semibold rounded-xl shadow hover:bg-yellow-400 transition">
            📚 Emprunter
        </button>
    </form>

</section>

<?php include "footer.php"; ?>
