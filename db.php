<?php
$env = parse_ini_file('.env');
define('DATABASE_HOST', $env['DATABASE_HOST']);
define('DATABASE_PORT', $env['DATABASE_PORT']);
define('DATABASE_NAME', $env['DATABASE_NAME']);
define('DATABASE_USER', $env['DATABASE_USER']);
define('DATABASE_PASSWORD', $env['DATABASE_PASSWORD']);

try{
    $pdo = new PDO("mysql:host=" . DATABASE_HOST . ":" . DATABASE_PORT . ";dbname=" . DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
    // Throw error on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
