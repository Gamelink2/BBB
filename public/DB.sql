DROP DATABASE IF EXISTS Reserveringen;

CREATE DATABASE IF NOT EXISTS Reserveringen;
USE Reserveringen;

CREATE TABLE IF NOT EXISTS persoonsgegevens (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Aanhef VARCHAR(255),
    VoorNaam VARCHAR(255),
    AchterNaam VARCHAR(255),
    TelefoonNummer VARCHAR(20),
    Email VARCHAR(255),
    Verzoek VARCHAR(255),
    Volwassenen VARCHAR(20),
    kinderen VARCHAR(20),
    Aantal_Personen VARCHAR(20)
);

SELECT * FROM persoonsgegevens;

CREATE TABLE IF NOT EXISTS adresgegevens (
    AddressID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES persoonsgegevens(UserID),
    Postcode VARCHAR(255),
    Huisnummer VARCHAR(20),
    Straatnaam VARCHAR(255),
    Kampeermiddel VARCHAR(255)
);


CREATE TABLE IF NOT EXISTS users (
    PersonID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50),
    pwd VARCHAR(255),
    Email VARCHAR(100)
);

SELECT * FROM users;

CREATE TABLE IF NOT EXISTS popupInhoud (
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
