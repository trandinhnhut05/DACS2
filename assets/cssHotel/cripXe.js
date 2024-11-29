const container = document.querySelector('.container-se');
const prevButton = document.getElementById('prevButton-se');
const nextButton = document.getElementById('nextButton-se');

function scrollleft() {
    container.scrollLeft -= 265; // Điều chỉnh khoảng cách cuộn
    setTimeout(() => {
        container.classList.remove('scrolling');
      }, 500);
}

function scrollRight() {
    container.scrollLeft += 265; // Điều chỉnh khoảng cách cuộn
    setTimeout(() => {
        container.classList.remove('scrolling');
      }, 500);
}




document.addEventListener('DOMContentLoaded', function() {
  const navToggle = document.querySelector('.nav-toggle');
  const headerNav = document.querySelector('.header-nav');
  const headerLogin = document.querySelector('.header-login');

  navToggle.addEventListener('click', function() {
  this.classList.toggle('active'); // Thêm/xóa lớp active cho nút menu
  headerNav.classList.toggle('active'); // Thêm/xóa lớp active cho header-nav
  headerLogin.classList.toggle('active'); // Thêm/xóa lớp active cho header-login
  });
  });
  