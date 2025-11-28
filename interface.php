<?php session_start(); ?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>JOV-LIBRAIRIE</title>
</head>

<body class="bg-gray-100 text-gray-900 overflow-x-hidden">

    <!-- ===== HEADER ===== -->
    <header class="bg-blue-900 text-white py-4 justify-between flex flex-col items-center md:flex-row md:justify-center gap-">
        <div class="bg-blue-900 text-white py-4 flex flex-col justify-between items-center md:flex-row md:justify-center gap-3">
            <img src="Jovkey-removebg-preview.png" alt="logo" class="w-28 md:w-40">

            <img src="OIP (6).webp" alt="livre" class="hidden md:block w-40 rounded-xl">

            <div class="flex gap-3 flex-col justify-center">
                <a href="#connexion" class="bg-blue-700 hover:bg-blue-800 px-5 py-2 rounded-full font-semibold">Connexion</a>
                <a href="#inscription" class="bg-blue-700 hover:bg-blue-800 px-5 py-2 rounded-full font-semibold">Inscription</a>
            </div>
        </div>
    </header>

    <!-- ===== CARROUSEL LIVRES ===== -->
    <section class="text-center py-10 bg-blue-950 my-10 mx-5 rounded-xl  overflow-x-hidden">
        <h2 class="text-white text-2xl font-bold mb-6">NOS LIVRES</h2>

        <div class="flex items-center justify-center gap-3 overflow-hidden max-w-full">
            <div class="clic1">
                <button class="text-white text-xl bg-blue-600 px-4 py-2 rounded clic1 shrink-0">PREC..</button>
            </div>

            <div class="livre flex-col items-center hidden">
                <img class="w-48 rounded-lg shadow" src="https://images-na.ssl-images-amazon.com/images/I/91uwocAMtSL._AC_UF894,1000_QL80_.jpg">
                <h2 class="text-white mt-2">L'Alchimiste</h2>
            </div>

            <div class="livre flex-col items-center hidden">
                <img class="w-48 rounded-lg shadow" src="https://images-na.ssl-images-amazon.com/images/I/81WcnNQ-TBL._AC_UF894,1000_QL80_.jpg">
                <h2 class="text-white mt-2">Harry Potter</h2>
            </div>

            <div class="livre flex-col items-center hidden">
                <img class="w-48 rounded-lg shadow" src="https://images-na.ssl-images-amazon.com/images/I/91p594CxSpL._AC_UF1000,1000_QL80_.jpg">
                <h2 class="text-white mt-2">Le Petit Prince</h2>
            </div>

            <div class="livre flex-col items-center hidden  overflow-x-hidden">
                <img class="w-48 rounded-lg shadow" src="https://covers.openlibrary.org/b/isbn/2070513289-L.jpg">
                <h2 class="text-white mt-2">1984</h2>
            </div>

            <div class="livre flex-col items-center hidden">
                <img class="w-48 rounded-lg shadow" src="https://covers.openlibrary.org/b/isbn/9780451525260-L.jpg">
                <h2 class="text-white mt-2">Les Misérables</h2>
            </div>

            <div class="livre flex-col items-center hidden">
                <img class="w-48 rounded-lg shadow" src="https://covers.openlibrary.org/b/isbn/9780451521231-L.jpg">
                <h2 class="text-white mt-2">Les Misérables</h2>
            </div>

            <div class="livre flex-col items-center hidden">
                <img class="w-48 rounded-lg shadow" src="https://covers.openlibrary.org/b/isbn/9782070584628-L.jpg">
                <h2 class="text-white mt-2">Harry Potter</h2>
            </div>

            <div class="clic2">
                <button class="text-white text-xl bg-blue-600 px-4 py-2 rounded clic1 shrink-0">SUIV..</button>
            </div>
        </div>
    </section>

    <!-- ===== GIF SECTION ===== -->
    <section class="relative h-[450px] overflow-hidden overflow-x-hidden">
        <img src="BIENVENUE.gif" class="absolute inset-0 w-full h-full object-fill max-w-full">

        <div class="absolute bottom-4 w-full text-center text-white backdrop-brightness-50 py-4">

            <button onclick="faisVoir('connex')" id="connexion"
                class="bg-blue-700 hover:bg-blue-800 px-5 py-2 rounded-full m-2">
                Connexion
            </button>

            <button onclick="faisVoir('inscri')" id="inscription"
                class="bg-blue-700 hover:bg-blue-800 px-5 py-2 rounded-full m-2">
                Inscription
            </button>

            <!-- FORMULAIRES -->
            <form id="recuperConnex" action="connecter.php" method="post"
                class="hidden mx-auto flex flex-col w-72 gap-3 mt-4">

                <input class="p-2 rounded border text-black placeholder-gray-500"
                    type="email" name="email" placeholder="Email" required>

                <input class="p-2 rounded border text-black placeholder-gray-500"
                    type="password" name="password" placeholder="Mot de passe" required>

                <button class="bg-yellow-600 hover:bg-yellow-500 text-white py-2 rounded " type="submit" name="login"> 
                    Se connecter
                </button>
            </form>


            <form id="recuperinscri" action="enregistrer.php" method="post"
                class="hidden mx-auto flex flex-col w-72 gap-3 mt-4">

                <input class="p-2 rounded border text-black placeholder-gray-500"
                    type="text" name="username" placeholder="Nom d'utilisateur" required>

                <input class="p-2 rounded border text-black placeholder-gray-500"
                    type="text" name="name" placeholder="Nom" required>

                <input class="p-2 rounded border text-black placeholder-gray-500"
                    type="email" name="email" placeholder="Email" required>

                <input class="p-2 rounded border text-black placeholder-gray-500"
                    type="password" name="password" placeholder="Mot de passe" required>
                <input class="p-2 rounded border text-black placeholder-gray-500"
                    type="password" name="password2" placeholder="retape le Mot de passe" required>


                <button class="bg-yellow-600 hover:bg-yellow-500 text-white py-2 rounded"
                    type="submit" name="register">
                    Je m'inscris
                </button>

            </form>

        </div>
    </section>

    <!-- ===== LIVRES SUPPLÉMENTAIRES ===== -->
    <h2 class="text-center text-blue-700 text-2xl font-bold my-6">Découvrez d'autres livres</h2>

    <section class="flex flex-wrap justify-center gap-8 p-6 bg-blue-900 rounded-xl mx-6">

        <?php
        // This block repeats, so it is left as static HTML as you wrote it.
        ?>

        <div class="book-card w-52 bg-blue-800 p-4 rounded-lg shadow text-white text-center">
            <img src="https://covers.openlibrary.org/b/isbn/9782070584628-L.jpg" class="rounded mb-2">
            <h3 class="font-bold text-lg">Harry Potter à l'école des sorciers</h3>
            <p class="text-sm opacity-80">J.K. Rowling — Début de la saga...</p>
        </div>

        <div class="book-card w-52 bg-blue-800 p-4 rounded-lg shadow text-white text-center">
            <img src="https://covers.openlibrary.org/b/isbn/9780451521231-L.jpg" class="rounded mb-2">
            <h3 class="font-bold text-lg">1984</h3>
            <p class="text-sm opacity-80">George Orwell — Dystopie...</p>
        </div>

        <div class="book-card w-52 bg-blue-800 p-4 rounded-lg shadow text-white text-center">
            <img src="https://covers.openlibrary.org/b/isbn/9780451525260-L.jpg" class="rounded mb-2">
            <h3 class="font-bold text-lg">Les Misérables</h3>
            <p class="text-sm opacity-80">Victor Hugo — Épopée sociale...</p>
        </div>

        <div class="book-card w-52 bg-blue-800 p-4 rounded-lg shadow text-white text-center">
            <img src="https://covers.openlibrary.org/b/isbn/9780062390622-L.jpg" class="rounded mb-2">
            <h3 class="font-bold text-lg">L'Alchimiste</h3>
            <p class="text-sm opacity-80">Paulo Coelho — Roman initiatique...</p>
        </div>

        <div class="book-card w-52 bg-blue-800 p-4 rounded-lg shadow text-white text-center">
            <img src="https://covers.openlibrary.org/b/isbn/2070513289-L.jpg" class="rounded mb-2">
            <h3 class="font-bold text-lg">Le Petit Prince</h3>
            <p class="text-sm opacity-80">Conte poétique...</p>
        </div>

    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-blue-900 text-white py-4 flex flex-col items-center md:flex-row md:justify-center gap-3">
        <div class="bg-blue-900 text-white py-4 flex flex-col items-center md:flex-row md:justify-center gap-3">
            <img src="Jovkey-removebg-preview.png" alt="logo" class="w-28 md:w-40">

            <img src="OIP (6).webp" alt="livre" class="hidden md:block w-40 rounded-xl">

            <div class="flex gap-3 flex-col justify-center">
                <a href="#connexion" class="bg-blue-700 hover:bg-blue-800 px-5 py-2 rounded-full font-semibold">Connexion</a>
                <a href="#inscription" class="bg-blue-700 hover:bg-blue-800 px-5 py-2 rounded-full font-semibold">Inscription</a>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script>
        function faisVoir(type) {
            const connex = document.getElementById("recuperConnex");
            const inscri = document.getElementById("recuperinscri");

            connex.classList.add("hidden");
            inscri.classList.add("hidden");

            if (type === "connex") connex.classList.remove("hidden");
            if (type === "inscri") inscri.classList.remove("hidden");
        }

        const slides = document.querySelectorAll(".livre");
        const prevBtn = document.querySelector(".clic1 button");
        const nextBtn = document.querySelector(".clic2 button");
        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach((slide) => slide.classList.add("hidden"));
            slides[index].classList.remove("hidden");
        }

        prevBtn.onclick = () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        };

        nextBtn.onclick = () => {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        };

        setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }, 3000);

        showSlide(currentIndex);
    </script>


</body>

</html>
<?php
if (isset($_SESSION["success"])) {
    echo "<p class='text-green-600 text-center font-semibold mt-4'>" . $_SESSION["success"] . "</p>";
    unset($_SESSION["success"]);
}
if (isset($_SESSION["error"])) {
    echo "<p class='text-red-600 text-center font-semibold mt-4'>" . $_SESSION["error"] . "</p>";
    unset($_SESSION["error"]);
}
?>