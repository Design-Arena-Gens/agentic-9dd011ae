<?php
require_once __DIR__ . '/config.php';

/**
 * Establish and return a shared PDO connection instance.
 */
function db(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', DB_HOST, DB_NAME);
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            http_response_code(500);
            echo 'Database connection failed. Please verify credentials in includes/config.php';
            error_log(sprintf('DB connection error: %s', $e->getMessage()));
            exit;
        }
    }

    return $pdo;
}
