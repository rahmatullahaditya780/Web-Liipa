import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

document.addEventListener('DOMContentLoaded', () => {
    // Sticky navbar saat scroll
    const navBar = document.querySelector('.nav-bar');
    const backToTop = document.querySelector('.back-to-top');

    const onScroll = () => {
        if (navBar) {
            navBar.classList.toggle('sticky-top', window.scrollY > 45);
        }
        if (backToTop) {
            backToTop.classList.toggle('visible', window.scrollY > 300);
        }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    backToTop?.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Animasi reveal saat elemen masuk viewport (pengganti WOW.js)
    const revealObserver = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    obs.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 }
    );
    document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));

    // Efek mengetik pada tagline hero — sekali per elemen, saat slide-nya tampil
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const typeText = (el) => {
        if (el.dataset.typed) return;
        el.dataset.typed = 'true';
        const fullText = el.dataset.text ?? el.textContent.trim();
        el.textContent = '';
        el.classList.add('typing');
        let pos = 0;
        const type = () => {
            el.textContent = fullText.slice(0, ++pos);
            if (pos < fullText.length) {
                setTimeout(type, 65);
            } else {
                el.classList.remove('typing');
            }
        };
        setTimeout(type, 900);
    };

    if (!reduceMotion) {
        // Tagline di luar carousel atau pada slide aktif: ketik langsung saat load
        document.querySelectorAll('.typewriter').forEach((el) => {
            const slide = el.closest('.carousel-item');
            if (!slide || slide.classList.contains('active')) {
                typeText(el);
            }
        });

        // Tagline pada slide lain: ketik saat slide-nya pertama kali tampil
        document.querySelectorAll('.carousel').forEach((carousel) => {
            carousel.addEventListener('slid.bs.carousel', (event) => {
                event.relatedTarget.querySelectorAll('.typewriter').forEach(typeText);
            });
        });
    }

    // Animasi counter angka (fun fact)
    const animateCount = (el) => {
        const target = parseInt(el.dataset.value, 10);
        const duration = parseInt(el.dataset.animationDuration ?? '2000', 10);
        const startTime = performance.now();
        // Easing: cepat di awal lalu melambat (lebih dinamis daripada linear)
        const easeOutExpo = (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t));

        el.classList.add('counting');

        const update = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = easeOutExpo(progress);
            el.textContent = Math.floor(eased * target).toLocaleString('id-ID');
            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                el.textContent = target.toLocaleString('id-ID');
                el.classList.remove('counting');
                el.classList.add('counted');
            }
        };
        requestAnimationFrame(update);
    };

    const counterObserver = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCount(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 }
    );
    document.querySelectorAll('.counter').forEach((el) => counterObserver.observe(el));

    // Auto-submit form saat kontrol berubah (mis. dropdown urutkan di katalog)
    document.querySelectorAll('[data-autosubmit]').forEach((el) => {
        el.addEventListener('change', () => el.form?.submit());
    });

    // Status loading tombol submit (anti double-submit)
    document.querySelectorAll('form[data-loading]').forEach((form) => {
        form.addEventListener('submit', () => {
            const btn = form.querySelector('button[type="submit"]');
            if (!btn || btn.disabled) return;
            btn.disabled = true;
            btn.insertAdjacentHTML(
                'afterbegin',
                '<span class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span>'
            );
        });
    });

    // Tampilkan toast flash message
    document.querySelectorAll('.toast[data-autoshow]').forEach((el) => {
        bootstrap.Toast.getOrCreateInstance(el, { delay: 4000 }).show();
    });
});
