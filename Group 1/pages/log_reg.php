<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập & Đăng ký</title>
    <link rel="stylesheet" href="../css/style_log_reg.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>ICONIC</h1>
            <form action="../php/login.php" method="post">
                <h2>LOGIN</h2>
                <input type="text" name="username" placeholder="User name" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Đăng nhập</button>
                <p>Bạn đã chưa tài khoản <a href = "../pages/register_UI.php"><span>Đăng ký</span></a></p>
            </form>
        </div>
    </div>
</body>
</html>
