@extends('layouts.app')

@section('content')
<section class="container">
<div>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td class="handle">
                        <form action="{{ route('product.deleteCategory', [
                            'product' => $product,
                            'category' => $category
                            ]) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-success">Del CH</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection