<?php

/*
 * Archivo que contiene funciones para tratado de fechas y datos en especial
 */

/**
 * Funcion que recibe 
 * @param type $fecha de la Forma dd/mm/YYYY
 * @return string en la forma YYYY-mm-dd
 * Para guardarla en la DB
 */
function fecha_hora($fecha){
    $dia = substr($fecha,0,2); 
    $mes = substr($fecha,3,2);
    $anio = substr($fecha,-4,4);
    $var1 = $anio."-".$mes."-".$dia ;
    return $var1;  
}

/**
 * Funcion para trabajar la Fecha Hora
 * @param type $fecha de la Forma YYYY/mm/dd HH:mm:ss
 * @return string  en la forma dd/mm/YYYY
 */
function fecha_hora_normal($fecha){
    $dia = substr($fecha,8,2); 
    $mes = substr($fecha,5,2);
    $anio = substr($fecha,0,4);
    $var1 = $dia."-".$mes."-".$anio ;
    return $var1;  
}

/**
 * Funcion para trabajar solo Fecha 
 * @param type $fecha de la Forma YYYY/mm/dd 
 * @return string  en la forma dd/mm/YYYY
 */
function fecha_hora_normal2($fecha){
    $dia = substr($fecha,7,2); 
    $mes = substr($fecha,5,2);
    $anio = substr($fecha,0,4);
    $var1 = $dia."-".$mes."-".$anio ;
    return $var1;  
}

/**
 * Resta días a una fecha
 * @param type $fecha fehca a la cual quiero restar días
 * @param type $ndias cantidad de días a restar
 * @return type  retorno la fecha con formato d/m/Y
 */
function resta_fechas($fecha,$ndias){
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
	  list($dia,$mes,$ano)=split("/", $fecha);

      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
          list($dia,$mes,$ano)=split("-",$fecha);
      $nueva = mktime(0,0,0, $mes,$dia,$ano) - $ndias * 24 * 60 * 60;
      $nuevafecha=date("d/m/Y",$nueva);
      return ($nuevafecha);  
}

/**
 * Retorna la diferencia entre 2 fechas en segundos
 * @param type $fechaIni 
 * @param type $fechaFin
 * @return type retorna el resultado en segundos
 */
function restar_fechas($fechaIni, $fechaFin){
    if($fechaFin=='')	
        $fechaFin = date("Y/m/d H:i:s");
    $fechaIni = strtotime($fechaIni);
    $fechaFin = strtotime($fechaFin);
    $diferencia = ($fechaFin - $fechaIni);
    return($diferencia);
}

/**
 * Reliza redondeo de numeros decimles
 * @param type $numero a redondear
 * @param type $decimales cantidad de decimales a redondear
 * @return type retorna el decimal redondeado
 */

function redondeo ($numero, $decimales) { 
   $factor = pow(10, $decimales); 
   return (round($numero*$factor)/$factor); 
} 

/**
 *Prepara una cadena para enviarla por GET
 * @param type $array Cadena que recibe como parametro
 * @return type resultado para el GET
 */
function array_envia($array) { 
    $tmp = serialize($array); 
    $tmp = urlencode($tmp); 
    return $tmp; 
} 

/**
 *Recibe Cadenas enviadas por GET
 * @param type $url_array parametro q se recibio por URL
 * @return type retorno una cadena
 */
function array_recibe($url_array) { 
    $tmp = stripslashes($url_array); 
    $tmp = urldecode($tmp); 
    $tmp = unserialize($tmp); 
   return $tmp; 
}

/**
 * Retorna el nombre de un Local o SubBodega
 * @param type $IdLocal
 * @param type $IdSubBodega
 * @return type
 */
function local_Nombre ($IdLocal=0,$IdSubBodega=0){
    if ($IdSubBodega==0){
        $sql = "SELECT loclNombre from local WHERE IdLocal = $IdLocal";
        $res = sql_get($sql);
        return $res['loclNombre'];
    }
    else{
        $sql = "SELECT subNombre from subBodega WHERE IdSubBodega =$IdSubBodega";
        $res = sql_get($sql);
        return $res['subNombre'];
    }
}

?>