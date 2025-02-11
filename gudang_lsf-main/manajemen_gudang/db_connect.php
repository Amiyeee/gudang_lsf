<?php
class Database {
    private static $host = "127.0.0.1";  // Host PostgreSQL
    private static $dbname = "manajemen_gudang";  // Nama database
    private static $username = "postgres";  // Username PostgreSQL
    private static $password = "postgres";  // Password PostgreSQL
    private static $port = "5432";  // Port default PostgreSQL
    private static $pdo = null;

    // Method untuk membuat koneksi ke database
    public static function connect() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    "pgsql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname, 
                    self::$username, 
                    self::$password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Mode error sebagai exception
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Hasil query dalam bentuk array asosiatif
                    ]
                );
            } catch (PDOException $e) {
                die("Database Connection Failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }

    // Method untuk memutus koneksi
    public static function disconnect() {
        self::$pdo = null;
    }
}
?>
