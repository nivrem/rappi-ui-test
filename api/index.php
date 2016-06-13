<?php
ini_set ('display_errors', 1);
error_reporting(1);
$cantidad_noticias=$_REQUEST["cantidad_noticias"];
$noticias=  fopen("../news_mock.json", "r");
$data=null;
while(!feof($noticias)){
    $data.= (empty($data)?  str_replace("var news=","",fgets($noticias)):fgets($noticias));
}
$data=json_decode($data);
$limite=(!empty($cantidad_noticias) && $cantidad_noticias<=count($data)?$cantidad_noticias:count($data));
$respuesta=array();
for($i=0;$i<$limite;$i++){
    $respuesta[]=$data[$i];
}
header('Content-type: application/json');
echo json_encode($respuesta);