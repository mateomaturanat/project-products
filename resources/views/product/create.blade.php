@extends('layout.base')

@section('title', 'Create new product')

@section('content')
    <article class="container">
        <section class="row">
            <h1 class="col alert alert-success text-center">Create Product </h1>
        </section>
    </article>
    <article class="container">
        <section>
            <form action="/products" class="row" method="POST">
                @csrf
                <div class="mb-3 col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>
                <div class="mb-3 col-6">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
                </div>
                <div class="mb-3 col-6">
                    <label for="priority" class="form-label">priority</label>
                    <input type="number" class="form-control" id="priority" name="priority" value="{{old('priority')}}">
                </div>
                <div class="mb-3 col-6">
                    <label for="url_image" class="form-label">URl image</label>
                    <input type="text" class="form-control" id="url_image" name="url_image" value="{{old('url_image')}}">
                </div>
                <div class="mb-3 col-6">
                    <label for="average" class="form-label">Category</label>
                    <select class="form-control" name="category_id" wire:model="category_id">
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}"> {{ $cat->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="value" class="form-label">value</label>
                    <input type="text" class="form-control" id="value" name="value" value="{{old('value')}}">
                </div>
                <div class="mb-3 col-12 d-grid">
                    <input type="submit" value="Save" class="btn btn-success text-center">
                </div>
            </form>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </section>
    </article>
@endsection
