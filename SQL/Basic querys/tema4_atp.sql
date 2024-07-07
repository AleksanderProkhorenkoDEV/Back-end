DROP DATABASE ejercicio10;

CREATE DATABASE ejercicio10;
\c ejercicio10;
CREATE TABLE airport
(
	code_airport numeric(8),
	city char(20),
	country char(20),
	name char(20),
	PRIMARY KEY (code_airport)
);
INSERT INTO airport VALUES
(
	11111111,
	'Albacete',
	'España',
	'Aeropuerto Central'
);
INSERT INTO airport VALUES
(
	22222222,
	'Granada',
	'España',
	'Aeropuerto Gr'
);
INSERT INTO airport VALUES
(
	33333333,
	'Sidney',
	'Australia',
	'AeropuertoAu'
);
INSERT INTO airport VALUES
(
	44444444,
	'Paris',
	'Francia',
	'AeropuertoFr'
);
INSERT INTO airport VALUES
(
	55555555,
	'Niza',
	'Francia',
	'AeropuertoFr'
);
CREATE TABLE program 
(
	code_program numeric(8),
	airplane char(10),
	days date,
	PRIMARY KEY (code_program)
);
INSERT INTO program VALUES
(
	11,
	'Sonico',
	'2022-12-10'
);
INSERT INTO program VALUES
(
	12,
	'Metalico',
	'2022-12-13'
);
INSERT INTO program VALUES
(
	13,
	'Raptor',
	'2022-12-26'
);
INSERT INTO program VALUES
(
	14,
	'Rex',
	'2022-12-01'
);
INSERT INTO program VALUES
(
	15,
	'Ptera',
	'2022-12-15'
);	
CREATE TABLE fligth
(
	number numeric PRIMARY KEY,
	date_flight date,
	empty_seats numeric,
	code_program numeric,
	model char(20)
);
INSERT INTO fligth VALUES
(
	111,
	'2022-12-26',
	200,
	13,
	'Comercial'
);
INSERT INTO fligth VALUES
(
	222,
	'2022-12-15',
	150,
	15,
	'Comercial'
);
INSERT INTO fligth VALUES
(
	333,
	'2022-12-01',
	90,
	14,
	'Animal'
);
INSERT INTO fligth VALUES
(
	444,
	'2022-12-10',
	120,
	11,
	'Transporte'
);
INSERT INTO fligth VALUES
(
	555,
	'2022-12-13',
	300,
	13,
	'Transporte'
);	
CREATE TABLE plane
(
	model char(20),
	capacity numeric,
	PRIMARY KEY (model)
);
INSERT INTO plane VALUES
(
	'Comercial',
	'500'
);
INSERT INTO plane VALUES
(
	'Transporte',
	300
);
INSERT INTO plane VALUES
(
	'Animal',
	150
);
CREATE TABLE scale 
(
	number numeric,
	number_fligth numeric,
	code_airport_arrive numeric,
	code_airport_departure numeric,
	PRIMARY KEY (number)
);
INSERT INTO scale VALUES
(
	9,
	111,
	11111111,
	33333333
);
INSERT INTO scale VALUES
(
	8,
	222,
	33333333,
	44444444
);
INSERT INTO scale VALUES
(
	7,
	333,
	22222222,
	11111111
);
INSERT INTO scale VALUES
(
	6,
	444,
	55555555,
	33333333
);
INSERT INTO scale VALUES
(
	5,
	555,
	44444444,
	11111111
);
CREATE TABLE land
(
	code_airport numeric, 
	model_airplane char(20),
	PRIMARY KEY (code_airport, model_airplane)
);
INSERT INTO land VALUES
(
	11111111,
	'Comercial'
);
INSERT INTO land VALUES
(
	22222222,
	'Comercial'
);
INSERT INTO land VALUES
(
	33333333,
	'Animal'
);	
INSERT INTO land VALUES
(
	44444444,
	'Transporte'
);
INSERT INTO land VALUES
(
	55555555,
	'Animal'
);
CREATE TABLE has
(
	code_airport numeric,
	code_program numeric,
	PRIMARY KEY (code_airport, code_program)
);
INSERT INTO has VALUES
(
	11111111,
	11
);
INSERT INTO has VALUES
(
	22222222,
	12
);
INSERT INTO has VALUES
(
	33333333,
	13
);
INSERT INTO has VALUES
(
	44444444,
	14
);
INSERT INTO has VALUES
(
	55555555,
	15
);
ALTER TABLE airport
ADD FOREIGN KEY (code_airport)
references airport (code_airport);
ALTER TABLE fligth
ADD FOREIGN KEY (code_program)
references program (code_program);
ALTER TABLE fligth
ADD FOREIGN KEY (model)
references plane (model);