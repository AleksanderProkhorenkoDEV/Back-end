--Ejercicio21

CREATE VIEW ejercicio21 
AS (

	SELECT (nombre_contacto ||' '|| apellido_contacto) AS "Nombre Apellido", telefono, ciudad, pais, pedido.codigo_pedido , pedido.fecha_pedido, pedido.fecha_esperada, pedido.fecha_entrega, pago.id_transaccion ,SUM(detalle_pedido.cantidad) FROM cliente
	INNER JOIN pedido ON cliente.codigo_cliente = pedido.codigo_cliente
	INNER JOIN detalle_pedido ON pedido.codigo_pedido = detalle_pedido.codigo_pedido
	INNER JOIN pago ON pago.codigo_cliente = cliente.codigo_cliente
	GROUP BY nombre_cliente, apellido_contacto, telefono, ciudad, pais, pedido.codigo_pedido, pedido.fecha_pedido, pedido.fecha_esperada, pedido.fecha_entrega, pago.id_transaccion
);


--Ejercicio22

CREATE VIEW ejercicio22
AS(

	SELECT (nombre_contacto ||' '|| apellido_contacto) AS "Nombre Apellido", telefono, ciudad, pais, pedido.codigo_pedido , pedido.fecha_pedido, pedido.fecha_esperada, pedido.fecha_entrega, pago.id_transaccion ,SUM(detalle_pedido.cantidad * producto.precio_venta) FROM cliente
	INNER JOIN pedido ON cliente.codigo_cliente = pedido.codigo_cliente
	INNER JOIN detalle_pedido ON pedido.codigo_pedido = detalle_pedido.codigo_pedido
	INNER JOIN producto ON producto.codigo_producto = detalle_pedido.codigo_producto
	INNER JOIN pago ON pago.codigo_cliente = cliente.codigo_cliente
	GROUP BY nombre_contacto, apellido_contacto, telefono, ciudad, pais, pedido.codigo_pedido, pedido.fecha_pedido, pedido.fecha_esperada, pedido.fecha_entrega, pago.id_transaccion
);

--Ejercicio23

SELECT DISTINCT "Nombre Apellido" FROM ejercicio22 
WHERE ciudad = 'Madrid' 
;

--Ejercicio24

SELECT DISTINCT "Nombre Apellido" FROM ejercicio22
WHERE fecha_entrega IS NULL
;

--Ejercicio25

SELECT DISTINCT COUNT("Nombre Apellido"), "Nombre Apellido" FROM ejercicio22
GROUP BY "Nombre Apellido"
;

--Ejercicio26

SELECT DISTINCT MAX(SUM), MIN(SUM), "Nombre Apellido" FROM ejercicio22
GROUP BY "Nombre Apellido"
;

--Ejercicio27 

ALTER VIEW ejercicio22
RENAME TO ejercicioBorrado
;

SELECT * FROM ejercicioBorrado;

--EJERCICIO28

DROP VIEW ejercicioBorrado, ejercicio21
;

