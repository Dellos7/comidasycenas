CREATE DATABASE IF NOT EXISTS comidasycenas;

USE comidasycenas;

CREATE TABLE comida(
    codigo INTEGER NOT NULL AUTO_INCREMENT,
    descripcion TEXT NOT NULL,
    entresemana BOOLEAN NOT NULL DEFAULT 1,
    cena BOOLEAN NOT NULL DEFAULT 0,
    CONSTRAINT pk_comida PRIMARY KEY (codigo)
);

CREATE TABLE festivo(
    codigo INTEGER NOT NULL AUTO_INCREMENT,
    fecha DATE NOT NULL,
    CONSTRAINT pk_festivo PRIMARY KEY (codigo)
);

CREATE TABLE dia(
    codigo INTEGER NOT NULL AUTO_INCREMENT,
    fecha DATE NOT NULL,
    finde BOOLEAN NOT NULL DEFAULT 0,
    festivo_cod INTEGER,
    mediodia_cod INTEGER,
    cena_cod INTEGER,
    CONSTRAINT pk_dia PRIMARY KEY (codigo),
    CONSTRAINT fk_dia_festivo FOREIGN KEY (festivo_cod) REFERENCES festivo(codigo),
    CONSTRAINT fk_dia_mediodia FOREIGN KEY (mediodia_cod) REFERENCES comida(codigo),
    CONSTRAINT fk_dia_cena FOREIGN KEY (cena_cod) REFERENCES comida(codigo)
);

CREATE TABLE usuario(
    codigo INTEGER NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(50) NOT NULL,
    contrasenya VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    CONSTRAINT pk_usuario PRIMARY KEY (codigo)
);