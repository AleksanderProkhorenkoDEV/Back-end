
## CRUD BIBLIOTECA

This will be an application in which a complete CRUD is made of all the tables, it is a manager of authors, books, rentals and clients of a library.

V1
We create the migrations of the different tables that we are going to use
## SQL

    AUTHORS TABLE

    id_autor INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    apellidos VARCHAR(50) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    nacionalidad VARCHAR(30) NOT NULL

    BOOKS TABLE
    id_libro INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    categoria VARCHAR(30) NOT NULL,
    autor_id INT(10) NOT NULL,
    descripcion VARCHAR(150) NOT NULL


    - FOREIGN KEY -
    ALTER TABLE LIBROS ADD CONSTRAINT fk_LIBROS_AUTORES FOREIGN KEY (autor_id)         
    REFERENCES AUTORES (id_autor) 
	ON DELETE NO ACTION ON UPDATE CASCADE;

    USERS TABLE

    id_usuario INT(5) PRIMARY KEY AUTO_INCREMENT,
    nombreusuario CHAR(30) NOT NULL,
    password  CHAR(8) NOT NULL,
    telefono CHAR(10),
    fechentrega DATE


    RENTS TABLE

    alquiler_id  INT(5) PRIMARY KEY AUTO_INCREMENT,
	libro_id INT(5) NOT NULL,
	usuario_id INT(5) NOT NULL,
	fechprestamo DATE NOT NULL,
	fechdevolucion DATE

    - FOREIGN KEY -

    ALTER TABLE ALQUILERES ADD CONSTRAINT fk_ALQUILER_LIBROS FOREIGN KEY (libro_id) 
    REFERENCES LIBROS (id_libro)  ON DELETE NO ACTION ON UPDATE CASCADE;
    ALTER TABLE ALQUILERES ADD CONSTRAINT fk_ALQUILER_USUARIOS FOREIGN KEY (usuario_id) 
    REFERENCES USUARIOS(id_usuario) ON DELETE NO ACTION ON UPDATE CASCADE;

V2

Installation and use of the Laravel and Carbon livewire package.

Performing crud on all boards. To insert data we have used the controllers of each table to be able to use the CustomRequest to validate the input data.

For edit, delete and select, we have used the livewire package to refresh this data.

added to the models the relationships between the tables to be able to extract related fields, for example:

In a rental we relate the table with users and books and extract the necessary data to carry out the relevant operations.

## 🔗 CONTACT

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/aleksander-trujillo-90a066299/)

