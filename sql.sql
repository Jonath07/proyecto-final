CREATE DATABASE bdyocoadmin;

CREATE TABLE tbl_categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(50) NOT NULL,
    estado_categoria INT(1) NOT NULL,
    fecha_categoria DATE,
    hora_categoria TIME(2),
    usuario VARCHAR(15)
);

CREATE TABLE tbl_clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(50) NOT NULL,
    apellido_cliente VARCHAR(50) NOT NULL,
    estado_cliente INT(1) NOT NULL,
    fecha_cliente DATE,
    hora_cliente TIME(2),
    usuario VARCHAR(15),
    direccion_cliente VARCHAR(225),
    telefono_cliente VARCHAR(15),
    email_cliente VARCHAR(100),
    referencia_cliente VARCHAR(700)
);

CREATE TABLE tbl_coordenada (
    id_coordenada INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    fecha_coordenada DATE,
    usuario VARCHAR(15),
    cordenada_y_cliente VARCHAR(20),
    cordenada_x_cliente VARCHAR(20)
);

CREATE TABLE tbl_pilotos (
    id_piloto INT AUTO_INCREMENT PRIMARY KEY,
    nombre_piloto VARCHAR(50) NOT NULL,
    apellido_piloto VARCHAR(50) NOT NULL,
    estado_piloto INT(1) NOT NULL,
    fecha_piloto DATE,
    hora_piloto TIME(2),
    usuario VARCHAR(15),
    direccion_piloto VARCHAR(225),
    telefono_piloto VARCHAR(15)
);

CREATE TABLE tbl_productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(50) NOT NULL,
    descripcion_producto VARCHAR(50) NOT NULL,
    estado_producto INT(1) NOT NULL,
    fecha_producto DATE,
    hora_producto TIME(2),
    usuario VARCHAR(15),
    id_categoria_producto INT NOT NULL,
    precio_producto DECIMAL(10,2),
    img_producto TEXT(250)
);

CREATE TABLE tbl_usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    apellido_usuario VARCHAR(50),
    direccion_usuario VARCHAR(100),
    usuario VARCHAR(15),
    email_usuario TEXT,
    contrasena_usuario TEXT,
    estado_usuario INT,
    img_usuario TEXT(250)
);

CREATE TABLE tbl_vehiculos (
    id_vehiculo INT AUTO_INCREMENT PRIMARY KEY,
    placa_vehiculo VARCHAR(50) NOT NULL,
    marca_vehiculo VARCHAR(50),
    capacidad_vehiculo VARCHAR(100),
    usuario VARCHAR(15),
    estado_vehiculo INT,
    fecha_vehiculo DATE,
    hora_vehiculo TIME(2)
);

CREATE TABLE tbl_rutas (
    id_ruta INT AUTO_INCREMENT PRIMARY KEY,
    codigo_ruta VARCHAR(50) NOT NULL,
    referencia_ruta VARCHAR(300),
    usuario VARCHAR(15),
    estado_ruta INT,
    fecha_ruta DATE
);

CREATE TABLE tbl_ventas (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,
    id_piloto INT,
    id_vehiculo INT,
    id_ruta INT,
    fecha_venta DATE,
    usuario VARCHAR(15),
    total_venta DECIMAL(10,2),
    nota_venta TEXT,
    estado_venta INT
);

CREATE TABLE tbl_venta_detalles (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_venta INT,
    id_producto INT,
    cantidad_venta INT,
    precio_venta DECIMAL(10,2)
);

INSERT INTO `tbl_usuarios`(`nombre_usuario`, `usuario`, `contrasena_usuario`, `estado_usuario`) VALUES ('ADMIN','ADMIN','ADMIN','1');

--Relacionar Tablas
ALTER TABLE tbl_productos ADD CONSTRAINT fk_id_categoria_producto
FOREIGN KEY (id_categoria_producto) REFERENCES tbl_categorias(id_categoria);

ALTER TABLE tbl_coordenada ADD CONSTRAINT fk_id_cliente_coordenada
FOREIGN KEY (id_cliente) REFERENCES tbl_clientes(id_cliente);

ALTER TABLE tbl_ventas ADD CONSTRAINT fk_id_piloto_venta
FOREIGN KEY (id_piloto) REFERENCES tbl_pilotos(id_piloto);

ALTER TABLE tbl_ventas ADD CONSTRAINT fk_id_vehiculo_venta
FOREIGN KEY (id_vehiculo) REFERENCES tbl_vehiculos(id_vehiculo);

ALTER TABLE tbl_ventas ADD CONSTRAINT fk_id_ruta_venta
FOREIGN KEY (id_ruta) REFERENCES tbl_rutas(id_ruta);

ALTER TABLE tbl_venta_detalles ADD CONSTRAINT fk_id_venta_detalle
FOREIGN KEY (id_venta) REFERENCES tbl_ventas(id_venta);

ALTER TABLE tbl_venta_detalles ADD CONSTRAINT fk_id_producto_detalle
FOREIGN KEY (id_producto) REFERENCES tbl_productos(id_producto);

--Reiniciar Tablas
DELETE FROM tbl_venta_detalles;
ALTER TABLE tbl_venta_detalles AUTO_INCREMENT = 1;

DELETE FROM tbl_ventas;
ALTER TABLE tbl_ventas AUTO_INCREMENT = 1;

DELETE FROM tbl_rutas;
ALTER TABLE tbl_rutas AUTO_INCREMENT = 1;

DELETE FROM tbl_vehiculos;
ALTER TABLE tbl_vehiculos AUTO_INCREMENT = 1;

DELETE FROM tbl_Pilotos;
ALTER TABLE tbl_Pilotos AUTO_INCREMENT = 1;

DELETE FROM tbl_productos;
ALTER TABLE tbl_productos AUTO_INCREMENT = 1;

DELETE FROM tbl_categorias;
ALTER TABLE tbl_categorias AUTO_INCREMENT = 1;

DELETE FROM tbl_coordenada;
ALTER TABLE tbl_coordenada AUTO_INCREMENT = 1;

DELETE FROM tbl_clientes;
ALTER TABLE tbl_clientes AUTO_INCREMENT = 1;

DELETE FROM tbl_usuarios;
ALTER TABLE tbl_usuarios AUTO_INCREMENT = 1;