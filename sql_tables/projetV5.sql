-- ----------------------------------------------------------
-- Script MYSQL pour mcd 
-- ----------------------------------------------------------


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
  resolution VARCHAR(10),
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
  image BLOB,
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
