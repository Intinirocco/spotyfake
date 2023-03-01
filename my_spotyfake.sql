DROP DATABASE IF EXISTS my_spotyfake;

CREATE DATABASE IF NOT EXISTS my_spotyfake DEFAULT CHARACTER SET = utf8;

USE my_spotyfake;


CREATE TABLE utente(
    idUtente int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(20) NOT NULL,
    cognome varchar(20) NOT NULL,
    nazionalita varchar(20) NOT NULL,
    mail varchar(50) NOT NULL UNIQUE,
    password varchar(20) NOT NULL
);


CREATE TABLE canzone(
    idCanzone int AUTO_INCREMENT PRIMARY KEY,
    genere varchar(20) NOT NULL,
    titolo varchar(200) NOT NULL,
    autore varchar(20) NOT NULL
);

CREATE TABLE playlist(
    idPlaylist int AUTO_INCREMENT PRIMARY KEY,
    fkUtente int NOT NULL,
    nome varchar(20) NOT NULL,
    descrizione varchar(200),
    FOREIGN KEY(fkUtente) REFERENCES utente(idUtente)
);


CREATE TABLE contiene(
    fkCanzone int NOT NULL,
    fkPlaylist int NOT NULL,
    PRIMARY KEY (fkCanzone, fkPlaylist),
    FOREIGN KEY (fkCanzone) REFERENCES canzone(idCanzone),
    FOREIGN KEY (fkPlaylist) REFERENCES playlist(idPlaylist)
);


CREATE TABLE ascolta(
    fkCanzone int NOT NULL,
    fkUtente int NOT NULL,
    PRIMARY KEY (fkCanzone, fkUtente),
    FOREIGN KEY (fkCanzone) REFERENCES canzone(idCanzone),
    FOREIGN KEY (fkUtente) REFERENCES utente(idUtente)
);

