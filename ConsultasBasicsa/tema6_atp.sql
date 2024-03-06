
--Ejercicios para creacion de Usuarios y permisos
--Ejercicio 1

CREATE ROL publicidad;
GRANT SELECT, INSERT, UPDATE, DELETE ON producto TO publicidad;
GRANT SELECT, INSERT, UPDATE, DELETE ON gama_producto TO publicidad;
GRANT SELECT, INSERT, UPDATE, DELETE ON cliente TO publicidad;

GRANT INSERT, DELETE ON producto TO publicidad;
GRANT INSERT, DELETE ON gama_producto TO publicidad;
GRANT INSERT, DELETE ON cliente TO Publicidad;

SELECT * FROM producto; 

--Ejercicio2

CREATE ROL comercial;
GRANT SELECT, INSERT, UPDATE ON pedido, cliente, producto, pago, gama_producto TO publicidad, comercial;
GRANT SELECT, UPDATE ON pedido, detalle_pedido TO comercial;
REVOKE DELETE ON pedido FROM comercial;

SELECT * FROM pedido;

--Ejercicio3
CREATE ROL tienda_en_linea;
GRANT SELECT, INSERT, UPDATE ON cliente TO tienda_en_lina;
GRANT SELECT, INSERT ON pago TO tienda_en_lina;
GRANT INSERT, UPDATE ON pedido, detalle_pedido TO tienda_en_lina;
GRANT SELECT ON producto, gama_producto TO tienda_en_linea;

SELECT * FROM cliente;

--Ejercicio4

CREATE ROL recurso_humano;
GRANT SELECT, INSERT, UPDATE, DELETE ON empleado TO recurso_humano;
GRANT SELECT ON oficina TO recurso_humano;
GRANT UPDATE (telefono, codigo_postal) ON oficina TO recurso_humano;

SELECT * FROM empleado; 

--Ejercicio5
CREATE ROL administrador;
GRANT ALL PRIVILEGES ON DATABASE jardineria TO administrador;

--Los permisos que se quieran otorgar dependerá de las necesidades 
--de lo que se quiera hacer y la privacidad que se necesite, por ejemplo 
--a una tabla en la que la información que se guarda son los registros de 
--ventas no se le darán permisos de edición a cualquier persona ya que se 
--podría borrar información necesaria al igual que al a la gestión de clientes
--con sus datos para poder leerlos y escribirlos.

--Por lo tanto se asignan permisos necesarios para cada usuario para que
--puedan manipular los datos sin crear ningún peligro ni tener informacion 
--de mas ni de menos


--EJERCICIOS DEL BLOQUE A
--Ejercicio1 Listado con la ciudad y el teléfono de las oficinas de España

CREATE VIEW Ejercicio1 
AS (
	SELECT telefono, ciudad FROM oficina
	WHERE pais LIKE 'Es%'
   )
;

--Ejercicio4 Listado de nombre, apellidos y cargo de los empleados 
--que NO sean directores de oficina

CREATE VIEW Ejercicio2
AS(
	SELECT nombre, apellido1, puesto FROM empleado
	WHERE puesto <> 'Director Oficina'
)
;

--Ejercicio7 Listado con el nombre de los todos los clientes españoles 
--junto al nombre completo (en un solo campo) de su representante de ventas

CREATE VIEW Ejercicio3 
AS(
	SELECT nombre_cliente, CONCAT(empleado.nombre, empleado.apellido1, empleado.apellido2) AS "Nombre Representante" FROM cliente
	INNER JOIN empleado ON cliente.codigo_empleado_rep_ventas = empleado.codigo_empleado
	WHERE pais = 'Spain' 
)
;


--Ejercicio10 Listado con el nombre de los clientes que hayan 
--realizado pagos junto con el nombrecompleto (en una sola columna) 
--de sus representantes de ventas

CREATE VIEW Ejercicio4
AS(
	SELECT DISTINCT nombre_cliente, CONCAT(empleado.nombre, empleado.apellido1, empleado.apellido2) AS "Nombre Representante" FROM cliente
	INNER JOIN empleado ON cliente.codigo_empleado_rep_ventas = empleado.codigo_empleado
	INNER JOIN pago ON pago.codigo_cliente = cliente.codigo_cliente
	WHERE pago.fecha_pago IS NOT NULL
)
;

--Ejericio13 3. Realizar una vista con la información del pedido
--(código, fecha de pedido, fecha esperada, fecha entrega, nombre cliente 
--y total en euros) ordenado por total de forma descendente

CREATE VIEW Ejercicio5
AS(
	SELECT pedido.codigo_pedido, pedido.fecha_pedido, pedido.fecha_esperada, pedido.fecha_entrega, cliente.nombre_cliente, producto.precio_venta FROM pedido
	INNER JOIN cliente ON cliente.codigo_cliente = pedido.codigo_cliente
	INNER JOIN detalle_pedido ON pedido.codigo_pedido = detalle_pedido.codigo_pedido
	INNER JOIN producto ON producto.codigo_producto = detalle_pedido.codigo_producto 
	GROUP BY  pedido.codigo_pedido, pedido.fecha_pedido, pedido.fecha_esperada, pedido.fecha_entrega, cliente.nombre_cliente, producto.precio_venta
	ORDER BY producto.precio_venta DESC
)
;

--Ejercicio16  Listado de los pedidos donde el precio 
--del mismo sea superior a la media de todos

CREATE VIEW Ejercicio6 
AS(
	SELECT AVG(detalle_pedido.precio_unidad) AS Media, pedido.codigo_pedido, pedido.fecha_pedido, pedido.fecha_esperada, pedido.fecha_entrega FROM pedido
	INNER JOIN detalle_pedido ON detalle_pedido.codigo_pedido = pedido.codigo_pedido
	GROUP BY  pedido.codigo_pedido, pedido.fecha_pedido, pedido.fecha_esperada, pedido.fecha_entrega
	HAVING AVG(detalle_pedido.precio_unidad) > 
       (SELECT AVG(precio_unidad) FROM detalle_pedido)
);

--Ejercicio19 . Crear una vista en la que se desglose
--la cantidad de pedidos, clientes, y total facturado porpaíses,
--ordenado por la última cifra

CREATE VIEW Ejercicio7
AS(
	SELECT 
		COUNT(DISTINCT detalle_pedido.cantidad) AS cantidad_pedidos,
		COUNT(cliente.nombre_cliente), 
		SUM(DISTINCT pago.total),
		cliente.pais 
	FROM detalle_pedido
		INNER JOIN pedido ON detalle_pedido.codigo_pedido = pedido.codigo_pedido
		INNER JOIN cliente ON cliente.codigo_cliente = pedido.codigo_cliente
		INNER JOIN pago ON pago.codigo_cliente = cliente.codigo_cliente
		GROUP BY  cliente.pais 
		ORDER BY  cliente.pais ASC
);
--Ordenador por ultima cifra, entiendo que es por el total de cada pais, para mi criterio.