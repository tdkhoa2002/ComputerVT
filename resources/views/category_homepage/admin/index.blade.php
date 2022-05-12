<link rel="stylesheet" href="{{ asset('/css/products/all_products.css') }}">
@extends('layouts.app')

@section('content')
<section class="container">
    <div style="margin-bottom: 20;">
        <a href="{{ route('categories_homepage.create') }}"><button class="btn btn-primary">Create Categories Homepage</button></a>
    </div>
    <div>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td class="handle">
                        <form action="{{ route('categories_homepage.listproducts', ['categories_homepage' => $category]) }}" >
                            @csrf
                            <button type="submit" class="btn btn-warning">Show</button>
                        </form>
                        <form action="{{ route('categories_homepage.edit', ['categories_homepage' => $category]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action="{{ route('categories_homepage.destroy', ['categories_homepage' => $category]) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection