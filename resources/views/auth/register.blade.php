<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!--====================Đăng kí======================-->

    <div style="text-align: center;">
        <h2>Welcome to Meow Shop</h2>
        <h4>Please Login or Register account</h4>
    </div>
    <div style="width:500px; margin: 50px auto auto auto; border: solid 1px; padding: 10px 10px 10px 10px; background-color: #
EEEEEE;">
        <form class="form-horizontal" action="" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2">Full name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fullname" placeholder="Enter your name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Enter username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Birthday:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="birthday" placeholder="Enter your birthday">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Number phone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="password" placeholder="Enter your phone">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="register" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>





    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>