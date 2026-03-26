@extends('layouts.parent')

@section('title', 'subcategories')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fast and Secure</p>
						<h1>Subcategories</h1>
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
                        <h3><span class="orange-text">Our</span> Subcategories</h3>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($subcategries as $subcategory)
                    <div class="col-lg-4 col-md-6 text-center">
                        <a href="{{ route('products', $subcategory->id) }}" class="category-card-link">
                            <div class="category-card">
                                <img src="{{ asset('storage/' . $subcategory->image) }}"
                                     alt="{{ $subcategory->name_en }}"
                                     class="category-img">
                                <div class="category-card-body">
                                    <h3>{{ $subcategory->name_en }}</h3>
                                    <span>Browse Products &rarr;</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end product section -->


@endsection
