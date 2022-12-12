create table flujo					
(
    flujo varchar(5),	
    proceso	varchar(5),
    proceso_siguiente	varchar(5),
    tipo	varchar(5),
    rol varchar(20),
    pantalla	varchar(50)
)

insert into flujo values('F1','P1','P8','I','Libreria','Inicial');
insert into flujo values('F1','P2','P3','P','Libreria','ElegirProveedor');
insert into flujo values('F1','P3',null, 'C','Proveedor','VerificarProducto');
insert into flujo values('F1','P4','P5', 'P','Proveedor','FormaPago');
insert into flujo values('F1','P5','P6', 'P','Proveedor','PedidoEnviado');
insert into flujo values('F1','P6','P7', 'P','Libreria','PedidoAceptado');
insert into flujo values('F1','P7',null, 'F','Libreria','ActualizaProducto');
insert into flujo values('F1','P8',null, 'C','Libreria','SEguirPidiendoProducto');


insert into flujo values('F2','P1', 'P2', 'I','Caja','ListarProductosComprados');
insert into flujo values('F2','P2', 'P3', 'P','Caja','HacerPago');
insert into flujo values('F2','P3', null, 'F','Libreria','NotificarPagoDeCompra');


insert into flujo values('F3','P1','P2', 'I','Cliente','RealizarPedido');
insert into flujo values('F3','P2',null, 'C','Vendedor','VerificarPedido');
insert into flujo values('F3','P3','P5', 'P','Cliente','NotificarNoHayProducto');
insert into flujo values('F3','P4','P6', 'P','Cliente','NotificarSiHayProducto');
insert into flujo values('F3','P5',null, 'C','Cliente','SeguirPidiendo');
insert into flujo values('F3','P6','P5', 'P','Cliente','ListarPedido');
insert into flujo values('F3','P7',null, 'C','Vendedor','SiHayPedido');
insert into flujo values('F3','P8','P10', 'P','Vendedor','RegistrarPedido');
insert into flujo values('F3','P9',null, 'F','Cliente','NotificacionCliente');
insert into flujo values('F3','P10',null, 'F','Cliente','ListaDeProductosComprados');


insert into flujo values('F4','P1', 'P2', 'I','Caja','ListarProductosCompradosCliente');
insert into flujo values('F4','P2', 'P3', 'P','Caja','CobrarProducto');
insert into flujo values('F4','P3', null, 'F','Cliente','NotificarCobroDeVenta');




create table flujocondicion			
(
flujo varchar (5),	
proceso	varchar (5),
procesoSI	varchar (5),
procesoNO varchar (5)
)


insert into flujocondicion values ('F1',	'P3', 	'P4', 	'P2');
insert into flujocondicion values ('F3',	'P2', 	'P4', 	'P3');
insert into flujocondicion values ('F3',	'P5', 	'P1', 	'P7');
insert into flujocondicion values ('F3',	'P7', 	'P8', 	'P9');
insert into flujocondicion values ('F1',	'P8', 	'P1', 	'P2');




create table flujotramite							

(
Flujo	        varchar(5),
proceso	        varchar(5),
nro_tramite	    varchar(10),
fechaini	    datetime,
fechafin	    datetime,
usuario	        varchar(30)
)	

INSERT INTO `flujotramite` values('F1','P1','1000','2022/11/23 23:55:00', NULL,'FuryLibreria', 'FuryLibreria' ); 
INSERT INTO `flujotramite` values('F3','P1','3000','2022/11/21 13:55:00', NULL,'MateoCliente', 'MateoCliente'); 
INSERT INTO `flujotramite` values('F3','P1','3001','2020/11/21 09:15:18', NULL,'LucasCliente', 'LucasCliente'); 
INSERT INTO `flujotramite` values('F3','P1','3002','2018/10/01 01:15:38', NULL,'JuanCliente', 'JuanCliente'); 

create table Rol
(
id int,	
descipcion varchar(20)
)

insert into Rol values(1, 'Libreria');
insert into Rol values(2, 'Proveedor');
insert into Rol values(3, 'Cliente');
insert into Rol values(4, 'Vendedor');
insert into Rol values(5, 'Caja');


create table Usuario 	
(
id	int,
descripcion varchar(50),
pass varchar(50)
)

insert into Usuario values(1, 'FuryLibreria', '');
insert into Usuario values(2, 'TouristProveedor', '');
insert into Usuario values(3, 'MateoCliente', '');
insert into Usuario values(4, 'GaussVendedor', '');
insert into Usuario values(5, 'AlanCaja', '');


create table RolUsuario	
(

IdRol	int,
IdUsuario int
)

insert into RolUsuario values(1, 1);
insert into RolUsuario values(2, 2);
insert into RolUsuario values(3, 3);
insert into RolUsuario values(4, 4);
insert into RolUsuario values(5, 5);
insert into RolUsuario values(3, 6);
insert into RolUsuario values(3, 7);
