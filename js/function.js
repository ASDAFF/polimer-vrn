
function replaseBasketTop() {
    $.ajax({
        url: '/ajax/basket.php',
        type: 'get',
        success: function (data) {
            $('.header__cart').replaceWith(data);
        }
    })
}


function addToBasket2(idel, quantity) {

    $href = "/ajax/add.php?id="+idel;
    var _result = true;
    $.ajax({
        url: $href + '&quantity=' + quantity,
        type: 'get',
        success: function (data) {
            if (data == 'Товар успешно добавлен в корзину') {
                replaseBasketTop();
                alertify.success(data);
            } else {
                alertify.error(data);
                _result = false;
            }
        }
    })

    return _result;
}
