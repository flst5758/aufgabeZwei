<?php

/*
 * REST-Service-frontend for cache isbn-proxy server
 * isbnJson.php = REST-Schnittstelle
 * 
 * @author FSteffen
 */
require_once 'code/SidServiceJson.php';
require_once 'code/DBCacheService.php';
require_once 'code/Serialdata.php';
$numberOfPages = 0;
$sid = $_POST["ID"];
$title = $_POST["Titel"];
$sizeOfCollection = $_POST["Sammlungsumfang"];
$measure = $_POST["Masseinheit"];
$numberOfVolumes = $_POST["numberOfVolumes"];
if($measure == "cm"){
    $numberOfPages = $measure * 150;
}else{
    $numberOfPages = $measure;
}

$service = new DBCacheService(new SidServiceJson($sid, $title, $numberOfPages, $numberOfVolumes));
$books = $service->getData($sid, $title, $numberOfPages, $numberOfVolumes);

$mapBook = function($book) {return get_object_vars($book);}; 
$json = array_map($mapBook, $books);
echo json_encode($json, JSON_PRETTY_PRINT);

