<?php 
    include 'C:\Worksplace\Xampp\htdocs\Web_FreshMarket\model\connect.php'; 
?>

<style>
    .icon-link:hover .help {
        color: #52a851 !important;
        font-weight: bold;
    }
</style>

<div class="wrapper">
    <div class="container">
        <div class="row justify-content-around mb-5">
            <form id="loginForm" action="index.php?act=dangnhap" method="post" class="col-md-5 bg-light p-3 my-3">
                <h3 class="text-center text-uppercase py-3 fs-5 fw-bold">Đăng Nhập</h3>
                <div class="form-group py-2">
                    <label class="fs-6 ms-2" for="susername">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Nhập Email hoặc số điện thoại">
                </div>
                <div class="form-group py-2">
                    <label class="fs-6 ms-2" for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                </div>

                <div class="icon-link p-2">
                    <a href="#" class="help text-decoration-none text-black">Quên mật khẩu</a>
                </div>    
                <div class="icon-link p-2">
                    <a href="#" class="help text-decoration-none text-black">Cần trợ giúp?</a>
                </div>
                <br>
                <div class="row justify-content-end">
                    <div class="col-2 text-end">
                        <input type="submit" class="btn-secondary btn" name="trolai" value="Trở Lại">
                    </div>
                    <div class="col-3 text-end">
                        <input type="submit" class="btn-success btn w-100" name="dangnhap" value="Đăng Nhập">
                    </div>
                </div>
                <br>
                <div class="row p-3">
                <a href="index.php?act=dangky" class="btn-success btn">Đăng ký Tài Khoản</a>
                </div>
                <div class="row">
                    <div class="col-6 ps-3">
                        <a href="#" class="btn btn-primary btn-size-s btn-with-icon w-100">
                            <i class="fab fa-facebook"></i>
                            <span class="form-socials-title">Kết nối với Facebook</span>
                        </a>
                    </div>   
                    <div class="col-6 pe-3">
                        <a href="#" class="btn btn-danger btn-size-s btn-with-icon w-100">
                            <i class="fab fa-google"></i>
                            <span class="form-socials-title">Kết nối với Google</span>
                        </a>
                    </div> 
                </div>
                
            </form>
            
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lấy tham chiếu đến form
        var loginForm = document.getElementById('loginForm');

        // Thêm sự kiện submit form
        loginForm.addEventListener('submit', function (event) {
            // Lấy giá trị của các trường nhập liệu
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Kiểm tra xem các trường đã được nhập hay chưa
            if (username.trim() === '' || password.trim() === '') {
                // Ngăn chặn form từ việc submit
                event.preventDefault();

                // Hiển thị thông báo lỗi
                alert('Vui lòng nhập đầy đủ thông tin đăng nhập.');
            }
        });

        // Xử lý sự kiện khi nhấn vào nút "Đăng ký Tài Khoản"
        var registerButton = document.querySelector('.row.p-3 a.btn-success');
        registerButton.addEventListener('click', function (event) {
            // Chuyển hướng đến trang đăng ký
            window.location.href = 'index.php?act=dangky';

            // Ngăn chặn thực hiện sự kiện mặc định của nút
            event.preventDefault();
        });
    });
</script>
