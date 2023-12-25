--10
--Escribir un disparador en la base de datos de los ejercicios anteriores que haga fallar
--cualquier operación de modificación del apellido o del número de un empleado, o que
--suponga una subida de sueldo superior al 10%.

CREATE OR REPLACE FUNCTION disparadorModificacionApellidoID()
RETURNS TRIGGER
AS 
$$
DECLARE
    
BEGIN
    IF NEW.last_name <> OLD.last_name THEN
    RAISE EXCEPTION 'No se puede modificar el apellido';
    END IF;
    IF NEW.employee_id <> OLD.employee_id THEN
    RAISE EXCEPTION 'No se puede modificar el id';
    END IF;
    return null;
END
$$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION disparadorModificacionSalario()
RETURNS TRIGGER
AS
$$
DECLARE
BEGIN
    IF NEW.salary::DECIMAL > (OLD.salary::DECIMAL * 1.1) THEN
       RAISE EXCEPTION 'La subida de sueldo debe ser superior al 10%%';        
    END IF;
    return NEW;
END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER disparadorEmpleado
BEFORE UPDATE ON employees 
FOR EACH ROW
EXECUTE FUNCTION disparadorModificacionApellidoID();

CREATE TRIGGER modificarSalarioTrigger
BEFORE UPDATE ON employees
FOR EACH ROW
EXECUTE FUNCTION disparadorModificacionSalario();

--13. 
--Queremos que se guarde en una tabla altas_empleados el historial de inserciones de registros
--realizadas en la tabla empleados, además de los datos del empleado se deberá guardar en la
--tabla el usuario que realizó la inserción del empleado y la fecha/hora de la operación. La
--primera vez que se ejecute el disparador deberá crear la tabla si no existe y rellenarla con los
--empleados que contenga la base de datos en ese momento.

CREATE OR REPLACE FUNCTION altaEmpleados()
RETURNS TRIGGER 
AS $$
DECLARE
    filaDatosTabla RECORD;
BEGIN
    
    IF NOT EXISTS(SELECT * FROM information_schema.tables WHERE table_name = 'altasEmpleado') THEN
        
        CREATE TABLE altasEmpleado(
            IdEmpleado integer PRIMARY KEY, nombreEmpleado character varying(50) DEFAULT NULL, apellido1Empleado character varying(50) DEFAULT NULL,
            apellido2Empleado character varying(50) DEFAULT NULL, extensionEmpleado character varying(10) DEFAULT NULL, emailEmpleado character varying(100) DEFAULT NULL,
            codigoOficinaEmpleado character varying(10) DEFAULT NULL, codigoJefe integer, puestoEmpleado character varying(50) DEFAULT NULL,
            fecha DATE DEFAULT NULL, usuarioPostgres VARCHAR(50)
        );
        
    END IF;
    
    FOR filaDatosTabla IN SELECT codigo_empleado,nombre,apellido1,apellido2,extension,email,codigo_oficina,codigo_jefe,puesto FROM empleado 
        LOOP
            INSERT INTO altasEmpleado(
                IdEmpleado,nombreEmpleado,apellido1Empleado,
                apellido2Empleado,extensionEmpleado,emailEmpleado,
                codigoOficinaEmpleado,codigoJefe,puestoEmpleado,
                fecha,usuarioPostgres
            )
            VALUES (
                filaDatosTabla.codigo_empleado,filaDatosTabla.nombre,filaDatosTabla.apellido1,
                filaDatosTabla.apellido2,filaDatosTabla.extension,filaDatosTabla.email,
                filaDatosTabla.codigo_oficina,filaDatosTabla.codigo_jefe,filaDatosTabla.puesto,
                filaDatosTabla.fecha,
                filaDatosTabla.usuarioPostgres
            );

        END LOOP;
    
    RETURN NEW;
END;
$$ 
LANGUAGE plpgsql;

CREATE TRIGGER altaTrigger 
BEFORE INSERT ON empleado
FOR EACH ROW
EXECUTE FUNCTION altaEmpleados();


--14
--Hacer que se actualicen automáticamente las existencias de los productos cuando se inserte
--un nuevo pedido o cuando se rectifique la cantidad de uno existente. Se supone que un
--pedido produce una reducción del stock (existencias) del producto.

CREATE OR REPLACE FUNCTION actualizarExistenciasInsert()
RETURNS TRIGGER
AS
$$
DECLARE
    
BEGIN
    IF cantidad_en_stock < NEW.cantidad THEN
        RAISE EXCEPTION 'No puede haber un total negativo';
    END IF;
    
    UPDATE producto
    SET cantidad_en_stock = cantidad_en_stock - NEW.cantidad
    WHERE codigo_producto = NEW.codigo_producto;
    
    RETURN NEW;
END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER actualizar_existencias_insert_trigger
AFTER INSERT ON detalle_pedido
FOR EACH ROW
EXECUTE FUNCTION actualizarExistenciasInsert();

CREATE OR REPLACE FUNCTION actualizarExistenciasUpdate()
RETURNS TRIGGER
AS
$$
DECLARE
    stockActual integer;
    stockNuevo integer;

BEGIN
    SELECT cantidad_en_stock 
    INTO stockActual
    FROM producto
    WHERE codigo_producto = NEW.codigo_producto;

    IF NEW.cantidad > OLD.cantidad THEN
       stockNuevo  := stockActual - (NEW.cantidad - OLD.cantidad);
    ELSEIF OLD.cantidad > NEW.cantidad THEN
        stockNuevo := (OLD.cantidad - NEW.cantidad) + stockActual;   
    END IF;
    UPDATE producto
    SET cantidad_en_stock = stockNuevo
    WHERE codigo_producto = NEW.codigo_producto;

    IF NEW.cantidad = OLD.cantidad THEN
        RAISE EXCEPTION 'No pueden ser iguales';
    END IF;    
    RETURN NEW;
END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER actualizar_existencias_update_trigger
AFTER UPDATE ON detalle_pedido
FOR EACH ROW
EXECUTE FUNCTION actualizarExistenciasUpdate();

