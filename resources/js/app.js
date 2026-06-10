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

    // Animasi counter angka (fun fact)
    const animateCount = (el) => {
        const target = parseInt(el.dataset.value, 10);
        const duration = parseInt(el.dataset.animationDuration ?? '2000', 10);
        const startTime = performance.now();

        const update = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            el.textContent = Math.floor(progress * target).toLocaleString('id-ID');
            if (progress < 1) {
                requestAnimationFrame(update);
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
