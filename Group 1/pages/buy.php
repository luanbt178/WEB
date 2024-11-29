<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/model.css">
</head>
<body>
    <div class="main">
        <div class="tb">
            <?php if (count($cart_items) > 0): ?>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Product picture</th>
                    </tr>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo number_format($item['price'], 2); ?> VNĐ</td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><img class="img_cart" src="../img/<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                    
                </table>
                <h2 id="buy_h2">Tổng tiền: <?php echo number_format($total_price, 2); ?> VNĐ</h2>
            <?php else: ?>
                <p class="empty-cart">Giỏ hàng của bạn hiện tại trống.</p>
            <?php endif; ?>
        </div>
        <div class="thongtin_mua">
            <h3>ORDER NGAY GIAO LIỀN TAY</h3>
            <form action="">
                <label for="">Nhập tên của bạn</label><br>
                <input type="text" placeholder="Vui lòng nhập tên của bạn:" required> <br>
                <label for="">Nhập địa chỉ của bạn</label> <br>
                <input type="text" placeholder="Vui lòng nhập đại chỉ của bạn:" required> <br>
                <label for="">Nhập số liên hệ</label><br>
                <input type="text" placeholder="Vui lòng nhập số liên hệ của bạn:" required>
                <button type="submit">Thanh toán & Đặt hàng</button>
            </form>
        </div>
    </div>
</body>
</html>