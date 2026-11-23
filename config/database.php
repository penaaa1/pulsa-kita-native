<?php
// Konfigurasi MySQL untuk pengembangan berikutnya.
$DB_HOST='127.0.0.1'; $DB_NAME='proyek_1_pulsa_data'; $DB_USER='root'; $DB_PASS='';
try { $pdo=new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",$DB_USER,$DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); }
catch(PDOException $e){ $pdo=null; }
