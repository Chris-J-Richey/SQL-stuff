USE chrisrichey1995;

CREATE TABLE team (
	team_code INT PRIMARY KEY ,
	team_name VARCHAR(15)
);

CREATE TABLE power (
	pow_code INT PRIMARY KEY,
	pow_power FLOAT(3)
);

CREATE TABLE riders (
	rid_code INT PRIMARY KEY AUTO_INCREMENT,
	rid_fname VARCHAR(25),
	rid_lname VARCHAR(25),
	team_code INT,
	pow_power INT
);

CREATE TABLE users (
	use_code INT PRIMARY KEY AUTO_INCREMENT,
	use_fname VARCHAR(25),
	use_lname VARCHAR(25),
	use_email VARCHAR(100)
);

INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (2, 'Cooper', 'Webb', 3, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (3, 'Eli', 'Tomac', 1, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (10, 'Justin', 'Brayton', 5, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (15, 'Dean', 'Wilson', 4, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (21, 'Jason', 'Anderson', 4, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (22, 'Chad', 'Reed', 4, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (25, 'Marvin', 'Musquin', 6, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (27, 'Malcolm', 'Stewart', 2, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (32, 'Christian', 'Craig', 5, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (34, 'Weston', 'Peick', 2, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (51, 'Justin', 'Barcia', 3, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (55, 'Vince', 'Friese', 5, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (69, 'Tyler', 'Bowers', 1, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (79, 'Nick', 'Schmidt', 2, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (80, 'AJ', 'Catanzaro', 1, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (84, 'Scott', 'Champion', 3, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (90, 'Dakota', 'Tedder', 6, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (91, 'Alex', 'Ray', 3, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (201, 'Cedric', 'Soubeyras', 2, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (509, 'Alexander', 'Nagy', 6, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (523, 'Miles', 'Daniele', 5, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (715, 'Kele', 'Russell', 4, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (805, 'Carlen', 'Gardner', 5, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (918, 'Michael', 'Akaydin', 1, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (976, 'Josh', 'Greco', 6, 2);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (1, 'Zach', 'Osborne', 4, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (6, 'Jeremy', 'Martin', 5, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (29, 'Martin', 'Davalos', 1, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (35, 'Austin', 'Forkner', 1, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (43, 'Sean', 'Cantrell', 6, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (45, 'Jordon', 'Smith', 6, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (47, 'James', 'Decotis', 2, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (57, 'John', 'Short', 3, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (64, 'Michael', 'Mosiman', 4, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (76, 'Kyle', 'Peters', 2, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (114, 'Brandon', 'Hartranft', 3, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (174, 'Joshua', 'Osby', 6, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (1, 'Justin', 'Hill', 2, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (11, 'Kyle', 'Chisholm', 3, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (17, 'Joey', 'Savatgy', 1, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (26, 'Alex', 'Martin', 6, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (28, 'Shane', 'McElrath', 6, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (30, 'Mitchell', 'Harrison', 4, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (40, 'Chase', 'Sexton', 5, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (54, 'Phillip', 'Nicoletti', 2, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (63, 'Hayden', 'Mellross', 3, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (86, 'Dylan', 'Merriam', 3, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (92, 'Adam', 'Cianciarulo', 1, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (122, 'Chris', 'Howell', 4, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (185, 'Damon', 'Back', 1, 1);
INSERT INTO riders (rid_number, rid_fname, rid_lname, team_code, pow_code) VALUES (321, 'Bradley', 'Lionnet', 1, 1);

INSERT INTO team VALUES (1, 'Kawasaki');
INSERT INTO team VALUES (2, 'Suzuki');
INSERT INTO team VALUES (3, 'Yamaha');
INSERT INTO team VALUES (4, 'Husqvarna');
INSERT INTO team VALUES (5, 'Honda');
INSERT INTO team VALUES (6, 'KTM');

INSERT INTO power VALUES (1, 250);
INSERT INTO power VALUES (2, 450);