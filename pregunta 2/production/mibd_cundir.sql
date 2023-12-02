-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS mibd_cundir;
USE mibd_cundir;

-- Cambiar nombre de la tabla y agregar columna de contrasenia
CREATE TABLE usuario
(
    ci VARCHAR(5) PRIMARY KEY,
    contrasenia VARCHAR(25),
    rol VARCHAR(25)
);

CREATE TABLE materia
(
    idmat varchar(10) PRIMARY KEY,
    descripcion varchar(25)
);

CREATE TABLE alumno
(
    ci VARCHAR(5),
    nombre VARCHAR(25),
    paterno VARCHAR(25),
    celular varchar(2),
    PRIMARY KEY (ci),
    FOREIGN KEY (ci) REFERENCES usuario(ci)
);

CREATE TABLE kardex
(
    ci VARCHAR(5),
    nombre VARCHAR(25),
    paterno VARCHAR(25),
    salario decimal(10, 2),
    PRIMARY KEY (ci),
    FOREIGN KEY (ci) REFERENCES usuario(ci)
);

CREATE TABLE inscribe
(
    ci VARCHAR(5),
    idmat varchar(10),
    estado int,
    FOREIGN KEY (ci) REFERENCES usuario(ci),
    FOREIGN KEY (idmat) REFERENCES materia(idmat)
);

INSERT INTO usuario (ci, contrasenia, rol) VALUES
('00000', 'pwd0', 'estudiante'),
('00001', 'pwd1', 'estudiante'),
('00002', 'pwd2', 'estudiante'),
('00003', 'pwd3', 'estudiante'),
('00004', 'pwd4', 'estudiante'),
('00005', 'pwd5', 'estudiante'),
('00006', 'pwd6', 'estudiante'),
('00007', 'pwd7', 'kardex'),
('00008', 'pwd8', 'estudiante'),
('00009', 'pwd9', 'estudiante'),
('00010', 'pwd10', 'estudiante'),
('00011', 'pwd11', 'estudiante'),
('00012', 'pwd12', 'estudiante'),
('00013', 'pwd13', 'estudiante'),
('00014', 'pwd14', 'estudiante'),
('00015', 'pwd15', 'kardex'),
('00016', 'pwd16', 'estudiante'),
('00017', 'pwd17', 'estudiante'),
('00018', 'pwd18', 'estudiante'),
('00019', 'pwd19', 'estudiante'),
('00020', 'pwd20', 'kardex');

INSERT INTO materia (idmat, descripcion) VALUES
('MAT001', 'Matemáticas'),
('FIS001', 'Física'),
('QUI001', 'Química'),
('INF001', 'Informática');

INSERT INTO alumno (ci, nombre, paterno, celular) VALUES
('00000', 'Juan', 'Perez', '02'),
('00001', 'María', 'Gomez', '04'),
('00002', 'Carlos', 'Rodriguez', '01'),
('00003', 'Ana', 'Fernandez', '03'),
('00004', 'Luis', 'Lopez', '02'),
('00005', 'Laura', 'Martinez', '04'),
('00006', 'Pablo', 'Garcia', '01'),
('00008', 'Pedro', 'Diaz', '02'),
('00009', 'Sofia', 'Torres', '01'),
('00010', 'Diego', 'Vargas', '03'),
('00011', 'Isabel', 'Romero', '04'),
('00012', 'Gabriel', 'Serrano', '01'),
('00013', 'Carmen', 'Ramirez', '02'),
('00014', 'Javier', 'Cruz', '04'),
('00016', 'Alejandro', 'Jimenez', '02'),
('00017', 'Lorena', 'Sanchez', '01'),
('00018', 'Miguel', 'Gutierrez', '03'),
('00019', 'Paula', 'Navarro', '04');

INSERT INTO kardex (ci, nombre, paterno, salario) VALUES
('00007', 'Elena', 'Hernandez', 50000.00),
('00015', 'Raquel', 'Ortega', 60000.50),
('00020', 'Max', 'Power', 75000.75);

