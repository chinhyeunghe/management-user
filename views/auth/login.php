<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống quản lý</title>
    <style>
        /* Reset mặc định của trình duyệt */
        @import url("https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Đặt nền cho toàn bộ trang */
        body {
            font-family: 'Manrope', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container chính */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        /* Form login */
        .login-box {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Tiêu đề form */
        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #333;
        }

        /* Khung input */
        .textbox {
            margin-bottom: 20px;
            position: relative;
        }

        .textbox input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .textbox input:focus {
            border-color: #007BFF;
        }

        /* Nút đăng nhập */
        .btn {
            width: 100%;
            padding: 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-box {
                padding: 30px;
            }

            h2 {
                font-size: 20px;
            }

            .textbox input {
                padding: 12px;
            }

            .btn {
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Đăng Nhập</h2>
            <form action="#" method="POST">
                <div class="textbox">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Mật khẩu" name="password" required>
                </div>
                <input type="submit" value="Đăng nhập" class="btn">
            </form>
        </div>
    </div>
</body>

</html>