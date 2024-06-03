-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2024 at 01:48 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pi`
--

-- --------------------------------------------------------

--
-- Table structure for table `emprent`
--

DROP TABLE IF EXISTS `emprent`;
CREATE TABLE IF NOT EXISTS `emprent` (
  `id_emprent` int NOT NULL AUTO_INCREMENT,
  `matricule` int DEFAULT NULL,
  `id_livre` int DEFAULT NULL,
  `date_retour_prevus` date DEFAULT NULL,
  `date_retour_reel` date DEFAULT NULL,
  `date_emprunt` date DEFAULT NULL,
  PRIMARY KEY (`id_emprent`),
  KEY `matricule` (`matricule`),
  KEY `id_livre` (`id_livre`)
)
--
-- Dumping data for table `emprent`
--

INSERT INTO `emprent` (`id_emprent`, `matricule`, `id_livre`, `date_retour_prevus`, `date_retour_reel`, `date_emprunt`) VALUES
(11, 23031, 3, '2024-05-08', '2024-05-01', '0000-00-00'),
(10, 23031, 34, '2024-05-09', '2024-05-01', '2024-05-02'),
(8, 23031, 3, '0000-00-00', '2024-05-01', '0000-00-00'),
(7, 1001, 3, '0000-00-00', '2024-05-01', '0000-00-00'),
(6, 23031, 3, '0000-00-00', '2024-05-01', '0000-00-00'),
(12, 23031, 3, '2024-05-08', '2024-05-01', '2024-05-01'),
(13, 23031, 3, '2024-05-08', '2024-05-01', '2024-05-01'),
(14, 23031, 3, '2024-05-08', '2024-05-01', '2024-05-01'),
(15, 23031, 3, '2024-05-08', '2024-05-01', '2024-05-01'),
(16, 23031, 3, '2024-05-08', '2024-05-01', '2024-05-01'),
(17, 23031, 3, '2024-05-08', '2024-05-01', '2024-05-01'),
(18, 23031, 3, '2024-05-08', '2024-05-02', '2024-05-01'),
(19, 23031, 4, '2024-05-08', '2024-05-01', '2024-05-01'),
(20, 23031, 4, '2024-05-08', '2024-05-01', '2024-05-01'),
(22, 23031, 3, '2024-05-08', '0000-00-00', '2024-05-01'),
(23, 23031, 3, '2024-05-08', '2024-05-02', '2024-05-01'),
(24, 23031, 3, '2024-05-08', '2024-05-01', '2024-05-01'),
(25, 23031, 3, '2024-05-08', '2024-05-01', '2024-05-01'),
(26, 23031, 5, '2024-05-08', '2024-05-02', '2024-05-01'),
(27, 2301, 5, '2024-05-08', '2024-05-02', '2024-05-01'),
(28, 23031, 5, '2024-05-08', '2024-05-02', '2024-05-01'),
(29, 23031, 4, '2024-05-09', '2024-05-02', '2024-05-02'),
(30, 23025, 29, '2024-05-09', '2024-05-02', '2024-05-02'),
(31, 23025, 9, '2024-05-09', '2024-05-04', '2024-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `matricule` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  PRIMARY KEY (`matricule`)
)
--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`matricule`, `nom`, `prenom`, `niveau`, `specialite`) VALUES
(23025, 'zeini', 'cheikh', 'l1', 'dsi'),
(1001, 'swelm', '7mud', 'L7', 'medecin'),
(1002, 'Martin', 'Marie', 'L2', 'Mathématiques'),
(1003, 'Dubois', 'Pierre', 'L3', 'Physique'),
(1005, 'Lefebvre', 'Luc', 'L1', 'Informatique'),
(1006, 'Leclerc', 'Julie', 'L2', 'Mathématiques'),
(1007, 'Leroy', 'Thomas', 'L3', 'Physique'),
(1008, 'Moreau', 'Camille', 'M1', 'Biologie'),
(1009, 'Lemoine', 'Emma', 'L1', 'Informatique'),
(1010, 'Girard', 'Hugo', 'L2', 'Mathématiques'),
(1011, 'Roux', 'Zoé', 'L3', 'Physique'),
(1012, 'Fournier', 'Arthur', 'M1', 'Biologie'),
(1013, 'Dumont', 'Manon', 'L1', 'Informatique'),
(1014, 'Lopez', 'Léa', 'L2', 'Mathématiques'),
(1015, 'Andre', 'Louis', 'L3', 'Physique'),
(1016, 'Lam', 'Chloé', 'M1', 'Biologie'),
(1017, 'Boyer', 'Lucas', 'L1', 'Informatique'),
(1018, 'Garnier', 'Clara', 'L2', 'Mathématiques'),
(1019, 'Robin', 'Théo', 'L3', 'Physique'),
(1020, 'Guerin', 'Manon', 'M1', 'Biologie'),
(1021, 'Chevalier', 'Romain', 'L1', 'Informatique'),
(1022, 'Meyer', 'Noémie', 'L2', 'Mathématiques'),
(1023, 'Roy', 'Eva', 'L3', 'Physique'),
(1024, 'Caron', 'Antoine', 'M1', 'Biologie'),
(1025, 'Pierre', 'Elise', 'L1', 'Informatique'),
(1027, 'Arnaud', 'Léna', 'L3', 'Physique'),
(1029, 'Bernard', 'Maeva', 'L1', 'Informatique'),
(1030, 'Leroux', 'Nathan', 'L2', 'Mathématiques');

-- --------------------------------------------------------

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isbn` int DEFAULT NULL,
  `hauteur` varchar(255) DEFAULT NULL,
  `editeur` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `nbrpage` int DEFAULT NULL,
  `adition` int DEFAULT NULL,
  `nbrexmp` int DEFAULT NULL,
  `datepubli` date DEFAULT NULL,
  PRIMARY KEY (`id`)
)
--
-- Dumping data for table `livres`
--

INSERT INTO `livres` (`id`, `isbn`, `hauteur`, `editeur`, `titre`, `nbrpage`, `adition`, `nbrexmp`, `datepubli`) VALUES
(4, 65, 'said', 'sidi', 'jojo', 1200, 2012, 3, '2020-01-29'),
(6, 2147483647, 'Douglas Adams', 'Pan Books', 'The Hitchhiker\'s Guide to the Galaxy', 208, 1, 8, '1979-10-12'),
(7, 2147483647, 'Aldous Huxley', 'Chatto & Windus', 'Brave New World', 288, 1, 12, '1932-10-01'),
(8, 2147483647, 'Franz Kafka', 'Schocken Books', 'The Metamorphosis', 201, 1, 5, '1915-10-15'),
(9, 2147483647, 'Gabriel García Márquez', 'Harper & Row', 'One Hundred Years of Solitude', 417, 1, 7, '1967-05-30'),
(10, 2147483647, 'Khaled Hosseini', 'Riverhead Books', 'The Kite Runner', 371, 1, 9, '2003-05-29'),
(11, 2147483647, 'Harper Lee', 'J. B. Lippincott & Co.', 'To Kill a Mockingbird', 281, 1, 6, '1960-07-11'),
(12, 2147483647, 'Albert Camus', 'Gallimard', 'L\'Étranger', 123, 1, 4, '1942-06-01'),
(13, 2147483647, 'Markus Zusak', 'Knopf', 'The Book Thief', 552, 1, 10, '2005-03-14'),
(14, 2147483647, 'Margaret Atwood', 'Nan A. Talese', 'The Handmaid\'s Tale', 311, 1, 8, '1985-06-01'),
(15, 2147483647, 'Ray Bradbury', 'Ballantine Books', 'Fahrenheit 451', 158, 1, 7, '1953-10-19'),
(16, 2147483647, 'Leo Tolstoy', 'The Russian Messenger', 'War and Peace', 1392, 1, 15, '1869-01-01'),
(17, 2147483647, 'Yann Martel', 'Knopf Canada', 'Life of Pi', 319, 1, 9, '2001-09-11'),
(18, 2147483647, 'J.D. Salinger', 'Little, Brown and Company', 'The Catcher in the Rye', 277, 1, 6, '1951-07-16'),
(19, 2147483647, 'J.R.R. Tolkien', 'George Allen & Unwin', 'The Hobbit', 310, 1, 8, '1937-09-21'),
(20, 2147483647, 'Virginia Woolf', 'Hogarth Press', 'Mrs. Dalloway', 194, 1, 5, '1925-05-14'),
(21, 2147483647, 'J.K. Rowling', 'Bloomsbury', 'Harry Potter and the Deathly Hallows', 759, 1, 11, '2007-07-21'),
(22, 2147483647, 'George Orwell', 'Harcourt Brace Jovanovich', 'Animal Farm', 112, 1, 4, '1945-08-17'),
(23, 2147483647, 'David Mitchell', 'Random House', 'Cloud Atlas', 509, 1, 9, '2004-08-17'),
(24, 2147483647, 'Kazuo Ishiguro', 'Knopf', 'Never Let Me Go', 288, 1, 7, '2005-03-03'),
(25, 2147483647, 'Dan Brown', 'Doubleday', 'The Da Vinci Code', 454, 1, 9, '2003-03-18'),
(26, 2147483647, 'Jane Austen', 'Thomas Egerton', 'Pride and Prejudice', 279, 1, 6, '1813-01-28'),
(27, 2147483647, 'F. Scott Fitzgerald', 'Charles Scribner\'s Sons', 'The Great Gatsby', 180, 1, 5, '1925-04-10'),
(28, 2147483647, 'Toni Morrison', 'Alfred A. Knopf', 'Beloved', 321, 1, 8, '1987-09-02'),
(29, 2147483647, 'Arundhati Roy', 'IndiaInk', 'The God of Small Things', 333, 1, 7, '1997-06-03'),
(30, 2147483647, 'Mikhail Bulgakov', 'YMCA Press', 'The Master and Margarita', 384, 1, 8, '1967-01-01'),
(31, 2147483647, 'Gabriel García Márquez', 'Editorial Sudamericana', 'Cien años de soledad', 424, 1, 9, '1967-05-30'),
(32, 2147483647, 'Aristophanes', 'Penguin Classics', 'Lysistrata', 122, 1, 4, '0000-00-00'),
(33, 2147483647, 'Homer', 'Penguin Classics', 'The Odyssey', 541, 1, 8, '0000-00-00'),
(34, 2147483647, 'Sophocles', 'Penguin Classics', 'Oedipus Rex', 144, 1, 5, '0000-00-00'),
(35, 2147483647, 'Aesop', 'Penguin Classics', 'Aesop\'s Fables', 288, 1, 6, '0000-00-00'),
(36, 2147483647, 'Plato', 'Penguin Classics', 'The Republic', 416, 1, 9, '0000-00-00'),
(37, 2147483647, 'Aristotle', 'Penguin Classics', 'Poetics', 144, 1, 4, '0000-00-00'),
(38, 2147483647, 'Homer', 'Penguin Classics', 'The Iliad', 683, 1, 10, '0000-00-00'),
(39, 2147483647, 'Leo Tolstoy', 'Vintage Classics', 'Anna Karenina', 838, 1, 12, '1878-01-28'),
(40, 2147483647, 'Marcel Proust', 'Modern Library', 'In Search of Lost Time', 4211, 1, 20, '1913-11-14'),
(41, 2147483647, 'Thomas Mann', 'Vintage', 'Death in Venice', 74, 1, 3, '1912-10-29'),
(42, 2147483647, 'Plato', 'Penguin Classics', 'The Symposium', 131, 1, 5, '0000-00-00'),
(43, 2147483647, 'Virgil', 'Penguin Classics', 'The Aeneid', 442, 1, 9, '0000-00-00'),
(44, 2147483647, 'William Shakespeare', 'Vintage', 'Hamlet', 342, 1, 8, '0000-00-00'),
(45, 2147483647, 'Fyodor Dostoyevsky', 'Vintage', 'Crime and Punishment', 671, 1, 11, '0000-00-00'),
(46, 2147483647, 'Miguel de Cervantes', 'Everyman\'s Library', 'Don Quixote', 863, 1, 13, '0000-00-00'),
(47, 2147483647, 'Plato', 'Penguin Classics', 'The Trial and Death of Socrates', 246, 1, 6, '0000-00-00'),
(48, 2147483647, 'Plato', 'Penguin Classics', 'Symposium', 131, 1, 5, '0000-00-00'),
(49, 2147483647, 'Leo Tolstoy', 'Vintage Classics', 'War and Peace', 1225, 1, 15, '0000-00-00'),
(50, 2147483647, 'Sun Tzu', 'Dover Publications', 'The Art of War', 82, 1, 3, '0000-00-00'),
(51, 2147483647, 'Plato', 'Penguin Classics', 'The Last Days of Socrates', 256, 1, 6, '0000-00-00'),
(52, 2147483647, 'Homer', 'Everyman\'s Library', 'The Iliad and The Odyssey', 1116, 1, 18, '0000-00-00'),
(53, 2147483647, 'Hermann Hesse', 'Vintage', 'Siddhartha', 160, 1, 4, '0000-00-00'),
(54, 2147483647, 'Friedrich Nietzsche', 'Vintage', 'Thus Spoke Zarathustra', 352, 1, 8, '0000-00-00'),
(55, 2147483647, 'Franz Kafka', 'Penguin Classics', 'The Trial', 255, 1, 7, '0000-00-00'),
(56, 2147483647, 'Homer', 'Penguin Classics', 'The Odyssey', 541, 1, 9, '0000-00-00'),
(57, 2147483647, 'Gabriel García Márquez', 'Harper Perennial', 'Love in the Time of Cholera', 368, 1, 7, '0000-00-00'),
(58, 2147483647, 'F. Scott Fitzgerald', 'Scribner', 'The Great Gatsby', 180, 1, 5, '0000-00-00'),
(59, 2147483647, 'Herman Melville', 'Penguin Classics', 'Moby-Dick', 720, 1, 13, '0000-00-00'),
(60, 2147483647, 'Oscar Wilde', 'Oxford University Press', 'The Picture of Dorian Gray', 304, 1, 7, '0000-00-00'),
(61, 223, 'said', 'se3idos', 'jojo', 1200, 2, 3, '2022-05-10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
