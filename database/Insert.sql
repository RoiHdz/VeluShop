INSERT INTO public.categoria (id_categoria, categoria, descripcion, activo)
VALUES (DEFAULT, 'Juguetes', 'Juguetes para todo tipo de mascotas', true);

INSERT INTO public.categoria (id_categoria, categoria, descripcion, activo)
VALUES (DEFAULT, 'Accesorios', 'Articulos que sean para decoracion o uso cotidiano de la mascota', true);

INSERT INTO public.categoria (id_categoria, categoria, descripcion, activo)
VALUES (DEFAULT, 'Medidamentos', 'Medicina, desparacitantes o anti pulgas', true);

INSERT INTO public.categoria (id_categoria, categoria, descripcion, activo)
VALUES (DEFAULT, 'Ropa', 'Ropa para un tipo de animal', true);

INSERT INTO public.categoria (id_categoria, categoria, descripcion, activo)
VALUES (DEFAULT, 'Decoracion', 'Decoracion para peceras', false);

-------------------------------------------------------------------------------------------------------------------------

INSERT INTO public.especie (id_especie, especie, activo)
VALUES (DEFAULT, 'Perro', true);

INSERT INTO public.especie (id_especie, especie, activo)
VALUES (DEFAULT, 'Gato', true);

INSERT INTO public.especie (id_especie, especie, activo)
VALUES (DEFAULT, 'Aves', true);

INSERT INTO public.especie (id_especie, especie, activo)
VALUES (DEFAULT, 'Peces', true);

INSERT INTO public.especie (id_especie, especie, activo)
VALUES (DEFAULT, 'Roedores', true);

INSERT INTO public.especie (id_especie, especie, activo)
VALUES (DEFAULT, 'Otros', true);

UPDATE public.especie
SET activo = false
WHERE id_especie = 6;

------------------------------------------------------------------------------------------------------------------------------

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 1, 1);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 2, 1);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 3, 1);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 5, 1);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 1, 2);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 2, 2);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 3, 2);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 1, 3);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 1, 4);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 6, 4);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 1, 5);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 2, 5);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 3, 5);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 1, 5);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 2, 5);

INSERT INTO public.categoria_especie (id_categoria_especie, id_categoria, id_especie)
VALUES (DEFAULT, 1, 6);

-- 

INSERT INTO public.rol (id_rol, rol)
VALUES (DEFAULT, 'Administrador');

INSERT INTO public.rol (id_rol, rol)
VALUES (DEFAULT, 'Cajero');

INSERT INTO public.rol (id_rol, rol)
VALUES (DEFAULT, 'repartidor');

-- 

INSERT INTO public.usuario (id_usuario, username, pssword, email, nombre, apellido, activo, id_rol)
VALUES (DEFAULT, 'roi', '1234', 'rodrigo23hernandez2003@gmail.com', 'Rodrigo', 'Hernandez', true, 1);

INSERT INTO public.usuario (id_usuario, username, pssword, email, nombre, apellido, activo, id_rol)
VALUES (DEFAULT, 'yc_siuuu', 'admin', 'siu@gmail.com', 'Adrian', 'Siu', true, 1);

INSERT INTO public.usuario (id_usuario, username, pssword, email, nombre, apellido, activo, id_rol)
VALUES (DEFAULT, 'johxn', 'admin', 'ejemplo@gmail.com', 'Johan', 'Mercado', true, 2);

INSERT INTO public.usuario (id_usuario, username, pssword, email, nombre, apellido, activo, id_rol)
VALUES (DEFAULT, 'Dieg0', '1234', 'ejemplo@gmail.com', 'Diego', 'Beltran', true, 2);

INSERT INTO public.usuario (id_usuario, username, pssword, email, nombre, apellido, activo, id_rol)
VALUES (DEFAULT, 'Hbrt', 'ricaldone', 'herbert_cornejo@ricaldone.edu.sv', 'Herbert', 'Cornejo', true, 3);

INSERT INTO public.usuario (id_usuario, username, pssword, email, nombre, apellido, activo, id_rol)
VALUES (DEFAULT, 'DCarranza', 'ricaldone', 'daniel_carranza@ricaldone.edu.sv', 'Daniel', 'Carranza', false, 3);

-- 

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Arena para gatos olor a talco perfumado',
        'Si estás pensando en cuál es la mejor arena para tu gato, TK-Pet te da la opción de siempre',
        'El mejor atributo de este es sin duda, su alta capacidad absorbente; además origina pequeños conglomerados muy fáciles de retirar con la pala',
        8.95, 50, true, true, 5);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Pienso para gato adulto esterilizado',
        'Tras la castración descienden las necesidades energéticas de los animales y tienden a engordar.',
        'Ingredientes: proteínas de ave deshidratadas, maíz, aislado de proteínas vegetales*', 16.99, 172, true, true,
        5);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Pienso Salvaje Base con pollo para perros',
        'El pienso Salvaje Base para perros es un alimento completo y equilibrado para razas pequeñas',
        'Ingredientes: Carnes deshidratadas (pollo 20 %), Maíz (18%), Arroz (10%), Cebada (8%), Grasa de ave (estabilizada con tocoferoles naturales)',
        19.95, 88, true, true, 1);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Alfombra para perros súper absorbente marrón',
        'La alfombra para perros súper absorbente es un accesorio multifuncional',
        'Está alfombra está hecha con un material super absorbente que seca 5 veces más rápido que las alfombras convencionales',
        7.39, 12, true, true, 3);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Pack de juguetes para gatos TK-Pet Marc',
        'Haz feliz a tu felino con el completo pack de juguetes para gatos TK-Pet Marc.',
        'Se trata de un set surtido con pelotas de diferentes texturas y formas y ratones de peluche. Juguetes de pequeño tamaño ideales',
        5.99, 20, true, true, 6);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Percha flexible de algodón', 'Divertida cuerda flexible de algodón para pájaros.',
        ' No daña las patas de los animales gracia a su forma redondeada y superficie suave', 4.23, 32, true, true, 8);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Abrigo Outech negro para perros',
        'Este abrigo cuenta con un forro polar interior que mantiene protegido al perro del frío exterior',
        'Igualmente, el abrigo negro Outech para galgos está hecho con materiales reflectantes que te ayudará a mantener a tu galgo siempre a la vista',
        24.99, 23, true, true, 4);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Cochecito para Mascotas plegable color Rojo',
        'Este carrito de PawHut es ideal para llevar a tu pequeña mascota al veterinario',
        'Este carrito de paseo plegable para mascotas de PawHut es ideal para llevar a tu pequeña mascota al veterinario, pasar por el centro comercial, etc.',
        67.99, 5, true, true, 3);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Cama acolchada cálida para roedores', 'Confortable y cálida cama para todo tipo de roedores',
        'Esta mullida cuna para roedores es un lugar ideal para que tu pequeña mascota pueda descansar cómodamente. Es tan suave y cálida',
        3.09, 12, true, true, 13);

INSERT INTO public.producto (id_producto, producto, descripcion, especificacion, precio, stock, disponible, activo,
                             id_categoria_especie)
VALUES (DEFAULT, 'Desparacitante para perros', 'Desparacita a tu perro con esta pastilla',
        'Pastilla de laboratorios Bayer para eliminar paracitos e infecciones', 5.99, 41, true, true, 3);

------------------------------------------------------------------------------------------------------------

INSERT INTO departamento VALUES (DEFAULT, 'Ahuachapán');
INSERT INTO departamento VALUES (DEFAULT, 'Cabañas');
INSERT INTO departamento VALUES (DEFAULT, 'Chalatenango');
INSERT INTO departamento VALUES (DEFAULT, 'Cuscatlán');
INSERT INTO departamento VALUES (DEFAULT, 'La Libertad');
INSERT INTO departamento VALUES (DEFAULT, 'La Paz');
INSERT INTO departamento VALUES (DEFAULT, 'La Unión');
INSERT INTO departamento VALUES (DEFAULT, 'Morazán');
INSERT INTO departamento VALUES (DEFAULT, 'San Miguel');
INSERT INTO departamento VALUES (DEFAULT, 'San Salvador');
INSERT INTO departamento VALUES (DEFAULT, 'San Vicente');
INSERT INTO departamento VALUES (DEFAULT, 'Santa Ana');
INSERT INTO departamento VALUES (DEFAULT, 'Sonsonate');
INSERT INTO departamento VALUES (DEFAULT, 'Usulután');


------------------------------------------------------------------------------------------

INSERT INTO municipio VALUES (DEFAULT, 'Ahuachapán', 1);
INSERT INTO municipio VALUES (DEFAULT, 'Jujutla', 1);
INSERT INTO municipio VALUES (DEFAULT, 'Atiquizaya', 1);
INSERT INTO municipio VALUES (DEFAULT, 'Concepción de Ataco', 1);
INSERT INTO municipio VALUES (DEFAULT, 'El Refugio', 1);
INSERT INTO municipio VALUES (DEFAULT, 'Guaymango', 1);
INSERT INTO municipio VALUES (DEFAULT, 'Apaneca', 1);
INSERT INTO municipio VALUES (DEFAULT, 'San Francisco Menéndez', 1);
INSERT INTO municipio VALUES (DEFAULT, 'San Lorenzo',1);
INSERT INTO municipio VALUES (DEFAULT, 'San Pedro Puxtla',1);
INSERT INTO municipio VALUES (DEFAULT, 'Tacuba',1);
INSERT INTO municipio VALUES (DEFAULT, 'Turín',1);
INSERT INTO municipio VALUES (DEFAULT, 'Cinquera',2);
INSERT INTO municipio VALUES (DEFAULT, 'Villa Dolores',2);
INSERT INTO municipio VALUES (DEFAULT, 'Guacotecti',2);
INSERT INTO municipio VALUES (DEFAULT, 'Ilobasco',2);
INSERT INTO municipio VALUES (DEFAULT, 'Jutiapa',2);
INSERT INTO municipio VALUES (DEFAULT, 'San Isidro',2);
INSERT INTO municipio VALUES (DEFAULT, 'Sensuntepeque',2);
INSERT INTO municipio VALUES (DEFAULT, 'Ciudad de Tejutepeque',2);
INSERT INTO municipio VALUES (DEFAULT, 'Victoria',2);
INSERT INTO municipio VALUES (DEFAULT, 'Agua Caliente',3);
INSERT INTO municipio VALUES (DEFAULT, 'Arcatao',3);
INSERT INTO municipio VALUES (DEFAULT, 'Azacualpa',3);
INSERT INTO municipio VALUES (DEFAULT, 'Chalatenango',3);
INSERT INTO municipio VALUES (DEFAULT, 'Citalá',3);
INSERT INTO municipio VALUES (DEFAULT, 'Comalapa',3);
INSERT INTO municipio VALUES (DEFAULT, 'Concepción Quezaltepeque',3);
INSERT INTO municipio VALUES (DEFAULT, 'Dulce Nombre de María',3);
INSERT INTO municipio VALUES (DEFAULT, 'El Carrizal',3);
INSERT INTO municipio VALUES (DEFAULT, 'El Paraíso',3);
INSERT INTO municipio VALUES (DEFAULT, 'La Laguna',3);
INSERT INTO municipio VALUES (DEFAULT, 'La Palma',3);
INSERT INTO municipio VALUES (DEFAULT, 'La Reina',3);
INSERT INTO municipio VALUES (DEFAULT, 'Las Vueltas',3);
INSERT INTO municipio VALUES (DEFAULT,  'Nombre de Jesús',3);
INSERT INTO municipio VALUES (DEFAULT,  'Nueva Concepción',3);
INSERT INTO municipio VALUES (DEFAULT,  'Nueva Trinidad',3);
INSERT INTO municipio VALUES (DEFAULT,  'Ojos de Agua',3);
INSERT INTO municipio VALUES (DEFAULT,  'Potonico',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Antonio de la Cruz',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Antonio Los Ranchos',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Fernando',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Francisco Lempa',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Francisco Morazán',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Ignacio',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Isidro Labrador',3);
INSERT INTO municipio VALUES (DEFAULT,  'San José Cancasque',3);
INSERT INTO municipio VALUES (DEFAULT,  'San José Las Flores',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Luis del Carmen',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Miguel de Mercedes',3);
INSERT INTO municipio VALUES (DEFAULT,  'San Rafael',3);
INSERT INTO municipio VALUES (DEFAULT,  'Santa Rita',3);
INSERT INTO municipio VALUES (DEFAULT,  'Tejutla',3);
INSERT INTO municipio VALUES (DEFAULT,  'Candelaria',4);
INSERT INTO municipio VALUES (DEFAULT,  'Cojutepeque',4);
INSERT INTO municipio VALUES (DEFAULT,  'El Carmen',4);
INSERT INTO municipio VALUES (DEFAULT,  'El Rosario',4);
INSERT INTO municipio VALUES (DEFAULT,  'Monte San Juan',4);
INSERT INTO municipio VALUES (DEFAULT,  'Oratorio de Concepción',4);
INSERT INTO municipio VALUES (DEFAULT,  'San Bartolomé Perulapía',4);
INSERT INTO municipio VALUES (DEFAULT,  'San Cristóbal',4);
INSERT INTO municipio VALUES (DEFAULT,  'San José Guayabal',4);
INSERT INTO municipio VALUES (DEFAULT,  'San Pedro Perulapán',4);
INSERT INTO municipio VALUES (DEFAULT,  'San Rafael Cedros',4);
INSERT INTO municipio VALUES (DEFAULT,  'San Ramón',4);
INSERT INTO municipio VALUES (DEFAULT,  'Santa Cruz Analquito',4);
INSERT INTO municipio VALUES (DEFAULT,  'Santa Cruz Michapa',4);
INSERT INTO municipio VALUES (DEFAULT,  'Suchitoto',4);
INSERT INTO municipio VALUES (DEFAULT,  'Tenancingo',4);
INSERT INTO municipio VALUES (DEFAULT,   'Antiguo Cuscatlán',5);
INSERT INTO municipio VALUES (DEFAULT,   'Chiltiupán',5);
INSERT INTO municipio VALUES (DEFAULT,   'Ciudad Arce',5);
INSERT INTO municipio VALUES (DEFAULT,  'Colón',5);
INSERT INTO municipio VALUES (DEFAULT,  'Comasagua',5);
INSERT INTO municipio VALUES (DEFAULT,  'Huizúcar',5);
INSERT INTO municipio VALUES (DEFAULT,  'Jayaque',5);
INSERT INTO municipio VALUES (DEFAULT,  'Jicalapa',5);
INSERT INTO municipio VALUES (DEFAULT,  'La Libertad',5);
INSERT INTO municipio VALUES (DEFAULT,  'Nueva San Salvador',5);
INSERT INTO municipio VALUES (DEFAULT,  'Nuevo Cuscatlán',5);
INSERT INTO municipio VALUES (DEFAULT,  'Opico',5);
INSERT INTO municipio VALUES (DEFAULT,  'Quezaltepeque',5);
INSERT INTO municipio VALUES (DEFAULT,  'Sacacoyo',5);
INSERT INTO municipio VALUES (DEFAULT,  'San José Villanueva',5);
INSERT INTO municipio VALUES (DEFAULT,  'San Matías',5);
INSERT INTO municipio VALUES (DEFAULT,  'San Pablo Tacachico',5);
INSERT INTO municipio VALUES (DEFAULT,  'Talnique',5);
INSERT INTO municipio VALUES (DEFAULT,  'Tamanique',5);
INSERT INTO municipio VALUES (DEFAULT,  'Teotepeque',5);
INSERT INTO municipio VALUES (DEFAULT,  'Tepecoyo',5);
INSERT INTO municipio VALUES (DEFAULT,  'Zaragoza',5);
INSERT INTO municipio VALUES (DEFAULT, 'Cuyultitán',6);
INSERT INTO municipio VALUES (DEFAULT, 'El Rosario',6);
INSERT INTO municipio VALUES (DEFAULT, 'Jerusalén',6);
INSERT INTO municipio VALUES (DEFAULT, 'Mercedes La Ceiba',6);
INSERT INTO municipio VALUES (DEFAULT, 'Olocuilta',6);
INSERT INTO municipio VALUES (DEFAULT, 'Paraíso de Osorio',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Antonio Masahuat',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Emigdio',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Francisco Chinameca',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Juan Nonualco',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Juan Talpa',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Juan Tepezontes',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Luis La Herradura',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Luis Talpa',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Miguel Tepezontes',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Pedro Masahuat',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Pedro Nonualco',6);
INSERT INTO municipio VALUES (DEFAULT, 'San Rafael Obrajuelo',6);
INSERT INTO municipio VALUES (DEFAULT, 'Santa María Ostuma',6);
INSERT INTO municipio VALUES (DEFAULT, 'Santiago Nonualco',6);
INSERT INTO municipio VALUES (DEFAULT, 'Tapalhuaca',6);
INSERT INTO municipio VALUES (DEFAULT, 'Zacatecoluca',6);
INSERT INTO municipio VALUES (DEFAULT, 'Anamorós',7);
INSERT INTO municipio VALUES (DEFAULT, 'Bolívar',7);
INSERT INTO municipio VALUES (DEFAULT, 'Concepción de Oriente',7);
INSERT INTO municipio VALUES (DEFAULT, 'Conchagua',7);
INSERT INTO municipio VALUES (DEFAULT, 'El Carmen',7);
INSERT INTO municipio VALUES (DEFAULT, 'El Sauce',7);
INSERT INTO municipio VALUES (DEFAULT, 'Intipucá',7);
INSERT INTO municipio VALUES (DEFAULT, 'La Unión',7);
INSERT INTO municipio VALUES (DEFAULT, 'Lislique',7);
INSERT INTO municipio VALUES (DEFAULT, 'Meanguera del Golfo',7);
INSERT INTO municipio VALUES (DEFAULT, 'Nueva Esparta',7);
INSERT INTO municipio VALUES (DEFAULT, 'Pasaquina',7);
INSERT INTO municipio VALUES (DEFAULT, 'Polorós',7);
INSERT INTO municipio VALUES (DEFAULT, 'San Alejo',7);
INSERT INTO municipio VALUES (DEFAULT, 'San José',7);
INSERT INTO municipio VALUES (DEFAULT, 'Santa Rosa de Lima',7);
INSERT INTO municipio VALUES (DEFAULT, 'Yayantique',7);
INSERT INTO municipio VALUES (DEFAULT, 'Yucuayquín',7);
INSERT INTO municipio VALUES (DEFAULT, 'Arambala',8);
INSERT INTO municipio VALUES (DEFAULT, 'Cacaopera',8);
INSERT INTO municipio VALUES (DEFAULT, 'Chilanga',8);
INSERT INTO municipio VALUES (DEFAULT, 'Corinto',8);
INSERT INTO municipio VALUES (DEFAULT, 'Delicias de Concepción',8);
INSERT INTO municipio VALUES (DEFAULT, 'El Divisadero',8);
INSERT INTO municipio VALUES (DEFAULT, 'El Rosario',8);
INSERT INTO municipio VALUES (DEFAULT, 'Gualococti',8);
INSERT INTO municipio VALUES (DEFAULT, 'Guatajiagua',8);
INSERT INTO municipio VALUES (DEFAULT, 'Joateca',8);
INSERT INTO municipio VALUES (DEFAULT, 'Jocoaitique',8);
INSERT INTO municipio VALUES (DEFAULT, 'Jocoro',8);
INSERT INTO municipio VALUES (DEFAULT, 'Lolotiquillo',8);
INSERT INTO municipio VALUES (DEFAULT, 'Meanguera',8);
INSERT INTO municipio VALUES (DEFAULT, 'Osicala',8);
INSERT INTO municipio VALUES (DEFAULT, 'Perquín',8);
INSERT INTO municipio VALUES (DEFAULT, 'San Carlos',8);
INSERT INTO municipio VALUES (DEFAULT, 'San Fernando',8);
INSERT INTO municipio VALUES (DEFAULT, 'San Francisco Gotera',8);
INSERT INTO municipio VALUES (DEFAULT, 'San Isidro',8);
INSERT INTO municipio VALUES (DEFAULT, 'San Simón',8);
INSERT INTO municipio VALUES (DEFAULT, 'Sensembra',8);
INSERT INTO municipio VALUES (DEFAULT, 'Sociedad',8);
INSERT INTO municipio VALUES (DEFAULT, 'Torola',8);
INSERT INTO municipio VALUES (DEFAULT, 'Yamabal',8);
INSERT INTO municipio VALUES (DEFAULT, 'Yoloaiquín',8);
INSERT INTO municipio VALUES (DEFAULT, 'Carolina',9);
INSERT INTO municipio VALUES (DEFAULT, 'Chapeltique',9);
INSERT INTO municipio VALUES (DEFAULT, 'Chinameca',9);
INSERT INTO municipio VALUES (DEFAULT, 'Chirilagua',9);
INSERT INTO municipio VALUES (DEFAULT, 'Ciudad Barrios',9);
INSERT INTO municipio VALUES (DEFAULT, 'Comacarán',9);
INSERT INTO municipio VALUES (DEFAULT, 'El Tránsito',9);
INSERT INTO municipio VALUES (DEFAULT, 'Lolotique',9);
INSERT INTO municipio VALUES (DEFAULT, 'Moncagua',9);
INSERT INTO municipio VALUES (DEFAULT, 'Nueva Guadalupe',9);
INSERT INTO municipio VALUES (DEFAULT, 'Nuevo Edén de San Juan',9);
INSERT INTO municipio VALUES (DEFAULT, 'Quelepa',9);
INSERT INTO municipio VALUES (DEFAULT, 'San Antonio',9);
INSERT INTO municipio VALUES (DEFAULT, 'San Gerardo',9);
INSERT INTO municipio VALUES (DEFAULT, 'San Jorge',9);
INSERT INTO municipio VALUES (DEFAULT, 'San Luis de la Reina',9);
INSERT INTO municipio VALUES (DEFAULT, 'San Miguel',9);
INSERT INTO municipio VALUES (DEFAULT, 'San Rafael',9);
INSERT INTO municipio VALUES (DEFAULT, 'Sesori',9);
INSERT INTO municipio VALUES (DEFAULT, 'Uluazapa',9);
INSERT INTO municipio VALUES (DEFAULT, 'Aguilares',10);
INSERT INTO municipio VALUES (DEFAULT, 'Apopa',10);
INSERT INTO municipio VALUES (DEFAULT, 'Ayutuxtepeque',10);
INSERT INTO municipio VALUES (DEFAULT, 'Cuscatancingo',10);
INSERT INTO municipio VALUES (DEFAULT, 'Delgado',10);
INSERT INTO municipio VALUES (DEFAULT, 'El Paisnal',10);
INSERT INTO municipio VALUES (DEFAULT, 'Guazapa',10);
INSERT INTO municipio VALUES (DEFAULT, 'Ilopango',10);
INSERT INTO municipio VALUES (DEFAULT, 'Mejicanos',10);
INSERT INTO municipio VALUES (DEFAULT, 'Nejapa',10);
INSERT INTO municipio VALUES (DEFAULT, 'Panchimalco',10);
INSERT INTO municipio VALUES (DEFAULT, 'Rosario de Mora',10);
INSERT INTO municipio VALUES (DEFAULT, 'San Marcos',10);
INSERT INTO municipio VALUES (DEFAULT, 'San Martín',10);
INSERT INTO municipio VALUES (DEFAULT, 'San Salvador',10);
INSERT INTO municipio VALUES (DEFAULT, 'Santiago Texacuangos',10);
INSERT INTO municipio VALUES (DEFAULT, 'Santo Tomás',10);
INSERT INTO municipio VALUES (DEFAULT, 'Soyapango',10);
INSERT INTO municipio VALUES (DEFAULT, 'Tonacatepeque',10);
INSERT INTO municipio VALUES (DEFAULT, 'Apastepeque',11);
INSERT INTO municipio VALUES (DEFAULT, 'Guadalupe',11);
INSERT INTO municipio VALUES (DEFAULT, 'San Cayetano Istepeque',11);
INSERT INTO municipio VALUES (DEFAULT, 'San Esteban Catarina',11);
INSERT INTO municipio VALUES (DEFAULT, 'San Ildefonso',11);
INSERT INTO municipio VALUES (DEFAULT, 'San Lorenzo',11);
INSERT INTO municipio VALUES (DEFAULT, 'San Sebastián',11);
INSERT INTO municipio VALUES (DEFAULT, 'Santa Clara',11);
INSERT INTO municipio VALUES (DEFAULT, 'Santo Domingo',11);
INSERT INTO municipio VALUES (DEFAULT, 'San Vicente',11);
INSERT INTO municipio VALUES (DEFAULT, 'Tecoluca',11);
INSERT INTO municipio VALUES (DEFAULT, 'Tepetitán',11);
INSERT INTO municipio VALUES (DEFAULT, 'Verapaz',11);
INSERT INTO municipio VALUES (DEFAULT, 'Candelaria de la Frontera',12);
INSERT INTO municipio VALUES (DEFAULT, 'Chalchuapa',12);
INSERT INTO municipio VALUES (DEFAULT, 'Coatepeque',12);
INSERT INTO municipio VALUES (DEFAULT, 'El Congo',12);
INSERT INTO municipio VALUES (DEFAULT, 'El Porvenir',12);
INSERT INTO municipio VALUES (DEFAULT, 'Masahuat',12);
INSERT INTO municipio VALUES (DEFAULT, 'Metapán',12);
INSERT INTO municipio VALUES (DEFAULT, 'San Antonio Pajonal',12);
INSERT INTO municipio VALUES (DEFAULT, 'San Sebastián Salitrillo',12);
INSERT INTO municipio VALUES (DEFAULT, 'Santa Ana',12);
INSERT INTO municipio VALUES (DEFAULT, 'Santa Rosa Guachipilín',12);
INSERT INTO municipio VALUES (DEFAULT, 'Santiago de la Frontera',12);
INSERT INTO municipio VALUES (DEFAULT, 'Texistepeque',12);
INSERT INTO municipio VALUES (DEFAULT, 'Acajutla',13);
INSERT INTO municipio VALUES (DEFAULT, 'Armenia',13);
INSERT INTO municipio VALUES (DEFAULT, 'Caluco',13);
INSERT INTO municipio VALUES (DEFAULT, 'Cuisnahuat',13);
INSERT INTO municipio VALUES (DEFAULT, 'Izalco',13);
INSERT INTO municipio VALUES (DEFAULT, 'Juayúa',13);
INSERT INTO municipio VALUES (DEFAULT, 'Nahuizalco',13);
INSERT INTO municipio VALUES (DEFAULT, 'Nahulingo',13);
INSERT INTO municipio VALUES (DEFAULT, 'Salcoatitán',13);
INSERT INTO municipio VALUES (DEFAULT, 'San Antonio del Monte',13);
INSERT INTO municipio VALUES (DEFAULT, 'San Julián',13);
INSERT INTO municipio VALUES (DEFAULT, 'Santa Catarina Masahuat',13);
INSERT INTO municipio VALUES (DEFAULT, 'Santa Isabel Ishuatán',13);
INSERT INTO municipio VALUES (DEFAULT, 'Santo Domingo',13);
INSERT INTO municipio VALUES (DEFAULT, 'Sonsonate',13);
INSERT INTO municipio VALUES (DEFAULT, 'Sonzacate',13);
INSERT INTO municipio VALUES (DEFAULT, 'Alegría',14);
INSERT INTO municipio VALUES (DEFAULT, 'Berlín',14);
INSERT INTO municipio VALUES (DEFAULT, 'California',14);
INSERT INTO municipio VALUES (DEFAULT, 'Concepción Batres',14);
INSERT INTO municipio VALUES (DEFAULT, 'El Triunfo',14);
INSERT INTO municipio VALUES (DEFAULT, 'Ereguayquín',14);
INSERT INTO municipio VALUES (DEFAULT, 'Estanzuelas',14);
INSERT INTO municipio VALUES (DEFAULT, 'Jiquilisco',14);
INSERT INTO municipio VALUES (DEFAULT, 'Jucuapa',14);
INSERT INTO municipio VALUES (DEFAULT, 'Jucuarán',14);
INSERT INTO municipio VALUES (DEFAULT, 'Mercedes Umaña',14);
INSERT INTO municipio VALUES (DEFAULT, 'Nueva Granada',14);
INSERT INTO municipio VALUES (DEFAULT, 'Ozatlán',14);
INSERT INTO municipio VALUES (DEFAULT, 'Puerto El Triunfo',14);
INSERT INTO municipio VALUES (DEFAULT, 'San Agustín',14);
INSERT INTO municipio VALUES (DEFAULT, 'San Buenaventura',14);
INSERT INTO municipio VALUES (DEFAULT, 'San Dionisio',14);
INSERT INTO municipio VALUES (DEFAULT, 'San Francisco Javier',14);
INSERT INTO municipio VALUES (DEFAULT, 'Santa Elena',14);
INSERT INTO municipio VALUES (DEFAULT, 'Santa María',14);
INSERT INTO municipio VALUES (DEFAULT, 'Santiago de María',14);
INSERT INTO municipio VALUES (DEFAULT, 'Tecapán',14);
INSERT INTO municipio VALUES (DEFAULT, 'Usulután',14);

---------------------------------------------------------------------------------------------------------------------- 

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 1, '2022-03-18', true, 'contra entrega', 4, 50.00);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 2, '2022-03-23', true, 'chivo wallet', 4, 23.00);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 3, '2022-03-24', false, 'contra entrega', 3, 21.00);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 4, '2022-03-25', false, 'contra entrega', 3, 80.00);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 5, '2022-03-26', true, 'tarjeta de credito', 4, 3.65);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 6, '2022-03-27', true, 'chivo wallet', 4, 3.65);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 7, '2022-03-28', false, 'contra entrega', 1, 3.65);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 8, '2022-03-29', true, 'chivo wallet', 4, 2.50);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 9, '2022-03-30', true, 'tarjeta de credito', 4, 75.00);

INSERT INTO public.venta (id_venta, id_cliente, fecha, pago, metodo_pago, id_venta_estado, total)
VALUES (DEFAULT, 10, '2022-03-31', true, 'chivo wallet', 4, 80.50);

insert into public.venta_estado (id_venta_estado, venta_estado) values (1, 'Pendiente');
insert into public.venta_estado (id_venta_estado, venta_estado) values (2, 'Cancelado');
insert into public.venta_estado (id_venta_estado, venta_estado) values (3, 'Entregado');
insert into public.venta_estado (id_venta_estado, venta_estado) values (4, 'En camino');


insert into public.venta_detalle (id_venta_detalle, id_venta, id_producto, precio, cantidad) values (1, 1, 2, 16.99, 2);
insert into public.venta_detalle (id_venta_detalle, id_venta, id_producto, precio, cantidad) values (2, 1, 18, 5.99, 1);
insert into public.venta_detalle (id_venta_detalle, id_venta, id_producto, precio, cantidad) values (3, 1, 1, 8.50, 5);
