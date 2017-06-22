
    <footer class="footer">

    <div class="footer__inner">

    <div class="footer__bottom">
      
      <div class="footer__bottom-left">
        <p id='copy'>&copy; Shopaholic 2017<p>
        <p>all rights reserved</p>
      </div>

      <div class="footer__bottom-center">
            <p>401 Ukraine Komarova Avenue Kyiv, UA 002 </p>

            <p>crew@my.com    044 243-1107</p>
      </div>

      </div>
    </div>
      
    </footer>
    <script src="/js/jquery.min.js"></script>

    <script>

 

$(document).ready(function () {

var $cart = $('.cart-items');    
    
$('#cart_trigger').on('click', function () {
    toggle_panel_visibility($('#cart'), $('body'));
});

function toggle_panel_visibility(panel, body) {
    if (panel.hasClass('speed-in')) {
        panel.removeClass('speed-in');
        body.removeClass('overflow-hidden');
    } else {
        panel.addClass('speed-in');
        body.addClass('overflow-hidden');
    }
}


    $('body').on('click', '.product .add', function () {
        var items = $cart.children(),
        $item = $(this).parents('.product'),

        $template = $($('#cartItem').html()),

        $matched = null,
        quantity = 0;

        $matched = items.filter(function (index) {
            var $this = $(this);
            return $this.data('id') === $item.attr('id');
        });

        if ($matched.length) {
            quantity = +$matched.find('.qty').val() + 1;
            $matched.find('.qty').val(quantity);
            calculateSubtotal($matched);
        } else {
            $template.find('span.img').css('background-image', 'url(' + $item.find('img').attr('src') + ')');
            var p = parseFloat($item.find('.price').text());

            $template.find('span.name').text($item.find('h2').text().substring(0,20));
            $template.find('.price').text(" "+$item.find('.price').text());
            $template.find('.cart-product').attr('id', $item.attr('id'));
            $template.find('.subtotal').text(' ' + p);

            $template.data('id', $item.attr('id'));
            $template.data('price', p);
            $template.data('subtotal', p);
            $cart.append($template);
        }
        updateCartQuantity();
        calculateAndUpdate();
    });

    function calculateSubtotal($item) {
        var quantity = $item.find('.qty').val(),
        price = $item.data('price'),
        subtotal = quantity * price;

        $item.find('.subtotal').text(' ' + subtotal);
        $item.data('subtotal', subtotal);
    }

    function calculateAndUpdate() {
        var subtotal = 0,
        items = $('.cart-items').children(),
        shipping = items.length > 0 ? 5 : 0,
        tax = 0;
        items.each(function (index, item) {
            var $item = $(item),
            price = $item.data('subtotal');
            subtotal += price;
        });
        $('.subtotalTotal').text(formatDollar(subtotal));
        tax = subtotal * 0.05;
        $('.taxes').text(formatDollar(tax));
        $('.shipping').text(formatDollar(shipping));
        $('.finalTotal').text(formatDollar(subtotal + tax + shipping));
    }

    function formatDollar(amount) {
        return ' ' + parseFloat(Math.round(amount * 100) / 100).toFixed(2);
    }

    function updateCartQuantity() {
        var quantities = 0,
        $cartQuantity = $('span.cart-quantity'),
        items = $cart.children();

        items.each(function (index, item) {
            var $item = $(item),
            quantity = +$item.find('.qty').val();
            quantities += quantity;
        });

        if (quantities > 0) {
            $cartQuantity.removeClass('empty');
        } else {
            $cartQuantity.addClass('empty');
        }
        $cartQuantity.text(quantities);
    }

    $('body').on('click', '.cart-items .item-remove', function () {
        var $this = $(this),
        $item = $this.parents('li');
        $item.remove();
        calculateSubtotal($item);
        updateCartQuantity();
        calculateAndUpdate();
    });

     $('.dialog__trigger').on('click',function(){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'check',
            success: function(d) {
                if(d.r == "fail") {
                    window.location.href = d.url;
                } else {
                    console.log(d.msg);
                    $('.checkout-price').text($('.finalTotal').text());
                    $('.pay').slideToggle();
                }
            }
        });
    });

     $('.dialog__pay').on('click',function(){

        var items = $('.cart-items').children();
        var data = [];


        items.each(function (index, item) {
            var $item = $(item);
            var its = new Object();
            its.id = $item.data('id'),
            
            its.quantity = $item.find('.qty').val();
            
            data.push(its);
            
        });

        
        var info = $('.pay').children();
        var its = new Object();
        its.name = $(info).find('#name').val();
        its.tel = $(info).find('#tel').val();
        its.comment = $(info).find('#comment').val();
        
        $.ajax({
             type: 'POST',
             url: 'cart',
              dataType: 'json',
              data: { 'val': JSON.stringify(data),
                      'info': JSON.stringify(its)},
             success: function(data){
                
                $(location).attr('href', 'catalog')
             }
        });

    });


    $('#addCommentForm').on('submit', function(e) {
      e.preventDefault();

      /* Get from elements values */
         var values = $(this).serialize();

         $.ajax({
                url: "/comment",
                type: "post",
                data: values ,
                success: function (response) {
                   // you will get response from your php page (what you echo or print)
                   console.log(response);         
                 
                   var msg = JSON.parse(response);

                      if(msg.status){
                          console.log('Info: ', msg.status);
                          $(msg.html).hide().insertBefore('#addCommentContainer').slideDown();
                          $('#body').val('');
                      }
                      else {
                          console.log('Info: ', msg.status);
                          $.each(msg.errors,function(k,v){
                              $('label[for='+k+']').append('<span class="error">'+v+'</span>');
                          });
                      }       

                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }

            });
      
        });


});


</script>

    </body>
    </html>
