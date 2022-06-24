@extends('layout.base')

@section('title', 'Show | ' . $product->name  )

@section('content')
    <article class="container">
        <section class="row">
            <div class="col-12">
                <h1 class="text-center alert alert-success">{{ $product->name }}</h1>
            </div>
        </section>
        <section class="row my-4">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row g-0">

                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <img class="card-img-top" src="{{$product->url_image}}" alt="Card image cap">
                                <ul>
                                    <li><p class="card-text"><u>Description:</u> {{$product->description}}</p></li>
                                    <li><p class="card-text"><u>Priority: </u>{{$product->priority}}</p></li>
                                    <li><p class="card-text"><u>Value:</u> ${{number_format($product->value),4,".",","}}</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
