<?php
//archivo de configuracion de la base de datos
return [
    'db' => [
        'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'pass' => '',
        'name' => 'proyecto',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
