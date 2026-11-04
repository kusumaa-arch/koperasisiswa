(() => {
    'use strict';

    const HEADER_SCROLL_OFFSET = 60;
    const TO_TOP_SCROLL_OFFSET = 500;
    const REVEAL_THRESHOLD = 0.12;

    const SUPPORTED_LANGUAGES = ['id', 'en'];
    const DEFAULT_LANGUAGE = 'id';
    const LANGUAGE_STORAGE_KEY = 'lang';

    /* localStorage bisa tidak tersedia (mode privat, dll.), jadi dibungkus aman. */
    const storage = {
        get(key) {
            try {
                return localStorage.getItem(key);
            } catch {
                return null;
            }
        },
        set(key, value) {
            try {
                localStorage.setItem(key, value);
            } catch {
                /* abaikan */
            }
        },
    };

    /* Header berubah + tombol kembali ke atas saat scroll */
    function initScrollEffects() {
        const header = document.getElementById('header');
        const toTop = document.getElementById('toTop');
        if (!header || !toTop) {
            return;
        }

        const update = () => {
            header.classList.toggle('scrolled', window.scrollY > HEADER_SCROLL_OFFSET);
            toTop.classList.toggle('show', window.scrollY > TO_TOP_SCROLL_OFFSET);
        };

        window.addEventListener('scroll', update, { passive: true });
        toTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
        update();
    }

    /* Menu mobile */
    function initMobileMenu() {
        const nav = document.getElementById('nav');
        const burger = document.getElementById('burger');
        if (!nav || !burger) {
            return;
        }

        burger.addEventListener('click', () => nav.classList.toggle('open'));
        nav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => nav.classList.remove('open'));
        });
    }

    /* Animasi muncul saat scroll */
    function initRevealAnimation() {
        const items = document.querySelectorAll('.reveal');

        if (!('IntersectionObserver' in window)) {
            items.forEach((item) => item.classList.add('in'));
            return;
        }

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: REVEAL_THRESHOLD });

        items.forEach((item) => observer.observe(item));
    }

    /* Filter produk (halaman Produk) */
    function initProductFilter() {
        const chips = document.querySelectorAll('#filters .chip');
        const cards = document.querySelectorAll('#productGrid .product-card');

        chips.forEach((chip) => {
            chip.addEventListener('click', () => {
                chips.forEach((other) => other.classList.toggle('active', other === chip));

                const filter = chip.dataset.filter;
                cards.forEach((card) => {
                    const isVisible = filter === 'all' || card.dataset.cat === filter;
                    card.classList.toggle('hide', !isVisible);
                    if (isVisible) {
                        card.classList.add('in');
                    }
                });
            });
        });
    }

    /* Ganti bahasa ID / EN */
    function initLanguageSwitcher() {
        const buttons = document.querySelectorAll('#language button');

        const setLanguage = (lang) => {
            if (!SUPPORTED_LANGUAGES.includes(lang)) {
                return;
            }

            document.documentElement.lang = lang;

            document.querySelectorAll('[data-id][data-en]').forEach((element) => {
                element.innerHTML = element.getAttribute(`data-${lang}`);
            });

            buttons.forEach((button) => {
                button.classList.toggle('active', button.dataset.lang === lang);
            });

            storage.set(LANGUAGE_STORAGE_KEY, lang);
        };

        buttons.forEach((button) => {
            button.addEventListener('click', () => setLanguage(button.dataset.lang));
        });

        const savedLanguage = storage.get(LANGUAGE_STORAGE_KEY);
        if (savedLanguage && savedLanguage !== DEFAULT_LANGUAGE) {
            setLanguage(savedLanguage);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        initScrollEffects();
        initMobileMenu();
        initRevealAnimation();
        initProductFilter();
        initLanguageSwitcher();
    });
})();
