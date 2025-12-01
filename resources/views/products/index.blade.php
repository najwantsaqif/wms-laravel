<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS Dashboard - PT REMAJA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>body { background-color: #f0f2f5; font-family: sans-serif; }</style>
</head>
<body>

    <nav class="navbar navbar-dark bg-primary shadow mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="fa-solid fa-boxes-packing me-2"></i>WMS PT REMAJA</a>
        </div>
    </nav>

    <div class="container">
        
        <!-- Notifikasi Sukses -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- TABEL INVENTARIS (Ini yang benar untuk halaman Index) -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-primary">Daftar Inventaris</h5>
                    </div>
                    <div class="card-body p-0">
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
                                @foreach ($products as $product)
                                <tr>
                                    <td><span class="badge bg-secondary">{{ $product->sku }}</span></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                            <!-- Tombol Edit (Kuning) -->
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a>
                                            
                                            @csrf
                                            @method('DELETE')
                                            <!-- Tombol Hapus (Merah) -->
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- FORM INPUT (Untuk Tambah Data Baru) -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 fw-bold">Input Barang Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Kode SKU</label>
                                <input type="text" name="sku" class="form-control" placeholder="cth: SKU-001" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" name="stock" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>