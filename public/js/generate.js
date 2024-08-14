const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

// LOAING JS
document.addEventListener('DOMContentLoaded', function () {
    const loadingElement = document.querySelector('.loading');

    // Hiển thị phần loading khi trang bắt đầu tải
    loadingElement.style.display = 'flex';

    // Ẩn phần loading khi trang đã tải xong
    window.onload = function() {
        loadingElement.style.display = 'none';
    };

    const form = document.querySelector("form");

    form.addEventListener("submit", function() {
        // Hiển thị phần loading khi form được submit
        loadingElement.style.display = "flex";
    });
});

