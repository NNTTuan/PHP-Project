<?php
$dataFile = "./data/data.json";

if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
} else {
    echo "<p>Lỗi truy xuất dữ liệu data.json</p>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>BUUDIEN.vn clone</title>
</head>

<body>
    <header>
        <nav class="container">
            <div>
                <p><a href="#">Kênh bán hàng</a></p>
                <p><a href="#">Phân phối</a></p>
            </div>
            <div>
                <p><a href="#">Tin tức</a></p>
                <p><a href="#">Gian hàng</a></p>
                <p><a href="#">Thương hiệu</a></p>
                <p><a href="#">Quanh đây</a></p>
                <p><a href="#">Mã giảm giá</a></p>
                <p><a href="#">Mua chung</a></p>
            </div>
        </nav>
        <div class="header-page">
            <div class="header-page-top container">
                <a href="#"><img src="./img/s3_site_logo.jpeg" alt="logo"></a>
                <div class="gigiday">
                    <form method="POST" class="container">
                        <select name="phanLoai" id="phanLoai">
                            <option value="hangHoa">Hàng hóa</option>
                            <option value="cuaHang">Cửa hàng</option>
                        </select>
                        <hr>
                        <input type="text" id="searchInput" class="searchBox" placeholder="Nhập hàng hóa bạn cần tìm">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                    <div class="header-bottom container">
                        <a href="#">Quà tết</a>
                        <a href="#">Đặc sản</a>
                        <a href="#">Trái cây</a>
                        <a href="#">Cà phê</a>
                        <a href="#">Thanh long</a>
                        <a href="#">Xoài</a>
                    </div>
                </div>
                <div class="func container">
                    <a href="#"><img src="./img/user.png" alt="signin-icon">Đăng nhập</a>
                    <a href="#"><img src="./img/shopping-cart.png" alt="cart-icon">Giỏ hàng</a>
                </div>
            </div>
        </div>
            <script src="script.js"></script>
    </header>
    <main>
        <section class="category-panel">
            <h2>Danh mục</h2>

            <div class="slider-wrapper-container">
                <button class="slide-btn prev-btn">&#10094;</button>

                <div class="category-slider-panel" id="categorySlider">
                    <?php if (!empty($data['categories'])): ?>
                        <?php foreach ($data['categories'] as $category): ?>
                            <div class="category-card">
                                <div class="card-bg">
                                    <img src="<?php echo htmlspecialchars($category['imgSrc']); ?>" alt="<?php echo htmlspecialchars($category['title']); ?>">
                                </div>
                                <p class="text-xl font-semibold text-white mb-2"><?php echo htmlspecialchars($category['title']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-slate-400">Chưa có danh mục nào được thêm.</p>
                    <?php endif; ?>
                </div>

                <button class="slide-btn next-btn">&#10095;</button>
            </div>
        </section>
    </main>
    <footer></footer>
</body>

</html>