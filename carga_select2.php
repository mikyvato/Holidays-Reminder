<?php
//aca realiza la conexion
include ("funciones_db.php");
$idPais=$_REQUEST["id"];
//realizamos la consulta
$SQL = "SELECT * FROM provincia WHERE Pais_idPais=$idPais";
$provincias = sql_arreglo($SQL);
if ($provincias){
    //el bucle para cargar las opciones
    echo "<option value=\"0\">Seleccione una opcion</option>";
    foreach ($provincias as $id => $valor){
        echo "<option value=".$valor["idProvincias"].">".utf8_encode($valor["ProvNombre"])."</option>";
    }
}
?>