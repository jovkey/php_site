<?php
include "connexion.php";
include "header.php";

$message = "";

if (isset($_POST["contact"])) {
    $nom = mysqli_real_escape_string($Login, $_POST["nom"]);
    $email = mysqli_real_escape_string($Login, $_POST["email"]);
    $texte = mysqli_real_escape_string($Login, $_POST["message"]);

    $sql = "INSERT INTO contact (Nom, Email, Message, Date_envoi)
            VALUES ('$nom', '$email', '$texte', NOW())";
    if (mysqli_query($Login, $sql)) {
        $message = "💬 Merci $nom ! Votre message a bien été envoyé.";
    } else {
        $message = "⚠️ Erreur lors de l’envoi.";
    }
}
?>

<section id="contact" class="p-8 max-w-2xl mx-auto">

    <h2 class="text-3xl font-bold text-yellow-400 text-center mb-6">
        Contactez-nous
    </h2>

    <?php if ($message): ?>
        <div class="mb-6 px-4 py-3 rounded-xl shadow 
            <?php if (str_starts_with($message, '💬')): ?>
                bg-green-600 text-white
            <?php else: ?>
                bg-red-600 text-white
            <?php endif; ?>
        ">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form method="post" onsubmit="return confirm('Envoyer ce message ?');"
          class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl p-6 shadow-lg text-white space-y-5">

        <input type="text" name="nom" placeholder="Votre nom" required
               class="w-full p-3 rounded-xl text-blue-900 outline-none">

        <input type="email" name="email" placeholder="Votre email" required
               class="w-full p-3 rounded-xl text-blue-900 outline-none">

        <textarea name="message" placeholder="Votre message..." required
                  class="w-full p-3 rounded-xl text-blue-900 h-40 rounded-xl outline-none"></textarea>

        <button type="submit" name="contact"
                class="w-full py-3 bg-yellow-500 text-blue-900 font-semibold rounded-xl shadow hover:bg-yellow-400 transition">
            ✉️ Envoyer
        </button>
    </form>

</section>

<?php include "footer.php"; ?>
