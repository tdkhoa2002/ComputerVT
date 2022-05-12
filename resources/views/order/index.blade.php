@extends('layouts.app')

@section('content')
<section class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Người đặt hàng</th>
      <th scope="col">Ngày đặt hàng</th>
      <th scope="col">Tổng</th>
      <th scope="col">Status</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
      @foreach($orders as $order)
    <tr>
      <td>{{ $order->id }}</td>
      <td class="name">{{ $order->fullname }}</td>
      <td class="date-order">{{ $order->date_order }}</td>
      <td class="total">{{ number_format( $order->total ) }} VNĐ</td>
      <td class="status">
          @if($order->status == 0)
          <strong>Chưa giao</strong>
          @elseif($order->status == 1)
          <strong>Đang giao</strong>
          @else
          <strong>Đã giao</strong>
          @endif
      </td>
      <td>
        <form action="{{ route('order.showOrder', ['order' => $order]) }}" method="GET">
          @csrf
          <button type="submit">Chi tiết</button>
        </form>
        <form action="{{ route('order.destroy', ['order' => $order]) }}" method="post">
          @csrf
          @method("delete")
          <button type="submit">Xóa</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</section>
@endsection