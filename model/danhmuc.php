<?php

    // Lấy dữ liệu từ bảng danh mục
    function gettall_dm(){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }


    function themdm($tendm){
        $conn = connectdb();
        $sql = "INSERT INTO tbl_danhmuc (tendanhmuc) VALUES ('".$tendm."')";
        $conn->exec($sql);
    }

    function updatedm($id, $tendm){
        $conn = connectdb();
        $sql = "UPDATE tbl_danhmuc SET tendanhmuc='$tendm' WHERE id=" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }


    //delete danh mục
    function deldm($id){
        $conn = connectdb();
        $sql = "DELETE FROM tbl_danhmuc WHERE id=" . $id;
        $conn->exec($sql);
    }

    
    //lấy ra 1 danh muc
    function getonedm($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc WHERE id= " . $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
        
    }


?>