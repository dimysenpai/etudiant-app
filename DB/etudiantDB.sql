DROP DATABASE IF EXISTS etudiantdb;

CREATE DATABASE IF NOT EXISTS etudiantdb;

USE etudiantdb;

CREATE TABLE
    IF NOT EXISTS etudiant (
        idetudiant INT NOT NULL AUTO_INCREMENT,
        matricule VARCHAR(128),
        nom VARCHAR(128),
        telephone VARCHAR(128),
        PRIMARY KEY (idetudiant)
    );