<link rel="stylesheet" href="{{ asset('/css/cart.css') }}">
@extends('layouts.app')

@section('content')
<section class="container">
@if(count($cartData))
<form action="{{ route('order.show', ['order' => auth()->user()->id]) }}" method="get">
  <table class="table">
    <thead>
      <tr>
        <th scope="col" class="img">Sản phẩm</th>
        <th scope="col" class="item">Tên sản phẩm</th>
        <th scope="col" class="quantity">Số lượng</th>
        <th scope="col" class="price">Giá tiền</th>
        <th scope="col" class="remove">Xóa</th>
      </tr>
    </thead>
    <tbody>
        @csrf
        @foreach( $cartData as $cart )
          @foreach( $cart->products as $item )
          <tr>
            <td><img src="{{ asset('storage/thumbnails/'. $item->image_url) }}" alt="" width="100px"></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->pivot->quantity }}</td>
            <td>{{ number_format($item->price * $item->pivot->quantity) }} VNĐ</td>
            <td>
              <form action="{{ route('cart.destroy', ['cart' => $cart->id]) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Xóa</button>
              </form>
            </td>
          </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
    <div>
      <a href="/home">Mua hàng</a>
      <a href="{{ route('order.show', ['order' => auth()->user()->id]) }}">Thanh toán</a>
    </div>
</form>
  
@else
<p>Không có sản phẩm nào trong giỏ hàng</p>
@endif
</section>
@endsection