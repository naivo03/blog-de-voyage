-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 14 Janvier 2017 à 00:07
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
(1, 'test1', 'gkjdfhgkdfhgf', '2017-01-19 00:00:00'),
(3, 'JPJP', 'lol', '2017-01-08 19:22:21'),
(4, 'nouveau', 'NOUVEAU', '2017-01-11 22:50:17'),
(5, 'Mon titre par defaut', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '2017-01-08 19:29:06'),
(6, 'Mon titre par defaut', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '2017-01-08 19:30:19'),
(7, 'MON TITRE', 'MON CONTENU', '2017-01-08 19:30:56'),
(8, 'Mon titre par defaut', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '2017-01-11 13:40:53'),
(9, 'mon titre', 'CONTENT', '2017-01-11 22:00:12'),
(11, 'article avec GET', 'ijsùqflhsjkhhslhgkj\r\nmqkshflqsmhfsldjf\r\nmkqsjflqmjsf', '2017-01-12 17:58:49'),
(12, 'GEt22222', '2eme articles ave GET', '2017-01-12 18:43:05'),
(13, '3eme artcles', 'khjhlgfldhjflhdslkfsgfgdj\r\nljflkdsqfjdshfkjsgdjfhksdjfljsdkhfsdj', '2017-01-12 18:44:03'),
(14, '4eme', 'iqjlhlbgksljfqlbsdfjkl\r\nkjsqflqsdjmfqsfmnqjklf\r\nksqjflqsmjfsdfhm', '2017-01-12 18:44:25'),
(15, 'testtPOST', 'hhhlkhfdlsbhfkjsd\r\nlksjdfkjsdlfksdlf\r\ns!lkjfsdklfk', '2017-01-12 18:53:05'),
(16, 'test4 POSTJJJJJ', 'kuhjhfhbshjfhjsk\r\nlklkljkfmsdljfn\r\nlkmlkml', '2017-01-12 18:54:00'),
(17, 'test avec un user connecetre', 'jhkhjhjhkbhklkjm,\r\nluhlhljmoijkjml\r\nijmojmklùlùk', '2017-01-13 14:59:57'),
(18, 'test300000000000', 'avec insert() dans l''object article', '2017-01-13 15:27:17'),
(19, 'aa', 'a', '2017-01-13 19:34:29'),
(25, 'a', '&lt;SCRIPT LANGUAGE=&quot;JavaScript&quot;&gt;\r\ndocument.location.href=&quot;https://www.youtube.com/?gl=FR&amp;hl=fr&quot;\r\n&lt;/SCRIPT&gt;', '2017-01-13 19:54:43'),
(26, 'a', '&lt;SCRIPT LANGUAGE=&quot;JavaScript&quot;&gt;\r\ndocument.location.href=&quot;lol&quot;\r\n&lt;/SCRIPT&gt;', '2017-01-13 19:56:56'),
(27, '', '', '2017-01-13 20:01:06'),
(28, 'lol', 'lal', '2017-01-13 20:01:49'),
(29, 'lol', 'lal', '2017-01-13 20:03:27');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `password`) VALUES
(2, 'izac', 'slouf', 'babac@mel.com', 'izactest'),
(3, 'sanda', 'slouf', 'toesae@mel.com', 'tokyslouf');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
