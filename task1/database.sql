--Pegarlo en el phpMyAdmin

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS users_crud;

-- Usar la base de datos
USE users_crud;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    age INT NOT NULL
);

-- Datos de prueba
INSERT INTO users (name, email, age) VALUES
('Juan Pérez', 'juan@ejemplo.com', 25),
('María García', 'maria@ejemplo.com', 30),
('Carlos López', 'carlos@ejemplo.com', 28); 