<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@extends('layouts.app')

@section('content')
<section class="container">
    <h3>Thông tin khách hàng</h3>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div>
            <div>
                <label for="">Họ và tên</label>
                <input type="text" name="fullname" placeholder="Họ và tên">
            </div>
            <div>
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div>
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" placeholder="Số điện thoại">
            </div>
            <div>
                <label for="">Địa chỉ</label>
                <input type="text" name="address" placeholder="Địa chỉ">
            </div>
            <div>
                <textarea name="note" id="note" cols="30" rows="10" placeholder="Ghi chú"></textarea>
            </div>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartData as $cart)
                        @foreach($cart->products as $item)
                        <tr>
                            <td><img src="{{ asset('storage/thumbnails/' . $item->image_url) }}" alt=""></td>
                            <td><p>{{ $item->name }}</p></td>
                            <td><p> {{ $item->pivot->quantity }} </p></td>
                            @if($item->promotional_price)
                            <td><p>{{ number_format( $item->promotional_price ) }} VNĐ</p></td>
                            <td><p>{{ number_format($item->promotional_price * $item->pivot->quantity) }} VNĐ</p></td>
                            @else
                            <td><p>{{ number_format( $item->price ) }} VNĐ</p></td>
                            <td><p>{{ number_format($item->price * $item->pivot->quantity) }} VNĐ</p></td>
                            @endif
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <input type="hidden" value="{{ $sum }}" name="total">
            <p>Tổng: {{ number_format($sum) }} VNĐ</p>
            <button type="submit" href="{{ route('order.store') }}">Gửi đơn hàng</button>
        </div>
    </form>
</section>

@endsection