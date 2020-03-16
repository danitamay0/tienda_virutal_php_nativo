CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios(
    id          int (255) auto_increment not null,
    nombre      VARCHAR(200) not null,
    apellido    VARCHAR(255) not null,
    email       VARCHAR(255) not null,
    password    VARCHAR(255) not null,
    rol         VARCHAR(20),
    image       VARCHAR(255),

    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email) 

)ENGINE=InnoDB;

/* insert*/
insert into usuarios (nombre,apellido,email,password,rol,image) values('admin','admin','adming@admin.com','12345','admin',null);


CREATE TABLE categorias(
    id         int(255) auto_increment not null,
    nombre     VARCHAR(255),
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDB;

insert into categorias values (null,'manga corta');
insert into categorias values (null,'tirantes');
insert into categorias values (null,'manga larga');
insert into categorias values (null,'sudaderas');


/*productos*/
CREATE TABLE productos(
    id              int (255) auto_increment not null,
    categoria_id    int(255)     not null,
    nombre          VARCHAR(200) not null,
    descripcion     text         not null,
    precio          float(100,2) not null,
    stock           int(255)     not null,
    oferta          text         not null,
    fecha           date         not null,
    image           VARCHAR(255),

    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)

)ENGINE=InnoDB;

/*pedidos*/

CREATE TABLE pedidos(
    id              int (255) auto_increment not null,
    usuario_id      int(255)     not null,
    provincia       VARCHAR(200) not null,
    localidad       VARCHAR(200) not null,
    direccion       VARCHAR(200) not null,
    coste           float(100,2) not null,
    estado          VARCHAR(200) not null,
    fecha           date,
    hora            time ,

    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedidos_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)

)ENGINE=InnoDB;

/*lineas pedidos*/

 CREATE TABLE lineas_pedidos(
   id              int (255) auto_increment not null,
     pedido_id     int(255) not null,
     producto_id   int(255) not null,
     unidades       int(255) not null,
    CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
 )ENGINE=InnoDB;

