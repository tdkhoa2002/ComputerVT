@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tạo danh mục</h1>
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div>
            <label for="">Select Parent Category: </label>
            <select name="category_id" >
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">Name Of Child Category: </label>
            <input type="text" name="name">
        </div>
        <div>
            <button type="submit">Create Category</button>
        </div>
    </form>
</div>
@endsection