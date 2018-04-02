<?php

/*
 * REST-Service-frontend for cache isbn-proxy server
 * isbnJson.php = REST-Schnittstelle
 * 
 * @author FSteffen
 */
require_once 'SidServiceJson.php';
require_once 'DBCacheService.php';
require_once 'Serialdata.php';
$numberOfPages = 0;

$sid = !isset($_POST["sid"]) ? "" : $_POST["sid"];
$title = $_POST["title"];
$sizeOfCollection = $_POST["numberOfPages"];
$measure = $_POST["measure"];
$numberOfVolumes = $_POST["numberOfVolumes"];
if($measure == "cm"){
    $numberOfPages = $sizeOfCollection * 150;
}else{
    $numberOfPages = $sizeOfCollection;
}

$service = new DBCacheService(new SidServiceJson($sid, $title, $numberOfPages, $numberOfVolumes));
  
if(strlen($sid) < 3 || count($service->findBySid($sid)) > 0) {
    // do nothing
    http_response_code(500);
    echo "Invalid SID or SID already exists!";
}
else {
    $books = $service->getData($sid, $title, $numberOfPages, $numberOfVolumes);

    $mapBook = function($book) {return get_object_vars($book);}; 
    $json = array_map($mapBook, $books);
    echo json_encode($json, JSON_PRETTY_PRINT);
}
