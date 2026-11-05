@php
    $formatRupiah = fn (int $amount): string => number_format($amount, 0, ',', '.');

    $priceLabel = 'Rp ' . $formatRupiah($product->price);
    if ($product->price_max !== null) {
        $priceLabel .= ' – ' . $formatRupiah($product->price_max);
    }

    $fallbackImage = 'https://placehold.co/300x300/f1f8f1/2e7d32?text=' . urlencode($product->name);
@endphp

{{-- Dipakai bersama oleh beranda dan halaman Produk agar tampilan & format harga selalu sama --}}
<article class="product-card reveal" data-cat="{{ $product->category }}">
    <div class="product-img">
        <img src="{{ asset($product->image) }}"
             alt="{{ $product->name }}"
             loading="lazy"
             data-fallback="{{ $fallbackImage }}"
             onerror="this.onerror=null;this.src=this.dataset.fallback">
    </div>
    <div class="product-info">
        <h4 data-id="{{ $product->name }}" data-en="{{ $product->name_en ?? $product->name }}">{{ $product->name }}</h4>
        <span class="price">{{ $priceLabel }}</span>
        <div class="catalog-stock {{ $product->stock > 0 ? 'is-available' : 'is-empty' }}">
            <i class="fa-solid {{ $product->stock > 0 ? 'fa-circle-check' : 'fa-circle-exclamation' }}"></i>
            <span>Stok: {{ number_format($product->stock, 0, ',', '.') }}</span>
        </div>
        @if ($product->variants)
            <div class="catalog-variants" aria-label="Varian produk">
                @foreach ($product->variants as $variant)
                    <span class="catalog-variant">{{ $variant }}</span>
                @endforeach
            </div>
        @else
            <span class="catalog-variants-empty">Varian belum diatur</span>
        @endif
    </div>
</article>
