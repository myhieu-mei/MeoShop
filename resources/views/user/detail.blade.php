@include('partials.header')
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="/{{$products->image}}" /></div>

                    </div>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$products->title}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description">{{$products->description}}.</p>
                    <h4 class="price">current price: <span>{{$products->new_price}}</span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <h5 class="sizes">sizes:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                    </h5>
                    <h5 class="colors">colors:
                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5>
                    <div class="action">
                        <a href="/product/cart/{{$products->id}}"><button class="add-to-cart btn btn-default" type="button">add to
                                cart</button></a>

                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        @if (\Session::has('fatal'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('fatal') !!}</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')