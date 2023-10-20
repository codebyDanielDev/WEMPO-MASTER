-- Crear la base de datos:
-- 
CREATE DATABASE DB_WEMPO;
USE DB_WEMPO;


CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL
);
-- insertar datos para la tabla `administradores`
--

INSERT INTO administradores (
    correo, contraseña, nombre
) VALUES (
    'tardidaw@gmail.com', 'admin1234', 'Carlos'
);

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