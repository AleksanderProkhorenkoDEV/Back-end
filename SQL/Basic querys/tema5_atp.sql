---CONSULTAS JARDINERIA---

--Ejercicio 1.4.5.10
--Devuelve el nombre de los clientes a los que no se les ha entregado a tiempo un pedido.

SELECT nombre_cliente FROM cliente
INNER JOIN pedido ON cliente.codigo_cliente = pedido.codigo_cliente
WHERE fecha_entrega <> fecha_esperada
;

--Ejercicio  1.4.6.9
--Devuelve un listado de los productos que nunca han aparecido en un pedido. El resultado 
--debe mostrar el nombre, la descripción y la imagen del producto

SELECT COUNT(producto.nombre), producto.nombre, gama_producto.descripcion_texto, gama_producto.imagen FROM producto
LEFT JOIN gama_producto ON gama_producto.gama = producto.gama
LEFT JOIN detalle_pedido ON producto.codigo_producto = detalle_pedido.codigo_producto
GROUP BY producto.nombre, gama_producto.descripcion_texto, gama_producto.imagen
HAVING COUNT(producto.nombre) < 1
;


--Ejercicio  1.4.7.12
--Calcula el número de productos diferentes que hay en cada uno de los pedidos

SELECT COUNT(nombre), nombre FROM producto
INNER JOIN detalle_pedido ON producto.codigo_producto = detalle_pedido.codigo_producto
WHERE producto.codigo_producto = detalle_pedido.codigo_producto
GROUP BY nombre
;

--Ejercicio 1.4.7.14
--Devuelve un listado de los 20 productos más vendidos y el número total de unidades 
--que se han vendido de cada uno. El listado deberá estar ordenado por 
--el número total de unidades vendidas.

SELECT COUNT(nombre), nombre FROM producto
INNER JOIN detalle_pedido ON producto.codigo_producto = detalle_pedido.codigo_producto
GROUP BY nombre
ORDER BY COUNT(nombre) DESC
LIMIT 20
;
  
--Ejercicio 1.4.8.1.2
--Devuelve el nombre del producto que tenga el precio de venta más caro.

SELECT nombre FROM producto
WHERE precio_venta = (
	SELECT MAX(precio_venta) FROM producto
	)
;

--Ejercicio 1.4.8.1.5
--Devuelve el producto que más unidades tiene en stock.

SELECT nombre FROM producto
WHERE cantidad_en_stock = (
	SELECT MAX(cantidad_en_stock) FROM producto
	)
LIMIT 1
;

--Puse el Limit 1 para mostrar unicamente un solo producto ya que hay muchos que tienen el stock
--al maximo, en caso de que se quieran ver todos se quita y solucionado.

--Ejercicio 1.4.8.2.8
--Devuelve el nombre del cliente con mayor límite de crédito.

SELECT nombre_cliente FROM cliente
WHERE limite_credito = ANY  (
	SELECT MAX(limite_credito) FROM cliente
	GROUP BY limite_credito
	ORDER BY MAX(limite_credito) DESC
	LIMIT 1
	)
;


--Ejercicio 1.4.8.3.16
--Devuelve las oficinas donde no trabajan ninguno de los empleados que hayan sido los 
--representantes de ventas de algún cliente que haya realizado la compra de algún producto 
--de la gama Frutales.


--Ejercicio 1.4.8.4.20
--Devuelve un listado de los productos que nunca han aparecido en un pedido. 


SELECT COUNT(producto.nombre), producto.nombre, gama_producto.descripcion_texto, gama_producto.imagen
FROM producto
INNER JOIN gama_producto ON gama_producto.gama = producto.gama
WHERE NOT EXISTS (
  SELECT *
  FROM detalle_pedido
  WHERE producto.codigo_producto = detalle_pedido.codigo_producto
)
GROUP BY producto.nombre, gama_producto.descripcion_texto, gama_producto.imagen
HAVING COUNT(producto.nombre) < 1
;

--Ejercicio 1.4.9.4
--Devuelve el nombre del cliente, el nombre y primer apellido de su representante de ventas y el número
--de teléfono de la oficina del representante de ventas, de aquellos
--clientes que no hayan realizado ningún pago

	

SELECT nombre_cliente, empleado.nombre, empleado.apellido1, oficina.telefono FROM cliente
INNER JOIN empleado ON cliente.codigo_empleado_rep_ventas = empleado.codigo_empleado
INNER JOIN oficina ON oficina.codigo_oficina = empleado.codigo_oficina
INNER JOIN pago ON pago.codigo_cliente = cliente.codigo_cliente
WHERE cliente.codigo_empleado_rep_ventas = empleado.codigo_empleado
AND pago.fecha_pago IS NULL 
AND pago.codigo_cliente = cliente.codigo_cliente
;























 








