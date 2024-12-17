<?php
$pdo = dbConnect();

function dbConnect()
{
    $servername = "127.0.0.1:3307";
    $username = "root";
    $password = "";
    $dbname = "zApp";

    try {
        $dsn = "mysql:host=$servername;dbname=$dbname;port=3307";
        $pdo = new PDO($dsn, $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "\n";
        return null;
    }
}
?>