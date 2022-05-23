/*Vista de la tabla producto con sus inner join y case de activo y disponible */
CREATE VIEW v_producto AS
SELECT p.id_producto, p.producto, p.descripcion, p.especificacion, p.precio,
p.stock,
CASE
WHEN p.disponible = FALSE THEN 'No disponible'
WHEN p.disponible = TRUE THEN  'Disponible'
END AS disponible,
CASE
WHEN p.activo = FALSE THEN 'Inactivo'
WHEN p.activo = TRUE THEN  'Activo'
END AS activo, c.categoria, e.especie
FROM producto P
INNER JOIN categoria_especie ce on ce.id_categoria_especie = P.id_categoria_especie
INNER JOIN categoria c on c.id_categoria = ce.id_categoria
INNER JOIN especie e on e.id_especie = ce.id_especie;

SELECT * FROM v_producto ORDER BY id_producto desc

/* Vista creada para los usuarios */
CREATE VIEW v_usuario AS
SELECT id_usuario,username,pssword,email,concat(nombre, ' ', apellido) as nombre,
CASE
WHEN activo = false THEN 'Inactivo'
WHEN activo = true THEN 'Activo'
END AS activo, rol
FROM usuario
INNER JOIN rol r on r.id_rol = usuario.id_rol;
SELECT * FROM v_usuario order by id_usuario desc;

/* Vista creada para los clientes */
CREATE VIEW v_cliente AS
SELECT id_cliente,CONCAT(nombre,' ',apellido) AS nombre, username, pssword, email, municipio, departamento,direccion1, direccion2,
CASE
WHEN c.activo = TRUE THEN 'Activo'
WHEN c.activo = FALSE THEN 'Inactivo'
END AS activo
FROM cliente c
INNER JOIN municipio m on m.id_municipio = c.id_municipio
INNER JOIN departamento d on d.id_departamento = m.id_departamento;

SELECT * FROM v_cliente ;

/*  */
CREATE VIEW v_venta AS
SELECT id_venta, concat(c.nombre,' ',c.apellido) as nombre, fecha,
CASE
WHEN pago = TRUE THEN 'Pagado'
WHEN pago = FALSE THEN 'Sin pagar'
END AS pago, metodo_pago, ve.venta_estado, total
FROM venta v
INNER JOIN cliente c on c.id_cliente = v.id_cliente
INNER JOIN venta_estado ve on ve.id_venta_estado = v.id_venta_estado
SELECT * FROM v_venta

CREATE FUNCTION insert_stock() RETURNS TRIGGER AS
$$
BEGIN
    UPDATE producto SET
    stock = (stock + new.cantidad)
    WHERE id_producto = new.id_producto;
    RETURN NEW;
END
$$
language plpgsql;

CREATE FUNCTION update_stock() RETURNS TRIGGER AS
$$
BEGIN
    UPDATE producto SET
    stock = (stock - old.cantidad + new.cantidad)
    WHERE id_producto = new.id_producto;
    RETURN NEW;
END
$$
language plpgsql;

CREATE TRIGGER stock_ingreso_insert AFTER INSERT ON ingreso
FOR EACH ROW
EXECUTE PROCEDURE insert_stock();

CREATE TRIGGER stock_ingreso_update AFTER UPDATE ON ingreso
FOR EACH ROW
EXECUTE PROCEDURE update_stock();

CREATE VIEW V_comentario AS
SELECT id_comentario,producto,concat(c.nombre,' ',c.apellido) AS Nombre,comentario FROM comentario
INNER JOIN cliente c on c.id_cliente = comentario.id_cliente
INNER JOIN producto p on p.id_producto = comentario.id_producto

