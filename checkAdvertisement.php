<?php
session_start();
include 'db_connection.php';

$user_id = $_SESSION['id_user'];
$advertisement_id = $_POST['advertisementId'];

$stmt = $mysql->prepare("SELECT `id` FROM `users_advertisements_otklick` WHERE `user_id` = :user_id AND `advertisement_id` = :advertisement_id");

$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':advertisement_id', $advertisement_id);
$stmt->execute();


$result = $stmt->fetch();

if (empty($result['id']))
    echo "none";
else
    echo "is one";











