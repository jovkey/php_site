<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: interface.php");
    exit();
}
?>
<!DOCTYPE html class="overflow-x-hidden" >
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title>JOV-LIBRAIRIE</title>

    <style>
        :root {
            --pcolor: rgb(203,183,81);
            --scolor: #0b2347;
        }
    </style>
</head>

<body class="bg-[var(--scolor)] text-white overflow-x-hidden">

<header class="w-full bg-[var(--scolor)] shadow-lg py-4 px-6 flex items-center justify-between overflow-x-hidden">

    <!-- LOGO + TITRE -->
    <div class="flex items-center gap-4 flex-col">
        <img src="Jovkey-removebg-preview.png"
             class="w-20 transition-transform duration-300 hover:scale-125"
             alt="logo">
        <h1 class="text-3xl font-bold text-[var(--pcolor)] hover:text-white transition">
            <a href="index.php">JOV-LIBRAIRIE</a>
        </h1>
    </div>

    <!-- BOUTON HAMBURGER MOBILE -->
    <button id="menuBtn" class="md:hidden text-[var(--pcolor)] focus:outline-none">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" 
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- NAVIGATION -->
    <nav>
        <ul id="navMenu" class="hidden md:flex gap-6 text-lg font-semibold">
            <li><a class="text-[var(--pcolor)] hover:text-white transition hover:scale-110" href="index.php">Accueil</a></li>
            <li><a class="text-[var(--pcolor)] hover:text-white transition hover:scale-110" href="favoris.php">Favoris</a></li>
            <li><a class="text-[var(--pcolor)] hover:text-white transition hover:scale-110" href="emprunt.php">Emprunt</a></li>
            <li><a class="text-[var(--pcolor)] hover:text-white transition hover:scale-110" href="aide.php">Aide</a></li>
            <li><a class="text-[var(--pcolor)] hover:text-white transition hover:scale-110" href="contact.php">Contact</a></li>
            <li><a class="text-red-500 hover:text-white transition hover:scale-110" href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </nav>

</header>

<!-- SCRIPT TOGGLE MENU -->
<script>
    const menuBtn = document.getElementById('menuBtn');
    const navMenu = document.getElementById('navMenu');

    menuBtn.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
        navMenu.classList.toggle('flex');
        navMenu.classList.toggle('flex-col');
        navMenu.classList.toggle('items-start');
        navMenu.classList.toggle('gap-4');
        navMenu.classList.add('mt-4');
    });
</script>
 