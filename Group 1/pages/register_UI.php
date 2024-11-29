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
            <h1>ICONIC</h1>
            <form action="../php/register.php" method="post">
                <h2>REGISTER</h2>
                <input type="text" name="username" placeholder="User name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Đăng ký</button>
                <p>Bạn đã có tài khoản <a href = "../pages/log_reg.php"><span>Đăng nhập</span></a></p>
            </form>
    </div>
</body>
</html>