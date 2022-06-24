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
            @foreach($categories as $category)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$category->name}}</h5>
                            <p class="card-text">
                            <ul>
                                <li>Description: {{$category->description}}</li>
                                <li>Priority: {{$category->priority}}</li>

                            </ul>

                            </p>
                            <div class="row">
                                <div class="col-12 mt-12" align="center">
                                    <a href="/categories/{{$category->slug}}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

