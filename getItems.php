<?php
header('Content-Type: application/json');

include 'db_connection.php';

$fromIndex = $_POST['from'];

$stmt = $mysql->prepare("SELECT * FROM advertisements WHERE id < :id ORDER BY id DESC LIMIT 15");

$stmt->bindParam(':id', $fromIndex);
$stmt->execute();
$result = $stmt->fetchAll();
echo json_encode($result);
