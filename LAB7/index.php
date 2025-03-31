<?php

include_once 'Controllers/EditorialesController.php';
include_once 'Controllers/IndexController.php';
$url=  $_SERVER ['REQUEST_URI'];
$slices=explode('/',$url);
$controller=empty($slices[3])?"IndexController":$slices[3]."Controller";
$method=empty($slices[4])?"index":$slices[4];
$params=empty($slices[5])?[]:array_slice($slices,5);
$cont= new $controller;
$cont-> $method($params);
