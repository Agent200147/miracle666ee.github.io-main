<?php
session_start();
include 'db_connection.php';
$isAuth = false;
if (isset($_SESSION["email"])) {
    $isAuth = true;
}
$fotos = $mysql->query("SELECT * FROM advertisements ORDER BY id DESC LIMIT 15");
$fotos2 = $mysql->query("SELECT * FROM advertisements ORDER BY id DESC LIMIT 15");
$fotos2 = $fotos2->fetchAll();
require_once 'Layouts/header.php'
?>
<body>

<div class="section page">
    <div class="container">
        <div class="mes">
            <h1 class="h1">Новые объявления</h1>
            <?php if ($isAuth) { ?>
            <a href="/photoAdd-page.php" class="add-advertisement">
                <img class="white" src="assets/img/+.svg" alt="">
                <div class="sv hidden-576"> Добавить объявления</div>
            </a>
            <?php } else { ?>
                <div class="add-advertisement btn-disabled">
                    <img class="white" src="assets/img/+.svg" alt="">
                    <div class="sv hidden-576"> Добавить объявления</div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="cards">
        <div class="container">
            <div class="cards-holder" id="cards-holder">
                <?php
                foreach ($fotos as $row) { ?>

                    <a href="advertisementDetail.php?advertisement=<?= $row['id'] ?>" class="card">
                        <div class="itemId" style="display: none"><?= $row['id']?></div>
                        <img class="card-img" src="<?= $row['photopath'] ?>"/>
                        <div class="card__info">
                            <div class="card__price"><?= $row['price'] ?> ₽</div>
                            <div class="card__name">
                                <?= $row['name'] ?>
                            </div>
                        </div>
                    </a>
                <?php }
                ?>
            </div>
        </div>
    </div>

    <div class="container more">
        <div class="pokaz" id="show-more">
            <div class="qw">
                <div class="show-more">
                    <img class="imgv" src="assets/img/arrow.svg" alt="">
                    <div class="show_more">Показать еще</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/js/main.js?v=3"></script>

<?php
require_once 'Layouts/footer.php'
?>
