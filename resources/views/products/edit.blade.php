<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #f0f2f5;">
    <div class="container mt-5">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0 fw-bold">Edit Produk</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>SKU</label>
                        <input type="text" name="sku" class="form-control" value="{{ $product->sku }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>