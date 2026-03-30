@extends('layouts.parent')

@section('title', 'Brands')

<!-- breadcrumb-section -->
{{-- <div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fast and Secure</p>
                    <h1>Brands</h1>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- end breadcrumb section -->

@section('content')
    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Brands</h3>
                        <p>Explore our trusted brands and discover the products available for each brand.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse ($brands as $brand)
                    <div class="col-lg-4 col-md-6 text-center">
                        <a href="{{ route('products.brand', $brand->id) }}" class="category-card-link">
                            <div class="category-card brand-card">
                                <img src="{{ $brand->image ? asset('storage/' . $brand->image) : asset('assets/img/products/product-img-1.jpg') }}"
                                    alt="{{ $brand->name_en }}" class="category-img">
                                <div class="category-card-body">
                                    <h3>{{ $brand->name_en }}</h3>
                                    <span>Browse Brand &rarr;</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="single-product-item p-5 text-center">
                            <h3>No Brands Found</h3>
                            <p class="mb-0">There are no active brands available right now.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- pagination section -->
            @if ($brands->hasPages())
                <div class="row mt-50">
                    <div class="col-lg-12 text-center">
                        <ul class="pagination" style="gap: 10px; justify-content: center; list-style: none; padding: 0;">
                            {{-- Previous Page Link --}}
                            @if ($brands->onFirstPage())
                                <li style="display: inline-block;"><span
                                        style="padding: 8px 12px; background-color: #f5f5f5; color: #999; border-radius: 4px; cursor: not-allowed;">←
                                        Previous</span></li>
                            @else
                                <li style="display: inline-block;"><a href="{{ $brands->previousPageUrl() }}"
                                        style="padding: 8px 12px; background-color: #F28123; color: white; border-radius: 4px; text-decoration: none;">←
                                        Previous</a></li>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach ($brands->getUrlRange(1, $brands->lastPage()) as $page => $url)
                                @if ($page == $brands->currentPage())
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
                            @if ($brands->hasMorePages())
                                <li style="display: inline-block;"><a href="{{ $brands->nextPageUrl() }}"
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
            <!-- end product section -->
        </div>
    </div>

@endsection
