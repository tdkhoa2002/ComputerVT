<link href="{{ asset('/css/products/create_product.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
<section class="container">
        <div>
            <h2>Thêm sản phẩm</h2>
        </div>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <hr>
            <upload-image></upload-image>
            <div>
                <label for="">Tên sản phẩm: </label>
                <input type="text" name="name">
            </div>
            <category-component></category-component>
            <div id="description">
                <label for="">Mô tả sản phẩm: </label>
                <textarea name="description" id="" rows="2"></textarea>
            </div>
            <div>
                <label for="">Nhà sản xuất: </label>
                <input type="text" name="manufacturer">
            </div>
            <div>
                <label for="">Trạng thái: </label>
                <input type="text" name="status">
            </div>
            <div>
                <label for="">Xuất xứ: </label>
                <input type="text" name="origin">
            </div>
            <div>
                <label for="">Bảo hành: </label>
                <input type="text" name="insurance">
            </div>
            <div>
                <label for="">Giá: </label>
                <input type="text" name="price">
            </div>
            <div>
                <label for="">Giá khuyến mãi: </label>
                <input type="text" name="promotional_price">
            </div>
            <div class="container-button">
                <button type="button" class="cancel">Hủy</button>
                <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>                
            </div>
        </form>
@endsection