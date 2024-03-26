<?php 
    session_start();

    //nếu nút đăng xuất đc bấmn
    if (isset($_GET['logged_out'])) {
        // Hủy phiên đăng nhập
        session_destroy();
    
        // Chuyển hướng về trang index.php
        header("Location: index.php");
        exit();
    }

    if (!isset($_SESSION['mycart'])) {
        $_SESSION['mycart'] = [];
    }

    include("model/connectdb.php");
    include("model/danhmuc.php");
    include("model/sanpham.php");
    include("model/taikhoan.php");
    include("model/cart.php");
    include("global.php");

    include("view/header.php");
    connectdb();

    // Biến để kiểm soát việc bao gồm chân trang hay không
    $includeFooter = true;

    $thongbao = "";  // Thông báo đăng ký
    $errors = array();  // Mảng chứa thông báo lỗi

    //arry chứa 25 sản phẩm
    $spnew = gettall_sp_home();

    $sptop10 = gettall_sp_top();

    // arry chứa danh sách danh mục
    $dssm = gettall_dm();

    if(isset($_GET['act']) && ($_GET['act'] !="" )){
        $act = $_GET['act'];
        switch ($act) {

            case 'sanpham':
                if (isset($_POST['kyw'])  && ($_POST['kyw'] != "")) {
                    $kyw = $_POST["kyw"];
                }else{
                    $kyw = "";
                }

                if (isset($_GET['iddm']) && is_numeric($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                    $id_danhmuc = $_GET['iddm'];
                } else {
                    $id_danhmuc = 0;
                }
                
                $dssp = gettall_sp($kyw, $id_danhmuc);
                include "view/sanpham/sanpham.php";
                break;

            case 'chitietsanpham':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    $id = $_GET['id'];
                    $onesp = getonesp($id);
                   // Kiểm tra xem có thông tin chi tiết sản phẩm hay không
                    if(isset($onesp[0]['id_danhmuc'])){
                        $iddanhmuc = (int)$onesp[0]['id_danhmuc']; // Chuyển đổi thành kiểu số nguyên
                        $sp_cung_loai = getspcungloai($id, $iddanhmuc);
                        include "view/chitietsanpham/chitietsanpham.php";
                    } else {
                        // Hiển thị thông báo lỗi và thông tin debug
                        echo "Không tìm thấy thông tin chi tiết sản phẩm.";
                        var_dump($onesp); // In thông tin chi tiết sản phẩm để kiểm tra
                    }
                }else{
                    include("view/home.php");
                }
                
                break;

            case 'sanphambanchay':
                include "view/sanphambanchay/sanphambanchay.php";
                break;

            case 'sanphamgiamgia':
                include "view/sanphamgiamgia/sanphamgiamgia.php";
                break;

            case 'thanhtoan':
                include "view/thanhtoan/thanhtoan.php";
                break;

            case 'giaohang':
                include "view/giaohang/giaohang.php";
                break;

            case 'giaohang':
                include "view/giaohang/giaohang.php";
                break;

            case 'lienhe':
                include "view/lienhe/lienhe.php";
                break;

            case 'thoat':
                session_unset();
                header('Location: index.php');
                break;

            case 'dangnhap':
                if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                    $name = "";
                    $address = "";
                    $email = "";
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $checkuser = checkuser($user, $pass);
                    if(is_array($checkuser)){
                        $_SESSION['user'] = $checkuser;
                        header('location: index.php');
                        exit();
                    }
                }
                
                include "view/taikhoan/login.php";
                break;
            
            case 'trolai':
                if(isset($_POST['trolai']) && ($_POST['trolai'])){
                    include "index.php";
                    break;
                }


            case 'dangky':
                $thongbao = "";
                if(isset($_POST['dangky']) && ($_POST['dangky'])){
                    $name = "";
                    $address = "";
                    $email = "";
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
                    // Kiểm tra trường Tên đăng nhập
                    if (empty($user)) {
                        $errors[] = "Vui lòng nhập Tên đăng nhập.";
                    }

                    // Kiểm tra trường Mật khẩu
                    if (empty($pass)) {
                        $errors[] = "Vui lòng nhập Mật khẩu.";
                    }

                    // Kiểm tra trường Nhập lại mật khẩu
                    if (empty($confirm_password)) {
                        $errors[] = "Vui lòng nhập lại Mật khẩu.";
                    }

                    // Kiểm tra mật khẩu và nhập lại mật khẩu có khớp nhau không
                    if ($pass != $confirm_password) {
                        $errors[] = "Mật khẩu và Nhập lại mật khẩu không khớp.";
                    }
 
                    // Nếu không có lỗi, thêm vào CSDL
                    if (empty($errors)) {
                        $thongbao = "Đăng ký thành công!";
                        insert_taikhoan($name, $address, $email, $user, $pass);
                    }
                }

                include "view/taikhoan/register.php";
                break;

                case 'thongtintaikhoan':
                    include "view/taikhoan/thongtintaikhoan.php";
                    break;

                case 'viewcart':
                    include "view/cart/viewcart.php";
                    break;

                // case 'addtocart':
                    // if(isset($_POST['addtocart']) && ($_POST['addtocart'])){
                    //     $id = $_POST['id'];
                    //     $tensanpham = $_POST['tensanpham'];
                    //     $img = $_POST['img'];
                    //     $giamoi = $_POST['giamoi'];
                    //     $soluong = 1;
                    //     $thanhtien = $soluong * $giamoi;
                    //     $spadd = [$id, $tensanpham, $img, $giamoi, $soluong, $thanhtien];
                    //     array_push($_SESSION['mycart'],$spadd);
                    // }

                case 'addtocart':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Lấy giá trị từ mảng POST hoặc sử dụng giá trị mặc định là rỗng
                        $id = $_POST['id'] ?? '';
                        $tensanpham = $_POST['tensanpham'] ?? '';
                        $img = $_POST['img'] ?? '';
                        $giamoi = $_POST['giamoi'] ?? '';
                        $gia = $_POST['gia'] ?? ''; 
                        $soluong = $_POST['soluong'] ?? 1;
                        $sanphamkhuyenmai = $_POST['sanphamkhuyenmai'] ?? 0;
                        
                        // Kiểm tra nếu sản phẩm có khuyến mãi, thì sử dụng giá khuyến mãi, ngược lại sử dụng giá gốc
                        $gia_sanpham = ($sanphamkhuyenmai == 1) ? $giamoi : $gia;
                        
                        // Tính giá trị của biến thanhtien
                        $thanhtien = $soluong * $gia_sanpham;
                        
                        // Kiểm tra nếu giỏ hàng chưa được khởi tạo, thì khởi tạo nó là một mảng rỗng
                        if (!isset($_SESSION['mycart'])) {
                            $_SESSION['mycart'] = array();
                        }
                
                        //kiểm tra sản phẩm có tồn tại trong giỏ hàng chưa 
                        $fg = 0;
                        $i = 0;
                        foreach ($_SESSION['mycart'] as $item) {
                            if ($item['1'] === $tensanpham) {
                                $_SESSION['mycart'][$i][4] += $soluong; // Tăng số lượng
                                $_SESSION['mycart'][$i][5] += $thanhtien; // Cập nhật thành tiền
                                $fg = 1;
                                break;
                            }
                            $i++;
                        }
                
                        // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
                        if ($fg == 0) {
                            $spadd = [$id, $tensanpham, $img, $gia_sanpham, $soluong, $thanhtien];
                            array_push($_SESSION['mycart'], $spadd);
                        }
                    }
                    include "view/cart/viewcart.php";
                    break;
                    
                case 'delcart':
                    if (isset($_GET['idcart'])) {
                        $idToDelete = $_GET['idcart'];
                        // Sử dụng unset để xóa phần tử tại vị trí cụ thể trong mảng
                        unset($_SESSION['mycart'][$idToDelete]);
                        // Sau đó, tái sắp xếp lại các chỉ số của mảng
                        $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                    } else {
                        // Nếu không có idcart, xóa toàn bộ giỏ hàng
                        $_SESSION['mycart'] = [];
                    }
                
                    header('location: index.php?act=viewcart');
                    exit(); // Đảm bảo kết thúc việc thực thi sau khi chuyển hướng
                    break;
                
                case 'bill':
                    // Kiểm tra xem người dùng đã login chưa
                    if (!isset($_SESSION['user'])) {
                        // Redirect or show a message to prompt the user to log in
                        header('location: index.php?act=dangnhap');
                        exit();
                    }
                    include "view/cart/bill.php";
                    break;
            

                case 'billcomfirm':
                    if(isset($_POST['dongydathang']) && ($_POST['dongydathang'])){
                        if(isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
                        else $id = 0;
                        $name = $_POST['name'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $email = $_POST['email'];
                        $pttt = $_POST['pttt'];
                        // $ngaydathang = date('Y-m-d H:i:s');
                        // Kiểm tra nếu ngày đặt hàng đã được cập nhật từ trước
                        if (!isset($bill[0]['ngaydathang'])) {
                            // Lấy thời gian hiện tại
                            $current_time = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                            $current_formatted_time = $current_time->format('Y-m-d H:i:s');

                            // Cập nhật giá trị "ngaydathang" trong mảng $bill
                            $bill[0]['ngaydathang'] = $current_formatted_time;
                        }

                        $ngaydathang = $bill[0]['ngaydathang'];
                        $tongdonhang = tongdonhang();

                        $idbill = insert_bill($iduser, $name, $address, $tel, $email, $pttt, $ngaydathang, $tongdonhang);

                        foreach ($_SESSION['mycart'] as $cart) {
                            insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                        }

                        $_SESSION['mycart'] = [];
                    }
                    
                    $bill = loadOne_bill($id);
                    $billct = loadAll_cart($idbill);
                        
                    include "view/cart/billcomfirm.php";
                    echo '<script>
                            if (performance.navigation.type === 1) {
                                window.location.href = "index.php";
                            }
                        </script>';
                    break;
                                                    
                case 'mybill':
                    $listbill = loadAll_bill($_SESSION['user']['id']);
                    include "view/cart/mybill.php";
                    break;

            default:    
                include("view/home.php");
                break;
        }
    }else {
        include("view/home.php");
    }

     if ($includeFooter) {
        include("view/footer.php");
    }
?>
