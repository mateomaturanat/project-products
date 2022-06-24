@extends('layout.base')

@section('title') Product list @endsection

@section('content')
@endsection
<div class="container">
    <div class="row">
        <div class="col-10 mt-4">
            <h1>Products</h1>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <img class="card-img-top" src="{{$product->url_image}}" alt="Card image cap">
                            <p class="card-text">
                            <ul>
                                <li>Value: ${{number_format($product->value),4,".",","}}</li>

                            </ul>

                            </p>
                            <div class="row">
                                <div class="col-12 mt-12" align="center">
                                    <a href="/products/{{$product->slug}}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

