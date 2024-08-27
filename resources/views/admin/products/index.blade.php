@extends('admin.layouts.app')
@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h6 class="card-header">List of products</h6>
                <div class="table-responsive text-nowrap p-2">
                    <table class="table" id="product-list" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Speical Price</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)

                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-px-20 h-auto"><span class="fw-medium">{{ $product->product_name }}</span>
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->special_price }}</td>
                                <td><span class="badge rounded-pill bg-label-primary me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}"><i class=" mdi mdi-trash-can-outline me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete the product <strong>{{ $product->Product_name }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection

@section('scripts')

<script>
    $('body').on('click', '.deleteProduct', function() {
        let id = $(this).data('id');

        let confirmData = confirm("Are you confirm to delete this data!");

        if (confirmData == true) {
            $.ajax({
                method: "get",
                url: "{{ url('products') }}/" + id + '/delete',
                success: function(res) {
                    return location.reload();
                },
                error: function(xhr) {
                    console.log("error");
                }
            });
        }

    });
</script>
@endsection