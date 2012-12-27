<?php
//----------- FUNCIONES DB -------- //
//--- Funciones que realizan operaciones sobre la DB //
//---------------------------------------------------//
require_once("conexion.php");

	/*
	* Funcion que recive el resultado de una consulta
	* Verifica si la consulta es correcta
	*/
	function confirmar_consulta ($result_set, $sql = '')
	{
		if (!$result_set)
			{
				echo $sql."<br>".mysql_error();  
				die ("Fallo la consulta: ");                                
				
			}
                else
                    return TRUE;
	}
	
	/*
	* Funcion que recibe consulta $sql
	* devuelve resultado de la consulta string de datos
	* sirve solo si busco un dato en particular
	*/
	function sql_get ($sql){
		global $link;
		$result = mysql_query($sql, $link);
		confirmar_consulta ($result, $sql);
		$dato = mysql_fetch_array($result,MYSQL_ASSOC);
		return $dato;
	}
	
	/*
	* Funci�n que retorna una colecci�n de datos
	* hago el fetch_array con los resultados obtenidos??
	*/
	function sql_arreglo ($sql){
		global $link;
                $cadena='';
		$i=0;
		$result = mysql_query($sql,$link);
                if (confirmar_consulta ($result, $sql)){
                    $num = mysql_num_rows($result);
                    if ($num > 0){
			while ($row=  mysql_fetch_array($result,MYSQL_ASSOC)){
		        	$cadena[$i]=$row;
				$i++;
			}
                    }
                    else
                        $cadena=FALSE; //--- no se encontraron resultados
                }
                else{
		   $cadena=FALSE;
		}
		
		return ($cadena);
	}
	
		/*
	* prueba de sp  
	*/
	function sql_Localidades ($usuUsuario){
		global $link;
                $cadena='';
		$i=0;
		echo "loc-> ".$usuUsuario;
		$result = mysql_query("call selLocalidad('$usuUsuario')");
                
			while ($row=  mysql_fetch_array($result,MYSQL_ASSOC)){
		        	$cadena[$i]=$row;
				$i++;
			}


		
		return ($cadena);
	}
	
	
	/**
         * Funcion que realiza INSERT UPDATE y DELETE
         * Directamente en la DB
         * @global type $link
         * @param type $sql 
         */
        function sql_INS($sql){
		global $link;
		$result=mysql_query($sql,$link);
		confirmar_consulta ($result, $sql);
	}
	
        /**
         * Funcion encargada de traer los parametros de la DB
         * @global type $link
         * @param type $id Indica que parametro buscar en la DB
         * @return type solo retorna el valor de los parametros
         */
        function parametro($id){
            global $link;
            $sql = " SELECT Nombre, valor, comentario FROM parametro WHERE IdParametro=$id ";
            $result = mysql_query($sql, $link);
            confirmar_consulta ($result, $sql);
            $dato = mysql_fetch_array($result,MYSQL_ASSOC);
	    return $dato;
        }
        
        /**
         * Funcion que Obtiene un Grupo de Parametros
         * @global type $link
         * @param type $indice x el que se busca al grupo de parametros
         * @return type $array con el grupo de param en cuestion
         * Retorna FALSE si no se encuentra nada
         */
        function parametro_indice($indice){
            global $link;
            $i=0;
            $sql = " SELECT IdParametro, Nombre, valor, comentario FROM parametro WHERE Indice=$indice AND habilitado=1";
            $result = mysql_query($sql, $link);
            if (confirmar_consulta ($result, $sql)){
                    $num = mysql_num_rows($result);
                    if ($num > 0){
			while ($row=  mysql_fetch_array($result,MYSQL_ASSOC)){
		        	$cadena[$i]=$row;
				$i++;
			}
                    }
                    else
                        $cadena=FALSE; //--- no se encontraron resultados
                }
                else{
		   $cadena=FALSE;
		}
		
		return ($cadena);
        }
        
        /**
         * Funcion que retorna la cantidad de registros encontrados
         * @global type $link 
         * @param type $sql Sentencia
         * @return type INT cero si no hay registros
         */
        function sql_num ($sql){
		global $link;
                $cadena='';
		$i=0;
		$result = mysql_query($sql,$link);
                if (confirmar_consulta ($result, $sql))
                    $num = mysql_num_rows($result);
                else
                    $num = 0;
                
		return ($num);
	}
        
        /**
         * Funcion para loguear los diferentes estados por los que pasa un equipo
         * @global type $link Variable de conexion
         * @param type $estado Estado en le q se encuetra el equipo
         * @param type $imei Identificador unico del equipo
         * @param type $IdLocal Local donde se cambio el estado
         */
	function sql_logEstado ($estado,$imei,$IdLocal){
                global $link;
                $fechaLog = date("Y-m-d H:i:s");
                
                $sql = "INSERT INTO logEstados ";
                $sql .= "(logEstado,logImei,IdLocal,logFechaHora)";
                $sql .= " VALUES ";
                $sql .= "('$estado','$imei','$IdLocal','$fechaLog')";
                
                sql_INS($sql);
	}
	
?>
