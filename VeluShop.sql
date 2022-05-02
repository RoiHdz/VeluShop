create table departamento
(
    id_departamento serial
        constraint departamento_pk
            primary key,
    departamento    varchar(25) not null
);

create table municipio
(
    id_municipio    serial
        constraint municipio_pk
            primary key,
    municipio       varchar(25) not null,
    id_departamento integer     not null
        constraint municipio_departamento_id_departamento_fk
            references departamento
);

create table cliente
(
    id_cliente   serial
        constraint cliente_pk
            primary key,
    nombre       varchar(50)  not null,
    apellido     varchar(50)  not null,
    username     varchar(10)  not null,
    pssword      varchar(200) not null,
    email        varchar(150) not null,
    id_municipio integer      not null
        constraint cliente_municipio_id_municipio_fk
            references municipio,
    direccion1   varchar(100) not null,
    direccion2   varchar(100),
    activo       boolean      not null
);

create unique index cliente_username_uindex
    on cliente (username);

create table rol
(
    id_rol serial
        constraint rol_pk
            primary key,
    rol    varchar(25) not null
);

create table usuario
(
    id_usuario serial
        constraint usuario_pk
            primary key,
    username   varchar(10)  not null,
    pssword    varchar(200) not null,
    email      varchar(100) not null,
    nombre     varchar(50)  not null,
    apellido   varchar(50)  not null,
    activo     boolean      not null,
    id_rol     integer      not null
        constraint usuario_rol_id_rol_fk
            references rol
);

create table especie
(
    id_especie serial
        constraint especie_pk
            primary key,
    especie    varchar(50) not null,
    activo     boolean     not null
);

create table categoria
(
    id_categoria serial
        constraint categoria_pk
            primary key,
    categoria    varchar(25) not null,
    descripcion  varchar(100),
    activo       boolean     not null
);

create table categoria_especie
(
    id_categoria_especie serial
        constraint categoria_especie_pk
            primary key,
    id_categoria         integer not null
        constraint categoria_especie_categoria_id_categoria_fk
            references categoria,
    id_especie           integer not null
        constraint categoria_especie_especie_id_especie_fk
            references especie
);

create table producto
(
    id_producto          serial
        constraint producto_pk
            primary key,
    producto             varchar(50)   not null,
    descripcion          varchar(100)  not null,
    especificacion       varchar(200)  not null,
    precio               numeric(4, 2) not null,
    stock                integer       not null,
    disponible           boolean       not null,
    activo               boolean       not null,
    id_categoria_especie integer
        constraint producto_categoria_especie_id_categoria_especie_fk
            references categoria_especie
);

create table producto_atributo
(
    id_producto_atributo serial
        constraint producto_atributo_pk
            primary key,
    id_producto          integer not null
        constraint producto_atributo_producto_id_producto_fk
            references producto,
    tamano               varchar(50),
    color                varchar(50)
);

create table producto_fotos
(
    id_producto_fotos serial
        constraint producto_fotos_pk
            primary key,
    id_producto       integer      not null
        constraint producto_fotos_producto_id_producto_fk
            references producto,
    foto_url          varchar(100) not null
);

create table venta_estado
(
    id_venta_estado serial
        constraint venta_estado_pk
            primary key,
    venta_estado    varchar(50) not null
);

create table venta
(
    id_venta        serial
        constraint venta_pk
            primary key,
    id_cliente      integer       not null
        constraint venta_cliente_id_cliente_fk
            references cliente,
    fecha           date          not null,
    pago            boolean       not null,
    metodo_pago     varchar(50)   not null,
    id_venta_estado integer       not null
        constraint venta_venta_estado_id_venta_estado_fk
            references venta_estado,
    total           numeric(4, 2) not null
);

create table venta_detalle
(
    id_venta_detalle serial
        constraint venta_detalle_pk
            primary key,
    id_venta         integer
        constraint venta_detalle_venta_id_venta_fk
            references venta,
    id_producto      integer       not null
        constraint venta_detalle_producto_id_producto_fk
            references producto,
    precio           numeric(4, 2) not null,
    cantidad         integer       not null
);

create table comentario
(
    id_comentario serial
        constraint comentario_pk
            primary key,
    id_producto   integer      not null
        constraint comentario_producto_id_producto_fk
            references producto,
    id_cliente    integer      not null
        constraint comentario_cliente_id_cliente_fk
            references cliente,
    comentario    varchar(200) not null
);

