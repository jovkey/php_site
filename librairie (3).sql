-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 29 nov. 2025 à 00:10
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `librairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `Date_envoi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`Id`, `Nom`, `Email`, `Message`, `Date_envoi`) VALUES
(1, 'joosuer', 'jovkey@gmail.com', 'zlkjklejfklfj', '2025-11-25 19:27:27');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `Id` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_livre` int(11) NOT NULL,
  `Titre_perso` varchar(255) NOT NULL,
  `Auteur_perso` varchar(255) NOT NULL,
  `Note` int(11) NOT NULL,
  `Commentaire_TEXTE` text NOT NULL,
  `Date_ajout` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`Id`, `Id_utilisateur`, `Id_livre`, `Titre_perso`, `Auteur_perso`, `Note`, `Commentaire_TEXTE`, `Date_ajout`) VALUES
(18, 3, 2, '', '', 0, '', '2025-10-03 19:25:17'),
(22, 1, 4, '', '', 0, '', '2025-10-07 22:42:35'),
(44, 12, 2, '', '', 0, '', '2025-11-25 19:17:37'),
(45, 12, 4, '', '', 0, '', '2025-11-25 19:18:16'),
(46, 12, 16, '', '', 0, '', '2025-11-25 19:18:27'),
(47, 12, 23, '', '', 0, '', '2025-11-25 19:18:43'),
(48, 12, 20, '', '', 0, '', '2025-11-25 19:18:57'),
(49, 12, 21, '', '', 0, '', '2025-11-25 19:19:29'),
(50, 12, 26, '', '', 0, '', '2025-11-25 19:19:42'),
(51, 12, 1, '', '', 0, '', '2025-11-25 19:19:53'),
(52, 12, 3, '', '', 0, '', '2025-11-25 19:20:01'),
(53, 12, 6, '', '', 0, '', '2025-11-25 19:20:12'),
(54, 12, 8, '', '', 0, '', '2025-11-25 19:20:21'),
(55, 12, 17, '', '', 0, '', '2025-11-25 19:20:33'),
(56, 12, 16, '', '', 0, '', '2025-11-25 19:20:45'),
(57, 12, 18, '', '', 0, '', '2025-11-25 19:22:22'),
(58, 12, 11, 'Critique de la raison pure', 'Immanuel Ka', 5, 'klsjdofklfjls', '2025-11-25 19:24:14');

-- --------------------------------------------------------

--
-- Structure de la table `lecteurs`
--

CREATE TABLE `lecteurs` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenoms` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `listes_lectures`
--

CREATE TABLE `listes_lectures` (
  `Id` int(11) NOT NULL,
  `Id_lecteurs` int(11) NOT NULL,
  `Id_livres` int(11) NOT NULL,
  `Date_emprunt` datetime DEFAULT current_timestamp(),
  `Date_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `listes_lectures`
--

INSERT INTO `listes_lectures` (`Id`, `Id_lecteurs`, `Id_livres`, `Date_emprunt`, `Date_retour`) VALUES
(1, 1, 5, '2025-10-02 12:47:46', '2025-10-02'),
(2, 1, 7, '2025-10-03 16:52:44', '2025-03-25'),
(3, 1, 5, '2025-10-03 18:03:53', '2025-11-25'),
(4, 1, 1, '2025-10-03 18:19:21', '2262-05-06'),
(5, 1, 1, '2025-10-03 18:20:25', '2262-05-06'),
(6, 1, 1, '2025-10-03 19:51:45', '2262-05-06'),
(7, 12, 26, '2025-11-25 19:25:32', '2025-11-30');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `Id` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Auteur` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `Maison_d_edition` varchar(255) DEFAULT NULL,
  `Nombre_exemplaires` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`Id`, `Titre`, `Auteur`, `image`, `description`, `Maison_d_edition`, `Nombre_exemplaires`) VALUES
(1, 'L\'Étranger', 'Albert Camus', 'https://covers.openlibrary.org/b/id/13151269-L.jpg', 'Un homme détaché face à l\'absurdité de la vie.', 'Gallimard', 8),
(2, 'Les Misérables', 'Victor Hugo', 'https://covers.openlibrary.org/b/id/12721865-L.jpg', 'Une fresque sociale et historique sur la misère et la rédemption.', 'Hachette', 5),
(3, 'Madame Bovary', 'Gustave Flaubert', 'https://covers.openlibrary.org/b/id/12993424-L.jpg', 'Le destin tragique d\'une femme en quête d\'évasion.', 'Michel Lévy', 45),
(4, 'Le Rouge et le Noir', 'Stendhal', 'https://covers.openlibrary.org/b/id/8231413-L.jpg', 'L\'ambition et les passions d\'un jeune homme en province.', 'Levavasseur', 63),
(5, 'La Peste', 'Albert Camus', 'https://covers.openlibrary.org/b/id/13151272-L.jpg', 'Une ville frappée par une épidémie symbolisant la résistance humaine.', 'Gallimard', 10),
(6, 'Dune', 'Frank Herbert', 'https://covers.openlibrary.org/b/id/11481354-L.jpg', 'La lutte pour le contrôle de l\'Épice sur la planète Arrakis.', 'Chilton Books', 25),
(7, '1984', 'George Orwell', 'https://covers.openlibrary.org/b/id/8745958-L.jpg', 'Un futur dystopique sous surveillance totale.', 'Secker & Warburg', 3),
(8, 'Fahrenheit 451', 'Ray Bradbury', 'https://covers.openlibrary.org/b/id/12993656-L.jpg', 'Une société où les livres sont interdits et brûlés.', 'Ballantine Books', 58),
(9, 'Fondation', 'Isaac Asimov', 'https://covers.openlibrary.org/b/id/13110557-L.jpg', 'Un empire galactique et une science prédictive appelée psychohistoire.', 'Gnome Press', 8),
(10, 'Neuromancien', 'William Gibson', 'https://covers.openlibrary.org/b/id/14596092-L.jpg', 'Un classique du cyberpunk explorant l\'intelligence artificielle.', 'Ace Books', 78),
(11, 'Critique de la raison pure', 'Immanuel Kant', 'https://covers.openlibrary.org/b/id/2476174-L.jpg', 'Une œuvre fondatrice de la philosophie moderne.', 'Felix Meiner', 7),
(12, 'Ainsi parlait Zarathoustra', 'Friedrich Nietzsche', NULL, 'Un texte poétique et philosophique sur le surhomme.', 'Ernst Schmeitzner', 9),
(14, 'Discours de la méthode', 'René Descartes', 'https://covers.openlibrary.org/b/id/8236442-L.jpg', 'Les fondements du rationalisme moderne.', 'Jan Maire', 9),
(15, 'La République', 'Platon', 'https://covers.openlibrary.org/b/id/14409329-L.jpg', 'Un texte sur la justice et l\'organisation idéale de la cité.', 'Oxford', 5),
(16, 'Les 7 habitudes de ceux qui réalisent tout ce qu\'ils entreprennent', 'Stephen R. Covey', 'https://covers.openlibrary.org/b/id/13128111-L.jpg', 'Un guide pratique pour l’efficacité personnelle.', 'Free Press', 45),
(17, 'Pouvoir illimité', 'Anthony Robbins', NULL, 'Développer son potentiel grâce à la PNL.', 'Simon & Schuster', 25),
(18, 'Réfléchissez et devenez riche', 'Napoleon Hill', NULL, 'Un classique sur la réussite et la richesse.', 'The Ralston Society', 9),
(19, 'L\'art de la méditation', 'Matthieu Ricard', 'https://covers.openlibrary.org/b/id/9439506-L.jpg', 'Une introduction claire à la méditation.', 'Pocket', 85),
(20, 'Les Quatre Accords toltèques', 'Don Miguel Ruiz', 'https://covers.openlibrary.org/b/id/993105-L.jpg', 'Un guide de sagesse pratique.', 'Amber-Allen Publishing', 6),
(21, 'Code: The Hidden Language of Computer Hardware and Software', 'Charles Petzold', NULL, 'Une plongée dans la logique des ordinateurs.', 'Microsoft Press', 58),
(22, 'Structure et interprétation des programmes informatiques', 'Harold Abelson & Gerald Jay Sussman', NULL, 'Un classique de l’informatique théorique.', 'MIT Press', 63),
(23, 'Clean Code', 'Robert C. Martin', 'https://covers.openlibrary.org/b/id/8065615-L.jpg', 'Comment écrire un code clair et maintenable.', 'Prentice Hall', 21),
(24, 'Introduction à l’algorithmique', 'Thomas H. Cormen', 'https://covers.openlibrary.org/b/id/3084692-L.jpg', 'Un manuel complet sur les algorithmes.', 'MIT Press', 20),
(25, 'Design Patterns', 'Erich Gamma et al.', NULL, 'Des solutions éprouvées aux problèmes récurrents en programmation.', 'Addison-Wesley', 12),
(26, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'https://covers.openlibrary.org/b/id/10708272-L.jpg', 'Ce conte poétique raconte l’histoire d’un petit garçon venant d’une autre planète, qui voyage de planète en planète et découvre les différentes facettes de la vie et de la nature humaine. C’est un récit à la fois philosophique et accessible aux enfants, avec des illustrations originales de l’auteur.', 'Gallimard Jeunesse', 58),
(28, 'HGLSDNHFJLDH', 'HBQLKHDFKJQS', NULL, 'DHGFHGQLHIDF', 'YQIGIUF', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenoms` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `Contact` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id`, `Nom`, `Prenoms`, `Email`, `mot_de_passe`, `Contact`) VALUES
(1, 'jovkey', 'BRUCE Christian', 'jovkeyb@gmail.com', '$2y$10$Kwb3v4G7SXs0/Y7c/E21CusWDEPwBZmS26DBIuQSx1/ioqjyiAugy', NULL),
(2, 'yehouessi1', 'valdor yehouessi', 'yehouessivaldor7@gmail.com', '$2y$10$yojtVJZF5ZBEY/F2m1pFf.B8JtuL6VwlvD/oEwz.v1EWqaOmJqBV6', NULL),
(3, 'jovkey', 'bruce klee', 'jovkeyteam@gmail.com', '$2y$10$Gosk4xY7Ej2tGK1EsCXk7ODXIi6jqNxZVnifucOBlJnhRqWX923m6', NULL),
(4, 'jovkey', 'bruce klee', '7jovkey@gmail.com', '$2y$10$dmyFkYkaY0QK8lNMZOsVnuryDyPAQXZ5rxcqm9z0RVK3TQBmndauO', NULL),
(6, 'jov', 'jfvbnbj', 'jovkeybruce@gmail.com', '$2y$10$houiAnrflP.HAlwX9s7yOerKjcl4niA4ivZefsMtL.edQArVYgdGS', NULL),
(8, 'chris', 'uhjghjg', '7jovkeyb@gmail.com', '$2y$10$cGTGEyl9MDpjP7m4xdAYZOd6pPkbtD60iyFIstS7HXQ0ylplfi4Ay', NULL),
(9, 'jov', 'gaston', 'jojo@gmail.com', '$2y$10$yAJmSCPiujCLaHCYQroT3epezTyTZKb4G6Mvl4oVrciUW0lxQLTKi', NULL),
(10, 'jov', 'zdfrg', 'ahlibaltassar@gmail.com', '$2y$10$gtJNY4y8QXH.Cy0roerIcuAcWX3f3sKFAEjZrnEuyvMC/XgNPpcJC', NULL),
(11, 'jovo', 'job', 'lidaso@gmail.com', '$2y$10$Bdoz3XmuXtVmfT.UEqjiRelToDkaI1cvI.g2Qb/SAeZevT4hv4Wgy', NULL),
(12, 'christianbruce67', 'lok', 'christianbruce67@gmail.com', '$2y$10$wOrq.5TY4wjy5X3OdHEVF.ajYgG.vSBoY6stUT9bWKdt7VLQmyTFq', NULL),
(13, 'chriss', 'BRUCE', 'chris@gmail.com', '$2y$10$ka7LG3Kqqn3MhRXzs5CVI.Uh9VkHTcQhQuc31ybztRHEgPdaQEVNm', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`),
  ADD KEY `Id_livre` (`Id_livre`);

--
-- Index pour la table `lecteurs`
--
ALTER TABLE `lecteurs`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `listes_lectures`
--
ALTER TABLE `listes_lectures`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_lecteur` (`Id_lecteurs`),
  ADD KEY `Id_livre` (`Id_livres`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `lecteurs`
--
ALTER TABLE `lecteurs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `listes_lectures`
--
ALTER TABLE `listes_lectures`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateurs` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`Id_livre`) REFERENCES `livres` (`Id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `listes_lectures`
--
ALTER TABLE `listes_lectures`
  ADD CONSTRAINT `listes_lectures_ibfk_1` FOREIGN KEY (`Id_lecteurs`) REFERENCES `utilisateurs` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `listes_lectures_ibfk_2` FOREIGN KEY (`Id_livres`) REFERENCES `livres` (`Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
