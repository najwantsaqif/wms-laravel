<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS Dashboard - PT REMAJA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fa-solid fa-boxes-packing me-2"></i>WMS PT REMAJA
            </a>
        </div>
    </nav>

    <div class="container">
        
        <!-- PESAN SUKSES (Jika ada) -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-check-circle me-2"></i>{{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- PESAN ERROR (Jika ada) -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4">
            <!-- TABEL INVENTARIS -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-primary"><i class="fa-solid fa-list-check me-2"></i>Daftar Inventaris</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0 align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>SKU</th>
                                        <th>Nama Produk</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- LOOPING DATA DARI DATABASE -->
                                    @foreach ($products as $product)
                                    <tr>
                                        <td><span class="badge bg-secondary">{{ $product->sku }}</span></td>
                                        <td class="fw-semibold">{{ $product->name }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- JIKA KOSONG -->
                                    @if($products->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">Belum ada data produk.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORM INPUT BARANG -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-plus-circle me-2"></i>Input Barang Baru</h5>
                    </div>
                    <div class="card-body">
                        <!-- FORM LARAVEL -->
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf <!-- Token Keamanan Wajib Laravel -->
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kode SKU</label>
                                <input type="text" name="sku" class="form-control" placeholder="cth: SKU-104" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Produk</label>
                                <input type="text" name="name" class="form-control" placeholder="cth: Busi Iridium" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Jumlah Stok</label>
                                <input type="number" name="stock" class="form-control" placeholder="0" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100 fw-bold shadow-sm">
                                <i class="fa-solid fa-save me-2"></i>Simpan Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>