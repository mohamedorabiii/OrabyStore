@extends('layouts.parent')

@section('title', 'Categories')
<!-- breadcrumb-section -->
{{-- <div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fast and Secure</p>
                    <h1>Categories</h1>
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
                        <h3><span class="orange-text">Our</span> Categories</h3>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 text-center">
                        <a href="{{ route('products', $category->id) }}" class="category-card-link">
                            <div class="category-card">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name_en }}"
                                    class="category-img">
                                <div class="category-card-body">
                                    <h3>{{ $category->name_en }}</h3>
                                    <span>Browse Products &rarr;</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
                <!-- pagination section -->
            @if ($categories->hasPages())
            <div class="row mt-50">
                <div class="col-lg-12 text-center">
                    <ul class="pagination" style="gap: 10px; justify-content: center; list-style: none; padding: 0;">
                        {{-- Previous Page Link --}}
                        @if ($categories->onFirstPage())
                            <li style="display: inline-block;"><span style="padding: 8px 12px; background-color: #f5f5f5; color: #999; border-radius: 4px; cursor: not-allowed;">← Previous</span></li>
                        @else
                            <li style="display: inline-block;"><a href="{{ $categories->previousPageUrl() }}" style="padding: 8px 12px; background-color: #F28123; color: white; border-radius: 4px; text-decoration: none;">← Previous</a></li>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            @if ($page == $categories->currentPage())
                                <li style="display: inline-block;"><span style="padding: 8px 12px; background-color: #F28123; color: white; border-radius: 4px; font-weight: bold;">{{ $page }}</span></li>
                            @else
                                <li style="display: inline-block;"><a href="{{ $url }}" style="padding: 8px 12px; background-color: #f5f5f5; color: #333; border-radius: 4px; text-decoration: none;">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($categories->hasMorePages())
                            <li style="display: inline-block;"><a href="{{ $categories->nextPageUrl() }}" style="padding: 8px 12px; background-color: #F28123; color: white; border-radius: 4px; text-decoration: none;">Next →</a></li>
                        @else
                            <li style="display: inline-block;"><span style="padding: 8px 12px; background-color: #f5f5f5; color: #999; border-radius: 4px; cursor: not-allowed;">Next →</span></li>
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
