document.addEventListener('DOMContentLoaded', function () {
    var header = document.getElementById('header');
    var nav = document.getElementById('nav');
    var burger = document.getElementById('burger');
    var toTop = document.getElementById('toTop');

    /* Header berubah + tombol kembali ke atas saat scroll */
    function onScroll() {
        var y = window.scrollY;
        header.classList.toggle('scrolled', y > 60);
        toTop.classList.toggle('show', y > 500);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    toTop.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    /* Menu mobile */
    burger.addEventListener('click', function () {
        nav.classList.toggle('open');
    });
    nav.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function () {
            nav.classList.remove('open');
        });
    });

    /* Animasi muncul saat scroll */
    var items = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('in');
                    obs.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });
        items.forEach(function (el) { io.observe(el); });
    } else {
        items.forEach(function (el) { el.classList.add('in'); });
    }

    /* Filter produk (halaman Produk) */
    var chips = document.querySelectorAll('#filters .chip');
    var cards = document.querySelectorAll('#productGrid .product-card');
    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            chips.forEach(function (c) { c.classList.remove('active'); });
            chip.classList.add('active');

            var f = chip.dataset.filter;
            cards.forEach(function (card) {
                var show = (f === 'all' || card.dataset.cat === f);
                card.classList.toggle('hide', !show);
                if (show) card.classList.add('in');
            });
        });
    });

    /* Ganti bahasa ID / EN */
    var langButtons = document.querySelectorAll('#language button');

    function setLang(lang) {
        document.documentElement.lang = lang;

        document.querySelectorAll('[data-id][data-en]').forEach(function (el) {
            el.innerHTML = el.getAttribute('data-' + lang);
        });

        langButtons.forEach(function (b) {
            b.classList.toggle('active', b.dataset.lang === lang);
        });

        try { localStorage.setItem('lang', lang); } catch (e) {}
    }

    langButtons.forEach(function (b) {
        b.addEventListener('click', function () {
            setLang(b.dataset.lang);
        });
    });

    try {
        var saved = localStorage.getItem('lang');
        if (saved && saved !== 'id') setLang(saved);
    } catch (e) {}
});