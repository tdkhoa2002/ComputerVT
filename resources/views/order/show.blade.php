
@extends('layouts.app')

@section('content')
<section class="container">
    <div>
        <h1>Thông tin khách hàng</h1>
        <div>
            <label for="">Họ tên:</label>
            <span>{{ $order->fullname }}</span>
        </div>
        <div>
            <label for="">Ngày đặt hàng:</label>
            <span>{{ $order->date_order }}</span>
        </div>
        <div>
            <label for="">Địa chỉ:</label>
            <span>{{ $order->address }}</span>
        </div>
        <div>
            <label for="">Số điện thoại:</label>
            <span>{{ $order->phone }}</span>
        </div>
    </div>
    <div>
        <h1>Danh sách sản phẩm</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->carts as $key => $item)
                @foreach($item->products as $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><img src="{{ asset('storage/thumbnails/' . $product->image_url) }}" alt="" width="100px"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ number_format( $product->pivot->price ) }} VNĐ</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <h3>Tổng: {{ number_format( $order->total ) }} VNĐ</h3>
        <form action="{{ route('order.update', ['order' => $order]) }}" method="post">
            @csrf
            @method("PUT")
            <select name="status" id="status">
                <option value="0">Chưa giao</option>
                <option value="1">Đang giao</option>
                <option value="2">Đã giao</option>
            </select>
            <button type="submit">Lưu</button>
        </form>
    </div>
</section>
@endsection