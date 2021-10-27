<?php	
	/*********************************************************************************************
	 * 		Este documento ha sido preparado para incluir todas las funciones necesarias
	 * 		para esta aplicación. 
	 * 
	 * 		Inicialmente su única función es crear el archivo JSON mediante la toma de datos
	 * 		desde una referencia externa, pero como he comentado en la raíz he dejado las 
	 * 		funciones para poder conectarse a una base de datos.
	 * 
	 * 		He comentado las partes que pudieran ser más confusas, pero he intentado poner
	 * 		un nombre sensato a cada variable para que sean facilmente identificables.
	 * ******************************************************************************************/

	function Cargar_Datos() 
	{
		// Esta función carga todos los elementos de la dase de datos y los guarda en $datos. 
		// Sino hay datos, esta tendrá el valor NULL

		$csv = file_get_contents('http://tech-test.wamdev.net/');		// Recogemos los datos desde el path

		if(!$csv)
			return null;												// Comprobamos la toma de datos para romper el ciclo

		$csv = explode("\n", $csv);										// Separamos en array cada línea del CSV
		$size_csv = count($csv);										// Calculo el tamaño del array 
		$json = array();												// Inicializamos la variable que almacenará el JSON

		for($i=0; $i<$size_csv-2; $i++)									// Iteramos sobre el array para crear el JSON personalizado línea a línea sin tener lo que no sean los datos requeridos
		{
			$tmp = explode(";", $csv[$i+1]);								// Subdividimos cada línea para obtener las columnas y poder montarlas a nuestro gusto

			$linea['Localizador'] 		= $tmp[0];
			$linea['Hu&eacute;sped'] 	= $tmp[1];
			$linea['Fecha de entrada'] 	= $tmp[2];
			$linea['Fecha de salida'] 	= $tmp[3];
			$linea['Hotel'] 			= $tmp[4];
			$linea['Precio'] 			= $tmp[5];
			$linea['Posibles Acciones'] = $tmp[6];

			$json[$i] = $linea;												// Insertamos el array de columnas personalizado en la matriz del JSON
		}

		$datos = json_encode($json);
		file_put_contents("tmp/json", $datos);

		return $datos;
	}

	function Conectar_SQL()
	{
		include("gestion/global.php");

		$Err_Sql = false;
		// Conexión con la base de datos y guardado de estado en $con
		$Connection = new mysqli($HostName, $HostUser, $HostPass) or ($Err_Sql=true);	
	}

	function Desconectar_SQL() 
	{
		include("gestion/global.php");

		// Si exites la conexión, se cierra
		if($Connection != null)
		{
			mysqli_close($Connection);
			$Connection = null;	
		}
	}

?>