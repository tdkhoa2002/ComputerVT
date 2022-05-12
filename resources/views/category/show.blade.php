<link rel="stylesheet" href="{{ asset('css/products/show_product.css') }}">
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <div id="list-items">
        @foreach($products as $product)
        <div class="item">
            <div class="image-products">
                <img src="{{ asset('storage/thumbnails/' . $product->image_url) }}" alt="">
                <div class="mask">
                    <div>
                        <a href="{{ route('product.show', ['product' => $product]) }}">Nhấn vào để xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="info-products">
                <span class="name">{{ $product->name }}</span>
                @if($product->promotional_price)
                <del>{{ $product->price }}₫</del>
                <span class="promotional-price">{{ $product->promotional_price }}₫</span>
                @else
                <span class="promotional-price">{{ $product->price }}₫</span>
                @endif
                @if($product->is_hot)
                <span class="item-icon"><img class="icon" src="https://nupasport.com/wp-content/uploads/2020/12/icon-hot.gif" alt=""></span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.footer')