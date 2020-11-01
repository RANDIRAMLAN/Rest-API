<?php
// $mahasiswa = [
//     "nama" => " Randi",
//     "NPM" => "201143500180",
//     "email" => "randi@gmial.com"
// ];

$dbh = new PDO('mysql:host=localhost;dbname=ci4app', 'root', '');
$db = $dbh->prepare('SELECT * FROM orang');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($mahasiswa);
