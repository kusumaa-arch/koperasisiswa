@php
    $fallback = 'https://placehold.co/300x300/f1f8f1/2e7d32?text=' . urlencode($p['name']);
@endphp

<article class="product-card reveal" data-cat="{{ $p['cat'] }}">
    <div class="product-img">
        <img src="{{ asset('images/products/' . $p['img']) }}"
             alt="{{ $p['name'] }}"
             loading="lazy"
             data-fallback="{{ $fallback }}"
             onerror="imgFallback(this)">
    </div>
    <div class="product-info">
        <h4>{{ $p['name'] }}</h4>
        <span class="price">Rp {{ number_format($p['price'], 0, ',', '.') }}</span>
    </div>
</article>