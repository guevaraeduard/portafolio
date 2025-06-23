document.addEventListener('DOMContentLoaded', function () {
    // Menú hamburguesa responsivo
    const menuButton = document.getElementById('menuButton');
    const closeButton = document.getElementById('closeButton');
    const mainNav = document.getElementById('mainNav');
    const overlay = document.getElementById('overlay');

    if (menuButton && closeButton && mainNav && overlay) {
        menuButton.addEventListener('click', () => {
            mainNav.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });
        closeButton.addEventListener('click', () => {
            mainNav.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
        overlay.addEventListener('click', () => {
            mainNav.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    }
});
// Carrusel Portafolio
const imagesWeb = [
    './assets/images/bombero.png',
    './assets/images/callejero.png',
    './assets/images/casa.png',
    '/assets/images/gafas.png',
];
const imagesMobile = [
    '../assets/images/laravel.png',
    '../assets/images/vue.png',
    '../assets/images/inertia.png'
];
let currentTab = 'web';
let currentIndex = 0;

const carouselImages = document.getElementById('carousel-images');
const carouselDots = document.getElementById('carousel-dots');
const tabWeb = document.getElementById('tab-web');
const tabMobile = document.getElementById('tab-mobile');
const prevBtn = document.getElementById('carousel-prev');
const nextBtn = document.getElementById('carousel-next');

function renderCarousel(images) {
    if (!carouselImages) return;
    carouselImages.innerHTML = images.map((src, i) =>
        `<img src="${src}" alt="Proyecto ${i + 1}" class="object-contain w-full h-full rounded-lg" style="display:${i === currentIndex ? 'block' : 'none'}">`
    ).join('');
    renderDots(images.length);
}
function renderDots(length) {
    if (!carouselDots) return;
    carouselDots.innerHTML = '';
    for (let i = 0; i < length; i++) {
        const dot = document.createElement('button');
        dot.className = `w-3 h-3 rounded-full ${i === currentIndex ? 'bg-[#ff8000]' : 'bg-gray-500'} focus:outline-none`;
        dot.onclick = () => { currentIndex = i; updateCarousel(); };
        carouselDots.appendChild(dot);
    }
}
function updateCarousel() {
    const images = currentTab === 'web' ? imagesWeb : imagesMobile;
    renderCarousel(images);
}
if (tabWeb && tabMobile && prevBtn && nextBtn) {
    tabWeb.onclick = () => {
        currentTab = 'web';
        currentIndex = 0;
        tabWeb.classList.add('bg-[#ff8000]', 'text-white');
        tabMobile.classList.remove('bg-[#ff8000]', 'text-white');
        tabMobile.classList.add('bg-[#232323]');
        updateCarousel();
    };
    tabMobile.onclick = () => {
        currentTab = 'mobile';
        currentIndex = 0;
        tabMobile.classList.add('bg-[#ff8000]', 'text-white');
        tabWeb.classList.remove('bg-[#ff8000]', 'text-white');
        tabWeb.classList.add('bg-[#232323]');
        updateCarousel();
    };
    prevBtn.onclick = () => {
        const images = currentTab === 'web' ? imagesWeb : imagesMobile;
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateCarousel();
    };
    nextBtn.onclick = () => {
        const images = currentTab === 'web' ? imagesWeb : imagesMobile;
        currentIndex = (currentIndex + 1) % images.length;
        updateCarousel();
    };
    // Inicializar
    updateCarousel();
}
