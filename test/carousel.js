const track = document.querySelector('.carousel-track');
const slides = Array.from(track.children);
let currentIndex = 0;

// Chuyển sang slide tiếp theo
function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    const offset = -currentIndex * slides[0].getBoundingClientRect().width;
    track.style.transform = `translateX(${offset}px)`;
}

// Tự động chuyển slide mỗi 3 giây
setInterval(nextSlide, 3000);
