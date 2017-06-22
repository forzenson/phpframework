<div id="cart">
    <h2>Cart</h2>
    <ul class="cart-items">
    </ul> <!-- cart-items -->

    <div class="cart-total">
        <p>Subtotal <span class="subtotalTotal">$0.00</span></p>
        <p>Tax <span class="taxes">$0.00</span></p>
        <p>Shipping <span class="shipping">$0.00</span></p>
        <p>Total <span class="finalTotal">$0.00</span></p>
    </div> <!--cart-total -->

    <a href="#" class="checkout-btn dialog__trigger">Checkout</a>

    <p class="error"></p>
    <p class="go-to-cart"><a href="#">Go to cart page</a></p>

    <div class="pay">
        <div class="checkout-header">
          <h1 class="checkout-title">
            Checkout Order
            <span class="checkout-price">$10</span>
          </h1>
        </div>
        <p>
          <input required type="text" class="checkout-input" placeholder="Your name"  id="name">
          <input required type="tel" id="tel" pattern="0([0-9]{2})([0-9]{7})" placeholder="Телефон в формате: 0(xx)-xxx-xx-xx" class="checkout-input">

          <textarea id="comment" placeholder="Комментарий к заказу" class="checkout-input"></textarea>

        </p>

        <p>
          <a href="#" class="checkout-btn dialog__pay">Pay Now</a>
        </p>


    </div>
</div> <!-- cart -->

<script id='cartItem' type='text/template'>
  <li class="cart-product">
      <span class="img"><input class="qty" value="1"></span>
      <span class="name"></span><a href="#" class="item-remove"></a><br />
      <span class="price"></span>
      <code class="subtotal"></code><br />
  </li>
</script>