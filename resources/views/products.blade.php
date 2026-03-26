@extends('layouts.parent')

@section('title', 'Products')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fast and Secure</p>
                    <h1>Products</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
@section('content')





    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('product.details', $product->id) }}"><img
                                        src="{{ asset('storage/' . $product->image) }}"class="card-img-top"
                                        style="max-height:250px !important; min-height:250px !important;">
                                </a>
                                <h3>{{ $product->name_en }}</h3>
                                <p class="product-price"> {{ $product->price }}$ </p>
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to
                                        Cart</button>
                                </form>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

            <!-- pagination section -->
            @if ($products->hasPages())
                <div class="row mt-50">
                    <div class="col-lg-12 text-center">
                        <ul class="pagination" style="gap: 10px; justify-content: center; list-style: none; padding: 0;">
                            {{-- Previous Page Link --}}
                            @if ($products->onFirstPage())
                                <li style="display: inline-block;"><span
                                        style="padding: 8px 12px; background-color: #f5f5f5; color: #999; border-radius: 4px; cursor: not-allowed;">←
                                        Previous</span></li>
                            @else
                                <li style="display: inline-block;"><a href="{{ $products->previousPageUrl() }}"
                                        style="padding: 8px 12px; background-color: #F28123; color: white; border-radius: 4px; text-decoration: none;">←
                                        Previous</a></li>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                @if ($page == $products->currentPage())
                                    <li style="display: inline-block;"><span
                                            style="padding: 8px 12px; background-color: #F28123; color: white; border-radius: 4px; font-weight: bold;">{{ $page }}</span>
                                    </li>
                                @else
                                    <li style="display: inline-block;"><a href="{{ $url }}"
                                            style="padding: 8px 12px; background-color: #f5f5f5; color: #333; border-radius: 4px; text-decoration: none;">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($products->hasMorePages())
                                <li style="display: inline-block;"><a href="{{ $products->nextPageUrl() }}"
                                        style="padding: 8px 12px; background-color: #F28123; color: white; border-radius: 4px; text-decoration: none;">Next
                                        →</a></li>
                            @else
                                <li style="display: inline-block;"><span
                                        style="padding: 8px 12px; background-color: #f5f5f5; color: #999; border-radius: 4px; cursor: not-allowed;">Next
                                        →</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
            <!-- end pagination section -->
        </div>
    </div>
    <!-- end product section -->


    </div>

@endsection
