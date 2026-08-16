<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Products CRUD</h3>
    </div>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Edit Product</h4>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">Back to Products</a>
                </div>
                <div class="card border-0 shadow-lg">
                    <form enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" value="{{ old('name', $product->name) }}" class="@error('name') is-invalid @enderror form-control" placeholder="Product Name" name="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">SKU</label>
                                <input type="text" value="{{ old('sku', $product->sku) }}" class="@error('sku') is-invalid @enderror form-control" placeholder="SKU Code" name="sku">
                                @error('sku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="text" value="{{ old('price', $product->price) }}" class="@error('price') is-invalid @enderror form-control" placeholder="0.00" name="price">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea placeholder="Product Description" class="form-control" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Image</label>
                                <input type="file" class="@error('image') is-invalid @enderror form-control" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if ($product->image)
                                    <div class="mt-2">
                                        <img width="100" class="rounded border" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}">
                                    </div>
                                @endif
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>