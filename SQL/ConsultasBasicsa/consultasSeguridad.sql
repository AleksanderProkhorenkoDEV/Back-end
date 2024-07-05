--Ejercicio1

CREATE USER root WITH PASSWORD 'a'
;

--Ejercicio2 

CREATE USER myuser WITH PASSWORD 'mypass'
;

--Ejercicio3

CREATE USER testUser WITH PASSWORD 'testpwd'
;

GRANT SELECT, UPDATE ON ALL TABLES IN SCHEMA public to testUser
;

--Ejercicio4 

CREATE USER customer1 WITH PASSWORD 'customer1'
;

--Ejercicio5

DROP USER myuser 
;

DROP USER localhost
;

--Ejercicio6

ALTER ROLE root WITH PASSWORD 'rootpwd2'
;

--Ejercicio7

CREATE USER grantUser WITH PASSWORD 'grantpwd'
;
GRANT SELECT, INSERT ON ALL TABLES IN SCHEMA public to grantUser WITH GRANT OPTION
;

--GRANT GRANT OPTION ON DATABASE public TO grantUser;

--Ejercicio8

REVOKE UPDATE ON ALL SEQUENCES IN SCHEMA public FROM testUser
;

--Ejercicio9 


\du testuser

--Ejercicio10 

CREATE USER admin WITH PASSWORD 'admin';
CREATE USER operador1 WITH PASSWORD 'operador1';
CREATE USER operador2 WITH PASSWORD 'operador2';

GRANT ALL PRIVILEGES ON DATABASE sakila TO admin;

--OPERADOR1--

-- Otorgar acceso de lectura a todas las tablas
GRANT SELECT ON ALL TABLES IN SCHEMA public TO operador1;

-- Otorgar acceso de consulta a la tabla payment
GRANT SELECT ON payment TO operador1;

-- Revocar permiso de modificación de estructura en todas las tablas
REVOKE ALL ON ALL TABLES IN SCHEMA public FROM operador1;

--OPERADOR2--