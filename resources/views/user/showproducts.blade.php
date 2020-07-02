@include('partials.header')
@include('partials.header1')
<!--  /*====================Products show==========================*/ -->
<div class="container">
    <div class="drop2" style="display: flex;">
        <div class="dropdown" style="margin-top: 5px; margin-left: 50px">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form action="/home" method="post">
                    @csrf
                    <input type="text" name="txtSort" value="tang" hidden="hidden">
                    <button class="dropdown-item" type="submit">Ascending</button>
                </form>
                <form action="/home" method="post">
                    @csrf
                    <input type="text" name="txtSort" value="giam" hidden="hidden">
                    <button class="dropdown-item" type="submit">Decrease</button>
                </form>
            </div>
        </div>
    </div>
    @foreach($products as $product)

    <div class="grid-container">
        <div class="grid-item">
            <div class="pro-image">
                <a href="/product/detail/{{$product->id}}"> <img src="{{$product->image}}"
                        style="height:330px; width: 270px; "></a>
            </div>
            <div class="pro-title" style="font-size:19px;">
                <p style="text-align: left;"> <a href="/product/detail/{{$product->id}}">{{$product->title}}</a></p>
                <p style="text-align: left;">Price: {{$product->new_price}} <sub>đ</sub></p>
            </div>
        </div>
    </div>
    @endforeach

</div>

</div>
<div style="display: flex;justify-content: space-between;">

    <a class="btn btn-success" href="/home?page={{$page-1}}">Previous</a>
    <a class="btn btn-success" href="/home?page={{$page+1}}">Next</a>
</div>

@include('partials.footer')