HTMLDivElement.prototype.show = function () {
    this.style.display = 'block'
}

HTMLDivElement.prototype.hide = function () {
    this.style.display = 'none'
}

const input_load = document.getElementById('photo-input');
const photoPreview = document.querySelector('.photoPreview');
const loadInfo = document.querySelector('.load-info');

const btnLoad = document.querySelector('.btn-publish');

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prevImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

input_load.addEventListener('change', function () {
    loadInfo.style.display = 'none'
    photoPreview.style.display = 'grid'
    readURL(this)
});

btnLoad.addEventListener('click', function () {
    if (btnLoad.classList.contains('active-load')) {
        const fff = document.querySelector('#form-addPhoto');
        const $input = $("#photo-input");
        const fd = new FormData;
        fd.append('img_load', $input.prop('files')[0]);
        fd.append('name', fff.name.value);
        fd.append('price', fff.price.value);
        fd.append('description', fff.description.value);

        $.ajax({
            type: "POST",
            url: "../../loadAdvertisement.php",
            processData: false,
            contentType: false,
            data: fd,
            cache: false,
            success: function (html) {
                if (html == "") {
                    window.location = '../../index.php';
                } else {
                }
                console.log(html)
            }
        });
        return false;
    }
});


const formLoad = document.getElementById('form-addPhoto')

const formLoadInputs = document.querySelectorAll('.form-loadInput')

formLoadInputs.forEach((item) => item.addEventListener('input', () => check_load_fields()))

function check_load_fields() {
    if (formLoad.description.value !== "" && formLoad.file.value !== "" && formLoad.name.value !== "" && formLoad.price.value !== "") {
        btnLoad.classList.add('active-load');
    } else {
        btnLoad.classList.remove('active-load');
    }
}