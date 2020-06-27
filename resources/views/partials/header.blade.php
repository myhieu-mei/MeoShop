<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/app.css">

    <script type="text/javascript">
    $('#header-search').on('keyup', function() {
        var search = $(this).serialize();
        if ($(this).find('.m-input').val() == '') {
            $('#search-suggest div').hide();
        } else {
            $.ajax({
                    url: '/search',
                    type: 'POST',
                    data: search,
                })
                .done(function(res) {
                    $('#search-suggest').html('');
                    $('#search-suggest').append(res)
                })
        };
    });
    </script>
</head>

<body>

    <div class="header">
        <div class="call-us">
            <span style="color: white;">Hotline: </span>
            <a href="" style="color: #d35922;">(028) 6256 3737</a>
            <span style="color: white;">Email:</span>
            <a href="" style="color: #d35922;">myhieu@gmail.com</a>
        </div>

        <div class="">
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
    <div class="nav1">
        <form id="demo-2" style="height: 150px; display:grid; flex-direction:row;" method="post" action="/user/search" >
            @csrf
<div style="justify-content: center;">
            <ul style=" margin: auto;text-align: center;  " id="menu"
                >
                <a class="navbar-brand">HOME </a>
                <a class="navbar-brand">NEW</a>
                <a class="navbar-brand">SALE</a>
                <a class="navbar-brand">WOMEN FASHION</a>
                <a class="navbar-brand">ACCESSORIES</a>
                <a class="navbar-brand">ALBUM</a>
                <a class="navbar-brand">CONTACT</a>

            </ul>
            </div>
            <div style="justify-content: right; margin-top:20px;">
                <input type="search" placeholder="Search" name="search" id="search">
                <i class="fa fa-shopping-cart" style="margin-top: 0px;"><span class="cart-quantity"> 0 </span></i>

            </div>
    </form>

    </div>
    
</body>

</html