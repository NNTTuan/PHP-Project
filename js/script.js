const phanLoaiSelect = document.getElementById("phanLoai");
const searchInput = document.getElementById("searchInput");

phanLoaiSelect.addEventListener("change", function () {
  if (this.value === "cuaHang") {
    searchInput.placeholder = "Nhập cửa hàng bạn cần tìm";
  } else {
    searchInput.placeholder = "Nhập hàng hóa bạn cần tìm";
  }
});
