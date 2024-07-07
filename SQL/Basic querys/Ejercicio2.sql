DROP DATABASE ejercicio;
CREATE DATABASE ejercicio;
\c ejercicio;

CREATE TABLE Workers 
(
	id numeric(4),
	name varchar(20),
	fee numeric,
	job varchar(15),
	PRIMARY KEY (id)
);
ALTER TABLE Workers 
ADD supervisor_id numeric(4)
;
CREATE TABLE Buildings
(
	id numeric(3),
	address varchar,
	type varchar,
	level numeric(1),
	category numeric(1),
	PRIMARY KEY (id)
);
CREATE TABLE Assignments
(
	worker_id numeric(4),
	building_id numeric(4),
	start_date date,
	days numeric,
	PRIMARY KEY (worker_id, building_id, start_date)
	
);
INSERT INTO Workers VALUES
(
	1235,
	'M.Faraday',	
	12.5,
	'electrician',
	1311
);
INSERT INTO Workers VALUES
(
	1311,
	'C.Coulomb',
	15.5,
	'electrician',
	1311
);
INSERT INTO Workers VALUES
(
	1412,
	'C.Nemo',
	13.75,
	'plumber',
	1520
);
INSERT INTO Workers VALUES
(
	1520,
	'H.Rickover',
	11.75,
	'plumber',
	1520
);
INSERT INTO Workers VALUES
(
	2920,
	'R.Garret',
	10,
	'builder',
	2920
);
INSERT INTO Workers VALUES
(
	3001,
	'J.Barrister',
	8.2,
	'carpenter',
	3231
);
INSERT INTO Workers VALUES
(
	3231,
	'P.Mason',
	17.4,
	'carpenter',
	3231
);

INSERT INTO Buildings VALUES
(
	111,
	'1213 Aspen',
	'office',
	4,
	1
);
INSERT INTO Buildings VALUES
(
	210,
	'1011 Birch',
	'office',
	3,
	1
);
INSERT INTO Buildings VALUES
(
	312,
	'123 Elm',
	'office',
	2,
	2
);
INSERT INTO Buildings VALUES
(
	435,
	'456 Maple',
	'shop',
	1,
	1
);
INSERT INTO Buildings VALUES
(
	460,
	'1415 Beach',
	'warehouse',
	3,
	3
);
INSERT INTO Buildings VALUES
(
	515,
	'789 Oak',
	'residential',
	3,
	2
);
INSERT INTO Assignments VALUES
(
	1235,
	312,
	'2001-10-10',
	5
);
INSERT INTO Assignments VALUES
(
	1235,
	515,
	'2001-10-17',
	22
);
INSERT INTO Assignments VALUES
(
	1311,
	435,
	'2001-10-08',
	12
);
INSERT INTO Assignments VALUES
(
	1311,
	460,
	'2001-10-23',
	24
);
INSERT INTO Assignments VALUES
(
	1412,
	111,
	'2001-12-01',
	4
);
INSERT INTO Assignments VALUES
(
	1412,
	210,
	'2001-11-15',
	12
);
INSERT INTO Assignments VALUES
(
	1412,
	312,
	'2001-10-01',
	10
);
INSERT INTO Assignments VALUES
(
	1412,
	435,
	'2001-10-15',
	15
);
INSERT INTO Assignments VALUES
(
	1412,
	460,
	'2001-10-08',
	18
);
INSERT INTO Assignments VALUES
(
	1412,
	515,
	'2001-11-09',
	14
);
INSERT INTO Assignments VALUES
(
	1520,
	312,	
	'2001-10-30',
	17
);
INSERT INTO Assignments VALUES
(
	1520,
	515,
	'2001-10-09',
	14
);
INSERT INTO Assignments VALUES
(
	2920,
	210,
	'2001-11-10',
	15
);
INSERT INTO Assignments VALUES
(
	2920,
	435,
	'2001-10-28',
	10
);
INSERT INTO Assignments VALUES
(
	2920,
	460,
	'2001-10-05',
	18
);
INSERT INTO Assignments VALUES
(
	3001,
	111,
	'2001-10-05',
	14
);
INSERT INTO Assignments VALUES
(
	3001,
	210,
	'2001-10-27',
	14
);
INSERT INTO Assignments VALUES
(
	3231,
	111,
	'2001-10-10',
	8
);
INSERT INTO Assignments VALUES
(
	3231,
	312,
	'2001-10-24',
	20
);
ALTER TABLE Workers 
ADD FOREIGN KEY (supervisor_id)
REFERENCES Workers(id)
;
ALTER TABLE Assignments
ADD FOREIGN KEY (worker_id)
REFERENCES Workers(id)
;
ALTER TABLE Assignments 
ADD FOREIGN KEY (building_id)
REFERENCES Buildings (id)
;

--Ejercicio1

SELECT name FROM Workers 
WHERE fee between 10 AND 12
;

--Ejercicio2

SELECT w.job FROM Workers AS w, Assignments AS a 
WHERE w.id = a.worker_id AND a.building_id = 435

--Ejercicio3

SELECT w1.name AS trabajador, w2.name AS supervisor FROM Workers AS w1, Workers AS w2 
WHERE w1.supervisor_id = w2.id AND w1.id <> w2.id
;

--Ejercicio4

SELECT DISTINCT name FROM Workers INNER JOIN Assignments ON id = worker_id 
WHERE building_id IN (
	SELECT id FROM Buildings WHERE type='office'
	)
;

SELECT DISTINCT name FROM Workers 
INNER JOIN Assignments ON id= worker_id 
INNER JOIN Buildings ON  Buildings.id= building_id 
WHERE type='office'
;

--Ejercicio5

SELECT w.name FROM workers w, Workers s 
WHERE w.supervisor_id = s.id 
AND w.fee > s.fee;

--Ejercicio6

SELECT SUM(a.days) FROM Assignments a, Workers w 
WHERE w.id = a.worker_id AND w.job ='plumber'
AND a.building_id = 312
;

--Ejercicio7

SELECT COUNT(DISTINCT job) FROM Workers
;

--Ejercicio8

SELECT supervisor_id, MAX(fee) FROM Workers
GROUP BY supervisor_id
;

--Ejercicio9

SELECT supervisor_id, MAX(fee) FROM Workers
GROUP BY supervisor_id HAVING COUNT(*) > 1
;

--Ejercicio10

SELECT type, AVG(level) FROM Buildings
WHERE category = 1 AND level <= 3
GROUP BY  type 
;

--Ejercicio11

SELECT name FROM Workers 
WHERE fee < (SELECT AVG(fee) AS Tarifa_Media FROM Workers)
;

--Ejercicio12

SELECT name FROM Workers AS w1 WHERE fee < (SELECT AVG(fee) AS Media_tarifa FROM Workers AS w2 
WHERE w1.job = w2.job)
;

--Ejercicio13 Correcto

SELECT name FROM Workers AS w1
WHERE w1.fee < (SELECT  AVG(fee) AS media_trabajador FROM Workers AS w2
WHERE w1.supervisor_id = w2.supervisor_id)
;

SELECT supervisor_id, AVG(fee) FROM Workers 
WHERE supervisor_id <> id 
GROUP BY supervisor_id
;
--Ejercicio14 Correcto

SELECT  name, start_date FROM Workers AS w1, Assignments AS a
WHERE w1.job = 'electrician' AND EXISTS (SELECT name FROM Workers 
INNER JOIN Assignments ON w1.id = worker_id
WHERE a.building_id = 435 AND w1.id = a.worker_id)
;

--Ejercicio15 Correcto

SELECT DISTINCT s.name FROM Workers AS w, Workers AS s 
WHERE w.supervisor_id = s.id AND w.fee > 12 AND w.id <> w.supervisor_id
;

--Ejercicio16 Correcto

UPDATE Workers SET fee=fee*1.05
WHERE supervisor_id = (SELECT id FROM Workers
WHERE name = 'C.Coulomb')
;