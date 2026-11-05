@extends('layouts.admin')

@section('title', $formTitle.' | Kopsis Skansaba Syariah')

@section('content')
    <section class="admin-panel admin-form-panel">
        <div class="admin-page-heading">
            <div>
                <span class="admin-eyebrow">Katalog Kopsis</span>
                <h1>{{ $formTitle }}</h1>
                <p>Lengkapi informasi produk yang akan ditampilkan di katalog.</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="admin-alert admin-alert-error" role="alert">
                Periksa kembali isian yang ditandai sebelum menyimpan.
            </div>
        @endif

        <form
            action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="admin-form admin-product-form"
        >
            @csrf
            @if ($product->exists)
                @method('PUT')
            @endif

            <div class="admin-form-grid">
                <div class="admin-field">
                    <label for="name">Nama produk</label>
                    <input id="name" name="name" value="{{ old('name', $product->name) }}" maxlength="255" required>
                    @error('name') <span class="admin-field-error">{{ $message }}</span> @enderror
                </div>

                <div class="admin-field">
                    <label for="name_en">Nama produk (English, opsional)</label>
                    <input id="name_en" name="name_en" value="{{ old('name_en', $product->name_en) }}" maxlength="255">
                    @error('name_en') <span class="admin-field-error">{{ $message }}</span> @enderror
                </div>

                <div class="admin-field">
                    <label for="category">Kategori</label>
                    <select id="category" name="category" required>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $key }}" @selected(old('category', $product->category ?: array_key_first($categories)) === $key)>
                                {{ $category['name'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('category') <span class="admin-field-error">{{ $message }}</span> @enderror
                </div>

                <div class="admin-field">
                    <label for="price">Harga (Rp)</label>
                    <input id="price" name="price" type="number" min="0" step="1" value="{{ old('price', $product->price) }}" required>
                    @error('price') <span class="admin-field-error">{{ $message }}</span> @enderror
                </div>

                <div class="admin-field">
                    <label for="price_max">Harga maksimal (opsional)</label>
                    <input id="price_max" name="price_max" type="number" min="0" step="1" value="{{ old('price_max', $product->price_max) }}">
                    @error('price_max') <span class="admin-field-error">{{ $message }}</span> @enderror
                </div>

                <div class="admin-field">
                    <label for="stock">Stok</label>
                    <input id="stock" name="stock" type="number" min="0" step="1" value="{{ old('stock', $product->stock ?? 0) }}" required>
                    @error('stock') <span class="admin-field-error">{{ $message }}</span> @enderror
                </div>

                <div class="admin-field admin-field-full">
                    <label for="variants">Varian produk (pisahkan dengan koma)</label>
                    <textarea id="variants" name="variants" rows="3" maxlength="1000" placeholder="Contoh: Merah, Biru, Hitam">{{ old('variants', implode(', ', $product->variants ?? [])) }}</textarea>
                    <small>Maksimal 20 varian, masing-masing maksimal 80 karakter.</small>
                    @error('variants') <span class="admin-field-error">{{ $message }}</span> @enderror
                    @error('variants.*') <span class="admin-field-error">{{ $message }}</span> @enderror
                </div>

                <div class="admin-field admin-field-full">
                    <label for="image">Gambar produk {{ $product->exists ? '(opsional untuk diperbarui)' : '' }}</label>
                    <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp" {{ $product->exists ? '' : 'required' }}>
                    <small>JPG, PNG, atau WEBP; maksimal 2 MB. {{ $product->exists ? 'Kosongkan jika gambar tidak diganti.' : '' }}</small>
                    @if ($product->exists)
                        <img class="admin-image-preview" src="{{ asset($product->image) }}" alt="Gambar {{ $product->name }}">
                    @endif
                    @error('image') <span class="admin-field-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="admin-form-actions">
                <a href="{{ route('admin.products.index') }}" class="admin-button admin-button-outline">Batal</a>
                <button type="submit" class="admin-button admin-button-primary">Simpan Produk</button>
            </div>
        </form>
    </section>
@endsection
