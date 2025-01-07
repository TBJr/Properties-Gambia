export function lazyLoadImages() {
    const lazyImages = document.querySelectorAll('img.lazy');
    const config = { rootMargin: '0px', threshold: 0.1 };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                observer.unobserve(img);
            }
        });
    }, config);

    lazyImages.forEach((image) => observer.observe(image));
}
