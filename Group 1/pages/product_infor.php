<?php
include '../php/db_config.php';

$product = null; // Đảm bảo biến được khởi tạo

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Chuyển đổi id thành số nguyên để tránh lỗi SQL Injection

    // Chuẩn bị truy vấn với PDO
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT); // Gắn giá trị cho tham số :id
    $stmt->execute(); // Thực thi truy vấn
    $product = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy kết quả trả về
}

// Kiểm tra xem sản phẩm có tồn tại không
if (!$product) {
    echo "Sản phẩm không tồn tại hoặc ID sản phẩm không hợp lệ!";
    exit;
}
?>



<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    <link rel="stylesheet" href="../css/product_infor.css">
    <link rel="stylesheet" href="../icon/themify-icons/themify-icons.css">
</head>
<body>
        <header>
            <nav>
                <ul class="home">
                <a href="../pages/log_reg.php">LOGIN / REGISTER</a>
                
                        <a href="home_page.php">
                            <p class="logo">ICONIC</p>
                        </a>
                        <li>
                            <a href="#">HOME</a>
                        </li>
                        <li>
                            <a href="#">SHOES</a>
                            <ul id="sub_nav">
                                <li><a href="#">Adidas</a></li>
                                <li><a href="#">Nike</a></li>
                                <li><a href="#">Bitis</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    <div>
                        <i class="ti-search"></i>
                    </div>
                    <div>
                        
                        <a href="../pages/cart.php" class="ti-shopping-cart"></a>
                    </div>
                    <div>
                        
                        <a href="../pages/user_infor.php" class="ti-user"></a>
                    </div>
                </ul>
                <hr>
            </nav>
        </header>
    <main>
        <div class="product-container">
            <!-- Hiển thị ảnh nếu không có dùng ảnh mặc định -->
            <img src="../img/<?php echo htmlspecialchars($product['image_url'] ?? '../img/IconNike.jfif'); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                
            <!-- tên sản phẩm -->
            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
            
            <!-- Hiển thị giá -->
            <p class="price"><?php echo number_format($product['price'], 0, ',', '.'); ?> VND</p>
            
            <!--  mô tả  -->
            <?php if (!empty($product['description'])): ?>
                <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
            <?php endif; ?>

            <!-- Form thêm vào giỏ hàng -->
            <form action="../php/add_to_cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                <button type="submit">Thêm vào giỏ hàng</button>
            </form>
        </div>
        
    </main>

    <footer>
        <div class="footer_container">
            <p class="logo_footer">ICONIC <span>shoe's</span></p>
            <div class="about_us">
                <div class="about"> About us </div>
                <p>Discover your perfect pair at ICONIC! We offer a wide range of stylish and comfortable footwear for every occasion. Step into fashion and embrace your unique style with us. Follow us on social media for the latest updates and exclusive offers!</p>
            </div>
        </div>
        <div class="in4">
            <p>Follow us</p>
            <div class="icon_soci">
                <i class="ti-instagram"></i>
                <i class="ti-facebook"></i>
                <i class="ti-twitter-alt"></i>
            </div>
        </div>
    </footer>
</body>
</html>
