@extends('layouts.admin')

@section('title', 'Pengelolaan Produk | Kopsis Skansaba Syariah')

@section('content')
    <section class="admin-panel">
        <div class="admin-page-heading">
            <div>
                <span class="admin-eyebrow">Katalog Kopsis</span>
                <h1>Pengelolaan Produk</h1>
                <p>Tambah produk, perbarui informasi dan stok katalog.</p>
            </div>
            <a href="{{ route('admin.products.create') }}" class="admin-button admin-button-primary">
                <i class="fa-solid fa-plus"></i> Tambah Produk
            </a>
        </div>

        @if (session('status'))
            <div class="admin-alert admin-alert-success" role="status">{{ session('status') }}</div>
        @endif

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Varian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <div class="admin-product-cell">
                                    <img src="{{ asset($product->image) }}" alt="" onerror="this.style.visibility='hidden'">
                                    <span>{{ $product->name }}</span>
                                </div>
                            </td>
                            <td>{{ $categories[$product->category]['name'] }}</td>
                            <td>
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                @if ($product->price_max !== null)
                                    – {{ number_format($product->price_max, 0, ',', '.') }}
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.products.stock', $product) }}" method="POST" class="admin-stock-form">
                                    @csrf
                                    @method('PATCH')
                                    <label class="sr-only" for="stock-{{ $product->id }}">Stok {{ $product->name }}</label>
                                    <input id="stock-{{ $product->id }}" name="stock" type="number" min="0" value="{{ $product->stock }}" required>
                                    <button class="admin-button admin-button-small" type="submit">Simpan</button>
                                </form>
                            </td>
                            <td>
                                @if ($product->variants)
                                    <div class="admin-variant-list">
                                        @foreach ($product->variants as $variant)
                                            <span class="admin-variant">{{ $variant }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="admin-muted">—</span>
                                @endif
                            </td>
                            <td>
                                <div class="admin-row-actions">
                                    <a class="admin-button admin-button-small admin-button-outline" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="admin-button admin-button-small admin-button-danger" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="admin-empty">Belum ada produk di katalog.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
