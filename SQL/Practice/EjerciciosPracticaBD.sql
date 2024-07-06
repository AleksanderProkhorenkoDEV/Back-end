--6.1
--Descripción: Dado un código de pedido la función debe calcular la suma total del
--pedido. Tenga en cuenta que un pedido puede contener varios productos diferentes y
--varias cantidades de cada producto.
--Parámetros de entrada: codigo_pedido (INT)
--Salida: el precio total del pedido (FLOAT)

CREATE OR REPLACE FUNCTION obtenerDineroPorCodigoPedido (codigo integer)
returns decimal
language plpgsql
as
$$
declare
    suma decimal:= 0;
begin
    SELECT SUM(detalle_pedido.cantidad * detalle_pedido.precio_unidad) 
    INTO suma
    FROM detalle_pedido
    WHERE obtenerDineroPorCodigoPedido.codigo = detalle_pedido.codigo_pedido;

    return suma;

end;
$$;

--6.2
--Descripción: Dado un código de cliente la función debe calcular la suma total de todos
--los pedidos realizados por el cliente. Deberá hacer uso de la función
--calcular_precio_total_pedido que ha desarrollado en el apartado anterior.
--Parámetros de entrada: codigo_cliente (INT)

CREATE OR REPLACE FUNCTION calcularPagoTotalCliente(codigoCliente integer)
returns decimal
language plpgsql
as
$$
declare 
    suma decimal := 0;
    codigoPedido integer:= 0;
begin
    SELECT codigo_pedido 
    INTO codigoPedido
    FROM pedido
    WHERE calcularPagoTotalCliente.codigoCliente = pedido.codigo_cliente;

    suma := obtenerDineroPorCodigoPedido (codigoPedido);
    return suma;

end;
$$;

--6.3
--Función: calcular_suma_pagos_cliente
--Descripción: Dado un código de cliente la función debe calcular la suma total de los
--pagos realizados por ese cliente.
--Parámetros de entrada: codigo_cliente (INT)
--Salida: la suma total de todos los pagos del cliente (FLOAT)

CREATE OR REPLACE FUNCTION calcutarSumaPagoTotalCliente(codigoCliente integer)
returns decimal
language plpgsql
as
$$
declare
    suma decimal :=0;
begin
    SELECT SUM(total) 
    INT suma
    FROM pago
    WHERE calcutarSumaPagoTotalCliente.codigoCliente = pago.codigo_cliente;

    return suma;
end;
$$;

--6.4
--Descripción: Deberá calcular los pagos pendientes de todos los clientes. Para saber si un
--cliente tiene algún pago pendiente deberemos calcular cuál es la cantidad de todos los
--pedidos y los pagos que ha realizado. Si la cantidad de los pedidos es mayor que la de
--los pagos entonces ese cliente tiene pagos pendientes.
--Deberá insertar en una tabla llamada clientes_con_pagos_pendientes los siguientes
--datos: id_cliente, suma_total_pedidos, suma_total_pagos, pendiente_de_pago (si la tabla
--no existe se debe crear)

CREATE OR REPLACE PROCEDURE pagosPendientesClientes()
as
$$
declare
    codigo integer;
    sumaTotalPagos decimal;
    sumaTotalPedidos decimal;
    pagosPendientes decimal;
BEGIN
    CREATE TABLE IF NOT EXISTS clientesConPagos(
        ClienteID integer,
        sumaTotalPagos decimal,
        sumaTotalPedidos decimal,
        pagosPendientes decimal
    );
    FOR codigo IN SELECT DISTINCT codigo_cliente FROM pedido
        LOOP
            sumaTotalPagos := calcutarSumaPagoTotalCliente(codigo);
            sumaTotalPedidos := calcularPagoTotalCliente(codigo);
            IF sumaTotalPedidos < sumaTotalPagos THEN
                pagosPendientes :=  sumaTotalPagos - sumaTotalPedidos;
                INSERT INTO clientesConPagos(
                    ClienteID,
                    sumaTotalPagos,
                    sumaTotalPedidos,
                    pagosPendientes
                )
                VALUES (codigo, sumaTotalPagos, sumaTotalPedidos, pagosPendientes);
            END IF;
        END LOOP;
        
END;
$$
language plpgsql;

--7
--Escribir un procedimiento que modifique la localidad de una oficina de la base de datos de
--jardinería. El procedimiento recibirá como parámetros el número y la localidad nueva.

CREATE OR REPLACE PROCEDURE modificarLocalidad(numeroTelefono varchar, localidadNueva varchar)
as
$$  
BEGIN
    UPDATE oficina
    SET oficina.ciudad = modificarLocalidad.localidadNueva;
    WHERE modificarLocalidad.numeroTelefono = oficina.telefono;     
END;
$$
language plpgsql;

--8
--En la base de datos de departamentos, empleados y proyectos, codificar un procedimiento
--que reciba como parámetros un número de departamento, un importe y un porcentaje; y suba
--el salario a todos los empleados del departamento indicado en la llamada. La subida será el
--porcentaje o el importe indicado en la llamada (el que sea más beneficioso para el empleado
--en cada caso empleado)

CREATE OR REPLACE PROCEDURE subidaSalariosEmpleados(numeroDepartamento integer, importe decimal, porcentaje decimal)
as
$$  
declare
    salario decimal;
    incremento_porcentaje decimal;
    id_empleado integer;
    salario_final decimal;
BEGIN
    FOR salario, id_empleado IN SELECT employees.salary, employees.employee_id FROM employees WHERE numeroDepartamento = employees.department_id
        LOOP 
            incremento_porcentaje := (salario * porcentaje)/100;
            IF incremento_porcentaje > importe THEN 
                salario_final := salario + incremento_porcentaje;
            ELSE 
                salario_final := salario + importe;
            END IF; 
            UPDATE employees 
            SET salary = salario_final
            WHERE  employees.employee_id = id_empleado;
        END LOOP;
END;
$$
language plpgsql;

--9
--En la misma base de datos del ejercicio anterior, escribir un procedimiento que suba el
--sueldo de todos los empleados que ganen menos que el salario medio de su oficio. La subida
--será del 50% de la diferencia entre el salario del empleado y la media de su oficio. Se deberá
--asegurar que la transacción no se quede a medias, y se gestionarán los posibles errores.

CREATE OR REPLACE PROCEDURE subidaSalariosEmpleados()
as
$$ declare
    dep_avg_sal RECORD;
    employee_data RECORD;
    subida DECIMAL;
begin
        FOR dep_avg_sal IN SELECT department_id,avg(salary::decimal) AS average FROM employees GROUP BY department_id
            LOOP
                /*raise notice 'ID DEPARTAMENTO: %',dep_avg_sal.department_id;
                raise notice 'ID AVG: %',dep_avg_sal.average;*/
                FOR employee_data IN SELECT employee_id,salary::Decimal FROM employees WHERE department_id=dep_avg_sal.department_id
                    LOOP
                        /*raise notice '   ID EMPLEADO: %',employee_data.employee_id;
                        raise notice '   SALARIO    : %',employee_data.salary;*/
                        IF employee_data.salary<dep_avg_sal.average THEN
                            subida:=0.5*(dep_avg_sal.average-employee_data.salary);
                            /*raise notice '          Subida prevista es de: %',subida;*/
                            UPDATE employees
                            SET salary=salary+subida::money
                            WHERE employee_id=employee_data.employee_id;
                        END IF;
                    END LOOP;
            END LOOP;
end; $$




--11
--Cambiar la solución del ejercicio anterior para permitir la eliminación físicamente del
--registro de la tabla empleados pero guardar una copia del registro eliminado en una tabla
--llamada ex_empleados, guardando también en esa tabla la fecha de la baja.

--12
--En la base de datos de jardinería, queremos que no se puedan eliminar físicamente los
--pedidos. Por tanto, en vez de eliminarlos, se marcarán como baja. Para ello debemos añadir
--a la tabla de pedidos un campo baja que contendrá un valor lógico TRUE o FALSE (no
--podrá contener ningún otro valor). Por defecto estará puesto a FALSE (no se ha borrado) y
--cuando se intente borrar el pedido, en vez de borrar el pedido se cambiará el valor de este
--campo.
ALTER TABLE pedido ADD COLUMN baja boolean DEFAULT false;

CREATE OR REPLACE FUNCTION eliminarPedido()
returns TRIGGER
as
$$
declare

BEGIN    
        UPDATE pedido
        SET baja = true
        WHERE  codigo_pedido = OLD.codigo_pedido;
    return null;
END;
$$
language plpgsql;

CREATE TRIGGER registroDeleteEliminarPedido
BEFORE DELETE ON pedido
FOR EACH ROW
EXECUTE FUNCTION eliminarPedido();