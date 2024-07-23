DROP DATABASE IF EXISTS alerline;

CREATE DATABASE alerline;

\c alerline;

--ENCRYPT PASSWORDS

CREATE EXTENSION IF NOT EXISTS pgcrypto;

--USERS TABLES

CREATE TABLE roles(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE users
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol_id INT REFERENCES roles (id)
);

CREATE TABLE permissions
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE roles_permissions
(
    id SERIAL PRIMARY KEY,
    rol_id SERIAL REFERENCES roles(id),
    permission_id SERIAL REFERENCES permissions (id)
);

INSERT INTO roles (name) VALUES ('owner_alerline');
INSERT INTO roles (name) VALUES ('owner_airport');
INSERT INTO roles (name) VALUES ('owner_airline');
INSERT INTO roles (name) VALUES ('register');

INSERT INTO users (name, lastname, email, password, rol_id) VALUES ('Aleksander', 'Trujillo', 'aleksander@alerline.es', '12345aleks', 1);
INSERT INTO users (name, lastname, email, password, rol_id) VALUES ('Manolo', 'Fernandez', 'manolo@alerline.es', '12345manolo', 2);
INSERT INTO users (name, lastname, email, password, rol_id) VALUES ('Jose', 'Hernandez', 'jose@alerline.es', '12345jose', 3);


INSERT INTO permissions (name) VALUES ('create');
INSERT INTO permissions (name) VALUES ('select');
INSERT INTO permissions (name) VALUES ('update');
INSERT INTO permissions (name) VALUES ('delete');
INSERT INTO permissions (name) VALUES ('owner_alerline');
INSERT INTO permissions (name) VALUES ('owner_airport');
INSERT INTO permissions (name) VALUES ('owner_airline');

INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,5); --rol: alerline / permission CREATE/SELECT/UPDATE/DELETE and owner alerline
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,1);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,2);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,3);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,4);

INSERT INTO roles_permissions (rol_id, permission_id) VALUES (2,6); --rol: airport / permission CREATE/SELECT/UPDATE/DELETE and owner alerline
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,1);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,2);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,3);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,4);


INSERT INTO roles_permissions (rol_id, permission_id) VALUES (3,7); --rol: airline / permission CREATE/SELECT/UPDATE/DELETE and owner alerline
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,1);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,2);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,3);
INSERT INTO roles_permissions (rol_id, permission_id) VALUES (1,4);


INSERT INTO roles_permissions (rol_id, permission_id) VALUES (4,2); --rol: user / permission SELECT

--AIRPORT TABLES

CREATE TABLE countrys
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) not null
);

CREATE TABLE airports
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    country_id SERIAL REFERENCES countrys (id)
);

CREATE TABLE citys
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    country_id SERIAL REFERENCES countrys (id)
);

INSERT INTO countrys (name) VALUES ('Spain');
INSERT INTO countrys (name) VALUES ('Portugal');
INSERT INTO countrys (name) VALUES ('Germany');
INSERT INTO countrys (name) VALUES ('France');
INSERT INTO countrys (name) VALUES ('Italy');

INSERT INTO airports (name, country_id) VALUES ('air_granada', 1);
INSERT INTO airports (name, country_id) VALUES ('air_valencia', 1);
INSERT INTO airports (name, country_id) VALUES ('air_barcelona', 1);
INSERT INTO airports (name, country_id) VALUES ('air_paris', 4);
INSERT INTO airports (name, country_id) VALUES ('air_marselle', 4);

INSERT INTO citys (name, country_id) VALUES ('Granada', 1);
INSERT INTO citys (name, country_id) VALUES ('Valencia', 1);
INSERT INTO citys (name, country_id) VALUES ('Barcelona', 1);
INSERT INTO citys (name, country_id) VALUES ('Paris', 4);
INSERT INTO citys (name, country_id) VALUES ('Marsella', 4);


--AIRLINES TABLES

CREATE TABLE airlines
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    foundation DATE NOT NULL
);

CREATE TABLE planes
(
    id SERIAL PRIMARY KEY,
    plate VARCHAR(255) NOT NULL,
    capacity INT,
    airline_id SERIAL REFERENCES airlines (id)
);

CREATE TABLE travels
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    airline_id SERIAL REFERENCES airlines (id),
    arrive_date DATE NOT NULL,
    departure_date DATE NOT NULL,
    plane_id SERIAL REFERENCES planes (id),
    price NUMERIC(10, 2) NOT NULL,
    city_arrived SERIAL REFERENCES citys (id),
    city_departured SERIAL REFERENCES citys (id)
);

INSERT INTO airlines (name, foundation) VALUES ('pajarologo', '1997-01-26'); 
INSERT INTO airlines (name, foundation) VALUES ('ornitoptero', '2005-06-16');
INSERT INTO airlines (name, foundation) VALUES ('pajarosmetalicos', '1867-12-26');

INSERT INTO planes (plate, capacity, airline_id) VALUES ('3569-DHG', 70, 1);
INSERT INTO planes (plate, capacity, airline_id) VALUES ('9863-FKA', 120, 1);
INSERT INTO planes (plate, capacity, airline_id) VALUES ('5123-MNA', 100, 1);
INSERT INTO planes (plate, capacity, airline_id) VALUES ('1536-ASD', 50, 2);
INSERT INTO planes (plate, capacity, airline_id) VALUES ('6541-FSD', 65, 2);
INSERT INTO planes (plate, capacity, airline_id) VALUES ('4658-HCS', 100, 3);

INSERT INTO travels (name, airline_id, arrive_date, departure_date, plane_id, price, city_arrived, city_departured) VALUES ('first love', 1, '2024-07-04', '2024-07-03', 1, 150, 5, 1);
INSERT INTO travels (name, airline_id, arrive_date, departure_date, plane_id, price, city_arrived, city_departured) VALUES ('vacations', 1, '2024-07-04', '2024-06-03', 2, 450, 3, 1);

CREATE TABLE airport_airline
(
    id SERIAL PRIMARY KEY,
    airport_id SERIAL REFERENCES airports (id),
    airline_id SERIAL REFERENCES airlines (id)
);

INSERT INTO airport_airline (airport_id, airline_id) VALUES (1,1);
INSERT INTO airport_airline (airport_id, airline_id) VALUES (1,2);
INSERT INTO airport_airline (airport_id, airline_id) VALUES (1,3);
INSERT INTO airport_airline (airport_id, airline_id) VALUES (2,2);
INSERT INTO airport_airline (airport_id, airline_id) VALUES (3,1);