CREATE TABLE estudiante(
    id_estudiante INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL

);

CREATE TABLE curso(
    id_curso INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL

);

CREATE TABLE curso_estudiante(
    id_estudiante INT,
    id_curso INT,
    FOREIGN KEY(id_estudiante) REFERENCES estudiante(id_estudiante),
    FOREIGN KEY(id_curso) REFERENCES curso(id_curso)
);