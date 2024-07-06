DROP DATABASE ejercicio;
CREATE DATABASE ejercicio;
\c ejercicio
CREATE TABLE employees
(
	employee_id numeric PRIMARY KEY,
	first_name char(30),
	last_name char(30),
	birthdate date,
	address char(40),
	gender char(15),
	salary money,
	supervisor_id numeric,
	department_id numeric
);
INSERT INTO employees VALUES
(
	11111111,
	'Antonio',
	'Ruiz',
	'2000-01-10',
	'c/Paseo de San Telmo',
	'Masculino',
	1200,
	null,
	null
);
INSERT INTO employees VALUES
(
	222222222,
	'Maria',
	'Jimenez',
	'2001-02-10',
	'c/Fernando de los Ríos',
	'Femenino',
	1201,
	11111111,
	22
);
INSERT INTO employees VALUES
(
	333333333,
	'Lucia',
	'Martinez',
	'2002-02-11',
	'c/Ruiz de Padrón',
	'Femenino',
	1100,
	11111111,
	22
);
INSERT INTO employees VALUES
(
	444444444,
	'Marcos',
	'Gutierrez',
	'2000-03-16',
	'c/Real',
	'Masculino',
	1300,
	22222222,
	33
);
INSERT INTO employees VALUES
(
	555555555,
	'Juan',
	'Rodriguez',
	'2003-06-26',
	'c/Domingo',
	'Masculino',
	null,
	22222222,
	11
);	
CREATE TABLE projects
(
	project_id numeric PRIMARY KEY,
	name char(20),
	place char(20),
	butget money,
	department_id numeric
);
INSERT INTO projects VALUES
(
	9,
	'Marcos',
	'San Lucas',
	30000,
	44
);
INSERT INTO projects VALUES
(
	10,
	'Lucia',
	'Sidney',
	25000,
	33
);
INSERT INTO projects VALUES
(
	11,
	'Antonio',
	'Granada',
	28000,
	11
);
INSERT INTO projects VALUES
(
	12,
	'Juan',
	'Siberia',
	31000,
	55
);
INSERT INTO projects VALUES
(
	13,
	'Maria',
	'Asturias',
	29000,
	22
);	
CREATE TABLE departments
(
	department_id numeric PRIMARY KEY,
	name char(20),
	manager_id numeric
);
INSERT INTO departments VALUES
(
	55,
	'Desarrollo',
	555555555
);
INSERT INTO departments VALUES
(
	44,
	'Investigación',
	444444444
);
INSERT INTO departments VALUES
(
	33,
	'Aplicación',
	333333333
);
INSERT INTO departments VALUES
(
	22,
	'Sostenibilidad',
	222222222
);
INSERT INTO departments VALUES
(
	11,
	'Economía',
	111111111
);	

CREATE TABLE works_in
(
	employee_id integer,
	project_id numeric,
	total_time time,
	PRIMARY KEY (employee_id, project_id)
);
INSERT INTO works_in
(
	11111111,
	12,
	'3:50:23'
);
INSERT INTO works_in
(
	22222222,
	13,
	'2:50:23'
);
INSERT INTO works_in
(
	33333333,
	10,
	'1:50:23'
);
ALTER TABLE employees
ADD FOREIGN KEY (department_id)
references departments (department_id);

ALTER TABLE employees
ADD FOREIGN KEY (supervisor_id)
references employees (employee_id);

ALTER TABLE projects
ADD FOREIGN KEY (department_id)
references departments (department_id);

ALTER TABLE departments
ADD FOREIGN KEY (manager_id)
references employees (employee_id);

ALTER TABLE works_in
ADD FOREIGN KEY (employee_id)
references employees (employee_id);

ALTER TABLE works_in
ADD FOREIGN KEY (project_id)
references projects (project_id);

SELECT salary, first_name FROM employees;

SELECT DISTINCT(salary) FROM employees;

SELECT first_name, last_name 
FROM employees
WHERE department_id = '22' 
;

SELECT first_name, last_name
FROM employees
WHERE  department_id = '11' 
UNION
SELECT first_name, last_name
FROM employees
WHERE  department_id = '11' 
;

SELECT first_name
FROM employees
WHERE salary  is null
;

SELECT name
FROM projects
WHERE place = 'Sidney'
;
SELECT place
FROM projects
WHERE place LIKE 'S%'
;

SELECT first_name, last_name
FROM employees
WHERE supervisor_id is null
;
SELECT first_name, last_name, employee_id
FROM employees
WHERE supervisor_id is null
;

SELECT name
FROM departments
WHERE name = 'Investigación'
;

SELECT department_id, manager_id
FROM departments
WHERE name = 'Investigación'
;

SELECT first_name, supervisor_id
FROM employees
;

SELECT * FROM employees 
LEFT JOIN departments 
ON employee_id = manager_id
;

SELECT * FROM employees
LEFT JOIN departments
ON first_name = name
;

SELECT sum(salary) FROM employees
;

