<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credential: true");
header("Access-Control-Allow-Headers: authorization, content-type");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    die;
}

session_start();

//require_once __DIR__ . '/../vendor/autoload.php';

//require_once "../index.php";
