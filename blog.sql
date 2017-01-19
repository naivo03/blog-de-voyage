-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Janvier 2017 à 17:05
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES
(1, 'test1', 'gkjdfhgkdfhgf toto\r\npopo\r\nprincipe de boulot 2', '2017-01-19 16:02:24'),
(3, 'JP JP', 'lol toto\r\ntoto\r\npopo\r\ntoto\r\npopo', '2017-01-19 15:34:34'),
(4, 'nouveau 2', 'NOUVEAU nouveau2\r\ntoto\r\n\r\ntoto', '2017-01-19 15:34:23'),
(5, 'Mon titre par defaut', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '2017-01-08 19:29:06'),
(6, 'Mon titre par defaut', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', '2017-01-19 11:58:46'),
(7, 'MON TITRE', 'MON CONTENU', '2017-01-08 19:30:56'),
(8, 'Mon titre par defaut', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '2017-01-11 13:40:53'),
(9, 'mon titre', 'CONTENT\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\nrentrer de contenu ici', '2017-01-19 11:49:37'),
(11, 'article avec GET', 'ijsùqflhsjkhhslhgkj\r\nmqkshflqsmhfsldjf\r\nmkqsjflqmjsf', '2017-01-12 17:58:49'),
(12, 'GEt22222', '2eme articles ave GET', '2017-01-12 18:43:05'),
(13, '3eme artcles', 'khjhlgfldhjflhdslkfsgfgdj\r\nljflkdsqfjdshfkjsgdjfhksdjfljsdkhfsdj', '2017-01-12 18:44:03'),
(14, '4eme', 'iqjlhlbgksljfqlbsdfjkl\r\nkjsqflqsdjmfqsfmnqjklf\r\nksqjflqsmjfsdfhm', '2017-01-12 18:44:25'),
(16, 'test4 POSTJJJJJ', 'kuhjhfhbshjfhjsk\r\nlklkljkfmsdljfn\r\nlkmlkml\r\npopo', '2017-01-19 13:03:04'),
(17, 'test avec un user connecetre', 'jhkhjhjhkbhklkjm,\r\nluhlhljmoijkjml\r\nijmojmklùlùk', '2017-01-13 14:59:57'),
(18, 'test300000000000', 'avec insert() dans l''object article', '2017-01-13 15:27:17'),
(25, 'a', '&lt;SCRIPT LANGUAGE=&quot;JavaScript&quot;&gt;\r\ndocument.location.href=&quot;https://www.youtube.com/?gl=FR&amp;hl=fr&quot;\r\n&lt;/SCRIPT&gt;', '2017-01-13 19:54:43'),
(26, 'a', '&lt;SCRIPT LANGUAGE=&quot;JavaScript&quot;&gt;\r\ndocument.location.href=&quot;lol&quot;\r\n&lt;/SCRIPT&gt;', '2017-01-13 19:56:56'),
(29, 'lol', 'lal', '2017-01-13 20:03:27'),
(31, 'test popo nanani', 'toot propre test', '2017-01-17 14:13:37'),
(34, 'MON TITRE', 'MODIFICATION CONTENU 2eme fois', '2017-01-19 11:49:02'),
(35, 'article numero 39', 'voir si tout se passe bien a ce niveau', '2017-01-19 12:31:21'),
(36, 'nouvel article', 'bonjour ceci est un nouvel article', '2017-01-19 16:10:26');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `articleId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `content`, `articleId`, `userId`) VALUES
(1, 'ksdjlkflbsdjhk mjsqdfjlskhfj sdhfjkhsdf', 5, 25),
(2, 'testtets', 4, 25),
(3, 'pokpokk,lknkj', 4, 25),
(4, 'ddddd', 4, 25),
(5, 'popopopopopopopoopoppopopop', 7, 25),
(6, 'test', 3, 25),
(7, 'toto.php.html.exit', 3, 25),
(8, 'test commentaire pour voir le retour', 18, 25),
(9, 'test pour voir si ca passe ici', 5, 25),
(10, 'commentaire sur test', 17, 25),
(11, 'bonjour je rajoute uncomentaire\r\npoo', 3, 25),
(12, 'toto popo\r\nlolo', 8, 25),
(13, 'test commentaire\r\nen plus retour ligne toussa', 1, 25);

-- --------------------------------------------------------

--
-- Structure de la table `type_de_compte`
--

CREATE TABLE `type_de_compte` (
  `id` int(11) NOT NULL,
  `compte` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `type_de_compte`
--

INSERT INTO `type_de_compte` (`id`, `compte`) VALUES
(100, 'visiteur'),
(300, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `typeDeCompte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `password`, `typeDeCompte`) VALUES
(23, 'slouf', 'papa', 'papa@mel.com', 'izactest', 100),
(24, 'slouf', 'toky', 'toky@mel.com', 'izactest', 100),
(25, 'slouf', 'naivo', 'naivo@mel.com', 'izactest', 300),
(26, 'slouf', 'izac', 'sanda@mel.com', 'izactest', 100);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_de_compte`
--
ALTER TABLE `type_de_compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
