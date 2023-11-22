<?php
//header('Content-Type: application/json');
session_start();
include 'db_connection.php';

try {
    $user_id = $_SESSION['id_user'];
    $advertisement_id = $_POST['advertisementId'];
    $stmt = $mysql->prepare("INSERT INTO `users_advertisements_otklick` (`user_id`, `advertisement_id`) VALUES(:user_id, :advertisement_id)");

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':advertisement_id', $advertisement_id);

    $stmt->execute();
    echo 'Ок';
} catch (PDOException $e) {
    echo 'Ошибка: ' . $e->getMessage();
}