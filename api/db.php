<?php 

/*=====================================
▀▀█▀▀ █  █ █▀▀▀    █▀▀▀ █▀▀█ █ ▄▀ █▀▀▀ 
  █   █▀▀█ █▀▀▀ ▀▀ █▀▀▀ █▄▄█ █▀▄  █▀▀▀ 
  █   █  █ █▄▄▄    █    █  █ █  █ █▄▄▄
=====================================*/

// =============================================
// CONFIGURAÇÃO DO BANCO DE DADOS - RAILWAY
// As credenciais são lidas automaticamente das
// variáveis de ambiente definidas na Railway.
// =============================================

class db {
    public static $db_server;
    public static $db_db;
    public static $db_user;
    public static $db_pass;
    public static $db_port;
}

// Lê as variáveis de ambiente da Railway (MySQL Plugin)
db::$db_server = getenv('MYSQLHOST')     ?: getenv('DB_HOST')     ?: 'localhost';
db::$db_db     = getenv('MYSQLDATABASE') ?: getenv('DB_NAME')     ?: 'lojinha';
db::$db_user   = getenv('MYSQLUSER')     ?: getenv('DB_USER')     ?: 'root';
db::$db_pass   = getenv('MYSQLPASSWORD') ?: getenv('DB_PASSWORD') ?: '';
db::$db_port   = getenv('MYSQLPORT')     ?: getenv('DB_PORT')     ?: '3306';

// Conecta ao banco de dados
$conn = mysqli_connect(
    db::$db_server,
    db::$db_user,
    db::$db_pass,
    db::$db_db,
    (int) db::$db_port
);

if (!$conn) {
    die("Conexao falhou: " . mysqli_connect_error());
}

// Define charset UTF-8
mysqli_set_charset($conn, "utf8mb4");

?>
		
