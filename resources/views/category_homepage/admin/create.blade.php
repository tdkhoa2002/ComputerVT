@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Categories Homepage</h1>
    <form action="{{ route('categories_homepage.store') }}" method="post">
        @csrf
        <div>
            <label for="">Category name: </label>
            <input type="text" name="name">
        </div>
        <div>
            <button type="submit">Create Category</button>
        </div>
    </form>
</div>
@endsection