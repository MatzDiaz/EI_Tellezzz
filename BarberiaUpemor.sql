DROP DATABASE IF EXISTS barberia_upemor;
CREATE DATABASE IF NOT EXISTS barberia_upemor;
USE barberia_upemor;

CREATE TABLE Cliente (
	idCliente INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	apellido VARCHAR(50),
	email TEXT NOT NULL,
	contra VARCHAR(15),
	telefono VARCHAR(10),
	Genero VARCHAR(5),
	Registro DATE DEFAULT current_timestamp
);
INSERT INTO Cliente (nombre, apellido, email, contra, telefono, Genero) VALUES 
('Juan', 'Pérez', 'juan@example.com', 'contraseña1', '1234567890', 'H'),
('María', 'Gómez', 'maria@example.com', 'contraseña2', '9876543210', 'M');

CREATE TABLE servicios (
	idServicios INT AUTO_INCREMENT PRIMARY KEY,
	especialidad VARCHAR(50) NOT NULL,
	precio FLOAT
);
INSERT INTO servicios (especialidad, precio) VALUES 
('Corte de cabello', 20.50),
('Afeitado', 15.75),
('Peinado', 25.00),
('Barba moderna', 18.00),
('Masaje capilar', 30.00);

CREATE TABLE Citas (
    idCita INT AUTO_INCREMENT PRIMARY KEY,
    idCliente INT,
    idServicios INT,
    fecha DATE,
    hora TIME,
    estado VARCHAR(50) DEFAULT 'pendiente',
	FOREIGN KEY (idCliente) REFERENCES Clientes(idCliente),
    FOREIGN KEY (idServicios) REFERENCES Servicios(idServicios)
);
