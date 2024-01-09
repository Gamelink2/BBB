DROP DATABASE IF EXISTS Reserveringen;

CREATE DATABASE IF NOT EXISTS Reserveringen;
USE Reserveringen;

CREATE TABLE IF NOT EXISTS persoonsgegevens (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    VoorNaam VARCHAR(255),
    TussenVoegsel VARCHAR(20),
    AchterNaam VARCHAR(255),
    TelefoonNummer VARCHAR(20),
    Email VARCHAR(255),
    Aantal_Personen INT,
    Verzoek VARCHAR(255)
);

SELECT * FROM persoonsgegevens;

CREATE TABLE IF NOT EXISTS adresgegevens (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Postcode VARCHAR(255),
    Huisnummer INT,
    Toevoeging VARCHAR(255),
    Straatnaam VARCHAR(255),
    Woonplaats VARCHAR(255),
    Land VARCHAR(255),
    Kampeermiddel VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS users (
    PersonID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    Email VARCHAR(100) NOT NULL
);


SELECT * FROM users;

CREATE TABLE popupInhoud (
    PlekID INT AUTO_INCREMENT PRIMARY KEY,
    Grootte CHAR(255),
    Kampeermiddel VARCHAR(255),
    PlekNmr CHAR(3),
    Personen CHAR(2),
    Bijzettentjes CHAR(1),
    Stroom VARCHAR(4),
    Water VARCHAR(4)
);

INSERT INTO popupInhoud (Grootte, Kampeermiddel, PlekNmr, Personen, Bijzettentjes, Stroom, Water)
VALUES 
    ('28', 'caravan / camper', '1', '5', '2', 'wel', 'ook'),
    ('14', 'tent', '2', '3', '0', 'niet', 'wel'),
    ('28', 'caravan / camper', '3', '5', '2', 'wel', 'ook');

SELECT * FROM popupInhoud;

CREATE TABLE gebouwPopup(
    GebouwID INT AUTO_INCREMENT PRIMARY KEY,
    Soortgebouw VARCHAR(255),
    Openingstijd CHAR(4),
    Sluitingstijd CHAR(5)
);

INSERT INTO gebouwPopup(Soortgebouw, Openingstijd, Sluitingstijd)
VALUES
    ('sanitair', '0:00', '0:00'),
    ('afwasmogelijkheid', '0:00', '0:00'),
    ('wasserette', '7:00', '21:00'),
    ('activiteitlocatie', '9:00', '20:00');

SELECT * FROM gebouwPopup;
