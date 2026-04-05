DROP TABLE IF EXISTS changeVersion;
DROP TABLE IF EXISTS changePortage;
DROP TABLE IF EXISTS changeLocale;
DROP TABLE IF EXISTS localisation;
DROP TABLE IF EXISTS portage;
DROP TABLE IF EXISTS plateforme;
DROP TABLE IF EXISTS version;
DROP TABLE IF EXISTS jeu;

-- ----------------------------
-- Table: jeu
-- ----------------------------
CREATE TABLE jeu (
  numJeu INT NOT NULL,
  nom VARCHAR(200) NOT NULL,
  dateSortie DATE NOT NULL,
  genre VARCHAR(50) NOT NULL,
  difficulte INT,
  CONSTRAINT jeu_PK PRIMARY KEY (numJeu)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: plateforme
-- ----------------------------
CREATE TABLE plateforme (
  numPlateforme INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  generation INT,
  fabriquant VARCHAR(30),
  portable TINYINT(1),
  CONSTRAINT plateforme_PK PRIMARY KEY (numPlateforme)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: version
-- ----------------------------
CREATE TABLE version (
  numVersion INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(100) NOT NULL,
  dateSortie DATE NOT NULL,
  description VARCHAR(200) NOT NULL,
  difficulteRelative INT NOT NULL,
  contenuAdditionnel TINYINT(1) NOT NULL,
  noteVersion INT,
  original TINYINT(1) NOT NULL,
  numJeu INT NOT NULL,
  CONSTRAINT version_PK PRIMARY KEY (numVersion),
  CONSTRAINT version_numJeu_FK FOREIGN KEY (numJeu) REFERENCES jeu (numJeu)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: portage
-- ----------------------------
CREATE TABLE portage (
  numPortage INT NOT NULL AUTO_INCREMENT,
  dateSortie DATE NOT NULL,
  resolution VARCHAR(15),
  framerate INT,
  stable TINYINT(1),
  lagSup TINYINT(1),
  modifContenu TINYINT(1),
  notePortage INT,
  original TINYINT(1) NOT NULL,
  numVersion INT NOT NULL,
  numPlateforme INT NOT NULL,
  CONSTRAINT portage_PK PRIMARY KEY (numPortage),
  CONSTRAINT portage_numVersion_FK FOREIGN KEY (numVersion) REFERENCES version (numVersion),
  CONSTRAINT portage_numPlateforme_FK FOREIGN KEY (numPlateforme) REFERENCES plateforme (numPlateforme)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: localisation
-- ----------------------------
CREATE TABLE localisation (
  numLocalisation INT NOT NULL,
  region VARCHAR(30) NOT NULL,
  dateSortie DATE NOT NULL,
  modifContenu TINYINT(1) NOT NULL,
  image LONGBLOB,
  original TINYINT(1) NOT NULL,
  numPortage INT NOT NULL,
  CONSTRAINT localisation_PK PRIMARY KEY (numLocalisation),
  CONSTRAINT localisation_numPortage_FK FOREIGN KEY (numPortage) REFERENCES portage (numPortage)
)ENGINE=InnoDB;

-- ----------------------------
-- Tables: changements
-- ----------------------------

CREATE TABLE changeVersion (
  numChangement INT NOT NULL AUTO_INCREMENT,
  type VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  important TINYINT(1) NOT NULL,
  numVersion INT,
  CONSTRAINT changement_PK PRIMARY KEY (numChangement),
  CONSTRAINT changement_numVersion_FK FOREIGN KEY (numVersion) REFERENCES version (numVersion)
)ENGINE=InnoDB;

CREATE TABLE changePortage (
  numChangement INT NOT NULL AUTO_INCREMENT,
  type VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  important TINYINT(1) NOT NULL,
  numPortage INT,
  CONSTRAINT changement_PK PRIMARY KEY (numChangement),
  CONSTRAINT changement_numPortage_FK FOREIGN KEY (numPortage) REFERENCES portage (numPortage)
)ENGINE=InnoDB;

CREATE TABLE changeLocale (
  numChangement INT NOT NULL AUTO_INCREMENT,
  type VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  important TINYINT(1) NOT NULL,
  numLocalisation INT,
  CONSTRAINT changement_PK PRIMARY KEY (numChangement),
  CONSTRAINT changement_numLocalisation_FK FOREIGN KEY (numLocalisation) REFERENCES localisation (numLocalisation)
)ENGINE=InnoDB;

INSERT INTO jeu VALUES 
(3549, 'Ocarina of Time', '1998-12-21', 'Aventure', 1), 
(52872, 'Resident Evil 4', '2005-01-11', 'TPS', 2),
(858, 'Final Fantasy VII', '1997-01-31', 'JRPG', 1),
(4572, 'Final Fantasy IV', '1991-07-19', 'JRPG', 1);

INSERT INTO version VALUES
(2, 'Remake', '2011-07-11', 'Version 3D stéréoscopique avec tous les modèles et textures refaits', 0, 1, 8, 0, 3549),
(1, 'Original', '1998-12-21', NULL, 0, 0, NULL, 1, 3549),
(3, 'Ship of Harkinian', '2022-03-22', 'Portage PC fanmade avec support pour textures HD et framerate augmenté', 0, 0, 8, 0, 3549),
(10, 'Original', '2005-01-11', NULL, 0, 0, NULL, 1, 52872),
(11, 'Remake', '2023-03-24', 'Remake avec jeu entièrement refait et modernisé', -1, 1, 3, 0, 52872),
(30, 'Original', '1997-01-31', NULL, 0, 0, NULL, 1, 858),
(31, 'Remake 1', '2020-04-10', '1er jeu de la trilogie des remakes, jeu entièrement refait et modernisé', 1, 1, 6, 0, 858),
(32, 'Remake 2 (Rebirth)', '2024-02-29', '2ème jeu de la trilogie des remakes', 1, 1, 6, 0, 858),
(20, 'Final Fantasy II', '1991-07-19', NULL, 0, 0, NULL, 1, 4572),
(21, 'Remake 3D', '2007-12-20', 'jeu entièrement refait en 3D', 1, 1, 6, 0, 4572),
(22, 'Pixel Remaster', '2021-09-08', 'jeu en 2D avec sprites refaits', 0, 0, 5, 0, 4572);

INSERT INTO plateforme VALUES
(3, 'SNES', 4, 'Nintendo', 0),
(20, 'Playstation', 5, 'Sony', 0),
(21, 'Playstation 2', 6, 'Sony', 0),
(1, 'PC', NULL, NULL, 0),
(5, 'GameCube', 6, 'Nintendo', 0),
(13, '3DS', 8, 'Nintendo', 1),
(12, 'DS', 7, 'Nintendo', 1),
(23, 'Playstation 4', 8, 'Sony', 0),
(24, 'Playstation 5', 9, 'Sony', 0),
(31, 'WonderSwan Color', 6, 'Bandai', 1),
(11, 'GBA', 6, 'Nintendo', 1),
(27, 'PSP', 7, 'Sony', 1),
(4, 'N64', 5, 'Nintendo', 0);

INSERT INTO portage VALUES 
(1, '1991-07-19', '256 x 224', 60, 1, 0, 0, NULL, 1, 20, 3),
(2, '1997-03-21', '256 x 224', 60, 1, 1, 0, 4, 0, 20, 20),
(3, '2002-03-28', '224 × 144', 60, 1, 0, 1, 3, 0, 20, 31),
(4, '2005-12-12', '240 x 160', 60, 1, 0, 1, 7, 0, 20, 11),
(5, '2011-03-24', '480 x 272', 60, 1, 0, 1, 8, 0, 20, 27),
(10, '1998-12-21', '320 x 240', 20, 1, 0, 0, NULL, 1, 1, 4),
(20, '2005-01-11', '720 x 480', 30, 1, 0, 0, NULL, 1, 10, 5),
(30, '1997-01-31', '320 x 240', 15, 0, 0, 0, NULL, 1, 30, 20),
(6, '2007-12-20', '256 x 192', 15, 1, 0, 0, NULL, 1, 21, 12),
(7, '2021-09-08', '1920 x 1080', 60, 0, 0, 0, NULL, 1, 22, 1);

INSERT INTO localisation VALUES
(1, 'Japan', '1991-07-19', 0, NULL, 1, 1),
(2, 'USA', '1991-11-23', 1, NULL, 0, 1),
(3, 'Japan', '1997-03-21', 0, NULL, 1, 2),
(4, 'USA', '2001-07-10', 1, NULL, 0, 2),
(5, 'Europe', '2002-05-01', 1, NULL, 0, 2),
(6, 'Japan', '1998-12-21', 0, NULL, 1, 10),
(7, 'Japan', '2005-01-11', 0, NULL, 1, 20),
(8, 'Japan', '1997-01-31', 0, NULL, 1, 30),
(9, 'Japan', '2007-12-20', 0, NULL, 1, 6),
(10, 'International', '2021-09-08', 0, NULL, 1, 7);

INSERT INTO changeVersion VALUES 
(1, 'Graphismes', 'Le jeu a été entièrement refait avec Unity', 1, 22),
(2, 'Graphismes', 'Les sprites des personnages et ennemis ont été refaits en se basant sur ceux de la version GBA', 1, 22),
(3, 'Graphismes', 'Les portraits des personnages sont basées sur la verion SNES originale, et n\'apparaissent plus pendant les dialogues', 0, 22),
(4, 'Gameplay', 'Le jeu est globalement plus facile que l\'original', 1, 22),
(5, 'Gameplay', 'L\'efficacité des potions a été augmentée', 0, 22),
(6, 'Gameplay', 'Il est possible de courir et de se déplacer dans 8 directions, les déplacements sont donc bien plus rapides', 1, 22),
(7, 'Gameplay', 'Il est possible de marcher derrière les arbres et colonnes, ce qui fait que de nombreuses zones du jeu ont maintenant des raccourcis', 1, 22),
(20, 'Gameplay', 'Le jeu est nettement plus difficile que la version originale, notamment parce que les ennemis ont plus de PV et infligent plus de dégats', 1, 21),
(21, 'Graphismes', 'Le jeu a été entièrement refait en 3D et des cinématiques ont été ajoutées', 1, 21);

INSERT INTO changePortage VALUES 
(1, 'Gameplay', 'Le jeu étant sur disque, les temps de chargement ont été augmentés entre les combats et lors des transitions entre écrans', 1, 2),
(2, 'Contenu additionnel', 'Une cinématique FMV a été ajoutée', 1, 2),
(10, 'Contenu additionnel', '2 donjons optionnels ont été ajoutés : Cave of Trials et Lunar Ruins', 1, 4),
(11, 'Contenu additionnel', 'Ajout d\'un bestiaire répertoriant les ennemis rencontrés', 0, 4),
(12, 'Contenu additionnel', 'Après la fin du jeu, un music player est débloqué et permet de réécouter les musiques du jeu', 0, 4),
(13, 'Bugs', 'Certains bugs ont été corrigés, et d\'autres ont été ajoutés', 1, 4),
(14, 'Gameplay', 'Il est possible de modifier la composition de l\'équipe', 1, 4);

INSERT INTO changeLocale VALUES
(1, 'Gameplay', 'La difficulté du jeu a été réduite comparé à la version japonaise originale', 1, 2),
(2, 'Traduction', 'Le script du jeu a été simplifié et mal traduit, et des histoires annexes ont été supprimées', 1, 2),
(3, 'Censure', 'Les références à la religion ont été supprimées', 1, 2),
(4, 'Gameplay', 'Le prix de plusieurs objets dans les boutiques a été diminué', 0, 2),
(10, 'Traduction', 'La traduction a été réécrite pour etre plus fidèle à l\'original', 1, 4),
(11, 'Gameplay', 'Certains changements de la version SNES américaine ont été restaurés pour etre identiques à la version originale', 1, 4),
(12, 'Gameplay', 'Le prix des objets dans les boutiques a été restauré', 0, 4);
