# Insertar
INSERT INTO ROLES VALUES 
(null, "admin");
INSERT INTO USERS VALUES 
(1, 'admin-001','101004562', 'pepito', 'perez', "pepito@perez.com", '3142566986', sha1("12345"), 1);
# Consultar
SELECT * FROM ROLES;
SELECT * FROM USERS;
# Actualizar
UPDATE ROLES SET
rol_code = 2,
rol_name = "personitas"
WHERE rol_code = 2;

# Eliminar