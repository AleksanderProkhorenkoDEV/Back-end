DROP DATABASE ejercicio1;
CREATE DATABASE ejercicio1;
\c ejercicio1

CREATE TABLE employees
(
	employee_id numeric,
	first_name char(30),
	last_name char(30),
	birthdate date,
	address char(40),
	gender char(15),
	salary money,
	supervisor_id numeric,
	department_id numeric,
	PRIMARY KEY (employee_id)
);

CREATE TABLE projects
(
	project_id numeric,
	name char(30),
	place char(20),
	butget money,
	department_id numeric,
	PRIMARY KEY (project_id)
);

CREATE TABLE departments
(
	department_id numeric,
	name char(30),
	manager_id numeric,
	PRIMARY KEY (department_id)
);

CREATE TABLE works_in
(
	employee_id integer,
	project_id numeric,
	total_time time,
	PRIMARY KEY (employee_id, project_id)
);
INSERT INTO employees VALUES
(
	11111111,
	'Juan',
	'Fernandez',
	'2000-01-26',
	'c/Larios',
	'Hombre',
	1500,
	null,
	99
);

INSERT INTO employees VALUES
(
	22222222,
	'Antonio',
	'Gutierrez',
	'1999-01-25',
	'c/Ron',
	'Hombre',
	1505,
	null,
	99
);

INSERT INTO employees VALUES
(
	33333333,
	'Manuela',
	'Jimenez',
	'1998-01-24',
	'c/Martini',
	'Mujer',
	null,
	11111111,
	77
);
INSERT INTO employees VALUES
(
	44444444,
	'Maria',
	'Lucena',
	'1997-01-23',
	'c/Whisky
	'Mujer',
	1599,
	22222222,
	66
);
INSERT INTO employees VALUES
(
	55555555,
	'Marcos',
	'Acosta',
	'1996-01-22',
	'c/Vozka
	'Hombre',
	1700,
	11111111,
	88
);
INSERT INTO projects VALUES
(
	11,
	'Vacunación',
	'c/Almodobar',
	20000,
	77
);
INSERT INTO projects VALUES
(
	22,
	'Cancer',
	'c/Pablo Motos',
	25000,
	77
);
INSERT INTO projects VALUES
(
	33,
	'Malformaciones',
	'c/DjMario',
	31000,
	88
);
INSERT INTO projects VALUES
(
	44,
	'Quistes',
	'c/DiGref',
	20000,
	99
);
INSERT INTO projects VALUES
(
	55,
	'Tumores',
	'c/Vegeta',
	27777,
	99
);
INSERT INTO departments VALUES
(
	99,
	'Alfonso X',
	11111111
);
INSERT INTO departments VALUES
(
	88,
	'Cristo Rey',
	22222222
);
INSERT INTO departments VALUES
(
	77,
	'Juan Carlos I',
	33333333
);
INSERT INTO departments VALUES
(
	66,
	'Ramon X',
	44444444
);
INSERT INTO works_in VALUES
(
	11111111,
	11,
	'3:50:23'
);
INSERT INTO works_in VALUES
(
	22222222,
	22,
	'2:50:23'
);
INSERT INTO works_in VALUES
(
	33333333,
	33,
	'1:50:23'
);
INSERT INTO works_in VALUES
(
	44444444,
	44,
	'1:25:45'
);
INSERT INTO works_in VALUES
(
	55555555,
	55,
	'1:20:00'
);
ALTER TABLE employees
ADD FOREIGN KEY (department_id)
references departments (department_id);

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
WHERE department_id = '88'
;


SELECT first_name, last_name
FROM employees
WHERE  department_id = '99' 
UNION
SELECT first_name, last_name
FROM employees
WHERE  department_id = '88' 
;

SELECT first_name
FROM employees
WHERE salary  is null
;

SELECT name
FROM projects
WHERE place = 'c/DiGref'
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
WHERE name = 'Ramon X'
;

SELECT department_id, manager_id
FROM departments
WHERE name = 'Alfonso X'
;

SELECT first_name, supervisor_id
FROM employees
;

SELECT * FROM employees 
left JOIN departments 
ON employee_id = manager_id
;

SELECT * FROM employees
LEFT JOIN departments
ON first_name = name
;

SELECT sum(butget) FROM projects 
;

SELECT name FROM projects 
WHERE department_id <> project_id
;

SELECT name, department_id FROM departments
ORDER BY name DESC
;

SELECT name, department_id FROM departments
ORDER BY name ASC
;

SELECT max(salary) FROM employees
;
SELECT min(salary) FROM employees
;

SELECT DISTINCT first_name, last_name
FROM employees 
INNER JOIN works_in ON employees.employee_id = works_in.employee_id
INNER JOIN projects ON works_in.project_id = projects.project_id
WHERE (place LIKE  'c/A%')
;

SELECT e1.first_name AS supervisor, e1.last_name AS supervisor, e2.first_name AS supervisado, e2.last_name AS supervisado
FROM employees AS e1 INNER JOIN employees AS e2
ON e1.employee_id = e2.supervisor_id
;        


