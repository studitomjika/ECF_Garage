CREATE TABLE comments(id_commentaire INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, name VARCHAR(50), grade TINYINT, message TEXT(300), accepted BOOLEAN DEFAULT(False));
INSERT INTO comments(name, grade, message, accepted) VALUES('Jean-Claude Dus', 4, 'C''est plus cassé merci.', 1);
INSERT INTO comments(name, grade, message, accepted) VALUES('Marie Molette', 2, 'Pas trouvé de liquide de clignotant...', 1);
INSERT INTO comments(name, grade, message, accepted) VALUES('Johnny', 3, 'Pas cher mais j''aurai pu le faire moi-même.', 1);
INSERT INTO comments(name, grade, message, accepted) VALUES('Connard', 1, 'Arnaqueur comme tous les garagistes...', 0);

CREATE TABLE configurations(id_configuration INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, name TEXT(255), value TEXT);
INSERT INTO configurations(name, value) VALUES('titre_voitures', 'Les voitures d''occasion à la vente:');
INSERT INTO configurations(name, value) VALUES('formulaire_contact', '1');
INSERT INTO configurations(name, value) VALUES('formulaire_comment', '1');
INSERT INTO configurations(name, value) VALUES('formulaire_connect', '1');
INSERT INTO configurations(name, value) VALUES('titre_horaires', 'Les horaires d''ouvertures');
INSERT INTO configurations(name, value) VALUES('titre_form_comment', 'Ajouter un commentaire');
INSERT INTO configurations(name, value) VALUES('titre_form_contact', 'Contacter le garage');
INSERT INTO configurations(name, value) VALUES('titre_form_connect', 'Se connecter');
INSERT INTO configurations(name, value) VALUES('titre_services', 'Les services du garage');

CREATE TABLE employees(id_employee INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, name VARCHAR(250), firstname VARCHAR(250), login VARCHAR(255), password CHAR(60), role_admin BOOL);
INSERT INTO employees(name, firstname, login, password, role_admin) VALUES('Lapin', 'Jean', 'jean@lapin.com', '$2y$10$vTPrRoCoZQGh8pQi5TbzLOBmM.d/c/f7v/H0I.snVCJAMXCnbDcVS', 0);
INSERT INTO employees(name, firstname, login, password, role_admin) VALUES('Vincent', 'Parrot', 'vparrot@parrot.com', '$2y$10$ADhMyJZ1ueuimVyxd7bKYOK8HR/VTjn.9q65Ns9zBofv03Inuc3VK', 1);

CREATE TABLE messages(id_message INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, name VARCHAR(50), email VARCHAR(255), phone_number VARCHAR(15), subject VARCHAR, message TEXT(500), id_occasion INTEGER);

CREATE TABLE openings_hours(id_opening_hours INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, day VARCHAR(8), hours VARCHAR(50));
INSERT INTO openings_hours(day, hours) VALUES('Lundi', '8:45 - 12:00, 14:00 - 18:00');
INSERT INTO openings_hours(day, hours) VALUES('Mardi', '8:45 - 12:00, 14:00 - 18:00');
INSERT INTO openings_hours(day, hours) VALUES('Mercredi', '8:45 - 12:00, 14:00 - 18:00');
INSERT INTO openings_hours(day, hours) VALUES('Jeudi', '8:45 - 12:00, 14:00 - 18:00');
INSERT INTO openings_hours(day, hours) VALUES('Vendredi', '8:45 - 12:00, 14:00 - 18:00');
INSERT INTO openings_hours(day, hours) VALUES('Samedi', '8:45 - 12:00, 14:00 - 18:00');
INSERT INTO openings_hours(day, hours) VALUES('Dimanche', 'fermé');

CREATE TABLE services(id_service INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, text VARCHAR(50));
INSERT INTO services(text) VALUES('Réparation');
INSERT INTO services(text) VALUES('Entretien régulier');
INSERT INTO services(text) VALUES('Nettoyage ''comme neuf''');
INSERT INTO services(text) VALUES('Achat ou changement d’accessoires');
INSERT INTO services(text) VALUES('Contrôle technique');
INSERT INTO services(text) VALUES('Révision périodique');

CREATE TABLE used_cars(id_occasion INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, model VARCHAR(250), price DECIMAL(6, 2), kilometres INT, year INT, picture_link VARCHAR(250));
INSERT INTO used_cars(model, price, kilometres, year, picture_link) VALUES('TOYOTA DES MONTAGNES', 10000, 7654, 2005, '/img/voiture1.jpg');
INSERT INTO used_cars(model, price, kilometres, year, picture_link) VALUES('LADA', 5000, 45160, 1999, '/img/voiture2.jpg');
INSERT INTO used_cars(model, price, kilometres, year, picture_link) VALUES('DOLOREAN GRISE', 1983, 36140, 2037, '/img/voiture3.jpg');
INSERT INTO used_cars(model, price, kilometres, year, picture_link) VALUES('LAND-ROVER AMPHIBIE À VENIR CHERCHER SUR PLACE', 1250, 85012, 1993, '/img/voiture4.jpg');
