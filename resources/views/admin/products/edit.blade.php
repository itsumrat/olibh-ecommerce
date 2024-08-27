@extends('admin.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row gy-4">

            <div class="col-sm-12 col-md-7">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">General</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" id="product-name" placeholder="Cloths" />
                            <label for="product-name">Product Name</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <textarea name="description" class="form-control" placeholder="Describe" style="min-height: 300px;">{{ $product->description }}</textarea>
                            <label>Product Description</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Pricing</h6>
                    </div>
                    <div class="card-body">
                        <div class="input-group input-group-merge mb-4">
                            <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                            <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price">
                        </div>
                        <div class="input-group input-group-merge mb-4">
                            <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                            <input type="text" value="{{ $product->special_price }}" name="special_price" class="form-control" placeholder="Special price">
                        </div>
                        <div class="input-group input-group-merge mb-4">
                            <select id="defaultSelect" name="price_type" class="form-select">
                                <option disabled aria-readonly="true">Special price type</option>
                                <option value="0" {{ $product->price_type == 0 ? 'selected' : '' }}>Fixed</option>
                                <option value="1" {{ $product->price_type == 1 ? 'selected' : '' }}>Percentage</option>
                            </select>
                        </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <input class="form-control" value="{{ $product->sp_start ? date('Y-m-d', strtotime($product->sp_start)) : '' }}" name="sp_start" type="date" id="html5-date-input">
                            <label for="html5-date-input">Special price start</label>
                        </div>


                        <div class="form-floating form-floating-outline mb-4">
                            <input class="form-control" value="{{ $product->sp_end ? date('Y-m-d', strtotime($product->sp_end)) : '' }}" name="sp_end" type="date" id="html5-date-input">

                            <label for="html5-date-input">Special price end</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="file" name="image" class="form-control" id="product_image" />
                            <label for="product_image">Product Image</label>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" width="100">

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection