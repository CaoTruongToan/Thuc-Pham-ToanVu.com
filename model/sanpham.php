<?php

    // Lấy dữ liệu từ bảng danh mục
    function gettall_sp($kyw, $iddanhmuc){
        $sql = "SELECT * FROM tbl_sanpham WHERE 1";
        if($kyw != ""){
            $sql .= " AND tensanpham like '%".$kyw."%'";
        }
        if($iddanhmuc > 0){
            $sql .= " AND id_danhmuc = '".$iddanhmuc."'";
        }
        $sql.= " ORDER BY id DESC";
        
        return get_All($sql);
    }


    // Lấy dữ liệu từ bảng danh mục load lên trang chủ
    // với số lượng sản phẩm là 25
    function gettall_sp_home(){
        $sql = "SELECT * FROM tbl_sanpham WHERE 1 ORDER BY id desc limit 0, 25";
        return get_All($sql);
    }

    function gettall_sp_top(){
        $sql = "SELECT * FROM tbl_sanpham WHERE 1 ORDER BY daban desc limit 0, 10";
        return get_All($sql);
    }

    function insert_sp($id_danhmuc, $tensanpham, $img, $gia, $giamoi, $sp_khuyenmai)
    {
        $conn = connectdb();
        $sql = "INSERT INTO tbl_sanpham (id_danhmuc, tensanpham, img, gia, giamoi, sanphamkhuyenmai) 
                VALUES ('" . $id_danhmuc . "', '" . $tensanpham . "', '" . $img . "','" . $gia . "','" . $giamoi . "','" . $sp_khuyenmai . "' )";
        $conn->exec($sql);
    }

    //delete san pham
    function delsp($id){
        $conn = connectdb();
        $sql = "DELETE FROM tbl_sanpham WHERE id=" . $id;
        $conn->exec($sql);
    }

    //lay 1 san de sua
    function getonesp($id){
        $sql = "SELECT * FROM tbl_sanpham WHERE id= ". $id;
        return get_All($sql);
    }

    // lấy danh sách sản phẩm cùng loại
    function getspcungloai($id, $iddanhmuc){
        $sql = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = '".$iddanhmuc."' AND id <> " .$id;
        return get_All($sql);
    }

    function updatesp($id, $id_danhmuc, $tensanpham, $img, $gia, $giamoi, $sp_khuyenmai){
        $conn = connectdb();
        if($img ==""){
            $sql = "UPDATE tbl_sanpham SET tensanpham ='$tensanpham', gia ='$gia', giamoi='$giamoi' , sanphamkhuyenmai='$sp_khuyenmai' , id_danhmuc ='$id_danhmuc' WHERE id=" . $id;
        }else{
            $sql = "UPDATE tbl_sanpham SET tensanpham ='$tensanpham', gia ='$gia', giamoi='$giamoi' , sanphamkhuyenmai='$sp_khuyenmai' , img ='$img', id_danhmuc ='$id_danhmuc' WHERE id=" . $id;
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

?>