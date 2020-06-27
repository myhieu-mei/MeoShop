<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <table class="table table-bordered table-dark">
    <?php $i=1; ?>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name product </th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        
            @foreach ($carts as $cart)
            <tr>
                <th scope="row"> {{ $i++ }}</th>
                <td> {{ $cart->product->title }} </td>
                <td><img src="../{{$cart->product->image}}" style="height:170px; width:150px; "></td>
                <td>{{ $cart->quantity }}</td>
                <td> {{ $cart->product->new_price }} </td>
                
                <td>{{ $cart->quantity *  $cart->product->new_price }}</td>
            </tr>
            @endforeach

    </table>
    <button><a href="/user/order">Order</a></button>
    </div>
</body>

</html>