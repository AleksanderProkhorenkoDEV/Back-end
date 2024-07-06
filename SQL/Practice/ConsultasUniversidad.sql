--Ejercicio 4 (1.5.4)

SELECT nombre, apellido, apellido2 FROM persona
WHERE tipo = 'profesor' 
AND nif LIKE '%K'
AND telefono LIKE ''
;

--Ejercicio5 (1.5.6)

SELECT DISCTINCT nombre FROM departamento AS dep 
INNER JOIN profesor AS prof ON dep.id_departamento = prof.id_departamento
INNER JOIN asignatura AS asig ON prof.id_profesor = asig.id_profesor
INNER JOIN grado ON grado.id = asig.id_profesor
WHERE grado.nombre LIKE 'Grado en Ingener%a Inform%tica (Plan 2015)'
;

--Ejercicio6

SELECT DISTINCT nombre, apellido1, apellido2 FROM persona
INNER JOIN matricula AS matricula ON persona.id = matricula.id_alumno
INNER JOIN curso_escolar AS curso ON matricula.id_curso_escolar = curso.id 
WHERE inicio=2018 OR fin=2019
;

--Ejercicio5 left or rigth

SELECT asignatura.nombre, profesor.id_profesor FROM asignatura 
LEFT JOIN profesor ON asignatura.id_profesor=profesor.id_profesor
WHERE profesor.id_profesor IS NULL
;

--Ejercicio6 left or rigth

SELECT departamento.nombre, asignatura.nombre FROM departamento
LEFT JOIN profesor ON departamento.id = profesor.id_departamento
LEFT JOIN asignatura ON asignatura.id_profesor = profesor.id_profesor
LEFT JOIN matricula ON matricula.id_asignatura = asignatura.id
WHERE matricula.id_curso_escolar IS NULL
;

--Ejercicio6 Left 
SELECT DISTINCT dep.nombre, asig.nombre, asig.id FROM asignatura AS asig
LEFT JOIN matricula ON asig.id = matricula.id_asignatura
LEFT JOIN profesor AS prof ON asig.id_profesor = prof.id_profesor
LEFT JOIN departamento AS dep ON prof.id_departamento = dep.id
WHERE matricula.id_asignatura IS NULL 
ORDER BY asig.id
;

--Ejercicio1 1.5.7 

SELECT COUNT(sexo) FROM persona
WHERE tipo = 'alumno' AND sexo = 'M'
;

--Ejercicio6 1.5.7

SELECT grado.nombre, COUNT(asignatura.nombre) FROM grado 
INNER JOIN asignatura ON grado.id = asignatura.id_grado
GROUP BY grado.nombre
HAVING COUNT(asignatura.nombre) > 40
;

--Ejercicio7 1.5.7

SELECT grado.nombre, asignatura.tipo, SUM(creditos) AS "Total de creditos" FROM grado 
INNER JOIN asignatura ON grado.id = asignatura.id_grado
GROUP BY grado.nombre, asignatura.tipo
ORDER BY grado.nombre, SUM(creditos) DESC
;

--Ejercicio8 1.5.7

SELECT curso_escolar.inicio, COUNT(DISTINCT id_alumno) FROM matricula 
INNER JOIN curso_escolar ON matricula.id_curso_escolar = curso_escolar.id
GROUP BY curso_escolar.inicio 
;

--Ejercicio9 1.5.7

SELECT persona.id, persona.nombre, apellido1, apellido2, COUNT(asignatura.id) FROM persona
LEFT JOIN asignatura ON persona.id = asignatura.id_profesor
GROUP BY persona.id, persona.nombre, apellido1, apellido2
ORDER BY COUNT(asignatura.id) DESC
;

--Ejercicio SubConsultar

SELECT nombre, apellido1, apellido2 FROM persona 
WHERE  tipo = 'alumno' AND fecha_nacimiento = (
	SELECT MAX(fecha_nacimiento) FROM persona
		WHERE tipo = 'alumno'
	);

SELECT nombre, apellido1, apellido2 FROM persona
WHERE tipo = 'alumno'
ORDER BY fecha_nacimiento DESC 
LIMIT 1
;

--Ejercicio2 SubConsultas

SELECT persona.nombre, persona.apellido1, persona.apellido2 FROM persona
WHERE persona.id IN (
	SELECT profesor.id_profesor FROM profesor
	WHERE id_departamento IS NULL
	)
;