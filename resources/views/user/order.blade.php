@include('partials.header')
<h2 style="margin-left: 150px;">Checkout Form</h2>

<div class="row" style="margin-left: 50px;;">
    <div class="col-75">
        <div class="container">
            <form action="/user/order/check" method="POST">
                @csrf
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <div class="row">
                            <div class="col-50">
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="fname" name="fullname" placeholder="John M. Doe">
                            </div>
                            <div class="col-50">
                                <label for="fname"><i class="fa fa-user"></i> Number phone</label>
                                <input type="text" id="fname" name="numphone" placeholder="John M. Doe">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com">
                            </div>
                            <div class="col-50">

                                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                <input type="text" id="city" name="city" placeholder="New York">
                            </div>
                            <div class="col-50">

                                <label for="fname"><i class="fa fa-user"></i> Note</label>
                                <input type="text" id="fname" name="note" placeholder="Notes">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="NY">
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="text" id="zip" name="zip" placeholder="10001">
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <div class="btn-group" data-toggle="payments">

                            <input type="radio" id="card" name="payment" value="Visa Card">
                            <label for="card">Visa Card</label><br>
                            <input type="radio" id="pay" name="payment" value="Payment on delivery">
                            <label for="pay">Payment on delivery</label><br>

                        </div>
                    </div>
                </div>
               
                <button class="checkout round-black-btn" title="" tyle="submit"  name="couponn" value="<?php error_reporting(0);
                        $code="NULL";
                        foreach($promos as $promo){
                                $code= $promo->code;
                        }
                        echo $code;
                         ?>">Checkout</button>

            </form>
            <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="cart-totals">
            <h3>Cart Totals</h3>
            <table>
                <tbody>
                    <tr>
                        <td>Products</td>
                        <td></td>
                    </tr>
                    @foreach($carts as $cart)
                    <tr>
                        <td class="subtotal"> {{$cart->product->title}}({{$cart->quantity}})</td>
                        <td class="subtotal"> {{$cart->product->new_price * $cart->quantity}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Shipping</td>
                        <td class="free-shipping">Free Shipping</td>
                    </tr>
                    <tr>
                        <td>Coupon</td>
                        <td class="free-shipping" > <?php error_reporting(0);
                        $giamgia=0;
                    
                        foreach($promos as $promo){
                                $giamgia = $giamgia+ $promo->value;
                        }
                        echo $giamgia .'%';
                         ?></td>
                    </tr>
                    <tr class="total-row">
                        <td>Total</td>
                        <td class="price-total">
                            <?php
                                $total=0;
                                foreach($carts as $cart){
                                    $total= $total + ($cart->product->new_price * $cart->quantity) ;
                                }
                                if($giamgia==0){

                                    echo $total;
                            }
                            else
                            echo $total-($total * ($giamgia/100));
                                ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            <form action="" method="POST">
                @csrf
                <div class="btn-cart-totals">
                    <input type="text" id="coupon_code" name="coupon_code" placeholder="Coupon Code"
                        style=" border-radius: 2px; ">
                    <button class="round-black-btn" name="btn_coupon" type="submit">Coupon</button>
                    <script>

                    </script>

                </div>
            </form>
            <br>
            <br>


        </div>
        <!-- /.btn-cart-totals -->





    </div>
    <!-- /.cart-totals -->
</div>


</div>
@include('partials.footer')