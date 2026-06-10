/* ===== SCROLL ANIMATIONS ===== */
document.addEventListener('DOMContentLoaded', function () {
    // Intersection Observer untuk scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = entry.target.dataset.animation || 'slideInUp 0.6s ease forwards';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements dengan data-animation attribute
    document.querySelectorAll('[data-animation]').forEach(el => {
        observer.observe(el);
    });

    // Also observe cards, features, etc yang punya specific animations
    document.querySelectorAll('.feature-card, .card').forEach(el => {
        observer.observe(el);
    });
});

/* ===== NAVBAR SCROLL EFFECT ===== */
window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar-glass');
    if (navbar) {
        if (window.scrollY > 50) {
            navbar.style.boxShadow = '0 8px 32px rgba(0, 0, 0, 0.5)';
        } else {
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.3)';
        }
    }
});

/* ===== SMOOTH SCROLL TO SECTIONS ===== */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;

        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

/* ===== STAGGERED ANIMATION FOR LISTS ===== */
function animateListItems(containerSelector, delay = 0.1) {
    const container = document.querySelector(containerSelector);
    if (!container) return;

    const items = container.querySelectorAll('> *');
    items.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        setTimeout(() => {
            item.style.transition = 'all 0.5s ease';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, index * (delay * 1000));
    });
}

/* ===== PAGE LOAD ANIMATION ===== */
window.addEventListener('load', function () {
    // Add fade-in class to body
    document.body.style.animation = 'fadeIn 0.6s ease';

    // Animate page title if exists
    const pageTitle = document.querySelector('h1');
    if (pageTitle) {
        pageTitle.style.animation = 'slideInUp 0.8s ease 0.2s both';
    }
});

/* ===== CARD HOVER LIFT EFFECT ===== */
document.querySelectorAll('.card, .feature-card, .glass-card').forEach(card => {
    card.addEventListener('mouseenter', function () {
        this.style.transform = 'translateY(-8px)';
    });

    card.addEventListener('mouseleave', function () {
        this.style.transform = 'translateY(0)';
    });
});

/* ===== PARALLAX EFFECT ON HERO ===== */
const heroSection = document.querySelector('.hero-section');
if (heroSection) {
    window.addEventListener('scroll', function () {
        const scrollY = window.scrollY;
        heroSection.style.backgroundPosition = `0 ${scrollY * 0.5}px`;
    });
}

/* ===== ANIMATE PROGRESS BARS ===== */
function animateProgressBars() {
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const targetWidth = bar.getAttribute('style').match(/width:\s*(\d+)%/);
        if (targetWidth) {
            const target = parseInt(targetWidth[1]);
            bar.style.width = '0%';

            setTimeout(() => {
                bar.style.transition = 'width 1.5s ease-out';
                bar.style.width = target + '%';
            }, 100);
        }
    });
}

// Jalankan saat page load
window.addEventListener('load', animateProgressBars);

// Jalankan juga saat AJAX load (jika ada)
document.addEventListener('contentUpdated', animateProgressBars);

/* ===== BUTTON RIPPLE EFFECT ===== */
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', function (e) {
        // Don't apply ripple to form submits to avoid duplicate animations
        if (this.type === 'submit') return;

        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const ripple = document.createElement('span');
        ripple.style.position = 'absolute';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.style.width = '0';
        ripple.style.height = '0';
        ripple.style.borderRadius = '50%';
        ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        ripple.style.pointerEvents = 'none';
        ripple.style.transform = 'translate(-50%, -50%)';
        ripple.style.animation = 'ripple 0.6s ease-out';

        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    });
});

// Ripple animation
if (!document.querySelector('style[data-ripple]')) {
    const style = document.createElement('style');
    style.setAttribute('data-ripple', '');
    style.textContent = `
        @keyframes ripple {
            to {
                width: 300px;
                height: 300px;
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
}

/* ===== FADE IN ON INTERSECTION ===== */
function observeElements() {
    const intersectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.animation = 'slideInUp 0.6s ease forwards';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-on-scroll').forEach(el => {
        el.style.opacity = '0';
        intersectionObserver.observe(el);
    });
}

observeElements();
