<?php 
    session_start();
    include '../model/connect.php'; 

    if (isset($_SESSION['user']) && ($_SESSION['user'])){
        header("Location: index.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://themify.me/themify-icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../admin/assets/css/base.css">
    <link rel="stylesheet" href="../admin/assets/css/main.css">
    <link rel="stylesheet" href="../admin/assets/css/grid.css">
    <link rel="stylesheet" href="../admin/assets/css/reponsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../admin/assets/fonts/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
    <title> Fresh Market </title>
</head>

<body>
    <div class="modal">
        <div class="modal_body">
            <!-- Login form -->
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="form-header">
                        <h3 class="form-heading">Đăng nhập</h3>
                        <span class="form__switch-btn">
                            <a href="register.php">Đăng ký</a>
                        <!-- Đăng ký -->
                        </span>
                    </div>

                    <form method="post" action="login.php" name="formLogin">

                    <?php
                        if (isset($_POST['btndangnhap'])) {
                            $user = $_POST['username'];
                            $pass = $_POST['password'];
                            
                            $sql = "SELECT * FROM tbl_user WHERE user = '$user' AND pass = '$pass'";
                            $result = mysqli_query($conn, $sql);
                        
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $role = $row['role'];
                        
                                    if ($role == 1) {
                                        header("Location: index.php");
                                        exit();
                                    } else {
                                        header("Location: trangchu.php");
                                        exit();
                                    }
                                } else {
                                    echo "<p style='color: red; font-size: 1.6em;'>Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại.</p>";
                                }
                            } else {
                                // Thêm thông báo lỗi SQL nếu có
                                echo "<p style='color: red; font-size: 1.6em;'>Lỗi truy vấn SQL: " . mysqli_error($conn) . "</p>";
                            }
                        }
                        
                    ?>

                        <div class="form">
                            <div class="form__group">
                                <input type="text" name="username" class="form__input" placeholder="Nhập số điện thoại hoặc Email">
                            </div>
                            <div class="form__group">
                                <input type="password" name="password" class="form__input" placeholder="Nhập mật khẩu">
                            </div>
                        </div>

                        <div class="form__aside">
                            <div class="form_help">
                                <a href="" class="form_help-link help-forgot">Quên mật khẩu</a>
                                <span class="form_help-separate"></span>
                                <a href="" class="form_help-link">Cần trợ giúp?</a>
                            </div>
                        </div>

                        <div class="form__controls">
                            <button type="submit" class="btn btn-normal form__controls-back">TRỞ LẠI</button>
                            <button type="submit" class="btn btn-primary" name="btndangnhap">ĐĂNG NHẬP</button>
                        </div>
                    </form>
                </div>

                <div class="form__socials">
                    <a href="" class="socials-facebook btn btn-size-s btn__with-icon">
                        <i class="socials-icon fab fa-facebook"></i>
                        <span class="form__socials-title">Đăng nhập với Facebook</span>
                    </a>
                    <a href="" class="socials-google btn btn-size-s btn__with-icon">
                        <i class="socials-icon fab fa-google"></i>
                        <span class="form__socials-title">Đăng nhập với Google</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>