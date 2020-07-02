@include('partials.header')


<div class="cart-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main-heading"> <strong> Shopping Cart</strong></div>
                <div class="table-cart">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>

                                <td>

                                    <div class="display-flex align-center">
                                        <div class="img-product">
                                            <img src="/{{$cart->product->image}}">
                                        </div>
                                        <div class="name-product">
                                            {{$cart->product->title}}
                                        </div>
                                        <div class="price">
                                            {{$cart->product->new_price }}
                                        </div>
                                    </div>
                                </td>
                                <td class="product-count">

                                    <form action="/user/cart" method="post">
                                        @csrf
                                        <input type="" hidden="" name="id" value="{{$cart->product->id}}">

                                        <input type="submit" name="method" style="width:30px;" value="-">
                                        <input type="text" name="quantity" value="{{$cart->quantity}}" min="1"
                                            style="width:30px" disabled>
                                        <input type="submit" name="method" style="width:30px;" value="+">
                                    </form>

                                </td>
                                <td>
                                    <div class="total">
                                        {{$cart->product->new_price* $cart->quantity}}
                                    </div>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div>
                        <a href="/home" class="checkout round-black-btn" title="">Buy more</a>
                    </div>

                </div>
                <!-- /.table-cart -->
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="cart-totals">
                    <h3>Cart Totals</h3>
                    <form action="" method="post" accept-charset="utf-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td class="subtotal"> {{$cart->product->new_price* $cart->quantity}}</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td class="free-shipping">Free Shipping</td>
                                </tr>
                                <tr class="total-row">
                                    <td>Total</td>
                                    <td class="price-total"> {{$cart->product->new_price* $cart->quantity}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-cart-totals">
                            <a href="/user/order" class="checkout round-black-btn" title="">Checkout</a>

                        </div>
                    </form>
                </div>
                <!-- /.btn-cart-totals -->
                </form>
                <!-- /form -->
            </div>
            <!-- /.cart-totals -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
</div>
</div>

@include('partials.footer')