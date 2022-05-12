<!-- <link rel="stylesheet" href="{{ asset('/css/cart.css') }}"> -->
@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ asset('storage/thumbnails/'. $product->image_url ) }} " alt="" width="250px">
    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="number" name="quantity" value="1" min="1">
        @if($product->promotional_price)
            <input type="hidden" name="price" value="{{ $product->promotional_price }}">
            <span>{{$product->promotional_price}}</span>
        @else
            <input type="hidden" name="price" value="{{ $product->price }}">
            <span>{{ $product->price }}</span>
        @endif
        <button type="submit">Đặt Hàng</button>
    </form>
</div>
@endsection

@extends('layouts.footer')