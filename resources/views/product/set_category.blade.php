@extends('layouts.app')

@section('content')
<section class="container">
    <div>
        <h2>Set Categories Homepage for {{$product->name}}</h2>
    </div>
    <div>
        <form action="{{ route('product.setCategory', ['product' => $product]) }}" method="POST">
            @csrf
            <category-select></category-select>
            <div>
                <button type="submit">Set</button>
            </div>
        </form>
    </div>
</section>
@endsection