<?php
include '../php/db_config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: log_reg.php"); // Nếu người dùng chưa đăng nhập, chuyển hướng về trang login
    exit();
}

$user_id = $_SESSION['user_id'];

// Lấy thông tin người dùng
$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$user_info = $stmt->fetch(PDO::FETCH_ASSOC);

// Lấy sản phẩm trong giỏ hàng 
$stmt = $conn->prepare("SELECT p.name, p.price, c.quantity, p.image_url FROM cart c 
                        JOIN products p ON c.product_id = p.id
                        WHERE c.user_id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// tổng tiền
$total_price = 0;
foreach ($cart_items as $item) {
    $total_price += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
    <link rel="stylesheet" href="../css/user_infor.css">
    <link rel="stylesheet" href="../icon/themify-icons/themify-icons.css">
</head>
<body>

<!-- HEADER -->
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

<!-- MAIN -->
    <div class="infor">
        <h1>Account Information</h1>
        <p><strong>USER NAME:</strong> <?php echo htmlspecialchars($user_info['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user_info['email']); ?></p>
        <hr>
    </div>

    <main>
        <h1>YOUR CART</h1>
        <?php if (count($cart_items) > 0): ?>
            <table id="user_table">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Picture</th>
                </tr>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo number_format($item['price'], 2); ?> VNĐ</td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>
                            <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" >
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <h2 id="user_h2">Total: <?php echo number_format($total_price, 2); ?> VNĐ</h2>
        <?php else: ?>
            <p>Giỏ hàng của bạn hiện tại trống.</p>
        <?php endif; ?>

<!-- Buy now -->
            <button onclick="openModal()" id="buy_now">Buy now!</button>
            <div id="cartModal" class="modal">
                <div class="modal-content"> 
                    <span class="close" onclick="closeModal()">&times;</span>
                    <?php include("buy.php"); ?>
                </div>
            </div>
    </main>

<!-- FOOTER -->
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

    <script>
    // Buy button js
        function openModal() {
            document.getElementById('cartModal').style.display = 'flex';
        }

        // Đóng modal
        function closeModal() {
            document.getElementById('cartModal').style.display = 'none';
        }
    </script>
</body>
</html>
