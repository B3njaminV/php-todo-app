--Fichier de configuration de la base de donnée

CREATE DATABASE IF NOT EXISTS `bdd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdd`;

CREATE TABLE IF NOT EXISTS `tache` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `texte` varchar(150) NOT NULL,
  `status` char(8) DEFAULT NULL,
`idParent` char(8) REFERENCES liste(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `liste` (
    `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `titre` varchar(150) NOT NULL,
    `status` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `utilisateur` (
  `user_id` int(100) NOT NULL PRIMARY KEY,
  `user_name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `utilisateur`VALUES(1234,"benjamin","root");
INSERT INTO `utilisateur`VALUES(12345,"vincent","root");