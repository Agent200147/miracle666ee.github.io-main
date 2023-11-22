<?php
session_start();
$isAuth = false;
$isSelf = false;

include 'db_connection.php';
$advertisement_Id = $_GET['advertisement'];

$advertisement = $mysql->prepare("SELECT * FROM advertisements WHERE id = :id_advertisement");
$advertisement->bindParam(':id_advertisement', $advertisement_Id);
$advertisement->execute();
$advertisement = $advertisement->fetch();

$id_user = $advertisement['user'];
$owner = $mysql->query("SELECT name, email, telefon FROM users WHERE id = '$id_user'");
$owner = $owner->fetch();
$selfFoto = false;

if (isset($_SESSION["email"])) {
    $isAuth = true;
    if ($owner['email'] === $_SESSION["email"]) {
        $isSelf = true;
    }
}

$stmt = $mysql->prepare("SELECT name, telefon FROM `users`, `users_advertisements_otklick` WHERE users_advertisements_otklick.advertisement_id = :id_advertisement AND users_advertisements_otklick.user_id = users.id");

$stmt->bindParam(':id_advertisement', $advertisement_Id);
$stmt->execute();
$otklicki = $stmt->fetchAll();
$otklicki_len = count($otklicki);
require_once 'Layouts/header.php'
?>

<section class="container section-avertisementDetail page">
    <div class="advertisement">
        <img src="<?= $advertisement['photopath'] ?>" alt="">
        <div class="otklicki otklicki-pc">
            <h1>Откликнулись <span class="otklicki__number"><?= $otklicki_len ?></span></h1>
            <?php foreach ($otklicki as $row) { ?>
                <div class="otklick__item">
                    <span><?= $row['name'] ?></span>
                    <div><?= $row['telefon'] ?></div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <div class="advertisement-info">
        <div class="advertisement-firstrow">
            <h1 class="advertisement-price"><?= $advertisement['price'] ?> ₽</h1>
            <a href="/" class="btn-return"><img class="imgv" src="assets/img/arrow.svg" alt="" style="rotate: 90deg"/>

                <span class="hidden-576">Назад к списку</span>
            </a>
        </div>
        <div class="advertisement-name">
            <?= $advertisement['name'] ?>
        </div>
        <div class="advertisement-secondrow">
            <p class="owner-telefon">
                <?= $owner['telefon'] ?>
            </p>
            <p class="post-owner"><?= $owner['name'] ?></p>
        </div>

        <?php if ($isAuth) {
            if ($isSelf) {
                ?>
                <div class="add-advertisement btn-otkclick btn-disabled" id="btn-otklick">
                    <div class="sv"> Откликнуться на объявление</div>
                </div>
            <?php } else { ?>
                <div class="add-advertisement btn-otkclick" id="btn-otklick">
                    <div class="sv"> Откликнуться на объявление</div>
                </div>
                <div class="add-advertisement btn-otkclick" id="btnHasOtclick">
                    <img src="assets/img/done.svg" alt=""> Вы откликнулись на объявление
                </div>
            <?php } ?>

        <?php } else { ?>
            <div class="add-advertisement btn-otkclick btn-disabled" id="btn-otklick">
                <div class="sv"> Откликнуться на объявление</div>
            </div>
        <?php } ?>
        <div class="advertisement-description">
            <?= $advertisement['description'] ?>
        </div>

    </div>
    <div class="otklicki otklicki-mobile">
        <h1>Откликнулись <span class="otklicki__number"><?= $otklicki_len ?></span></h1>

        <?php foreach ($otklicki as $row) { ?>
            <div class="otklick__item">
                <span><?= $row['name'] ?></span>
                <div><?= $row['telefon'] ?></div>
            </div>
        <?php }
        ?>
    </div>
</section>
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/js/photoDetail2.js?v=3"></script>
<script src="assets/js/main.js"></script>

<?php
require_once 'Layouts/footer.php'
?>
