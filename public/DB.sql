-- Verwijder de database als deze bestaat en maak deze opnieuw aan
DROP DATABASE IF EXISTS Reserveringen;

-- Maak de database aan als deze nog niet bestaat en selecteer deze
CREATE DATABASE IF NOT EXISTS Reserveringen;
USE Reserveringen;

-- Maak tabel voor persoonsgegevens
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

-- Haal alle records op uit de persoonsgegevens tabel
SELECT * FROM persoonsgegevens;

-- Maak tabel voor adresgegevens
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

-- Maak tabel voor gebruikers
CREATE TABLE IF NOT EXISTS users (
    PersonID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    Email VARCHAR(100) NOT NULL
);

CREATE TABLE popupInhoud (
    PlekID INT AUTO_INCREMENT PRIMARY KEY,
    lengte VARCHAR(255),
    breedte VARCHAR(255)
);

INSERT INTO popupInhoud (lengte, breedte)
    VALUES 
    ('1', '1'), 
    ('2', '2'),
    ('3', '3'),
    ('4', '4');

SELECT * FROM popupInhoud;

select * from users;


-- Maak tabel voor inhoud van kampeerplekken popups
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

-- Data invullen in de tabel popupInhoud
INSERT INTO popupInhoud (Grootte, Kampeermiddel, PlekNmr, Personen, Bijzettentjes, Stroom, Water)
    VALUES 
     ('28', 'caravan/ camper', '1', '5', '2', 'wel', 'ook'),
     ('14', 'tent', '2', '3', '0', 'niet', 'wel'),
     ('28', 'caravan/ camper', '3', '5', '2', 'wel', 'ook');

SELECT * FROM popupInhoud;

-- Maak tabel voor inhoud van gebouwpopups
CREATE TABLE gebouwPopup(
	GebouwID INT AUTO_INCREMENT PRIMARY KEY,
	Soortgebouw VARCHAR(255),
	Openingstijd CHAR(4),
    Sluitingstijd CHAR(5)
);

-- Data invullen in de tabel gebouwPopup
INSERT INTO gebouwPopup(Soortgebouw, Openingstijd, Sluitingstijd)
	VALUES
		('sanitair', '0:00', '0:00'),
        ('afwasmogelijkheid', '0:00', '0:00'),
        ('wasserette', '7:00', '21:00'),
        ('activiteitlocatie', '9:00', '20:00');
        

SELECT * FROM gebouwPopup;



