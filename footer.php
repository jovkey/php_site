<footer class="w-full bg-[var(--scolor)] text-white py-8 px-6 mt-10 shadow-inner overflow-x-hidden">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">

        <!-- Logo + Titre -->
        <div class="flex items-center gap-4">
            <img src="Jovkey-removebg-preview.png" alt="logo" class="w-16 md:w-20">
            <h2 class="text-2xl md:text-3xl font-bold text-[var(--pcolor)]">
                <a href="index.php" class="hover:text-white transition">JOV-LIBRAIRIE</a>
            </h2>
        </div>

        <!-- Navigation Footer -->
        <nav>
            <ul class="flex flex-col md:flex-row gap-4 md:gap-6 text-lg font-semibold text-center">
                <li><a class="hover:text-[var(--pcolor)] transition" href="index.php">Accueil</a></li>
                <li><a class="hover:text-[var(--pcolor)] transition" href="favoris.php">Favoris</a></li>
                <li><a class="hover:text-[var(--pcolor)] transition" href="emprunt.php">Emprunt</a></li>
                <li><a class="hover:text-[var(--pcolor)] transition" href="aide.php">Aide</a></li>
                <li><a class="hover:text-[var(--pcolor)] transition" href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>

    <!-- Copyright -->
    <div class="mt-6 text-center text-white/60 text-sm md:text-base">
        &copy; <?= date("Y") ?> JOV-LIBRAIRIE. Tous droits réservés.
    </div>
</footer>
