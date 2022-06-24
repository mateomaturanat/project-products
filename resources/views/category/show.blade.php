@extends('layout.base')

@section('title', 'Show | ' . $category->name  )

@section('content')
    <article class="container">
        <section class="row">
            <div class="col-12">
                <h1 class="text-center alert alert-success">{{ $category->name }}</h1>
            </div>
        </section>
        <section class="row my-4">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row g-0">

                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <ul>
                                   <li><p class="card-text"><u>Description</u>:{{$category->description}}</p></li>
                                    <li><p class="card-text"><u>Priority: </u>{{$category->priority}}</p></li>
                                </ul>
                                    @can('delete-post')
                                <form action="/categories/{{$category->slug}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input
                                        type="submit"
                                        value="Delete"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure ?')"
                                    >
                                </form>
                                @endcan
                                @can('delete-post')
                                    <td><a href="/categories/{{$category->slug}}/edit" class="btn btn-success">Edit</a></td>
                                @endcan




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
