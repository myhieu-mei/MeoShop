<!DOCTYPE html>
<html>
    <head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
    }

    * {
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    

    .btn:hover {
        background-color: #45a049;
    }

    a {
        color: #2196F3;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">MeoMeo</a>

        <div class="collapse navbar-collapse menu" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SALE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">WOMEN FASHION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ACCESSORIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ALBUM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACT</a>
                </li>

            </ul>
            <div style="margin-top: 20px; margin-left:10px;">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div>
                    @if(Auth::user())
                    <form action="/auth/logout" method="get">
                        @csrf
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><i
                                    class="fa fa-user"></i> {{Auth::user()->name}}</a>
                            <ul class="dropdown-menu">
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </div>
                    </form>
                    @else
                    <div class="account">
                        <span> <a href="auth/login"> LOGIN</a> </span>
                        <span><a href="auth/register">REGISTER </a></span>
                        @endif
                    </div>
                </div>
            </div>
    </nav>


   
    
  
        <h2>Checkout Form</h2>

        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="/user/order" method="POST">
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
                                <div class="btn-group" data-toggle="buttons">
                                    <input type="radio" id="card" name="payment" value="Visa Card">
                                    <label for="card">Visa Card</label><br>
                                    <input type="radio" id="pay" name="payment" value="Payment on delivery">
                                    <label for="pay">Payment on delivery</label><br>
                                </div>
                                <label for="promote">Promotion</label>
                                <input type="text" id="promote" name="promote_code" placeholder="">
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                       
                    </form>
                </div>
            </div>
            <div class="col-25">
                <div class="container">
                    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span>
                    </h4>
                    @foreach ($carts as $cart)
                    <p><a href="#">{{$cart->product->title}}</a> <span
                            class="price">{{$cart->product->new_price}}</span></p>

                    <hr>
                    @endforeach
                    <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
                </div>
            </div>

    </div>
    @include('partials.footer')
</body>

</html>

