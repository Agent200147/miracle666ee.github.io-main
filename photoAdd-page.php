<?php
session_start();
if ($_SESSION["email"] == '')
    header('Location:/index.php');
include 'db_connection.php';
require_once 'Layouts/header.php'
?>

<section class="container section-addPhoto page">
    <form action="#" class="form-addPhoto" id="form-addPhoto">

        <div class="load-area">
            <div class="photoPreview">
                <img src="#" id="prevImage" alt="">
            </div>
            <div class="load-info">
                <input type="file" id="photo-input" name="file" class="form-loadInput" accept=".jpg"/>
                <label class="label-plus" for="photo-input"><img src="assets/img/+2.svg" alt=""></label>
                <div class="load-description">Загрузите изображение</div>
            </div>
        </div>
        <div class="rest-area">
            <input type="text" placeholder="Название" name="name" class="form-loadInput name-input">
            <input type="text" placeholder="Цена" name="price" class="form-loadInput price-input">
            <textarea placeholder="Описание" name="description" onkeyup="textarea_resize(event, 32.5, 4);" class="form-loadInput description-input"></textarea>
            <div id="text_area_div"></div>
            <div class="rest-low">
                <div class="add-advertisement btn-publish">
                    <div class="sv">Опубликовать фотографию</div>
                </div>
                <div class="rest-info">
                    <div class="info-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="10" cy="10" r="7" stroke="#838383" stroke-width="2"/>
                            <rect x="9" y="6" width="2" height="5" rx="1" fill="#838383"/>
                            <rect x="9" y="12" width="2" height="2" rx="1" fill="#838383"/>
                        </svg>
                    </div>
                    Все поля обязательны для заполнения
                </div>
            </div>

        </div>
    </form>
</section>
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/js/addPhoto.js?v=5"></script>
<script>
    function textarea_resize(event, line_height, min_line_count)
    {
        var min_line_height = min_line_count * line_height;
        var obj = event.target;
        var div = document.getElementById('text_area_div');
        div.innerHTML = obj.value;
        var obj_height = div.offsetHeight;
        if (event.keyCode == 13)
            obj_height += line_height;
        else if (obj_height < min_line_height)
            obj_height = min_line_height;
        obj.style.height = obj_height + 'px';
    }
</script>
<?php
require_once 'Layouts/footer.php'
?>
