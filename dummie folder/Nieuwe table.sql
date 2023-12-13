DROP DATABASE IF EXISTS popupsysteem;

CREATE DATABASE popupsysteem;

CREATE TABLE popupInhoud (
    PlekID INT AUTO_INCREMENT PRIMARY KEY,
    lengte VARCHAR(255),
    breedte VARCHAR(255)
);

INSERT INTO popupInhoud (lengte, breedte)
    VALUES ('langelengte', 'breedebreedte');

SELECT * FROM popupInhoud;