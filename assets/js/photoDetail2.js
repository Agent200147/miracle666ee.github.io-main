const params = (new URL(document.location)).searchParams;
const advertisement = params.get("advertisement")
const btnOtclick = document.getElementById('btn-otklick')
const btnHasOtclick = document.getElementById('btnHasOtclick')
btnOtclick.addEventListener('click', function () {
    console.log('click')
    $.ajax({
        type: "POST",
        url: "../../submitAdvertisement.php",
        data: {
            advertisementId: advertisement
        },
        cache: false,
        success: function (html) {
            if (html === 'Ок') {
                btnOtclick.style.display = 'none'
                btnHasOtclick.style.display = 'flex'
            }
        }
    });
})

$.ajax({
    type: "POST",
    url: "../../checkAdvertisement.php",
    data: {
        advertisementId: advertisement
    },
    cache: false,
    success: function (html) {
        if (html === 'is one') {
            btnOtclick.style.display = 'none'
            btnHasOtclick.style.display = 'flex'
        }
        console.log(html)
    }
});