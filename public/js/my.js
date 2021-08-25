$('#current').change(function () {
    window.location = 'currency/change?curr=' + $(this).val()
})

$('.available select').on('change' , function() {
    var modId = $(this).val(),
        size = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base');
    if(price){
        $('#base-price').text(symboleLeft + price + symboleRight);
    }else{
        $('#base-price').text(symboleLeft + basePrice + symboleRight);
    }
})

//начало Корзина
$('body').on('click', '.add-to-cart-link', function (e) {
   e.preventDefault();
   var id = $(this).data('id'),
       qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
       mod = $('.available select').val();
   $.ajax({
       url: '/cart/add',
       data: {id: id, qty: qty, mod: mod},
       type: 'GET',
       success: function (res) {
           showCart(res);
       },
       error: function () {
           alert('Ошибка попробуйте позже');
       }
   })

});

function showCart (cart) {
    if ($.trim(cart) == '<h3>Корзина пуста...</h3>') {
        $('.order').css('display', 'none');
    }else {
        $('.order').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if ($('.cart-sum').text()) {
        $('.sumcart').html($('#cart .cart-sum').text());
    }else {
        $('.sumcart').text('0');
    }
}

function getCart () {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка попробуйте позже');
        }
    })
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка попробуйте позже');
        }
    })
}
$('#cart .modal-body').on('click', '.del-item', function () {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res)
        },
        error: function () {
            alert('Error');
        }
    })
})
//конец Корзины

//Фильтры
$('body').on('change', '.side-bar input', function () {
    var checked = $('.side-bar input:checked'),
        data = ''
    checked.each(function () {
        data += this.value + ','
    })
    if (data) {
         $.ajax({
             url: location.href,
             data: {filter: data},
             type: 'GET',
             beforeSend: function () {
                 $('.fashions').hide()
             },
             success: function (res) {
                 $('.fashions').html(res).fadeIn();
                 var url = location.search.replace(/filter(.+?)(&|$)/g,'')
                 var newURL = location.pathname + url +(location.search ? "&" : "?") + "filter=" + data;
                 newURL = newURL.replace('&&', '&');
                 newURL = newURL.replace('?&','?');
                 history.pushState({},'',newURL);
             },
             error: function () {
                 alert('Ошибка!')
             }
         })
    }else {
        window.location = location.pathname;
    }
})