<?php

    $options = getopt("", [
        "fname:",
//        "user:",
//        "password:"
    ]);
    
    if (isset($options['fname'])){
        $fname = $options['fname'];
    } else {
        echo "\n\nUsage: php $argv[0] --fname=<name of file>.sql\n\n";
        exit;
    }
    $dbname = 'vilnius5';
    $host = '127.0.0.1';
    $user = 'vilnius5';
    $password = 'eiyaehiemearixei';

    $dsn = "mysql:dbname=$dbname;host=$host";
    
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage() . PHP_EOL;
        exit;
    }
    
    if (file_exists($fname)){
        $sql = file_get_contents($fname);
        $qryImport = $pdo->prepare($sql);
        $succ = $qryImport->execute();
        $qryImport->closeCursor();
        if ($succ){
            echo "Import was succesful!\n";
        } else {
            echo "Import failed!\n";
        }
    }