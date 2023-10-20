-- Crear la base de datos:
-- 
CREATE DATABASE new_sen_proyect_ventas;
USE new_sen_proyect_ventas;
-- ver las tablas 
SHOW TABLES;
-- --------------------------------------------------------
CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL
);
--
-- insertar datos para la tabla `administradores`
--

INSERT INTO administradores (
    correo, contraseña, nombre
) VALUES (
    'tardidaw@gmail.com', 'admin1234', 'Carlos'
);
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `categoria`
--
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT
);


-- Insertar datos para la tabla `categorias`
INSERT INTO categorias (nombre, descripcion) VALUES
('Celulares y Tablets', 'Categoría de celulares y tablets'),
('Computadoras y Laptops', 'Categoría de computadoras y laptops'),
('Audio y Video', 'Categoría de equipos de audio y video'),
('Accesorios', 'Categoría de accesorios para dispositivos electrónicos'),
('Cámaras y Fotografía', 'Categoría de cámaras y equipos de fotografía'),
('Gaming', 'Categoría de equipos y accesorios para videojuegos'),
('Redes y Conectividad', 'Categoría de equipos de redes y conectividad'),
('Impresoras y Escáneres', 'Categoría de impresoras y escáneres'),
('Almacenamiento', 'Categoría de dispositivos de almacenamiento'),
('Proyectores y Pantallas', 'Categoría de proyectores y pantallas');
-- ingresar mas categorías
-- ------------------------------------------------------
--
-- Estructura de tabla para la tabla usuarios
--
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    dni CHAR(8) UNIQUE NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido_paterno VARCHAR(255),
    apellido_materno VARCHAR(255),
    fecha_nacimiento DATE,
    direccion VARCHAR(255),
    ciudad VARCHAR(255),
    imagen TEXT
);
-- --------------------------------------------------------
-- Estructura de tabla para la tabla productos

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    precio DECIMAL(10, 2) NOT NULL,
    modelo VARCHAR(255) NOT NULL,
    marca VARCHAR(255) NOT NULL,
    stock INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    imagen TEXT, -- Aquí almacenamos la ruta o el nombre del archivo de la imagen
    categoria_id int,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);
-- --------------------------------------------------------

-- Estructura de tabla para la tabla transacciones

CREATE TABLE transacciones (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tarjeta VARCHAR(16) NOT NULL,
    vencimiento VARCHAR(7) NOT NULL,
    cvv VARCHAR(4) NOT NULL,
    fecha DATETIME NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id),
     FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
-- --------------------------------------------------------
-- Estructura de tabla para la tabla pedidos


CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
-- --------------------------------------------------------
-- Estructura de tabla para la tabla detalles_pedido
CREATE TABLE detalles_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);  
-- --------------------------------------------------------













CREATE TABLE conversaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user1_id INT,
    user2_id INT,
    FOREIGN KEY (user1_id) REFERENCES usuarios(id),
    FOREIGN KEY (user2_id) REFERENCES usuarios(id)
);

CREATE TABLE mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conversacion_id INT,
    remitente_id INT,
    contenido TEXT,
    fecha_enviado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (conversacion_id) REFERENCES conversaciones(id),
    FOREIGN KEY (remitente_id) REFERENCES usuarios(id)
);
