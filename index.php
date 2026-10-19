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
    <title>BUUDIEN.vn clone - Trang chủ</title>
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
                <a href="#"><img src="./img/icon-logo/s3_site_logo.jpeg" alt="logo"></a>
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
                    <a href="#"><img src="./img/icon-logo/user.png" alt="signin-icon">Đăng nhập</a>
                    <a href="#"><img src="./img/icon-logo/shopping-cart.png" alt="cart-icon">Giỏ hàng</a>
                </div>
            </div>

        </div>
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
        <section class="productByCategories">
            <?php if (!empty($data['productByCategories'])): ?>
                <?php foreach ($data['productByCategories'] as $productByCategory): ?>
                    <?php if ($productByCategory['bannerImg'] != "none"): ?>
                        <div class="products">
                            <h1 style="color: white; transform: translate(50px, 150px);"><?php echo htmlspecialchars($productByCategory['title']); ?></h1>
                            <img src="<?php echo htmlspecialchars($productByCategory['bannerImg']); ?>" alt="<?php echo htmlspecialchars($productByCategory['bannerImgAlt']); ?>" class="productByCategoryBanner">
                            <div class="product">
                                <?php if (!empty($productByCategory['products'])): ?>
                                    <?php foreach ($productByCategory['products'] as $product): ?>
                                        <div class="product-card">
                                            <div class="product-img">
                                                <img src="<?php echo htmlspecialchars($product['productImg']) ?>" alt="<?php echo htmlspecialchars($product['productImgAlt']) ?>">
                                            </div>
                                            <h3 class="product-name"><?php echo htmlspecialchars($product['productName']); ?></h3>
                                            <?php if ($product['salePercent'] == "none"): ?>
                                                <h3 class="product-cost"><?php echo htmlspecialchars($product['productCostDefault']) ?></h3>
                                            <?php else: ?>
                                                <div class="saleCost container">
                                                    <p class="product-cost-default"><?php echo htmlspecialchars($product['productCostDefault']) ?></p>
                                                    <p class="salePercent"><?php echo htmlspecialchars($product['salePercent']) ?></p>
                                                </div>
                                                <h3 class="product-cost"><?php echo htmlspecialchars($product['ProductiSaleCost']) ?></h3>
                                            <?php endif ?>
                                            <div class="product-evaluate container">
                                                <div class="evaluate-stars container">
                                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                    <img src="../img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                </div>
                                                <p class="evaluate-amount">(<?php echo htmlspecialchars($product['evaluateAmount']) ?>)</p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <button id="seeMore">Xem thêm sản phẩm</button>
                            </div>
                        </div>
                    <?php elseif ($productByCategory['bannerImg'] == "none"): ?>
                        <div class="products">
                            <h2 style="color: green;"><?php echo htmlspecialchars($productByCategory['title']); ?></h2>
                            <div class="product">
                                <?php if (!empty($productByCategory['products'])): ?>
                                    <?php foreach ($productByCategory['products'] as $product): ?>
                                        <div class="product-card">
                                            <div class="product-img">
                                                <img src="<?php echo htmlspecialchars($product['productImg']) ?>" alt="<?php echo htmlspecialchars($product['productImgAlt']) ?>">
                                            </div>
                                            <h3 class="product-name"><?php echo htmlspecialchars($product['productName']); ?></h3>
                                            <?php if ($product['salePercent'] == "none"): ?>
                                                <h3 class="product-cost"><?php echo htmlspecialchars($product['productCostDefault']) ?></h3>
                                            <?php else: ?>
                                                <div class="saleCost container">
                                                    <p class="product-cost-default"><?php echo htmlspecialchars($product['productCostDefault']) ?></p>
                                                    <p class="salePercent"><?php echo htmlspecialchars($product['salePercent']) ?></p>
                                                </div>
                                                <h3 class="product-cost"><?php echo htmlspecialchars($product['ProductiSaleCost']) ?></h3>
                                            <?php endif ?>
                                            <div class="product-evaluate container">
                                                <div class="evaluate-stars container">
                                                    <img src="./img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                    <img src="./img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                    <img src="./img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                    <img src="./img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                    <img src="./img/icon-logo/star.png" alt="evaluate-star" class="evaluate-star">
                                                </div>
                                                <p class="evaluate-amount">(<?php echo htmlspecialchars($product['evaluateAmount']) ?>)</p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <button id="seeMore" onclick="window.location.href='<?php echo htmlspecialchars($productByCategory['pageHref'])?>'">Xem thêm sản phẩm</button>
                            </div>
                        </div>
                    <?php else: ?>
                        <p class="text-slate-400">Lỗi hiển thị</p>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-slate-400">Chưa có sản phẩm theo danh mục nào được thêm.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer><h3>Copyright &copy; 2026 by Nguyen Ngoc Trong Tuan</h3></footer>
    <script src="./js/script.js"></script>
</body>

</html>