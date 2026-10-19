<?php
$dataFile = "../data/tatCaSanPhamDemo.json";

if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
} else {
    echo "<p>Lỗi truy xuất dữ liệu tatCaSanPhamDemo.json</p>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>BUUDIEN.vn clone - Top bán chạy</title>
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
                <a href="#"><img src="../img/icon-logo/s3_site_logo.jpeg" alt="logo"></a>
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
                    <a href="#"><img src="../img/icon-logo/user.png" alt="signin-icon">Đăng nhập</a>
                    <a href="#"><img src="../img/icon-logo/shopping-cart.png" alt="cart-icon">Giỏ hàng</a>
                </div>
            </div>

        </div>
    </header>
    <main>
        <h1 style="color: green; margin:15px 0;">Tất cả sản phẩm</h1>
        <div class="products">
            <div class="product">
                <?php if (!empty($data['allProducts'])): ?>
                    <?php foreach ($data['allProducts'] as $allProduct): ?>
                        <div class="product-card">
                            <div class="product-img">
                                <img src="<?php echo htmlspecialchars($allProduct['productImg']) ?>" alt="<?php echo htmlspecialchars($allProduct['productImgAlt']) ?>">
                            </div>
                            <h3 class="product-name"><?php echo htmlspecialchars($allProduct['productName']); ?></h3>
                            <?php if ($allProduct['salePercent'] == "none"): ?>
                                <h3 class="product-cost"><?php echo htmlspecialchars($allProduct['productCostDefault']) ?></h3>
                            <?php else: ?>
                                <div class="saleCost container">
                                    <p class="product-cost-default"><?php echo htmlspecialchars($allProduct['productCostDefault']) ?></p>
                                    <p class="salePercent"><?php echo htmlspecialchars($allProduct['salePercent']) ?></p>
                                </div>
                                <h3 class="product-cost"><?php echo htmlspecialchars($allProduct['ProductiSaleCost']) ?></h3>
                            <?php endif ?>
                            <div class="product-evaluate container">
                                <div class="evaluate-stars container">
                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                </div>
                                <p class="evaluate-amount">(<?php echo htmlspecialchars($allProduct['evaluateAmount']) ?>)</p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                        <p class="text-slate-400">Chưa có sản phẩm theo danh mục nào được thêm./ Lỗi hiển thị.</p>
                <?php endif ?>
                <button id="seeMore" onclick="window.location.href='#'">Xem thêm sản phẩm</button>
            </div>
        </div>
    </main>
    <footer></footer>
</body>

</html>