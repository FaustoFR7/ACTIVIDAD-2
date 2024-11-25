-- Crear la base de datos
CREATE DATABASE gestion_cursos;

-- Usar la base de datos
USE gestion_cursos;

-- Crear la tabla de cursos
CREATE TABLE cursos (
    id_curso INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_inicio DATE NOT NULL,
    duracion VARCHAR(50) NOT NULL
);

-- Crear la tabla de inscripciones
CREATE TABLE inscripciones (
    id_inscripcion INT AUTO_INCREMENT PRIMARY KEY,
    id_curso INT NOT NULL,
    nombre_participante VARCHAR(255) NOT NULL,
    email_participante VARCHAR(255) NOT NULL,
    fecha_inscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_curso) REFERENCES cursos(id_curso)
);

-- Insertar cursos de prueba
INSERT INTO cursos (nombre, descripcion, fecha_inicio, duracion) VALUES
('Introducción a PHP', 'Curso básico para aprender PHP desde cero.', '2024-12-01', '4 semanas'),
('Desarrollo Web con HTML y CSS', 'Aprende a crear sitios web modernos y responsivos.', '2024-12-10', '3 semanas'),
('MySQL Avanzado', 'Domina consultas complejas y gestión avanzada de bases de datos.', '2024-12-15', '5 semanas');
