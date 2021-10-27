<?php	

	/*********************************************************************************************
	* 		Este documento ha sido preparado para incluir todas las variables globales y
	*		la definición de estas. Al igual que en funciones, esto lo habría separado en 
	*		dos archivos: uno para creación y otro para definirlas.
	* ******************************************************************************************/
		
	// Variables globales para gestión de la Base de Datos
	global $HostName;		// Servidor donde esta la base de datos SQL	
	global $HostUser; 		// Usuario administrador de SQL
	global $HostPass;		// Contraseña de administrador de SQL
	global $Err_Sql; 	 	// Error en la conexion SQL
	global $Connection;		// Conexion con SQL
	global $DatabaseName; 	// Nombre de la base de datos

	// Valores fijos para variables globales:
	// Nombre del servidor
	$HostName = "rdbms.strato.de";
	// Nombre de usuario para realizar la conexión
	$HostUser = "U4345610";
	// Contraseña de usuario para realizar la conexión
	$HostPass = "accessWAM#78654."; 
	// Nombre de la base de datos MySQL
	$DatabaseName = "DB4345610";
	// Nombre de la tabla utilizada
	$TableName = "tbl_datos";
