<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Products CRUD</h3>
    </div>
    <div class="container my-4">
        <div class="row justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10 mb-3">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                        <h4 class="text-white mb-0">Products List</h4>
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Add Product</a>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($products->isNotEmpty())
                                @foreach ($products as $product)
                                <tr>
                                    <td class="fw-bold">{{ $product->id }}</td>
                                    <td>
                                        @if ($product->image)
                                            <img width="120" height="120" style="object-fit: cover;" class="rounded border shadow-sm" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}">
                                        @else
                                            <div class="bg-light rounded border d-flex align-items-center justify-content-center text-muted" style="width: 120px; height: 120px; font-size: 0.85rem;">
                                                No Image
                                            </div>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $product->name }}</td>
                                    <td><span class="badge bg-secondary">{{ $product->sku }}</span></td>
                                    <td class="fw-bold text-success">${{ number_format($product->price, 2) }}</td>
                                    <td style="max-width: 250px;">{{ $product->description }}</td>
                                    <td>
                                        <div class="d-flex flex-column gap-2">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-dark btn-sm">Edit</a>
                                            <a href="javascript:void(0);" onclick="deleteProduct({{ $product->id }});" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                        <form id="delete-product-from-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="post" class="d-none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">No products found.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(id) {
            if (confirm("Are you sure you want to delete this product?")) {
                document.getElementById("delete-product-from-" + id).submit();
            }
        }
    </script>
</body>
</html>