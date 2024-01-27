-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS registro_alumnos;

-- Seleccionar la base de datos
USE registro_alumnos;

-- Crear la tabla "administrador"
CREATE TABLE IF NOT EXISTS administrador (
  ID varchar(2) PRIMARY KEY NOT NULL,
  Nombre varchar(100) NOT NULL,
  Correo varchar(16) NOT NULL,
  Contrasena varchar(6) NOT NULL
);

-- Insertar datos de administrador
INSERT INTO administrador (ID, Nombre, Correo, Contrasena) VALUES
('0', 'Administrador', 'admin@admin.com', 'ADMIN');

-- Crear la tabla "alumnos"
CREATE TABLE IF NOT EXISTS alumnos (
  NBoleta varchar(20) NOT NULL,
  Nombre varchar(100) NOT NULL,
  APaterno varchar(100) NOT NULL,
  AMaterno varchar(100) NOT NULL,
  FNacimiento date NOT NULL,
  Genero varchar(20) NOT NULL,
  CURP varchar(20) PRIMARY KEY NOT NULL,
  discapacidad varchar(100) NOT NULL,
  otrodiscapacidad varchar(100) DEFAULT NULL,
  calle varchar(100) NOT NULL,
  numero varchar(10) NOT NULL,
  colonia varchar(100) NOT NULL,
  cpostal varchar(10) NOT NULL,
  telocel varchar(15) NOT NULL,
  correo varchar(100) NOT NULL,
  alcaldia varchar(50) NOT NULL,
  EP varchar(100) NOT NULL,
  nombreEscuela varchar(100) DEFAULT NULL,
  estados varchar(50) NOT NULL,
  Promedio decimal(4,2) NOT NULL,
  folio int(10) NOT NULL,  
  laboratorio varchar(10) NOT NULL,
  horario varchar(50) NOT NULL 
);