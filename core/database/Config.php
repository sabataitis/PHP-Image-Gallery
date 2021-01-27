<?php 
return [
    'database' => [
        'db_name' => 'your-creds',
        'username' => 'your-creds',
        'password' => 'your-creds',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
?>
