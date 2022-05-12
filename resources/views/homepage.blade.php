<link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">
@extends('layouts.menu')

@section('content')
<body>
    <section class="container">
        <div>
            <div id="contain-item">
                <ul class="item-scroll">
                    @foreach($categories as $category)
                    @if($category->parent_id == null)
                    <li class="item">
                        <a href="{{ route('category.show', ['category' => $category ]) }}">
                            <span><img src="{{$category->icon}}" alt="">{{$category->name}}</span>
                        </a>
                        @if($category->children)
                        <div class="item-child">
                            @foreach($category->children as $childCategory)
                            <div>
                                <a href="{{ route('category.show', ['category' => $childCategory ]) }}">{{$childCategory->name}}</a>
                                @foreach($childCategory->children as $childchildCategory)
                                <a class="item-child-child" href="{{ route('category.show', ['category' => $childchildCategory ]) }}">{{$childchildCategory->name}}</a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div id="thumbnails">
                <div id="row-space-around">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/homepage/slideshow_14.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/homepage/slideshow_1.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/homepage/slideshow_2.jpg">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    <div style="height: 400px;">
                        <div style="width: 182px">
                            <a href="#">
                                <img style="width: 100%;" src="https://lh3.googleusercontent.com/ePW_BuMixMyjkmSV12uLSNJBT-Kk2Bbs4lyW-flN2Ezg9fhjq0QY5do5OZJ_WnS_GqD00nBWacTHy1LB-bfq2DIvZgndSf7dxQ=rw-w300" alt="">
                            </a>
                        </div>
                        <div style="width: 182px">
                            <a href="#">
                                <img style="width: 100%;" src="https://lh3.googleusercontent.com/7iBAooRzyah4pCaL_e2QPELJXgYx1pou1EPmwgzeMUan6aAI1uAr0xGGGsha1HjVdCnqzUg8Dd0VXTOlvz0-YyzGPgbx9XYE=rw-w300" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="thumbnail-row-under">
                    <div>
                        <a href="#">
                            <img src="https://theme.hstatic.net/1000026716/1000440777/14/solid4.jpg?v=22349" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="https://theme.hstatic.net/1000026716/1000440777/14/solid5.jpg?v=22349" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="https://theme.hstatic.net/1000026716/1000440777/14/solid3.jpg?v=22349" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="list_products">
        <div class="container">
            @foreach($categories_homepage as $category_homepage)
            <div class="category_name">
                <h2>{{ $category_homepage->name }}</h2>
                <a href="{{ route('categories_homepage.show', ['categories_homepage' => $category_homepage]) }}">Xem tất cả</a>
            </div>
            <div id="list-items">
                @foreach($category_homepage->products as $products_category)
                <div class="item">
                    <div class="image-products">
                        <img src="https://product.hstatic.net/1000026716/product/hextech_10_84430b5e3188402590f4dd64cc9fe5af_large.jpg" alt="">
                        <div class="mask">
                            <div>
                                <a href="{{ route('product.show', ['product' => $products_category]) }}">Nhấn vào để xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="info-products">
                        <span class="name">{{ $products_category->name }}</span>
                        @if($products_category->promotional_price)
                        <del>{{ $products_category->price }}₫</del>
                        <span class="promotional-price">{{ $products_category->promotional_price }}₫</span>
                        @else
                        <span class="promotional-price">{{ $products_category->price }}₫</span>
                        @endif
                        @if($products_category->is_hot)
                        <span class="item-icon"><img class="icon" src="https://nupasport.com/wp-content/uploads/2020/12/icon-hot.gif" alt=""></span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>
</body>
@endsection

@extends('layouts.footer')