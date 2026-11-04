@php
    $formatRupiah = fn (int $amount): string => number_format($amount, 0, ',', '.');
 
    $priceLabel = 'Rp ' . $formatRupiah($product['price']);
    if (isset($product['price_max'])) {
        $priceLabel .= ' – ' . $formatRupiah($product['price_max']);
    }
 
    $fallbackImage = 'https://placehold.co/300x300/f1f8f1/2e7d32?text=' . urlencode($product['name']);
@endphp
 
<article class="product-card reveal" data-cat="{{ $product['cat'] }}">
    <div class="product-img">
        <img src="{{ asset('images/' . $product['img']) }}"
             alt="{{ $product['name'] }}"
             loading="lazy"
             data-fallback="{{ $fallbackImage }}"
             onerror="this.onerror=null;this.src=this.dataset.fallback">
    </div>
    <div class="product-info">
<h4 data-id="{{ $product['name'] }}" data-en="{{ $product['name_en'] ?? '' }}">{{ $product['name'] }}</h4>
        <span class="price">{{ $priceLabel }}</span>
    </div>
</article>
