<link rel="stylesheet" href="{{ asset('/css/products/all_products.css') }}">
<link rel="stylesheet" href="{{ asset('/css/paginate/paginate.css') }}">
@extends('layouts.app')

@section('content')
<section class="container">
    <div style="margin-bottom: 20px;">
        <a href="{{ route('product.create') }}"><button class="btn btn-primary">Create Product</button></a>
    </div>
    <div>
        <table class="table">
        <thead>
            <tr>
            <th scope="col" class="col5">#</th>
            <th scope="col" class="col15">Name</th>
            <th scope="col" class="col15">Category</th>
            <th scope="col" class="col13">Date</th>
            <th scope="col" class="col10">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>
                        @foreach($product->categories as $category)
                            <p>{{ $category->name }}</p>
                        @endforeach
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td class="handle">
                        <form action="{{ route('product.show', ['product' => $product]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-warning">Show</button>
                        </form>
                        <form action="{{ route('product.update', ['product' => $product]) }}" method="post">
                            @csrf
                            @method("PUT")
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action="{{ route('product.destroy', ['product' => $product]) }}" method="post">
                            @csrf
                            @method("Delete")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <form action="{{ route('product.moveSetCategory', ['product' => $product]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-success">Set CH</button>
                        </form>
                        @if(!$product->is_hot)
                        <form action="{{ route('product.hot', ['product' => $product]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-hot">Hot</button>
                        </form>
                        @else
                        <form action="{{ route('product.hot', ['product' => $product]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-normal">Normal</button>
                        </form>
                        @endif
                    </td>
            </tr>
            @endforeach
            {{ $products->render('paginate.paginate_all_products', ['products' => $products]) }}
            
        </tbody>
    </table>
    </div>
</section>
@endsection

<style>
    button.btn-hot {
        background-color: #ff6600;
        color: white;
    }
    button.btn-normal {
        background-color: #ff3399;
        color: black;
    }
</style>
