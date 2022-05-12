<link rel="stylesheet" href="{{ asset('/css/products/all_products.css') }}">
<link rel="stylesheet" href="{{ asset('/css/paginate/paginate.css') }}">
@extends('layouts.app')

@section('content')
<section class="container">
    <div>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="handle">
                        <form action="{{ route('user.show', ['user' => $user]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-warning">Show</button>
                        </form>
                        @if($user->is_block)
                        <form action="{{ route('user.block', ['user' => $user]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-hot">Unblock</button>
                        </form>
                        @else
                        <form action="{{ route('user.block', ['user' => $user]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-normal">Block</button>
                        </form>
                        @endif
                    </td>
            </tr>
            @endforeach
            {{ $users->render('paginate.paginate_all_users', ['users' => $users]) }}
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