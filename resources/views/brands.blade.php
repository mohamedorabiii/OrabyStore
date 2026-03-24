@extends('layouts.parent')

@section('title', 'Brands')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
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
</div>
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
		</div>
	</div>
	<!-- end product section -->
@endsection
