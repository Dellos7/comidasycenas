USE comidasycenas;

INSERT INTO usuario (usuario, contrasenya, nombre, apellidos)
    VALUES ('david', '$2y$10$N5yVfdzfuLgt6ocV8zdM9.Ea/tg/m3x1eXHuf4j2bLrqOGsYhTNoC', 'David', 'López Castellote');

INSERT INTO comida (descripcion, entresemana, cena)
    VALUES ('Hervido y chuletero', 1, 0);

INSERT INTO comida (descripcion, entresemana, cena)
    VALUES ('Macarrones con atún', 1, 0);

INSERT INTO comida (descripcion, entresemana, cena)
    VALUES ('Paella', 1, 0);

INSERT INTO comida (descripcion, entresemana, cena)
    VALUES ('Arroz al horno', 1, 0);

INSERT INTO comida (descripcion, entresemana, cena)
    VALUES ('Paella descongelada', 1, 0);

INSERT INTO comida (descripcion, entresemana, cena)
    VALUES ('Volovan', 1, 1);

INSERT INTO dia (fecha, semana, finde, mediodia_cod, cena_cod)
    VALUES ( '2021-03-01', 9, 0, 1, 6 );
INSERT INTO dia (fecha, semana, finde, mediodia_cod, cena_cod)
    VALUES ( '2021-03-02', 9, 0, 2, 6 );
INSERT INTO dia (fecha, semana, finde, mediodia_cod, cena_cod)
    VALUES ( '2021-03-03', 9, 0, 5, 6 );
INSERT INTO dia (fecha, semana, finde, mediodia_cod, cena_cod)
    VALUES ( '2021-03-04', 9, 0, 5, 6 );
INSERT INTO dia (fecha, semana, finde, mediodia_cod, cena_cod)
    VALUES ( '2021-03-05', 9, 0, 5, 6 );
INSERT INTO dia (fecha, semana, finde, mediodia_cod, cena_cod)
    VALUES ( '2021-03-06', 9, 1, 5, 6 );
INSERT INTO dia (fecha, semana, finde, mediodia_cod, cena_cod)
    VALUES ( '2021-03-07', 9, 1, 4, 6 );