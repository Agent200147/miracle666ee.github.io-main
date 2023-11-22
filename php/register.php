<?php
	include 'connectionDB.php';
	
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$tel = filter_var(trim($_POST['telefon']), FILTER_SANITIZE_STRING);
	$password_hashed = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	if(mb_strlen($name) == 0 || mb_strlen($email) == 0 || mb_strlen($tel) == 0 || mb_strlen($password_hashed) == 0){
		echo "Заполните все поля!";
		exit();
	}

	if (!preg_match('/\S+@\S+\.\S+/', $email)){
		echo "Неверно указан email!";
		exit();
	}

	if (!preg_match('/^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/', $tel)){
		echo "Неверно указан номер телефона!";
		exit();
	}

	if(mb_strlen($password_hashed) < 6){
		echo "Слишком короткий пароль!";
		exit();
	}

	$password_hashed = password_hash($password_hashed."hash", PASSWORD_DEFAULT);

	$stmt = $mysql->prepare("SELECT * FROM `users` WHERE email = :email");
	$stmt->bindParam(':email', $email);
	$stmt->execute();

	 $user_check = $stmt->fetch();
	 if($user_check){
	 	echo "Такой пользователь уже есть!";
	 	exit();
	 }

	$stmt = $mysql->prepare("INSERT INTO `users` (`name`, `email`, `telefon`, `password`) VALUES(:login, :email, :tel, :pass)");

	$stmt->bindParam(':login', $name);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':tel', $tel);
	$stmt->bindParam(':pass', $password_hashed);
	$stmt->execute();

    $stmt = $mysql->prepare("SELECT `id` FROM `users` ORDER BY `id` DESC");
    $stmt->execute();
    $id_user = $stmt->fetch();

    session_start();
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email;
	$_SESSION["id_user"] = $id_user['id'];


