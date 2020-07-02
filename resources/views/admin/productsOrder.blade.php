<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">

    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div class="container" style="margin: 20px auto; width:1000px" >
    <a href="/admin/dashboard"><button class="btn btn-danger">Come back dashboard</button></a>
        <table class="table" cellspacing="0">
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Quantity </th>
            </tr>
            @foreach($array as $abc)

            <tr>
                <td>
                    <div class="img-product" >
                        <img src="/{{$abc->image}}" style="height: 150px; width:200px;">
                    </div>
                </td>
                <td> {{$abc->title}}</td>
                <td> @foreach($carts as $cart)
                    @if($cart->product_id == $abc->id)
                    {{$cart->quantity}}
                    @endif
                    @endforeach
                </td>

            </tr>
            @endforeach


        </table>

    </div>

</body>

</html>