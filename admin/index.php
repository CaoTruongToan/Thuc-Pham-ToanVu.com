<?php
    session_start();

    include "../model/connectdb.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/cart.php";
    connectdb();

    include "view/layout_admin/header.php";

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'danhmuc':
                $kq = gettall_dm();
                include "view/danhmuc/list.php";
                break;
            case 'adddm':
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tendm = $_POST['tendm'];
                    themdm($tendm);
                }
                $kq = gettall_dm();
                include "view/danhmuc/list.php";
                break;
            case 'updatedmform':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $kqone = getonedm($id);
                    $kq = gettall_dm();
                    include "view/danhmuc/updatedanhmuc.php";
                }
                if(isset($_POST['id'])){
                    $id = $_POST['id'];
                    $tendm = $_POST['tendm'];
                    updatedm($id, $tendm);

                    $kq = gettall_dm();
                    include "view/danhmuc/list.php";
                }
                break; 
            case 'deldm':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    deldm($id);
                }
                $kq = gettall_dm();
                include "view/danhmuc/list.php";
                break;

            case 'sanpham':
                if(isset($_POST['search']) && ($_POST['search'])){
                    $kyw = $_POST['kyw'];
                    $iddanhmuc = $_POST['id_danhmuc'];
                }else{
                    $kyw = '';
                    $iddanhmuc = 0;
                }

                $dsdm = gettall_dm();
                $kq = gettall_sp($kyw, $iddanhmuc);
                include "view/sanpham/list.php";
                break;

            case 'sanpham_add':
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $iddanhmuc = $_POST['id_danhmuc'];
                    $tensp = $_POST['tensanpham'];
                    $gia = $_POST['gia'];
                    $giamoi = $_POST['giamoi'];
                    $sp_khuyenmai = $_POST['sanphamkhuyenmai'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $img = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        $uploadOk = 0;
                    }

                    if($uploadOk == 1){
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        insert_sp($iddanhmuc, $tensp,  $img, $gia, $giamoi, $sp_khuyenmai);
                    }
                }
                 //load dsdm
                 $dsdm = gettall_dm();
                 //load dssp
                 $kq = gettall_sp("", 0);
                 include "view/sanpham/add.php";
                break;

            case 'updatespform':
                //load dsdm
                $dsdm = gettall_dm();
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    //san pham chi tiet
                    $spct = getonesp($_GET['id']);
                }   
                //load dssp
                $kq = gettall_sp("", 0);
                include "view/sanpham/updatesanpham.php";
                break;

            case 'sanpham_update':
                //load dsdm
                $dsdm = gettall_dm();
                //cap nhat sp
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $id_danhmuc = $_POST['id_danhmuc'];
                    $tensanpham = $_POST['tensanpham'];
                    $gia = $_POST['gia'];
                    $giamoi = $_POST['giamoi'];
                    $sp_khuyenmai = $_POST['sanphamkhuyenmai'];
                    $id = $_POST['id'];
                    if($_FILES["img"]["name"] != ""){
                        $target_dir = "../uploads/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        $img = $target_file;
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            $uploadOk = 0;
                        }
    
                        if($uploadOk == 1){
                            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                            insert_sp($iddanhmuc, $tensp,  $img, $gia, $giamoi, $sp_khuyenmai);
                        }
                    }else{
                        $img = "";
                    }

                    updatesp($id, $id_danhmuc, $tensanpham, $img, $gia, $giamoi, $sp_khuyenmai);
                }  
                //load dssp
                $kq = gettall_sp("", 0);
                include "view/sanpham/list.php";
                break;

            case 'delsp':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    delsp($id);
                }
                $kq = gettall_sp("", 0);
                include "view/sanpham/list.php";
                break;

            case 'listbill':
                if(isset($_POST['kyw']) && ($_POST['kyw']) != ""){
                    $kyw = $_POST['kyw'];
                }
                else{
                    $kyw = "";
                }
                $listbill = loadAll_bill($kyw, 0);
                include "view/donhang/listbill.php";
                break;

            case 'updatebillform':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $kqone = getonedm($id);
                    $kq = gettall_dm();
                    include "view/donhang/updatebill.php";
                }
                if(isset($_POST['id'])){
                    $id = $_POST['id'];
                    $tendm = $_POST['tendm'];
                    updatedm($id, $tendm);

                    $kq = gettall_dm();
                    include "view/donhang/listbill.php";
                }
                break; 

                case 'delbill':
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        delbill($id);
                    }
                    $listbill = loadAll_bill("", 0);
                    include "view/donhang/listbill.php";
                    break;


            case 'taikhoan':
                include "view/taikhoan/taikhoan.php";
                break;

            case 'dangxuat':
                if(isset($_SESSION['user'])){
                    unset($_SESSION['user']);
                }
                header('location: login.php');
                break;

            default:
            include "view/layout_admin/home.php";
                break;
        }
    } else {
        include "view/layout_admin/home.php";
    }


    include "view/layout_admin/footer.php";

?>