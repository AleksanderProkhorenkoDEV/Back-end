--  1. Escribir una función que reciba dos números y devuelva su suma. A continuación, escribir
-- un procedimiento que muestre la suma al usuario.

CREATE OR REPLACE FUNCTION sumaDeNumeros(numeroX int, numeroY int) RETURNS int AS
$$
BEGIN
RETURN numeroX + numeroY;
END;
$$
LANGUAGE plpgsql;

-- 2. Codificar un procedimiento que reciba una cadena de texto y la visualice al revés.

CREATE OR REPLACE FUNCTION devolverCadenaDelReves(cadenaTexto varchar) RETURNS varchar AS
$$
BEGIN
RETURN REVERSE(cadenaTexto);
END;
$$
LANGUAGE plpgsql;
-- 3. Escribir una función que reciba una fecha y devuelva el año de la fecha (como número).

CREATE OR REPLACE FUNCTION devolverAnoFecha(fecha date) RETURNS int AS
$$
BEGIN
RETURN SELECT EXTRACT (YEAR FROM fecha);
END;
$$
LANGUAGE plpgsql;

-- 4. Dado el siguiente procedimiento:

CREATE OR REPLACE PROCEDURE crear_depart (
v_num_dept depart.dept_no%TYPE,
v_dnombre depart.dnombre%TYPE DEFAULT 'PROVISIONAL',
v_loc depart.loc%TYPE DEFAULT ‘PROVISIONAL’)
AS
$$ BEGIN
INSERT INTO depart VALUES (v_num_dept, v_dnombre, v_loc);
END; $$
LANGUAGE plpgsql;

--1º. crear_depart; No
--2º. crear_depart(50); Si
--3º. crear_depart('COMPRAS'); No
--4º. crear_depart(50,'COMPRAS'); Si
--5º. crear_depart('COMPRAS', 50); No
--6º. crear_depart('COMPRAS', 'VALENCIA'); No
--7º. crear_depart(50, 'COMPRAS', 'VALENCIA'); Si
--8º. crear_depart('COMPRAS', 50, 'VALENCIA'); No
--9º. crear_depart('VALENCIA', ‘COMPRAS’); No
--10º. crear_depart('VALENCIA', 50); No

-- 5. Codificar un procedimiento que reciba una lista de hasta 5 números y visualice su suma.

CREATE OR REPLACE FUNCTION sumaDe5numeros(numero1 int, numero2 int, numero3 int, numero4 int, numero5 int) RETURNS int AS
$$
BEGIN
RETURN numero1 + numero2 + numero3 + numero4 + numero5;
END;
$$
LANGUAGE plpgsql;

-- 6. Realizar los siguientes procedimientos y funciones sobre la base de datos de jardinería:
    -- 1. Función: calcular_precio_total_pedido