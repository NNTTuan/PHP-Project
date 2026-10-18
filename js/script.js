const phanLoaiSelect = document.getElementById("phanLoai");
const searchInput = document.getElementById("searchInput");

phanLoaiSelect.addEventListener("change", function () {
  if (this.value === "cuaHang") {
    searchInput.placeholder = "Nhập cửa hàng bạn cần tìm";
  } else {
    searchInput.placeholder = "Nhập hàng hóa bạn cần tìm";
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const slider = document.getElementById("categorySlider");
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");

  if (slider && prevBtn && nextBtn) {
    // Tính độ rộng của 1 card cộng với khoảng cách (gap = 20px)
    const card = slider.querySelector(".category-card");
    const scrollAmount = card ? card.offsetWidth + 20 : 240;

    // Khi bấm nút sang phải (Next)
    nextBtn.addEventListener("click", function () {
      // Kiểm tra xem đã cuộn đến cuối cùng chưa
      if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 10) {
        // Nếu đến cuối, tự động quay ngược lại vị trí đầu tiên (0)
        slider.scrollTo({ left: 0, behavior: "smooth" });
      } else {
        // Nếu chưa, tiếp tục trượt sang phải một đoạn
        slider.scrollBy({ left: scrollAmount, behavior: "smooth" });
      }
    });

    // Khi bấm nút sang trái (Prev)
    prevBtn.addEventListener("click", function () {
      // Kiểm tra xem đang ở đầu tiên không
      if (slider.scrollLeft <= 0) {
        // Nếu ở đầu, tự động nhảy vòng ra tít phía cuối cùng
        slider.scrollTo({ left: slider.scrollWidth, behavior: "smooth" });
      } else {
        // Nếu chưa, trượt sang trái một đoạn
        slider.scrollBy({ left: -scrollAmount, behavior: "smooth" });
      }
    });
  }
});
