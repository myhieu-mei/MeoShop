@include('partials.header')
@include('partials.header1')
<!--  /*====================Products show==========================*/ -->
<div class="container">
    @foreach($products as $product)

    <div class="grid-container">
        <div class="grid-item">
            <div>
                <img src="{{$product->image}}" style="height:250px; width: 270px; ">
            </div>
            <div>
                <p style="text-align: left;"> <a href="/user/show/{{$product->id}}">{{$product->title}}</a></p>
                <p style="text-align: left;">Giá: {{$product->new_price}} <sub>đ</sub></p>
            </div>

            <a style="text-align: center;" href="detail/{{$product->id}}" type="submit" class="btn btn-success"><i
                    class="fas fa-info-circle fa-2x"></i></a>

                    @if(Auth::user())
            <a style="text-align: center; " href="product/cart/{{$product->id}}" type="submit"
                class="btn btn-success"> <i class="fas fa-shopping-cart fa-2x"></i></a>
@endif

        </div>
    </div>
    @endforeach

</div>
</div>

@include('partials.footer')
