<?php
session_start();
include 'db_connection.php';


if ($_POST['description'] != "") {
    $username = $_SESSION["email"];

    $stmt = $mysql->prepare("SELECT `id` FROM `users` WHERE `email` = :username ");

    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt;
    $result = $user->fetch();
    $id_user = $result['id'];
    $img_type = substr($_FILES['img_load']['type'], 0, 5);
    $img_size = 10000 * 1024 * 1024;

    $allowed = array('gif', 'png', 'jpg');

    $ext = pathinfo($_FILES['img_load']['name'], PATHINFO_EXTENSION);

    if (!empty($_FILES['img_load']['tmp_name']) and in_array($ext, $allowed) and $_FILES['img_load']['size'] <= $img_size) {

        $img = addslashes(file_get_contents($_FILES['img_load']['tmp_name']));

        $image = $_FILES['img_load'];

        $u = uniqid();

        copy($image['tmp_name'], 'users-advertisements/' . $u . $image['name']);

        $im1 = 'users-advertisements/' . $u . $image['name'];
        $stmt = $mysql->prepare("INSERT INTO `advertisements` (`photopath`, `name`, `price`, `description`, `user`) VALUES('$im1', :name, :price, :description, :id_user)");

        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
        $description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id_user', $id_user);

        $stmt->execute();

    } else {
        echo "Ошибка загрузки фото(Неверный формат или превышен размер в 10 мб)";
    }
} else {
    echo "Заполните все поля корректно!";
}

