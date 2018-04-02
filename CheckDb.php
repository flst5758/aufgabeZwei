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

if(isset($_POST["sid"]))
{
    $service = new DBCacheService(null);
    $items = $service->findBySid($_POST["sid"]);
    
    $mappedItems = function($item) {return get_object_vars($item);}; 
    $json = array_map($mappedItems, $items);
    echo json_encode($json, JSON_PRETTY_PRINT);
} 
else if(isset($_POST["title"]))
{
    $service = new DBCacheService(null);
    $items = $service->findByTitle($_POST["title"]);

    $mappedItems = function($item) {return get_object_vars($item);}; 
    $json = array_map($mappedItems, $items);
    echo json_encode($json, JSON_PRETTY_PRINT);
}