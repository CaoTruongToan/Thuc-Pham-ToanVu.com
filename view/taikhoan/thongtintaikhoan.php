<style>
    .my_cart input[type="submit"],
    .my_cart input[type="button"] {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .my_cart input[type="submit"]:hover,
    .my_cart input[type="button"]:hover {
        background-color: #45a049;
    }

    .thongtin{
        width: 180px;
    }

    .txt{
        height: 25px;
    }

</style>

<div class="my_cart">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3 mt-3">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Thông tin tài khoản</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php 
                                
                                    if(isset($_SESSION['user'])){
                                        $name = $_SESSION['user']['name'];
                                        $address = $_SESSION['user']['address'];
                                        $email = $_SESSION['user']['email'];
                                        $tel = $_SESSION['user']['tel'];
                                    }else{
                                        $name = "";
                                        $address = "";
                                        $email = "";
                                        $tel = "";
                                    } 
                                ?>
                            
                                <thead>
                                    <tr> 
                                        <td class="thongtin fw-bold">Tên đăng nhập</td>
                                        <td>
                                            <input class="txt form-control" type="text" name="name" value="<?=$user?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="thongtin fw-bold">mật khẩu</td>
                                        <td>
                                            <input class="txt form-control" type="text" name="name" value="<?=$pass?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="thongtin fw-bold">Họ và tên</td>
                                        <td>
                                            <input class="txt form-control" type="text" name="name" value="<?=$name?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="thongtin fw-bold">Địa chỉ</td>
                                        <td>
                                            <input class="txt form-control" type="text" name="address" value="<?=$address?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="thongtin fw-bold">Email</td>
                                        <td>
                                            <input class="txt form-control" type="text" name="email" value="<?=$email?>">
                                        </td>
                                    </tr>
                                    <tr >
                                        <td class="thongtin fw-bold">Điện thoại</td>
                                        <td>
                                            <input class="txt form-control" type="text" name="tel" value="<?=$tel?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="thongtin fw-bold">Ngày tháng năm sinh</td>
                                        <td>
                                            <div class="dob-container">
                                                <input class="txt dob-input" type="text" name="day" placeholder="Ngày">
                                                <input class="txt dob-input" type="text" name="month" placeholder="Tháng">
                                                <input class="txt dob-input" type="text" name="year" placeholder="Năm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="thongtin fw-bold">CCCD</td>
                                        <td>
                                            <input class="txt form-control" type="text" name="tel" value="">
                                        </td>
                                    </tr>

                                </thead>
                            </table>
                            <div class="xacnhan_donhang">
                                <a href="index.php?act=capnhattaikhoan" class="text-decoration-none">
                                    <input type="button" value="Cập nhật thông tin tài khoản">
                                </a>
                                <a href="index.php?act=bill" class="text-decoration-none">
                                    <input type="submit" value="Hủy">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>