<link rel="stylesheet" href="{{ asset('/css/category/update_category.css') }}">
@extends('layouts.app')

@section('content')
<section class="container">
    <h1>Update Category: {{ $category->name }}</h1>
    <form action="{{ route('category.update', ['category' => $category]) }}" method="POST">
        @csrf
        @method("PUT")
        <div>
            <label for="">Name: </label>
            <input type="text" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</section>
@endsection