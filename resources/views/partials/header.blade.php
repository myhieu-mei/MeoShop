<!DOCTYPE html>
<html>

<head>
    <title>Meoshopping</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" style="font-size: 18px;">MeoMeo</a>

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

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        WOMEN FASHION
                    </a>
                   
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($categories as $cate)
                <form action="/home" method="post">
                    @csrf
                    <button class="dropdown-item" type="submit" name="cate" value="{{$cate->id}}">{{$cate->name}}</button>
                </form>
                @endforeach
            </div>
                 

                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#">ALBUM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACT</a>
                </li>

            </ul>
            <div style="margin-top: 20px; margin-left: 10px; display: flex; ">
                <form  action="/home" method="post" class="form-inline my-2 my-lg-0">
                @csrf
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"
                        style="font-size:18px;" name="search_txt">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
                        style="font-size:18px;">Search</button>
                </form>


                @if(Auth::user())
                <form action="/auth/logout" method="get">
                    @csrf

                    <div class="nav-item dropdown" style=" display: flex;">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <i class="fa fa-user"> </i> {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a href="/logout" class="dropdown-item">Logout</a>

                        </div>
                        <a href="/user/cartindex" style="margin-top: 5px;"><i class="fas fa-shopping-cart"></i><span>Giỏ
                                Hàng</span></a>
                    </div>
                </form>

                @else
                <div class="account" style="margin-left: 50px; float: right;">
                    <span> <a href="/auth/login"> LOGIN</a> </span> &nbsp;
                    <span><a href="/auth/register">REGISTER </a></span>
                    @endif
                </div>

            </div>
    </nav>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html