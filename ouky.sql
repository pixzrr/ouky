-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2025 at 10:30 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ouky`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
CREATE TABLE IF NOT EXISTS `catalogue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `synopsis` varchar(2000) DEFAULT NULL,
  `logo` varchar(1000) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`id`, `nom`, `type`, `year`, `author`, `synopsis`, `logo`, `category`) VALUES
(55, 'Les Simpson', 'serie', 1989, 'Matt Groening', 'Les Simpson, famille américaine moyenne, vivent à Springfield. Homer, le père, a deux passions : regarder la télé et boire des bières. Mais son quotidien est rarement reposant, entre son fils Bart qui fait toutes les bêtises possibles, sa fille Lisa qui est une surdouée, ou encore sa femme Marge qui ne supporte pas de le voir se soûler à longueur de journée.', '39267d8b4744d52252de8eb79acffc58-250406_043612.jpg', 'Comédie'),
(52, 'Inception', 'movie', 2014, 'jsp', 'sadsadasd', 'inception-250328_081506.webp', 'Science-fiction'),
(54, 'Interstellar', 'movie', 2014, 'Christopher Nolan', 'Le film raconte les aventures d’un groupe d’explorateurs qui utilisent une faille récemment découverte dans l’espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire. ', 'interstellar-d5hpgadclxszmpeh-250405_115445.jpg', 'Science-fiction'),
(56, 'Silo', 'serie', 2023, 'Hugh Howey', 'Silo raconte l’histoire des dix mille derniers habitants de la Terre, qui vivent à un kilomètre sous la surface pour se protéger d&#039;un monde toxique et mortel. Cependant, personne ne sait quand ni pourquoi le silo a été construit, et quiconque essaie de percer ce secret risque sa vie. Rebecca Ferguson incarne Juliette, une ingénieure cherchant à élucider le meurtre d’un proche, qui se retrouve face à un mystère aux profondeurs insoupçonnées. Parfois, la vérité est plus dangereuse que le mensonge.', 'Silo_Photo_021007.jpg.photo_modal_show_home_large-250406_055239.jpg', 'Science-fiction'),
(57, 'Severance', 'serie', 2022, 'Dan Erickson', 'Mark Scout travaille pour Lumon Industries, où il dirige une équipe dont les employés subissent une opération chirurgicale de séparation entre leurs souvenirs liés à leur vie professionnelle et ceux liés à leur vie privée. Cette expérience risquée de l’équilibre entre travail et vie personnelle est remise en cause lorsque Mark se retrouve au cœur d’un mystère qui le forcera à affronter la vraie nature de son travail… et la sienne.', '2489747-3200x1800-desktop-hd-severance-tv-series-wallpaper-250408_084207.jpg', 'Thriller'),
(58, 'Arcane', 'serie', 2021, 'Alex Yee, Christian &quot;Praeco&quot; Linke', 'Championnes de leurs villes jumelles et rivales, deux sœurs se battent dans une guerre où font rage des technologies magiques et des perspectives diamétralement opposées.', 'arcane-250408_084954.png', 'Action'),
(59, 'Breaking Bad', 'serie', 2008, 'Vince Gilligan', 'Walter White, 50 ans, est professeur de chimie dans un lycée du Nouveau-Mexique. Pour subvenir aux besoins de Skyler, sa femme enceinte, et de Walt Junior, son fils handicapé, il est obligé de travailler doublement. Son quotidien déjà morose devient carrément noir lorsqu\'il apprend qu\'il est atteint d\'un incurable cancer des poumons. Les médecins ne lui donnent pas plus de deux ans à vivre. Pour réunir rapidement beaucoup d\'argent afin de mettre sa famille à l\'abri, Walter ne voit plus qu\'une solution : mettre ses connaissances en chimie à profit pour fabriquer et vendre du crystal meth.', 'breakingbad-250408_085122.jpg', 'Drame'),
(60, 'Kamelott', 'serie', 2005, ' Alexandre Astier, Alain Kappauf, Jean-Yves Robin', 'Le quotidien banal et burlesque du roi Arthur et des chevaliers de la Table ronde : quête du Graal, repas en famille et stratégie militaire.', 'kamelott-250408_090241.png', 'Comédie'),
(61, 'Le Hobbit : un voyage inattendu', 'movie', 2012, 'Peter Jackson', 'Dans UN VOYAGE INATTENDU, Bilbon Sacquet cherche à reprendre le Royaume perdu des Nains d&#039;Erebor, conquis par le redoutable dragon Smaug. Alors qu&#039;il croise par hasard la route du magicien Gandalf le Gris, Bilbon rejoint une bande de 13 nains dont le chef n&#039;est autre que le légendaire guerrier Thorin Écu-de-Chêne.', 'hobbit-250408_090600.jpg', 'Aventure'),
(62, 'Là-haut', 'movie', 2009, ' Pete Docter, Bob Peterson ', 'Carl Fredricksen, un vendeur de ballons à la retraite, est prêt pour sa dernière chance de s’envoler. Il attache des milliers de ballons à sa maison et se dirige vers le monde perdu de ses rêves d’enfant. Mais, à son insu, Carl embarque Russell, un garçon de 8 ans là au mauvais endroit au mauvais moment. Ce duo improbable va se faire de nouveaux amis, comme Doug, un chien avec un collier spécial qui lui permet de parler, et Kevin, un oiseau qui ne peut pas voler. Carl réalise vite que les plus grandes aventures de la vie ne sont pas celles qu’on croit.', 'up-250408_092102.jpg', 'Famille'),
(63, 'Wall-E', 'movie', 2008, 'Andrew Stanton ', '700 ans plus tôt, l&#039;humanité a déserté notre planète laissant à cette incroyable petite machine le soin de nettoyer la Terre. Mais au bout de ces longues années, WALL•E a développé un petit défaut technique : une forte personnalité. Extrêmement curieux, très indiscret, il est surtout un peu trop seul...\r\n\r\nCependant, sa vie s&#039;apprête à être bouleversée avec l&#039;arrivée d&#039;une petite &quot;robote&quot;, bien carénée et prénommée EVE.', 'walle-250408_092304.jpg', 'Famille'),
(64, 'Simetiére', 'movie', 2019, 'Parker Finn', 'Après avoir été témoin d&#039;un incident traumatisant impliquant l’une de ses patientes, la vie de la psychiatre Rose Cotter tourne au cauchemar. Terrassée par une force mystérieuse, Rose va devoir se confronter à son passé pour tenter de survivre…', 'smile-250408_093017.jpg', 'Horreur');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_catalogue` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `id_user`, `id_catalogue`) VALUES
(5, 31, 54),
(12, 31, 56),
(17, 33, 55),
(9, 2, 56),
(18, 35, 55),
(21, 37, 55),
(23, 35, 62),
(24, 35, 57);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `admin`) VALUES
(2, 'aryth', 'qwertyuiopasdfg', NULL),
(31, 'test', 'test', NULL),
(33, 'admin', 'admin', 1),
(35, 'Gabriel', 'Gabriel123', 1),
(36, 'Julien', 'Julien12345', 1),
(37, 'Chayan', 'Chayan12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

DROP TABLE IF EXISTS `view`;
CREATE TABLE IF NOT EXISTS `view` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_catalogue` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`id`, `id_user`, `id_catalogue`) VALUES
(1, 37, 55),
(2, 37, 55),
(3, 37, 56),
(4, 37, 56),
(5, 35, 55),
(6, 35, 56),
(7, 35, 55),
(8, 35, 55),
(9, 35, 55),
(10, 35, 60),
(11, 35, 54),
(12, 35, 56),
(13, 35, 56),
(14, 35, 55),
(15, 35, 63);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
