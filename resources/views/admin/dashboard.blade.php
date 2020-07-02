@include('partials.header')




<div style="display: flex; flex-direction:row ;width: 90%; margin:10px auto; min-height: 100%;">
    <div class='content-left' style="min-height: 100%;">
        <section id="tabs" class="project-tab">
            <div class="container" style="justify-content: center;">
                <div>

                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-product-tab" data-toggle="tab" href="#nav-product"
                            role="tabpanel" aria-controls="nav-product" aria-selected="true"><button type="button"
                                class="btn btn-secondary" style="font-size:18px;">Products({{count($products)}})</button></a>

                        <a class="nav-item nav-link" id="nav-order-tab" data-toggle="tab" href="#nav-order"
                            role="tabpanel" aria-controls="nav-order" aria-selected="false"><button type="button"
                                class="btn btn-primary " style="font-size:18px;">Orders({{count($orders)}})</button> </a>

                        <a class="nav-item nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user"
                            role="tabpanel" aria-controls="nav-user" aria-selected="false"><button type="button"
                                class="btn btn-success" style="font-size:18px;">Users({{count($users)}})</button></a>

                        <a class="nav-item nav-link" id="nav-cus-tab" data-toggle="tab" href="#nav-cus" role="tabpanel"
                            aria-controls="nav-cus" aria-selected="false"><button type="button"
                                class="btn btn-warning" style="font-size:18px;">Customers({{count($customers)}})</button></a>

                        <a class="nav-item nav-link" id="nav-cate-tab" data-toggle="tab" href="#nav-cate"
                            role="tabpanel" aria-controls="nav-cate" aria-selected="false"><button type="button"
                                class="btn btn-danger" style="font-size:18px;">Categories({{count($categories)}})</button></a>

                        <a class="nav-item nav-link" id="nav-promo-tab" data-toggle="tab" href="#nav-promo"
                            role="tabpanel" aria-controls="nav-promo" aria-selected="false"><button type="button"
                                class="btn btn-info" style="font-size:18px;">Promotions({{count($promotions)}})</button></a>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-product" role="tabpanel"
                            aria-labelledby="nav-product-tab">
                            <table class="table" cellspacing="0">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Old price</th>
                                    <th>New price</th>
                                    <th>Description</th>
                                    <th> Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php $i=1;?>
                                @foreach ($products as $product)
                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $product->title }} </td>
                                    <td><img src="/{{$product->image}}" style="height:170px; width:150px; ">
                                    </td>
                                    <td> {{ $product->category->name }} </td>
                                    <td> {{ $product->old_price }} </td>
                                    <td> {{ $product->new_price }} </td>
                                    <td>{{ $product->description }}</td>

                                    <td>
                                        <form action="{{'/admin/products/'.$product->id.'/edit'}}" method="GET">
                                            <button type="submit" class="btn btn-link" style="font-size:18px;">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{'/admin/products/'.$product->id}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-link" style="font-size:18px;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                            <table class="table" cellspacing="0">
                                <tr>
                                    <th>Customer name</th>
                                    <th>Promode Code</th>
                                    <th>Total products</th>
                                    <th>Total price</th>
                                    <th>Products</th>
                                    <th>Payment</th>
                                    <th>Delete</th>

                                </tr>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->customer->name}}</td>
                                    <td>{{$order->promo_code}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->total_price}}</td>
                                   <td><a href="/admin/dashboard/order/products/{{$order->id}}">Look more</a> </td>
                                    <td>{{$order->payment}}</td>



                                    <td style="width:100px;">
                                        <form action="/admin/order/{{$order->id}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-primary" style="font-size:18px;">Delete</button>
                                        </form>
                                    </td>



                                </tr>

                                @endforeach


                            </table>

                        </div>

                        <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                            <table class="table" cellspacing="0">
                                <tr>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->role}}</td>
                                    <td style="width:100px;">
                                        <form action="/admin/users/{{$user->id}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-primary" style="font-size:18px;">Delete</button>
                                        </form>
                                    </td>

                                    <td style=" width:100px;">
                                        <form action="/admin/users/{{$user->id}}/edit" method="GET">
                                            @csrf
                                            <button class="btn btn-primary" style="font-size:18px;">Edit</button>
                                        </form>
                                    </td>

                                </tr>

                                @endforeach

                            </table>

                        </div>

                        <div class="tab-pane fade" id="nav-cus" role="tabpanel" aria-labelledby="nav-cus-tab">
                            <table class="table" cellspacing="0">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Zipcode</th>
                                    <th>Notes</th>
                                    <th>Delete</th>

                                </tr>
                                @foreach($customers as $cus)
                                <tr>
                                    <td>{{$cus->name}}</td>
                                    <td>{{$cus->email}}</td>
                                    <td>{{$cus->phone}}</td>
                                    <td>{{$cus->address}}</td>
                                    <td>{{$cus->city}}</td>
                                    <td>{{$cus->zipcode}}</td>
                                    <td>{{$cus->notes}}</td>


                                    <td style="width:100px;">
                                        <form action="/admin/users/{{$user->id}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-primary" style="font-size:18px;">Delete</button>
                                        </form>
                                    </td>



                                </tr>

                                @endforeach


                            </table>

                        </div>

                        <div class="tab-pane fade" id="nav-cate" role="tabpanel" aria-labelledby="nav-cate-tab">
                            <table class="table" cellspacing="0">

                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php $i=1;?>
                                @foreach ($categories as $category)
                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $category->name }} </td>

                                    <td>
                                        <form action="{{'/admin/categories/'.$category->id.'/edit'}}" method="GET">
                                            <button type="submit" class="btn btn-link" style="font-size:18px;">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{'/admin/categories/'.$category->id}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-link" style="font-size:18px;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>

                        </div>

                        <div class="tab-pane fade" id="nav-promo" role="tabpanel" aria-labelledby="nav-promo-tab">
                            <table class="table" cellspacing="0">
                                <tr>
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Value</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php $i=1;?>
                                @foreach ($promotions as $promotion)
                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $promotion->code }} </td>
                                    <td> {{ $promotion->value }} </td>

                                    <td>
                                        <form action="{{'/admin/categories/'.$category->id.'/edit'}}" method="GET">
                                            <button type="submit" class="btn btn-link" style="font-size:18px;">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{'/admin/categories/'.$category->id}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-link" style="font-size:18px;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</div>
@include('partials.footer')